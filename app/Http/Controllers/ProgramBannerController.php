<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramBanner;
use Illuminate\Http\Request;
use Cloudinary;

class ProgramBannerController extends Controller
{
    public function index($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $banners = ProgramBanner::where('program_id', $program->id)->get();

        return view('programs.banners.index', compact('program', 'banners'));
    }

    public function create($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('programs.banners.create', compact('program'));
    }

    public function store(Request $request, $slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('program/banners');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();

            ProgramBanner::create([
                'program_id' => $program->id,
                'image_url' => $imageUrl,
                'image_public_id' => $imagePublicId,
            ]);
        }

        return redirect()->route('program.banners.index', ['slug' => $slug])->with('success', 'Banner uploaded successfully!');
    }

    public function edit($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $banner = ProgramBanner::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        return view('programs.banners.edit', compact('program', 'banner'));
    }

    public function update(Request $request, $slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $banner = ProgramBanner::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari Cloudinary jika ada
            if ($banner->image_public_id) {
                Cloudinary::destroy($banner->image_public_id);
            }

            // Upload gambar baru
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('program/banners');
            $banner->image_url = $cloudinaryImage->getSecurePath();
            $banner->image_public_id = $cloudinaryImage->getPublicId();
        }

        $banner->save();

        return redirect()->route('program.banners.index', ['slug' => $slug])->with('success', 'Banner updated successfully!');
    }

    public function destroy($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $banner = ProgramBanner::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        if ($banner->image_public_id) {
            Cloudinary::destroy($banner->image_public_id);
        }

        $banner->delete();

        return redirect()->route('program.banners.index', ['slug' => $slug])->with('success', 'Banner deleted successfully!');
    }
}
