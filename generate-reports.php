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
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'includes/navigation.php' ?>
	
		<?php
		$page="reports";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">View Reports</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div>
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Generate Reports</div>
						<div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">

                        <?php
                        $fdate=$_POST['fromdate'];
                        $tdate=$_POST['todate'];
                        ?>		

                        <div class="alert bg-info" role="alert"> <em class="fa fa-lg fa-file">&nbsp;</em>
                            Displaying reports from <b> <?php echo $fdate?> </b> to <b> <?php echo "${tdate} <i>(based on in-time)</i>"
							?> </b>
                        </div>

                        
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Vehicle Reg. No.</th>
                            <th>Category</th>
                            <th>Parking Number</th>
                            <th>Vehicle's Owner</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
					// Fetched based on the in-time
                    $ret=mysqli_query($con,"SELECT * from vehicle_info where date(InTime) between '$fdate' and '$tdate'");
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {

                    ?>
            
                        <tr>

                        <td><?php echo $cnt;?></td>
                            
                        <td><?php  echo $row['RegistrationNumber'];?></td>

                        <td><?php  echo $row['VehicleCategory'];?></td>

                        <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>

                        <td><?php  echo $row['OwnerName'];?></td>
						<?php echo $row['ID'];?>
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