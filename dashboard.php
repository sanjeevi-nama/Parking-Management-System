<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid'] == 0)) {
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
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body style="background-color:#CDE8E5">
    <?php include 'includes/navigation.php'; // Include navigation bar ?>  
    <?php 
        $page = "dashboard";
        include 'includes/sidebar.php'; // Include sidebar
    ?>
    
    <!-- Breadcrumb & HOME ICON below Navigation Bar -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"> 
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><em class="fa fa-home"></em></a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        
        <!-- Greetings for ADMIN in the DASHBOARD -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php include 'includes/greetings.php'; ?></h1>
            </div>
        </div>
        
        <!-- VEHICLES PARKED, IN, OUT, past 24 Hr DETAILS -->
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-car color-blue"></em>
                            <div class="large"><?php include 'counters/parking-count.php'; ?></div>
                            <div class="text-muted">Total Vehicles Parked</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-toggle-on color-orange"></em>
                            <div class="large"><?php include 'counters/invehicles-count.php'; ?></div>
                            <div class="text-muted">Vehicles IN</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-toggle-off color-teal"></em>
                            <div class="large"><?php include 'counters/outvehicles-count.php'; ?></div>
                            <div class="text-muted">Vehicles OUT</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget">
                        <div class="row no-padding"><em class="fa fa-xl fa-clock-o color-red"></em>
                            <div class="large"><?php include 'counters/current-parkingCount.php'; ?></div>
                            <div class="text-muted">Parking in past 24 hrs</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ANALYTICS PIE-CHART DIAGRAMS -->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Analytics - IN | OUT 
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="chart" id="myChart" height="160"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Analytics - Vehicle Category
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="chart" id="myChart2" height="160"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
            include 'includes/dbconn.php';
            
                // <?php 
                // Fetching data for the 'In' and 'Out' vehicles (already done)
                $ret = mysqli_query($con, "SELECT count(ID) AS id1 FROM vehicle_info WHERE Status = ''");
                $row5 = mysqli_fetch_array($ret);
                
                $ret = mysqli_query($con, "SELECT count(ID) AS id2 FROM vehicle_info WHERE Status = 'Out'");
                $row6 = mysqli_fetch_array($ret);

                // Fetching dynamic Vehicle Category counts
                $categories = [];
                $counts = [];

                $ret = mysqli_query($con, "SELECT VehicleCategory AS category, COUNT(*) AS count 
                                        FROM vehicle_info 
                                        GROUP BY category 
                                        ORDER BY category");
                while ($row = mysqli_fetch_array($ret)) {
                    $categories[] = $row['category'];   // Vehicle Categories
                    $counts[] = $row['count'];          // Count for each category
                }
            //       
        ?>
        
        <?php include 'includes/footer.php'; ?>
    </div>  
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js'></script>  
    <!-- <script>
        window.onload = function () {

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: ["Vehicle In-Time", "Vehicle Out-Time"],
            datasets: [{
            backgroundColor: ["#30a5ff", "#33cccc"],
            data: [<?php echo $row5['id1']; ?>, <?php echo $row6['id2']; ?>]
        }]
        }
        });
        <?php
            $labelss = [];
            $ret = mysqli_query($con, "SELECT DISTINCT VehicleCat FROM vcategory order by VehicleCat");
            while ($row = mysqli_fetch_array($ret)) {
                $labelss[] = $row['VehicleCat'];
            }
        ?>   
        // Second Pie Chart
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart2 = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: <?php echo json_encode($labelss); ?>, // Custom Labels
            datasets: [{
            backgroundColor: ["#f55d42", "#f5c542","#D91656","#A594F9","#41B3A2","#009FBD","#D862BC","#704264"],
            data: [
                <?php echo $row['id1']; ?>,
                <?php echo $row2['id2']; ?>,
                <?php echo $row4['id4']; ?>
            ]
            }]
            }
        });
        };
    </script> -->
    <script>
    window.onload = function () {

        // Chart for Vehicle In-Time and Out-Time (already done)
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Vehicle In-Time", "Vehicle Out-Time"],
                datasets: [{
                    backgroundColor: ["#30a5ff", "#33cccc"],
                    data: [<?php echo $row5['id1']; ?>, <?php echo $row6['id2']; ?>]
                }]
            }
        });

        // Chart for Vehicle Category (Dynamic)
        var ctx2 = document.getElementById("myChart2").getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($categories); ?>,  // Dynamic Labels for Categories
                datasets: [{
                    backgroundColor: ["#f55d42", "#f5c542","#D91656","#A594F9","#41B3A2","#009FBD","#D862BC","#704264"],
                    data: <?php echo json_encode($counts); ?>   // Dynamic Data for Category Counts
                }]
            }
        });
    };
</script>

</body>
</html>

<?php } ?>
