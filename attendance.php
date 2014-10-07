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
		<div class="row">
		<?php
			$query="SELECT * FROM `prova` ORDER BY date DESC";
			$data=mysql_query($query) or die(mysql_error());
			$prova=mysql_fetch_assoc($data);
			$id=$prova['id'];
			$_SESSION['provaID']=$id;
		?>
				<div class="inner">
					<div class="grid-menu clearfix">
						<div class="grid-box grid-box-large dropdown clearfix boxed boxed-turquoise">
						<form action="engine.php" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4"><div class="inner"><strong><h1 align="center"> <?php echo $prova['date'];?><h1></Strong></div></div>
								<div class="col-md-4"></div>
								<input type='hidden' value="attendance" name="action"/>
								<?php
								$query="SELECT * FROM `user`";
								$data=mysql_query($query) or die(mysql_error());
								?>
							</div>
							<br>
							<br>
							<br>
							<?php while($user=mysql_fetch_array($data)):?>
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4"><div class="inner" align="center"><input type="checkbox" name="<?php echo $user['id'];?>" value="attendend"/><?php echo $user['name'];?></div></div>
								<div class="col-md-4"></div>
							</div>
							<?php endwhile;?>
							<br>
							<br>
							<br>
							<div class="row">
								<div class="col-md-4"></div>
								<div class="col-md-4"><div class="inner" align="center"> <span class="btn btn-icon-left"><input type="submit" value="Submit" /></span></div></div>
								<div class="col-md-4"></div>
							</div>
							
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        <!--/ container -->

</body>
</html>