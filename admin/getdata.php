<?php
$msg="";    
if(isset($_POST['submit'])){
  //the path to store the uploaded image
   $imagename=$_FILES["image"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));

//Insert the image name and image content in image_table

    //connect to database
    $db=mysqli_connect("localhost","root","","tutorial");
    //get all the submitted data
    $image=$_FILES['image']['name'];
    $text=$_POST['text'];
    $sql="INSERT INTO contents(image,text) VALUES('$imagetmp','$text')";
    mysqli_query($db,$sql);
}
?>