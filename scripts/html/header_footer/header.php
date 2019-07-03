
<?php
session_start();
?>

<link rel="stylesheet" href="../css/style_header_footer.css" />



<!-- HEADER MUST EXPORT TO STANDALON FILE -->
<header>
	<!-- Button to various social website or app -->
	<div id="header_social_panel">

		<a class="img_link" href="#"> <img src="../../images/social_sprite/facebook.png" alt ="facebook_icon"> </a>
		<a class="img_link" href="#"> <img src="../../images/social_sprite/twitter.png" alt ="twitter_icon"> </a>
		<a class="img_link" href="#"> <img src="../../images/social_sprite/youtube.png" alt ="youtube_icon"> </a>
		<a class="img_link" href="#"> <img src="../../images/social_sprite/discord.png" alt ="discord_icon"> </a>
		<a class="img_link" href="#"> <img src="../../images/social_sprite/steam.png" alt ="steam_icon"> </a>
		<a class="img_link" href="#"> <img src="../../images/social_sprite/mail.png" alt ="mail_icon"> </a>

	</div>


	<!-- GAME NAME -->
	<h1>BIOMASS</h1>

	<!-- Navigate through different content of the website -->
	<div id="header_button_main_content">

		<a class="header_button" href="home.php" title ="Biomass-Home">
			<span class="section_name">Home</span>	
		</a>

		<a class="header_button" href="squad.php" title ="Biomass-Squad">
			<span class="section_name">Squad</span>	
		</a>

		<a class="header_button" href="builder.php" title ="Biomass-Builder">
			<span class="section_name">Builder</span>	
		</a>

		<a class="header_button" href="media.php" title ="Biomass-Media">
			<span class="section_name">Media</span>	
		</a>

		<a class="header_button" href="community.php" title ="Biomass-Community">
			<span class="section_name">Community</span>	
		</a>
	</div>



	<div id="login_container">

		<?php
		if (isset($_SESSION['userId']))
		{
			echo 
			"
			<form action ='../includes/logout.inc.php' method = 'post'>
				<button type='submit' name='logout-submit'>Logout</button>	
			</form>";
		}
		else
		{
			echo 
			"<div id='login'>
				<form action ='../includes/login.inc.php' method = 'post'>
					<input type='text' name='username' placeholder='Username...'>
					<input type='password' name='pwdUsers' placeholder='Password...'>
					<button type='submit' name='login-submit'>Login</button>	
				</form>
			</div>	
		
			<form action='signup.php'>
   			 <input type='submit' value='Register'/>
			</form>";		
		}
		?>
	</div>
	
</header>

