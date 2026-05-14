@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-2xl p-10">

        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800">
                Add Question
            </h1>
        </div>

        <form action="{{ route('questions.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block font-semibold mb-2">Question</label>
                <textarea name="question"
                          rows="4"
                          class="w-full border rounded-2xl p-4 focus:ring-2 focus:ring-blue-400"></textarea>
            </div>

            <div>
                <label class="block font-semibold mb-2">Option A</label>
                <input type="text"
                       name="option_a"
                       class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block font-semibold mb-2">Option B</label>
                <input type="text"
                       name="option_b"
                       class="w-full border rounded-2xl p-4">
            </div>

            <div>
                <label class="block font-semibold mb-2">Option C</label>
                <input type="text"
                       name="option_c"
                       class="w-full border rounded-2xl p-4">
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