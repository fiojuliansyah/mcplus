<?php

use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function createQuestion()
    {
        return view('survey.create');
    }

    public function storeQuestion(Request $request)
    {
        $validated = $request->validate([
            'question_text' => 'required|string',
            'type' => 'required|in:single,multiple,paragraph',
        ]);

        $question = Question::create([
            'question_text' => $validated['question_text'],
            'type' => $validated['type'],
        ]);

        return redirect()->route('survey.show', $question->id);
    }

    public function showQuestion($id)
    {
        $question = Question::with('answers')->findOrFail($id);
        return view('survey.show', compact('question'));
    }

    public function storeAnswer(Request $request, $question_id)
    {
        $validated = $request->validate([
            'answer_text' => 'required|string',
        ]);

        Answer::create([
            'question_id' => $question_id,
            'answer_text' => $validated['answer_text'],
        ]);

        return back();
    }

    public function deleteAnswer($id)
    {
        Answer::findOrFail($id)->delete();
        return back();
    }
}
