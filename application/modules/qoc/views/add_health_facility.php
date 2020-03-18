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
    	<div class="box box-info">
        
        	<div class="box-header"><!--<h3 class="box-title">Quick Example</h3>--></div>
            
            <div class="box-body" id="wizard">
            	                
                <?php $attributes = array('id' => 'add_hf', 'name' => 'add_hf'); ?>
                <?php echo form_open('qoc/add_health_facility', $attributes);?>

                <div class="col-md-12">

                    <!-- .row = Phase 1 -->
                    <div class="row" id="phase1" style="display:block;">
                                           
                        <div class="col-md-3"></div>
                       
                        <div class="col-md-6">
                        <?= validation_errors("<p style='font-weight:bold;color:#FF0000;'>", "</p>") ?>
                        <?php if(validation_errors()){ ?><hr style="border: none; height: 5px;color: #333;background-color:red;"><?php } ?>
                        
                           
                           <div class="form-group">
                            <label>Type:</label>
                              <select class="form-control select2" name="type" id="type" style="width: 100%;">
                                <option value="">Select Facility Type</option>
                                <option value="1" <?php echo set_select('type', 1, false);?>>Public Health Facility</option>
                                <option value="2" <?php echo set_select('type', 2, false);?>>Private Health Facility</option>
                              </select>
                            </div>
                            
                            
                            <div class="form-group">
                            <label>Level:</label>
                              <select class="form-control select2" name="level" id="level" style="width: 100%;">
                                
                              </select>
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
                            <label>Tehsil:</label>
                              <select class="form-control select2" name="tehsil" id="tehsil" style="width: 100%;">
                                
                              </select>
                            </div>
                            
                            <div class="form-group">
                            <label>Union Council:</label>
                              <select class="form-control select2" name="uc" id="uc" style="width: 100%;">
                                
                              </select>
                            </div>
                           
                           <div class="form-group">
                             <label class="control-label">Address:</label>
                             <input type="text" class="form-control field" name="address" id="address" value="<?php echo set_value('address', $this->session->userdata('address')); ?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">Name:</label>
                             <input type="text" class="form-control field" name="name" id="name" value="<?php echo set_value('name', $this->session->userdata('name')); ?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">Government Name:</label>
                             <input type="text" class="form-control field" name="govt_name" id="govt_name" value="<?php echo set_value('govt_name', $this->session->userdata('govt_name')); ?>">
                           </div>
                           
                           
                           <div class="form-group">
                             <label class="control-label">DHIS Code:</label>
                             <input type="text" class="form-control field" name="dhis_code" id="dhis_code" value="<?php echo set_value('dhis_code', $this->session->userdata('dhis_code')); ?>">
                           </div>
                           
                           <div class="form-group">
                             <label class="control-label">UEN Code:</label>
                             <input type="text" class="form-control field" name="uen_code" id="uen_code" value="<?php echo set_value('uen_code', $this->session->userdata('uen_code')); ?>">
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
	
	$('.select2').select2();
	
	
	// Ajax Jquery Dynamuic dropdown
    $('#type').on('change',function(){
        var type = $(this).val();
        if(type){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url()."qoc/getLevels";?>',
                data:'type='+type,
                success:function(html){
                    $('#level').html(html); 
                }
            }); 
        }
    });
	
	
	// Ajax Jquery Dynamuic dropdown
    $('#district').on('change',function(){
        var district = $(this).val();
        if(district){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url()."qoc/getTehsils";?>',
                data:'district='+district,
                success:function(html){
                    $('#tehsil').html(html); 
                }
            }); 
        }
    });
	
	
	// Ajax Jquery Dynamuic dropdown
    $('#tehsil').on('change',function(){
        var tehsil = $(this).val();
        if(tehsil){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url()."qoc/getUCs";?>',
                data:'tehsil='+tehsil,
                success:function(html){
                    $('#uc').html(html); 
                }
            }); 
        }
    });
	
});
</script>