<?php
    $del_id =$_GET['id'];
    echo $del_id;
    mysql_connect("localhost","root");
    mysql_select_db("messages");
    
    $query = "DELETE FROM message WHERE id = '$del_id'";
    $result = mysql_query($query);
    header('location:view.php');
?>
