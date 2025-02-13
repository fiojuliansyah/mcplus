<?php

namespace App\Http\Controllers;

use App\Models\PlusianKit;
use App\Models\PlusianKitImage;
use Illuminate\Http\Request;
use Cloudinary;

class PlusianKitImageController extends Controller
{
    public function index($slug)
    {
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();
        $images = PlusianKitImage::where('plusian_kit_id', $plusian->id)->get();

        return view('plusian-kits.images.index', compact('plusian', 'images'));
    }

    public function create($slug)
    {
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();
        return view('plusian-kits.images.create', compact('plusian'));
    }

    public function store(Request $request, $slug)
    {
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);

        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('plusian/images');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();

            PlusianKitImage::create([
                'plusian_kit_id' => $plusian->id,
                'image_url' => $imageUrl,
                'image_public_id' => $imagePublicId,
            ]);
        }

        return redirect()->route('plusian-kit.images.index', ['slug' => $slug])->with('success', 'Image uploaded successfully!');
    }

    public function edit($slug, $id)
    {
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();
        $image = PlusianKitImage::where('id', $id)->where('plusian_kit_id', $plusian->id)->firstOrFail();

        return view('plusian-kits.images.edit', compact('plusian', 'image'));
    }

    public function update(Request $request, $slug, $id)
    {
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();
        $image = PlusianKitImage::where('id', $id)->where('plusian_kit_id', $plusian->id)->firstOrFail();

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($image->image_public_id) {
                Cloudinary::destroy($image->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('plusian/images');
            $image->image_url = $cloudinaryImage->getSecurePath();
            $image->image_public_id = $cloudinaryImage->getPublicId();
        }

        $image->save();

        return redirect()->route('plusian-kit.images.index', ['slug' => $slug])->with('success', 'Image updated successfully!');
    }

    public function destroy($slug, $id)
    {
        $plusian = PlusianKit::where('slug', $slug)->firstOrFail();
        $image = PlusianKitImage::where('id', $id)->where('plusian_kit_id', $plusian->id)->firstOrFail();

        if ($image->image_public_id) {
            Cloudinary::destroy($image->image_public_id);
        }

        $image->delete();

        return redirect()->route('plusian-kit.images.index', ['slug' => $slug])->with('success', 'Image deleted successfully!');
    }
}
