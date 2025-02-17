<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:single,multiple,paragraph',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageUrl = null;
        $imagePublicId = null;

        if ($request->hasFile('image')) {
            $cloudinaryImage = $request->file('image')->storeOnCloudinary('questions/images');
            $imageUrl = $cloudinaryImage->getSecurePath();
            $imagePublicId = $cloudinaryImage->getPublicId();
        }

        Question::create([
            'question_text' => $request->question_text,
            'type' => $request->type,
            'image_url' => $imageUrl,
            'image_public_id' => $imagePublicId,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question created successfully!');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:single,multiple,paragraph',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($question->image_public_id) {
                Cloudinary::destroy($question->image_public_id);
            }

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('questions/images');
            $question->image_url = $cloudinaryImage->getSecurePath();
            $question->image_public_id = $cloudinaryImage->getPublicId();
        }

        $question->update([
            'question_text' => $request->question_text,
            'type' => $request->type,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        if ($question->image_public_id) {
            Cloudinary::destroy($question->image_public_id);
        }

        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully!');
    }
}
