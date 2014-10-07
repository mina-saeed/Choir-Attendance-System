<?php
session_start(); 
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
			<?php require_once('selectDB.php'); ?>
            <?php require_once('menu.php');?>
			<?php
			$query="SELECT * FROM `post` ORDER BY id DESC";
			$data=mysql_query($query);
			?>
		<div class="row">
			<div class="col-md-8">
				<div class="inner">
				<?php while($post=mysql_fetch_array($data)):?>
					<div class="grid-menu clearfix">	
						<div class="grid-box grid-box-large">
							<a href="#" class="boxed boxed-turquoise">
							<h2><b><?php echo $post['title'];?></b></h2>
							<p>	<?php echo $post['content'];?> </p>
							</a>
							<span><i class="icon-menu icon-menu-2"><a href="post.php?postID=<?php echo $post['id'];?>"></a></i></span>
						</div>
					</div>
					<?php endwhile;?>

					
					
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