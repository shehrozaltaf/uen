
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
        <a href="<?php echo base_url();?>qoc/add_health_facility" class="btn btn-info pull-right">Add Health Facility</a>
      </h1>
    </section>
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-info">
            <!--<div class="box-header">
            <h3>SECTION 2: BACKGROUND</h3>
              <h3 class="box-title">2.4 BACKGROUND and GENERAL SIGNS AND SYMPTOMS </h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped" width="100%">
                
                <thead>
                    <tr>
                      <th width="5%">S#</th>
                      <th width="5%">Province</th>
                      <th width="5%">District</th>
                      <th width="10%">Tehsil</th>
                      <th width="5%">UC</th>
                      <th width="35%">Address</th>
                      <th width="20%">Name</th>
                      <th width="5%">DHIS Code</th>
                      <th width="10%">Actions</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php $i = 1; foreach($facilities->result() as $row){ 
					
					if($row->hf_prov_code == 1){
						$province = 'Punjab';
					} else if($row->hf_prov_code == 2){
						$province = 'Sindh';
					} else {
						$province = 'Balochistan';
					}
					
					?>
                	<tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $province;?></td>
                      <td><?php echo $row->hf_district_code;?></td>
                      <td><?php echo $row->hf_tehsil;?></td>
                      <td><?php echo $row->hf_uc;?></td>
                      <td><?php echo $row->hf_address;?></td>
                      <td><?php echo $row->hf_name;?></td>
                      <td><?php echo $row->hf_dhis;?></td>
                      <td><?php echo "Edit | Delete";?></td>
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
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>
  
</div>
<!-- ./wrapper -->

<?php echo $this->load->view('includes/scripts');?>

<script src="<?php echo base_url();?>assets/charts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/charts/highcharts-3d.js"></script>

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

<script>
/*function ConfirmDelete(){
	
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
}*/
</script>