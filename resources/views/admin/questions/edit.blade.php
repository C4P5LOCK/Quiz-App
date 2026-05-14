<!-- <h2>Edit Question</h2>

<form method="POST" action="/admin/questions/{{ $question->id }}">
    @csrf
    @method('PUT')

    <input type="text" name="question" value="{{ $question->question }}"><br>

    <input type="text" name="option_a" value="{{ $question->option_a }}"><br>
    <input type="text" name="option_b" value="{{ $question->option_b }}"><br>
    <input type="text" name="option_c" value="{{ $question->option_c }}"><br>

    <select name="correct_answer">
        <option value="a" {{ $question->correct_answer == 'a' ? 'selected' : '' }}>A</option>
        <option value="b" {{ $question->correct_answer == 'b' ? 'selected' : '' }}>B</option>
        <option value="c" {{ $question->correct_answer == 'c' ? 'selected' : '' }}>C</option>
    </select>

    <button type="submit">Update</button>
</form> -->

@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-2xl p-10">

        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">
                Edit Question
            </h1>
        </div>

        <form action="{{ route('questions.store') }}" method="PUT" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-2">Question</label>
                <textarea name="question"
                          rows="4"
                          class="w-full border rounded-2xl p-4 focus:ring-2 focus:ring-blue-400 ">
                          {{ $question->question }}
                        </textarea>
            </div>

            <div>
                <label class="block font-semibold mb-2">Option A</label>
                <input type="text"
                       name="option_a"
                       class="w-full border rounded-2xl p-4"
                       value="{{ $question->option_a }}">
            </div>

            <div>
                <label class="block font-semibold mb-2">Option B</label>
                <input type="text"
                       name="option_b"
                       class="w-full border rounded-2xl p-4"
                       value="{{ $question->option_b }}">
            </div>

            <div>
                <label class="block font-semibold mb-2">Option C</label>
                <input type="text"
                       name="option_c"
                       class="w-full border rounded-2xl p-4"
                       value="{{ $question->option_c }}">
            </div>

            <div>
                <label class="block font-semibold mb-2">Correct Answer</label>

                <select name="correct_answer"
                        class="w-full border rounded-2xl p-4">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-2">Explanation</label>

                <textarea name="explanation"
                          rows="4"
                          class="w-full border rounded-2xl p-4"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-bold text-lg shadow-xl transition">
                Save Question
            </button>

        </form>

    </div>

</div>

@endsection