# Guild Wars 2 API

## Usage
### Initialize
	<?php

	use GuildWars2\GuildWars2;
	$gw2 = new GuildWars2(); // Create an instance of the wrapper

	$gw2 = new GuildWars2(array(
		"language" => "fr"  // Create an instance of the wrapper, returning data in french
	));

### Static data

	$gw2->mapNames(); // Returns a list of all currently available areas.

	$gw2->worldNames(); // Returns a list of all available worlds.

	$gw2->eventNames(); // Returns a list of all events.

	$gw2->build(); // Returns the current game build.

	$gw2->colors(); // Returns all dye colors and their RGB/HSL values

### Events

**Parameters**

* world_id
* map_id
* event_id

**You have to provide atleast one of these parameters!**


Returns all events with their current status on the provided world.

	$gw2->events(array(
		"world_id" => 1003
	));

Returns all events with their current status on all worlds happening in the provided map.

	$gw2->events(array(
		"map_id" => 73
	));

You can also mix parameters

Returns all events with their current status on the provided world happening in the provided map.

	$gw2->events(array(
		"world_id" => 1003,
		"map_id" => 73"
	));

Get's detailed information (location, name, level) of all events.

	$gw2->event(); // All events

	$gw2->event("EED8A79F-B374-4AE6-BA6F-B7B98D9D7142") // One event

### World vs World

	$gw2->matches(); // Returns all current matches.
	$gw2->match("2-9") // Returns information about a match (score, keeps)
	$gw2->objectives() // Returns all objectives

### Items & Recipes
	$gw2->items(); // Returns a list of all items discovered by players in the game
	$gw2->item(12546) // Returns information about an item.

	$gw2->recipes() // Returns a list of all recipes discovered by players in the game.
	$gw2->recipe(3491) // Returns information about a recipe.

### Guilds

	$gw2->guildByName("The Karma Initiative")	// Returns info about a guild.

## Changelog

### V 0.3.0
* Added methods for getting events, WvW, items, recipes and guilds

### V 0.2.0
* Added basic logic for GET requests.
* Added methods for getting the static data (map and world names)

## Roadmap
* Provide methods for tile api
* Cache static data like worldNames.