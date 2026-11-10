<?php

class Auth {
	public static function handleAdminLogin($dest = null){
		Session::initialize();
		
		if ((Session::get('userid') == null) || (Session::get('role') !== 'Admin' ) ) {
			session_destroy();
			Session::initialize();
			//Session::set('await_login', $_SERVER["REQUEST_URI"]);
			CustomFunctions::redirect('/');
			exit;
		}
 
	}

	 
	public static function handleLogin() {
		Session::initialize();
		if (isset($_COOKIE['tkuvn'])) {
			CustomFunctions::redirect('/account/auth/' .  $_SERVER["REQUEST_URI"]);
			return;
		}  
		if (Session::get('userid') == null) {
			session_destroy();
			@session_start();
			Session::set('await_login', $_SERVER["REQUEST_URI"]);
			CustomFunctions::redirect('/');
			exit;
		}

			 
	}



	

}
