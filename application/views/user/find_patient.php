<?php 
 
$this->load->view('user/header');
?>
 
<div class="app-content content container-fluid">
     
 
    <div class="content-wrapper">
 
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Discover Patient</h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                 
                <li class="breadcrumb-item active">Search
                </li>
              </ol>
            </div>
          </div>
        </div>
        <form method="post" action="<?php echo site_url('Patient'); ?>">
       <div class="row"> 
        <div class="col-md-8">
       <fieldset class="form-group position-relative">
            <input type="text" class="form-control input" name="search_name" id="iconLeft" placeholder="Search Patient">
            <div class="form-control-position">
                <i class="icon-search5 font-medium-4"></i>
            </div>
        </fieldset>
        </div>
        <div class="col-md-4">
        <div class="form-group position-relative">
             <button  type="submit"  aria-haspopup="true" aria-expanded="true" class="btn btn-primary  btn-md ">Search</button>
        </div>
        </div>
        </div>
     </form>
     <div class="content-body"><!-- Basic Tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
             
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                     
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Patient ID</th>
                                    <th>Patient Name</th>
                                    <th>Patient Mobile</th>
                                    <th colspan="2">Action</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            for ($i=0; $i <count($patients); $i++) { 
                                 
                              ?>
                                <tr>
                                    <th scope="row"><?php echo $patients[$i]['patient_unique_id']; ?></th>
                                    <td><?php echo $patients[$i]['patient_name']; ?></td>
                                    <td><?php echo $patients[$i]['patient_phone']; ?></td>
                                    <td colspan="2">
                             
                                    <li style="display: inline-block;"><a href="<?php echo site_url('Patient/view_profile').'/'.$patients[$i]['patient_id']; ?>" class="nav-item primary">View</a></li>
                                    <li style="display: inline-block;"><a href="<?php echo site_url('Patient/edit_profile').'/'.$patients[$i]['patient_id']; ?>" class="nav-item success">Edit</a></li>

                                       <li style="display: inline-block;"><a href="<?php echo site_url('Patient/sendsms').'/'.$patients[$i]['patient_id'];  ?>" class="nav-item success">Send SMS</a></li>
                                     
                                    </td>
 
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                
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