<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper"> 
         
        <?php 
        $pageid = 'blog';
        
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th> 
                                        <th>Views</th> 
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->data[1] as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td> 
                                            <a class='badge   btn-primary' href='/blog/<?php echo $row['blog_slug'] ?>' target='_blank' 
                                                ><?= substr($row['blog_title'], 0, 55) ?>...</a> </td>
                                        <td><?= $row['blog_views'] ?>  </td>
                                        <td> <a class='badge   btn-success' href='/<?= PROFILE_NAV ?>/blog/edit/<?php echo $row['blog_ID'] ?>'><i class='fa fa-pencil'></i> Edit</a> </td>
                                      
                                        <td><a href='#' rel='<?php echo $row['blog_ID'] ?>' img='<?php echo $row['blog_image'] ?>' class='badge badge-danger del_blog'><i class='fa fa-trash'></i> Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>
                     
                     
                     <div class="clearfix <?php echo empty($this->data[0]) ? "hidden" : ""; ?>">
                        <ul class="pagination table-responsive">
                            <li class="page-item">
                                <?php $pg = PROFILE_NAV;  ?>
                                <a href='/<?= $pg ?>/blog/?pg=<?= $this->currentpage > 1 ? $this->currentpage - 1 : 1; ?>' class="page-link">Previous</a>
                            </li>
                            <?php  
                                   
                                for($currentPage = 1; $currentPage <= ceil($this->data[0] / $this->_company['user_loop_sequence']); $currentPage++){
                                    echo"
                                    <li class='page-item'><a href='/$pg/blog/?pg=$currentPage' class='page-link'> $currentPage </a></li>";
                                }
                            
                                if ( (ceil($this->data[0] / $this->_company['user_loop_sequence'])) > ($_GET['pg'] ?? 1) )  {  
                            ?>
                            
                            <li class="page-item"><a href='/<?= $pg ?>/blog/?pg=<?= $this->currentpage + 1; ?>' class="page-link ">Next</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
    
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?> 
        <script type="text/javascript">
          
            
            $(function() {
                 
                
                $('.del_blog').click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    form.append('img', $(this).attr('img') );
                    if (confirm("Are you sure?")) {
                        const data = _data(form, 'del_blog');
                        
                        alert(data['msg']);
                        location.reload();
                    }
                });
            })
        </script>
    
    </main> 
 
</body>

</html>

