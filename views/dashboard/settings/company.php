<!DOCTYPE html>
<html lang="en">

<head> 
    <?php require ADMIN. 'includes/header.inc.php' ?>  
    <style>
        .hidden {
            display:none;
        }
        .dispboth {
            display:flex;
            justify-content:space-between;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <main class="wrapper">
        
        <?php 
        $pageid = 'settings';
        
        require ADMIN. 'includes/sidebar.inc.php' ?>
        
        
        <div class="content-wrapper px-2 py-2">
            <div class="content-header">
                <h1>Change or provide personal details</h1>
            </div>
            <div class="content px-2">
                
                <div class='container'><hr></div>
                
                
                <div class='container'> 
            
                    <form id='walletdeposit'>
                        <div class='form-group'>
                            <div class='row'>
                                <!--------------------------------->
                                <?php $me = $this->_company; ?>
                                <div class='col-md-6 mb-3'>
                                    <label>Company Name</label>
                                    <input class='form-control ucdata' rel='c_name'  value='<?php echo $me['c_name'] ?>'>
                                    <span class='c_name'></span>
                                </div>
                                
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Company Email</span> </label>
                                   
                                    <input class='form-control ucdata' rel='c_email'  value='<?php echo $me['c_email'] ?>'>
                                    <span class='c_email'></span>
                                </div>
                                <!----------------->
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Send email from</span> </label>
                                   
                                    <input class='form-control ucdata' rel='c_send_from'  value='<?php echo $me['c_send_from'] ?>'>
                                    <span class='c_send_from'></span>
                                </div>
                                
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Send From Password</span> </label>
                                   
                                    <input class='form-control ucdata' rel='c_send_from_password'  value='<?php echo $me['c_send_from_password'] ?>'>
                                    <span class='c_send_from_password'></span>
                                </div>
	
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Send email host name</span> </label>
                                   
                                    <input class='form-control ucdata' rel='c_smtp_server'  value='<?php echo $me['c_smtp_server'] ?>'>
                                    <span class='c_smtp_server'></span>
                                </div>
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Tel</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_tel'  value='<?php echo $me['c_tel'] ?>'>
                                    <span class='c_tel'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Address</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_address'  value='<?php echo $me['c_address'] ?>'>
                                    <span class='c_address'></span>
                                </div>
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Short Desc</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_short_desc'  value='<?php echo $me['c_short_desc'] ?>'>
                                    <span class='c_short_desc'></span>
                                </div>
                                 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Facebook</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_facebook'  value='<?php echo $me['c_facebook'] ?>'>
                                    <span class='c_facebook'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Twitter</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_twitter'  value='<?php echo $me['c_twitter'] ?>'>
                                    <span class='c_twitter'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company IG</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_instagram'  value='<?php echo $me['c_instagram'] ?>'>
                                    <span class='c_instagram'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Linkedin</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_linkedin'  value='<?php echo $me['c_linkedin'] ?>'>
                                    <span class='c_linkedin'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Youtube</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_youtube'  value='<?php echo $me['c_youtube'] ?>'>
                                    <span class='c_youtube'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Tiktok</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='c_tiktok'  value='<?php echo $me['c_tiktok'] ?>'>
                                    <span class='c_tiktok'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Primary Color <?php echo $me['c_primary_color'] ?></span>  </label>
                                   
                                    <input  type='color' class='form-control ucdata' rel='c_primary_color'  value='<?php echo $me['c_primary_color'] ?>'>
                                    <span class='c_primary_color'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users to verify email?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='c_verify_mail'  value='<?php echo $me['c_verify_mail'] ?>'>
                                        <option value='True' <?php echo $me['c_verify_mail'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_verify_mail'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_verify_mail'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users to verify phone?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='c_verify_phone'  value='<?php echo $me['c_verify_phone'] ?>'>
                                        <option value='True' <?php echo $me['c_verify_phone'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_verify_phone'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_verify_phone'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users must use strong password?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='c_strong_password'  value='<?php echo $me['c_strong_password'] ?>'>
                                        <option value='True' <?php echo $me['c_strong_password'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_strong_password'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_strong_password'></span>
                                </div> 
                                
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users can Signup?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='c_user_can_signup'  value='<?php echo $me['c_user_can_signup'] ?>'>
                                        <option value='True' <?php echo $me['c_user_can_signup'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_user_can_signup'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_user_can_signup'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users can login?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='c_user_can_login'  value='<?php echo $me['c_user_can_login'] ?>'>
                                        <option value='True' <?php echo $me['c_user_can_login'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_user_can_login'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_user_can_login'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users can post blog content?  </span>  </label>
                                   
                                    <select  class='form-control ucdata' rel='c_user_can_blog'  value='<?php echo $me['c_user_can_blog'] ?>'>
                                        <option value='True' <?php echo $me['c_user_can_blog'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_user_can_blog'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_user_can_blog'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Login sessions to last more than 20mins?  </span>  </label>
                                   
                                    <select  class='form-control ucdata' rel='c_sessions_last'  value='<?php echo $me['c_sessions_last'] ?>'>
                                        <option value='True' <?php echo $me['c_sessions_last'] == 'True' ? 'selected':'' ?> >Yes</option>
                                        <option value='False' <?php echo $me['c_sessions_last'] == 'False' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='c_sessions_last'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Show data sequence per number ?  </span>  </label>
                                   
                                    <input  type='number' class='form-control ucdata' rel='user_loop_sequence'  value='<?php echo $me['user_loop_sequence'] ?>'> 
                                    <span class='user_loop_sequence'></span>
                                </div> 
                              
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Website Icon ? <img id='previmg1' src='/public/assets/uploads/<?= $me['c_icon'] ?>' style='height:30px;width:auto;'>  </span>  </label>
                                    <input type="file"  accept='image/*' id='icon_img' name="file" class="form-control form_control_sm"   rel='c_icon' style="min-width:100%;" required >  
                                    <span class='c_icon' img='<?php echo $me['c_icon'] ?>' ></span>
                                </div> 
                            
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Website logo ? <img id='previmg2' src='/public/assets/uploads/<?= $me['c_logo'] ?>' style='height:30px;width:auto;'>  </span>  </label>
                                    <input type="file" accept='image/*' img='<?php echo $me['c_logo'] ?>' id='logo_img' name="file" class="form-control form_control_sm"   rel='c_logo' style="min-width:100%;" required >  
                                    <span class='c_logo'></span>
                                </div> 
                                
                                 
                                
                            </div>
                        </div>
                    </form>
                </div>
                 
            </div>
        </div>
        
        
        <?php require ADMIN.'includes/footer.inc.php' ?>
        <script>
            $(function() {
                
                icon_img.onchange = evt => {
                      console.log(evt);
                      const rel = 'c_icon';
                      var [file] = icon_img.files
                      if (file) {
                        previmg1.src = URL.createObjectURL(file);
                        let form_data = new FormData();
                        form_data.append('file', file); 
	                    form_data.append('col', rel); 
	                    form_data.append('img', $('.'+rel).attr('img') ); 
                        let resp = _data(form_data, 'update_company_images');
	                    $('.'+rel).html((resp['error']=='false')?"<span class='text-success'>Changes Saved</span>":"<span class='text-danger'>"+resp['msg']+"</span>");
                       
                      }
                }

                logo_img.onchange = evt => {
                      console.log(evt);
                      const rel1 = 'c_logo';
                      var [file] = logo_img.files
                      if (file) {
                        previmg2.src = URL.createObjectURL(file);
                        let form_data = new FormData();
                        form_data.append('file', file); 
	                    form_data.append('col', rel1); 
	                    form_data.append('img', $('.'+rel1).attr('img') ); 
                        let resp = _data(form_data, 'update_company_images');
	                    $('.'+rel).html((resp['error']=='false')?"<span class='text-success'>Changes Saved</span>":"<span class='text-danger'>"+resp['msg']+"</span>");
                       
                      }
                }
            })
        </script>
      
    </main> 
 
</body>
 

</html>
