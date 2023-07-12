<?php
include("connection.php");
if(isset($_POST['submit'])){
    $uname=$_REQUEST['uname'];
    $pass=$_REQUEST['pass'];
    $checkbox=$_REQUEST['checkbox'];
    $cookie_name = "userid";
    $query=mysqli_query($con,"select * from login where uname='$uname'");
    while($result=mysqli_fetch_assoc($query)){
        $action=$result['action'];
        $db_pass=$result['pass'];
    }
    if($action==0){
        if($pass==$db_pass){
            setcookie($cookie_name, $uname, time() + (86400 * 30), "/"); 
        }else{
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