<?php
date_default_timezone_set('Asia/Kolkata');
include "../libraries/lemons.php";
session_start();
$user = $_SESSION['user_name'];
function getQuestionNumbers()
{
    $con = getCon();
    $nums=Array();
    $res = $con->query("select number from quiz;");
    while($num = $res->fetch_assoc())
        $nums[] = $num['number'];
    return $nums;
    
}

function getAllotedQuestions($user)
{
    $nums = Array();
    $con = getCon();
    $res = $con->query("select quiz_no as number from matches where user_name='$user'");
    echo $con->error;
    foreach($res as $row)
        $nums[] = $row['number'];
    return $nums;
}
function getAlive($number)
{
    $con = getCon();
    global $user;
    $res = $con->query("select status from matches where user_name='$user' and quiz_no='$number'")->fetch_assoc();
    if($res['status']=='0')
        return True;
    else
        return False;
}
function give($num)
{
    $con = getCon();
   $file="";
    $q = $con->query("select question from quiz where number='$num'")->fetch_assoc()['question'];
    foreach(['.jpg','.jpeg','.png'] as $ext)
        if(file_exists("../data/"."$num".$ext))
        {
            $file="/data/".$num.$ext;
            break;
        }
    $r = json_encode(["n"=>$num,"q"=>$q,"f"=>$file]);
    echo $r;
    
}

function write_to_db($number)
{
    $con = getCon();
    global $user;
     $cur = date("Y-m-d H:i:s");
    $con->query("insert into matches(user_name,quiz_no,status,start) values('$user','$number','0','$cur')");
    // echo $con->error;
    
}
function get_last()
{
    $con = getCon();
    global $user;
    $res=$con->query("select quiz_no as n from matches where user_name='$user' and status='0'")->fetch_assoc()['n'];
    if($res=="")
        return [False];
    else
        return [True,$res];
}
function getQuestion()
{
    global $user;
    $all_q = getQuestionNumbers();
    $all_given = getAllotedQuestions($user);
    $last = get_last();
    if($last[0])
    {
        give($last[1]);
        die();
    }
    else
    {
        $rem = array_diff($all_q,$all_given);
        if($rem==[])
        {
            echo "gg";
            die();
        }
        $rand_index = array_rand($rem);
        $new_quiz = $rem[$rand_index];
        write_to_db($new_quiz);
        give($new_quiz);
        die();
    }
}

// echo var_dump(array_diff(Array(1,2,3,4,5,6),Array(1,4,3)));
// echo var_dump(getAllotedQuestions($user))
getQuestion();

?>