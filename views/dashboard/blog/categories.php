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
            <div class="content-header"> <a href='#' class='newcategory btn btn-primary'>Add New Category</a>
            </div>
            <div class="content px-2">
                
                    <div class='container alert'>
                        <div class='table-responsive'>
                            <table class='table table-striped table-hover'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th> 
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($this->getCategories as $row) { $i++; ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo ($row['bc_name']) ?> <a class='badge   btn-primary' href='/blog/categories/<?php echo $row['bc_url'] ?>' 
                                        target='_blank' ><i class='fa fa-eye'></i></a> </td>
                                        <td> <a class='badge btn-success editcategories' img='<?php echo $row['bc_image'] ?>'name='<?php echo $row['bc_name'] ?>'desc='<?php echo $row['bc_desc'] ?>' href='<?php echo $row['bc_ID'] ?>'><i class='fa fa-pencil'></i> Edit</a> </td>
                                      
                                        <td><a href='#' rel='<?php echo $row['bc_ID'] ?>' img='<?php echo $row['bc_image'] ?>' class='badge badge-danger del_blog_categories'><i class='fa fa-trash'></i> Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                             
                        </div>
                     
                        
                        
 
                    </div>
                
                 
            </div>
        </div>
        
    
        <div class="modal fade" id="newcategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form class="universal-form" data-url="manage_categories" data-feedback="feedback-manage_categories">
                        <input type='hidden' name='id'  class='ID_categories' value=''>
                        <input type='hidden' name='action'  class='action1' value='insert'>
                        <input type='hidden' name='img'  class='img' value=''>
                        <div class='form-group mb-2'>
                            <label>Title</label>
                            <input name='name' class='form-control ' required >
                        </div>
                        <div class='form-group mb-2'>
                            <label>Picture (Optional)</label>
                            <input name='file' class='form-control ' type='file' >
                        </div>
                        <div class='form-group mb-2'>
                            <label>Description</label>
                            <textarea name='body' class='form-control ' required ></textarea>
                        </div>
                        
                            <div class='feedback-manage_categories feedback-box'> </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
        
        <?php require ADMIN.'includes/footer.inc.php' ?> 
        <script type="text/javascript">
          
            
            $(function() {
                 
                
                $('.editcategories').click(function(e) {
                    e.preventDefault();
                    
                    $('.ID_categories').val( $(this).attr('href') );
                    $('.action1').val('update');
                    $("input[name='name']").val( $(this).attr('name') );
                    $("textarea[name='body']").val( $(this).attr('desc') );
                    $('.img').val( $(this).attr('img') );
                     
                    $('#newcategoryModal').modal('show');
                    
                });
                
                
                
                $('.del_blog_categories').click(function(e) {
                    e.preventDefault();
                    var form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    form.append('img', $(this).attr('img') );
                    form.append('action', 'delete')
                    if (confirm("Are you sure?")) {
                        const data = _data(form, 'manage_categories');
                        
                        alert(data['msg']);
                        location.reload();
                    }
                });
                
                
                $('.newcategory').click(function(e) {
                    e.preventDefault();
                    $('#newcategoryModal').modal('show');
                     
                    $('.ID_categories').val( '' );
                    $('.action1').val('insert');
                    $("input[name='name']").val('' );
                    $("textarea[name='body']").val( '' );
                    $('.img').val( '' );
                    
                });
            })
        </script>
    
    </main> 
 
</body>

</html>