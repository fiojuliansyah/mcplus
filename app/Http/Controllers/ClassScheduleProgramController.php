<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ClassScheduleProgram;
use Illuminate\Http\Request;
use Cloudinary;

class ClassScheduleProgramController extends Controller
{
    public function index($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $schedules = ClassScheduleProgram::where('program_id', $program->id)->get();

        return view('programs.class-schedules.index', compact('program', 'schedules'));
    }

    public function create($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('programs.class-schedules.create', compact('program'));
    }

    public function store(Request $request, $slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageUrl = null;
        $imagePublicId = null;

        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('class_schedule_programs');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();
        }

        ClassScheduleProgram::create([
            'program_id' => $program->id,
            'title' => $request->title,
            'link' => $request->link,
            'image_url' => $imageUrl,
            'image_public_id' => $imagePublicId,
        ]);

        return redirect()->route('class_schedule_programs.index', ['slug' => $slug])->with('success', 'Class Schedule created successfully!');
    }

    public function edit($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $schedule = ClassScheduleProgram::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        return view('programs.class-schedules.edit', compact('program', 'schedule'));
    }

    public function update(Request $request, $slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $schedule = ClassScheduleProgram::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($schedule->image_public_id) {
                Cloudinary::destroy($schedule->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('class_schedule_programs');
            $schedule->image_url = $cloudinaryImage->getSecurePath();
            $schedule->image_public_id = $cloudinaryImage->getPublicId();
        }

        $schedule->title = $request->title;
        $schedule->link = $request->link;
        $schedule->save();

        return redirect()->route('class_schedule_programs.index', ['slug' => $slug])->with('success', 'Class Schedule updated successfully!');
    }

    public function destroy($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $schedule = ClassScheduleProgram::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        if ($schedule->image_public_id) {
            Cloudinary::destroy($schedule->image_public_id);
        }

        $schedule->delete();

        return redirect()->route('class_schedule_programs.index', ['slug' => $slug])->with('success', 'Class Schedule deleted successfully!');
    }
}
