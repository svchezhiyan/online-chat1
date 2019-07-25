<?php
    session_start();
    require "Connection.php";

    $sql_query = "SELECT id,username,picture_location FROM user WHERE username LIKE ? AND NOT username = ? ";
    $sql_stmt = $db_conn->prepare($sql_query);
    $sql_stmt->bind_param("ss",$user,$local_user);
    $user = $_REQUEST['user']."%";
    $local_user = $_COOKIE['username'];
    $sql_stmt->execute();
    $sql_stmt->bind_result($id,$username,$user_pic);
    //echo "<datalist id='suggetion'>";
  
    while($sql_stmt->fetch())
    { 
        echo "<div style='float:left;overflow:hidden;box-shadow:1px 10px 5px 0px rgba(0,0,0,0.5);margin-left:1vh;width:60vh;max-height:40vh;background-color:white;text-align:center;'>";
        echo "<div style='color:blue;font-size:5vh;font-family:cursive'><div><img src='$user_pic' width='80vh' height='80vh' style='border-color:gray;border-radius:50%;border-top: 5px solid black;border-bottom: 5px solid black;'></div><div><strong>$username</strong></div></div>";
        echo "<a href='user.php?id=".$id."'>view</a>";
        echo "$id";
        echo "</div>";
        setcookie('id',$id, time() + 86400);
        setcookie('to_pic',$user_pic, time() + 86400);
        //echo "<option value='$username'>";
    }
    echo "</div>";
    /*echo "<script>document.getElementById('adduser').addEventListener('click',function(){
        alert('user is added!');
    });</script>";*/
    //echo "</datalist>";
   
?>