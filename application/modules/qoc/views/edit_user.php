<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <?php echo $this->load->view('includes/header');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $this->load->view('includes/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $heading;?>
        <small>
			<?php if (! empty($message)) { ?>
                <div id="message">
                <?php echo $message; ?>
                </div>
            <?php } ?>  
        </small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="box box-primary">
        
        	<div class="box-header"><!--<h3 class="box-title">Quick Example</h3>--></div>
            
            <div class="box-body" id="wizard">
            	                
                <?php $attributes = array('id' => 'edit_user', 'name' => 'edit_user'); ?>
                <?php echo form_open_multipart('qoc/edit_user/'.$this->uri->segment(3), $attributes);?>

                <div class="col-md-12">

                    <!-- .row = Phase 1 -->
                    <div class="row" id="phase1" style="display:block;">
                                           
                        <div class="col-md-3"></div>
                       
                        <div class="col-md-6">
                        <?= validation_errors("<p style='font-weight:bold;color:#FF0000;'>", "</p>") ?>
                        <?php if(validation_errors()){ ?><hr style="border: none; height: 5px;color: #333;background-color:red;"><?php } ?>
                        
                           <div class="form-group">
                             <label class="control-label">Full Name:</label>
                             <input type="text" class="form-control field" name="name" id="name" value="<?php echo $user->full_name;?>">
                           </div>
  
                           <div class="form-group">
                             <label class="control-label">Username:</label>
                             <input type="text" class="form-control" name="username" id="username" value="<?php echo $user->username;?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">Password:</label>
                             <input type="text" class="form-control" name="password" id="password" value="<?php echo $user->password;?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">Designation:</label>
                             <input type="text" class="form-control" name="designation" id="designation" value="<?php echo $user->designation;?>">
                           </div>

                           <div class="form-group">
                            <label>District:</label>
                              <select class="form-control select2" name="district" id="district" style="width: 100%;">
                                <option value="">Select District</option>
                                <option value="113" <?php if($user->district_code == 113){?> selected<?php } ?>>Rahimyar Khan</option>
                                <option value="123" <?php if($user->district_code == 123){?> selected<?php } ?>>Muzaffargarh</option>
                                <option value="211" <?php if($user->district_code == 211){?> selected<?php } ?>>Badin</option>
                                <option value="234" <?php if($user->district_code == 234){?> selected<?php } ?>>Kamber</option>
                                <option value="252" <?php if($user->district_code == 252){?> selected<?php } ?>>Sanghar</option>
                                <option value="414" <?php if($user->district_code == 414){?> selected<?php } ?>>Lasbella</option>
                                <option value="432" <?php if($user->district_code == 432){?> selected<?php } ?>>Jaffarabad</option>
                                <option value="434" <?php if($user->district_code == 434){?> selected<?php } ?>>Naseerabad</option>
                              </select>
                            </div>
                           
                           <div class="form-group">
                            <label>Auth Level:</label>
                              <select class="form-control select2" name="auth_level" id="auth_level" style="width: 100%;">
                                <option value="">Select Auth Level</option>
                                <option value="0" <?php if($user->auth_level == 0){?> selected<?php } ?>>Enable</option>
                                <option value="1" <?php if($user->auth_level == 1){?> selected<?php } ?>>Disable</option>
                              </select>
                            </div>
                                                                         
                            <hr style="border: none; height: 5px;color: #333;background-color:#00CCFF;">                                                        
                            <button class="btn btn-info" value="Save User" type="submit" name="submit">Save User</button>
                            <button class="btn btn-danger"  value="Cancel" type="submit" name="submit">Cancel</button>    
                        </div>
                        
                        <div class="col-md-3"></div>
                    </div>
                    <!-- /.row = Phase 1 -->
                                        
                </div>
                
                <div class="col-md-3"></div>
                <?php echo form_close();?>
            </div>
        <!-- /.box-body -->
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>
  
</div>
<!-- ./wrapper -->

<?php echo $this->load->view('includes/scripts');?>
<!-- page script -->
<script>
$(function () {
	
	$('.select2').select2()
	
});
</script>