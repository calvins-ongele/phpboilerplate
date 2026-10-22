<!DOCTYPE html>
<html lang="en">

<head>
    <?php  require 'public/includes/header.inc.php'; ?>
</head> 

<body>

    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>


    <header class="header">

        <?php  require 'public/includes/navbar.inc.php'; ?>
       
    </header>

    <main class="main">
        
        <h5 class='h2 text-center'>Create a New Account </h5>
        
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-6 card '> 
                    <div class=' alert'>
                        <form class="universal-form" data-url="login" data-feedback="feedback-login">
                            <div class='form-group'    >
                                <div class='row'>
                                    <div class='col-md-12 mb-3'>
                                        
                                        <label>Email/Username</label>
                                        <input name='username' class='form-control' placeholder='Eg johndoe@yahoo.com' required>   
                                    </div>
                                    <div class='col-md-12 mb-3'>
                                        <label>Password</label>
                                        <input name='pass' type='password' class='form-control' placeholder='*****' required>  
                                    </div> 
                                      
                                    
                                </div>
                                       
                                  
                            </div>
                            <div class='form-group mb-2'   > 
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Login Now'>  
                            </div>
                            <div class='feedback-login feedback-box'> </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <a href='/account/signup'>No Account? <span class='text-decoration-underline'>Create</span></a>
                                </div>
                                <div class='col-md-6'>
                                    <a href='/account/forgot-password'>Forgot Password? <span class='text-decoration-underline'>Reset</span></a>
                                </div>  
                            </div>
                              
                            
                            
                        </form>
                    </div>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>

<br>


    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>