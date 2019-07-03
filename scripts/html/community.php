<!DOCTYPE html>
<html>
<script type="text/javascript" src="../lib/jquery.js"> </script>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/style_community.css" />
	<title>Biomass-Squad</title>

</head>


<body>
	<!-- BLOC PAGE -->
	<div id= "block_page">

		<?php include("header_footer/header.php"); ?>


		<!-- SECTION  -->
		<section>

			<div id="leaderboard_container">
				<h1>LeaderBoard</h1>

				<div id="leader_time">



					<!-- Gather from database the quickest fight for each boss then display it via echo-->
					<?php

					function secondsToTime($seconds)
					{
						$dtF = new \DateTime('@0');
						$dtT = new \DateTime("@$seconds");
						return $dtF->diff($dtT)->format('%imin %ssec');
					}
					
					if (isset($_SESSION['userId']))
					{
						require '../includes/dbh.inc.php';

						$nbrMaxBoss = 10;

						$bossName = array ("Alduin", "Azmodan", "Abathur", "John", "Cartman", "YoMoma", "Math", "LePoulpe", "gpadidé", "La BDD");

						for ($bossIndex=0; $bossIndex < $nbrMaxBoss; $bossIndex++)
						{ 

							//Select the BEST TIME for each boss and display boss name / timer / build / playername
							$sql = "SELECT duration, build, ownerUserID FROM completed_encounter_data WHERE duration in (SELECT MIN(duration) FROM completed_encounter_data WHERE bossID = $bossIndex)";

							$stmt = mysqli_stmt_init($conn);

							if (!mysqli_stmt_prepare($stmt, $sql))
							{
								echo "2: SQL error"; 
								exit();
							}
							else
							{
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);

								if ($row = mysqli_fetch_assoc($result)) 
								{
									$convertedDuration = secondsToTime($row['duration']);

									echo "<p>".$bossName[$bossIndex]." : ".$convertedDuration." / <a href='builder.php?build=".$bossIndex.$row['build']."'>Build</a> by USERNAME</p>";
								}
								else
								{
									echo "3: No data"; 
									exit();
								}
							}
						}
					}
					else
					{
						echo "<p>Pleaz log in to see leaderboard!</p>"; 
					}

					?>

				</div>
			</div>

		</section>

		<!-- FOOTER -->
		<?php include("header_footer/footer.php"); ?>	

	</div>

</body>
</html>
