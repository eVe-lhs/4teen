<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
?>
<html lang="en">
  <head>
    <title>Quiz Corner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/gamecorner.css">
  </head>
  <body>
      <div id="wholebody">
  <div class="site-wrap">

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="indexLogedIn.php" class="text-white h2 mb-0"><img src="pictures/logo.png" width="40px" height="40px"></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="index.php">Home</a>
                  </li>
                  <li><a href="#" id="teamnav">Team</a></li>
                                  <script>
      $("#teamnav").click(function() {
    $('html, body').animate({
        scrollTop: $("#team").offset().top
    }, 2000);
});
      </script>
                  <li class="has-children">
                    <a href="shows.html">Our Features</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="gamecorner.php">Quiz Corner</a></li>
                      <li><a href="meme.php">Meme Corner</a></li>
                      <li><a href="musicmovie.php">Review Corner</a></li>
                      <li><a href="news.php">News Corner</a></li>
                    </ul>
                  </li>
               <li><a href="#" class="about">About</a></li>
                  <li><a href="#" class="about">Contact</a></li>
                     <li class="has-children">
           <a href="#"><img src="pictures/userIcon.png" width="40px" height="40px"></a>
                  <ul class="dropdown arrow-top">
         <li><a  href="#"><i class="fas fa-user-circle mr-1"></i><?=$_SESSION['name']?></a></li> 
          <li><a id="logout"><i class="fas fa-sign-out-alt mr-1"></i>Log Out</a></li>
        </ul></li>
                                   <script>
      $(".about").click(function() {
    $('html, body').animate({
        scrollTop: $("#foot").offset().top
    }, 2000);
});
                               
      </script>
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    <!---start writing something-->
  <div class="site-section">
        <div id="Container1">
            <div class="container">
            <div id="start">Start Quiz!</div>
            <div id="leader">Leaderboard</div>
            <div id="levelchoice" style="display: none;">Choice Your Level
                <div class="level" id="easy">Easy</div>
                <div class="level" id="medium">Medium</div>
                <div class="level" id="hard">Hard</div>
            </div>
            <div id="quiz" style="display: none;">
            <div id="question"><p>Question</p></div>
          
            <div id="choices">
                <div class="choice" id="A" onClick="checkAnswer('A')">A</div>
                <div class="choice" id="B"
                     onClick="checkAnswer('B')">B</div>
                <div class="choice" id="C" onClick="checkAnswer('C')">C</div>
               
                <div class="choice" id="D" onClick="checkAnswer('D')">D</div>
                   </div>
                 <div id="timer">
                <div id="counter">5</div>
                <div id="btimeGauge"></div>
                <div id="timeGauge"></div>
            </div>
                 </div>
           
            <div id="progress"></div>
            <div id="scoreContainer" style="display: none;"><img src=""><p>50%</p></div>
           <section id="leaderboard" class="project-tab" style="display: none;">
            <div class="container2">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Easy</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Medium</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Hard</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active Table" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Player Name</th>
                                            <th>Points</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $db=mysqli_connect("localhost","root","","quizes");
                                            $query="SELECT * FROM leaderboard WHERE level='easy' ORDER BY Points DESC, date";
                                            $rank=1;
                                            $result=mysqli_query($db,$query);
                                            while($row=mysqli_fetch_array($result)){
                                                echo '<tr>
                                        <td class="text-dark">'.$row['PlayerName'].'</td>
                                        <td class="text-dark">'.$row['Points'].'</td>
                                        <td class="text-dark">'.$rank.'</td>
                                                    </tr>';
                                                $rank+=1;
}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade Table" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Player Name</th>
                                            <th>Points</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $db=mysqli_connect("localhost","root","","quizes");
                                            $query="SELECT * FROM leaderboard WHERE level='medium' ORDER BY Points DESC, date";
                                            $rank=1;
                                            $result=mysqli_query($db,$query);
                                            while($row=mysqli_fetch_array($result)){
                                                echo '<tr>
                                        <td class="text-dark">'.$row['PlayerName'].'</td>
                                        <td class="text-dark">'.$row['Points'].'</td>
                                        <td class="text-dark">'.$rank.'</td>
                                                    </tr>';
                                                $rank+=1;
}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade Table"  id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                             <th>Player Name</th>
                                            <th>Points</th>
                                            <th>Rank</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $db=mysqli_connect("localhost","root","","quizes");
                                            $query="SELECT * FROM leaderboard WHERE level='hard' ORDER BY Points DESC, date";
                                            $rank=1;
                                            $result=mysqli_query($db,$query);
                                            while($row=mysqli_fetch_array($result)){
                                                echo '<tr>
                                        <td class="text-dark">'.$row['PlayerName'].'</td>
                                        <td class="text-dark">'.$row['Points'].'</td>
                                        <td class="text-dark">'.$rank.'</td>
                                                    </tr>';
                                                $rank+=1;
}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="back" onClick="backtomenu()">Back to menu</button>
            </div>
        </section>
                </td>
            </table>
          </div>
        </div>
    </div>
<?php
$db=mysqli_connect("localhost","root","","quizes");
$sql_1="SELECT * FROM easy ORDER BY id DESC";
$sql_2="SELECT * FROM medium ORDER BY id DESC";
$sql_3="SELECT * FROM hard ORDER BY id DESC";
$questions_easy=array();
$questions_medium=array();
$questions_hard=array();
$x=0;
$y=0;
$z=0;
 $result_1=mysqli_query($db,$sql_1);
 $result_2=mysqli_query($db,$sql_2);
 $result_3=mysqli_query($db,$sql_3);
while($row=mysqli_fetch_array($result_1))
{
   $questions_easy[$x]=array(
   "question"=>str_replace("'","'''",$row['question']),,
    "choiceA"=>str_replace("'"," ",$row['choice1']),
    "choiceB"=>str_replace("'"," ",$row['choice2']),
    "choiceC"=>str_replace("'"," ",$row['choice3']),
    "choiceD"=>str_replace("'"," ",$row['choice4']),
    "correct"=>$row['correct']);
    $x++;
}
while($row=mysqli_fetch_array($result_2))
{
   $questions_medium[$y]=array(
   "question"=>str_replace("'"," ",$row['question']),,
    "choiceA"=>str_replace("'"," ",$row['choice1']),
    "choiceB"=>str_replace("'"," ",$row['choice2']),
    "choiceC"=>str_replace("'"," ",$row['choice3']),
    "choiceD"=>str_replace("'"," ",$row['choice4']),
    "correct"=>$row['correct']);
    $y++;
}
while($row=mysqli_fetch_array($result_3))
{
   $questions_hard[$z]=array(
   "question"=>str_replace("'"," ",$row['question']),,
    "choiceA"=>str_replace("'"," ",$row['choice1']),
    "choiceB"=>str_replace("'"," ",$row['choice2']),
    "choiceC"=>str_replace("'"," ",$row['choice3']),
    "choiceD"=>str_replace("'"," ",$row['choice4']),
    "correct"=>$row['correct']);
    $z++;
}
    $questions_easy_json=array();
    $questions_medium_json=array();
    $questions_hard_json=array();
    for($x=0;$x<sizeof($questions_easy);$x++)
    {$questions_easy_json[$x]=json_encode($questions_easy[$x]);}
    for($x=0;$x<sizeof($questions_medium);$x++)
    {$questions_medium_json[$x]=json_encode($questions_medium[$x]);}
    for($x=0;$x<sizeof($questions_hard);$x++)
    {$questions_hard_json[$x]=json_encode($questions_hard[$x]);}
    $x=0;
?>

     <script>
         var questions=[];
         var lastQuestion=-1;
         easy.addEventListener("click",function(){
   <?php foreach($questions_easy_json as $k => $val) 
    {
        ?> questions.push(JSON.parse('<?=$questions_easy_json[$k];?>'));
             lastQuestion++;<?php
    }?>
},false);
medium.addEventListener("click",function(){
   <?php foreach($questions_medium_json as $k => $val) 
    {
        ?> questions.push(JSON.parse('<?=$questions_medium_json[$k];?>'));
    lastQuestion++;<?php
    }?>
},false);
         hard.addEventListener("click",function(){
   <?php foreach($questions_hard_json as $k => $val) 
    {
        ?> questions.push(JSON.parse('<?=$questions_hard_json[$k];?>'));
             lastQuestion++;<?php
    }?>
},false);
       
    </script>
    <script  src="scripts/gamecorner.js"></script>  
            <div class="site-section" id="team">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Our Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="pictures/linhtetswe.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Lin Htet Swe</h2>
                <span class="d-block mb-2 text-white-opacity-05">Group Leader</span>
                <p class="mb-4">Responsible for page frame,backend and quiz corner.</p>
                <p>
                  <a href="https://www.facebook.com/linhtetswe" class="text-white p-2" target="_blank"><span class="icon-facebook"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="pictures/aunghponethant.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Aung Hpone Thant</h2>
                <span class="d-block mb-2 text-white-opacity-05">Member</span>
                <p class="mb-4">Responsible for page frame movie corner.</p>
                <p>
                  <a href="https://www.facebook.com/profile.php?id=100010853012646" class="text-white p-2"><span class="icon-facebook" target="_blank"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="pictures/swamhtetaung.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Swam Htet Aung</h2>
                <span class="d-block mb-2 text-white-opacity-05">Member</span>
                <p class="mb-4">Responsible for games in news corner.</p>
                <p>
                  <a href="https://www.facebook.com/swamhtet.aung.52" class="text-white p-2"><span class="icon-facebook" target="_blank"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="pictures/chitsuthwin.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Chit Su Thwin</h2>
                <span class="d-block mb-2 text-white-opacity-05">Member</span>
                <p class="mb-4">Responsible for news corner page frame and news corner.</p>
                <p>
                  <a href="https://www.facebook.com/su.thwin.3" class="text-white p-2" target="_blank"><span class="icon-facebook"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="pictures/zoey.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Naychi Myat Soe</h2>
                <span class="d-block mb-2 text-white-opacity-05">Member</span>
                <p class="mb-4">Responsible for page frame in meme corner</p>
                <p>
                  <a href="https://www.facebook.com/zoey.74" class="text-white p-2" target="_blank"><span class="icon-facebook"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">

            <div class="team-member">

              <img src="pictures/lawunncho.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">La Wunn Cho</h2>
                <span class="d-block mb-2 text-white-opacity-05">Member</span>
                <p class="mb-4">Responsible for backend in memes corner.</p>
                <p>
                  <a href="https://www.facebook.com/kgmalay.lay.142" class="text-white p-2" target="_blank"><span class="icon-facebook"></span></a>
                </p>
              </div>

            </div>
          </div>


        </div>
      </div>
    </div>
    <footer class="site-footer" id="foot">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About us</h3>
              <p>We are the group no.3 of the Second year Section (A) who are studying at University of Information Technology.We came to an idea of creating a webpage for teenagers and want to include everything possible. Thus, we tried to break that into 4 catagories and put them into this website.</p>
            </div>
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Receive an email</h3>
              <form action="#" method="post" class="site-block-subscribe">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter your email"
                    aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary rounded-top-right-0" type="button" id="button-addon2">Get</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                     <li><a href="index.html">Home</a></li>
                  <li><a href="#">Quiz Corner</a></li>
                  <li><a href="#">Meme Corner</a></li>
                 
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Movie Review</a></li>
                  <li><a href="#">News Corner</a></li>
 
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Contact Us</h3>

                 <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">Contact Info</h3>
            <p class="mb-0 font-weight-bold text-black">Our University Address</p>
            <p class="mb-4 text-black">Parami Road, Universities' Hlaing Campus, Ward (12), Hlaing Township, Yangon, Myanmar
Yangon</p>
  
            <p class="mb-0 font-weight-bold text-black">Phone</p>
            <p class="mb-4"><a href="#">01 966 4709</a></p>
  
            <p class="mb-0 font-weight-bold text-black">Email</p>
            <p class="mb-0"><a href="#">hr.admin@uit.edu.mm</a></p>
  
          </div>
              </div>
            </div>

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Our Location</h3>

              <div class="block-16">
                <figure>
                <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20information%20technology&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/best-wordpress-themes/">embedgooglemap.net theme mobile</a></div><style>.mapouter{position:relative;text-align:right;height:400px;width:400px;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:400px;}</style></div>

                </figure>
              </div>

            </div>

            

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
      </div>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>  
  </body>
</html>