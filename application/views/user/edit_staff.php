<?php
 $this->load->view('user/header')?>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   
    




<div class="container-fluid" style="margin-left:30%">
     
    <section id="content-types">
    <div class="row">
        
       
        <div class="col-xl-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title">Edit Staff</h4>
                        <h6 class="card-subtitle text-muted">Edit Staff Details</h6>
                    </div>
                    <div class="card-block">
                        <form class="form" action="<?php echo site_url('home/edit_staff'); ?>" method="post">
                            <div class="form-body">
                                <div class="form-group">
                                Name
                                    <label for="donationinput1" class="sr-only">Name</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_name'])) { echo $addstaff['staff_name']; } ?>" id="donationinput1" class="form-control" placeholder="Name" name="staff_name">
                                </div>
            
                                <div class="form-group">
                                Email
                                    <label for="donationinput1" class="sr-only">Email</label>
                                    <input type="email" value="<?php if(isset($addstaff['staff_email'])) { echo $addstaff['staff_email']; } ?>" id="donationinput1" class="form-control" placeholder="Email" name="staff_email">
                                </div>

                                  <div class="form-group">
                                  Username
                                    <label for="donationinput1" class="sr-only">Username</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_username'])) { echo $addstaff['staff_username']; } ?>" id="donationinput1" class="form-control" placeholder="Username" name="staff_username">
                                </div>

                                 <div class="form-group">
                                 Password
                                    <label for="donationinput2" class="sr-only">Password</label>
                                    <input type="password" id="donationinput2" class="form-control" placeholder="Password" name="staff_password">
                                </div>


                                <div class="form-group">
                                Mobile
                                    <label for="donationinput1" class="sr-only">Mobile</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_phone'])) { echo $addstaff['staff_phone']; } ?>" id="donationinput1" class="form-control" placeholder="Mobile" name="staff_phone">
                                </div>
<div class="form-group">
                                 Select Gender
<select name="staff_gender" class="form-control" id="staff_gender">
<option value="">Select Gender</option>

<option value="Male">Male</option>
<option value="Female">Female</option>
  


</select> </div>

                                 <div class="form-group">
                                 Address
                                 <textarea class="form-control" name="staff_address" ><?php echo $addstaff['staff_address']; ?></textarea>
                                </div>


                                 <div class="form-group">
                                 Area Code
                                    <label for="donationinput1" class="sr-only">Area Code</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_areacode'])) { echo $addstaff['staff_areacode']; } ?>" id="donationinput1" class="form-control" placeholder="Area Code" name="staff_areacode">
                                </div>
 <div class="form-group">
  Shift
<select name="staff_shift" class="form-control" id="staff_shift">
<option value="">Select Shift</option>

<option value="Day">Day</option>
<option value="Night">Night</option>
  


</select> </div>

                                  <div class="form-group">
                                  Salary
                                    <label for="donationinput1" class="sr-only">Salary</label>
                                    <input type="text" value="<?php if(isset($addstaff['staff_salary'])) { echo $addstaff['staff_salary']; } ?>" id="donationinput1" class="form-control" placeholder="Salary" name="staff_salary">
                                </div>


  <br>
                            </div>
                            <div class="form-actions"><button type="submit" class="btn btn-outline-primary">Edit Staff</button>
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
<script>
 $(document).ready(function(){

      var Gender = '<?php echo $addstaff['staff_gender'];  ?>';
      var shift = '<?php echo $addstaff['staff_shift'];  ?>';
   
      
      

      
 
    $('#staff_shift').val(shift);
    $('#staff_gender').val(Gender);
    

       });
</script>