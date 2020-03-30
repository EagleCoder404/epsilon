<?php
// echo 'hi';
session_start();
include "../libraries/lemons.php";
$email = $_POST['email'];
$password = $_POST['password'];
// $email = "toor@toor";
// $password = "toorroot";
function check_password($email,$password)
{
    // echo "fun";
 $con = getCon();
    // echo "more fun";
  $user = $con->query("select * from user where email='$email';")->fetch_assoc();
//   echo "very very fun";
  $password_hash=$user['password'];
  if(password_verify($password,$password_hash))
  {
      $_SESSION['user_name']=$user['user_name'];
      return True;
  }
  else
    return False;
}

if(rowExists('user','email',$email))
    if(check_password($email,$password))
        echo "yes";
    else
        echo "no2";
else
    echo "no1";
?>