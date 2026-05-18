<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    public function index()
{
    $questions = Question::latest()->paginate(10);
    return view('admin.questions.index', compact('questions'));
}

    public function create()
{
    return view('admin.questions.create');
}

public function edit($id)
{
    $question = Question::findOrFail($id);
    return view('admin.questions.edit', compact('question'));
}

public function update(Request $request, $id)
{
    $question = Question::findOrFail($id);

    $question->update([
        'question' => $request->question,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'correct_answer' => $request->correct_answer,
    ]);

    return redirect('/admin/questions')->with('success', 'Updated!');
}

public function destroy($id)
{
    Question::findOrFail($id)->delete();

    return redirect('/admin/questions')->with('success', 'Deleted!');
}

public function store(Request $request)
{
    Question::create([
        'question' => $request->question,
        'option_a' => $request->option_a,
        'option_b' => $request->option_b,
        'option_c' => $request->option_c,
        'correct_answer' => $request->correct_answer,
        'explanation' => $request->explanation,
    ]);

    return redirect()->back()->with('success', 'Question added!');
}
}
