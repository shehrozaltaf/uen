<style>
.not-active {
  pointer-events: none;
  cursor: default;
  text-decoration: none;
}
</style>

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
    

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Family Members</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="get_list" class="table table-bordered table-responsive" width="100%">
                
                <thead>
                    
                    <tr>
                      <th>Serial No</th>
                      <th>Gender</th>
                      <th>DOB</th>
                      <th>Age</th>
                      <th>Marital Status</th>
                      <th>Education</th>
                      <th>Occupation</th>
                    </tr>
                
                </thead>
                   
                <tbody>
                  <?php foreach($get_list->result() as $row){
                    
                          if($row->gender == 1){
                            $gender = 'Male';
                          } else {
                            $gender = 'Female';
                          }

                          if($row->marital == 1){
                            $marital_status = 'Married';
                          } else if($row->marital == 2){
                            $marital_status = 'Unmarried';
                          } else if($row->marital == 3){
                            $marital_status = 'Widowed';
                          } else if($row->marital == 4){
                            $marital_status = 'Devorced/Separated';
                          } else {
                            $marital_status = 'None';
                          }

                          $dob = str_pad($row->d108a, 2, "0", STR_PAD_LEFT).'-'.str_pad($row->d108b, 2, "0", STR_PAD_LEFT).'-'.$row->d108c;

                          if($row->d110 == 0){
                            $education = 'None';
                          } else if($row->d110 == 1){
                            $education = 'Pre-Primary';
                          } else if($row->d110 == 2){
                            $education = 'Primary(1-5)';
                          } else if($row->d110 == 3){
                            $education = 'Middle(6-8)';
                          } else if($row->d110 == 4){
                            $education = 'Secondary(9-10)';
                          } else if($row->d110 == 5){
                            $education = 'Intermediate';
                          } else if($row->d110 == 6){
                            $education = 'Graduation';
                          } else if($row->d110 == 7){
                            $education = 'Masters';
                          } else if($row->d110 == 8){
                            $education = 'PhD';
                          } else if($row->d110 == 9){
                            $education = 'Diploma';
                          } else if($row->d110 == 10){
                            $education = 'Religious Education';
                          } else if($row->d110 == 98){
                            $education = 'Don\t Know';
                          } else if($row->d110 == 99){
                            $education = 'Not Applicable';
                          }

                          if($row->d111 == 1){
                            $occupation = 'Housewife';
                          } else if($row->d111 == 2){
                            $occupation = 'Unskilled Manual Labor';
                          } else if($row->d111 == 3){
                            $occupation = 'Skilled Manual Labor';
                          } else if($row->d111 == 4){
                            $occupation = 'Agriculture';
                          } else if($row->d111 == 5){
                            $occupation = 'Sales/Service';
                          } else if($row->d111 == 6){
                            $occupation = 'Professional';
                          } else if($row->d111 == 7){
                            $occupation = 'Student';
                          } else if($row->d111 == 8){
                            $occupation = 'Unemployed';
                          } else if($row->d111 == 9){
                            $occupation = 'Retired';
                          } else if($row->d111 == 99){
                            $occupation = 'Not Applicable';
                          } else {
                            $occupation = 'None';
                          }
                  ?>

                    <tr>
                      <td><?php echo $row->serial_no;?></td>
                      <td><?php echo $gender;?></td>
                      <td><?php echo $dob;?></td>
                      <td><?php echo $row->age;?></td>
                      <td><?php echo $marital_status;?></td>
                      <td><?php echo $education;?></td>
                      <td><?php echo $occupation;?></td>
                  </tr>
                  <?php } ?>
                </tbody>
                            
                <!--<tfoot>
                  <tr>
                    <th>District</th>
                    <th>Cluster Number</th>
                    <th>Total Structures</th>
                    <th>Residential Structures</th>
                  </tr>
                </tfoot>-->
                            
              </table>

            </div>
            <!-- ./box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      
    </section>    
    
    
    
    
    
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>

</div>
<!-- ./wrapper -->

<?php echo $this->load->view('includes/scripts');?>

<!-- page script -->
<script>
$(document).ready(function(){
  
  $('#get_list').DataTable({
	  responsive: true,
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
    "ordering": false,
    pageLength: 50,
    });

});
</script>