<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signin</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/project/OnlineChat/CSS_FILES/Navigation.css">
        <link rel="stylesheet" href="/project/OnlineChat/CSS_FILES/Style.css">
    </head>
    <body>
        <center>
            <img src="/project/OnlineChat/icons/OnlineChatLogo.png" width="200px" height="50px">
        </center>
        <div id="nav-menu">
            <div><a href="/project/OnlineChat/Index.html">Home</a></div>
            <div id="active" style="float:right;"><a href="#">Signin</a></div>
            <div style="float:right;"><a href="About.php">About us</a></div>
        </div>
        
            <form method="post">
            <div id="signin-pannel">
                <div><img src="/project/OnlineChat/icons/user.png" width="150px" height="150px"></div>
                <div>Username</div>
                <div><input type="text" id="username" name="username" placeholder="username" autocomplete="off"></div>
                <div>Password</div>
                <div><input type="password" id="psd" name="password" placeholder="password"><img id="psd_eye" style="margin-left:-30px;" src="/project/OnlineChat/icons/eye.png" width="30px" height="30px"></div>
                <div><button name="signin-btn">Signin</button></div>
                <div><a href="/project/OnlineChat/user/Signup.php">Signup</a></div>
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

    if(isset($_POST["signin-btn"]))
    {
        $mysql_stmt = $db_conn->prepare("SELECT username,picture_location FROM user WHERE username=? AND password=?");
        $mysql_stmt->bind_param('ss',$username,$password);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $mysql_stmt->execute();
        $mysql_stmt->bind_result($user_name,$pic_location);
        if($mysql_stmt->fetch())
        {
            header("location:Home.php");
            setcookie('username',$user_name, time() + 86400);
            setcookie('profile_pic', $pic_location, time() + 86400);
        }
    }

?>