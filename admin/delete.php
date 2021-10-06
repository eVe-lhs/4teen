<?php if(isset($_GET['del'])) {
    $db=mysqli_connect("localhost","root","","accounts");
    $delete_id = mysqli_real_escape_string($db,$_GET['del']);
    $sql ="DELETE FROM users WHERE username = '".$delete_id."'";
    if(mysqli_query($db,$sql)) {
          echo '<script>alert("Deleted")</script>';
       header("location:index.php");
    } else {
        echo "ERROR:". mysqli_error($db);
    }}
    if(isset($_GET['delque'])) {
        $db=mysqli_connect("localhost","root","","quizes");
    $table=$_GET['level'];
    $delete_id = mysqli_real_escape_string($db,$_GET['delque']);
    $sql = mysqli_query($db,"DELETE FROM ".$table." WHERE date = '".$delete_id."'");
    if($sql) {
       header("location:index.php");
         
    } else {
        echo "ERROR";
    }
}
if(isset($_GET['delmeme'])) {
        $db=mysqli_connect("localhost","root","","quizes");
    $delete_id = mysqli_real_escape_string($db,$_GET['delmeme']);
    $sql = mysqli_query($db,"DELETE FROM memes WHERE timestamp= '".$delete_id."'");
    if($sql) {
       header("location:index.php");
         
    } else {
        echo "ERROR";
    }}
    if(isset($_GET['delmovie'])) {
        $db=mysqli_connect("localhost","root","","quizes");
    $delete_id = mysqli_real_escape_string($db,$_GET['delmovie']);
    $sql = mysqli_query($db,"DELETE FROM movies WHERE timestamp= '".$delete_id."'");
    if($sql) {
       header("location:index.php");
         
    } else {
        echo "ERROR";
    }}
        if(isset($_GET['delmovie'])) {
        $db=mysqli_connect("localhost","root","","quizes");
    $delete_id = mysqli_real_escape_string($db,$_GET['delnews']);
    $sql = mysqli_query($db,"DELETE FROM news WHERE timestamp= '".$delete_id."'");
    if($sql) {
       header("location:index.php");
         
    } else {
        echo "ERROR";
    }}
?>