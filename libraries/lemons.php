<?php

//When Life gives you lemons

//make functions

function getCon()
{
  $url = parse_url("mysql://b18ed02334ae81:b2ad5b44@us-cdbr-iron-east-01.cleardb.net/heroku_29c07e9512929cd?reconnect=true");
  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);

  $con = new mysqli($server, $username, $password, $db);

 if($con->connect_error)
 die($con->connect_error);

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

function db()
{
  $con = getCon();
  $sql =<<<EOD
  CREATE TABLE `quiz` (
    `number` int(11) NOT NULL,
    `question` text COLLATE utf8_unicode_ci NOT NULL,
    `answer` text COLLATE utf8_unicode_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
EOD;
  if($con->query($sql))
    echo "done"
  else {
    echo $con->error;
  }
}
db();

?>
