<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?> 
     <style>
        .star {
          font-size: 2rem;
          color: lightgray;
          cursor: pointer;
        }
    
        .star.selected {
          color: gold;
        }
      </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'users'; 
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
            <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
                <h3  >Subscribers</h3> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>From</th>
                                        <th>Email</th>  
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->subs[1] as $row) { $i++;  
                                        echo "
                        					<tr style='text-align:center;'>
                        						<td style='border: 1px solid black;'> " . $i . " </td>
                        						<td style='border: 1px solid black;'> " . date('Y-m-d',$row['s_date']) . " </td>
                        						<td style='border: 1px solid black;'> " .  $row['s_email']  . " </td> 
                        						<td style='border: 1px solid black;'> <a href='#' class='dropsubscriber btn btn-sm btn-warning' rel='{$row['s_ID']}' 
                        						>Delete</a> </td>
                        					</tr>
                        				";
                                    
                                    
                                     } ?>
                                </tbody>
                            </table>
                             
                        </div>
                        
                        
                     <div class="clearfix <?php echo empty($this->subs[0]) ? "hidden" : ""; ?>">
                        <ul class="pagination table-responsive">
                            <li class="page-item">
                                <?php $pg = PROFILE_NAV;  ?>
                                <a href='/<?= $pg ?>/users/subscribers/?pg=<?= $this->currentpage > 1 ? $this->currentpage - 1 : 1; ?>' class="page-link">Previous</a>
                            </li>
                            <?php   
                                for($currentPage = 1; $currentPage <= ceil($this->subs[0] / $this->_company['user_loop_sequence']); $currentPage++){
                                    echo"
                                    <li class='page-item'><a href='/$pg/users/subscribers/?pg=$currentPage' class='page-link'> $currentPage </a></li>";
                                }
                            
                                if ( (ceil($this->subs[0] / $this->_company['user_loop_sequence'])) > $_GET['pg'] ?? 1 )  {  
                            ?>
                            
                            <li class="page-item"><a href='/<?= $pg ?>/users/subscribers/?pg=<?= $this->currentpage + 1; ?>' class="page-link ">Next</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
   
        <?php require ADMIN.'includes/footer.inc.php' ?> 
        <script>
            $(function() {
                $('.dropsubscriber').click(function(e) {
                    e.preventDefault();
                    let form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    
                    if (confirm("Are you sure?")) {
                        const data = _data(form, 'dropsubscriber');
                        alert(data['msg']);
                        location.reload();
                    }
                });
                
               
            })
        </script>
  
    </main> 
 
</body>

</html>
