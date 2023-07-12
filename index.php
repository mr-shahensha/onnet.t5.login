<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>login</title>
</head>
<body>
    <h1>login page</h1>
    <form action="logic.php" method="post" onsubmit="return validation()">
        <table border="2">
            <tr>
                <td><input type="text" placeholder="enter username" name="uname" id="uname_id" onkeyup="hidewarn(this.value)"></td>
            </tr>
            <tr>
                <td><input type="text" placeholder="enter password" name="pass" id="pass_id" onkeyup="hidewarn2(this.value)"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="login" name="submit">
                </td>
            </tr>
        </table>
        <input type="checkbox" name="checkbox" id="" value="1">remember me
        <p id="warn" style="color:red;"></p>
        <p id="warn2" style="color:red;"></p>
    </form>
</body>
</html>
<script>
    function validation(){
        var uname_id=document.getElementById('uname_id').value;
        var pass_id=document.getElementById('pass_id').value;

        if(uname_id.length<3){
            text="please enter username";
            document.getElementById("warn").innerHTML = text;
                return false;
        }
        if(pass_id.length<3){
            text="please enter password";
            document.getElementById("warn2").innerHTML = text;
                return false;
        }
    }
    function hidewarn(a){
        if(a!=''){
        document.getElementById("warn").innerHTML = "";
        }
    }
    function hidewarn2(a){
        if(a!=''){
        document.getElementById("warn2").innerHTML = "";
        }
    }
</script>