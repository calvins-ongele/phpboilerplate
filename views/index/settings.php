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
                        <form class="universal-form" data-url="content_update" data-feedback="feedback-settings" data-ckeditor='true'>
                            
                            <input type='hidden' class='form-control cont_id' name='cont_id' value='<?= $_GET['cont_id']  ?>' >
                            <input type='hidden' class='form-control xreturn'   value='<?= $_GET['return'] ?>' >
                            
                            <div class='form-group'    >
                                <div class='row'>
                                    <div class='col-md-12 mb-3'>
                                        
                                        <label>Title</label>
                                        <input name='title' class='form-control'  required   value='<?= $this->_content[$_GET['cont_id']]['title'] ?>' >  
                                    </div>
                                    <div class='col-md-12 mb-3'>
                                        <label>Body</label>
                                        <textarea id='contentArea' class='form-control'  name='body1' /><?= $this->_content[$_GET['cont_id']]['body'] ?></textarea>  
                                    </div> 
                                      
                                    
                                </div>
                                       
                                  
                            </div>
                            <div class='form-group mb-2'   > 
                                <input   class='form-control btn btn_blend submit_btn'  type='submit' value='Save Changes'>  
                            </div>
                            <div class='feedback-settings feedback-box'> </div>
                            
                              
                            
                            
                        </form>
                    </div>
                    
                </div>
                <div class='col-md-2'></div>
            </div>
        </div>
 

    </main>

<br>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
    <script type="text/javascript"> 
        //<![CDATA[
        CKEDITOR.replace( 'contentArea');
        //]]>
    </script>

    <?php require 'public/includes/footer.inc.php'; ?>
</body>

</html>