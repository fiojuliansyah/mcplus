<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramImage;
use Illuminate\Http\Request;
use Cloudinary;

class ProgramImageController extends Controller
{
    public function index($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $images = ProgramImage::where('program_id', $program->id)->get();

        return view('programs.images.index', compact('program', 'images'));
    }

    public function create($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('programs.images.create', compact('program'));
    }

    public function store(Request $request, $slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('program/images');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();

            ProgramImage::create([
                'program_id' => $program->id,
                'image_url' => $imageUrl,
                'image_public_id' => $imagePublicId,
            ]);
        }

        return redirect()->route('program.images.index', ['slug' => $slug])->with('success', 'Image uploaded successfully!');
    }

    public function edit($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $image = ProgramImage::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        return view('programs.images.edit', compact('program', 'image'));
    }

    public function update(Request $request, $slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $image = ProgramImage::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($image->image_public_id) {
                Cloudinary::destroy($image->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('program/images');
            $image->image_url = $cloudinaryImage->getSecurePath();
            $image->image_public_id = $cloudinaryImage->getPublicId();
        }

        $image->save();

        return redirect()->route('program.images.index', ['slug' => $slug])->with('success', 'Image updated successfully!');
    }

    public function destroy($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $image = ProgramImage::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        if ($image->image_public_id) {
            Cloudinary::destroy($image->image_public_id);
        }

        $image->delete();

        return redirect()->route('program.images.index', ['slug' => $slug])->with('success', 'Image deleted successfully!');
    }
}
