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

	public function __construct($options){
		$this->setLanguage($options['language']);
	}

	/**
	* API Methods
	*/

	public function maps(){
		return $this->get('map_names');
	}

	public function worlds(){
		return $this->get('world_names');
	}

	/**
	* cURL: Get method
	*/

	private function get($endpoint){

		$url = self::URL . self::VERSION . "/" . $endpoint . ".json?lang=" . $this->getLanguage();

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