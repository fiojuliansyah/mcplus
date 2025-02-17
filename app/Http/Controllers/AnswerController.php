<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function index($questionId)
    {
        $question = Question::findOrFail($questionId);
        $answers = $question->answers;
        return view('questions.answers.index', compact('question', 'answers'));
    }

    public function create($questionId)
    {
        $question = Question::findOrFail($questionId);
        return view('questions.answers.create', compact('question'));
    }

    public function store(Request $request, $questionId)
    {
        $request->validate([
            'answer_text' => 'required|string',
        ]);

        $question = Question::findOrFail($questionId);

        Answer::create([
            'question_id' => $question->id,
            'answer_text' => $request->answer_text,
        ]);

        return redirect()->route('answers.index', $question->id)->with('success', 'Answer created successfully!');
    }

    public function edit($questionId, $answerId)
    {
        $question = Question::findOrFail($questionId);
        $answer = Answer::findOrFail($answerId);
        return view('questions.answers.edit', compact('question', 'answer'));
    }

    public function update(Request $request, $questionId, $answerId)
    {
        $request->validate([
            'answer_text' => 'required|string',
        ]);

        $answer = Answer::findOrFail($answerId);
        $answer->update([
            'answer_text' => $request->answer_text,
        ]);

        return redirect()->route('answers.index', $questionId)->with('success', 'Answer updated successfully!');
    }

    public function destroy($questionId, $answerId)
    {
        $answer = Answer::findOrFail($answerId);
        $answer->delete();

        return redirect()->route('answers.index', $questionId)->with('success', 'Answer deleted successfully!');
    }
}
