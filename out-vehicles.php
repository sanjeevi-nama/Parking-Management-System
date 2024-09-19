<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        } else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Park Anywhere</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body style="background-color:#CDE8E5">
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="out-vehicle";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Outgoing Vehicle Management</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
			</div>
		</div>
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Outgoing Vehicles</div>
						<div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
        <thead>
            <tr>
                <th>S.No</th>
                <th>Vehicle No.</th>
                <th>Category</th>
                <th>Parking Number</th>
				<th>Charge</th>
                <th>Vehicle's Owner</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
        <?php

        $ret=mysqli_query($con,"SELECT * from  vehicle_info where Status='Out'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

            <td><?php echo $cnt;?></td>
                 
            <td><?php  echo $row['RegistrationNumber'];?></td>

            <td><?php  echo $row['VehicleCategory'];?></td>

            <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>

			<td><?php  echo '₹'.$row['ParkingCharge'];?></td>

            <td><?php  echo $row['OwnerName'];?></td>
            
            <td><a href="outgoing-detail.php?updateid=<?php echo $row['ID'];?>"><button type="button" class="btn btn-sm btn-info">View Details</button></a>
            <a href="print-receipt.php?vid=<?php echo $row['ID'];?>"><button type="button" class="btn btn-sm btn-warning"> <i class="fa fa-print"></i></button>
            </td>

            </tr>

                <?php $cnt=$cnt+1;}?>
 
        </tbody>
    </table>
						</div>
					</div>
				</div>	
</div>
		

        <?php include 'includes/footer.php'?>
	</div>	
</body>
</html>

<?php }  ?>