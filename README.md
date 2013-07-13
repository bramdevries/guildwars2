# Guild Wars 2 API

## Usage
### Initialize
	<?php

	use GuildWars2\GuildWars2;
	$gw2 = new GuildWars2(); // Create an instance of the wrapper
	
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

## Roadmap

### V 0.0.1
* Basic logic for GET requests.
* Methods for getting the static data (map and world names)

### V 0.0.2
* Methods for getting events and WvW and items

### V 0.0.3
* Add error messages

### V 0.0.4
* Add Caching

### V 1.0.0
* Methods for all endpoints that exist at Saturday 13th July 2013.