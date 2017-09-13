<?php 
$this->load->view('user/header');
?>

<style>
.multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  padding:5px;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

#checkboxes label:hover {
  background-color: #1e90ff;
}
</style>

<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
<!--form starts here-->

<div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Add Patient</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>patient">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url();?>addPatient">Add Patient</a>
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
						
						<form class="form" method="post" action="<?php echo site_url('home/add_patient'); ?>" enctype="multipart/form-data">
							<div class="form-body">
								<h4 class="form-section"><i class="icon-head"></i> Personal Info</h4>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Patient Name</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="Full Name" name="patient_name" value="<?php echo $patient_name; ?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Patient Age</label>
											<input type="text" id="age" class="form-control" placeholder="Age" name="patient_age" value="<?php echo $patient_age; ?>">
										</div>
									</div>
								</div>
						
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">E-mail</label>
											<input type="email" id="projectinput3" class="form-control" placeholder="E-mail" name="patient_email" value="<?php echo $patient_email; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Mobile Number</label>
											<input type="text" id="Mobile" class="form-control" placeholder="Phone" name="patient_phone" value="<?php echo $patient_phone; ?>">
										</div>
									</div>
											
								</div>
									

									<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										<label for="projectinput8">Address</label>
										<textarea id="projectinput8" rows="5" class="form-control" name="patient_address" placeholder="Address" ><?php echo $patient_address; ?></textarea>
									</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Area Code</label>
											<input type="text" id="projectinput4" class="form-control" placeholder="Area code" name="patient_areacode" value="<?php echo $patient_areacode; ?>">
										</div>
										</div>

											<div class="col-md-6">
											<div class="form-group">
											<label for="projectinput5">Disease</label>
											<div class="multiselect">
											 <div class="selectBox" onclick="showCheckboxes()">
											<select>
																			
												
<option>Check Diaseases</option>
												
											</select>
											<div class="overSelect"></div>
    </div>
		<div id="checkboxes">								
					
		<?php for($i=0;$i<count($diaseases);$i++){
												?>								
      <label for="one">
        <input type="checkbox"  name="<?php echo $diaseases[$i]['diaseases_name']; ?>" id="<?php echo $diaseases[$i]['diaseases_id']; ?>" /> <?php echo $diaseases[$i]['diaseases_name']; ?></label>
      <?php } ?>
    </div>
    </div><br>
										</div>
										</div>
									</div>
									

										<div class="row">

										<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Gender</label>
											<select id="projectinput5" name="patient_gender" class="form-control">
												<option value="1" selected="">Male</option>
												<option value="2">Female</option>
												<option value="0">Other</option>
												
											</select>
										</div>
										</div>
										
									<div class="col-md-6">
											<div class="form-group">
											<label for="projectinput5">Blood Group</label>
											<select id="projectinput5" name="Patient_bloodgroup" class="form-control">
											<option value="">Select Patient's Blod Group</option>
												<option value="A+">A+</option>
												<option value="B+">B+</option>
												<option value="A-">A-</option>
												<option value="B-">B-</option>
												<option value="other">other</option>
											</select>
										</div>
										</div>
										</div>

										
										
									
										<div class="row">
										<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Occupation</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="Occupation" name="patient_occupation" value="<?php echo $patient_occupation; ?>">
										</div>
										</div>
									<div class="col-md-6">
											<div class="form-group">
											<label for="projectinput5">Caste</label>
											<select id="projectinput5" name="patient_cast" class="form-control">
											<option value="">Select Caste</option>
												<option value="SC">SC</option>
												<option value="ST">ST</option>
												<option value="OBC">SEBC</option>
												<option value="OBC">OBC</option>
												
											</select>
										</div>
										</div>
										</div>


	<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											<label for="projectinput5">Ward Name</label>
											<select id="projectinput5" name="ward_id" class="form-control">
											<?php for($i=0;$i<count($wards);$i++){
												?>	
												<option value="<?php echo $wards[$i]['ward_id']; ?>"><?php echo $wards[$i]['ward_name']; ?></option>

												<?php } ?>
												
											</select>
										</div>
							</div>
										
										</div>

							<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Upload Report</label>
									<label id="projectinput7" class="file center-block">
										<input type="file" id="file" name="pdf" accept="application/pdf />
										<span class="file-custom"></span>
									</label>
								</div>
							</div>


							<div class="row"><div class="col-md-6">
							<div class="form-group ">
							<button type="submit" class="btn btn-success">
									<i class="icon-check2"></i> Submit
								</button>

							</div>
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



<?php 
$this->load->view('user/footer');
?>

<script type="text/javascript">
	 $("#age").keyup(function()
	{
		var val = !isNaN($("#age").val());
		if(isNaN($("#age").val()))
		{
			var str = $("#age").val();
			$("#age").val(str.substring(0, (str.length-1)))
		}
	});
       $("#age").keypress(function()
	{
		var val = !isNaN($("#age").val());
		if(isNaN($("#age").val()))
		{
			var str = $("#age").val();
			$("#age").val(str.substring(0, (str.length-1)))
		}
	});


       	 $("#Mobile").keyup(function()
	{
		var val = !isNaN($("#Mobile").val());
		if(isNaN($("#Mobile").val()))
		{
			var str = $("#Mobile").val();
			$("#Mobile").val(str.substring(0, (str.length-1)))
		}
	});
       $("#Mobile").keypress(function()
	{
		var val = !isNaN($("#Mobile").val());
		if(isNaN($("#Mobile").val()))
		{
			var str = $("#Mobile").val();
			$("#Mobile").val(str.substring(0, (str.length-1)))
		}
	});
</script>