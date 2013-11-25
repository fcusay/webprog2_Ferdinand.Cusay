<?php
    mysql_connect('localhost','root');
    mysql_select_db('messages');
    
    $query = "SELECT * FROM message";
    $result = mysql_query($query);
?>


<center><h1>Sent Messages</h1></center>
<center> <a href="index.php"><h3>Create Message</h3></a></center>
<center>
<table border="5">
    <tr>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Email</b></td>
        <td><b>Message</b></td>
        <td><b>Date</b></td>
        <td><b>Is Approved</b></td>
        <td colspan="2"><b>Delete</b></td>
    </tr>
</center>
<?php 
    if($result){
        while($fetch = mysql_fetch_assoc($result)){
?>
    
    <tr>
        <td><?php echo $fetch['id'];?></td>
        <td><?php echo $fetch['name'];?></td>
        <td><?php echo $fetch['email'];?></td>
        <td><?php echo $fetch['message'];?></td>
        <td><?php echo $fetch['date'];?></td>
        <td><?php echo $fetch['is_approved'];?></td>
        <td><a href="approved.php?id=<?=$fetch['id']?>">Approved</a></b></td>
        <td><a href="delete.php?id=<?=$fetch['id']?>">Delete</a></td>
    </tr>
    
    <?php
        
        }
    }
    ?>
</table>
