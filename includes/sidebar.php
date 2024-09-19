<!-- SIDEBAR - THE MENU OPTIONS IN THE LEFT OF DASHBOARD  -->
	<div style="background-color:#00A3A3" id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<!-- ADMINISTRATOR IMAGE -->
				<img src="Sample User Elon Musk.jpg" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<!-- ADMINISTRATOR NAME & Status-->
				<div style="color:white" class="profile-usertitle-name">
					<strong>
						<?php
							$adminid=$_SESSION['vpmsaid'];
							$ret=mysqli_query($con,"SELECT * from admin where ID='$adminid'");
							$cnt=1;
							while ($row=mysqli_fetch_array($ret)) {
								echo $welcome_string, $row['AdminName']; 
							}
						?>
					</strong>
				</div>
				<div style="color:white" class="profile-usertitle-status">
					<span class="indicator label-success"></span>
					<b>Online</b>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<form role="search" action="search-results.php" name="search" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" class="form-control" id="searchdata" name="searchdata" placeholder="Search Vehicle-Reg">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<?php if($page=="dashboard") {echo "active";}?>"><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Home</a></li>

			<li class="<?php if($page=="vehicle-category") {echo "active";}?>"><a href="vehicle-category.php"><em class="fa fa-th-large">&nbsp;</em> Vehicle Category</a></li>

			<li class="<?php if($page=="manage-vehicles") {echo "active";}?>">
				<a href="manage-vehicles.php"><em class="fa fa-car">&nbsp;</em>Vehicle Entry</a>
			</li>

			<li class="<?php if($page=="in-vehicle") {echo "active";}?>">
				<a href="in-vehicles.php"><em class="fa fa-toggle-on">&nbsp;</em>Currently IN</a>
			</li>

            <li class="<?php if($page=="out-vehicle") {echo "active";}?>">
				<a href="out-vehicles.php"><em class="fa fa-toggle-off">&nbsp;</em> Departures</a>
			</li>

			<li class="<?php if($page=="reports") {echo "active";}?>">
				<a href="reports.php"><em class="fa fa-file">&nbsp;</em> View Reports</a>
			</li>

			 <?php if($page=="about") {echo "active";}?>

			<li class="<?php if($page=="income") {echo "active";}?>">
				<a href="total-income.php"><em class="fa fa-rupee">&nbsp;</em> Total Income</a>
			</li>
			
		</ul>
		
	</div>