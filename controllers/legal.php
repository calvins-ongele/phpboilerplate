<?php
 

class Legal extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index($pid = '') {  
          $this->view->page_id = $pid;
		  $this->view->title =  'Legal';
		  $this->view->render('legal/index');
    }
     
      
    















    //////////////////////////////////////////////////

}
