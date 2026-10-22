<?php 
#[AllowDynamicProperties]
class Dashboard extends Controller {
    public function __construct()
    {
        parent::__construct();
        Session::initialize();
        Auth::handleLogin();
    }

    public function index() {     
        $this->view->users = $this->model->users(); 
        $this->view->more = $this->model->getsummaries(); 
        $this->view->logs = $this->model->getlogs(50) ;
        $this->view->title = ' Dashboard ' ;
        $this->view->render(PROFILE_NAV.'/index');
    } 
      
    public function communicate($action = '', $id = '') { 
        
          if ($this->view->_me['user_role'] != 'Admin') {
              die(CustomFunctions::relocate('/'.PROFILE_NAV.'?unauthorized=true'));
          }
        
         if ($action == 'email') {
	        $this->view->title = "New email";
	        $this->view->render( PROFILE_NAV . '/communicate/email');
	        return;
        }
        
         if ($action == 'sms') { 
	        $this->view->title = "Send SMS";
	        $this->view->render(PROFILE_NAV . '/communicate/sms');
	        return;
        }
         
    }
     
    public function profile() {   
        $this->view->title = 'My profile settings';
        $this->view->render(PROFILE_NAV . '/settings/profile');
    }
    public function company() { 
        
        if ($this->view->_me['user_role'] != 'Admin') {
          die(CustomFunctions::relocate('/'.PROFILE_NAV.'?unauthorized=true'));
        }
      
        $this->view->title = 'Company profile settngs';
        $this->view->render(PROFILE_NAV . '/settings/company');
    }
    
    public function logs() {   
        $this->view->currentpage = $_GET['pg'] ?? 1;
        $this->view->logs = $this->model->getlogs(150); 
        $this->view->title = 'My profile settngs';
        $this->view->render(PROFILE_NAV . '/logs');
    }
    public function changepass() {   
        $this->view->title = 'Change password';
        $this->view->render(PROFILE_NAV . '/settings/changepass');
    }
 
 
    public function users($action = 'all', $n = 0) {
        
        if ($this->view->_me['user_role'] != 'Admin') {
          die(CustomFunctions::relocate('/'.PROFILE_NAV.'?unauthorized=true'));
        }
        
        $this->view->currentpage = $_GET['pg'] ?? 1;
        $this->view->users = $this->model->users();  
        
        
        if ($action == 'new') {
            
            $this->view->title = ' New User ' ;
            $this->view->render(PROFILE_NAV . '/users/new');
            return;
        }
        
        if ($action == 'edit') { 
            
            $this->view->user = $this->model->users($_GET['id']);  
            $this->view->title = ' Edit User ' ;
            $this->view->render(PROFILE_NAV . '/users/edit');
            return;
        }
        if ($action == 'subscribers') {
            $this->view->subs = $this->model->getsubs();
            $this->view->title = ' Subscribers';
            $this->view->render(PROFILE_NAV . '/users/subscribers');
            return;
        }
        
        
        $this->view->title = ' Users';
        $this->view->render(PROFILE_NAV . '/users/index');
    }
 
    public function blog($action = '', $id = null) { 
	    
        if ($this->view->_company['user_can_blog'] != 1) {
            die(CustomFunctions::relocate('/'.PROFILE_NAV.'?unauthorized=true'));
        }
        
        if ( ($this->view->_me['user_role'] != 'Admin') && ($this->view->_company()['user_can_blog'] != 1) ) {
          die(CustomFunctions::relocate('/'.PROFILE_NAV.'?unauthorized=true'.($this->view->_company()['user_can_blog'] != 1) ));
        }
         
        
        $this->view->currentpage = $_GET['pg'] ?? 1;
        $this->view->getCategories = $this->model->getCategories();
        
        if ($action == 'new') {
            $this->view->title = ' New Blog';
            $this->view->render(PROFILE_NAV.'/blog/new');
            return;
        } else if ($action == 'edit') { 
            $this->view->tags = $this->model->gettags( $id );
            $this->view->blog = $this->model->editpost( $id ); 
            $this->view->title = ' Edit Blogs';
            $this->view->render(PROFILE_NAV.'/blog/edit');
            return;
        }
        else if ($action  == 'categories') { 
            $this->view->title = ' Categories';
            $this->view->render(PROFILE_NAV.'/blog/categories');
            return;
        }
        
         
        $this->view->data = $this->model->totalblogs( ); 
        $this->view->title = ' Manage Blogs';
        $this->view->render(PROFILE_NAV.'/blog/index');
        return;
       
    }
 
    public function reports($action = '') {  
        
        
        if ($this->view->_me['user_role'] != 'Admin') {
          die(CustomFunctions::relocate('/'.PROFILE_NAV.'?unauthorized=true'));
        }
           
      if ($action == 'contacts') {
          $this->view->msg = $this->model->getcontacts($_GET['status'] ?? 'current', $_GET['ticket_id'] ?? '' );
          $this->view->title = "Support Tickets ";
          if (!empty($_GET['ticket_id']))
	        $this->view->render(PROFILE_NAV.'/reports/view-ticket');
	      else $this->view->render(PROFILE_NAV.'/reports/contacts');
	      return;
      }
	  $this->view->title = "System Reports ";
	  $this->view->render(PROFILE_NAV.'/reports/system-reports');
    }
 
 
    public function logout() {
        Session::destroy();
        if (!isset($_GET['message'])) CustomFunctions::relocate('/');
        else CustomFunctions::relocate('/account?message=' . urlencode($_GET['message'] ?? '')  );
    }


















    ///////////////////
}
