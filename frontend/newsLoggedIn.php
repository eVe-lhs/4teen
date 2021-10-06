<?php  date_default_timezone_set("Asia/Yangon"); ?>
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE html> 
<html lang="en">
  <head>
    <title>News</title>
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
                      <li><a href="gamecornerLoggedIn.php">Quiz Corner</a></li>
                      <li><a href="memeLoggedIn.php">Meme Corner</a></li>
                      <li><a href="musicmovieLoggedIn.php">Review Corner</a></li>
                      <li><a href="newsLoggedIn.php">News Corner</a></li>
                    </ul>
                  </li>
                  <li><a href="#" class="about" onClick="toFoot()">About</a></li>
                  <li><a href="#" class="about" onClick="toFoot()">Contact</a></li>
                     <li class="has-children">
           <a href="#"><img src="pictures/userIcon.png" width="40px" height="40px"></a>
                  <ul class="dropdown arrow-top">
         <li><a  href="#"><i class="fas fa-user-circle mr-1"></i><?=$_SESSION['name']?></a></li> 
          <li><a id="logout"><i class="fas fa-sign-out-alt mr-1"></i>Log Out</a></li>
        </ul></li>
                                   <script>
      function toFoot() {
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
              <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
                        <!--big news-->
                        <?php
                        $db=mysqli_connect("localhost","root","","quizes");
                        $query="SELECT * FROM news ORDER by timestamp DESC  LIMIT 2";
                        $result=mysqli_query($db,$query);
                        $delay=100;
                        while($row=mysqli_fetch_array($result))
                        {echo '
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="'.$delay.'ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                  <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">'.$row['timestamp'].'</span>
                                    <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;  class="post-title">'.$row['headline'].'</a>
                                </div>
                            </div>
                        </div>';
                        $delay+=200;}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">

                        <!-- Intro News Filter -->
                        <div class="intro-news-filter d-flex justify-content-between">
                            <h6>Latest news</h6>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Celebrities</a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Entertainment</a>
                                    <a class="nav-item nav-link" id="nav3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Sport</a>
                                    <a class="nav-item nav-link" id="nav4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Science and Technology</a>
                                </div>
                            </nav>
                        </div>

                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="row">
                                    <!-- celebrities-->
                            <?php
                        $db=mysqli_connect("localhost","root","","quizes");
                        $query="SELECT * FROM news WHERE catagory='celebrities' ORDER by timestamp DESC  LIMIT 2";
                        $result=mysqli_query($db,$query);
                        while($row=mysqli_fetch_array($result))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="#" class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';}
                        $query1="SELECT * FROM news WHERE catagory='celebrities' ORDER by timestamp DESC  LIMIT 2,6";
                        $result1=mysqli_query($db,$query1);
                        while($row=mysqli_fetch_array($result1))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post d-flex style-4 mb-30">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                                        ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <div class="row">
                                    <!-- Entertainment -->
                                   <?php
                        $db=mysqli_connect("localhost","root","","quizes");
                        $query="SELECT * FROM news WHERE catagory='entertainment' ORDER by timestamp DESC LIMIT 2";
                        $result=mysqli_query($db,$query);
                        while($row=mysqli_fetch_array($result))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';}
                        $query1="SELECT * FROM news WHERE catagory='entertainment'  ORDER by timestamp DESC LIMIT 2,6";
                        $result1=mysqli_query($db,$query1);
                        while($row=mysqli_fetch_array($result1))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post d-flex style-4 mb-30">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                                        ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav3">
                                <div class="row">
                                    <!-- Sport -->
                             <?php
                        $db=mysqli_connect("localhost","root","","quizes");
                        $query="SELECT * FROM news WHERE catagory='sport' ORDER by timestamp DESC LIMIT 2";
                        $result=mysqli_query($db,$query);
                        while($row=mysqli_fetch_array($result))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';}
                        $query1="SELECT * FROM news WHERE catagory='sport'  ORDER by timestamp DESC LIMIT 2,6";
                        $result1=mysqli_query($db,$query1);
                        while($row=mysqli_fetch_array($result1))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post d-flex style-4 mb-30">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                                        ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav4">
                                <div class="row">
                                    <!--Science and technology-->
                               <?php
                        $db=mysqli_connect("localhost","root","","quizes");
                        $query="SELECT * FROM news WHERE catagory='science' ORDER by timestamp DESC LIMIT 2";
                        $result=mysqli_query($db,$query);
                        while($row=mysqli_fetch_array($result))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';}
                        $query1="SELECT * FROM news WHERE catagory='science'  ORDER by timestamp DESC LIMIT 2,6";
                        $result1=mysqli_query($db,$query1);
                        while($row=mysqli_fetch_array($result1))
                        {
                            echo '<div class="col-12 col-sm-6">
                                        <div class="single-blog-post d-flex style-4 mb-30">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                                            </div>

                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                                                <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source internet</a>
                                            </div>
                                        </div>
                                    </div>';
                        }
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->


    <!-- #####All News Area Start ##### -->

    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single News Area -->
                         
                    <?php    $db=mysqli_connect("localhost","root","","quizes");
                        $query="SELECT * FROM news";
                        $result=mysqli_query($db,$query);
                while($row=mysqli_fetch_array($result)){
                    echo '
                <div class="col-12 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank;><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'"/> </a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">'.get_timeago($row['timestamp']).'</span>
                            <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-title">'.$row['headline'].'</a>
                            <a href="newsdetailLoggedIn.php?id='.$row['id'].'"  target=_blank; class="post-author">Source Internet</a>
                        </div>
                    </div>
                </div>';}?>
            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->
    <!-- ##### All Javascript Script ##### -->
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
  <script src="active.js"></script>
 
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
?><script>
    document.getElementById("logout").addEventListener("click",function(){
       document.location="logout.php"; 
    });
</script>