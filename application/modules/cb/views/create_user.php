<body class="hold-transition skin-green sidebar-mini fixed">
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
    	<div class="box box-success">
        
        	<div class="box-header"><!--<h3 class="box-title">Quick Example</h3>--></div>
            
            <div class="box-body" id="wizard">
            	                
                <?php $attributes = array('id' => 'create_user', 'name' => 'create_user'); ?>
                <?php echo form_open('cb/create_user', $attributes);?>

                <div class="col-md-12">

                    <!-- .row = Phase 1 -->
                    <div class="row" id="phase1" style="display:block;">
                                           
                        <div class="col-md-3"></div>
                       
                        <div class="col-md-6">
                        <?= validation_errors("<p style='font-weight:bold;color:#FF0000;'>", "</p>") ?>
                        <?php if(validation_errors()){ ?><hr style="border: none; height: 5px;color: #333;background-color:red;"><?php } ?>
                        
                           <div class="form-group">
                             <label class="control-label">Full Name:</label>
                             <input type="text" class="form-control field" name="name" id="name" value="<?php echo set_value('name', $this->session->userdata('name')); ?>">
                           </div>
  
                           <div class="form-group">
                             <label class="control-label">Username:</label>
                             <input type="text" class="form-control" name="username" id="username" value="<?php echo set_value('username', $this->session->userdata('username')); ?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">Password:</label>
                             <input type="text" class="form-control" name="password" id="password" value="<?php echo set_value('password', $this->session->userdata('password')); ?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">Designation:</label>
                             <input type="text" class="form-control" name="designation" id="designation" value="<?php echo set_value('designation', $this->session->userdata('designation')); ?>">
                           </div>

                           <div class="form-group">
                            <label>District:</label>
                              <select class="form-control select2" name="district" id="district" style="width: 100%;">
                                <option value="">Select District</option>
                                <option value="113" <?php echo set_select('district', 113, false);?>>Rahimyar Khan</option>
                                <option value="123" <?php echo set_select('district', 123, false);?>>Muzaffargarh</option>
                                <option value="211" <?php echo set_select('district', 211, false);?>>Badin</option>
                                <option value="234" <?php echo set_select('district', 234, false);?>>Kamber</option>
                                <option value="252" <?php echo set_select('district', 252, false);?>>Sanghar</option>
                                <option value="414" <?php echo set_select('district', 414, false);?>>Lasbella</option>
                                <option value="432" <?php echo set_select('district', 432, false);?>>Jaffarabad</option>
                                <option value="434" <?php echo set_select('district', 434, false);?>>Naseerabad</option>
                              </select>
                            </div>
                           
                           <div class="form-group">
                            <label>Auth Level:</label>
                              <select class="form-control select2" name="auth_level" id="auth_level" style="width: 100%;">
                                <option value="">Select Auth Level</option>
                                <option value="0" <?php echo set_select('auth_level', 0, false);?>>Enable</option>
                                <option value="1" <?php echo set_select('auth_level', 1, false);?>>Disable</option>
                              </select>
                            </div>
                                                                         
                            <hr style="border: none; height: 5px;color: #333;background-color:green;">                                                        
                            <button class="btn btn-success" value="Save User" type="submit" name="submit">Save User</button>
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
	
	$('.select2').select2();
	
});
</script>