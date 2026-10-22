<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'blog'; 
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
        
        <div class="content-wrapper px-4 py-2">
            <div class="content-header"> 
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class=''>
                            <form class="universal-form" data-url="manage_blog" data-ckeditor="True" data-feedback="feedback-manage_blog" >
                                <input type='hidden' name='action' value='update' >
                                <input type='hidden' name='id' value='<?= $this->blog['blog_ID'] ?>' >
                                <div class='row'>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>  
                                            <label>Title of the blog</label>
                                            <input type='text' name='title' class='form-control' required value='<?= $this->blog['blog_title'] ?>' >
                                        </div>
                                    </div>
                                    
                              
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Blog Images (Leave blank to remain unchanged) </label>
                                            <input type='file' name='file' class='form-control'     accept="image/*" >
                                        </div>
                                    </div>
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Tag features/Keywords</label>
                                            <input type='text' name='tags' class='form-control' value='<?= implode(',', array_column($this->tags, 'name')) ?>'>
                                        </div>
                                    </div>
                                
                                     
                                    
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-group'>
                                            <label>Category</label>
                                            <select type='text' name='category' class='form-control' required>
                                                <option value='' hidden>Select Category</option>
                                                <?php foreach($this->getCategories as $row) { $i++; ?>
                                                <option value='<?= $row['bc_ID'] ?>' <?= $this->blog['blog_category_fk']==$row['bc_ID'] ? 'selected':'' ?> ><?php echo $row['bc_name'] ?></option> 
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'>
                                            <label>Post</label>
                                            <textarea type='text' id='ckeditor' class='form-control' name='desc' ><?= $this->blog['blog_content'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class='row'> 
                                    <div class='col-md-12 mb-3'>
                                        <div class='form-group'> 
                                            <input type='submit'  class='form-control btn btn-primary' value='Save Now'>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class='feedback-manage_blog feedback-box'> </div>
                            </form>
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script> 
        <script type="text/javascript"> 
            //<![CDATA[
            CKEDITOR.replace( 'ckeditor');
            //]]>
        </script> 
        <?php require ADMIN.'includes/footer.inc.php' ?>
    
    </main> 
 
</body>

</html>