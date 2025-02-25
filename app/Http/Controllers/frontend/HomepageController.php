<?php

namespace App\Http\Controllers\frontend;

use App\Models\Classroom;
use App\Models\PlusianKit;
use Illuminate\Http\Request;
use App\Helpers\TranslationHelper;
use App\Http\Controllers\Controller;
use App\Models\ClassScheduleProgram;

class HomepageController extends Controller
{
    public function index()
    {
        $title = 'Home Page';
        return view('frontend.homepage',compact('title'));
    }

    public function timeTable()
    {
        $title = 'Time Table';
        
        $classrooms = Classroom::with(['timetables', 'promos'])
                        ->whereHas('timetables', function($query) {
                            $query->whereNotNull('id');
                        })
                        ->get();
                        
        return view('frontend.time-table', compact('title', 'classrooms'));
    }

    public function schedules(Request $request)
    {
        $title = 'Schedules';
        $query = ClassScheduleProgram::query();
    
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }
    
        $schedules = $query->get();
    
        return view('frontend.schedules', compact('title', 'schedules'));
    }
    
}
