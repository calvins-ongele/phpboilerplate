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
                                <?php $me = $this->_settings; ?>
                                <div class='col-md-6 mb-3'>
                                    <label>Company Name</label>
                                    <input class='form-control ucdata' rel='site_name'  value='<?php echo $me['site_name'] ?>'>
                                    <span class='site_name'></span>
                                </div>
                                
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Company Email</span> </label>
                                   
                                    <input class='form-control ucdata' rel='email'  value='<?php echo $me['email'] ?>'>
                                    <span class='email'></span>
                                </div>
                                <!----------------->
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Send email from</span> </label>
                                   
                                    <input class='form-control ucdata' rel='send_from'  value='<?php echo $me['send_from'] ?>'>
                                    <span class='send_from'></span>
                                </div>
                                
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Send From Password</span> </label>
                                   
                                    <input class='form-control ucdata' rel='send_from_password'  value='<?php echo $me['send_from_password'] ?>'>
                                    <span class='send_from_password'></span>
                                </div>
	
                                <div class='col-md-6 mb-3'>
                                    <label class='dispboth'><span>Send email host name</span> </label>
                                   
                                    <input class='form-control ucdata' rel='smtp_server'  value='<?php echo $me['smtp_server'] ?>'>
                                    <span class='smtp_server'></span>
                                </div>
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Tel</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='tel'  value='<?php echo $me['tel'] ?>'>
                                    <span class='tel'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Address</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='company_address'  value='<?php echo $me['company_address'] ?>'>
                                    <span class='company_address'></span>
                                </div>
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Short Desc</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='short_desc'  value='<?php echo $me['short_desc'] ?>'>
                                    <span class='short_desc'></span>
                                </div>
                                 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Facebook</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='social_facebook'  value='<?php echo $me['social_facebook'] ?>'>
                                    <span class='social_facebook'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Twitter</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='social_twitter'  value='<?php echo $me['social_twitter'] ?>'>
                                    <span class='social_twitter'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company IG</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='social_instagram'  value='<?php echo $me['social_instagram'] ?>'>
                                    <span class='social_instagram'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Linkedin</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='social_linkedin'  value='<?php echo $me['social_linkedin'] ?>'>
                                    <span class='social_linkedin'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Youtube</span>  </label>
                                   
                                    <input  class='form-control ucdata' rel='social_youtube'  value='<?php echo $me['social_youtube'] ?>'>
                                    <span class='social_youtube'></span>
                                </div> 
                                
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Company Primary Color <?php echo $me['primary_color'] ?></span>  </label>
                                   
                                    <input  type='color' class='form-control ucdata' rel='primary_color'  value='<?php echo $me['primary_color'] ?>'>
                                    <span class='primary_color'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users to verify email?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='verify_mail'  value='<?php echo $me['verify_mail'] ?>'>
                                        <option value='1' <?php echo $me['verify_mail'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['verify_mail'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='verify_mail'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users to verify phone?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='verify_phone'  value='<?php echo $me['verify_phone'] ?>'>
                                        <option value='1' <?php echo $me['verify_phone'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['verify_phone'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='verify_phone'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users must use strong password?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='strong_password'  value='<?php echo $me['strong_password'] ?>'>
                                        <option value='1' <?php echo $me['strong_password'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['strong_password'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='strong_password'></span>
                                </div> 
                                
                                <!--------------------------------->
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users can Signup?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='user_can_signup'  value='<?php echo $me['user_can_signup'] ?>'>
                                        <option value='1' <?php echo $me['user_can_signup'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['user_can_signup'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='user_can_signup'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users can login?  </span>  </label>
                                   
                                    <select   class='form-control ucdata' rel='user_can_login'  value='<?php echo $me['user_can_login'] ?>'>
                                        <option value='1' <?php echo $me['user_can_login'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['user_can_login'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='user_can_login'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Users can post blog content?  </span>  </label>
                                   
                                    <select  class='form-control ucdata' rel='user_can_blog'  value='<?php echo $me['user_can_blog'] ?>'>
                                        <option value='1' <?php echo $me['user_can_blog'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['user_can_blog'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='user_can_blog'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Login sessions to last more than 20mins?  </span>  </label>
                                   
                                    <select  class='form-control ucdata' rel='sessions_last'  value='<?php echo $me['sessions_last'] ?>'>
                                        <option value='1' <?php echo $me['sessions_last'] == '1' ? 'selected':'' ?> >Yes</option>
                                        <option value='0' <?php echo $me['sessions_last'] == '0' ? 'selected':'' ?> >No</option>
                                    </select>
                                    <span class='sessions_last'></span>
                                </div> 
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Show data sequence per number ?  </span>  </label>
                                   
                                    <input  type='number' class='form-control ucdata' rel='user_loop_sequence'  value='<?php echo $me['user_loop_sequence'] ?>'> 
                                    <span class='user_loop_sequence'></span>
                                </div> 
                              
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Website Icon ? <img id='previmg1' src='/public/assets/uploads/<?= $me['icon'] ?>' style='height:30px;width:auto;'>  </span>  </label>
                                    <input type="file"  accept='image/*' id='icon_img' name="file" class="form-control form_control_sm"   rel='icon' style="min-width:100%;" required >  
                                    <span class='icon' img='<?php echo $me['icon'] ?>' ></span>
                                </div> 
                            
                                <div class='col-md-6 mb-3'> 
                                    <label class='dispboth'><span>Website logo ? <img id='previmg2' src='/public/assets/uploads/<?= $me['logo'] ?>' style='height:30px;width:auto;'>  </span>  </label>
                                    <input type="file" accept='image/*' img='<?php echo $me['logo'] ?>' id='logo_img' name="file" class="form-control form_control_sm"   rel='logo' style="min-width:100%;" required >  
                                    <span class='logo'></span>
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