<?php
session_start(); 
require_once('selectDB.php');
require_once('security.php');
?>
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
			<div class="col-md-8">
				<div class="inner">
				<?php
				$user=$_SESSION['userID'];
$query="SELECT `post_id` FROM `reply` WHERE `user_id`='$user' ORDER BY id DESC";
$postID=mysql_query($query) or die(mysql_error());
$nextuP=0;
while($userPost=mysql_fetch_array($postID)):
$uP=$userPost['post_id'];
if($uP!=$nextuP):
echo $uP;
$query="SELECT `user_id` FROM `reply` WHERE `post_id`=$uP";
$uData=mysql_query($query);
while($u=mysql_fetch_array($uData)):
$query2="SELECT  `title` FROM `post` WHERE `id`=$uP";
$postTitle=mysql_query($query2);
$ppostTitle=mysql_fetch_assoc($postTitle);
$name=$u['user_id'];
if($name!=$user):
$query3="SELECT  `name`FROM `user` WHERE `id`=$name";
$name1=mysql_query($query3);
$uuname=mysql_fetch_assoc($name1);
				?>
					<div class="grid-menu clearfix">	
						<div class="grid-box grid-box-large">
							<a href="post.php?postID=<?php echo $uP;?>" class="boxed boxed-turquoise">
							<p>	<?php echo $uuname['name']." also replied on ".$ppostTitle['title'];?></p>
							</a>
							
						</div>
					</div>
					<?php 
					$nextuP=$uP;
					endif;
					endwhile;
					endif;
					endwhile;
					?>
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2>Social Announcement </h2>
					<br>
					<p>Happy Birthday Patricia</p>
					</a>
				</div>
				</div>
				<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2> Thanks for </h2>
					<br>
					<p>Mirna Hany<br/>
					<br/>
						Monica Nabil
					</p>
					</a>
				</div>	
		</div>
		<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2>Warnings  </h2>
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