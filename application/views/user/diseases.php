


<?php
 $this->load->view('user/header')?>

  <!-- ////////////////////////////////////////////////////////////////////////////-->
 


      
<div class="content-body"><!-- Charts section start -->
<section id="chartjs-bar-charts">

<div class="row">
        
 <!-- <div class="col-xl-4 col-md-6 col-sm-12"> -->
 <?php for($i=0;$i<count($diseases);$i++){?>
        <div class="col-md-8 col-sm-12" style="margin-left:30%;margin-top:10px;">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $diseases[$i]['diaseases_name']; ?></h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-plus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                 <?php echo $diseases[$i]['diaseases_description']; ?>
                        <canvas id="diaseases-pie-chart" height="400"></canvas>

  
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

         


</div>


</section>
</div>
<!--/ stats -->
<!--/ project charts -->

  <?php
   $this->load->view('user/footer')?>

<script type="text/javascript">
  $(document).ready(function(){
      $('.collapse').collapse();
  });
</script>