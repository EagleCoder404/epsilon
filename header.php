<?php
session_start();

if(isset($_SESSION['user_name']))
{
    $log_code="
    <li class='nav-item'>
        <a class='nav-link'>".$_SESSION['user_name']."</a></li><li class='nav-item'>
              <a class='nav-link' href='/destroy.php'>Logout</a>
            </li>";
}
else
{
    $log_code="   <li class='nav-item'>
              <a class='nav-link' href=\"/login\">Login</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href=\"/registration/register.html\">Register</a>
            </li>";
}

$code=<<<EOD
      <nav class="navbar navbar-expand-sm  justify-content-center bg-dark navbar-dark">
        <a href="/" class='navbar-brand'>
         Epsilon
        </a>
      <button type="button" name="button" class='navbar-toggler' data-toggle='collapse' data-target='#heyyou'><span class='navbar-toggler-icon'></span></button>
        <div class='collapse navbar-collapse' id='heyyou'>
          <ul class='navbar-nav'>

            <li class='nav-item'>
              <a class=' nav-link' href="/leaderboards/">Leaderboards</a>
            </li>


EOD;
$code.=$log_code."</ul></div></nav>";
?>
