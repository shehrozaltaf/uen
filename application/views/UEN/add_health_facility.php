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
            	                
                <?php $attributes = array('id' => 'add_hf', 'name' => 'add_hf'); ?>
                <?php echo form_open('uen/add_health_facility', $attributes);?>

                <div class="col-md-12">

                    <!-- .row = Phase 1 -->
                    <div class="row" id="phase1" style="display:block;">
                                           
                        <div class="col-md-3"></div>
                       
                        <div class="col-md-6">
                        <?= validation_errors("<p style='font-weight:bold;color:#FF0000;'>", "</p>") ?>
                        <?php if(validation_errors()){ ?><hr style="border: none; height: 5px;color: #333;background-color:red;"><?php } ?>
                        
                           
                           <div class="form-group">
                            <label>Health Facility Type:</label>
                              <select class="form-control select2" name="hf_type" id="hf_type" style="width: 100%;">
                                <option value="">Select Facility Type</option>
                                <option value="1" <?php echo set_select('hf_type', 1, false);?>>Public Health Facility</option>
                                <option value="2" <?php echo set_select('hf_type', 2, false);?>>Private Health Facility</option>
                              </select>
                            </div>

							<div class="form-group">
								<label>Health Facility Sub Type:</label>
								<select class="form-control select2" name="hf_sub_type" id="hf_sub_type" style="width: 100%;">
									<option value="">Select Facility Sub Type</option>
									<option value="1" <?php echo set_select('hf_sub_type', 1, false);?>>Primary Health Facility</option>
									<option value="2" <?php echo set_select('hf_sub_type', 2, false);?>>Secondary Health Facility</option>
									<option value="3" <?php echo set_select('hf_sub_type', 3, false);?>>Private Health Facility</option>
								</select>
							</div>

							<div class="form-group">
								<label>Division:</label>
								<select class="form-control select2" name="division" id="division" style="width: 100%;">
									<option value="">Select Division</option>
									<option value="Bahawalpur" <?php echo set_select('division', 'Bahawalpur', false);?>>Bahawalpur</option>
									<option value="Dera Ghazi Khan" <?php echo set_select('division', 'Dera Ghazi Khan', false);?>>Dera Ghazi Khan</option>
									<option value="Hyderabad" <?php echo set_select('division', 'Hyderabad', false);?>>Hyderabad</option>
									<option value="Kalat" <?php echo set_select('division', 'Kalat', false);?>>Kalat</option>
									<option value="Larkana" <?php echo set_select('division', 'Larkana', false);?>>Larkana</option>
									<option value="Naseerabad" <?php echo set_select('division', 'Naseerabad', false);?>>Naseerabad</option>
									<option value="Shaheed Benazirabad" <?php echo set_select('division', 'Shaheed Benazirabad', false);?>>Shaheed Benazirabad</option>
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
                             <label class="control-label">Health Facility Name:</label>
                             <input type="text" class="form-control field" name="hf_name" id="hf_name" value="<?php echo set_value('hf_name', $this->session->userdata('hf_name')); ?>">
                           </div>

                           <div class="form-group">
                             <label class="control-label">DHIS Code:</label>
                             <input type="text" class="form-control field" name="dhis_code" id="dhis_code" value="<?php echo set_value('dhis_code', $this->session->userdata('dhis_code')); ?>">
                           </div>

							<div class="form-group">
								<label>App(s):</label>
								<select class="form-control select2" name="app[]" multiple id="user_app" style="width:100%;">
									<option value="1">RSD QOC DHMPT</option>
									<option value="2">Academic Detailing</option>
									<option value="3">LHW Monitoring</option>
									<option value="4">CMW Monitoring</option>
									<option value="5">Emergency Care</option>
								</select>
							</div>

							<div class="form-group">
								<label>Functional:</label>
								<select class="form-control select2" name="functional" id="functional" style="width: 100%;">
									<option value="1" <?php echo set_select('functional', 1, false);?>>Yes</option>
									<option value="2" <?php echo set_select('functional', 2, false);?>>No</option>
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
	
	$('.select2').select2();

	// Ajax Jquery Dynamuic dropdown
	$('#division').on('change',function(){
		var division = $(this).val();
		if(division){
			$.ajax({
				type:'POST',
				url:'<?php echo base_url()."uen/getDistricts";?>',
				data:'division='+division,
				success:function(html){
					$('#district').html(html);
				}
			});
		}
	});

	// Ajax Jquery Dynamuic dropdown
    $('#district').change(function(){
        var district = $(this).val();
        if(district){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url()."uen/getTehsils";?>',
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
                url:'<?php echo base_url()."uen/getUCs";?>',
                data:'tehsil='+tehsil,
                success:function(html){
                    $('#uc').html(html); 
                }
            }); 
        }
    });
	
});
</script>
