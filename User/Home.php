<?php
    session_start();
    if(!$_COOKIE['profile_pic'])
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
        <form method="post">
        <div id="nav-menu">
            <div style="position:absolute;"><img style="display:block;width:31px;border-top: 3px solid whitesmoke;border-bottom: 3px solid whitesmoke;border-radius:10%;" src="<?php echo $_COOKIE['profile_pic']; ?>">
        
            <div id="sub-nav">
                <div><a href="Update.php">Update</a></div>
                <div><button name="signout-btn">Signout</button></div>
            </div>

            </div>

            <div id="active" style="float:right;"><a href="#">Home</a></div>
            <div id="dummy" style="float:right;"><a href="#" style="border:none;"><img src="/project/OnlineChat/icons/search.png" width="20px" height="20px"></a></div>
            <!--<div id="search_user" style="float:right;"><input id="user_name" list="suggetion" onkeyup="getUser();" style="margin-top:10px;" placeholder="Username..."><button id="search_btn" style="background-color:inherit;border:none;"><img src="/OnlineChat/icons/search.png" width="20px" height="20px"></button></div>-->
            <div id="search_user" style="float:right;display:none;"><input id="user_name" type="text" onkeyup="getUser();" style="margin-top:10px;" placeholder="Username..."></div>
        </div>
        <div id="user"></div>
        
        </form>
        

        <!-- <link rel="stylesheet" href="/project/OnlineChat/java_script/common.js"> -->
        <script type="text/javascript">
            
            document.getElementById('dummy').addEventListener("click",function(){
                document.getElementById('dummy').style.display='none';
                document.getElementById('search_user').style.display='block';
            });
            
            
            function getUser(){
                console.log('get user');
                var username = document.getElementById("user_name").value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200)
                    {
                        document.getElementById("user").innerHTML = xhttp.responseText;
                    }
                };
                xhttp.open("GET","User_search.php?user="+username,true);
                xhttp.send();
            }
        </script>
        <script>
            // alert('file is work');

            window.onload= console.log('page is loaded')
            cht_btn.addEventListener('click',function(){
                alert('btn_works');
                console.log('btn_works');
            });
        </script>
 </body>
</html>



<?php
    require "Connection.php";
    if(isset($_POST['signout-btn']))
    {
        session_destroy();
        header("location:signin.php");
    }
?>