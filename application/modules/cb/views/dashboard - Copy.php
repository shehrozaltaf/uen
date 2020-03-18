<body class="hold-transition skin-green sidebar-mini">
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
        <div class="box-header with-border"><h3 class="box-title">Key Indicators</h3></div>
        <div class="box-body">
          
          <div class="row">

             <div class="col-lg-4">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3><?php echo $trainings;?></h3>
                  <p><strong>Trainings</strong></p>
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
                  <p><strong>Trainees</strong></p>
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



      <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="pretest_124" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="posttest_124" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- Row 4 End -->
      
      <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="pretest_379" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="posttest_379" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- Row 4 End -->


	  <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="pretest_568" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="posttest_568" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- Row 4 End -->

	  


      <!-- Row Start -->
	  <div class="row">
        <div class="col-xs-12">

          <div class="box box-success">
            <div class="box-header">
              <h3>Distribution Of Trainees By Designation</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped" width="100%">
                <thead>
                  <tr>
				    <th>District</th>
				    <th>Paediatrician</th>
                    <th>Medical Officer</th>
                    <th>IRMNCH & N Coordinator</th>
                    <th>Woman Medical Officer</th>
                    <th>Ad. MS</th>
                    <th>DCO National Program</th>
                    <th>DSC</th>
                    <th>LHS</th>
				    <th>DC LHW Program</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>

					<?php $i = 1; foreach ($designations->result() as $designation):?>
					    <tr>
        	        	    <td><strong><?php echo $designation->name;?></strong></td>
        	        		<td><?php echo $designation->paediatrician;?></td>
        	        		<td><?php echo $designation->medical_officer;?></td>
					        <td><?php echo $designation->IRMNCH_N_Coordinator;?></td>
        	        		<td><?php echo $designation->woman_medical_officer;?></td>
        	        		<td><?php echo $designation->ad_MS;?></td>
        	        		<td><?php echo $designation->DCO_national_program;?></td>
        	        		<td><?php echo $designation->DSC;?></td>
        	        		<td><?php echo $designation->LHS;?></td>
        	        		<td><?php echo $designation->DC_LHW_program;?></td>
					        <td><?php echo $designation->paediatrician + $designation->medical_officer + $designation->IRMNCH_N_Coordinator + $designation->woman_medical_officer + $designation->ad_MS + $designation->DCO_national_program + $designation->DSC + $designation->LHS + $designation->DC_LHW_program;?></td>
					    </tr>
					    <?php $i = $i + 1; endforeach;?> 
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	  <!-- Row End -->




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
$(function () {
    
	Highcharts.chart('trainees_by_designation', {
	    chart: {
        	type: 'column',
			options3d: {
				enabled: true,
				alpha: 5,
				beta: 5,
        	},
    	},
	    yAxis: {
		
			allowDecimals: false,
	        min: 1,
			
	        title: {
	            text: 'Number of Trainees'
	        },
	        labels: {
	            overflow: 'justify'
	        }
	    },
	    plotOptions: {
	        bar: {
	            dataLabels: {
	                enabled: true
	            }
	        }
	    },
	    legend: {
	        //y: -10,
	        verticalAlign: 'bottom',
	        floating: true,
	        borderWidth: 1,
	        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
	        shadow: true
	    },
	    credits: {
	        enabled: false
	    },
		
		xAxis: {
	        categories: [<?php echo "'".$trainees_array[0]['district']."'";?>, <?php echo "'".$trainees_array[1]['district']."'";?>, <?php echo "'".$trainees_array[2]['district']."'";?>, <?php echo "'".$trainees_array[3]['district']."'";?>, <?php echo "'".$trainees_array[4]['district']."'";?>, <?php echo "'".$trainees_array[5]['district']."'";?>, <?php echo "'".$trainees_array[6]['district']."'";?>, <?php echo "'".$trainees_array[7]['district']."'";?>],
	        title: {
	            text: 'Districts'
	        }
	    },
		
	    title: {
        	text: 'Distribution Of Trainees By Designation'
    	},
		
		series: [{
	        name: 'Paediatrician',
	        data: [<?php echo $trainees_array[0]['paediatrician'];?>, <?php echo $trainees_array[1]['paediatrician'];?>, <?php echo $trainees_array[2]['paediatrician'];?>, <?php echo $trainees_array[3]['paediatrician'];?>, <?php echo $trainees_array[4]['paediatrician'];?>, <?php echo $trainees_array[5]['paediatrician'];?>, <?php echo $trainees_array[6]['paediatrician'];?>, <?php echo $trainees_array[7]['paediatrician'];?>]
	    },
		{
	        name: 'MO',
	        data: [<?php echo $trainees_array[0]['medical_officer'];?>, <?php echo $trainees_array[1]['medical_officer'];?>, <?php echo $trainees_array[2]['medical_officer'];?>, <?php echo $trainees_array[3]['medical_officer'];?>, <?php echo $trainees_array[4]['medical_officer'];?>, <?php echo $trainees_array[5]['medical_officer'];?>, <?php echo $trainees_array[6]['medical_officer'];?>, <?php echo $trainees_array[7]['medical_officer'];?>]
	    },
		
		{
	        name: 'IRMNCH',
	        data: [<?php echo $trainees_array[0]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[1]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[2]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[3]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[4]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[5]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[6]['IRMNCH_N_Coordinator'];?>, <?php echo $trainees_array[7]['IRMNCH_N_Coordinator'];?>]
	    },
		
		{
	        name: 'WMO',
	        data: [<?php echo $trainees_array[0]['woman_medical_officer'];?>, <?php echo $trainees_array[1]['woman_medical_officer'];?>, <?php echo $trainees_array[2]['woman_medical_officer'];?>, <?php echo $trainees_array[3]['woman_medical_officer'];?>, <?php echo $trainees_array[4]['woman_medical_officer'];?>, <?php echo $trainees_array[5]['woman_medical_officer'];?>, <?php echo $trainees_array[6]['woman_medical_officer'];?>, <?php echo $trainees_array[7]['woman_medical_officer'];?>]
	    },
		
		{
	        name: 'Ad MS',
	        data: [<?php echo $trainees_array[0]['ad_MS'];?>, <?php echo $trainees_array[1]['ad_MS'];?>, <?php echo $trainees_array[2]['ad_MS'];?>, <?php echo $trainees_array[3]['ad_MS'];?>, <?php echo $trainees_array[4]['ad_MS'];?>, <?php echo $trainees_array[5]['ad_MS'];?>, <?php echo $trainees_array[6]['ad_MS'];?>, <?php echo $trainees_array[7]['ad_MS'];?>]
	    },
		
		{
	        name: 'DCO National Program',
	        data: [<?php echo $trainees_array[0]['DCO_national_program'];?>, <?php echo $trainees_array[1]['DCO_national_program'];?>, <?php echo $trainees_array[2]['DCO_national_program'];?>, <?php echo $trainees_array[3]['DCO_national_program'];?>, <?php echo $trainees_array[4]['DCO_national_program'];?>, <?php echo $trainees_array[5]['DCO_national_program'];?>, <?php echo $trainees_array[6]['DCO_national_program'];?>, <?php echo $trainees_array[7]['DCO_national_program'];?>]
	    },
		
		{
	        name: 'DSC',
	        data: [<?php echo $trainees_array[0]['DSC'];?>, <?php echo $trainees_array[1]['DSC'];?>, <?php echo $trainees_array[2]['DSC'];?>, <?php echo $trainees_array[3]['DSC'];?>, <?php echo $trainees_array[4]['DSC'];?>, <?php echo $trainees_array[5]['DSC'];?>, <?php echo $trainees_array[6]['DSC'];?>, <?php echo $trainees_array[7]['DSC'];?>]
	    },
		
		{
	        name: 'LHS',
	        data: [<?php echo $trainees_array[0]['LHS'];?>, <?php echo $trainees_array[1]['LHS'];?>, <?php echo $trainees_array[2]['LHS'];?>, <?php echo $trainees_array[3]['LHS'];?>, <?php echo $trainees_array[4]['LHS'];?>, <?php echo $trainees_array[5]['LHS'];?>, <?php echo $trainees_array[6]['LHS'];?>, <?php echo $trainees_array[7]['LHS'];?>]
	    },
		
		{
	        name: 'DC LHW Program',
	        data: [<?php echo $trainees_array[0]['DC_LHW_program'];?>, <?php echo $trainees_array[1]['DC_LHW_program'];?>, <?php echo $trainees_array[2]['DC_LHW_program'];?>, <?php echo $trainees_array[3]['DC_LHW_program'];?>, <?php echo $trainees_array[4]['DC_LHW_program'];?>, <?php echo $trainees_array[5]['DC_LHW_program'];?>, <?php echo $trainees_array[6]['DC_LHW_program'];?>, <?php echo $trainees_array[7]['DC_LHW_program'];?>]
	    },
		
		]
	});
		
});
</script>


<script>
  $(document).ready(function() {
    
	$('#example1').DataTable({
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  //responsive: true,
	})
	
	$('#example2').DataTable({
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  //responsive: true,
	})
	
	$('#example3').DataTable({
      'autoWidth'   : false,
	  dom: '<"top"Bfrt<"clear">>rt<"bottom"ilp>',
	  buttons: ['excel', 'csv'],
	  "scrollX": true,
	  //responsive: true,
    });
	
	// Chart
	Highcharts.chart('pretest_124', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Pretest Percentage (Trainings 1,2,4)'
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
			data: [<?php echo $pretest_124->below_60;?>, <?php echo $pretest_124->sixty_70;?>, <?php echo $pretest_124->seventy_80;?>, <?php echo $pretest_124->eighty_90;?>, <?php echo $pretest_124->ninty_100;?>]
		}]
	});
	
	// Chart
	Highcharts.chart('pretest_379', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Pretest Percentage (Trainings 3,7,9)'
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
			data: [<?php echo $pretest_379->below_60;?>, <?php echo $pretest_379->sixty_70;?>, <?php echo $pretest_379->seventy_80;?>, <?php echo $pretest_379->eighty_90;?>, <?php echo $pretest_379->ninty_100;?>]
		}]
	});
	
	// Chart
	Highcharts.chart('pretest_568', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Pretest Percentage (Trainings 5,6,8)'
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
			data: [<?php echo $pretest_568->below_60;?>, <?php echo $pretest_568->sixty_70;?>, <?php echo $pretest_568->seventy_80;?>, <?php echo $pretest_568->eighty_90;?>, <?php echo $pretest_568->ninty_100;?>]
		}]
	});
	
	// Chart
	Highcharts.chart('posttest_124', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Posttest Percentage (Trainings 1,2,4)'
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
			data: [<?php echo $posttest_124->below_60;?>, <?php echo $posttest_124->sixty_70;?>, <?php echo $posttest_124->seventy_80;?>, <?php echo $posttest_124->eighty_90;?>, <?php echo $posttest_124->ninty_100;?>]
		}]
	});
	
	// Chart
	Highcharts.chart('posttest_379', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Posttest Percentage (Trainings 3,7,9)'
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
			data: [<?php echo $posttest_379->below_60;?>, <?php echo $posttest_379->sixty_70;?>, <?php echo $posttest_379->seventy_80;?>, <?php echo $posttest_379->eighty_90;?>, <?php echo $posttest_379->ninty_100;?>]
		}]
	});
	
	// Chart
	Highcharts.chart('posttest_568', {
		chart: {
			type: 'column',
        	options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        	},
		},
		title: {
			text: 'Trainees By Posttest Percentage (Trainings 5,6,8)'
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
			data: [<?php echo $posttest_568->below_60;?>, <?php echo $posttest_568->sixty_70;?>, <?php echo $posttest_568->seventy_80;?>, <?php echo $posttest_568->eighty_90;?>, <?php echo $posttest_568->ninty_100;?>]
		}]
	});	
	
});
</script>