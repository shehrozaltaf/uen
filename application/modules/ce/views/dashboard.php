<?php //echo "<h1>".$result[0]['district_id']."<h1>";die();?>
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
                <?php echo form_open('ce/dashboard', $attributes);?>
                
                
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
        <div class="box-header with-border"><h3 class="box-title">Progress By District</h3></div>
        <div class="box-body">
          
          <div class="row">
          	
            <div class="col-md-12">
            <table id="t1" class="table table-bordered table-striped table-responsive" width="100%">
                
                <thead>
                    <tr>
                         <th>District</th>
                         <th>HF Visited</th>
                         <th>LHWs Visited</th>
                         <th>HH Collected</th>
                         <th>HH Visited</th>
                         <th>LHWs Asked For VHC</th>
                         <th>VHC Formed</th>
                         <th>VHC Not Formed</th>
                         <th>LHWs Asked For WSG</th>
                         <th>WSG Formed</th>
                         <th>WSG Not Formed</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php 
					$visited_hfs_total    = 0;
					$visited_lhws_total   = 0;
					$hh_collected_total   = 0;
					$hh_visited_total     = 0;
					$lhws_asked_total     = 0;
					$vhc_formed_total     = 0;
					$vhc_not_formed_total = 0;
					$lhws_asked2_total    = 0;
					$wsg_formed_total     = 0;
					$wsg_not_formed_total = 0;
					
					$ce = $this->load->database('ce', TRUE);
					foreach($result as $row){

						if($row['district_id'] == 113){
							$district = 'Rahim Yar Khan';
						} else if($row['district_id'] == 123){
							$district = 'Muzaffargarh';
						} else if($row['district_id'] == 211){
							$district = 'Badin';
						} else if($row['district_id'] == 234){
							$district = 'Qambar Shahdadkot';
						} else if($row['district_id'] == 252){
							$district = 'Sanghar';
						} else if($row['district_id'] == 414){
							$district = 'Lasbela';
						} else if($row['district_id'] == 432){
							$district = 'Jaffarabad';
						} else if($row['district_id'] == 434){
							$district = 'Naseerabad';
						}
						
						$visited_hfs_total    = $visited_hfs_total    + $row['visited_hfs'];
						$visited_lhws_total   = $visited_lhws_total   + $row['visited_lhws'];
						$hh_collected_total   = $hh_collected_total   + $row['hh_collected'];
						$hh_visited_total     = $hh_visited_total     + $row['hh_visited'];
						
						$vhc_q = "SELECT
case when sum(case when vhc.lhwf3b1 in(1, 2) then 1 else 0 end) is null then '0' else sum(case when vhc.lhwf3b1 in(1, 2) then 1 else 0 end) end as lhws_asked,
case when sum(case when vhc.lhwf3b1 = 1 then 1 else 0 end) is null then '0' else sum(case when vhc.lhwf3b1 = 1 then 1 else 0 end) end as vhc_formed,
case when sum(case when vhc.lhwf3b1 = 2 then 1 else 0 end) is null then '0' else sum(case when vhc.lhwf3b1 = 2 then 1 else 0 end) end as vhc_not_formed
from TableF3SectionB vhc
JOIN TableLHWSection lhw on lhw.id = vhc.LhwSectionPKId
JOIN HW_user hw on hw.id = lhw.lhwf1a3
JOIN TableMetaData md on md.LHWSectionId = lhw.id
where hw.district_id is not null and md.InterviewAceptable = 1 and vhc.status = 2 and hw.district_id = $row[district_id]";

						if(!empty($start_date) && !empty($end_date)){
		
							$vhc_q .= " and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '$start_date' and '$end_date'";
						} else {
							$vhc_q .= " and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
						}
						
						$vhc1 = $ce->query($vhc_q)->row();
						
						$lhws_asked_total     = $lhws_asked_total     + $vhc1->lhws_asked;
						$vhc_formed_total     = $vhc_formed_total     + $vhc1->vhc_formed;
						$vhc_not_formed_total = $vhc_not_formed_total + $vhc1->vhc_not_formed;
						
						
						$wsg_q = "SELECT
case when sum(case when wsg.lhwf5b1 in(1, 2) then 1 else 0 end) is null then '0' else sum(case when wsg.lhwf5b1 in(1, 2) then 1 else 0 end) end as lhws_asked2,
case when sum(case when wsg.lhwf5b1 = 1 then 1 else 0 end) is null then '0' else sum(case when wsg.lhwf5b1 = 1 then 1 else 0 end) end as wsg_formed,
case when sum(case when wsg.lhwf5b1 = 2 then 1 else 0 end) is null then '0' else sum(case when wsg.lhwf5b1 = 2 then 1 else 0 end) end as wsg_not_formed
from TableF5SectionB wsg
JOIN TableLHWSection lhw on lhw.id = wsg.LhwSectionPKId
JOIN HW_user hw on hw.id = lhw.lhwf1a3
JOIN TableMetaData md on md.LHWSectionId = lhw.id
where hw.tehsil_id is not null and md.InterviewAceptable = 1 and wsg.status = 2 and hw.district_id = $row[district_id]";

						if(!empty($start_date) && !empty($end_date)){
		
							$wsg_q .= " and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '$start_date' and '$end_date'";
						} else {
							$wsg_q .= " and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
						}
						
						$wsg1 = $ce->query($wsg_q)->row();
						
						$lhws_asked2_total    = $lhws_asked2_total    + $wsg1->lhws_asked2;
						$wsg_formed_total     = $wsg_formed_total     + $wsg1->wsg_formed;
						$wsg_not_formed_total = $wsg_not_formed_total + $wsg1->wsg_not_formed;
					?>
                    
                    <tr>
                    	
                        <td><?php echo $district;?></td>
                        <td><?php echo $row['visited_hfs'];?></td>
                        <td><?php echo $row['visited_lhws'];?></td>
                        <td><?php echo $row['hh_collected'];?></td>
                        <td><?php echo $row['hh_visited'];?></td>
                        
                        <td><?php echo $vhc1->lhws_asked;?></td>
                        <td><?php echo $vhc1->vhc_formed;?></td>
                        <td><?php echo $vhc1->vhc_not_formed;?></td>
                        
                        <td><?php echo $wsg1->lhws_asked2;?></td>
                        <td><?php echo $wsg1->wsg_formed;?></td>
                        <td><?php echo $wsg1->wsg_not_formed;?></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                
                
                <tfoot>
                    <tr>
                         <th>Total</th>
                         <th><?php echo $visited_hfs_total;?></th>
                         <th><?php echo $visited_lhws_total;?></th>
                         <th><?php echo $hh_collected_total;?></th>
                         <th><?php echo $hh_visited_total;?></th>
                         <th><?php echo $lhws_asked_total;?></th>
                         <th><?php echo $vhc_formed_total;?></th>
                         <th><?php echo $vhc_not_formed_total;?></th>
                         <th><?php echo $lhws_asked2_total;?></th>
                         <th><?php echo $wsg_formed_total;?></th>
                         <th><?php echo $wsg_not_formed_total;?></th>
                    </tr>
                </tfoot>
                
              </table>
              </div>
            
          </div>
          
        </div>
        <div class="box-footer"></div>
      </div>


    
    
    
    
    
    
    <div class="box box-danger">
        <div class="box-header with-border"><h3 class="box-title">Progress By Tehsil</h3> <?php //if(empty($start_date) && empty($end_date)){echo "Current Month";}?></div>
        <div class="box-body">
          
          <div class="row">
          	
            <div class="col-md-12">
            <table id="t2" class="table table-bordered table-striped table-responsive" width="100%">
                
                <thead>
                    <tr>
                         <th>Tehsil</th>
                         <th>HF Visited</th>
                         <th>LHWs Visited</th>
                         <th>HH Collected</th>
                         <th>HH Visited</th>
                         <th>LHWs Asked For VHC</th>
                         <th>VHC Formed</th>
                         <th>VHC Not Formed</th>
                         <th>LHWs Asked For WSG</th>
                         <th>WSG Formed</th>
                         <th>WSG Not Formed</th>
                    </tr>
                </thead>
                
                
                <tbody>
                
                	<?php 
					
					$visited_hfs_total2    = 0;
					$visited_lhws_total2   = 0;
					$hh_collected_total2   = 0;
					$hh_visited_total2     = 0;
					$lhws_asked_total2     = 0;
					$vhc_formed_total2     = 0;
					$vhc_not_formed_total2 = 0;
					$lhws_asked2_total2    = 0;
					$wsg_formed_total2     = 0;
					$wsg_not_formed_total2 = 0;
					
					$this->load->model('master_model', TRUE);
					foreach($result2 as $row2){
					
						$visited_hfs_total2    = $visited_hfs_total2    + $row2['visited_hfs'];
						$visited_lhws_total2   = $visited_lhws_total2   + $row2['visited_lhws'];
						$hh_collected_total2   = $hh_collected_total2   + $row2['hh_collected'];
						$hh_visited_total2     = $hh_visited_total2     + $row2['hh_visited'];
						
						$vhc_q2 = "SELECT
case when sum(case when vhc.lhwf3b1 in(1, 2) then 1 else 0 end) is null then '0' else sum(case when vhc.lhwf3b1 in(1, 2) then 1 else 0 end) end as lhws_asked,
case when sum(case when vhc.lhwf3b1 = 1 then 1 else 0 end) is null then '0' else sum(case when vhc.lhwf3b1 = 1 then 1 else 0 end) end as vhc_formed,
case when sum(case when vhc.lhwf3b1 = 2 then 1 else 0 end) is null then '0' else sum(case when vhc.lhwf3b1 = 2 then 1 else 0 end) end as vhc_not_formed
from TableF3SectionB vhc
JOIN TableLHWSection lhw on lhw.id = vhc.LhwSectionPKId
JOIN HW_user hw on hw.id = lhw.lhwf1a3
JOIN TableMetaData md on md.LHWSectionId = lhw.id
where hw.tehsil_id is not null and md.InterviewAceptable = 1 and vhc.status = 2 and hw.tehsil_id = $row2[tehsil_id]";

						if(!empty($start_date) && !empty($end_date)){
		
							$vhc_q2 .= " and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '$start_date' and '$end_date'";
						} else {
							$vhc_q2 .= " and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
						}
						
						$vhc = $ce->query($vhc_q2)->row();
						
						$lhws_asked_total2     = $lhws_asked_total2     + $vhc->lhws_asked;
						$vhc_formed_total2     = $vhc_formed_total2     + $vhc->vhc_formed;
						$vhc_not_formed_total2 = $vhc_not_formed_total2 + $vhc->vhc_not_formed;
						
						
						$wsg_q2 = "SELECT
case when sum(case when wsg.lhwf5b1 in(1, 2) then 1 else 0 end) is null then '0' else sum(case when wsg.lhwf5b1 in(1, 2) then 1 else 0 end) end as lhws_asked2,
case when sum(case when wsg.lhwf5b1 = 1 then 1 else 0 end) is null then '0' else sum(case when wsg.lhwf5b1 = 1 then 1 else 0 end) end as wsg_formed,
case when sum(case when wsg.lhwf5b1 = 2 then 1 else 0 end) is null then '0' else sum(case when wsg.lhwf5b1 = 2 then 1 else 0 end) end as wsg_not_formed
from TableF5SectionB wsg
JOIN TableLHWSection lhw on lhw.id = wsg.LhwSectionPKId
JOIN HW_user hw on hw.id = lhw.lhwf1a3
JOIN TableMetaData md on md.LHWSectionId = lhw.id
where hw.tehsil_id is not null and md.InterviewAceptable = 1 and wsg.status = 2 and hw.tehsil_id = $row2[tehsil_id]";

						if(!empty($start_date) && !empty($end_date)){
		
							$wsg_q2 .= " and CONVERT(date, substring(md.datetimeupload, 1, 10), 105) between '$start_date' and '$end_date'";
						} else {
							$wsg_q2 .= " and month(CONVERT(date, substring(md.datetimeupload, 1, 10), 105)) = month(getdate())";
						}
						
						$wsg = $ce->query($wsg_q2)->row();
						
						$lhws_asked2_total2    = $lhws_asked2_total2    + $wsg->lhws_asked2;
						$wsg_formed_total2     = $wsg_formed_total2     + $wsg->wsg_formed;
						$wsg_not_formed_total2 = $wsg_not_formed_total2 + $wsg->wsg_not_formed;
					?>
                    
                    <tr>
                    	
                        <td><?php echo $this->master_model->_get_tehsil($row2['tehsil_id']);?></td>
                        <td><?php echo $row2['visited_hfs'];?></td>
                        <td><?php echo $row2['visited_lhws'];?></td>
                        <td><?php echo $row2['hh_collected'];?></td>
                        <td><?php echo $row2['hh_visited'];?></td>
                        
                        
                        <td><?php echo $vhc->lhws_asked;?></td>
                        <td><?php echo $vhc->vhc_formed;?></td>
                        <td><?php echo $vhc->vhc_not_formed;?></td>
                        <td><?php echo $wsg->lhws_asked2;?></td>
                        <td><?php echo $wsg->wsg_formed;?></td>
                        <td><?php echo $wsg->wsg_not_formed;?></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                
                
                <tfoot>
                    <tr>
                         <th>Total</th>
                         <th><?php echo $visited_hfs_total2;?></th>
                         <th><?php echo $visited_lhws_total2;?></th>
                         <th><?php echo $hh_collected_total2;?></th>
                         <th><?php echo $hh_visited_total2;?></th>
                         <th><?php echo $lhws_asked_total2;?></th>
                         <th><?php echo $vhc_formed_total2;?></th>
                         <th><?php echo $vhc_not_formed_total2;?></th>
                         <th><?php echo $lhws_asked2_total2;?></th>
                         <th><?php echo $wsg_formed_total2;?></th>
                         <th><?php echo $wsg_not_formed_total2;?></th>
                    </tr>
                </tfoot>
                
              </table>
              </div>
            
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
$(function(){

  $("#t1").DataTable({
	  "scrollX": true,
	  "info" : false,
	  "paging" : false,
	  "filter" : false,
	  "ordering": false,
	  
	  dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ]
	});
	
	$("#t2").DataTable({
	  "scrollX": true,
	  "info" : false,
	  "paging" : false,
	  "filter" : false,
	  "ordering": false,
	  
	  dom: 'Bfrtip',
        buttons: [
            'excelHtml5'
        ]
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