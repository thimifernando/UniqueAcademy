<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Example Interface</title>
	<link rel="stylesheet" href="styles.css">

    <style>

body {
	font-family: Arial, sans-serif;
	font-size: 16px;
	line-height: 1.5;
	margin: 0;
	padding: 0;
}

header {
	background-color: #69dcf6;
	color: #fff;
	padding: 20px;
}

nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
}

nav li {
	display: inline-block;
	margin-right: 20px;
}

nav li:last-child {
	margin-right: 0;
}

nav a {
	color: #fff;
	text-decoration: none;
}

main {
	margin: 20px;
}

.hero {
	background-color: #f7f7f7;
	border-radius: 5px;
	padding: 40px;
	text-align: center;
}

.hero h1 {
	font-size: 40px;
	margin-top: 0;
    text-align: center;
}

.hero p {
	font-size: 20px;
}

.btn {
	background-color: #333;
	border-radius: 5px;
	color: #fff;
	display: inline-block;
	font-size: 16px;
	margin-top: 20px;
	padding: 10px 20px;
	text-decoration: none;
	transition: background-color 0.2s ease;
}

.btn:hover {
	background-color: #666;
}

.features {
	display: flex;
	flex-wrap: wrap;
	justify-content: space-between;
	margin-top: 40px;

}

.feature {
	background-color: #eeedaf;
	border-radius: 5px;
	flex-basis: calc;
    width: 100%;
    height: 100%;

    }

    </style>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<br>

		<section class="features">
			<div class="feature">
				<h1 >Exam Instruction</h1>
				<p> 01. The student may not use his or her textbook, class notes, or receive help from a proctor or any other outside source.<br> <br>

                    02. Student must complete the 15question multiple-choice exam within the 20- minute time frame allocated for the exam.<br> <br>

                   03. Student must note stop the exam and then return to it. This specially important in the online environment where the system will “time-out” and not allow the student or you to re-enter the exam.
                </p>
			</div>


		</section>
		<section class="cta">
			<h5>Number of question : 15<br>
                Exam Duration : 20 min<br>
                All the best !</h5>

			<a href="{{route('examQuestion', ['id' => $q_id])}}" class="btn btn-primary">Start the Exam</a>
		</section>
	</main>

</body>
</html>
