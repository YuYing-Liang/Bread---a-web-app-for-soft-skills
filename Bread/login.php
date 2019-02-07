<?php
session_start();
require 'header.php';
head("Login");
?>

	<div class="ls-main">
		<div class="ls-container">
			<h3>Login</h3>
			<form action="" method="POST">
				<div class="loginPage">
					<label for="username">Username</label>
					<input class="usrNpas" type="text" name="username" id="username"/>

					<label for="password">Password</label>
					<input class="usrNpas" type="password" name="password" id="password" >

					<input id="button" class="loginSubmit" type="submit" name="submit" value="Login" onclick="return loginCheck();">
					<p> Don't have an Account? <a class="userType" href="./register.php">Sign Up!</a> </p>
				</div>
			</form>
		</div>
	</div>
	<?php

		if (isset($_POST["submit"]))
		{
			// Grabs credentials.
			$inputUser = $_POST["username"];
			$inputPass = $_POST["password"];

			require_once("connect-db.php");

			// Verifies if they are registered.
			$sql = "SELECT * FROM `users` WHERE `username`='$inputUser'";

			if ($result = mysqli_query($dbLocalhost, $sql))
			{
				$arrResult = mysqli_fetch_array($result);
				if ($inputPass != $arrResult["password"])
				{
					echo "<p>Not a valid user.</p>";
				}
				else
				{
					// If yes, start a session and move to menu page.
					echo "<p>Valid user.</p>";
					session_start();
					session_unset();
					session_destroy();
					session_start();
					$_SESSION["username"] = $inputUser;
					echo "<script type='text/javascript'> location.href='./menu.php'; </script>";
					exit;
				}
			}
			else
			{
				echo mysqli_error($dbLocalhost);
			}

		}

	?>

</body>

</html>
