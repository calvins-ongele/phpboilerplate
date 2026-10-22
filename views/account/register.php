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
                        <form class="universal-form" data-url="register" data-feedback="feedback-register">
                            <div class='form-group'    >
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        
                                        <label>Your Name</label>
                                        <input name='name' class='form-control' placeholder='Eg John Doe' required>   
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <label>Your Email</label>
                                        <input name='email' class='form-control' placeholder='eg johndoe@yahoo.com' required>  
                                    </div> 
                                    <div class='col-md-12 mb-3'> 
                                        <label>Your Phone</label>
                                        <input name='phone' class='form-control' placeholder='Eg 07000000000' required>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                         <label>A New Password</label>
                                        <input name='pass' class='form-control' class='form-control' placeholder='Your password' type='password' required>
                                    </div>
                                    
                                    <div class='col-md-6 mb-3'>
                                         <label>Repeat the Password</label>
                                        <input name='pass2' class='form-control' class='form-control' placeholder='Your password again' type='password' required>
                                    </div>
                                    
                                </div>
                                       
                                  
                            </div>
                            <div class='form-group mb-2'   > 
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit'>  
                            </div>
                            <div class='feedback-register feedback-box'> </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <a href='/account/'>Login <span class='text-decoration-underline'>here</span></a>
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