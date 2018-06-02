<?php
	$human = false;
	$print_string = '';
	if(!isset($_GET['name'])){
		die("Name Parameter Missing");
	}
	if(isset($_POST['log_out'])){
		header('Location:http://localhost/Coursera/Week%208/index.php');
	}
	if (isset($_POST['hit_play'])){
		$human = $_POST['choice'];
	}
	$computer = rand(0,2);
	switch ($computer){
		case 0:
		$computer = "rock";
		break;
		case 1:
		$computer = "paper";
		break;
		case 2:
		$computer = "scissors";
		break;
		default:
		$computer = "rock";
	}

	if ($human !== false){
		$result = check($human, $computer);
		$print_string = "Human: ". $human. " Computer: ". $computer. " Result: ". $result."\n";
	}

	function check($human, $computer)
	{
		if ($human === "rock" && $computer === "paper")
			return "You Lose";
		else if ($human === "rock" && $computer === "scissors")
			return "You Win";
		else if ($human === "paper" && $computer === "rock")
			return "You Win";
		else if ($human === "paper" && $computer === "scissors")
			return "You Lose";
		else if ($human === "scissors" && $computer === "paper")
			return "You Win";
		else if ($human === "scissors" && $computer === "rock")
			return "You Lose";
		else 
			return "Tie";
	}
?>

<html>
<body>
	<h1>Rock Paper Scissors</h1>
	<p>Welcome, <?= $_GET['name'] ?></p>
	<p><form method="POST">
		<select name="choice">
			<option value="rock">Rock</option>
			<option value="paper">Paper</option>
			<option value="scissors">Scissors</option>
		</select>
		<input type="submit" name="hit_play" value="Play">
		<input type="submit" name="log_out" value="Log Out">
	</form>
	</p>
	<pre><?php print($print_string); ?></pre>
</body>
</html>





