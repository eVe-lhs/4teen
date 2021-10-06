<?php
// Initialize the session
session_start();
 $db = mysqli_connect('localhost', 'root', '', 'accounts');
if ($stmt = $db->prepare('SELECT id, password,email,profile_pic FROM users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['uname']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password,$email,$profile_pic);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if ((md5($_POST['pword']) === $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['uname'];
		$_SESSION['id'] = $id;
        $_SESSION['email']=$email;
        $_SESSION['profile_pic']=$profile_pic;
		header("location: indexLogedIn.php");
       
	} else {
		echo '<script>alert("incorrect password")';
	}
} else {
	echo '<script>alert("incorrect username")';
}
$stmt->close();
}

?>