<?php
    session_start();
    if(!$_SESSION['username'])
    {
        header("location:Signin.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>OnlineChat</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="/project/OnlineChat/CSS_FILES/Navigation.css">
        <link rel="stylesheet" href="/project/OnlineChat/CSS_FILES/Style.css">
        
    </head>
    <body>
        <center>
            <img src="/project/OnlineChat/icons/OnlineChatLogo.png" width="200px" height="50px">
        </center>
        <form method="post" enctype="multipart/form-data">
        <div id="nav-menu">
            <div style="position:absolute;"><img style="display:block;width:31px;border-top: 3px solid whitesmoke;border-bottom: 3px solid whitesmoke;border-radius:10%;" src="<?php echo $_SESSION['profile_pic']; ?>">
        
            <div id="sub-nav">

                <div><a href="Home.php">Home</a></div>
                <div><button style="display:block;padding:10px;font-size:20px;background-color:inherit;color:white;border:none;" name="signout-btn">Signout</button></div>
            
            </div>

            </div>
                <div id="active" style="float:right;"><a href="#">Update</a></div>
        </div>
        <div id="update-pannel">
            <div id="color-blink">Update your profile!</div>
            <div><img src="<?php echo $_SESSION['profile_pic']; ?>" width="100px" height="100px" border="5px" style="border-radius:50%;border-color:darkslategray;"></div>
            <div>Profile picture</div>
            <div><input type="file" name="pic" title="Hi"></div>
            <div>Username</div>
            <div><input type="text" name="username"></div>
            <div>Password</div>
            <div><input type="password" name="password"></div>
            <div><button name="update-btn">Update</button></div>
        </div>    
    </form>
    </center>
    
    </body>
</html>
<?php
    require "Connection.php";
    if(isset($_POST['signout-btn']))
    {
        session_destroy();
        header("location:signin.php");
    }

    if(isset($_POST['update-btn']))
    { echo $_SESSION['username'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loc_user = $_SESSION['username'];
        $sql_stmt = $db_conn->prepare("UPDATE user SET username=?,password=? WHERE username=?");
        $sql_stmt->bind_param("sss",$username,$password,$loc_user);
        $sql_stmt->execute();
        if($sql_stmt)
        {
            echo "Row is affected!";
        }
        else{
            echo "Row isn't affected!<br>";
            echo mysqli_error($db_conn);
        }
    }

?>