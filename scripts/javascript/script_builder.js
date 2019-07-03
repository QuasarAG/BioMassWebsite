$.Elements = {};

$.Elements.heroes = [];
$.Elements.spells = [];
$.Elements.bosses = [];

var Hero1Spells = [0, 0, 0, 0];
var Hero2Spells = [0, 0, 0, 0];
var Hero3Spells = [0, 0, 0, 0];
var Hero4Spells = [0, 0, 0, 0];
var HeroesSelectedSpells = [Hero1Spells, Hero2Spells, Hero3Spells, Hero4Spells]

var nbrSpells = 80;
var nbrHeros = 4;
var nbrBosses = 10;
var nbrSpellSlot = 4;
var nbrSpellBySlot = 5;

var isSelectorDisplayed = false;
var selectedSpellSlot = 0;
var SelectedHeroColumn = 0;
var selectedBoss = 0;

var buildLink="";

function GenerateBuilLink()
{
	var BuildSerial="";

	heroSerial ="";
	for (var i = 0 ; i < nbrHeros; i++)
	{
		heroSerial += "_";

		for (var j = 0 ; j < nbrSpellSlot; j++)
		{
			heroSerial += HeroesSelectedSpells[i][j].toString(); 
		}
	}
	
	BuildSerial = window.location.origin + window.location.pathname + "?build=" + selectedBoss + heroSerial + "/";
	return BuildSerial;
}

function onLoad_DataDisplay()
{
	// Link spell to their owner
	$.Elements.spells.forEach(function(spell)
	{
		$.Elements.heroes[spell.ownerID].spells.push(spell);
	});

	//Display Boss portrait	
	$(".boss_portrait").each(function()
	{
		var index = $(this).index();
		$(this).attr("src", $.Elements.bosses[index].portrait_dir);		
	});

	//If there is a buildlink to decrypt display it
	
	BuildReader(); 
	DisplayHeroColumn();
	DisplaySelectedSpells();
	HighlightSelectedBoss();
	UpdateBuildLinkField();
}



function $_GET(param) 
{
	var vars = {};
	window.location.href.replace( location.hash, '' ).replace( 
		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
		function( m, key, value ) 
		{ // callback
			vars[key] = value !== undefined ? value : '';
		});

	if ( param ) {
		return vars[param] ? vars[param] : null;	
	}
	return vars;
}



function DisplayHeroColumn()
{
	$(".hero_column").each(function()
	{
		var heroIndex = $(this).index();

		$(this).css("background-image", "url(../../images/icons/heroes/hero_ico"+(heroIndex+1)+".png)");
		var rgbaCol = 'rgba(1,255,255, 0.5)';
	});

	
}


function GetAllData()
{
	//Get all data related to heroes
	getData("../php/load_heroes.php", function(data) 
	{ 
		var a = callbackData(data);

		for (i = 0; i < nbrHeros; i++) 
		{
			var newHero;
			newHero = createHero(a, i);
			$.Elements.heroes.push(newHero);
		}


		// Then proceed to to the same for spells
		getData("../php/load_hero_spell.php", function(data) 
		{ 
			var a = callbackData(data);

			for (i = 0; i < nbrSpells; i++) 
			{
				var newSpell;
				newSpell = createSpell(a, i);
				$.Elements.spells.push(newSpell);
			}



			//Then proceed to to the same for bosses
			getData("../php/load_bosses.php", function(data) 
			{ 
				var a = callbackData(data);

				for (i = 0; i < nbrBosses; i++) 
				{
					var newBoss;
					newBoss = createBoss(a, i);
					$.Elements.bosses.push(newBoss);
				}

					//Finally load and display related icons/texts
					onLoad_DataDisplay();
				});
		});	
	});
}

function TooltipPositionUpdate(e)
{
	var tooltipWidth = parseInt($('#tooltip').css('width'),10);
	var tooltipHeight = parseInt($('#tooltip').css('height'),10);

	var viewportWidth = $(window).width();
	var viewportHeight = $(window).height();

	if(e.pageX >= viewportWidth - tooltipWidth)
	{
		$('#tooltip').css('left', e.pageX - tooltipWidth - 25);
	}
	else
	{
		$('#tooltip').css('left', e.pageX + 10);
	}

	if(e.pageY >= viewportHeight - tooltipHeight)
	{
		$('#tooltip').css('top', e.pageY - tooltipHeight - 20)
	}
	else
	{
		$('#tooltip').css('top', e.pageY)
	}

	$('#tooltip').css('display', 'block');
}

function SpellSelectorPositionUpdate(target, e)
{
	$('#spell_selector_container').css('display', 'none');

	var targetPosition = target.position();

	var topOffset = -43.0;
	var leftOffset = -60.0;

	$('#spell_selector_container').css('top', targetPosition.top + topOffset);
	$('#spell_selector_container').css('left', targetPosition.left + leftOffset );

	$('#spell_selector_container').css('display', 'block');

}

function TooltipManager()
{
	//BOSS
	$(".boss_portrait").mousemove(function(e) 
	{ 	
		$('#tooltip > #description').text("");
		$('#tooltip > #name').text($.Elements.bosses[$(this).index()].nick);
		$('#tooltip > #cooldown').text("");

		TooltipPositionUpdate(e);

	});

	$(".boss_portrait").mouseout(function() { 
		$('#tooltip').css('display', 'none');
	});




	//CAPACITY SLOT
	$(".capacity_slot").mousemove(function(e) 
	{ 	
		var heroIndex = $(this).parent().index();
		var slot = $(this).index();

		var spellIndex = HeroesSelectedSpells[heroIndex][slot] + slot * nbrSpellBySlot;

		var name = $.Elements.heroes[heroIndex].spells[spellIndex].nick;
		var cooldown = $.Elements.heroes[heroIndex].spells[spellIndex].cooldown;
		var description = $.Elements.heroes[heroIndex].spells[spellIndex].description;

		$('#tooltip > #name').text(name);
		$('#tooltip > #cooldown').text(cooldown);
		$('#tooltip > #description').text(description);

		TooltipPositionUpdate(e);

	});


	//Spells in spell selector
	$(".spell_icon").mousemove(function(e) 
	{ 	
		var slot = $(this).index();
		var spellIndex = slot + selectedSpellSlot * nbrSpellBySlot;

		var name = $.Elements.heroes[SelectedHeroColumn].spells[spellIndex].nick;

		var cooldown;
		if ($.Elements.heroes[SelectedHeroColumn].spells[spellIndex].isPassive == 1) 
		{
			$("#tooltip > #cooldown").css("color", "rgb(0, 255, 0)");
			cooldown = "Passive Ability";
		}
		else
		{
			$("#tooltip > #cooldown").css("color", "rgb(255, 255, 255)");
			cooldown = "Cooldown : "+ $.Elements.heroes[SelectedHeroColumn].spells[spellIndex].cooldown.toString() + " sec";
		}

		var description = $.Elements.heroes[SelectedHeroColumn].spells[spellIndex].description;

		$('#tooltip > #name').html(name);
		$('#tooltip > #cooldown').html(cooldown);
		$('#tooltip > #description').html(description);

		TooltipPositionUpdate(e);
	});

	$(".boss_portrait, .capacity_slot, .spell_icon").mouseout(function() { 
		$('#tooltip').css('display', 'none');
	});
}

function UpdateSpellSelector(target, heroIndex, spellSlotIndex)
{
	$(".spell_icon").each(function(e)
	{
		var spellIndex = $(this).index();
		var spellPathIndex = spellIndex + spellSlotIndex * nbrSpellBySlot;

		var ImagePath = $.Elements.heroes[heroIndex].spells[spellPathIndex].icon_dir;
		$(this).attr("src", ImagePath);

	});
}

function SetSelectedSpell()
{
	$("#spell_selector_icons").on("click", ".spell_icon", function(e)
	{
		var spellIndex = $(this).index();

		HeroesSelectedSpells[SelectedHeroColumn][selectedSpellSlot] = spellIndex;

		$('#spell_selector_container').css('display', 'none');

		isSelectorDisplayed = false;

		DisplaySelectedSpells();
		UpdateBuildLinkField();

	});
}

function DisplaySelectedSpells()
{
	$(".hero_column").each(function()
	{
		var heroIndex = $(this).index();

		$(this).children(".capacity_slot").each(function()
		{	
			var slot = $(this).index();
			var spellIndex = HeroesSelectedSpells[heroIndex][slot] + slot * nbrSpellBySlot;
			$(this).attr("src", $.Elements.heroes[heroIndex].spells[spellIndex].icon_dir);
		});
	})
}

function SpellSelectorManager()
{
	$(".hero_column").on("click", ".capacity_slot", function(e)
	{
		// $(".capacity_slot").each(function()
		// {
		// 	$(this).css("border-color", "blue");
		// });

		var heroIndex = $(this).parents(".hero_column").data("id");
		var spellSlotIndex = $(this).index();

		//Global Var update
		selectedSpellSlot = spellSlotIndex;
		SelectedHeroColumn = heroIndex;

		// console.log(SelectedHeroColumn, selectedSpellSlot);

		// $(this).css("border-color", "red");

		UpdateSpellSelector($(this), heroIndex, spellSlotIndex);
		SpellSelectorPositionUpdate($(this), e);

	});

	$(document).mouseup(function(e) 
	{
		var container = $("#spell_selector_container");

   		// if the target of the click isn't the container nor a descendant of the container
   		if (!container.is(e.target) && container.has(e.target).length === 0) 
   		{
   			container.hide();
   		}
   	});
}

function BossPortraitBehavior()
{
	$(".boss_portrait").click(function()
	{	
		selectedBoss = $(this).index();

		HighlightSelectedBoss();
		UpdateBuildLinkField();
	});
}

function BuildReader()
{
	buildLink = $_GET('build');

	// console.log(buildLink);
	if (buildLink != null)
	{
		selectedBoss = buildLink.substr(0, buildLink.indexOf('_')); 

		var charIndexes =[];

		// search start position of each hero in string
		for(var i=0; i<buildLink.length;i++)
		{
			if (buildLink[i] === "_") charIndexes.push(parseInt(i)+1);
		}
		//Link build from url to the current page
		for (var i = 0; i < nbrHeros; i++) 
		{
			for (var j = 0; j < nbrSpellSlot; j++) 
			{
				HeroesSelectedSpells[i][j] = parseInt(buildLink.charAt(charIndexes[i]+j));		
			}
		}
	}
}


function HighlightSelectedBoss()
{
	//Highlight Selected Boss encounter
	$(".boss_portrait").each(function()
	{
		if ($(this).index() == selectedBoss)
		{
			$(this).css("border-color", "red");
		}
		else
		{
			$(this).css("border-color", "blue");
		}
	});
}


function copyToClipboard()
{
	/* Get the text field */
	var copyText = document.getElementById("build_serial");

	/* Select the text field */
	copyText.select();

	/* Copy the text inside the text field */
	document.execCommand("copy");
} 

function UpdateBuildLinkField()
{
	$("#build_serial").attr("value", GenerateBuilLink());
}

//ON PAGE LOAD
$(document).ready(function()
{

	GetAllData();

	TooltipManager();
	SpellSelectorManager();
	BossPortraitBehavior();

	
	SetSelectedSpell();
});

