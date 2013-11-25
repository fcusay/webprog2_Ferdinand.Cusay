<?php
    mysql_connect('localhost','root');
    mysql_select_db('messages');
    
    $query = "SELECT name,date,message FROM message WHERE is_approved='y'";
    $result = mysql_query($query);
?>



<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        
        <script>
            function check_name(){
                name = document.getElementById("name").value;
                    if(name.length == 0){
			document.getElementById("help_name").innerHTML = "Please type your name.";
			return false;
                    }else{
			document.getElementById("help_name").innerHTML = "";
		        return true;
                    }
            }
            
            function check_email(){
                email = document.getElementById("email").value;
                at_check = email.indexOf('@');
                dot_check = email.indexOf('.');
                    if(email.length == 0){
			document.getElementById("help_email").innerHTML = "Please type your email.";
			return false;
                    }else if(at_check < 0 && dot_check < 0){
                        document.getElementById("help_email").innerHTML = "INVALID Email Address.";
			return false;
                    }else{
			document.getElementById("help_email").innerHTML = "";
		        return true;
                    }
            }
            
            function check_message(){
                message = document.getElementById("message").value;
                    if(message.length == 0){
			document.getElementById("help_message").innerHTML = "No message.";
			return false;
                    }else{
			document.getElementById("help_message").innerHTML = "";
		        return true;
                    }
            }
            
            function authenticator(){
                if(check_name() && check_email() && check_message()){
                    alert('Message Sent.');
                    return true;
                }else{
                    alert('Message Deferred.');
                    return false;
                }
            }
         
        </script>
    </head>
    <body>
        <center><h1>Messages</h1></center>
        
        <?php 
        if($result){
            while($fetch = mysql_fetch_assoc($result)){
        ?>
        <div style="margin-left:40px">
        <table border="1">
            <tr>
                <td><?php echo "<b>".$fetch['name']."</b><br>"."<sup>".$fetch['date']."</sup>";?></td>
                <td><?php echo $fetch['message'];?></td>
            </tr>
        </table>
        </div>
        <?php
            }
        }
        ?>
        
        <center><h1>Create Message</h1></center>
        
        <div style="margin-left:264px;margin-bottom:5px">
        <center><a href="view.php">View Sent Items</a></center>
        </div>
        <center>
        
        <form method="POST" action="save.php">
        <div style="margin-left:40px">
            <table border="1">
              <tr>
                <td>
                  <table>
                    <tr>
                      <td>
                        <b>Name:</b>
                        <input type="text" name="name" onblur="check_name();" id="name" style="width:182px;margin-left:70px">
                        <span id="help_name"></span><br>
            
                        <b>Email Address:</b>
                        <input type="text" name="email" onblur="check_email();" id="email" style="width:182px;margin-left:13px"> 
                        <span id="help_email"></span><br>
                
                        <b>Message:</b><br>
                        <textarea onblur="check_message();" id="message" name="message" style="width:298px;height:76px"></textarea> 
                        <span id="help_message"></span>
            
                        <br><input type="submit" value="Send" name="send" onclick="authenticator();" style="margin-left:260px">        
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </div>
        </form>
        
        </center>
    </body>
</html>
