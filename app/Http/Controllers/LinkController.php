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
    public function index()
    {
        $data = Bio::join('links', 'bios.id', '=', 'links.bio_id')
                    ->select('links.id', 'links.title', 'bios.name', 'links.link', 'links.icon_url', 'links.created_at')
                    ->get();

        return view('links.index', compact('data'));
    }

    public function create()
    {
        $bios = Bio::all()->sortBy('name');
        return view('links.create', compact('bios'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'bio_id' => 'required|string',
                'link' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
    
            $imageUrl = null;
            $imagePublicId = null;
            if ($request->hasFile('image')) {
                $cloudinaryImage = $request->file('image')->storeOnCloudinary('link/images');
                $imageUrl = $cloudinaryImage->getSecurePath();
                $imagePublicId = $cloudinaryImage->getPublicId();
            }
    
            $link = Link::create([
                'title' => $request->title,
                'bio_id' => $request->bio_id,
                'link' => $request->link,
                'icon_url' => $imageUrl,
                'icon_public_id' => $imagePublicId,
            ]);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->route('links.index')->with('success', 'Link created successfully!');
    }

    public function edit($id)
    {
        $link = Link::where('id', $id)->firstOrFail();
        $bios = Bio::all()->sortBy('name');

        return view('links.edit', compact('link', 'bios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'bio_id' => 'required|string',
            'link' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $link = Link::where('id', $id)->firstOrFail();

        // return $request->title;
        if ($request->hasFile('image')) {
            if ($link->icon_public_id) {
                Cloudinary::destroy($link->icon_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('link/images');
            $link->icon_url = $cloudinaryImage->getSecurePath();
            $link->icon_public_id = $cloudinaryImage->getPublicId();
        }

        $link->title = $request->title;
        $link->link = $request->link;

        $link->save();

        return redirect()->route('links.index')->with('success', 'Bio updated successfully!');
    }

    public function destroy($id)
    {
        $link = Link::where('id', $id)->firstOrFail();

        if ($link->icon_public_id) {
            Cloudinary::destroy($link->icon_public_id);
        }

        $link->delete();

        return redirect()->route('links.index')->with('success', 'Link deleted successfully');
    }
}