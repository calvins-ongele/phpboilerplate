<?php

//use phpDocumentor\Reflection\Types\Parent_;

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {    
		  $this->view->pid = 'home'; 
          $this->view->latest = $this->model->getblog();    
		  $this->view->title = $this->_settings()['site_name'] ;
		  $this->view->render('index/index' );
    }
    public function search() {
        
           $this->view->search_results = $this->model->search_values(  );
		  $this->view->title = 'Search' ;
		  $this->view->render('index/search');
    }
     
    










    //////////////////////////////////////////////////

}

