
	
	
<html lang="en">
<?php $this->load->view('admin/header' );   ?>

	
<body>
<div>    </div>
<div id="container">
	
	
<br><br><br>
	
	<div id="container" style="margin:20px;">
		<div><br><br > </div>
         <div class="dropdown" >
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Table
  <span class="caret"></span></button>
  <ul class="dropdown-menu" >
    <li><a href="<?php echo site_url('admin/home?table=').'diaseases'; ?>">Diaseases</a></li>
    <li><a href="<?php echo site_url('admin/home?table=').'hospitals'; ?>">Hospitals</a></li>
    <li><a href=<?php echo site_url('admin/home?table=').'invoices'; ?>>Invoices</a></li>
    <li><a href="<?php echo site_url('admin/home?table=').'patients'; ?>">Patients</a></li>
    <li><a href="<?php echo site_url('admin/home?table=').'reports'; ?>">Reports</a></li>
    <li><a href="<?php echo site_url('admin/home?table=').'staff'; ?>">Staff</a></li>
    <li><a href="<?php echo site_url('admin/home?table=').'staff_role'; ?>">Staff Role</a></li>
    <li><a href="<?php echo site_url('admin/home?table=').'wards'; ?>">Wards</a></li>
  </ul>
</div>
	<?php echo $content ?>
	
	</div>

</div>

</body>
</html>