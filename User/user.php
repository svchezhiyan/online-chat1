<?php
require_once "connection.php";
session_start();
$id = $_COOKIE['id'];
if($id)
{
    $query = "SELECT `id`, `username`, `dob`, `picture_location` FROM `user` WHERE id =".$id;
    $sql_stmt = mysqli_query($db_conn,$query);
    if($row = mysqli_fetch_array($sql_stmt))
    {
        $user = $row['username'];
        setcookie('to', $user, time() + 86400);
    }
}
?>
<html>
<head>
    <style>
        .color{
            color:orange;
        }
    </style>
</head>
    <body>
        <div class="box"> 
            <div> 
                <form action="" method="get">
                    <input type="text" placeholder="Type here..." name="msg" >
                    <button name="hit">hit</button>
                </form> 
            </div>
        </div>
    </body>
</html>
<?php
    require_once "connection.php";
    if(isset($_GET['hit']))
    {
       
        $msg = $_GET['msg'];
        $from = $_COOKIE['username'];
        $to = $_COOKIE['to'];
        $from_pic = $_COOKIE['profile_pic'];
        $query = "INSERT INTO `chat`(message,from_user, to_user,from_pic) VALUES (?,?,?,?)";
        $mysql_stmt = $db_conn->prepare($query);
        $mysql_stmt->bind_param('ssss',$msg,$from,$to,$from_pic);
        $mysql_stmt->execute();
        if($mysql_stmt)
        {
            // echo "Row is affected!";
        }else {
            echo "Row isn't  affected!";
        }
    }
    $sql_query = "SELECT message,from_user,Time,from_pic from chat WHERE (from_user = ? AND to_user = ?) OR (to_user = ? AND from_user = ?)";
    $stmt = $db_conn->prepare($sql_query);
    $stmt->bind_param('ssss',$from,$to,$from,$to);
    $from = $_COOKIE['username'];
    $to = $_COOKIE['to'];
    $stmt->execute();
    $stmt->bind_result($message,$from,$time,$f_pic);
    echo "<table border='1' style='position:absolute;left:50%;top:50%;transform:translate(-50%,-50%)'><thead><tr><th colspan='3'>User Message</th></tr></thead>";
    while($stmt->fetch())
    {
        echo "<tbody><tr><td><img src='".$f_pic."' width='50px' hight='50px'><td style='color:green'>".$from."</td><td style='color:blue'>".$message."</td><td style='color:orange'>".$time."</td></tr></tbody>";
    }
?>
