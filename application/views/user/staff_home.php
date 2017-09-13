

<?php echo $map['js']; ?>
<?php if ($a_total > 0) {
  ?>
<script type="text/javascript">
var dis_names = <?php echo json_encode($diaseases_names);?>;
var dis_no = <?php echo json_encode($diaseases_no);?>;
var dis_age = <?php echo json_encode($diaseases_age);?>;
var dis_no_p = <?php echo json_encode($diaseases_no_p);?>;
var dis_a_total = <?php echo json_encode($a_total);?>;
var dis_uhc_names = <?php echo json_encode($uhc_names);?>;
var dis_uhc_counts = <?php echo json_encode($uhc_counts);?>;
var males = <?php echo json_encode($males);?>;
var females = <?php echo json_encode($females);?>;
var other = <?php echo json_encode($other);?>;
</script>
<?php
 $this->load->view('user/header')?>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content container-fluid">
    <section>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- stats -->
     
<form action="<?php echo site_url('gender'); ?>" method="post"> 


<div class="row">
<div class="col-xl-2 col-md-12 col-sm-12">

<select name="gender" id="gender_filter" class="form-control">
<option value="">Select Gender</option>
  <option value="1">Male</option>
  <option value="2">Female</option>
  <option value="0">Other</option>
</select>

</div>

 <div class="col-xl-2 col-md-12 col-sm-12">

<select name="occupation" id="occu_api" class="form-control">
<option value="">Select Occupation</option>
 <?php for($i=0;$i<count($occu_list);$i++) { ?>
  <option value="<?php echo $occu_list[$i]['patient_occupation']; ?>"><?php echo $occu_list[$i]['patient_occupation']; ?></option>
  <?php } ?>
 
</select>

</div>

<div class="col-xl-2 col-md-12 col-sm-12">

<input type="date" name="start_date" id="start_date" placeholder="Select Start Date" class="form-control">
</div>
<div class="col-xl-2 col-md-12 col-sm-12">
<input type="date" name="end_date" id="end_date" placeholder="Select End Date" class="form-control">
</div>





 <div class="col-xl-2 col-md-12 col-sm-12">
<input type="submit" value="Filter" class="btn btn-outline-primary"> </div></div>
</form>


      <div class="row">
      <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="pink"><?php echo count($staff);  ?></h3>
                          <span>Total Staff</span>
                      </div>
                      <div class="media-right media-middle">
                    <i class="icon-user-md pink font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
      <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="teal"><?php echo $a_total;?></h3>
                          <span>Patients</span>
                      </div>
                      <div class="media-right media-middle">
                          <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
      <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="deep-orange"><?php echo count($diaseases); ?></h3>
                          <span>Diseases Prevailing</span>
                      </div>
                      <div class="media-right media-middle">
                          <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
      <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="cyan"><?php echo count($hosp_list); ?></h3>
                          <span>Total UHCs</span>
                      </div>
                      <div class="media-right media-middle">
                          <i class="icon-building-o cyan font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<div class="content-body"><!-- Charts section start -->
<section id="chartjs-bar-charts">

<div class="row">
        
 <!-- <div class="col-xl-4 col-md-6 col-sm-12"> -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Diseases Chart</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">

                        <canvas id="diaseases-pie-chart" height="400"></canvas>
  
                    </div>
                </div>
            </div>
        </div>

         <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Gender Chart</h4>
 
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">

                        <canvas id="sex-pie-chart" height="340"></canvas>
                        
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>


</div>
<div class="row">

        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Age Group Chart</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">

                        <canvas id="age-column-chart" height="400"></canvas>
                        <!-- 0-10: <?php echo $age_wise_filter['0-10p'].'%'; ?><br>
                        10-20: <?php echo $age_wise_filter['10-20p'].'%'; ?><br>
                        20-30: <?php echo $age_wise_filter['20-30p'].'%'; ?><br>
                        30-40: <?php echo $age_wise_filter['30-40p'].'%'; ?><br>
                        40-50: <?php echo $age_wise_filter['40-50p'].'%'; ?><br>
                         -->
                    </div>
                </div>
            </div>
        </div>

    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">UHC Chart</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <canvas id="uhc-column-chart" height="400"></canvas>
                
                </div>
            </div>
        </div>
    </div>


      <div class="col-md-12 col-sm-12">

      <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Area
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  <?php for($i=0;$i<count($diaseases);$i++){?>
    <li><a href="<?php echo site_url('home/diseasesdata').'/'.$diaseases[$i]['diaseases_id']; ?>"><?php echo $diaseases[$i]['diaseases_name']; ?></a></li>
 
    <?php } ?>
  </ul>
</div><br>

    
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Diseases Map</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
<?php echo $map['html']; ?>
                    <canvas id="uhc-column-chart" height="400"></canvas>
                
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</section>
</div>
<!--/ stats -->
<!--/ project charts -->

  <?php
   $this->load->view('user/footer')?>


<?php }else{?>

<?php $this->load->view('user/header'); ?> 

 <div class="app-content content container-fluid">
    <section>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body"><!-- stats -->
<form action="<?php echo site_url('gender'); ?>" method="post"> 

<div class="col-xl-2 col-md-12 col-sm-12">
<select name="gender" id="gender_filter" class="form-control">
<option value="">Select Gender</option>
  <option value="1">Male</option>
  <option value="2">Female</option>
  <option value="0">Other</option>
</select>
</div>

<div class="col-xl-2 col-md-12 col-sm-12">
<select name="occupation" id="occu_api" class="form-control">
<option value="">Select Occupation</option>
 <?php for($i=0;$i<count($occu_list);$i++) { ?>
  <option value="<?php echo $occu_list[$i]['patient_occupation']; ?>"><?php echo $occu_list[$i]['patient_occupation']; ?></option>
  <?php } ?>
 
</select>
</div>

<div class="col-xl-2 col-md-12 col-sm-12">

<input type="date" name="start_date" id="start_date" placeholder="Select Start Date" class="form-control">
</div>
<div class="col-xl-2 col-md-12 col-sm-12">
<input type="date" name="end_date" id="end_date" placeholder="Select End Date" class="form-control">
</div>
<div class="col-xl-1 col-md-12 col-sm-12">
<input type="submit" value="Filter" class="btn btn-outline-primary">
</div>
</form>
<br>
<br><br>

      <div class="row">
      <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="pink"><?php echo count($staff);  ?></h3>
                          <span>Total Staff</span>
                      </div>
                      <div class="media-right media-middle">
                    <i class="icon-user-md pink font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
      <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="teal"><h3 class="teal"><?php echo $a_total;?></h3></h3>
                          <span>Patients</span>
                      </div>
                      <div class="media-right media-middle">
                          <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
      <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="deep-orange"><?php echo count($diaseases); ?></h3>
                          <span>Diseases Prevailing</span>
                      </div>
                      <div class="media-right media-middle">
                          <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="col-xl-3 col-lg-6 col-xs-12">
      <div class="card">
          <div class="card-body">
              <div class="card-block">
                  <div class="media">
                      <div class="media-body text-xs-left">
                          <h3 class="cyan"><?php echo count($hosp_list); ?></h3>
                          <span>Total UHCs</span>
                      </div>
                      <div class="media-right media-middle">
                          <i class="icon-building-o cyan font-large-2 float-xs-right"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
 
</div> <h2 style="float:left">Data Not Found,Please Try with different Options.</h2>


      <div class="col-md-12 col-sm-12">

      <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Area
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
  <?php for($i=0;$i<count($diaseases);$i++){?>
    <li><a href="<?php echo site_url('home/diseasesdata').'/'.$diaseases[$i]['diaseases_id']; ?>"><?php echo $diaseases[$i]['diaseases_name']; ?></a></li>
 
    <?php } ?>
  </ul>
</div><br>

    
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Diseases Map</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
<?php echo $map['html']; ?>
                    <canvas id="uhc-column-chart" height="400"></canvas>
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
</div>

<?php $this->load->footer('user/footer'); }?>

<script>
$(document).ready(function(){
  <?php if(isset($gender_id))
  {?>
  var gender= "<?php echo $gender_id; ?>";
$('#gender_filter').val(gender);
<?php } ?>
});


$(document).ready(function(){
  <?php if(isset($occupation))
  {?>
  var occu_api= "<?php echo $occupation; ?>";
  var startdate = "<?php echo $start_date; ?>";
var endtdate = "<?php echo $end_date; ?>";

  $('#occu_api').val(occu_api);
  $('#start_date').val(startdate);
  $('#start_date').val(endtdate);

<?php } ?>
});


    
          
        
</script>