<?php 
$this->load->view('user/header');
?>


<!--form starts here-->

<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Send SMS</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>patient">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url();?>addPatient">Send sms</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
			  <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">
	<div class="row match-height">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">Fill this information</h4>
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
						
						<form class="form" method="post" action="<?php echo site_url('PAtient/sendsms').'/'.$patient['patient_id'];?>" enctype="multipart/form-data">
							
						
								<div class="row">
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Mobile Number</label>
											<input type="text" id="Mobile" class="form-control" value="<?php echo $patient['patient_phone'];?>" placeholder="Phone" name="patient_phone">
										</div>
									</div>
											
								</div>
									

									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="projectinput8">Message</label>
										<textarea id="projectinput8" rows="5" class="form-control" name="msg" placeholder="Your Message" ></textarea>
									</div>

									<div class="col-md-6">
							<div class="form-group ">
							<button type="submit" class="btn btn-success">
									<i class="icon-check2"></i> Send SMS
								</button>

							</div>
							</div>	
								</div>	
									</div>
									

										

								
									


	


						

						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
     </div>
 </div>
</section>
</div>


<?php 
$this->load->view('user/footer');
?>
