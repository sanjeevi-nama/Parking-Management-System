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
        <?php 
			include 'includes/navigation.php' //including NAVBAR -> 1
		?>	
	
		<?php
			$page="vehicle-category";
			include 'includes/sidebar.php'	//including SIDE-BAR -> 2
		?>
	<!-- BREADCRUM & add VEHICLE CATEGORIES -> 3 -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Vehicle Category Management</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Vehicle Categories 
						<a href="add-category.php" type="button" class="btn btn-sm btn-primary">Add New Category</a>
				</div>
				<div class="panel-body">
		<!-- TABLE -> 4 -->
		<table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>S.No</th>
					<th>Vehicle Category</th>
					<th>Parked On</th>
					<th>Edit Category</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$ret=mysqli_query($con,"SELECT * from  vcategory");
					$cnt=1;
					while($row=mysqli_fetch_array($ret)){
				?>
						<tr>
							<td><?php echo $cnt;?></td>
								
							<td><?php  echo $row['VehicleCat'];?></td>

							<td><?php  echo $row['CreationDate'];?></td>
							
							<td>
								<!-- Directs to the corresponding EDIT PAGE -->
								<a href="update-category.php?editid=<?php echo $row['ID'];?>"> 
									<button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button> 	
								</a>
								<a href="remove-category.php?editid=<?php echo $row['ID'];?>"> 
									<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> 
								</a>
							</td>
						</tr>
						<?php $cnt=$cnt+1;
					}
				?>
			</tbody>
    </table>
						</div>
					</div>
				</div>
				</div>
        <?php include 'includes/footer.php'?>
	</div>
	
	<!-- <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};
	</script>

    <script>
        $(document).ready(function() {
    	$('#example').DataTable();
		} );
    </script> -->
</body>
</html>

<?php }  ?>