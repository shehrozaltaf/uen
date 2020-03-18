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
      </h1>
      
    </section>
    
    
    <section class="content">
    
    
      <div class="box box-success">
        <div class="box-header with-border"><h3 class="box-title">Master Trainers/Trickle Down Training Events</h3></div>
        <div class="box-body">
          
          <div class="row">

             <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3><?php echo $trainings;?></h3>
                  <p><strong>Total Events</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
             <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $trainees;?></h3>
                  <p><strong>Total Trainees</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $trainees_70;?></h3>
                  <p><strong>Trainees Scored 70+ % in Posttest</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
          </div>
          

        </div>
        <div class="box-footer"></div>
      </div>
      
      
      
      
      
      <div class="box box-success">
        <div class="box-header with-border"><h3 class="box-title">Training Events By Training Name</h3></div>
        <div class="box-body">

          <div class="row">

             <div class="col-lg-2">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3><?php echo $events_by_name->ALSO;?></h3>
                  <p><strong>ALSO</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
            <div class="col-lg-2">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_name->GAPPD;?></h3>
                  <p><strong>GAPPD</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
             <div class="col-lg-2">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_name->HBBHBS;?></h3>
                  <p><strong>HBB/HBS</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_name->HBBHBSMH;?></h3>
                  <p><strong>HBB/HBS/Maternal Health</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
            
            <div class="col-lg-2">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_name->MH;?></h3>
                  <p><strong>Maternal Health</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
          </div>
          
          
          
        </div>
        <div class="box-footer"></div>
      </div>
      
      
      
      
      <div class="box box-success">
        <div class="box-header with-border"><h3 class="box-title">Training Events By Training Type</h3></div>
        <div class="box-body">

          <div class="row">

             <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3><?php echo $events_by_type->TOT_HCPs;?></h3>
                  <p><strong>TOT HCPs</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_type->TDT_HCPs;?></h3>
                  <p><strong>TDT HCPs</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
             <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_type->TOT_LHSs;?></h3>
                  <p><strong>TOT LHSs</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $events_by_type->TDT_LHWs;?></h3>
                  <p><strong>TDT LHWs</strong></p>
                </div>
                <div class="icon">
                  <i class="fa fa-graduation-cap"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
          </div>
          
          
          
        </div>
        <div class="box-footer"></div>
      </div>



      <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="pretest_trainees_by_percentage" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

		<div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="posttest_trainees_by_percentage" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- Row 4 End -->




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
<script src="<?php echo base_url();?>assets/charts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/charts/data.js"></script>
<script src="<?php echo base_url();?>assets/charts/drilldown.js"></script>

<script>
  $(document).ready(function() {
    
	$('#example1').DataTable({
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  //responsive: true,
	});
	
	
	// New Data Charts
	Highcharts.chart('pretest_trainees_by_percentage', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Pretest Percentages'
		},
		xAxis: {
			title: {
				text: 'Percentages'
			},
			categories: ['Below 60%', '60%', '70%', '80%', '90% and Above']
		},
		yAxis: {
			allowDecimals: false,
			min: 0,
			title: {
				text: 'Number of Trainees'
			}
		},
		legend: {
			enabled: false,
		},
		plotOptions: {
			column: {
				dataLabels: {
					enabled: true,
					crop: false,
					overflow: 'none'
				}
			}
		},
		credits: {
		  enabled: false
		},
		series: [{
			showInLegend: false,
			name: 'Trainees',
			color:'#008749',
			data: [<?php echo $pretest_trainees_by_percentage->below_60;?>, <?php echo $pretest_trainees_by_percentage->sixty_70;?>, <?php echo $pretest_trainees_by_percentage->seventy_80;?>, <?php echo $pretest_trainees_by_percentage->eighty_90;?>, <?php echo $pretest_trainees_by_percentage->ninty_100;?>]
		}]
	});


	// New Data Charts
	Highcharts.chart('posttest_trainees_by_percentage', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Posttest Percentages'
		},
		xAxis: {
			title: {
				text: 'Percentages'
			},
			categories: ['Below 60%', '60%', '70%', '80%', '90% and Above']
		},
		yAxis: {
			allowDecimals: false,
			min: 0,
			title: {
				text: 'Number of Trainees'
			}
		},
		legend: {
			enabled: false,
		},
		plotOptions: {
			column: {
				dataLabels: {
					enabled: true,
					crop: false,
					overflow: 'none'
				}
			}
		},
		credits: {
		  enabled: false
		},
		series: [{
			showInLegend: false,
			name: 'Trainees',
			color:'#008749',
			data: [<?php echo $posttest_trainees_by_percentage->below_60;?>, <?php echo $posttest_trainees_by_percentage->sixty_70;?>, <?php echo $posttest_trainees_by_percentage->seventy_80;?>, <?php echo $posttest_trainees_by_percentage->eighty_90;?>, <?php echo $posttest_trainees_by_percentage->ninty_100;?>]
		}]
	});
	
});
</script>