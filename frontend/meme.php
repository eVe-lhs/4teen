<?php date_default_timezone_set("Asia/Yangon");?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <title>Memes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
       <script defer src="./fonts/fontawesome-all.js"></script>
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
          <link rel="stylesheet" href="style.css">

    <style>
      	.memeheader{
            width: 100%;
      font-family: 'josefin_sansbold';
            text-align: center;
  position: relative;
  text-transform: uppercase;
  letter-spacing: 6px;
  font-size: 40px;
  font-weight: 900;
  text-decoration: none;
  color: white;
  display: inline-block;
  background-size: 100% 100%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  -moz-background-clip: text;
  -moz-text-fill-color: transparent;
  -ms-background-clip: text;
  -ms-text-fill-color: transparent;
  background-clip: text;
  text-fill-color: transparent;
  background-image: linear-gradient(45deg, 
                    #7794ff, 
                    #44107A,
                    #FF1361,
                    #FFF800);
  animation: 1s shake infinite alternate;
}
      @keyframes shake {
  0% { transform: skewX(-15deg); }
  5% { transform: skewX(15deg); }
  10% { transform: skewX(-15deg); }
  15% { transform: skewX(15deg); }
  20% { transform: skewX(0deg); }
  100% { transform: skewX(0deg); }  
}</style>
  </head>
  <body onLoad="init()">
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
          <div id="Container1" style="background-color:cornsilk;">
              <div id="meme">
                  <h1 class="memeheader">4teen Memes</h1>
              </div>  

                  
                        <div class="intro-news-filter d-flex justify-content-between" style="background-color: #1B1919;">
                            <h6>4 teen memes</h6>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Memes</a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Create Meme</a>
                                </div>
                            </nav>
                        </div>

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="container justify-center">
                                <button style="color: white; background:black; text-align: center; border-bottom:1px black thin; cursor: pointer; margin-left: 40%; margin-bottom: 10%;" onClick="formToggle()">Login to post a meme.</button>
                                <div class="comment_area clearfix mb-100 ml-5"  style="color: black;">
                            <?php 
      $db=mysqli_connect("localhost","root","","quizes");
                            $sql="SELECT * FROM memes ORDER by timestamp DESC";
                            $result=mysqli_query($db,$sql);
                              if(mysqli_num_rows($result)==0){
                                  echo '<h1>
                                    No Posts yet.
                                  </h1>';
                              }
                              else{
                            while($row=mysqli_fetch_array($result))
                            {
                                echo '
                                <!-- Comment Content -->
                                <div class="comment-content d-flex">
                                    <!-- Comment Author -->
                                    <div class="comment-author">
                                        <img src="pictures/userIcon.png" alt="author">
                                    </div>
                                    <!-- Comment Meta -->
                                    <div class="comment-meta">
                                        <div class="d-flex">
                                            <p href="#" class="post-author" style="font-weight:bold; font-size:20px;">'.$row['username'].'</p>
                                            <p href="#" class="post-date">'.get_timeago($row['timestamp']).'</p>
                                        </div>
                                        <p style="font-size:15px; font-style:italic;">'.$row['caption'].'</p>
                                         <div class="blog-thumbnail">
                            <img src="data:image/jpeg;base64,'.base64_encode($row['meme']).'"/> 
                        </div>
                                    </div>
                                </div>
                            ';
                            }}
                            ?>
                            <!-- Single Comment Area -->
                    </div>
</div>
                            </div>

                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <h2 class="memeheader">Choose template</h2>
                             <main>
        <div>
            <section class="gallery grid-container">
                <!-- js render -->
            </section>
        
            <section class="meme-container hidden">
                <button onclick="question()" class="btn btn-medium btn-blue btn-radius">
                    <i class="fas fa-times" ></i> Back to Gallery
                </button>

                <div class="meme-control">
                    <canvas class="memeCanvas">
                        Your browser does not support the HTML5 canvas tag.
                    </canvas>

                    <div class="txts-list">
                        <!-- js render -->
                    </div>
                </div>

                <button onclick="newTxtBtnClicked()" class="btn btn-medium btn-blue btn-radius">
                    <i class="fas fa-plus"></i>  Add Line
                </button>
                <a id="dl" download="meme.png" href="#" onclick="dlCanvas(this)" class="btn btn-medium btn-blue btn-radius">
                    <span>
                        <i class="fas fa-cloud-download-alt"></i> Download
                    </span>
                </a>

            </section>

            <section class="contact">

            </section>
        </div>
    </main>   
                            </div>

              </div>          
            </div>
          </div> 
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
                             <script src="js/images.js"></script>
    <script src="js/meme.js"></script>
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