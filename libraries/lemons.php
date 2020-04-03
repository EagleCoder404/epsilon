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
//   $sql =<<<EOD
//   CREATE TABLE `quiz` (
//     `number` int(11) NOT NULL,
//     `question` text COLLATE utf8_unicode_ci NOT NULL,
//     `answer` text COLLATE utf8_unicode_ci NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
// EOD;
//   if($con->query($sql))
//     echo "done";
//   else {
//     echo $con->error;
//   }
  //

  $sql =<<<EOD
  CREATE TABLE `matches` (
    `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
    `quiz_no` int(11) NOT NULL,
    `status` int(11) NOT NULL DEFAULT 0,
    `start` timestamp NULL DEFAULT NULL,
    `end` timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

EOD;
  if($con->query($sql))
    echo "done";
  else {
    echo $con->error;
  }


  $sql =<<<EOD
  INSERT INTO `matches` (`user_name`, `quiz_no`, `status`, `start`, `end`) VALUES
  ('admin', 1, 0, '2020-04-03 10:15:07', NULL),
  ('toor', 1, 1, '2020-04-03 10:11:54', '2020-04-03 10:11:57'),
  ('toor', 10, 0, '2020-04-03 10:38:29', NULL);
EOD;
  if($con->query($sql))
    echo "done";
  else {
    echo $con->error;
  }


  $sql =<<<EOD
  INSERT INTO `quiz` (`number`, `question`, `answer`) VALUES
  (2, 'Unit of information consisting of quarter of a \'bite’', 'crumb'),
  (3, 'Find the connection!', 'Barclays Dunlop Bharat Petroleum Titan'),
  (4, 'SARS-CoV-2?', 'Corona'),
  (5, 'This blank editorial was published in response to?', 'emergency'),
  (6, 'save icon was inspired by?', 'Floppy Disc'),
  (7, 'Identify this famous personality!', 'Alur Venkat Rao'),
  (8, 'Identify this famous personality!', 'Francis Cunningham'),
  (9, 'Identify this famous personality!', 'Suranjan Das'),
  (10, 'Identify this famous personality!', 'k m cariappa'),
  (11, 'Identify this famous personality!', 'Amoghavarsha'),
  (12, 'Identify the Politician on the left', 'jyotiraditya scindia'),
  (13, '1242 days ago from the start of this online treasure hunt- EPSILON  (a) changed to (b). What happened?', 'demonetization'),
  (14, 'Find the connect! ', 'Watergate Scandal'),
  (15, 'Find the connect! ', 'Yes Bank'),
  (16, 'Find the connect! ', 'Monty Python'),
  (17, 'Find the connect! ', 'Elon Musk'),
  (18, 'Find the connect! ', 'Robert Oppenheimer ');
EOD;
  if($con->query($sql))
    echo "done";
  else {
    echo $con->error;
  }


  $sql =<<<EOD
  CREATE TABLE `user` (
    `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
    `password` text COLLATE utf8_unicode_ci NOT NULL,
    `points` int(11) NOT NULL DEFAULT 0,
    `rank` int(11) DEFAULT 0
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
EOD;
  if($con->query($sql))
    echo "done";
  else {
    echo $con->error;
  }


  $sql =<<<EOD
  INSERT INTO `user` (`user_name`, `email`, `password`, `points`, `rank`) VALUES
  ('admin', 'admin@admin', '$2y$10$g69N52FilE1OHBdO6my0EeajZ1FSq2wI7g7td4xNbi2qn3KTPoz4W', 0, 0),
  ('harsha', 'harsha@gmail.com', '$2y$10$Vb2U6Zvv9ZfhFD9xs60TuOREyM6YRJVfCSP7zOSdMA/SaG.2tqzke', 0, 0),
  ('toor', 'toor@toor', '$2y$10$oTGKHwedHMJKjsoFEfMHueUVRv1QdR4ofyrC4uAPWRTRjkuDIIDjW', 1, 0),
  ('venom', 'venom@venom', '$2y$10$/ftsceu7v2CmnyhkUsnprevtArMwDvV9/MrXkl3t9wo8attwEbxRC', 0, 0);

EOD;
  if($con->query($sql))
    echo "done";
  else {
    echo $con->error;
  }
}
db();

?>
