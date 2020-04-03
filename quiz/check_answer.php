<?php
date_default_timezone_set('Asia/Kolkata');
    include "../libraries/lemons.php";
    session_start();
    $user = $_SESSION['user_name'];
    $num = $_POST['num'];
    $answer = trim(strtolower($_POST['answer']));

    $con=getCon();
    $correct=$con->query("select answer from quiz where number='$num'")->fetch_assoc()['answer'];
    $correct = trim(strtolower($correct));
    if($answer==$correct)
    {
         $cur = date("Y-m-d H:i:s");
         $con->query("update matches set status='1',end='$cur' where user_name='$user' and quiz_no='$num'");
        echo $con->error;
        $prev = $con->query("select start from matches where user_name='$user' and quiz_no='$num'")->fetch_assoc()['start'];
        $prev=strtotime($prev);
        $cur =strtotime($cur);
        $prev = new DateTime("@$prev");
        $cur = new DateTime("@$cur");
                $d = date_diff($cur,$prev);
        $diff=$d->format('%i');
        
        $con->query("update user set points=points+1,rank=rank+'$diff' where user_name='$user'");
        echo $con->error;
        


        echo "yes";
  

    }
    else
        echo "no";
?>