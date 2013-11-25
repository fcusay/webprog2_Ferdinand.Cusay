<?php
    mysql_connect('localhost','root');
    mysql_select_db('messages');
    $delete_id = $_GET['id'];
    $new = "y";
//    $query = "UPDATE message SET
//        is_approved='$new' WHERE id='.$delete_id'";
        

?>
<h1><?php echo $delete_id?></h1>
