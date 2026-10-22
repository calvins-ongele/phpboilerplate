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
                    <h5 class='h2 text-centevr'>Reset Password   </h5>
                    <form class="universal-form" data-url="reset-pass" data-feedback="feedback-resetpass">
                        <div class='form-group'    >
                            <input name='selector' type='hidden' class='form-control' value='<?php echo $_GET['s'] ?? '' ?>'>   
                            <input name='validator' type='hidden' class='form-control' value='<?php echo $_GET['t'] ?? '' ?>'> 
                            <input name='pass1' class='form-control' placeholder='New Password ' type='password'> <br>  
                            <input name='pass2' class='form-control' placeholder='Repeat password ' type='password' > <br>  
                        <div class='form-group'   >
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit Now'> 
                        </div>
                        </div> 
                        <a href='/account'>Login?</a>  
                         
                        
                         <div class='feedback-resetpass feedback-box'> </div>
                        
                        
                    </form>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>




    <?php require 'public/includes/footer.inc.php'; ?>
  
</body>

</html>