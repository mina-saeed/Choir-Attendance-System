<?php
$link = mysql_connect('localhost', 'root', '');
if(!$link)
{
  die('Not Connected : '.mysql_error().' error number : '.mysql_errno());
}
$db = mysql_select_db('solchoir',$link);
mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET CHARACTER SET utf8');
if(!$db)
{
  die('Cannot select Database '.mysql_error());
}
?>