<?php
  $db = mysqli_connect('localhost', 'root', '', 'accounts');
  $username = "";
  $email = "";
  if (isset($_POST['signup'])) {
     
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
    $repeat=$_POST['repeat'];
    $user = "SELECT * FROM users WHERE 1";
  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	$sql_e = "SELECT * FROM users WHERE email='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);
    $userExist = mysqli_query($db,$user);
     $query = "INSERT INTO users (username, email, password) 
      	    	  VALUES ('$username', '$email', '".md5($password)."')";

    if(mysqli_num_rows($userExist)>0){
      if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... username already taken";
        echo "<script>alert('Username already taken');</script>";
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Sorry... email already taken";
        echo "<script>alert('Email already taken');</script>";
  	}else if(strlen($password) <6){
        echo "<script>alert('Password too short');</script>";
    }
      else if($password != $repeat){
        echo "<script>alert('Passwords do not match');</script>";
    }
      else{   
        
  	}
    }
    else{
       if(mysqli_query($db, $query))
                                        {
                                    echo '<script>alert("account created")</script>';
                                   header("location:indexLoggedIn.php");
                                          
                                        }
                                    else{
                                       echo("Error creating account: " . mysqli_error($db));
                                        }
    }
  }
?>