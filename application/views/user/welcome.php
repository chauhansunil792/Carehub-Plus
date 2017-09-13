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
        <li class="nav-item"><a href="<?php echo base_url();?>welcome" >Home <span class="sr-only">(current)</span></a></li>
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

   
    




<div class="container-fluid">
     
    <section id="content-types">
    <div class="row">
        
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title">Our Features</h4>
                        <h6 class="card-subtitle text-muted">Glance at our provided features</h6>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="<?php echo base_url();?>/assets/images/slider1.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url();?>/assets/images/slider2.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url();?>/assets/images/slider3.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo base_url();?>/assets/images/slider4.png" alt="Third slide">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-block">
                        <p class="card-text">Stay tuned to get latest updates, all about Urban Health Centres</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title">Login</h4>
                        <h6 class="card-subtitle text-muted">Panel Access</h6>
                    </div>
                    <div class="card-block">
                        <form class="form" action="<?php echo site_url('login'); ?>" method="post">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="donationinput1" class="sr-only">Username</label>
                                    <input type="text" value="<?php if(isset($username)) { echo $username; } ?>" id="donationinput1" class="form-control" placeholder="username" name="username">
                                </div>
 
                                <div class="form-group">
                                    <label for="donationinput2" class="sr-only">Password</label>
                                    <input type="password" id="donationinput2" class="form-control" placeholder="password" name="password">
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
                            <div class="form-actions"><button type="submit" class="btn btn-outline-primary">Login</button>
                          </div>
                             
                              
                        </form>
                    </div>
                </div>
            </div>
        </div>

         
    </div>

 

 
 
 
 
 
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

                        <canvas id="sex-pie-chart" height="350"></canvas>
                        
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



    
    </div>
    </div>
    </div> 

</div>
</section>
    
<?php $this->load->view('user/footer'); ?>