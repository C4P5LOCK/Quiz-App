<!-- <form method="POST" action="/quiz/submit">
    @csrf

  
    @foreach($questions as $index => $q)


        <p> {{ $questions->firstItem() + $index }}. {{ $q->question }}</p>

        <label>
            <input type="radio" name="answers[{{ $q->id }}]" value="a">
            {{ $q->option_a }}
        </label>

        <label>
            <input type="radio" name="answers[{{ $q->id }}]" value="b">
            {{ $q->option_b }}
        </label>

        <label>
            <input type="radio" name="answers[{{ $q->id }}]" value="c">
            {{ $q->option_c }}
        </label>
    @endforeach
    @if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
    <input type="hidden" name="page" value="{{ $page }}"><br>
    <button type="submit">Submit</button>
    {{ $questions->links() }}
</form> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto py-10 px-4">

    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-bold text-gray-800">
            Quiz Challenge
        </h1>

        <p class="text-gray-500 mt-2">
            Answer the questions below
        </p>
    </div>

    <!-- //TIMER -->
    <div class="flex justify-between items-center mb-6">

    <h2 class="text-xl font-bold">Quiz</h2>

    <div class="bg-red-100 text-red-700 px-4 py-2 rounded-xl font-bold">
        Time Left: <span id="timer">1:00</span>
    </div>

</div>
    <!-- Progress -->
    <div class="mb-6 flex justify-between items-center">
        <p class="text-sm text-gray-600">
            Page {{ $questions->currentPage() }}
            of {{ $questions->lastPage() }}
        </p>

        <p class="text-sm text-gray-600">
            Total Questions: {{ $questions->total() }}
        </p>
    </div>

    <!-- Error -->
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
            {{ session('error') }}
        </div>
    @endif

    <form id="quizForm" method="POST" action="{{ route('quiz.submit') }}">
        @csrf

        <input type="hidden" name="page" value="{{ $questions->currentPage() }}">

        @foreach($questions as $index => $q)

        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-5">
                {{ $questions->firstItem() + $index }}.
                {{ $q->question }}
            </h2>

            <div class="space-y-4">

                <!-- Option A -->
                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition">

                    <input type="radio"
                           name="answers[{{ $q->id }}]"
                           value="a"
                           class="w-5 h-5 text-blue-600">

                    <span>{{ $q->option_a }}</span>
                </label>

                <!-- Option B -->
                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition">

                    <input type="radio"
                           name="answers[{{ $q->id }}]"
                           value="b"
                           class="w-5 h-5 text-blue-600">

                    <span>{{ $q->option_b }}</span>
                </label>

                <!-- Option C -->
                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-gray-50 transition">

                    <input type="radio"
                           name="answers[{{ $q->id }}]"
                           value="c"
                           class="w-5 h-5 text-blue-600">

                    <span>{{ $q->option_c }}</span>
                </label>

            </div>
        </div>

        @endforeach

        <!-- Pagination -->
        <div class="mb-8">
            {{ $questions->links('pagination::tailwind') }}
        </div>

        <!-- Submit only on last page -->
        @if(!$questions->hasMorePages())

            <div class="text-center">

                <button
                    id="submitBtn"
                    type="submit"
                    disabled
                    class="bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 text-white font-semibold px-8 py-4 rounded-2xl transition duration-300 shadow-lg">

                    Submit Quiz

                </button>

            </div>

        @endif

    </form>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const submitBtn = document.getElementById("submitBtn");

    if (!submitBtn) return;

    const inputs = document.querySelectorAll("input[type=radio]");

    function checkAnswers() {

        let answered = false;

        inputs.forEach(input => {
            if (input.checked) {
                answered = true;
            }
        });

        submitBtn.disabled = !answered;
    }

    inputs.forEach(input => {
        input.addEventListener("change", checkAnswers);
    });

    checkAnswers();
});
</script>

<script>
    let timeLeft = 1 * 60; // 10 minutes in seconds

    const timerEl = document.getElementById('timer');
    const form = document.getElementById('quizForm');

    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;

        seconds = seconds < 1 ? '0' + seconds : seconds;

        timerEl.innerHTML = `${minutes}:${seconds}`;
        if (timeLeft <= 60) {
            timerEl.classList.add('text-red-800');
        }

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            form.submit(); // auto submit quiz
        }

        timeLeft--;
    }

    const timerInterval = setInterval(updateTimer, 1000);
</script>

</body>
</html>