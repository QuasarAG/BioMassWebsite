

<!DOCTYPE html>
<html>
<script type="text/javascript" src="../lib/jquery.js"> </script>


<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/style_builder.css" />
	<title>Biomass-Squad</title>
</head>


<body>
	<!-- BLOC PAGE -->


	<div id= "block_page">

		<?php include("header_footer/header.php"); ?>

		<div id="tooltip">
			<p id="name">name</p>
			<p id="cooldown">CD : 10sec</p>
			<p id="description"> test description</p>
		</div>

		<div id="spell_selector_container">

			<img id="spell_selector_arrow" src="../../images/arrow.png"></img>
			<div id="spell_selector_icons">
				<img class="spell_icon" src="#"></img>
				<img class="spell_icon" src="#"></img>
				<img class="spell_icon" src="#"></img>
				<img class="spell_icon" src="#"></img>
				<img class="spell_icon" src="#"></img>
			</div>
			
		</div>

		<!-- SECTION  --> 
		<section>

			<div id="boss_general_container">
				<h2>Select the fight you want to prepare</h2>

				<div id= "boss_inside_container">
					<div id="bosses_portraits">
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
						<img class="boss_portrait" src="#" alt="boss_portrait"></img>
					</div>			
				</div>		
			</div>


			<div id = heroes_general_container>
				<div class = hero_column data-id ="0">
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot"></img>
				</div>  

				<div class = hero_column data-id ="1">
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
				</div>  

				<div class = hero_column data-id ="2">
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
				</div> 

				<div class = hero_column data-id ="3">
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
					<img class="capacity_slot" src="#" alt="capacity_slot" ></img>
				</div>  
			</div>


			<div id = "buildLink_container">
				<input type='text' id='build_serial' value='' readonly>
				<button type="button" onclick="copyToClipboard()"> Copy to clipboard</button>
			</div>
		</section>

		<!-- FOOTER -->
		<?php include("header_footer/footer.php"); ?>	

	</div>



	<script src="../javascript/tools/get-data.js"></script>
	<script src="../javascript/obj/game_object.js"></script>
	<script src="../javascript/script_builder.js"></script>

</body>
</html>
