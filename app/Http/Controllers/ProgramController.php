<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        $slug = Str::slug($request->title);

        $imageUrl = null;
        $imagePublicId = null;
        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('programs/images');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();
        }

        $program = Program::create([
            'slug' => $slug,
            'title' => $request->title,
            'image_url' => $imageUrl,
            'image_public_id' => $imagePublicId,
        ]);

        return redirect()->route('programs.index')->with('success', 'Program created successfully!');
    }

    public function show($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('programs.show', compact('program'));
    }

    public function edit($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('programs.edit', compact('program','categories'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'category_id' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv',
        ]);

        $program = Program::where('slug', $slug)->firstOrFail();

        $slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if ($program->image_public_id) {
                Cloudinary::destroy($program->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('programs/images');
            $program->image_url = $cloudinaryImage->getSecurePath();
            $program->image_public_id = $cloudinaryImage->getPublicId();
        }

        $program->slug = $slug;
        $program->title = $request->title;

        $program->save();

        return redirect()->route('programs.index')->with('success', 'Program updated successfully!');
    }

    public function destroy($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        if ($program->image_public_id) {
            Cloudinary::destroy($program->image_public_id);
        }

        if ($program->video_public_id) {
            Cloudinary::destroy($program->video_public_id);
        }

        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program deleted successfully');
    }
}
