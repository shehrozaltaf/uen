
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
        <a href="<?php echo base_url();?>uen/add_health_facility" class="btn btn-primary pull-right">Add Health Facility</a>
      </h1>
    </section>
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

     <!-- Main content -->
    <section class="content">
      
      
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <!--<div class="box-header">
            <h3>SECTION 2: BACKGROUND</h3>
              <h3 class="box-title">2.4 BACKGROUND and GENERAL SIGNS AND SYMPTOMS </h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped" width="100%">
                
                <thead>
                    <tr>
                      <th>S#</th>
                      <th>Code</th>
                      <th>Name</th>
                      <th>District</th>
                      <th>Tehsil</th>
                      <th>Type</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php $i = 1; foreach($facilities->result() as $row){ 
					
					if($row->hf_type == 1){
						$type = 'Public';
					} else if($row->hf_type == 2){
						$type = 'Private';
					}
					?>
                	<tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row->dhis_code;?></td>
                      <td><?php echo $row->facility_name;?></td>
                      <td><?php echo $row->district;?></td>
                      <td><?php echo $row->tehsil;?></td>
                      <td><?php echo $type;?></td>
                      <td><?php echo anchor("uen/edit_health_facility/".$row->dhis_code, 'Edit', 'class="btn-xs btn-primary"');?></td>
                  </tr>
                  <?php $i = $i + 1; } ?>
                    
                </tbody>
                
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 
 
 
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">
            <!--<h3>Health Facilities By District</h3>-->
              <h3 class="box-title">Health Facilities By District</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example2" class="table table-bordered table-striped" width="100%">
                
                <thead>
                    <tr>
                      <th>S#</th>
                      <th>District Code</th>
                      <th>District Name</th>
                      <th>Number of Facilities</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php $j = 1; $total1 = 0; foreach($facilities_by_district->result() as $row2){ 
						  $total1 = $total1 + $row2->facilities
					?>
                	<tr>
                      <td><?php echo $j;?></td>
                      <td><?php echo $row2->district_code;?></td>
                      <td><?php echo $row2->district;?></td>
                      <td><?php echo $row2->facilities;?></td>
                  </tr>
                  <?php $j = $j + 1; } ?>
                </tbody>
                
                
                <tfoot>
                    <tr>
                      <th colspan="3"><div align="right">Total</div></th>
                      <th><?php echo $total1;?></th>
                    </tr>
                </tfoot>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      
      
      
      
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header">
            <!--<h3>Health Facilities By District</h3>-->
              <h3 class="box-title">Health Facilities By Tehsil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example3" class="table table-bordered table-striped" width="100%">
                
                <thead>
                    <tr>
                      <th>S#</th>
                      <th>Tehsil</th>
                      <th>District Code</th>
                      <th>District Name</th>
                      <th>Number of Facilities</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php $k = 1; $total2 = 0; foreach($facilities_by_tehsil->result() as $row3){ 
						  $total2 = $total2 + $row3->facilities
					?>
                	<tr>
                      <td><?php echo $k;?></td>
                      <td><?php echo $row3->tehsil;?></td>
                      <td><?php echo $row3->district_code;?></td>
                      <td><?php echo $row3->district;?></td>
                      <td><?php echo $row3->facilities;?></td>
                  </tr>
                  <?php $k = $k + 1; } ?>
                </tbody>
                
                
                <tfoot>
                    <tr>
                      <th colspan="4"><div align="right">Total</div></th>
                      <th><?php echo $total1;?></th>
                    </tr>
                </tfoot>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
    
	$("#example1").DataTable({
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  "ordering": false,
	  //responsive: true,
	});
	
	$("#example2").DataTable({
	  dom: '<"top"Brt<"clear">>rt<"bottom">',
	  buttons: ['excel', 'csv'],
	  //responsive: true,
	});
	
	$("#example3").DataTable({
	  dom: '<"top"Brt<"clear">>rt<"bottom">',
	  buttons: ['excel', 'csv'],
	  pageLength: 30,
	  //responsive: true,
	});
	
	
	/*$( "#btn-danger" ).click(function() {
		$.confirm({
			title: 'Confirm!',
			content: 'Simple confirm!',
			buttons: {
				confirm: function () {
					$.alert('Confirmed!');
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		});
	});*/
});
</script>
