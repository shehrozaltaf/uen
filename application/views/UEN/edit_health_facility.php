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
            	                
                <?php $attributes = array('id' => 'edit_hf', 'name' => 'edit_hf'); ?>
                <?php echo form_open('uen/edit_health_facility/'.$hf->dhis_code, $attributes);?>

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
                                <option value="1" <?php if($hf->hf_type == 1){?> selected<?php } ?>>Public Health Facility</option>
                                <option value="2" <?php if($hf->hf_type == 2){?> selected<?php } ?>>Private Health Facility</option>
                              </select>
                            </div>

							<div class="form-group">
								<label>Health Facility Sub Type:</label>
								<select class="form-control select2" name="hf_sub_type" id="hf_sub_type" style="width: 100%;">
									<option value="1" <?php if($hf->hf_sub_type == 1){?> selected<?php } ?>>Primary Health Facility</option>
									<option value="2" <?php if($hf->hf_sub_type == 2){?> selected<?php } ?>>Secondary Health Facility</option>
									<option value="3" <?php if($hf->hf_sub_type == 3){?> selected<?php } ?>>Private Health Facility</option>
								</select>
							</div>

							<div class="form-group">
								<label>Division:</label>
								<select class="form-control select2" name="division" id="division" style="width: 100%;">
									<option value="Bahawalpur" <?php if($hf->division == 'Bahawalpur'){?> selected<?php } ?>>Bahawalpur</option>
									<option value="Dera Ghazi Khan" <?php if($hf->division == 'Dera Ghazi Khan'){?> selected<?php } ?>>Dera Ghazi Khan</option>
									<option value="Hyderabad" <?php if($hf->division == 'Hyderabad'){?> selected<?php } ?>>Hyderabad</option>
									<option value="Kalat" <?php if($hf->division == 'Kalat'){?> selected<?php } ?>>Kalat</option>
									<option value="Larkana" <?php if($hf->division == 'Larkana'){?> selected<?php } ?>>Larkana</option>
									<option value="Naseerabad" <?php if($hf->division == 'Naseerabad'){?> selected<?php } ?>>Naseerabad</option>
									<option value="Shaheed Benazirabad" <?php if($hf->division == 'Shaheed Benazirabad'){?> selected<?php } ?>>Shaheed Benazirabad</option>
								</select>
							</div>

							<div class="form-group">
                            <label>District:</label>
                              <select class="form-control select2" name="district" id="district" style="width: 100%;">
                                <option value="113" <?php if($hf->district_code == 113){?> selected<?php } ?>>Rahimyar Khan</option>
                                <option value="123" <?php if($hf->district_code == 123){?> selected<?php } ?>>Muzaffargarh</option>
                                <option value="211" <?php if($hf->district_code == 211){?> selected<?php } ?>>Badin</option>
                                <option value="234" <?php if($hf->district_code == 234){?> selected<?php } ?>>Kamber</option>
                                <option value="252" <?php if($hf->district_code == 252){?> selected<?php } ?>>Sanghar</option>
                                <option value="414" <?php if($hf->district_code == 414){?> selected<?php } ?>>Lasbella</option>
                                <option value="432" <?php if($hf->district_code == 432){?> selected<?php } ?>>Jaffarabad</option>
                                <option value="434" <?php if($hf->district_code == 434){?> selected<?php } ?>>Naseerabad</option>
                              </select>
                            </div>

                            <div class="form-group">
                            <label>Tehsil:</label>
                              <select class="form-control select2" name="tehsil" id="tehsil" style="width: 100%;">
                                
                                <?php 
								$tehsils = $this->master->get_where_custom('tehsils', 'district_code', $hf->district_code);
								foreach($tehsils->result() as $row){ ?>
									<option value="<?php echo $row->tehsil_code;?>" <?php if($row->tehsil_code == $hf->tehsil_code){?> selected<?php } ?>><?php echo $row->tehsil_name;?></option>
								<?php } ?>
                                
                              </select>
                            </div>

                           <div class="form-group">
                             <label class="control-label">Health Facility Name:</label>
                             <input type="text" class="form-control field" name="hf_name" id="hf_name" value="<?php echo $hf->facility_name?>">
                           </div>

                           <div class="form-group">
                             <label class="control-label">DHIS Code:</label>
                             <input type="text" class="form-control field" name="dhis_code" id="dhis_code" value="<?php echo $hf->dhis_code?>">
                           </div>

							<div class="form-group">
								<label>App(s):</label>
                                <select class="form-control select2" name="app[]" multiple id="facility_app" style="width:100%;">
									<?php $apps = explode(",",$hf->app);?>
                                    <option value="1" <?php if(in_array(1, $apps)){ ?>selected<?php }?>>RSD QOC DHMPT</option>
                                    <option value="2" <?php if(in_array(2, $apps)){ ?>selected<?php }?>>Academic Detailing</option>
                                    <option value="3" <?php if(in_array(3, $apps)){ ?>selected<?php }?>>LHW Monitoring</option>
                                    <option value="4" <?php if(in_array(4, $apps)){ ?>selected<?php }?>>CMW Monitoring</option>
                                    <option value="5" <?php if(in_array(5, $apps)){ ?>selected<?php }?>>Emergency Care</option>
                                 </select>
							</div>

							<div class="form-group">
								<label>Functional:</label>
								<select class="form-control select2" name="functional" id="functional" style="width: 100%;">
									<option value="1" <?php if($hf->functional == 1){?> selected<?php } ?>>Yes</option>
									<option value="2" <?php if($hf->functional == 2){?> selected<?php } ?>>No</option>
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
