<?php 
	$who = '';
	$pass = '';
	$error = false;
	$salt = 'XyZzy12*_';
	$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
	if (isset($_POST['who']) && isset($_POST['pass']))
	{
		$pass = $_POST['pass'];
		$salt_pass = $salt.$pass;
		$hash_pass = hash('md5', $salt_pass);
		if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1){
			$error = "User name and password are required";
		}
		else if (strlen($_POST['pass'] >= 1 && $hash_pass !== $stored_hash)){
			$error = "Incorrect password";
		}
		else if($hash_pass == $stored_hash)
		{
		header("Location: game.php?name=".urlencode($_POST['who']));
		}
		//plaintext pwd is php123
	}

?>

<html>
<title>Login</title>
	<body>
		<h1> Welcome </h1>
		<form method="POST">
			<p><label for="who">Name:</label> 
			<input type="text" name="who"></p>
			<p><label for="pass">Password:</label> 
			<input type="password" name="pass"></p>
			<input type="submit" name="Log In">
		</form>
		<?php
			if ($error !== false){
				echo ("<h3>$error</h3>\n");
			}
		?>
	</body>
</html>

