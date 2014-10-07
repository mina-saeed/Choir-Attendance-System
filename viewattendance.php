<?php session_start();?>
<?php require_once('selectDB.php');?>
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
			<div class="col-md-8">
				<div class="inner">
					<div class="grid-menu clearfix">
						<div class="grid-box grid-box-large">
							<a href="#" class="boxed boxed-yellow">
							<?php 
							 
							$id=$_SESSION['userID'];
							$query="SELECT * FROM `attendance` WHERE `user_id`='$id'";
							$data=mysql_query($query);
							$count=mysql_num_rows($data);
							$data2=mysql_query("SELECT * FROM `attendance` WHERE `user_id`='$id' AND `attend`=0 ");
							$count2=mysql_num_rows($data2);
							?>
							<h2><b>Attendance</b></h2>
							<br>
							<p>Abscent: <?php echo intval(($count2/$count)*100);?>%</p>
							<br>
							<br>
							<br>
							<style type="text/css">
							.tg  {border-collapse:collapse;border-spacing:0;}
							.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
							.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
							.tg .tg-szh5{font-size:26px}
							</style>
							<table class="tg">
								<tr>
									<th class="tg-szh5">Date</th>
									<th class="tg-szh5">Attendance</th>
									<th class="tg-szh5">Content</th>
								</tr>
								<?php while($attend=mysql_fetch_array($data)):?>
								<tr>
								<?php
								$provaid=$attend['prova_id'];
								$dateq="SELECT  `date`, `content` FROM `prova` WHERE `id`='$provaid'";
								$dataprova=mysql_query($dateq);
								$provadata=mysql_fetch_assoc($dataprova);
								?>
									<td class="tg-031e"><?php echo $provadata['date'];?></td>
									<td class="tg-031e">
									<?php if($attend['attend']==1)
									{
										echo "Attended";
									}
									else
									{
										echo "Abscent";
									}
									?>
									</td>
									<td class="tg-031e"><?php echo $provadata['content'];?></td>
								</tr>
								<?php endwhile;?>
							</table>
							</a>
						</div>
					</div>				
				</div>
			</div>
			<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2>Social Announcement </h2>
					<br>
					<p>Lorem ipsum dolor sit amet.</p>
					</a>
				</div>
				</div>
				<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2>Social Announcement </h2>
					<br>
					<p>Lorem ipsum dolor sit amet.</p>
					</a>
				</div>	
		</div>
		
		</div>
    </div>
	</div>
        <!--/ container -->

</body>
</html>