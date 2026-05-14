<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Result;
use App\Models\Answer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalQuestions = Question::count();

        $totalAttempts = Result::count();

        $correctAnswers = Answer::where('is_correct', true)->count();

        $totalAnswers = Answer::count();

        $passRate = $totalAnswers > 0
            ? round(($correctAnswers / $totalAnswers) * 100, 2)
            : 0;

        return view('admin.dashboard', compact(
            'totalQuestions',
            'totalAttempts',
            'correctAnswers',
            'passRate'
        ));
    }
}