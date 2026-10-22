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
            <div class="content-header"> <h3>Edit User</h3>
            </div>
            <div class="content px-2">  
                
                    <div class='container alert'> 
                       
                         <form   class="universal-form" data-url="update_users"  data-feedback="feedback-add_users"  autocomplete='off' >
                             <input type='hidden' name='id'  value='<?= $this->user['user_ID'] ?>'>
                             <input type='hidden' name='action'  value='update'>
                     
                                <div class='row'> 
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Name  </label> 
                                        <input type='text' name='name' class="  form-control" required value='<?= $this->user['user_full_name'] ?>' >
                                    </div>
                                </div>
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Email  </label> 
                                        <input type='text' name='email' class="  form-control" required  value='<?= $this->user['user_email'] ?>'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Phone </label> 
                                        <input type='tel' name='phone' class="  form-control" required  value='<?= $this->user['user_phone'] ?>'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group btnsend">
                                        <label>Role </label>  
                                        <select   name='role' class="  form-control"  required >
                                            <option hidden>Choose Role</option>
                                            <option value='Admin' <?= $this->user['user_role'] == 'Admin'?'selected':'' ?> >Admin</option>
                                            <option  value='Customer' <?= $this->user['user_role'] == 'Customer'?'selected':'' ?> >Customer/Users</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Password (Ensure it's empty for password to remain unchanged)  </label> 
                                        <input type='password' name='pass' class="  form-control" autocomplete='off'  >
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Repeat the new Password  </label> 
                                        <input type='password' name='pass2' class="  form-control"  autocomplete='off'   >
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