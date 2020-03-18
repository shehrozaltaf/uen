
<body class="hold-transition skin-yellow sidebar-mini fixed">
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
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-warning">
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
                      <th>Month</th>
                      <th>Year</th>
                      <th>District</th>
                      <th>Tehsil</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php $i = 1; foreach($months->result() as $row){ ?>
                	<tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $row->month;?></td>
                      <td><?php echo $row->year;?></td>
                      <td><?php echo $row->district?></td>
                      <td><?php echo $row->tehsil;?></td>
                      <td><?php echo anchor("rsd/month_detail/".$row->hf_code."/".$row->month."/".$row->year, 'View', 'class="btn-xs btn-warning"');?></td>
                  </tr>
                  <?php $i++; } ?>
                    
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