<?php

//When Life gives you lemons

//make functions

function getCon()

{

 $username = "id13132979_root";

 $password = "e63-P?P=oQWU@zLo";

 $hostname = "localhost";

 $db = "id13132979_maindb";

 $con = new mysqli($hostname,$username,$password,$db);

 if($con->connect_error)

 die(connect_error);

 return $con;

}

function create_session($user_name)

{

 session_start();

 $_SESSION['user_name']=$user_name;

}

function go_to($path)

{

 header("Location:".$path);

 die();

}

function rowExists($table,$search_param,$search_value)

{

 $con = getCon();

 $sql = "select * from $table where $search_param='$search_value';";

 $res = $con->query($sql);

 if($res===False)

 die($con->error);

 else if($res->num_rows>0)

 return True;

 else

 return False;

}

getCon();

?>
