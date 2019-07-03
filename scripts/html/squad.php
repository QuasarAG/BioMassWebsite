<!DOCTYPE html>
<html>
<script type="text/javascript" src="../lib/jquery.js"> </script>

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/style_squad.css" />
	<title>Biomass-Squad</title>

</head>


<body>
	<!-- BLOC PAGE -->
	<div id= "block_page">

		<?php include("header_footer/header.php"); ?>


		<!-- SECTION  -->
		<section>

			<div id="squad_general_container">
				<h2>SQUAD MEMBERS</h2>

				<div id= "squad_inside_container">
					<div id="squad_portraits">
						<img class="hero_portrait" src="#" alt="hero_portrait"></img>
						<img class="hero_portrait" src="#" alt="hero_portrait"></img>
						<img class="hero_portrait" src="#" alt="hero_portrait"></img>
						<img class="hero_portrait" src="#" alt="hero_portrait"></img>
					</div>
					<div id="hero_info_container">
						<h2 id = "hero_name"></h2>
						<p id="hero_story"></p>
					</div>				
				</div>		
			</div>

			<div id="skilltree_container">
				<h2>SKILL TREE</h2>

				<div class="slot_container" data-id ="1">
					<h3>SLOT 1</h3>
					<div class="slot_row_icon">
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
					</div>
					<div class="Spell_text_container">
						<h4 class="spell_name"></h4>
						<p class="cooldown"></p>
						<p class="spell_description"></p>
					</div>
				</div>	
				<div class="slot_container" data-id ="2">
					<h3>SLOT 2</h3>
					<div class="slot_row_icon">
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
					</div>
					<div class="Spell_text_container">
						<h4 class="spell_name"></h4>
						<p class="cooldown"></p>
						<p class="spell_description"></p>	
					</div>
				</div>
				<div class="slot_container" data-id ="3">
					<h3>SLOT 3</h3>
					<div class="slot_row_icon">
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
					</div>
					<div class="Spell_text_container">
						<h4 class="spell_name"></h4>
						<p class="cooldown"></p>
						<p class="spell_description"></p>
					</div>
				</div>		
				<div class="slot_container" data-id ="4">
					<h3>SLOT 4</h3>
					<div class="slot_row_icon">
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
						<img class="spell_icon" src="#" alt="spell_icon"></img>
					</div>
					<div class="Spell_text_container">
						<h4 class="spell_name"></h4>
						<p class="cooldown"></p>
						<p class="spell_description"></p>
					</div>
				</div>		
			</div>			
		</section>

		<!-- FOOTER -->
		<?php include("header_footer/footer.php"); ?>	

	</div>

	<script src="../javascript/tools/get-data.js"></script>
	<script src="../javascript/obj/game_object.js"></script>
	<script src="../javascript/script_squad.js"></script>

</body>
</html>
