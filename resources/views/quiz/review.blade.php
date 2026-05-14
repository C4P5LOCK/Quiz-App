<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Answers</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-5xl mx-auto py-10 px-4">

    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">
            Review Answers
        </h1>

        <p class="text-gray-500 mt-2">
            See your performance and explanations
        </p>
    </div>

    @foreach($answers as $index => $answer)

        @php
            $question = $answer->question;
        @endphp

        <div class="mb-8 rounded-2xl shadow-lg overflow-hidden border
            {{ $answer->is_correct ? 'border-green-500 bg-green-50' : 'border-red-500 bg-red-50' }}">

            <!-- Question -->
            <div class="p-6">

                <h2 class="text-xl font-bold text-gray-800 mb-6">
                    {{ $index + 1 }}.
                    {{ $question->question }}
                </h2>

                <div class="space-y-4">

                    <!-- OPTION A -->
                    <div class="p-4 rounded-xl border
                        {{
                            $question->correct_answer == 'a'
                                ? 'bg-green-200 border-green-500'
                                : ($answer->selected_answer == 'a'
                                    ? 'bg-red-200 border-red-500'
                                    : 'bg-white')
                        }}">
                        <strong>A.</strong> {{ $question->option_a }}
                    </div>

                    <!-- OPTION B -->
                    <div class="p-4 rounded-xl border
                        {{
                            $question->correct_answer == 'b'
                                ? 'bg-green-200 border-green-500'
                                : ($answer->selected_answer == 'b'
                                    ? 'bg-red-200 border-red-500'
                                    : 'bg-white')
                        }}">
                        <strong>B.</strong> {{ $question->option_b }}
                    </div>

                    <!-- OPTION C -->
                    <div class="p-4 rounded-xl border
                        {{
                            $question->correct_answer == 'c'
                                ? 'bg-green-200 border-green-500'
                                : ($answer->selected_answer == 'c'
                                    ? 'bg-red-200 border-red-500'
                                    : 'bg-white')
                        }}">
                        <strong>C.</strong> {{ $question->option_c }}
                    </div>

                </div>

                <!-- Status -->
                <div class="mt-6">

                    @if($answer->is_correct)

                        <span class="inline-block bg-green-600 text-white px-4 py-2 rounded-xl font-semibold">
                            Correct
                        </span>

                    @else

                        <span class="inline-block bg-red-600 text-white px-4 py-2 rounded-xl font-semibold">
                            Wrong
                        </span>

                    @endif

                </div>

                <!-- Explanation -->
                @if($question->explanation)

                    <div class="mt-6 bg-white p-5 rounded-xl border">

                        <h3 class="font-bold text-gray-700 mb-2">
                            Explanation
                        </h3>

                        <p class="text-gray-600">
                            {{ $question->explanation }}
                        </p>

                    </div>

                @endif

            </div>

        </div>

    @endforeach

</div>

</body>
</html>