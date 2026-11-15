<?php

class Auth {
	public static function handleAdminLogin($dest = null){
		Session::init();
		
		if ((Session::get('userid') == null) || (Session::get('role') !== 'Admin' ) ) {
			Session::destroy(); 
			//Session::set('await_login', $_SERVER["REQUEST_URI"]);
			CustomFunctions::locate('/');
			exit;
		}
 
	}

	 
	public static function handleLogin() {
		Session::init();
		 
		if (Session::get('userid') == null) {
			Session::destroy(); 
			Session::set('await_login', $_SERVER["REQUEST_URI"]);
			CustomFunctions::locate('/');
			exit;
		}

			 
	}



	

}
