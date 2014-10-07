<?php error_reporting(E_ERROR | E_PARSE);?>
<h1><span>Sons of light Choir</span></h1>
			<div id="topmenu">
				<ul class="dropdown clearfix boxed boxed-blue">
				<li class="link-more"><a href="addpost.php"><i></i></a></li>
					<li><a href="home.php"><span>Home</span></a></li>
					<li><a href="viewattendance.php"><span>Attendance</span></a></li>
					<li><a href="profile.php">Profile</a></li>
					<li><a href="notifications.php">Notifications</a></li>
					<li><a href="#"><span>Songs</span></a></li>
					<?php if($_SESSION['isAdmin']==1):?>
					<li><a href="adminDashboard.php"><span>Admin Dashboard</span></a></li>
					<?php endif;?>
					<li><a href="engine.php?logout='ok'"><span>Sign out</span></a></li>
				</ul>
			</div>