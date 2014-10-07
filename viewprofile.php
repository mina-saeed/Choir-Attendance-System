<?php session_start();?>
<?php require_once('selectDB.php');?>
<?php require_once('security.php');?>
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title></title>

<!-- main JS libs -->
<script src="js/libs/modernizr.min.js"></script>
<script src="js/libs/jquery-1.10.0.js"></script>
<script src="js/libs/jquery-ui.min.js"></script>
<script src="js/libs/bootstrap.min.js"></script>

<!-- Style CSS -->
<link href="css/bootstrap.css" media="screen" rel="stylesheet">
<link href="style.css" media="screen" rel="stylesheet">
<link href="animate.css" media="screen" rel="stylesheet">
<!-- scripts -->
<script src="js/general.js"></script>


<!-- Include all needed stylesheets and scripts here -->





<!--[if lt IE 9]><script src="js/respond.min.js"></script><![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient {filter: none !important;}
</style>
<![endif]-->
</head>

<body>
    <div class="body_wrap">
        <div class="container">

            <?php require_once('menu.php');?>
			<?php 
			$id=$_GET["userID"];
			$query="SELECT * FROM `user` WHERE `id`=$id";
			$data=mysql_query($query);
			$user=mysql_fetch_assoc($data);
			?>
		<div class="row">
			<div class="inner">
				<div class="grid-menu clearfix">
					<div class="widget-container widget-avatar boxed boxed-yellow">
						<div class="inner">
							<h5><?php echo $user['name'];?></h5>
							<span class="subtitle"><?php echo $user['task'];?></span>
							<div class="avatar">
								<img src="<?php echo $user['avatar'];?>" alt="" />
							</div>
							<div class="row">
								<div class="col-md-6"><h5>Address: <?php echo $user['address'];?></h5></div>
								<div class="col-md-6"><h5>Mobile: <?php echo $user['mobile'];?></h5></div>
							</div>
						
							<br>
							<br>
							<br>
							<div class="row">
								<div class="col-md-4"><h5>Points</h5><h5><?php echo $user["points"];?></h5></div>
								<div class="col-md-4"><h5>Bonus</h5><h5><?php echo $user["bonus"];?></h5></div>
								<div class="col-md-4"><h5>Warning Level</h5><h5>10</h5></div>
							</div>
							
							
						</div>
					</div>
				</div>	
			</div>		
		</div>
	</div>
        <!--/ container -->

</body>
</html>