<?php 
class Dashboard_Model extends Model {
    public function __construct()
    {
        parent::__construct(); 
    }
 
      public function getsubs() {
        return [$this->_get("subscribers " )[0], $this->_get("subscribers order by s_ID desc {$this->pagination()}" )[1] ];
    }
    
    public function users($id = '') {
        if (!empty($id)) {
            return $this->_get('users', 'id', [$id], 0 )[1];
        }
        return [$this->_get("users " )[0], $this->_get("users order by id desc {$this->pagination()}" )[1] ];
    }
    
    public function getlogs($max) {  
        return $this->_get('logs left join users on l_by = id ', '', [  ], true, " order by l_ID desc limit $max" )[1];
    }
    
    public function getcontacts($status = 'current', $id = '') { 
        if (!empty($id)) {
            return $this->_get('contactus   ', 'id', [ $id  ], false )[1];
        }  
        $data = [$this->_get("contactus ", 'status', [ $status  ] )[0], $this->_get("contactus ", 'status', [ $status  ], 1, "order by id desc {$this->pagination()} ")[1] ] ; 
         
        return $data;
    } 
    
    public function totalblogs() {
	$output = [];
        $blog = $this->_get("blog left join blog_categories on blog_ID=bc_ID order by blog_ID desc {$this->pagination()}")[1];
        foreach($blog as $row) {
            $row['blog_views'] = $this->_get('analytics', '( page_url REGEXP ? )', [ "/blog/" . preg_quote($row['blog_slug'], '/') . "(/|$|\\?)" ])[0];
            $output[] = $row; 
        }
        
        return [$this->_get("blog left join blog_categories on blog_ID=bc_ID ")[0], $output ];
	    
        //return [$this->_get("blog left join blog_categories on blog_ID=bc_ID ")[0], $this->_get("blog left join blog_categories on blog_ID=bc_ID order by blog_ID desc {$this->pagination()}")[1] ];
    }
    

    public function editpost($id) {
        return $this->_get('blog ', 'blog_ID', [ $id ], false)[1];
    }
    public function gettags($id) {
        $tags = $this->_get('tags left join post_tags on tags.tag_id = post_tags.tag_id  ', 'post_id', [ $id ], true )[1];
        return $tags;
    }
  
    
    public function getCategories($ajax = null) {
        
	    return $this->_get('blog_categories')[1];
		
    }
    
    public function getsummaries() { 
    
        return [
            'users' => $this->_getmore('users', 'count(id)', 'id >', [0]),
            'contact'=>$this->_getmore('contactus', 'count(id)', 'id > ', [0]),
            'visits'=>$this->_getmore('analytics', 'count(id)', 'id > ', [0]),
            
            ];
    }
 
     





    ///////////////////
}

