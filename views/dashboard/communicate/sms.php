<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'communicate';
        
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> <h3>New SMS</h3>
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                       
                       
                         <form   method="POST" class=" mb-3" id="new_sms_send"> 
                     
                                <div class='row'> 
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Phone  </label> 
                                        <input type='text' name='tel' class="  form-control" required>
                                    </div>
                                </div>
                                
                                
                                <div class='col-md-12'>
                                    <div class="form-group btnsend">
                                        <label>SMS body </label>  
                                        <textarea   name='desc' class="  form-control" required  ></textarea>
                                    </div>
                                </div>
                                  
                                <div class='col-md-12'>
                                    <div class="form-group" > 
                                        <input type="submit" class="btn btn-block btn-primary" value='Send Now'>
                                  
                                    </div>
                                </div> 
                                <div class="feedback"></div>  
                                
                                </div>
                            </form>
                    
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?>
     
        <script>
            $(function() {
                $('#new_sms_send').submit(function(e) {
                    e.preventDefault();
                    let form = new FormData(this); 
                    
                    const data = _data(form, 'new_sms_send');
                     if (data['error'] == 'true') alert(data['msg']);
                        else if (data['error'] == 'false') {
                            alert(data['msg']);
                            location.reload(); //href='/admin/events';
                        }
                });
            })
        </script>
                
    
    </main> 
 
</body>

</html>