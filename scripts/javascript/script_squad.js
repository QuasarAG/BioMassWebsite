$.Elements = {};

$.Elements.heroes = [];
$.Elements.spells = [];


var nbrSpells = 80;
var nbrHeros = 4;
var nbrSpellBySlot = 5;

var selectedHero;
var defaultHeroIndex = 0;



function HighlightSelection(element, index)
{
	if (element.index()===index) 
	{
		element.css("border-top-color", "red");
		element.css("border-right-color", "red");
		element.css("border-left-color", "red");
		element.css("border-bottom-color", "red");
		element.css("border-bottom-width", "12px");
	}
	else
	{
		element.css("border-top-color", "blue");
		element.css("border-right-color", "blue");
		element.css("border-left-color", "blue");
		element.css("border-bottom-color", "blue");
		element.css("border-bottom-width", "2px");
	}
}

function setSelectedHero(index)
{
	selectedHero = $.Elements.heroes[index];

	$(".hero_portrait").each(function()
	{
		HighlightSelection($(this), index);
	});
}


function setSelectedSpell(slotContainer, index)
{
	slotContainer.find(".spell_icon").each(function()
	{
		HighlightSelection($(this), index)
	});	
}



function onLoad_DataDisplay()
{
	// Link spell to their owner
	$.Elements.spells.forEach(function(spell)
	{
		$.Elements.heroes[spell.ownerID].spells.push(spell);
	});

	// Page will display info and spell from the first hero of the list
	setSelectedHero(defaultHeroIndex);

	// Display Heroes info	
	$(".hero_portrait").each(function()
	{
		var index = $(this).index();
		$(this).attr("src", $.Elements.heroes[index].portrait_dir);		
	});

	// Display HERO1 info by default
	$("#hero_name").html(selectedHero.nick);
	$("#hero_story").html(selectedHero.story);

	// Display Spells Icon of HERO 1 by default
	$(".spell_icon").each(function()
	{
		var parent = $(this).parents(".slot_container");
		var slotIndex = $(this).parents(".slot_container").data("id");
		var index = $(this).index() + ((slotIndex - 1) * nbrSpellBySlot);

		setSelectedSpell(parent, 0);
		$(this).attr("src", selectedHero.spells[index].icon_dir);
	});

	//Display Spells info of HERO 1	 by default
	$(".slot_container").each(function()
	{
		var index = ($(this).index() - 1) * nbrSpellBySlot;

		var tempNick = selectedHero.spells[index].nick;
		var tempDescription = selectedHero.spells[index].description;
		var tempIsPassive = selectedHero.spells[index].isPassive;
		var tempCooldown = selectedHero.spells[index].cooldown;

		$(this).find(".spell_name").html(tempNick);
		$(this).find(".spell_description").html(tempDescription);

		if (tempIsPassive == 1) 
		{
			$(this).find(".cooldown").css("color", "rgb(0, 255, 0)");
			$(this).find(".cooldown").html("Passive Ability");
		}
		else
		{
			$(this).find(".cooldown").css("color", "rgb(255, 255, 255)");
			var cooldownString = "Cooldown : " + selectedHero.spells[index].cooldown.toString() + " sec";
			$(this).find(".cooldown").html(cooldownString);
		}
	});
}


function GetAllData()
{
	//Get all data related to heroes
	getData("../php/load_heroes.php", function(data) 
	{ 
		var a = callbackData(data);

		for (i = 0; i <= nbrHeros - 1; i++) 
		{
			var newHero;
			newHero = createHero(a, i);
			$.Elements.heroes.push(newHero);
		}


		//Then proceed to to the same for spells
		getData("../php/load_hero_spell.php", function(data) 
		{ 
			var a = callbackData(data);

			for (i = 0; i <= nbrSpells - 1; i++) 
			{
				var newSpell;
				newSpell = createSpell(a, i);
				$.Elements.spells.push(newSpell);
			}

			//Finally load and display related icons/texts
			onLoad_DataDisplay();
		});
	});
}



function HeroesPortraitBehavior()
{
	//CLICK portrait function
	$("#squad_portraits").on("click", ".hero_portrait", function()
	{
		setSelectedHero($(this).index());

		$("#hero_name").html(selectedHero.nick);
		$("#hero_story").html(selectedHero.story);

		// Update each skill tier with spells owned by selected Hero
		$(".slot_container").each(function()
		{
			$(".spell_icon").each(function()
			{
				var parent = $(this).parents(".slot_container");
				var slotIndex = $(this).parents(".slot_container").data("id");
				var index = $(this).index() + ((slotIndex - 1) * nbrSpellBySlot);

				setSelectedSpell(parent, 0);
				$(this).attr("src", selectedHero.spells[index].icon_dir);
			});

			var index = ($(this).index() - 1) * nbrSpellBySlot;

			var tempNick = selectedHero.spells[index].nick;
			var tempDescription = selectedHero.spells[index].description;
			var tempIsPassive = selectedHero.spells[index].isPassive;
			var tempCooldown = selectedHero.spells[index].cooldown;


			$(this).find(".spell_name").html(tempNick);
			$(this).find(".spell_description").html(tempDescription);

			if (tempIsPassive == 1) 
			{
				$(this).find(".cooldown").css("color", "rgb(0, 255, 0)");
				$(this).find(".cooldown").html("Passive Ability");
			}
			else
			{
				$(this).find(".cooldown").css("color", "rgb(255, 255, 255)");
				var cooldownString = "Cooldown : " + selectedHero.spells[index].cooldown.toString() + " sec";
				$(this).find(".cooldown").html(cooldownString);
			}
		});
	});
}

function SkillIconBehavior()
{
 	//CLICK Spell icon function
 	$(".slot_container").on("click", ".spell_icon", function()
 	{
 		var parent = $(this).parents(".slot_container");
 		var slotIndex = $(this).parents(".slot_container").data("id");

 		var index = $(this).index() + ((slotIndex - 1) * nbrSpellBySlot);

		//Hightlight current selected icon
		setSelectedSpell(parent, $(this).index());

		//Display selecte icon info
		$(parent).find(".spell_name").html(selectedHero.spells[index].nick);
		$(parent).find(".spell_description").html(selectedHero.spells[index].description);

		if (selectedHero.spells[index].isPassive == 1) 
		{
			$(parent).find(".cooldown").css("color", "rgb(0, 255, 0)");
			$(parent).find(".cooldown").html("Passive Ability");
		}
		else
		{
			$(parent).find(".cooldown").css("color", "rgb(255, 255, 255)");
			var cooldownString = "Cooldown : " + selectedHero.spells[index].cooldown.toString() + " sec";
			$(parent).find(".cooldown").html(cooldownString);
		}
	});
 }


//ON PAGE LOAD
$(document).ready(function()
{
	GetAllData();
	
	HeroesPortraitBehavior(); 

	SkillIconBehavior();
	
});



