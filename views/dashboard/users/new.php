<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'purchases';
        
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> <h3>New User</h3>
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                       
                       
                         <form   class="universal-form" data-url="add_users"  data-feedback="feedback-add_users" >
                             <input type='hidden' name='action'  value='insert'>
                     
                                <div class='row'> 
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Name  </label> 
                                        <input type='text' name='name' class="  form-control" required>
                                    </div>
                                </div>
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Email  </label> 
                                        <input type='text' name='email' class="  form-control" required>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Phone </label> 
                                        <input type='tel' name='phone' class="  form-control" required>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group btnsend">
                                        <label>Role </label>  
                                        <select   name='role' class="  form-control"  >
                                            <option hidden>Choose role</option>
                                            <option value='Admin'>Admin</option>
                                            <option  value='Customer'>Customer/Users</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Password  </label> 
                                        <input type='password' name='pass' class="  form-control"  required>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Repeat Password  </label> 
                                        <input type='password' name='pass2' class="  form-control"  required>
                                    </div>
                                </div>
                                  
                                
                                  
                                <div class='col-md-12'>
                                    <div class="form-group" > 
                                        <input type="submit" class="btn btn-block btn-primary" value='Save Now'>
                                  
                                    </div>
                                </div> 
                                <div class='feedback-add_users feedback-box'> </div> 
                                
                                </div>
                            </form>
                    
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?>
        
                
    
    </main> 
 
</body>

</html>