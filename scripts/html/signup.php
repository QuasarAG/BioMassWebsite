<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/style_signup.css" />
	<title>Biomass-Registration</title>
</head>


<body>
	<div id= "block_page">

		<?php include("header_footer/header.php"); ?>

		<!-- SECTION  -->
		<section>
			<h1>SIGN UP</h1>

			<!-- ERROR MESSAGE FOR USER -->
			<?php
			if (isset($_GET['error']))
			{
				if ($_GET['error'] == "emptyfields") 
				{
					echo '<p id="signuperror">Fill in all fields!</p>';
				}
				else if($_GET['error'] == "invalidmailname")
				{
					echo '<p id="signuperror">Invalid username and e-mail!</p>';
				}
				else if($_GET['error'] == "invalidmail")
				{
					echo '<p id="signuperror">Invalid e-mail!</p>';
				}
				else if($_GET['error'] == "invalidname")
				{
					echo '<p id="signuperror">Invalid username!</p>';
				}
				else if($_GET['error'] == "passwordcheck")
				{
					echo '<p id="signuperror">Passwords do not match!</p>';
				}
				else if($_GET['error'] == "usertaken")
				{
					echo '<p id="signuperror">Username is already taken</p>';
				}
			}
			else if (isset($_GET['signup']))
			{
				if ($_GET['signup'] == "success")
				{
					echo '<p id="signupsuccess">Signup successful!</p>';
				}
			}
			?>


			<div id="signup_form_container">
				<form action ="../includes/signup.inc.php" method = "post">
					<input type="text" name="nameUsers" placeholder="Username">
					<input type="text" name="mailUsers" placeholder="E-mail">
					<input type="password" name="pwdUsers" placeholder="Password">
					<input type="password" name="pwd-repeat" placeholder="Repeat Password">

					<button type="submit" name="signup-submit">Signup</button>
				</form>
			</div>
		</section>

		<!-- FOOTER -->
		<?php include("header_footer/footer.php"); ?>		

	</div>

</body>
</html>
