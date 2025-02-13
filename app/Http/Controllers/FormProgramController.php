<?php

namespace App\Http\Controllers;

use App\Models\FormProgram;
use App\Models\Program;
use Illuminate\Http\Request;

class FormProgramController extends Controller
{
    public function index($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $forms = FormProgram::where('program_id', $program->id)->get();

        return view('programs.forms.index', compact('program', 'forms'));
    }

    public function create($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('programs.forms.create', compact('program'));
    }

    public function store(Request $request, $slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
        ]);

        FormProgram::create([
            'program_id' => $program->id,
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('forms.index', ['slug' => $slug])->with('success', 'Form created successfully!');
    }

    public function edit($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $form = FormProgram::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        return view('programs.forms.edit', compact('program', 'form'));
    }

    public function update(Request $request, $slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $form = FormProgram::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
        ]);

        $form->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect()->route('forms.index', ['slug' => $slug])->with('success', 'Form updated successfully!');
    }

    public function destroy($slug, $id)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        $form = FormProgram::where('id', $id)->where('program_id', $program->id)->firstOrFail();

        $form->delete();

        return redirect()->route('forms.index', ['slug' => $slug])->with('success', 'Form deleted successfully!');
    }
}

