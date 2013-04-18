<?php
/**
 *@author anirudh
 **************************** Creation Log *******************************
* File Name 	- DBConnect.php
* Description 	- All database connectivity functions are here
* Created by	- Anirudh Pandita 
* Created on 	- March 01, 2013
* **********************Update Log ***************************************
* Sr.NO. Version Updated by 		Updated on	 	Description
* -------------------------------------------------------------------------
**************************************************************************
*/
class DBConnection {
	private static $instance;
	private static $_host = DB_SERVER;
	private static $_user = DB_USER;
	private static $_password = DB_PASSWORD;
	private static $_database = DB_COMMON;
	
	
	
	public static function Connect() {
		
		if (is_null ( DBConnection::$instance )) {
			
			self::$instance = new PDO("mysql:host=".self::$_host.";dbname=".self::$_database,self::$_user,self::$_password);
			
		}
		return self::$instance;
	}
}
	