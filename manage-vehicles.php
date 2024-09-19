<?php
	session_start();
	error_reporting(0);
	include('includes/dbconn.php');
	if (strlen($_SESSION['vpmsaid']==0)) {
	header('location:logout.php');
	} else {

	if(isset($_POST['submit-vehicle'])) {
		$parkingnumber=mt_rand(10000, 99999);
		$catename=$_POST['catename'];
		$vehcomp=$_POST['vehcomp'];
		$vehreno=$_POST['vehreno'];
		$ownername=$_POST['ownername'];
		$ownercontno=$_POST['ownercontno'];
		$enteringtime=$_POST['enteringtime'];
			
		$query=mysqli_query($con, "INSERT into vehicle_info(ParkingNumber,VehicleCategory,RegistrationNumber,OwnerName,OwnerContactNumber) value('$parkingnumber','$catename','$vehreno','$ownername','$ownercontno')");
		if ($query) {
			//Vehicle added pop-up
			echo "<script>alert('Vehicle Entry Detail has been added');</script>"; 
			echo "<script>window.location.href ='dashboard.php'</script>";//later takes to Dashboard
		} 
		else {
			echo "<script>alert('Something Went Wrong');</script>";       
		}
	}
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Park Anywhere</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body style="background-color:#CDE8E5">
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="manage-vehicles";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Manage Vehicle</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
			</div>
		</div>
		<div class="panel panel-default">
				<div class="panel-heading">Vehicle Entry</div>
				<div class="panel-body">

					<div class="col-md-12">

						<form method="POST">

							<div class="form-group">
								<label>Registration Number</label>
								<input type="text" class="form-control" placeholder="Eg. AP 31 BM 9963" id="vehreno" name="vehreno" required>
							</div>
							
					
								<div class="form-group">
									<label>Vehicle Category</label>
									<select class="form-control" name="catename" id="catename">
									<option value="0">Select Category</option>
									<?php $query=mysqli_query($con,"select * from vcategory");
										while($row=mysqli_fetch_array($query))
										{
										?>    
									<option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
									<?php } ?> 
									</select>
								</div>

							<div class="form-group">
								<label>Owner's Full Name</label>
								<input type="text" class="form-control" placeholder="Enter Here.." id="ownername" name="ownername" required>
							</div>

							<div class="form-group">
								<label>Owner's Contact</label>
								<input type="text" class="form-control" placeholder="Enter Here.." maxlength="10" pattern="[0-9]+" id="ownercontno" name="ownercontno" required>
							</div>
								<button type="submit" class="btn btn-success" name="submit-vehicle">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div> 
						</form>
					</div> 
				</div>
        <?php include 'includes/footer.php'?>
	</div>	
		
</body>
</html>

<?php }  ?>