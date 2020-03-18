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
    
    
    <section class="content">
    
    
     
    
      <div class="box box-info">
        
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
            
            
            	<?php $attributes = array('id' => 'filter_by_date', 'name' => 'filter_by_date'); ?>
                <?php echo form_open('qoc/dashboard', $attributes);?>
                
                
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
               	<button class="btn btn-info" type="submit" name="submit" style="margin-top:24px;">Filter</button>
               </div>
               <?php echo form_close();?>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      
    
    
      <div class="box box-info">
        <div class="box-header with-border"><h3 class="box-title"></h3></div>
        <div class="box-body">
          
          <div class="row">

             <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $hf_visited->num_rows();?></h3>
                  <p><strong>Helath Facilities Visited</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-thumbs-up"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
          </div>
        </div>
        <div class="box-footer"></div>
      </div>
      
      
      
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">1.1: Routine assessment of every mother on admission, during labour and child birth and are given timely & appropriate care</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered" width="100%">
                <thead>
                
                	<tr>
                  		<th>S#</th>
                        <th>District</th>
                        <th>Yes</th>
                        <th>Yes %</th>
                        <th>No</th>
                        <th>No %</th>
                        <th>NA</th>
                        <th>NA %</th>
                        <th>Total</th>  
                	</tr>
                    
                </thead>
                <tbody>

					<?php $j = 1; foreach ($hf_by_district->result() as $r):?>
                    <tr>
                  		<td><?php echo $j;?></td>
                        <td><b><?php echo $this->master->_get_district_name($r->district_code);?></b></td>
                        <td><?php echo $r->qa0101a_yes;?></td> 
                        <td><?php echo round($r->qa0101a_yes_p, 1);?></td>
                        <td><?php echo $r->qa0101a_no;?></td>
                        <td><?php echo round($r->qa0101a_no_p, 1);?></td>
                        <td><?php echo $r->qa0101a_na;?></td>
                        <td><?php echo round($r->qa0101a_na_p, 1);?></td>
                        <td><?php echo $r->total;?></td>
                	</tr>
                    <?php $j = $j + 1; endforeach;?>
                
                </tbody>
                
                <tfoot>
                
                	<!--<tr>
                  		<th>S#</th>
                        <th>District</th>
                        <th>Yes</th>
                        <th>Yes %</th>
                        <th>No</th>
                        <th>No %</th>
                        <th>NA</th>
                        <th>NA %</th>
                        <th>Total</th>  
                	</tr>-->
                    
                </tfoot>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      
      
      
      <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-info">
            
            <div class="box-body">
              <div id="hf_by_district" style="width:99%"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- Row 4 End -->
      
      
      
      <div class="row">
        <div class="col-xs-12">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Health Facilities Visited</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
				  
                  <th>S#</th>
                  <th>Health Facility</th>
                  <th>District</th>
                  <th>Tehsil</th>
                  <th>UC</th>
                  <th>Form Date</th>
                  <th>Actions</th>
                                
                  </tr>
                </thead>
                <tbody>

				<?php $i = 1; foreach ($hf_visited->result() as $row):?>
                    <tr>
                        
                        <td><?php echo $i;?></td>
                        <td><?php echo $row->hf_name;?></td>
                        <td><?php echo $row->district_code;?></td>
                        <td><?php echo $row->tehsil_code;?></td>
                        <td><?php echo $row->uc_code;?></td>
                        <td><?php echo $row->form_date;?></td>
                        
                        
                        <td><?php echo anchor("qoc/hf_detail/".$row->uc_code."/".$row->form_date, 'View Detail', 'class="btn-sm btn-info"');?></td>
                    </tr>
                <?php $i = $i + 1; endforeach;?> 
                
                </tbody>
                <tfoot>
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
	
	$('#example1').DataTable({
	  dom: '<"top"Bt<"clear">><"bottom">',
	  buttons: ['excel', 'csv'],
	  "ordering": false,
    });
	
	$('#example2').DataTable({
	  responsive: true,
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
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
	
	
	
	/////  Chart /////
	
	Highcharts.chart('hf_by_district', {
		chart: {
			type: 'column',
			options3d: {
				enabled: true,
				alpha: 5,
				beta: 5,
			}
		},
		
		credits: {
		  enabled: false
		},
		title: {
			text: '1.1: Routine assessment of every mother on admission, during labour and child birth and are given timely & appropriate care'
		},
		xAxis: {
			//categories: [<?php //for($l = 0; $l < count($hf_by_district_arr); $l++){ if($l == count($hf_by_district_arr)-1){$comma = '';}else{$comma = ',';} echo $this->master->_get_district_name($hf_by_district_arr[$l]['district_code']).$comma;}?>]
			
			categories: [<?php for($l = 0; $l < count($hf_by_district_arr); $l++){$name = $this->master->_get_district_name($hf_by_district_arr[$l]['district_code']); if($l == count($hf_by_district_arr)-1){$comma = '';}else{$comma = ',';} echo "'".$name."'".$comma;}?>]
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Frequency'
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: ( // theme
						Highcharts.defaultOptions.title.style &&
						Highcharts.defaultOptions.title.style.color
					) || 'gray'
				}
			}
		},
		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true
				}
			}
		},
		
		colors: ['#a6c96a', '#c42525', '#77a1e5'],
		
		series: [
		
		{name: 'Yes', data: [<?php for($m = 0; $m < count($hf_by_district_arr); $m++){echo $hf_by_district_arr[$m]['qa0101a_yes'].",";}?>]},
		
		{name: 'No', data: [<?php for($n = 0; $n < count($hf_by_district_arr); $n++){echo $hf_by_district_arr[$n]['qa0101a_no'].",";}?>]},
		
		{name: 'Not Applicable', data: [<?php for($o = 0; $o < count($hf_by_district_arr); $o++){echo $hf_by_district_arr[$o]['qa0101a_na'].",";}?>]},
		
		
		]
	});
		
});
</script>