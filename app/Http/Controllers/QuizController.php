<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Result;
use App\Models\Secret;
use App\Models\Answer;

class QuizController extends Controller
{
    public function index()
    {
        $page = 1; // 👈 manually define it
        //$questions = Question::inRandomOrder()->take(10)->get();
        $questions = Question::paginate(5);
        return view('quiz.index', compact('questions','page'));
    }

    public function submit(Request $request)
{
    $score = 0;
    $attemptId = uniqid();
    $answers = $request->answers ?? [];

    // ✅ validate FIRST
    if (empty($answers)) {
        return redirect()->back()->with('error', 'Please answer at least one question.');
    }

    $questions = Question::whereIn('id', array_keys($answers))->get();

    foreach ($questions as $question) {

        $answer = $answers[$question->id] ?? null;

        // ✅ define correctness properly
        $isCorrect = $question->correct_answer === $answer;

        if ($isCorrect) {
            $score++;
        }

        Answer::create([
            //'user_id' => auth()->id(),
            'user_id' => auth()->check() ? auth()->id() : null,
            'question_id' => $question->id,
            'selected_answer' => $answer,
            'is_correct' => $isCorrect,
            'attempt_id' => $attemptId,
        ]);
    }

    //  calculate AFTER scoring
    $total = count($questions);
    $percentage = $total > 0 ? round(($score / $total) * 100, 2) : 0;
    $status = $percentage >= 50 ? 'Pass' : 'Fail';

    Result::create([
        //'user_id' => auth()->id(),
        'user_id' => auth()->check() ? auth()->id() : null,
        'score' => $score
    ]);

    $secret = Secret::inRandomOrder()->first();

    return view('quiz.result', compact('score', 'secret', 'percentage', 'status','attemptId'));
}

public function review($attemptId)
{
    
    $answers = Answer::where('attempt_id', $attemptId)
        ->get();
        //dd($attemptId, $answers);

    return view('quiz.review', compact('answers'));
}

}