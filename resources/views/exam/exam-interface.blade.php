<!DOCTYPE html>
<html>
<head>
	<title>Student Exam Interface</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="{{asset('css/examInterface.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
	<header>
		<h1>Student Exam Interface</h1>
		<nav>
			<ul>
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">Exams</a></li>
				{{-- <li><a href="#">Results</a></li> --}}
				<li><a href="#">Logout</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<h2>Exam Title</h2>


		<div class="questions">



			<h3>Question</h3>
			<p>{{ $question->question }}</p>
			<ul>
				<li><input type="radio" name="answer" id="option_a" value="a"><label for="option_a">(A). {{ $question->opA }}</label><li>
				<li><input type="radio" name="answer" id="option_b" value="b"><label for="option_b">(B). {{ $question->opB }}</label><li>
				<li><input type="radio" name="answer" id="option_c" value="c"><label for="option_c">(C). {{ $question->opC }}</label><li>
                <li><input type="radio" name="answer" id="option_d" value="d"><label for="option_d">(D). {{ $question->opD }}</label><li>
			</ul>

		</div>
        <br>


        <a href="{{isset($prev_q_id) ? route('examQuestion', ['id' => $prev_q_id]) : url('exam-instruction')}}" class="btn btn-info"> Back</a>
        <a href="{{isset($next_q_id) ? route('examQuestion', ['id' => $next_q_id]) : url('')}}" class="btn btn-info"> {{isset($next_q_id) ? "Next" : "Finish"}}</a>

	</main>

	<footer>

	</footer>
</body>
</html>
