<?php
require_once('selectDB.php');
ob_start();
$action=$_POST['action'];
$logout=$_GET['logout'];
if(isset($logout))
{
	session_start();
	session_destroy();
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
}
switch ($action)
{
  case 'addPost':addPost();break;
  case 'register':register();  break;
  case 'login':login();break;
  case 'addProva':addProva();break;
  case 'attendance':attendance();break;
  case 'reply':reply();break;
  case 'addCat':addCat();break;
  case 'addSong':addSong();break;
}
function addPost()
{
	$title=$_POST['title'];
	$content=$_POST['message'];	
	if (strpos($content,'youtube'))
	{
		$pieces = explode(" ", $content);
		$count=0;
		while(!strpos($pieces[$count],'youtube'))
		{
			$count++;
		}
		$piece= explode("?v=",$pieces[$count]);
		$s= '<iframe width="420" height="315" src="//www.youtube.com/embed/'.$piece[1].'"'.'" frameborder="0" allowfullscreen></iframe>';
		$date=date("Y/m/d");
		$time = date('H:i:s');
		$query="INSERT INTO `post`( `title`, `content`, `date`,`time`) VALUES ('$title','$s','$date','$time')";
		$count=mysql_query($query) or die(mysql_error());
		header("Location:home.php");
	}
	if(strpos($content,'soundcloud'))
	{
		require_once 'Services/Soundcloud.php';

		// create a client object with your app credentials
		$client = new Services_Soundcloud('bc7c57e3b8ccbb6b391903e89e586a57', '0e0bb17c5915222008e61f8b238d7624','http://localhost/solchoir/engine.php');
		$client->setAccessToken('9ffcf763895d0e803e38d2fed07d8e71#');
		$client->setCurlOptions(array(CURLOPT_FOLLOWLOCATION => 1));

		// get a tracks oembed data
		$track_url = 'http://soundcloud.com/forss/flickermood';
		$embed_info = json_decode($client->get('oembed', array('url' => $track_url)));

		// render the html for the player widget
		echo $embed_info->html;
		$date=date("Y/m/d");
		$time = date('H:i:s');
		$query="INSERT INTO `post`( `title`, `content`, `date`,`time`) VALUES ('$title','$s','$date','$time')";
		//$count=mysql_query($query) or die(mysql_error());
		//header("Location:home.php");
	}
	else
	{
		$date=date("Y/m/d");
		$time = date('H:i:s');
		$query="INSERT INTO `post`( `title`, `content`, `date`,`time`) VALUES ('$title','$content','$date','$time')";
		$count=mysql_query($query) or die(mysql_error());
		header("Location:home.php");	
	}
}
function register()
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$bithdate=$_POST['bithdate'];
	$fbaccount=$_POST['fbaccount'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
	move_uploaded_file($_FILES["file"]["tmp_name"],"img/users/".$_FILES["file"]["name"]);
  	$file_location = "img/users/".$_FILES["file"]["name"];
	$IC=$_POST['IC'];
	$query="INSERT INTO `user`(`name`, `email`, `password`, `birthday`,`facebook`,`avatar`,`address`,`mobile`) VALUES ('$name','$email','$password','$bithdate','$fbaccount','$file_location','$address','$mobile')";
	if($IC=="rumbleBee")
	{
		mysql_query($query) or die("Email is already used");
	}
	else
	{
		echo "error invitation code please go back and try again";
	}
	header("Location: login.php");
}
function login()
{
	session_start();
	$email=$_POST['email'];
  	$password=$_POST['password'];
  	if(isset($email)&&isset($password))
  	{
    	$query="SELECT * FROM user WHERE email ='$email' AND password='$password'";
    	$count=mysql_query($query) or die(mysql_error());
    	$cou=mysql_num_rows($count);
    	echo $cou."<br>";
    	if($cou>0)
    	{
      		$_SESSION['email']=$email;
      		$_SESSION['password']=$password;
      		$_SESSION['login']="ok";
      		$data=mysql_query("SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'") or die(mysql_error());
      		$finalData=mysql_fetch_assoc($data);
			$_SESSION['userID']=$finalData['id'];
			$_SESSION['isAdmin']=$finalData['isAdmin'];
			echo $_SESSION['isAdmin'];
      		header("Location: home.php");
    	}
    	else
   		{
     		echo "Wrong email or Password please go back and ty again";
    	}
  	}
}
function addProva()
{
 	session_start();
	$date=$_POST['date'];
	$content=$_POST['content'];
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query('SET CHARACTER SET utf8'); 
	$query="INSERT INTO `prova`(`date`, `content`) VALUES ('$date','$content')";
	if(mysql_query($query))
	{
		if(isset($_SESSION['prova']))
		{
			unset($_SESSION['prova']);
		}
		header("Location: home.php");		
	}
	else
	{
		$_SESSION['Prova']="no";
		header("Location: addProva.php");
	}
}
function attendance()
{
	session_start();
	$provaID=$_SESSION['provaID'];
	unset($_SESSION['provaID']);
	$query="SELECT * FROM `user`";
	$data=mysql_query($query);
	while($user=mysql_fetch_array($data))
	{
		$idu=$user['id'];
		if(isset($_POST["$idu"]))
		{
			$query="INSERT INTO `attendance`(`user_id`, `prova_id`, `attend`) VALUES ('$idu',$provaID,'1')";
			mysql_query($query);
		}
		else
		{
			$query="INSERT INTO `attendance`(`user_id`, `prova_id`, `attend`) VALUES ('$idu',$provaID,'0')";
			mysql_query($query);
		}
	}
	header("Location: home.php");
}
function reply()
{
	session_start();
	$postID=$_GET['postid'];
	$userID=$_SESSION['userID'];
	$content=$_POST['message'];
	$query="INSERT INTO `reply`(`post_id`, `user_id`, `content`) VALUES ('$postID','$userID','$content')";
	mysql_query($query);
	header("Location:post.php?postID=$postID");
}
function addCat()
{
	$name=$_POST['catname'];
	$query="INSERT INTO `category`(`title`) VALUES ('$name')";
	mysql_query($query);
	header("Location: songs.php");
}
function addSong()
{
	session_start();
	$title=$_POST['title'];
	$link=$_POST['link'];
	$team=$_POST['team'];
	$writer=$_POST['writer'];
	$composer=$_POST['composer'];
	move_uploaded_file($_FILES["file_chord"]["tmp_name"],"img/chords/".$_FILES["file_chord"]["name"]);
	$chords = "img/chords/".$_FILES["file_chord"]["name"];
	move_uploaded_file($_FILES["file_soprano"]["tmp_name"],"img/voices/soprano/".$_FILES["file_soprano"]["name"]);
	$soprano = "img/voices/soprano/".$_FILES["file_soprano"]["name"];
	move_uploaded_file($_FILES["file_alto"]["tmp_name"],"img/voices/alto/".$_FILES["file_alto"]["name"]);
	$alto = "img/voices/alto/".$_FILES["file_alto"]["name"];
	move_uploaded_file($_FILES["file_tenor"]["tmp_name"],"img/voices/tenor/".$_FILES["file_tenor"]["name"]);
	$tenor = "img/voices/tenor/".$_FILES["file_tenor"]["name"];
	move_uploaded_file($_FILES["file_bass"]["tmp_name"],"img/voices/bass/".$_FILES["file_bass"]["name"]);
	$bass = "img/voices/bass/".$_FILES["file_bass"]["name"];
	move_uploaded_file($_FILES["file_word"]["tmp_name"],"img/word/".$_FILES["file_word"]["name"]);
	$word = "img/word/".$_FILES["file_word"]["name"];
	move_uploaded_file($_FILES["file_ppt"]["tmp_name"],"img/ppt/".$_FILES["file_ppt"]["name"]);
	$ppt = "img/ppt/".$_FILES["file_ppt"]["name"];
	$user=$_SESSION['userID'];
	$query="INSERT INTO `song`(`title`, `link`, `ppt`, `chords`, `word`, `team`, `user_id`, `alto`, `tenor`, `soprano`, `bass`, `writer`, `composer`) VALUES ('$title','$link','$ppt','$chords','$word','$team','$user','$alto','$tenor','$soprano','$bass','$writer','$composer')";
	mysql_query($query);
	$cat=$_POST['category'];
	$query="SELECT MAX(id) FROM song";
	$lastid=mysql_query($query);
	$songid=mysql_fetch_assoc($lastid);
	$iid=$songid["MAX(id)"];
	$query="INSERT INTO `song_cat`(`song_id`, `cat_id`) VALUES ('$iid','$cat')";
	mysql_query($query);
	header("Location :songs.php");
}