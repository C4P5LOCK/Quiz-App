<h2>Add Question</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="/admin/questions">
    @csrf

    <input type="text" name="question" placeholder="Question"><br>

    <input type="text" name="option_a" placeholder="Option A"><br>
    <input type="text" name="option_b" placeholder="Option B"><br>
    <input type="text" name="option_c" placeholder="Option C"><br>

    <select name="correct_answer">
        <option value="a">A</option>
        <option value="b">B</option>
        <option value="c">C</option>
    </select>

    <button type="submit">Save</button>
</form>