<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>  
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'awards'; 
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
            <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
                <?php $status = $_GET['status'] ?? 'current'; ?>
                <a href='/dashboard/reports/contacts?status=<?= $status=='current'?'completed':'current'  ?>'   class='btn btn-sm btn-primary ' >Support Tickets (View <?= $status=='current'?'completed':'current' ?>)</a>
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name(Email)</th>
                                        <th>Phone</th> 
                                        <th>Subject</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $i = 0; foreach($this->msg[1] as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td> <?= "{$row['name']} ({$row['email']})" ?> 
                                        
                                            <a class=' btn btn-sm btn-secondary ' href='/dashboard/reports/contacts?ticket_id=<?php echo $row['id'] ?>'  
                                            ><i class='fa fa-eye'></i> more</a>
                                        
                                        </td>
                                        <td> <?php echo $row['phone'] ?> </td>
                                        <td> <?php echo $row['subject'] ?> </td>
                                         
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>
                        
                        
                     <div class="clearfix <?php echo empty($this->msg[0]) ? "hidden" : ""; ?>">
                        <ul class="pagination table-responsive">
                            <li class="page-item">
                                <?php $pg = PROFILE_NAV;  ?>
                                <a href='/<?= $pg ?>/reports/contacts/?pg=<?= $this->currentpage > 1 ? $this->currentpage - 1 : 1; ?>' class="page-link">Previous</a>
                            </li>
                            <?php   
                                for($currentPage = 1; $currentPage <= ceil($this->msg[0] / $this->_company['user_loop_sequence']); $currentPage++){
                                    echo"
                                    <li class='page-item'><a href='/$pg/reports/contacts/?pg=$currentPage' class='page-link'> $currentPage </a></li>";
                                }
                            
                                if ( (ceil($this->msg[0] / $this->_company['user_loop_sequence'])) > ($_GET['pg'] ?? 1) )  {  
                            ?>
                            
                            <li class="page-item"><a href='/<?= $pg ?>/reports/contacts/?pg=<?= $this->currentpage + 1; ?>' class="page-link ">Next</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?> 
         
    </main> 
 
</body>

</html>
