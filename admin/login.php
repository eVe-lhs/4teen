<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="adminpanelstyle.css">
    <link rel="stylesheet" href="loginsignupform.css">
<title>Login to admin account</title>
</head>

<body>
    <div id="formbg">
    <div class="login-wrap" id="login-wrap">
	<div class="login-html">
                        <h1 class="caption">Login with admin account</h1>
		<div class="login-form">
			<form  method="post" enctype="multipart/form-data" action="login.php">

				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="uname">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pword">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="signin">
				</div>
				<div class="hr"></div>
			
                </form>
		</div>
	</div>
</div>
      </div>
</body>
</html>
<script type="text/javascript">
        $(document).ready(function(){
            $("#submit").click(function(){
                var user=$("#username").val();
                var pw=$("#password").val();
                if( (user != 'admin') || (pw != 'iamadmin'))
                {alert("Wrong password or username");
                 return false;}
            });
        });
</script>
<?php
// Initialize the session
session_start();
 $db = mysqli_connect('localhost', 'root', '', 'accounts');
if ($stmt = $db->prepare('SELECT id, password FROM admins WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['uname']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (($_POST['pword']) === $password) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['uname'];
		$_SESSION['id'] = $id;
		header("location: index.php");
       
	} else {
		echo '<script>alert("incorrect password")';
	}
} else {
	echo '<script>alert("incorrect username")';
}
$stmt->close();
}
?>