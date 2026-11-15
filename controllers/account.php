<?php 

class Account extends Controller {

    function __construct() {
        parent::__construct();
        
    }

    public function index() {  
	if ($this->view->_settings['user_can_login'] != 1) {
            CustomFunctions::locate('/account/not-found');die; 
        }
          if (Session::get('email') != null) CustomFunctions::locate('/dashboard'); 
        
		  $this->view->title =   'Login ' ;
		  $this->view->render('account/login');
    }
     
    public function login() {   
        CustomFunctions::locate('/account'); 
    }
   
    public function verifyemail() {   
        CustomFunctions::locate('/account/verify-email'); 
    }
    public function verifytel() {   
        CustomFunctions::locate('/account/verify-tel'); 
    }
    
    public function signup() {   
	if ($this->view->_settings['user_can_signup'] != 1) {
            CustomFunctions::locate('/account/not-found');die; 
        }
          if (Session::get('email') != null) CustomFunctions::locate('/dashboard'); 
            
		  $this->view->title =   'Create a new account ' ;
		  $this->view->render('account/register'); 
    }
   
    public function forgotpassword() {
          if (Session::get('email') != null) CustomFunctions::locate('/dashboard'); 
          
		  $this->view->title =   'Forgot Password ' ;
		  $this->view->render('account/forgot-password'); 
    }

    public function newpassword() {   
          if (Session::get('email') != null) CustomFunctions::locate('/dashboard'); 
          
		  $this->view->title =   'Set New Password ' ;
		  $this->view->render('account/new-password'); 
    }










    //////////////////////////////////////////////////

}
