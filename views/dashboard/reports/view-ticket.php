<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN . 'includes/header.inc.php' ?>  
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
         
        <?php 
        $pageid = 'awards'; 
        require ADMIN . 'includes/sidebar.inc.php' ?>
        
        
            <div class="content-wrapper px-4 py-2">
             
            <div class="content px-2">
                
                 	 
            	<div class="card mb-4">
            		<div class="card-header">
            			<?php echo $this->msg['subject'] ?> 
            		</div> 
            		<div class="card-body"> 
            			    <p>
            			        <?php echo $this->msg['message'] ?>
            			    </p> 
            		</div>
            		<div class="card-footer">
            		    <p>
            		        Sender: <i style='color:blac;font-weight:bolder;'><?php echo $this->msg['name'] ?></i> &nbsp; 
            		        Phone: <i style='color:blac;font-weight:bolder;'><?php echo $this->msg['phone'] ?></i></i> &nbsp; 
            		        Status: <i style='color:blac;font-weight:bolder;'><?php echo $this->msg['status'] ?></i></i> &nbsp; 
            		        Date: <i style='color:blac;font-weight:bolder;'><?php echo date('d/m/Y', strtotime($this->msg['date'])) ?></i> &nbsp;
            		        Email: <a href='/<?= PROFILE_NAV  ?>/communicate/email?email=<?php echo $this->msg['email'] ?>'><i style='color:blac;font-weight:bolder;'
            		                ><?php echo $this->msg['email'] ?></i></i> 
            		        <i class='fa fa-external-link'></i></a>
            		            
            		        
            		    </p>
            		    <div class='row'>
            		        <div class='col-md-6'>
            		            <a href='#' class='deleteticket btn btn-danger' rel='<?php echo $this->msg['id'] ?>'>Delete this ticket </a>
            		        </div>
            		        <div class='col-md-6'>
            		            <?php if ( strtolower($this->msg['status']) != 'closed') { ?>
            		            <a href='#' class='closeticket btn btn-warning' rel='<?php echo $this->msg['id'] ?>'>Close this ticket </a>
            		            <?php } ?>
            		        </div>
            		    </div>
            		    
            		</div>
            	</div>   
                
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?> 
        <script>
            $(function() { 
                
                $('.deleteticket').click(function(e) {
                    e.preventDefault();
                    let form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    
                    if (confirm("You want to permanently delete this?")) {
                        const data = _data(form, 'deleteticket');
                    }
                    
                    alert('Success');
                    location.href="/<?= PROFILE_NAV  ?>/reports/contacts"
                });
                $('.closeticket').click(function(e) {
                    e.preventDefault();
                    let form = new FormData();
                    form.append('id', $(this).attr('rel') );
                    
                    if (confirm("You want to permanently close this?")) {
                        const data = _data(form, 'closeticket');
                    }
                    alert('Success');
                    location.reload();
                });
                
                
                
            });
        </script>
         
    </main> 
 
</body>

</html>