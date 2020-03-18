
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
        <?php echo $heading;?> &nbsp;&nbsp;&nbsp;       
        
        <small></small>
      	<a href="<?php echo base_url();?>trainings/add_training" class="btn btn-success pull-right">Add New Training</a>
      </h1>
    </section>
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

    <!-- Main content -->
    <section class="content">


      <div class="row">
        <div class="col-xs-12">

          <div class="box box-success">
            <!--<div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  <th>Icon</th>
				  <th>Title</th>
                  <th>District</th>
                  <th>Tehsil</th>
                  <th>Venue</th>
                  <th>Start Date</th>
                  <th>End Date</th>
				  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

					<?php $this->load->model('districts/districts_model'); foreach ($query->result() as $row):?>
						<tr>

    				        <td><img src="<?php echo base_url().'assets/dist/img/picons/training.png';?>"></td>
							<td><?php echo $row->title;?></td>
    				        <td><?php echo $this->districts_model->_get_district_name($row->district);?></td>
    				        <td><?php echo $this->districts_model->_get_tehsil_name($row->tehsil);?></td>
    				        <td><?php echo $row->venue;?></td>
    				        <td><?php echo $row->start_date;?></td>
    				        <td><?php echo $row->end_date;?></td>
							<td><?php echo anchor("cb/view_training_detail/".$row->id, 'Report', 'class="btn-xs btn-success"');?></td>
						</tr>
					<?php endforeach;?> 
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
<!-- page script -->
<script src="<?php echo base_url();?>assets/charts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/charts/exporting.js"></script>


<script>
  $(document).ready(function() {
    
	$('#example1').DataTable({
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  //responsive: true,
	});
});
</script>