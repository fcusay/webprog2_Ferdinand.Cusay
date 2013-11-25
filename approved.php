<?php
$app_id =$_GET['id'];
mysql_connect("localhost","root");
mysql_select_db("messages");
$query = "UPDATE message SET is_approved='y' WHERE id='$app_id'";
$result=mysql_query($query);
header("location:view.php");
?>

