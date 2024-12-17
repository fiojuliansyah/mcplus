<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class TutorController extends Controller
{
    public function index()
    {
        $tutors = Tutor::all();
        return view('tutors.index', compact('tutors'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tutors.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv',
        ]);

        $slug = Str::slug($request->name);

        $imageUrl = null;
        $imagePublicId = null;
        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('tutors/images');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();
        }

        $videoUrl = null;
        $videoPublicId = null;
        if ($request->hasFile('video')) {
            $cloudinaryVideo = $request->file('video')->storeOnCloudinary('tutors/videos');
            $videoUrl = $cloudinaryVideo->getSecurePath();
            $videoPublicId = $cloudinaryVideo->getPublicId();
        }

        $tutor = Tutor::create([
            'category_id' => $request->category_id,
            'slug' => $slug,
            'name' => $request->name,
            'image_url' => $imageUrl,
            'image_public_id' => $imagePublicId,
            'video_url' => $videoUrl,
            'video_public_id' => $videoPublicId,
        ]);

        return redirect()->route('tutors.index')->with('success', 'Tutor created successfully!');
    }

    public function show($slug)
    {
        $tutor = Tutor::where('slug', $slug)->firstOrFail();
        return view('tutors.show', compact('tutor'));
    }

    public function edit($slug)
    {
        $tutor = Tutor::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('tutors.edit', compact('tutor','categories'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'category_id' => 'required|string',
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv',
        ]);

        $tutor = Tutor::where('slug', $slug)->firstOrFail();

        $slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($tutor->image_public_id) {
                \Cloudinary\Cloudinary::image($tutor->image_public_id)->destroy();
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('tutors/images');
            $tutor->image_url = $cloudinaryImage->getSecurePath();
            $tutor->image_public_id = $cloudinaryImage->getPublicId();
        }

        if ($request->hasFile('video')) {
            if ($tutor->video_public_id) {
                \Cloudinary\Cloudinary::video($tutor->video_public_id)->destroy();
            }

            $cloudinaryVideo = $request->file('video')->storeOnCloudinary('tutors/videos');
            $tutor->video_url = $cloudinaryVideo->getSecurePath();
            $tutor->video_public_id = $cloudinaryVideo->getPublicId();
        }

        $tutor->category_id = $request->category_id;
        $tutor->slug = $slug;
        $tutor->name = $request->name;

        $tutor->save();

        return redirect()->route('tutors.index')->with('success', 'Tutor updated successfully!');
    }

    public function destroy($slug)
    {
        $tutor = Tutor::where('slug', $slug)->firstOrFail();

        if ($tutor->image_public_id) {
            \Cloudinary\Cloudinary::image($tutor->image_public_id)->destroy();
        }

        if ($tutor->video_public_id) {
            \Cloudinary\Cloudinary::video($tutor->video_public_id)->destroy();
        }

        $tutor->delete();

        return redirect()->route('tutors.index')->with('success', 'Tutor deleted successfully');
    }
}
