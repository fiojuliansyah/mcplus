<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Bio;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class LinkController extends Controller
{
    public function index($slug)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();
        $data = Link::where('bio_id', $bio->id)
                    ->select('id', 'title', 'link', 'icon_url', 'created_at')
                    ->get();

        return view('links.index', compact('data', 'bio'));
    }

    public function create($slug)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();
        return view('links.create', compact('bio'));
    }

    public function store(Request $request, $slug)
    {
        try {
            $bio = Bio::where('slug', $slug)->firstOrFail();

            $request->validate([
                'title' => 'required|string',
                'link' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageUrl = null;
            $imagePublicId = null;
            if ($request->hasFile('icon')) {
                $cloudinaryImage = $request->file('icon')->storeOnCloudinary('link/images');
                $imageUrl = $cloudinaryImage->getSecurePath();
                $imagePublicId = $cloudinaryImage->getPublicId();
            }

            $link = Link::create([
                'title' => $request->title,
                'bio_id' => $bio->id, // Gunakan ID dari Bio berdasarkan slug
                'link' => $request->link,
                'icon_url' => $imageUrl,
                'icon_public_id' => $imagePublicId,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        return redirect()->route('links.index', ['slug' => $slug])->with('success', 'Link created successfully!');
    }

    public function edit($slug, $id)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();
        $link = Link::where('id', $id)->where('bio_id', $bio->id)->firstOrFail();

        return view('links.edit', compact('link', 'bio'));
    }

    public function update(Request $request, $slug, $id)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();
        $link = Link::where('id', $id)->where('bio_id', $bio->id)->firstOrFail();

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('icon')) {
            if ($link->icon_public_id) {
                Cloudinary::destroy($link->icon_public_id);
            }

            $cloudinaryImage = $request->file('icon')->storeOnCloudinary('link/images');
            $link->icon_url = $cloudinaryImage->getSecurePath();
            $link->icon_public_id = $cloudinaryImage->getPublicId();
        }

        $link->title = $request->title;
        $link->link = $request->link;
        $link->save();

        return redirect()->route('links.index', ['slug' => $slug])->with('success', 'Link updated successfully!');
    }

    public function destroy($slug, $id)
    {
        $bio = Bio::where('slug', $slug)->firstOrFail();
        $link = Link::where('id', $id)->where('bio_id', $bio->id)->firstOrFail();

        if ($link->icon_public_id) {
            Cloudinary::destroy($link->icon_public_id);
        }

        $link->delete();

        return redirect()->route('links.index', ['slug' => $slug])->with('success', 'Link deleted successfully');
    }
}