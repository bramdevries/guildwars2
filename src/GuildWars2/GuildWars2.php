<?php

namespace GuildWars2;

class GuildWars2{

	/**
	* Base URL for our API requests
	*/
	const URL = "https://api.guildwars2.com/";

	const VERSION = "v1";

	/**
	* What language to return the data in (defaults to english).
	*/
	protected $language = "en";
	protected $supported_languages = array("en", "es", "fr", "de");

	public function __construct($options = array()){
		if(!empty($options['language']))
			$this->setLanguage($options['language']);
	}

	/**
	* Static: API methods that return static data.
	*/

	public function mapNames(){
		return $this->get('map_names');
	}

	public function worldNames(){
		return $this->get('world_names');
	}

	public function eventNames(){
		return $this->get('event_names');
	}

	public function build(){
		return $this->get("build");
	}

	public function colors(){
		return $this->get('colors');
	}

	/**
	* Events: API methods that return data about events
	*/

	public function events($params){
		$supported_parameters = array('world_id', 'event_id', 'map_id');
		$param_string = "";

		foreach ($params as $key => $param) {
			if(in_array($key, $supported_parameters))
				$param_string .= "&" . $key . "=" . $param;
		}

		return $this->get('events', $param_string);
	}

	public function event($id = ""){

		$param_string = "";
		if($id)
			$param_string = "&event_id=" . $id;

		return $this->get('event_details', $param_string);
	}

	/**
	* WvW: API methods that return data about World vs World
	*/

	public function matches(){
		return $this->get("wvw/matches");
	}

	public function match($id){
		return $this->get('wvw/match_details', "&match_id=" . $id);
	}

	public function objectives(){
		return $this->get('wvw/objective_names');
	}

	/**
	* Items & Recipes: API methods that return data about items and recipes
	*/

	public function items(){
		return $this->get('items');
	}

	public function item($id){
		return $this->get('item_details', "&item_id=" . $id);
	}

	public function recipes(){
		return $this->get('recipes');
	}

	public function recipe($id){
		return $this->get('recipe_details', "&recipe_id=" . $id);
	}

	/**
	* Guilds: API methods that return data about guilds
	*/

	public function guildByName($name){
		$name = str_replace(" ", "%20", $name);
		return $this->get('guild_details', "&guild_name=" . $name);
	}

	public function guildById($id){
		return $this->get('guild_details', "&guild_id=" . $id);
	}

	/**
	* cURL: GET method
	*/

	private function get($endpoint, $params = ""){

		$url = self::URL . self::VERSION . "/" . $endpoint . ".json?lang=" . $this->getLanguage() . $params;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
		$response = curl_exec($ch);
		curl_close($ch);

		$results = json_decode($response, true);
		return $results;
	}

	/**
	* Language: Getter & Setter
	*/

	private function setLanguage($lang){
		if(in_array($lang, $this->supported_languages))
			$this->language = $lang;
	}

	public function getLanguage(){
		return $this->language;
	}
}