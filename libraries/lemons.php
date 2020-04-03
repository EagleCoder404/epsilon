<?php

//When Life gives you lemons

//make functions

function getCon()

{
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

  $con = new mysqli($server, $username, $password, $db);

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
