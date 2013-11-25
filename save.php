<?php
    $connect = mysql_connect('localhost','root') && mysql_select_db('messages') or die("ERROR");
    
    @$name = $_POST['name'];
    @$email = $_POST['email'];
    @$message = $_POST['message'];
    @$approved = "n";
    
    if($connect){
        if(@$_POST['send']){
            if(!empty($name) && !empty($email) && !empty($message)){
                $query = "INSERT INTO message(name,email,message,date,is_approved) 
                    VALUES('$name','$email','$message',(CURRENT_DATE()),'$approved')";
                $result = mysql_query($query);
                
                header("location:index.php");
                echo "<h1>Message SENT</h1>";
            }else{
                header("location:index.php");
            }
        }
    }
?>


<hr/>

<h2>Sent Messages</h2>

<table border="1">
    <tr>
        <td><b>Id</b></td>
        <td><b>Name</b></td>
        <td><b>Email</b></td>
        <td><b>Message</b></td>
        <td><b>Date</b></td>
        <td><b>Is Approved</b></td>
    </tr>
</table>

