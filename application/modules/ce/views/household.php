<body class="hold-transition skin-red sidebar-mini fixed">
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
    
    
    <section class="content">
    
    
     
    
      <div class="box box-danger">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            
            
            	<?php $attributes = array('id' => 'filter_by_date', 'name' => 'filter_by_date'); ?>
                <?php echo form_open('ce/wsg', $attributes);?>
                
                
                <div class="col-md-5">
                    <div class="form-group">
                     <label>From Date:</label>
    
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       
                    <?php 
                        
                      if($this->session->userdata('start_date')){
					   		
							          $sd = '"'.$this->session->userdata('start_date').'"';
							
					            } else {
					   		
							          $sd = date('Y-m') . '-01';
					            }
					   
					          if($this->session->userdata('end_date')){
					   		
							        $ed = '"'.$this->session->userdata('end_date').'"';
							
					          } else {
					   		
							        $ed = date('Y-m-d');
					          }
					        ?>
                       
                        <input type="text" class="form-control pull-right" id="start_date" name="start_date" value="<?php echo set_value('start_date', $sd);?>">
                     </div>
                   </div>
               </div>
            
            
               <div class="col-md-5">
                   <div class="form-group">
                     <label>To Date:</label>
    
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                        <input type="text" class="form-control pull-right" id="end_date" name="end_date" value="<?php echo set_value('end_date', $ed);?>">
                     </div>
                   </div>
               </div>
               
               <div class="col-md-2">
               	<button class="btn btn-danger" type="submit" name="submit" style="margin-top:24px;">Filter1</button>
               </div>
               <?php echo form_close();?>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      
    
    
      <div class="box box-danger">
        <div class="box-header with-border"><h3 class="box-title">Key Indicators (LHW Source Register)</h3></div>
        <div class="box-body">
          
          <div class="row">

             <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $neonatal_deaths;?></h3>
                  <p><strong>Neonatal Deaths</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
             <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $child_deaths_diarrhea;?></h3>
                  <p><strong>Child Deaths (Diarrhea)</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
            <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $child_deaths_cough;?></h3>
                  <p><strong>Child Deaths (Cough & Difficult Breathing)</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
          </div>
        </div>
        <div class="box-footer"></div>
      </div>

    </section>
    
    
  </div>
  <!-- /.content-wrapper -->
  <?php echo $this->load->view('includes/footer');?>

</div>
<!-- ./wrapper -->
<?php echo $this->load->view('includes/scripts');?>
<?php //echo $this->load->view('includes/scripts2');?>
<!-- page script -->
<script src="<?php echo base_url();?>assets/charts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/charts/highcharts-3d.js"></script>
<!--<script src="https://code.highcharts.com/highcharts-3d.js"></script>-->
<script src="<?php echo base_url();?>assets/charts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/charts/data.js"></script>
<script src="<?php echo base_url();?>assets/charts/drilldown.js"></script>
<script>
$(function () {
	
	//$('#example1').DataTable()
	$('#example1').DataTable({
	  responsive: true,
	  dom: '<"top"B<"clear">><"bottom">',
	  buttons: ['excel', 'csv'],
	  "pageLength": 50,
	  "scrollX": true,
	  "ordering": false,
    });
	
	//Date picker
    $('#start_date').datepicker({
	  //startDate: "2018-10-08",
	  endDate:   new Date(),
	  autoclose: true,
	  format: 'yyyy-mm-dd',   	  
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#end_date').datepicker('setStartDate', minDate);
    });
	
	
    //Date picker
    $('#end_date').datepicker({
	  //startDate: "2018-10-08",
	  endDate:   new Date(),
	  autoclose: true,
	  format: 'yyyy-mm-dd',
    }).on('changeDate', function (selected) {
        var maxDate = new Date(selected.date.valueOf());
        $('#start_date').datepicker('setEndDate', maxDate);
    });	
	
});
</script>