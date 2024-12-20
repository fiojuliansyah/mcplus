<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class BioController extends Controller
{
    public function index()
    {
        $bios = Bio::all();
        return view('bios.index', compact('bios'));
    }

    public function create()
    {
        return view('bios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $slug = Str::slug($request->name);

        $imageUrl = null;
        $imagePublicId = null;
        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('bio/images');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();
        }

        $bio = Bio::create([
            'name' => $request->name,
            'slug' => $slug,
            'image_url' => $imageUrl,
            'image_public_id' => $imagePublicId,
        ]);

        return redirect()->route('bios.index')->with('success', 'Bio created successfully!');
    }

    public function edit($slug)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();
        return view('bios.edit', compact('bio'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $bio = Bio::where('slug', $slug)->firstOrFail();

        $slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($bio->image_public_id) {
                Cloudinary::destroy($bio->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('bio/images');
            $bio->image_url = $cloudinaryImage->getSecurePath();
            $bio->image_public_id = $cloudinaryImage->getPublicId();
        }

        $bio->slug = $slug;
        $bio->name = $request->name;

        $bio->save();

        return redirect()->route('bios.index')->with('success', 'Bio updated successfully!');
    }

    public function destroy($slug)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();

        if ($bio->image_public_id) {
            Cloudinary::destroy($bio->image_public_id);
        }

        $bio->delete();

        return redirect()->route('bios.index')->with('success', 'Bio deleted successfully');
    }
}