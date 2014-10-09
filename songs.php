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

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border:none;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-s6z2{text-align:center}
.tg .tg-g8f1{font-size:100%;text-align:center}
</style>

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
			$query="SELECT * FROM `song`,`song_cat` WHERE `cat_id`='1'";
			$data=mysql_query($query) or die(mysql_error());
			?>
		<div class="row">
		<div class="col-md-4">
				<div class="grid-box grid-box-large">
					<a href="#" class="boxed boxed-red">
					<h2> Refine Search</h2>
					<br>
					<form action="songs.php" method="post">
					<div class="menu-search-form">
    				<input type="text" name="song_name" placeholder="Song Name">
					</div>
					</form>
					<a href="addsong.php">Add new Song</a>
					</a>
				</div>	
				</div>
			<div class="col-md-8">
				<div class="inner">
				<?php $song_id=0;?>
				<?php while($post=mysql_fetch_array($data)):?>
					<div class="grid-menu clearfix">	
						<div class="grid-box grid-box-large">
							<div class="boxed boxed-turquoise">
							<h2><b><?php echo $post['title'];?></b></h2>
							by<?php echo $post['team'];?>
							<p><a href="<?php echo $post['link'];?>"><?php echo $post['link'];?></a>
							<table class="tg">
  							<tr>
    						<th class="tg-vpsr"><a href="<?php echo $post['word'];?>">.word</a></th>
    						<th class="tg-vpsr"><a href="<?php echo $post['ppt'];?>">.ppt</a></th>
    						<th class="tg-vpsr"><a href="<?php echo $post['chords'];?>">chords</a></th>
  							</tr>
  							<tr>
    						<td class="tg-s6z2"><a href="<?php echo $post['soprano'];?>">Soprano</a></td>
    						<td class="tg-s6z2"><a href="<?php echo $post['alto'];?>">Alto</a></td>
    						<td class="tg-s6z2"><a href="<?php echo $post['tenor'];?>">Tenor</a></td>
    						<td class="tg-031e"><a href="<?php echo $post['bass'];?>">Bass</a></td>
  							</tr>
							</table>
							</p>
							</div>
						</div>
					</div>
					<?php endwhile;?>
				</div>
			</div>
    </div>
	</div>
        <!--/ container -->

</body>
</html>