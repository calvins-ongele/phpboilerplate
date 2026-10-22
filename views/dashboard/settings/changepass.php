<?php
//setcookie('username', '6', time() + (86400 * 30), "/");

?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN. 'includes/header.inc.php' ?>  
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
       
        <?php 
        $pageid = 'settings';
        
        require ADMIN.'includes/sidebar.inc.php' ?>
        
        
        <div class="content-wrapper px-2 py-2">
            <div class="content-header">
                <h1>Change Password</h1>
            </div>
            <div class="content px-2">
                
                <div class='container'><hr></div>
                
                
                <div class='container'> 
                    <?php $me = $this->_me; ?>
                    <form id='changepassword'>
                        <div class='form-group'>
                            <div class='row'>
                                <!--------------------------------->
                                <div class='col-md-12 mb-3'>
                                    <label>Current password</label>
                                    <input class='form-control  ' type='password' name='oldpass'   > 
                                    <input type='hidden' class='form-control  ' name='userid' value='<?php echo $me['user_ID'] ?>'   > 
                                </div>
                                <div class='col-md-6 mb-3'>
                                    <label>New password</label>
                                    <input class='form-control  ' type='password' name='pass'   > 
                                </div>
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'>
                                    <label>Repeat new password</label>
                                    <input  class='form-control  ' type='password' name='pass1'   > 
                                </div> 
                                <div class='col-md-6 mb-3'>  </div> 
                                <!--------------------------------->
                                
                                <div class='col-md-12 mb-3'> 
                                    <input type='submit'  class='form-control btn-primary ' value='Change Now'   > 
                                </div> 
                                
                                <div class='feedback m-3'></div>
                                 
                                
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
        
        
        <?php require ADMIN. 'includes/footer.inc.php' ?>
    
    </main> 
 
</body>

</html>