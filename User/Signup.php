<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signin</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="/project/OnlineChat/CSS_FILES/Navigation.css">
        <link rel="stylesheet" href="/project/OnlineChat/CSS_FILES/Style.css">
    </head>
    <body>
        <center>
            <img src="/project/OnlineChat/icons/OnlineChatLogo.png" width="200px" height="50px">
        </center>
        <div id="nav-menu">
            <div><a href="/project/OnlineChat/Index.html">Home</a></div>
            <div id="active" style="float:right;"><a href="#">Signup</a></div>
            <div style="float:right;"><a href="#">About us</a></div>
        </div>
        
            <form method="post" enctype="multipart/form-data">
            <div id="signin-pannel">
                <div>Profile</div>
                <div><input type="file" name="profilepic"></div>
                <div>Username<font style="color:red;">*</font></div>
                <div><input type="text" name="username" placeholder="username" autocomplete="off" required></div>
                <div>DOB<font style="color:red;">*</font></div>
                <div><input type="date" name="dob" reuired></div>
                <div>Password<font style="color:red;">*</font></div>
                <div><input id="psd" type="password" name="password" placeholder="password" required><img id="psd_eye" style="margin-left:-30px;" src="/project/OnlineChat/icons/eye.png" width="30px" height="30px"></div>
                <div><button name="signup-btn">Signup</button></div>
            </div>
            </form>
            <script>
                document.getElementById("psd_eye").addEventListener("mouseover",function(){
                document.getElementById("psd").type = "text";
                });
                document.getElementById("psd_eye").addEventListener("mouseout",function(){
                document.getElementById("psd").type = "password";
                });
            </script>
    </body>
</html>
<?php

    require_once "Connection.php";

    if(isset($_POST["signup-btn"]))
    {
        
        $mysql_stmt = $db_conn->prepare("INSERT INTO user(username,password,dob,picture_location) VALUES(?,?,?,?)");
        $mysql_stmt->bind_param('ssss',$username,$password,$dob,$profile_location);
        $username= $_POST['username'];
        $password = $_POST['password'];
        if($_FILES['profilepic']['name'])
        {
            $profile_location = "\project\OnlineChat\User\profile\user_".$_FILES['profilepic']['name'];
            $destination = "E:/xampp/htdocs/project/OnlineChat/User/profile/user_".$_FILES['profilepic']['name'];
            move_uploaded_file($_FILES['profilepic']['tmp_name'],$destination);
        }
        else{
            $profile_location = "\project\OnlineChat\User\profile\user.png";
        }
        $dob = $_POST['dob'];
        if($mysql_stmt->execute())
        {
            setcookie('profile_pic',$profile_location,time() + 86400);
            header("location:Home.php");
        }
    }

?>