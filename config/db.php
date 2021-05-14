<?php

class Database {
	public static function connect() {
		$db = new Mysqli('localhost', 'root', 'root', 'proyectomvc');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}