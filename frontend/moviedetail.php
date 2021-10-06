<?php  date_default_timezone_set("Asia/Yangon"); 
$db=mysqli_connect("localhost","root","","quizes");
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($db,$_GET['id']);
    $query="SELECT * FROM movies WHERE id='$id'";
     $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    $bgcolor="";
    $tagcolor="";
    switch($row['Genre'])
    {
        case "Comedy":$bgcolor="skyblue";
                            $tagcolor="#f9d342";
            break;
        case "Superhero":$bgcolor="#292826";
                            $tagcolor="red";
            break;
        case "Romance":$bgcolor="white";
                            $tagcolor="red";
            break;
        case "Horror":$bgcolor="	#4d402c";
                            $tagcolor="#3a1717";
            break;
    }
}
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <title><?= $row['Movie'] ?></title>
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
    <script src="js/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <div id="formbg">
    <div class="login-wrap" id="login-wrap">
	<div class="login-html">
         <span onclick="" class="Close" id='close' title="Close Modal">&times;</span>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<form  method="post" enctype="multipart/form-data" action="login.php">
            <div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="uname">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pword">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="signin">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
                </form>
            <!----SignUp Form--->
            <form  method="post" enctype="multipart/form-data">
			<div class="sign-up-htm">
                    <?php include('SignUpCheck.php') ?>
                <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="username" required>
                    <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
				</div>
                </div>  
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass1" type="password" class="input password" data-type="password" name="password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass2" type="password" class="input repeatpassword" data-type="password" name="repeat" required>
				</div>
                    <span id='message'></span>
                    <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" name="email" placeholder="example@email.com" required> <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
				</div>
                </div>
				<div class="group">
					<input type="submit" class="button" 
                           id="signup" value="Sign Up" name="signup">
                     
				</div>
				<div class="hr"></div>
				
			</div>
                </form>
		</div>
	</div>
</div>
      </div>
      <div id="wholebody">
  <div class="site-wrap">

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0"><img src="pictures/logo.png" width="40px" height="40px"></a></h1>
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
                    <a href="#">Our Features</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="gamecorner.php">Quiz Corner</a></li>
                      <li><a href="meme.php">Meme Corner</a></li>
                      <li><a href="musicmovie.php">Review Corner</a></li>
                      <li><a href="news.php">News Corner</a></li>
                    </ul>
                  </li>
                    <li><a href="#" class="about">About</a></li>
                  <li><a href="#" class="about">Contact</a></li>
                    <li><a href="#" onclick="formToggle()">Login/Sign UP</a></li>
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
        <div class="site-section">
          <div id="Container1">
                <div class="post-details-title-area bg-overlay clearfix" style="background-color: <?= $bgcolor ?>;">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-lg-8">
                    <!-- Post Content -->
                    <div class="post-content">
                        <p class="tag" style="background-color: <?= $tagcolor ?>;"><span><?= $row['Genre'] ?></span></p>
                        <p class="post-title"><?= $row['Movie']  ?></p>
                        <div class="d-flex align-items-center">
                            <span class="post-date mr-30" style="color: white;"><?= date("M d, Y", strtotime($row['timestamp'])); ?></span>
                            <span class="post-date" style="color: white;">Source Internet</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Post Details Title Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
                <section class="post-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-sm">
                    <div class="post-details-content mb-100 ">
                        <div class="row">
                         <img class="mb-30 col" crossorigin="anonymous" src="data:image/jpeg;base64,<?= base64_encode($row['Poster']) ?>" alt="">
                        <div class="col-6 line-height-lg"><p><b>Director: </b><?= $row['Director'] ?><br>
					<b>Genre(s): </b><?= $row['Genre'] ?><br>
					<b>Rating: </b><?= $row['Rating'] ?><br>
					<b>Runtime: </b><?= $row['RunningTime'] ?>  <br>
					<b>Starring: </b><?= $row['Starring'] ?>   <br>
					<b>Budget: </b><?= $row['Budget'] ?>	<br>
                            <b>Box office:</b><?= $row['BoxOffice'] ?> <br></p></div></div>
                        <p style="text-align: justify;"><?= $row['Review'] ?></p>
                    </div>
                        <div class="comment_area clearfix mb-100"  style="color: black;">
                        <h4 class="mb-50" >Comments<a href="#" onClick="formToggle()"> (Sign in to leave a comment)</a></h4>

                        <ol>
                            <?php 
      $db=mysqli_connect("localhost","root","","quizes");
                            $sql="SELECT * FROM moviecomments WHERE post_id=$id";
                            $result=mysqli_query($db,$sql);
                              if(mysqli_num_rows($result)==0){
                                  echo '<h1>
                                    No comments for this Movie
                                  </h1>';
                              }
                              else{
                            while($row=mysqli_fetch_array($result))
                            {
                                echo '<li class="single_comment_area">
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="pictures/userIcon.png" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <a href="#" class="post-author">'.$row['user'].'</a>
                                            <a href="#" class="post-date">'.date(" M d, Y", strtotime($row['timestamp'])).'</a>
                                        </div>
                                        <p>'.$row['comment'].'</p>
                                    </div>
                                </div>
                            </li>';
                            }}
                            ?>
                            <!-- Single Comment Area -->
                            <!-- Single Comment Area -->
                        </ol>
                    </div>
                </div>
                <!-- Sidebar Widget -->
            </div>
        </div>
    </section>
    <script>
             var modal=document.getElementById('formbg');
            var close=document.getElementById('close');
            var signup=document.getElementById('signup');
            modal.style.display='none';
    function formToggle()
    {   document.getElementById('wholebody').style.display="none";
       modal.style.display='block';
        modal.classList.add('open');
        if($('#formbg').hasClass('close'))
            {modal.classList.remove('close');}
       // modal.addClass('open');
    }
          
    </script>
    <script>
          window.onclick = function(event) {
              
  if (event.target == modal || event.target==close) {
     window.location.reload();
  }}
</script>
    <script>
        $('.password, .repeatpassword').on('keyup', function () {
            var passCount=document.getElementById('pass1').value;
            var repassCount=document.getElementById('pass2').value;
if(passCount.length<6)
    {
      $('#message').html('Password is too short').css('color','red');
        return false;
    }
  else if ($('.password').val() == $('.repeatpassword').val()) {
    $('#message').html('&#10004;').css('color', 'green');
  }
    else 
    {$('#message').html('Passwords does not Matching').css('color', 'red');
     return false;
   }
});
        </script>
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
    <!-- time ago -->
    <?php
function get_timeago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>