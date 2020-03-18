<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url();?>files/profile_images/pictures/emp.png" class="img-circle">
        </div>
        <div class="pull-left info">
          <!--<p>Ali Khan</p>-->
        </div>
      </div>

         
      <!-- Other Navigation -->
      <ul class="sidebar-menu" data-widget="tree">
      	<li class="header" style=" font-size:20px;font-weight:900;color:#FFFFFF; text-shadow:#99FF66;">Navigation</li>
        
        
        <!--<li <?php //if($this->uri->segment(1) == 'ad'){?>class="treeview active"<?php //}else{?> class="treeview"<?php //} ?>>
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Three Level Menu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
            <li><a href="<?php //echo base_url();?>ad/dashboard"><i class="fa fa-dashboard"></i> <span>Level One</span></a></li>
            
            
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            
          </ul>
        </li>-->
        
        
         
        <li <?php if($this->uri->segment(1) == 'uen' and $this->uri->segment(2) == 'home'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>uen/home"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
        
        
        <li <?php if($this->uri->segment(1) == 'spc' and $this->uri->segment(2) == 'index'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>spc/index"><i class="fa fa-bar-chart"></i> <span>Midline Linelisting</span></a></li>
        <li <?php if($this->uri->segment(1) == 'spc' and $this->uri->segment(2) == 'ml_dashboard'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>spc/ml_dashboard"><i class="fa fa-bar-chart"></i> <span>Midline Collection</span></a></li>
        
        <?php
          $id 	  = $this->users->get_user()->id;
          if($id == 1 or $id == 2 or $id == 3){
        ?>
        <li <?php if($this->uri->segment(1) == 'spc' and $this->uri->segment(2) == 'app_version'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>spc/app_version"><i class="fa fa-tablet"></i> <span>Tab App Version</span></a></li>
        <?php } ?>

        <li <?php if($this->uri->segment(1) == 'uen' and ($this->uri->segment(2) == 'health_facilities' || $this->uri->segment(2) == 'add_health_facility' || $this->uri->segment(2) == 'edit_health_facility')){ ?>class="treeview active"<?php } else { ?>class="treeview" <?php } ?>>
        
              <a href="#"><i class="fa fa-list"></i> Lists & Documents
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              
                <li <?php if($this->uri->segment(1) == 'uen' and ($this->uri->segment(2) == 'health_facilities' || $this->uri->segment(2) == 'add_health_facility' || $this->uri->segment(2) == 'edit_health_facility')){?> class="active" <?php } ?>><a href="<?php echo base_url();?>uen/health_facilities"><i class="fa fa-hospital-o"></i> <span> Health Facilities</span></a></li>
                
              </ul>
            </li>
        
        
        <li <?php if($this->uri->segment(1) == 'users'){ ?>class="treeview active"<?php } else { ?>class="treeview" <?php } ?>>
        
              <a href="#"><i class="fa fa-group"></i> User Management
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li <?php if($this->uri->segment(2) == 'index'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>users/index"><i class="fa fa-user"></i> <span>View Users</span></a></li>
                <li <?php if($this->uri->segment(2) == 'register'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>users/register"><i class="fa fa-user"></i> <span>Create User</span></a></li>
                <?php if($this->users->in_group('admin') || $this->users->in_group('management')){?>
                <li <?php if($this->uri->segment(2) == 'create_group'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>users/create_group"><i class="fa fa-user"></i> <span>Create Group</span></a></li>
                <?php } ?>
                
              </ul>
            </li>
        
        
      </ul>
      
      <?php //if($this->users->in_group('admin') || $this->users->in_group('management')){?>
      
      <!-- Implementation Navigation -->
      <ul class="sidebar-menu" data-widget="tree">
      
        <li class="header" style=" font-size:15px;font-weight:900;color:#FFFFFF;">UEN Implementation</li>
        
        <li <?php if($this->uri->segment(1) == 'cb'){?>class="treeview active"<?php }else{?> class="treeview"<?php } ?>>
        
              <a href="#"><i class="fa fa-graduation-cap"></i> Capacity Building
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li <?php if($this->uri->segment(1) == 'cb' and $this->uri->segment(2) == 'dashboard'){?> class="active" <?php } ?>><a href="<?php echo base_url();?>cb/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <!-- <li <?php //if($this->uri->segment(2) == 'tot_tdt'){?> class="active" <?php //} ?>><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>TOT & TDT</span></a></li>
                <li <?php //if($this->uri->segment(2) == 'tot_tdt'){?> class="active" <?php //} ?>><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>Academic Detailing</span></a></li> 
                <li <?php //if($this->uri->segment(1) == 'cb' && ($this->uri->segment(2) == 'view_users' || $this->uri->segment(2) == 'create_user')){?> class="active" <?php //} ?>><a href="<?php //echo base_url();?>cb/view_users"><i class="fa fa-user"></i> <span> User Management</span></a></li>-->
                
              </ul>
            </li>
            

            <li <?php if($this->uri->segment(1) == 'qoc'){?>class="treeview active"<?php }else{?> class="treeview"<?php } ?>>
            
              <a href="#"><i class="fa fa-thumbs-up"></i> Quality of Care
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li <?php if($this->uri->segment(1) == 'qoc' && $this->uri->segment(2) == 'dashboard'){?>class="active"<?php } ?>><a href="<?php echo base_url();?>qoc/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                
                <!--<li <?php //if($this->uri->segment(1) == 'qoc' && $this->uri->segment(2) == 'health_facilities'){?> class="active" <?php //} ?>><a href="<?php //echo base_url();?>qoc/health_facilities"><i class="fa fa-hospital-o"></i> <span> Health Facilities</span></a></li>
                 <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>QOC</span></a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>RSD</span></a></li>
                <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>DHMT</span></a></li> -->
                
                <!--<li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> H1
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> L1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Ln</a></li>
                  </ul>
                </li>-->
                
              </ul>
            </li>
            
            
            <li <?php if($this->uri->segment(1) == 'rsd'){?>class="treeview active"<?php }else{?> class="treeview"<?php } ?>>
            
              <a href="#"><i class="fa fa-life-ring"></i> DHIS Data Validation (RSD)
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li <?php if($this->uri->segment(1) == 'rsd' and $this->uri->segment(2) == 'dashboard'){?>class="active"<?php } ?>><a href="<?php echo base_url();?>rsd/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                
                <li <?php if($this->uri->segment(1) == 'rsd' and ($this->uri->segment(2) == 'dhis_shc' or $this->uri->segment(2) == 'dhis_shc_facility_detail' or $this->uri->segment(2) == 'month_detail')){?>class="active"<?php } ?>><a href="<?php echo base_url();?>rsd/dhis_shc"><i class="fa fa-dashboard"></i> <span>Secondary Health Facilities</span></a></li>
                
                <li <?php if($this->uri->segment(1) == 'rsd' and ($this->uri->segment(2) == 'dhis_phc' or $this->uri->segment(2) == 'dhis_phc_facility_detail' or $this->uri->segment(2) == 'phc_month_detail')){?>class="active"<?php } ?>><a href="<?php echo base_url();?>rsd/dhis_phc"><i class="fa fa-dashboard"></i> <span>Primary Health Facilities</span></a></li>

              </ul>
            </li>
            
            
            <li <?php if($this->uri->segment(1) == 'ce' || $this->uri->segment(2) == 'vhc'){?>class="treeview active"<?php }else{?> class="treeview"<?php } ?>>
            
              <a href="#"><i class="fa fa-users"></i> Community Engagement
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li <?php if($this->uri->segment(1) == 'ce' && $this->uri->segment(2) == 'dashboard'){?>class="active"<?php } ?>><a href="<?php echo base_url();?>ce/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <!-- <li <?php //if($this->uri->segment(2) == 'household'){?> class="active"<?php //} ?>><a href="<?php //echo base_url();?>ce/household"><i class="fa fa-chevron-circle-right"></i> <span>Household</span></a></li>
                <li <?php //if($this->uri->segment(2) == 'wsg'){?> class="active"<?php //} ?>><a href="<?php //echo base_url();?>ce/wsg"><i class="fa fa-chevron-circle-right"></i> <span>WSG</span></a></li>
                <li <?php //if($this->uri->segment(2) == 'vhc'){?> class="active"<?php //} ?>><a href="<?php //echo base_url();?>ce/vhc"><i class="fa fa-chevron-circle-right"></i> <span>VHC</span></a></li> -->
                
                <!--<li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Hn
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> L1</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Ln</a></li>
                  </ul>
                </li>-->
              </ul>
            </li>
            
            
            
            
            
            <li <?php if($this->uri->segment(1) == 'lhw'){?>class="treeview active"<?php }else{?> class="treeview"<?php } ?>>
            
              <a href="#"><i class="fa fa-medkit"></i> Commodities & Supplies
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

              </ul>
            </li>
            
            
            <li class="treeview">
            
              <a href="#"><i class="fa fa-handshake-o"></i> DHMPT Monitoring
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                
              </ul>
            </li>

      </ul>
      
      
      <!-- Trials Navigation -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style=" font-size:15px;font-weight:900;color:#FFFFFF;">UEN Trials</li>
        
        
        <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>Pulse Oximetry</span></a></li>
        <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>SRC</span></a></li>
        <li><a href="#"><i class="fa fa-chevron-circle-right"></i> <span>MAPPS</span></a></li>
        
      </ul>
      <?php //} ?>
      
      
      
      
       
      
    </section>
    <!-- /.sidebar -->
  </aside>