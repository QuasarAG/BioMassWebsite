function Hero(nick, story, portrait_dir, isSelected, spells) 
{
	this.nick = nick;
	this.story = story;
	this.portrait_dir = portrait_dir;
	this.isSelected = isSelected;	
	this.spells = spells;
}

function Spell(nick, description, icon_dir, isPassive, cooldown, ownerID) 
{
	this.nick = nick;
	this.description = description;
	this.icon_dir = icon_dir;
	this.isPassive = isPassive;
	this.cooldown = cooldown;
	this.ownerID = ownerID - 1;
}


function Boss(nick, portrait_dir) 
{
	this.nick = nick;
	this.portrait_dir = portrait_dir;
	
}

function createHero(dataHolder, index)
{
	newHero = new Hero(
		dataHolder[index].nick,
		dataHolder[index].story,
		dataHolder[index].portrait_dir,
		false,
		[]);

	return newHero;
}


function createSpell(dataHolder, index)
{
	newSpell = new Spell(
		dataHolder[index].nick,
		dataHolder[index].description,
		dataHolder[index].icon_dir,
		dataHolder[index].isPassive,
		dataHolder[index].cooldown,
		dataHolder[index].ownerID);

	return newSpell;
}


function createBoss(dataHolder, index)
{
	newBoss = new Boss(
		dataHolder[index].nick,
		dataHolder[index].portrait_dir);

	return newBoss;
}