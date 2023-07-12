<?php
include("connection.php");
if(isset($_POST['submit'])){
    if(isset($_COOKIE['rememberCookieUname'])){
        $uname=$_COOKIE['rememberCookieUname'];
    }else{
        $uname=$_POST['uname'];
    }
    if(isset($_COOKIE['remeberCookiePassword'])){
        $pass=$_COOKIE['rememberCookiePassword'];
    }else{
        $pass=$_POST['pass'];
    }
    
    if(isset($_REQUEST['checkbox'])){
        $checkbox=$_REQUEST['checkbox'];
    }
    else{
        $checkbox='';
    }
    $query=mysqli_query($con,"select * from login where uname='$uname'");
    while($result=mysqli_fetch_assoc($query)){
        $action=$result['action'];
        $db_pass=$result['pass'];
        $cookie_name=$result['uname'];
    }
    if($action==0){
        if($pass==$db_pass)
        {
            if($checkbox=="1")
            {
                setcookie("rememberCookieUname",$uname,(time()+604800));
                setcookie("rememberCookiePassword",$pass,(time()+604800));
                ?>
                    <script>
                        alert("login succesfully !!");
                    </script>
                <?php
            }
        }
        else{
            ?>
            <script>
                alert("incurrrect password !!")
                return false;
            </script>
            <?php
        }
    }else{
        ?>
            <script>
                alert("your account is corrently deactivate !!")
                return false;
            </script>
        <?php
    }
}

?>