<!DOCTYPE html>
<html lang="en">

<head>
    <?php  require 'public/includes/header.inc.php'; ?>
    <meta name='robots' content='noindex, noffollow'>
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
        <br> <br> <br>  <br> <br> 
        
        <div class='container'>
            <div class='row'>
                <div class='col-md-4'></div>
                <div class='col-md-6'> 
                    <h5 class='h2 text-centebr'>Forgot Password   </h5>
                    <form class="universal-form" data-url="forgot-password" data-feedback="feedback-forgotpassword">
                        <div class='form-group'    >
                            <input name='email' class='form-control' placeholder='Your email'> <br>  
                        </div> 
                        <div class='form-group'   > 
                            <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit'> 
                        </div>
                        <a href='/account/'>Login Instead</a>  
                         
                        
                         <div class='feedback-forgotpassword feedback-box'> </div>
                        
                        
                    </form>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>



<br>
    <?php require 'public/includes/footer.inc.php'; ?>
     
</body>

</html>