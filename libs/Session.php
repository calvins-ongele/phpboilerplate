<?php

class Session
{
	
	public static function initialize() {
		@session_start();
	}
	
	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}
	
	public static function get($key) {
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	public static function reset($key, $value) {
		// unset first
		unset($_SESSION[$key]);
		// then set
		$_SESSION[$key] = $value;
	}
	
	public static function destroy() {
		unset($_SESSION);
		session_destroy();
	}
	
	
}