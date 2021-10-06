    <?php   
$db=mysqli_connect("localhost","root","","quizes");
if(isset($_POST['submit'])){
    $table=str_replace("'","''",$_POST['level']);
    $question=str_replace("'","''",$_POST['question']);
    $choice1=str_replace("'","''",$_POST['choice1']);
    $choice2=str_replace("'","''",$_POST['choice2']);
    $choice3=str_replace("'","''",$_POST['choice3']);
    $choice4=str_replace("'","''",$_POST['choice4']);
    $correct=$_POST['correctanswer'];
   $date=date("Y-m-d H:i:s");
    $sql="";
    if($table==='Easy')
    {$sql="INSERT INTO easy(question,choice1,choice2,choice3,choice4,correct,date) 
    VALUES('$question','$choice1','$choice2','$choice3','$choice4','$correct','$date')";}
    else if($table==='Medium')
    {$sql="INSERT INTO medium(question,choice1,choice2,choice3,choice4,correct,date) 
    VALUES('$question','$choice1','$choice2','$choice3','$choice4','$correct','$date')";}
    else if($table==='Hard')
    {$sql="INSERT INTO hard(question,choice1,choice2,choice3,choice4,correct,date) 
    VALUES('$question','$choice1','$choice2','$choice3','$choice4','$correct','$date')";}
    if(mysqli_query($db,$sql))
    {
       header("location:index.php");
    }
    else{
        echo '<script>alert("error");</script>';
    }
}
 if(isset($_POST['insertMovie'])){
    $db=mysqli_connect("localhost","root","","quizes");
            $movie=str_replace("'","''",$_POST['movieName']);
            $director=str_replace("'","''",$_POST['director']);
            $genre=$_POST['genre'];
     $rating=$_POST['rating'];
     $rtime=$_POST['runningTime'];
     $star=str_replace("'","''",$_POST['starring']);
     $budget=$_POST['budget'];
     $box=$_POST['boxoffice'];
         $imagetmp=addslashes (file_get_contents($_FILES['poster']['tmp_name'])); 
     $movreview=str_replace("'","''",$_POST['movreview']);
             $query = "INSERT INTO movies(Movie,Director,Genre, Rating,RunningTime,Starring,Budget,BoxOffice,Poster,Review,timestamp)VALUES('$movie', '$director', '$genre', '$rating','$rtime','$star','$budget','$box','$imagetmp','$movreview', NOW())";
   $result = mysqli_query($db,$query);
   if(!$result){
      echo("Error adding movies: " . mysqli_error($db));
      exit();
   }else{
      header("location:index.php");
        }}
 if(isset($_POST['insert'])){
$db=mysqli_connect("localhost","root","","quizes");
            $headline=str_replace("'","''",$_POST['headline']);
            $story=str_replace("'","''",$_POST['story']);
            $catagory=$_POST['Catagory'];
         $imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));  
             $query = "INSERT INTO news(headline, story, catagory, picture, timestamp)VALUES('$headline', '$story', '$catagory', '$imagetmp', NOW())";
   $result = mysqli_query($db,$query);
   if(!$result){
      echo("Error adding news: " . mysqli_error($db));
      exit();
   }else{
       header("location:index.php");
        }}
    
?>