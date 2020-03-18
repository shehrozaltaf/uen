<?php //$user = $this->ion_auth->user()->row();?>
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
        <a href="<?php echo base_url();?>cb/create_user" class="btn btn-success pull-right">Add User</a>
      </h1>
    </section>
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

     <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-success">
            <!--<div class="box-header">
            <h3>SECTION 2: BACKGROUND</h3>
              <h3 class="box-title">2.4 BACKGROUND and GENERAL SIGNS AND SYMPTOMS </h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example1" class="table table-bordered table-striped" width="100%">
                
                <thead>
                    <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>District</th>
                      <th>Designation</th>
                      <th>Auth Level</th>
                      <th>Actions</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php foreach($users->result() as $row){ ?>
                	<tr>
                    	<td><?php echo $row->full_name;?></td>
                      <td><?php echo $row->username;?></td>
                      <td><?php echo $this->cb_model->_get_district_name($row->district_code);?></td>
                      <td><?php echo $row->designation;?></td>
                      <td><?php echo $row->auth_level;?></td>
                      <td><?php echo anchor("cb/edit_user/".$row->username, 'Edit', 'class="btn-xs btn-success"');?> | <?php echo anchor("cb/delete_user/".$row->username, 'Delete', 'class="btn-xs btn-danger"');?></td>
                  </tr>
                  <?php } ?>
                    
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