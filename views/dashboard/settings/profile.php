<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN. 'includes/header.inc.php' ?>  
    <style>
        .hidden {
            display:none;
        }
        .dispboth {
            display:flex;
            justify-content:space-between;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
        
        <?php 
        $pageid = 'settings';
        
        require ADMIN. 'includes/sidebar.inc.php' ?>
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header">
                <h1>Change or provide personal details</h1>
            </div>
            <div class="content px-2">
                
                <div class='container'><hr></div>
                
                
                <div class='container'>
                    <h4>Please provide honest details</h4>
            
                    <form id='walletdeposit'>
                                    <input type='hidden' class='form-control udataid' rel=''  value='self_edit'>
                        <div class='form-group'>
                            <div class='row'>
                                <!--------------------------------->
                                <?php $me = $this->_me; ?>
                                <div class='col-md-6 mb-3'>
                                    <label>First Name</label>
                                    <input class='form-control udata' rel='user_full_name'  value='<?php echo $me['user_full_name'] ?>'>
                                    <span class='user_full_name'></span>
                                </div>
                                
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Email</span> </label>
                                   
                                    <input class='form-control udata' rel='user_email'  value='<?php echo $me['user_email'] ?>'>
                                    <span class='user_email'></span>
                                </div>
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Tel</span>  </label>
                                   
                                    <input  class='form-control udata' rel='user_phone'  value='<?php echo $me['user_phone'] ?>'>
                                    <span class='user_phone'></span>
                                </div> 
                                 
                                <div class='col-md-6 mb-3'>
                                    <label>Your Role</label>
                                    <input  class='form-control ' value='<?php echo $me['user_role'] ?>' readonly >
                                   
                                </div>
                                <!--------------------------------->
                              
                            
                                
                                 
                                
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?>
      
    </main> 
 
</body>
 
</html>