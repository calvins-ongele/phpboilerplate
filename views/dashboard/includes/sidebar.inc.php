 
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="https://i.gifer.com/ZZ5H.gif" alt="Mizizi" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <div class="theme-switch-wrapper nav-link">
                        <label class="theme-switchx" for="checkboxx">
                            <button type='' onclick='location.reload()'><i class='fa fa-refresh'></i> Refresh</button>
                        </label>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="theme-switch-wrapper nav-link">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <span class="slider round"></span>
                        </label>
                    </div>
                </li>

            </ul>


        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href='/'  class="brand-link logo-switch">
                <img src="/public/assets/uploads/<?= $this->_settings['logo'] ?>" alt="<?= $this->_settings['site_name'] ?>" class="brand-image-xl logo-xs">
                <img src="/public/assets/uploads/<?= $this->_settings['logo'] ?>" alt="<?= $this->_settings['site_name'] ?>" class="brand-image-xs logo-xl" style="left: 12px">
            </a>
            <div class="sidebar">
                <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="/<?= PROFILE_NAV ?>" class="nav-link  <?php echo $pageid=='home'?'active':'' ?> " >
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard 
                                </p>
                            </a>
                        </li> 
                        <?php if ($this->_me['user_role'] == 'Admin') { ?>
                        <li class="nav-item ">
                            <a href="products" class="nav-link  <?php echo $pageid=='users'?'active':'' ?> " >
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/users/new" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New </p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/users" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/users/subscribers" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Subscribers</p>
                                    </a>
                                </li> 
                                
                          
                            </ul>
                        </li> 
                        <?php } ?>
                        <?php if ( ($this->_me['user_role'] == 'Admin') || ($this->_settings['user_can_blog'] == 'True') ) { ?>
                        <li class="nav-item ">
                            <a href="products" class="nav-link  <?php echo $pageid=='blog'?'active':'' ?> " >
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>
                                    Blog
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/blog/new" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New </p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/blog" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/blog/categories" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Categories</p>
                                    </a>
                                </li> 
                          
                            </ul>
                        </li> 
                        <?php } ?>
                              
                   
                        <?php if ($this->_me['user_role'] == 'Admin') { ?>
                        <li class="nav-item ">
                            <a href="products" class="nav-link  <?php echo $pageid=='reports'?'active':'' ?> " >
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/reports/contacts" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Support tickets </p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/reports" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>System reports </p>
                                    </a>
                                </li> 
                              
                          
                            </ul>
                        </li>
                         <?php } ?>
                         
                        
                        <?php if ($this->_me['user_role'] == 'Admin') { ?>
                        <li class="nav-item ">
                            <a href="products" class="nav-link  <?php echo $pageid=='communicate'?'active':'' ?> " >
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>
                                    Communicate
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/communicate/email" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Email </p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/communicate/sms" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>SMS </p>
                                    </a>
                                </li> 
                              
                          
                            </ul>
                        </li> 
                         <?php } ?>
                 <?php if ($this->_me['user_role'] == 'Admin') { ?>
                    <li class="nav-item ">
                            <a href="products" class="nav-link  <?php echo $pageid=='settings'?'active':'' ?> " >
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/profile" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile Settings </p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/company" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Company Settings </p>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a href="/<?= PROFILE_NAV ?>/change-pass" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li> 
                          
                            </ul>
                        </li> 
                    
                        <?php } ?>
                        
                         <li class="nav-item">
                            <a href="/dashboard/logout" class="nav-link   " >
                                <i class="nav-icon fas fa-sign-out"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li> 
                        
                    </ul>
                </nav>
            </div>
        </aside>
