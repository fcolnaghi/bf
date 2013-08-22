<?php

class DB {
	
	private static $instance = null;
	
	public static function getInstance() {
		if(!isset(self::$instance)) {
			self::$instance = new PDO("sqlite:".ROOT_DB."db/development.db");
			self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		
		return self::$instance;
	}	

}

?>