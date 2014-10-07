<?php 
session_start();
require_once('selectDB.php');
$user=$_SESSION['userID'];
$query="SELECT  `post_id` FROM `reply` WHERE `user_id`=$user";
$postID=mysql_query($query);
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
echo $uuname['name']." also replied on ".$ppostTitle['title']."<br>";
$nextuP=$uP;
endif;
endwhile;
endif;
endwhile;
?>