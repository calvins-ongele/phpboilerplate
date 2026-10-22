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
                <div class='col-md-2'></div>
                <div class='col-md-8 card '> 
                    <div class=' alert'>
                        <form class="universal-form" data-url="contact-form" data-feedback="feedback-contact-us">
                            <div class='form-group'    >
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        
                                        <label>Name</label>
                                        <input name='name' class='form-control' placeholder='John Doe' required>   
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <label>Email</label>
                                        <input name='email' type='email' class='form-control' placeholder='Eg johndoe@yahoo.com' required>  
                                    </div> 
                                      
                                    <div class='col-md-6 mb-3'>
                                        <label>Phone</label>
                                        <input name='phone' type='tel' class='form-control' placeholder='0700*******'  >  
                                    </div> 
                                    <div class='col-md-6 mb-3'>
                                        <label>Subject</label>
                                        <input name='subject' type='text' class='form-control' placeholder=' ' required>  
                                    </div> 
                                    <div class='col-md-12 mb-3'>
                                        <label>Message</label>
                                        <textarea name='message' class='form-control'  required ></textarea> 
                                    </div> 
                                    
                                </div>
                                       
                                  
                            </div>
                            <div class='form-group mb-2'   > 
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Submit Now'>  
                            </div>
                            <div class='feedback-contact-us feedback-box'> </div>
                            
                              
                            
                            
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