
<body class="hold-transition skin-green sidebar-mini fixed">
<div class="wrapper">

  <?php echo $this->load->view('includes/header');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $this->load->view('includes/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php $this->load->model('trainings/trainings_model');?>
      <h1>
        <?php echo $heading;?>      
        <small><strong><?php echo $this->trainings_model->_get_training_name($this->uri->segment(3));?></strong></small>
        <a href="<?php echo base_url();?>trainings/add_file/<?php echo $this->uri->segment(3);?>" class="btn btn-success pull-right">Upload File(s)</a>
      </h1>
    </section>
    
    <!--<hr style="border-color:#3C8DBC; width:98%; border-width:2px;">-->

    <!-- Main content -->
    <section class="content">
    
    <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="pretest_scores" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="marks_percentage" style="height: 400px; margin: 0 auto;"></div>
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
              <div id="pretest_scores2" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
        
        
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="posttest_scores2" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- Row 4 End -->
      
      
      
      
      <!-- Row 4 Start -->
      <div class="row">
           
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="trainees_by_designation" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
           
      </div>
      <!-- Row 4 End -->
      
      
      <!-- Row 4 Start -->
      <div class="row">
        
        <div class="col-md-12">
          <!-- AREA CHART -->
          <div class="box box-success">
            
            <div class="box-body">
              <div id="prepost_results" style="height: 400px; margin: 0 auto;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
                
      </div>
      <!-- Row 4 End -->
      
      
      <div class="row">

        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Facilitators</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="tbl_facilitators">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Contact</th>
                    <th>Organization</th>
                  </tr>
                  </thead>
                  <tbody>
                  


				  <?php $j = 1; foreach($facilitators->result() as $facilitator){
				  ?>
                  <tr>
                    <td><?php echo $j;?></td>
                    <td><?php echo $facilitator->name;?></td>
                    <td><?php if($facilitator->designation != '') {echo $facilitator->designation;}else{echo "-";}?></td>
                    <td><?php if($facilitator->contact != '') {echo $facilitator->contact;}else{echo "-";}?></td>
                    <td><?php if($facilitator->organization != '') {echo $facilitator->organization;}else{echo "-";}?></td>
                  </tr>
                  <?php $j = $j + 1; } ?>                  
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col 6 -->
                  
      </div>                 
 
 
 
 		<div class="row">
            <div class="col-md-12">
            
            <!-- TABLE: LATEST ORDERS -->
            <?php
            $attributes = array('id' => 'myForm');
            echo form_open('trainings/add_trainee_detail/'.$this->uri->segment(3), $attributes);
            ?>           
               
              <div class="box box-success">
                <div class="box-header with-border"><h3 class="box-title">Trainees</h3></div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin" id="tbl_prepost_results">
                      <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Contact</th>
                        <th>Organization</th>
                        <th>Attendance</th>
                        <th>Pretest Result</th>
                        <th>Posttest Result</th>
                        <th>Variance</th>
                      </tr>
                      </thead>
                      <tbody>
                     
    <?php
    $this->load->model('trainigs/trainings_model');
    $i = 1;
    $trainees = $this->trainings_model->get_where_custom('db4t3_training_trainees', 'training', $this->uri->segment(3));
    foreach($trainees->result() as $trainee){
    
        if($trainee->pretest_result > 0){
            $disabled2 = 'disabled';
        }else{
            $disabled2 = '';
        }
        
        if($trainee->posttest_result > 0){
            $disabled3 = 'disabled';
        }else{
            $disabled3 = '';
        }	
    ?>                  
                      <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $trainee->name;?></td>
                        <td><?php echo $trainee->designation;?></td>
                        <td><?php echo $trainee->contact;?></td>
                        <td><?php echo $trainee->organization;?></td>
                        <td>
                        <?php
                        $days = $this->trainings_model->get_where_custom('db4t4_training_days', 'training', $this->uri->segment(3));
                        foreach($days->result() as $day){
                        
                            $attendance = $this->trainings_model->_custom_query("select * from db4t5_training_attendance where trainee_id = $trainee->id and day_id = $day->id");
                            foreach($attendance->result() as $att){
                                if($att->present > 0){
                                    $checked = 'checked';
                                    $disabled = 'disabled';
                                }else{
                                    $checked = '';
                                    $disabled = '';
                                }						
                            }
                        
                        echo '<div class="checkbox" style="display:inline"><label><input '.$disabled.' type="checkbox" '.$checked.' name="days[]" value="'.$att->id.'">Day '.$day->day_number.'</label></div> ';
                        }
                        ?>
                        </td>
                        
                        
                        
                        <td>
                        <div class="form-group"><input type="text" name="pretest_result[]" class="form-control" placeholder="Pretest Result" value="<?php echo $trainee->pretest_result;?>" id="pre-test"><span style="display: none;"><?php echo $trainee->pretest_result;?></span></div>
                        </td>
                        <td>
                        <div class="form-group"><input type="text" name="posttest_result[]" class="form-control" placeholder="Posttest Result" value="<?php echo $trainee->posttest_result;?>" id="post-test"><span style="display: none;"><?php echo $trainee->posttest_result;?></span></div>
                        </td>
                        
                        <td style="padding-top:14px;"><p style="border:1px solid; text-align:center;"><?php echo $trainee->posttest_result - $trainee->pretest_result;?></p></td>
                        
                        
                        
                        
                        
                        
                        <input name="trainee[]" type="hidden" value="<?php echo $trainee->id;?>">
                      </tr>
    <?php $i = $i + 1; } ?>                  
                      
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <button class="btn btn-sm btn-success btn-flat pull-left" type="submit" name="submit">Save Changes</button>
                </div>
                <!-- /.box-footer -->
              </div>
              <?php echo form_close();?>          
              <!-- /.box -->
              
            </div>  
        </div>
          
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
<script src="<?php echo base_url();?>assets/charts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/charts/data.js"></script>
<script src="<?php echo base_url();?>assets/charts/drilldown.js"></script>

<!-- page script -->
<script>
  $(function () {
    
	$("#tbl_prepost_results").DataTable({
	  dom: '<"top"Bf>',
	  buttons: [
		{
		extend: "csv",
		className: "btn-sm"
		},
		{
		extend: "excel",
		className: "btn-sm"
		}
		],
		responsive: true,
	  	lengthMenu: [
			[ 100 ],
		],
	});
	
	
	
	$("#tbl_facilitators").DataTable({
	  dom: '<"top"Bf>',
	  buttons: [
		{
		extend: "csv",
		className: "btn-sm"
		},
		{
		extend: "excel",
		className: "btn-sm"
		}
		],
		responsive: true,	
	  //"scrollX": true,
	  lengthMenu: [
			[ 100 ],
		],
	});
	
	
	
	
<!-- Chart -->

Highcharts.chart('trainees_by_designation', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Distribution of trainees by designation'
    },
    xAxis: {
        allowDecimals: false,
		min:0,
		categories: [<?php foreach($barChart->result() as $bar){echo "'".$bar->designation."',";}?>]
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
		reversed: false
    },
    plotOptions: {
        series: {
            stacking: false
        }
    },
	credits: {
      enabled: false
  	},
    series: [{
		showInLegend: false,
		name: 'Training <?php echo $training;?>',
		color:'#008749',
        data: [<?php foreach($barChart->result() as $bar2){echo $bar2->hcp.",";}?>]
    }]
});



<!-- Chart 2 -->

Highcharts.chart('prepost_results', {
    
    chart: {
        type: 'column',
        options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        },
    },
    title: {
        text: 'Pre-Post Results in Percentage'
    },
    xAxis: {
        categories: [<?php $i = 1; foreach($pre_post_results->result() as $row){echo "'".$i."',"; $i = $i + 1;}?>],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Marks Obtained'
        }
    },
	
    tooltip: {
        shared: true,
		valueSuffix: '%'
    },
	
	credits: {
      enabled: false
  	},
	
	series: [{
        name: 'Posttest Results',
		color: '#008749',
        data: [<?php foreach($pre_post_results->result() as $row1){echo $row1->posttest_result.",";}?>]

    }, {
        name: 'Pretest Result',
		color:'#084ba9',
        data: [<?php foreach($pre_post_results->result() as $row2){echo $row2->pretest_result.",";}?>]

    }, {
        name: 'Variance',
		color: '#a43619',
        data: [<?php foreach($pre_post_results->result() as $row3){echo $row3->variance.",";}?>]

    }]
});



<!-- Forth Chart -->

Highcharts.chart('marks_percentage', {
    chart: {
        type: 'column',
        options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        },
    },
    title: {
        text: 'Destribution of trainees by Posttest Scores'
    },
    xAxis: {
		title: {
            text: 'Percentages'
        },
		categories: [<?php foreach($percentages->result() as $percent){echo "'".$percent->percentage."%',";}?>]
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
        data: [<?php foreach($percentages->result() as $percent2){echo $percent2->number.",";}?>]
    }]
});





<!-- Forth Chart -->

Highcharts.chart('pretest_scores', {
    chart: {
        type: 'column',
        options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        },
    },
    title: {
        text: 'Destribution of trainees by Pretest Scores'
    },
    xAxis: {
		title: {
            text: 'Percentages'
        },
		categories: [<?php foreach($pretest_scores->result() as $pre){echo "'".$pre->percentage."%',";}?>]
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
        data: [<?php foreach($pretest_scores->result() as $pre2){echo $pre2->number.",";}?>]
    }]
});








<!-- Forth Chart -->

Highcharts.chart('pretest_scores2', {
    chart: {
        type: 'column',
        options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        },
    },
    title: {
        text: 'Destribution of trainees by Pretest Scores'
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
        data: [<?php echo $pretest_scores2->below_60;?>, <?php echo $pretest_scores2->sixty_70;?>, <?php echo $pretest_scores2->seventy_80;?>, <?php echo $pretest_scores2->eighty_90;?>, <?php echo $pretest_scores2->ninty_100;?>]
    }]
});





<!-- Forth Chart -->

Highcharts.chart('posttest_scores2', {
    chart: {
        type: 'column',
        options3d: {
				  enabled: true,
				  alpha: 5,
				  beta: 5,
        },
    },
    title: {
        text: 'Destribution of trainees by Posttest Scores'
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
        data: [<?php echo $posttest_scores2->below_60;?>, <?php echo $posttest_scores2->sixty_70;?>, <?php echo $posttest_scores2->seventy_80;?>, <?php echo $posttest_scores2->eighty_90;?>, <?php echo $posttest_scores2->ninty_100;?>]
    }]
});







/*Highcharts.chart('dummy', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Destribution of trainees by Pretest Scores'
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
        data: [19, 3, 2, 0, 1]
    }]
});



Highcharts.chart('dummy2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Destribution of trainees by Posttest Scores'
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
        data: [0, 0, 4, 17, 4]
    }]
});*/

});
</script>