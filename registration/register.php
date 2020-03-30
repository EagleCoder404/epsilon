<?php
include "../libraries/lemons.php";

 
 $con = getCon();

$u = $_POST['user_name'];
$e = $_POST['email'];
$p = $_POST['pass'];
$p = password_hash($p,PASSWORD_DEFAULT);

if(($con->query("insert into user(user_name,email,password) values('$u','$e','$p');"))===True)
    echo "yes";
else
    echo $con->error;

?>
