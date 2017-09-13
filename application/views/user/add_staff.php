<?php //$this->load->view('user/header'); ?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Carehub+</title>
    <link rel="apple-touch-icon" sizes="60x60" href="../../app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../../app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../../app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../../app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="../../app-assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap.css'); ?>">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/fonts/icomoon.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/fonts/flag-icon-css/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/vendors/css/extensions/pace.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/vendors/css/ui/prism.min.css'); ?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap-extended.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/app.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/colors.css'); ?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/core/menu/menu-types/vertical-menu.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/core/menu/menu-types/vertical-overlay-menu.css'); ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/style.css'); ?>">
    <!-- END Custom CSS-->
  </head>
  <body>
  <br><br><br>
    <?php 
                $error = '';
                $error = validation_errors();
              if(isset($error) && $error!='' ){  ?>
                <div class="alert alert-danger" style="margin-top:5%">
                    <strong>Wrong Credentials!</strong>
                    <?php echo validation_errors(); ?>
                </div>
                <?php } ?>

     
          <?php if(isset($errormsg) && $errormsg!=''){  ?>
                <div class="alert alert-danger" style="margin-top:5%">
                    
                    <?php echo $errormsg; ?>
                </div>
                <?php } ?>

        <?php if(isset($message)){  ?><div class='alert alert-success' style="margin-top:5%">
                    <?php  echo $message;   ?>
                </div>
                <?php } ?> 
      <!-- navbar-fixed-top-->
  <!-- <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow"">
 
     <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-pills">
 
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="<?php echo base_url();?>assets/images/logo/Carehub.png"  class="brand-logo"></a></li>
                 
          </ul>
 
        </div>
    </div>
       <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav nav-pills">
               
              <li class="nav-link hidden-sm-down"><a href="" target="_blank" >Home</a></li>
            </ul>
    </nav>
 
     
-->
 
        <nav class="navbar navbar-fixed-top navbar-semi-dark navbar-shadow">
  <div class="container-fluid">
   

  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <img alt="branding logo" src="<?php echo base_url();?>assets/images/Carehub.png"  class="padd brand-logo">
    </div>
 
  
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav nav-pills pull-right">
        <li class="nav-item active"><a href="<?php echo base_url();?>welcome" >Home <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a href="<?php echo base_url('home');?>/add_staff" >Add Staff</a></li>
        <li class="nav-item"><a href="<?php echo base_url();?>about" >About</a></li>
        
     <!--     <li class="nav-item"><a href="<?php echo site_url();?>login" data-toggle="pill" class="nav-pill">Login</a></li>
    -->  </ul>
       
      
    </div>

  </div>

</nav>


<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   
    




<div class="container-fluid" style="margin-left:20%">
     
    <section id="content-types">
    <div class="row">
        
       
        <div class="col-xl-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title">Add Staff</h4>
                        <h6 class="card-subtitle text-muted">Request a New Staff</h6>
                    </div>
                    <div class="card-block">
                        <form class="form" action="<?php echo site_url('home/add_staff'); ?>" method="post">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Name</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_name'])) { echo $addstaff['staff_name']; } ?>" id="donationinput1" class="form-control" placeholder="Name" name="staff_name">
                                </div>
            
                                <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Email</label>
                                    <input type="email" value="<?php if(isset($addstaff['staff_email'])) { echo $addstaff['staff_email']; } ?>" id="donationinput1" class="form-control" placeholder="Email" name="staff_email">
                                </div>

                                  <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Username</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_username'])) { echo $addstaff['staff_username']; } ?>" id="donationinput1" class="form-control" placeholder="Username" name="staff_username">
                                </div>

                                 <div class="form-group">
                                    <label for="donationinput2" class="sr-only">Password</label>
                                    <input type="password" id="donationinput2" class="form-control" placeholder="Password" name="staff_password">
                                </div>


                                <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Mobile</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_phone'])) { echo $addstaff['staff_phone']; } ?>" id="donationinput1" class="form-control" placeholder="Mobile" name="staff_phone">
                                </div>
<div class="form-group">
                                 
<select name="staff_gender" class="form-control">
<option value="">Select Gender</option>

<option value="Male">Male</option>
<option value="Female">Female</option>
  


</select> </div>

                                 <div class="form-group">
                                 <textarea class="form-control" name="staff_address" ><?php echo $addstaff['staff_address']; ?></textarea>
                                </div>


                                 <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Area Code</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_areacode'])) { echo $addstaff['staff_areacode']; } ?>" id="donationinput1" class="form-control" placeholder="Area Code" name="staff_areacode">
                                </div>
 <div class="form-group">
                                 
<select name="staff_shift" class="form-control">
<option value="">Select Shift</option>

<option value="Day">Day</option>
<option value="Night">Night</option>
  


</select> </div>

                                  <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Salary</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_salary'])) { echo $addstaff['staff_salary']; } ?>" id="donationinput1" class="form-control" placeholder="Salary" name="staff_salary">
                                </div>

                               
 <div class="form-group">
                                 
<select name="hospital_id" class="form-control">
<option value="">Select Hospital</option>
<?php for($i=0;$i<count($hosp_list);$i++){ ?>
<option value="<?php echo $hosp_list[$i]['hospital_id']; ?>"><?php echo $hosp_list[$i]['hospital_name']; ?></option>
  
   <?php }?>
  

</select> </div>
  <br>
                            </div>
                            <div class="form-actions"><button type="submit" class="btn btn-outline-primary">Add Staff</button>
                          </div>
                             
                              
                        </form>
                    </div>
                </div>
            </div>
        </div>

         
    </div>

 

 
 
 



    
    </div>
    </div>
    </div> 

</div>
</section>
    
<?php $this->load->view('user/footer'); ?>