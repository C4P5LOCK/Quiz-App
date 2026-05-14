@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex items-center justify-between mb-8">

        <div>
            <h1 class="text-4xl font-bold text-gray-800">
                Manage Questions
            </h1>

            <p class="text-gray-500 mt-2">
                Create and manage quiz questions.
            </p>
        </div>

        <a href="{{ route('questions.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg">
            + Add Question
        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="text-left p-5">#</th>
                        <th class="text-left p-5">Question</th>
                        <th class="text-left p-5">Correct Answer</th>
                        <th class="text-left p-5">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($questions as $index => $question)

                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="p-5">
                                {{ $questions->firstItem() + $index }}
                            </td>

                            <td class="p-5 font-medium">
                                {{ $question->question }}
                            </td>

                            <td class="p-5">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl text-sm font-semibold uppercase">
                                    {{ $question->correct_answer }}
                                </span>
                            </td>

                            <td class="p-5 flex gap-3">

                                <a href="{{ route('questions.edit', $question->id) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl text-sm">
                                    Edit
                                </a>

                                <form action="{{ route('questions.destroy', $question->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="p-6">
            {{ $questions->links() }}
        </div>

    </div>

</div>

@endsection