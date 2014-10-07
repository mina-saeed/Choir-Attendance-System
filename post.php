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
			<?php $postID=$_GET['postID'];?>
			<?php 
			$query="SELECT * FROM `post` WHERE `id`='$postID'";
			$data=mysql_query($query);
			$post=mysql_fetch_assoc($data);
			$userID=$_SESSION['userID'];
			$replyquery="SELECT `user_id`, `content` FROM `reply` WHERE `post_id`='$postID' ORDER BY id DESC";
			$replydata=mysql_query($replyquery);
			?>
		<div class="row">
			<div class="col-md-8">
				<div class="inner">
					<div class="grid-menu clearfix">
						<div class="grid-box grid-box-large">
							<a href="#" class="boxed boxed-turquoise">
							<h2><b><?php echo $post['title'];?></b></h2>
							<p> <?php echo $post['content'];?> </p>
							</a>
						</div>
					</div>
					<p class="dropdown dropdown-icons clearfix boxed boxed-green">
					<form action="engine.php?postid=<?php echo $postID;?>" method="post">
					<textarea id="message" placeholder="Message" name="message" required></textarea>
					<input type='hidden' value="reply" name="action"/>
					<span class="btn btn-icon-left"><input type="submit" value="Reply" /></span>
					</form>
					</p>
					<?php while($reply=mysql_fetch_array($replydata)):?>
					<div class="grid-menu clearfix widget-avatar boxed">
						<div class="grid-box grid-box-large">
							<a href="#" class="boxed boxed-green">
							<?php $useid=$reply['user_id'];?>
							<?php $userdata=mysql_query("SELECT `name`,`avatar` FROM `user` WHERE `id`='$useid'");?>
							<?php $use=mysql_fetch_assoc($userdata);?>
							<div class="inner">
							<p> <?php echo $use['name'];?> </p>
							<div class="avatar">
								<img src="<?php echo $use['avatar'];?>" alt="" />
							</div>
							</div>
							
							<p> <?php echo $reply['content'];?> </p>
							</a>
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
					<p>Lorem ipsum dolor sit amet.</p>
					</a>
				</div>
				</div>
				<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2> Thanks for </h2>
					<br>
					<p>Lorem ipsum dolor sit amet.</p>
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