<?php
	//$salt = '';
	require 'UsersDAO.php';

	function genSalt()
	{
		$salt = '';
		for($i=0;$i<22;$i++)
	 	{
	 		$saltChars = array_merge(range('A','Z'),range('a','z'),range(0,9));
	 		$salt .= $saltChars[array_rand($saltChars)];
	 	}
	 	return $salt;
	}
	function encPass($pass)
	{
		$salt = genSalt();
		return $hashedPass = $salt.crypt($pass,$salt);
	}
	if(isset($_POST['pass']))	
	{
		$uname = $_POST['uname']; 
		$pass = $_POST['pass'];
		$pass = urlencode($pass);
		//$DbPass = 'bae7XcBbb7cr9SKxBgPyjo77ECXpbadDr97Or40Ac';

		$users = new UsersDAO();	
		$DbPass = $users->getPass($uname);
		echo $DbPass.'<br>';

		$salt = substr($DbPass,0,22);
		//$salt = genSalt($pass);
		$hashedPass = $salt.crypt($pass,$salt);	//compute hash with predefined salt
		//$hashedPass .= $salt;

		echo $salt.'<br>';
		echo $hashedPass;
		if($hashedPass == $DbPass)
		{
			echo '<br>Loged in Successfully...';
		}else{	echo '<br>Invalid uname/pass !!!';	}	
	}
	// For validation, take first 28 chars from pass of user_record as a salt, then recompute input pass using that salt, then verify both...
?>

<html>
	<body>
		<br><a href="model/Database.php">Db</a>
		<form method="post">
			<input type="text" name="uname">
			<input type="text" name="pass" />
			<input type="submit" name="submit" value="submit">
		</form>
	</body>
</html>