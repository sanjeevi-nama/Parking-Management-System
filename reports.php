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
		$page="reports";
		include 'includes/sidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">View Report</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
			</div>
		</div>
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Parking Reports</div>

                        <form method="POST" enctype="multipart/form-data" name="datereports" action="generate-reports.php">

                            <div class="panel-body">
            
                                <?php if($msg)
                                echo "<div class='alert bg-danger' role='alert'>
                                <em class='fa fa-lg fa-warning'>&nbsp;</em> 
                                $msg
                                <a href='#' class='pull-right'>
                                <em class='fa fa-lg fa-close'>
                                </em></a></div>" ?> 

                                    <div class="form-group">
                                        
                                        <div class="col-lg-6">
                                        <label for="">From</label>
                                            <input class="form-control" type="date" name="fromdate" id="fromdate" required="true">
                                        </div>

                                    
                                        <div class="col-lg-6">
                                        <label for="">To</label>
                                            <input class="form-control" type="date" name="todate" id="todate" required="true">
                                        </div>
                                        
                                        
                                    </div>    
                                    
                                </div>
                                    <center><button type="submit" class="btn btn-primary" name="submit">Generate Report</button></center>
                        
                        </form>
					</div>
				</div>
				
				
				
</div>

        <?php include 'includes/footer.php'?>
		
</body>
</html>

<?php }  ?>