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
            <div class="content-header"> <h3>New Email</h3>
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                       
                       
                         <form   method="POST" class=" mb-3" id="new_email_send"> 
                     
                                <div class='row'> 
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Email  </label> 
                                        <input type='text' name='email' class="  form-control" value="<?= $_GET['email'] ?? '' ?>" required>
                                    </div>
                                </div>
                               
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Subject  </label> 
                                        <input type='text' name='subject' class="  form-control" required>
                                    </div>
                                </div>
                                
                                    
                                <div class='col-md-6'>
                                    <div class="form-group btnsend">
                                        <label>Attach files (Optional)  </label>  
                                        <input type='file' name='file[]' class="  form-control" multiple >
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label> Type  </label> 
                                        <select type='text' name='type' class="  form-control" >
                                            <option hidden value=''>Select</option>
                                            <option   value='allusers'>All Users</option>
                                            <option   value='subscribers'>Subscribers</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class='col-md-12'>
                                    <div class="form-group btnsend">
                                        <label>Email body </label>  
                                        <textarea   name='desc' class="  form-control" id='ckeditor' ></textarea>
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
       </script><script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script type="text/javascript">
         
            //<![CDATA[
            CKEDITOR.replace( 'ckeditor');
            //]]>
        </script>
        <script>
            $(function() {
                $('#new_email_send').submit(function(e) {
                    e.preventDefault();
                    let form = new FormData(this);
                    form.append('msg', CKEDITOR.instances.ckeditor.getData() );
                    
                    const data = _data(form, 'new_email_send');
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