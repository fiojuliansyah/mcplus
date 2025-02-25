<?php

namespace App\Http\Controllers;

use App\Models\Tutor; 
use App\Models\Category; 
use App\Models\Classroom;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function index($slug)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();
        $timeTables = TimeTable::where('classroom_id', $classroom->id)->get();

        return view('timetables.index', compact('timeTables', 'classroom'));
    }

    public function create($slug)
    {
        $tutors = Tutor::all();
        $categories = Category::all();
        $classroom = Classroom::where('slug', $slug)->firstOrFail();

        return view('timetables.create', compact('tutors', 'categories', 'classroom'));
    }

    public function store(Request $request, $slug)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();

        $timeTable = TimeTable::create([
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
            'category_id' => $request->category_id,
            'classroom_id' => $classroom->id,
            'group' => $request->group,
            'tutor_id' => $request->tutor_id,
        ]);

        return redirect()->route('timetables.index', ['slug' => $slug])->with('success', 'Time Table created successfully.');
    }

    public function show(TimeTable $timeTable)
    {
        return view('timetables.show', compact('timeTable'));
    }

    public function edit(TimeTable $timeTable, $slug, $id)
    {
        $tutors = Tutor::all(); 
        $categories = Category::all(); 
        $classroom = Classroom::where('slug', $slug)->firstOrFail();
        $timeTable = TimeTable::findOrFail($id);

        return view('timetables.edit', compact('timeTable', 'tutors', 'categories', 'classroom'));
    }

    public function update(Request $request, $slug, $id)
    {
        $classroom = Classroom::where('slug', $slug)->firstOrFail();
        $timeTable = TimeTable::findOrFail($id); // Add this line
        
        $timeTable->update([
            'day' => $request->day,
            'start' => $request->start,
            'end' => $request->end,
            'category_id' => $request->category_id,
            'classroom_id' => $classroom->id,
            'group' => $request->group,
            'tutor_id' => $request->tutor_id,
        ]);
    
        return redirect()->route('timetables.index', ['slug' => $slug])->with('success', 'Time Table updated successfully.');
    }

    public function destroy($slug, $id)
    {
        $timeTable = TimeTable::findOrFail($id);
        $timeTable->delete();
        return redirect()->route('timetables.index', $slug)->with('success', 'Time Table deleted successfully.');
    }

}
