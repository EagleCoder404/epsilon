<!DOCTYPE html>


<?php include "header.php";?>


<html lang="en" dir="ltr">


  <head>


    <meta charset="utf-8">


    <title></title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">


  </head>





  <body>


        <?= $code?>


        <!--heading-->


      <div class="jumbotron text-center">


          <h1 class="display-1">Epsilon</h1>


          <h3>The online treasure hunt</h3>


          <br>


          <hr>


          <br>


          


          


          


          <!--trying-->


          <p>


  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">--------  Rules  --------</a>


  <br><br>





</p>


<div class="row">


  <div class="col">


    <div class="collapse multi-collapse" id="multiCollapseExample1">


      <div class="card card-body">


         <ul class="text-left" >


            <li>Each correct answer, will earn you 1 point.</li>
            <li>The first individual with highest points at the end of the 4th April 11:59PM wins the contest.</li>
            <li>Questions might be added based on the requirement.</li>
            <li>Organisers decision is final.</li>
            <li>Please use your official name while registering to claim the goodies in case you win. </li>
          
            <li>The questions range over the theme of the fest. Few questions might tickle your brain, but do not give up!</li> 
                            

                 </ul>  


      </div>


    </div>


  </div>


</div><br><br>


          


          


        <!--get started-->


      <div class="container text-center">


         <a class='btn btn-primary btn-lg' href='/quiz/'>get started</a>


      </div>


      <div class="container-fluid text-center bg-dark fixed-bottom text-light p-3">


          Made with <span styke="color:red">&hearts;</span> by


        <kbd> TEAM 12</kbd>


      </div>


    <br><br>


</body>


</html>


