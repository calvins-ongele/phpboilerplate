<?php

//use phpDocumentor\Reflection\Types\Parent_;

class Blog extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($url = null) {   
        $this->view->currentpage = $_GET['pg'] ?? 1;
		$this->view->pid = 'blog'; 
        
        if ( !empty($url) ) { 
          $this->view->blog = $this->model->getblog( $url );
		  $this->view->title =  $this->view->blog[0]['blog_title']  ;
		  if ($this->view->blog === false) {
		      $this->view->render('err/index', true);
		      retrun;
		  }
          $this->view->render('blog/read');
		  return;
        }  
        
        
        $this->view->blog = $this->model->getblog( );
		$this->view->title =  'Blog & Creative Content ' ; 
        $this->view->render('blog/index');
    }
    
   
    
    public function categories($url = null) {
        $this->view->currentpage = $_GET['pg'] ?? 1;
		$this->view->pid = 'blog';
        
        if (empty($url)) { 
              $this->view->blog = $this->model->getblogcategories(   );
    		  $this->view->title =   'Categories' ;
              $this->view->render('blog/categories');
              return;
        }
        
          $this->view->blog = $this->model->getblogcategories( $url );
		  $this->view->title =  $this->view->blog[0]['bc_name'] ;
          $this->view->render('blog/view-categories');
    }
      















    //////////////////////////////////////////////////

}
