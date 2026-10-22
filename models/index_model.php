<?php

class Index_Model extends Model {

	public function __construct() {
		parent::__construct();
	} 
  
  public function getblog($category = '' ) {  
      return $this->_get('blog left join blog_categories on blog_category_fk = bc_ID ', '   ', [   ], true, 'order by blog_ID desc limit 10');
  }
 
     
   
		 

	//end of class
}