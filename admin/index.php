<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
?>
<html>
    <head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="adminpanelstyle.css">
<!------ Include the above in your HEAD tag ---------->
</head>
    <body>
<div class="container">
	<div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs" id="myTab">
        <li class="active"><a href="#tab1" data-toggle="tab">Users</a></li> 
          <li class=><a href="#tab2" data-toggle="tab">Quiz Table</a></li>
          <li class=""><a href="#tab3" data-toggle="tab">Quiz add</a></li>
          <li class=""><a href="#tab4" data-toggle="tab">Memes table</a></li> 
            <li class=""><a href="#tab6" data-toggle="tab">Movies table</a></li>
            <li><a href="#tab10" data-toggle="tab">Movies add</a></li>
            <li class=""><a href="#tab8" data-toggle="tab">News table</a></li>
            <li class=""><a href="#tab9" data-toggle="tab">News add</a></li> 
		</ul>
	</nav>
</div>
<!-- tab content -->
<div class="tab-content">
<div class="tab-pane active text-style" id="tab1">
  <h2>Users</h2>
      <div class="table-wrapper">
        <table class="quiztable">
            <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Id</th>
               
            </tr></thead>
             <tbody>
<?php 
  $db=mysqli_connect("localhost","root","","accounts");
                 $tablename="";
                 $rowname="";
$query="SELECT * FROM users ORDER BY id DESC";
    $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
echo '<tr>
    <td>'.$row['username'].'</td>
<td>'.$row['email'].'</td>
<td>'.$row['id'].'</td>
<td><a href="delete.php?del='.$row['username'].'">Delete User</a></td>
  </tr>';
}
?>	
</tbody>
        </table>
    </div>
</div>
<div class="tab-pane text-style" id="tab2">
  <h2>Quizes table</h2>
   <form class="tablename" method="POST" enctype="multipart/form-data"> 
<select id="level" name="level" class="level">
    <option value="Easy">Easy</option>
  <option value="Medium">Medium</option>
  <option value="Hard">Hard</option>
    <input type="submit" name="sub" class="submit" value="Submit">
          </select></form>
    <div class="table-wrapper">
        <table class="quiztable">
            <thead>
            <tr>
                <th>Question</th>
                <th>Choice1</th>
                <th>Choice2</th>
                <th>Choice3</th>
                <th>Choice4</th>
                <th>Correct</th>
                <th>Date</th>
               
            </tr></thead>
             <tbody>
<?php 
  $db=mysqli_connect("localhost","root","","quizes");
                 $tablename="";
                 $rowname="";
if(isset($_POST['sub'])){
        $tablename=$_POST['level'];
$query="";
if($tablename==="Easy")
{
$query="SELECT * FROM easy ORDER BY date DESC";}
else if($tablename==="Medium")
{
$query="SELECT * FROM medium ORDER BY date DESC";}
else if($tablename==="Hard")
{
$query="SELECT * FROM hard ORDER BY date DESC";}
    $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
echo '<tr>
    <td>'.$row['question'].'</td>
<td>'.$row['choice1'].'</td>
<td>'.$row['choice2'].'</td>
<td>'.$row['choice3'].'</td>
<td>'.$row['choice4'].'</td> 
<td>'.$row['correct'].'</td> 
<td>'.$row['date'].'</td>
<td><a href="delete.php?delque='.$row['date'].'&level='.$tablename.'">Delete</a></td>
  </tr>';
}}
?>	
</tbody>
        </table>
    </div>
    <script>
  window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
    $('#level').val(selItem);
    }
    $('.submit').click(function() { 
        var selVal = $("#level").val();
        sessionStorage.setItem("SelItem", selVal);
    });
</script>
    </div>
<div class="tab-pane text-style" id="tab3">
  <h2>Quiz add</h2>
 <form method="POST" class="quizadding" enctype="multipart/form-data" action="add.php">
    <label for="question">Enter the question:</label><br>
       <textarea cols="10" rows="5" name="question" placeholder="Question" id="question" required></textarea><br>
    <label for="choice1">Choice1:</label>
       <input type="text" placeholder="Choice1" name="choice1" id="choice1"  required /><br>
    <label for="choice2">Choice2:</label>
       <input type="text" placeholder="Choice2" name="choice2" id="choice2" required /><br>
    <label for="choice3">Choice3:</label>
       <input type="text" placeholder="Choice3" name="choice3" id="choice3" required /><br>
    <label for="choice4">Choice4:</label>
       <input type="text" placeholder="Choice4" name="choice4" id="choice4" required /><br>
        <label for="correctanswer">Correct Answer:</label>
        <input type="radio" name="correctanswer" value="A" checked /> A
  <input type="radio" name="correctanswer" value="B" /> B
  <input type="radio" name="correctanswer" value="C" /> C
    <input type="radio" name="correctanswer" value="D" /> D<br>
      <label for="level">Question level:</label>
<select id="level" name="level">
    <option value="Easy" selected>Easy</option>
  <option value="Medium">Medium</option>
  <option value="Hard">Hard</option>
          </select>
    <div id="buttons"><input type="submit" value="Submit" id="submit" name="submit"><input type="reset" value="Reset" id="reset"></div>
    </form>
  <script type="text/javascript">
        $(document).ready(function(){
            $("#submit").click(function(){
                var question=$("#question").val();
                var choice1=$("#choice1").val();
                var choice2=$("#choice2").val();
                var choice3=$("#choice3").val();
                var choice4=$("#choice4").val();
                if((question="") || (choice1="") || (choice2="")||(choice3="") ||(choice4="")){
                    alert("Please fill all the fields");
                    return false;
                }
               
            });
        });
</script>
</div>
<div class="tab-pane  text-style" id="tab4">
  <h2>Memes</h2>
      <div class="table-wrapper">
        <table class="quiztable">
            <thead>
            <tr>
                <th>Username</th>
                <th>Meme</th>
                <th>Time uploaded</th>
               
            </tr></thead>
             <tbody>
<?php 
  $db=mysqli_connect("localhost","root","","quizes");
                 $tablename="";
                 $rowname="";
$query="SELECT * FROM memes ORDER BY timestamp DESC";
    $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
echo '<tr>
    <td>'.$row['username'].'</td>
<td><img src="data:image/jpeg;base64,'.base64_encode($row['meme']).'"/> </td>
<td>'.$row['timestamp'].'</td>
<td><a href="delete.php?delmeme='.$row['timestamp'].'">Delete meme</a></td>
  </tr>';
}
?>	
</tbody>
        </table>
    </div>
</div>
<div class="tab-pane  text-style" id="tab6">
  <h2>Movies</h2>
      <div class="table-wrapper">
        <table class="quiztable">
            <thead>
            <tr>
                <th>Movie Name</th>
                <th>Poster</th>
                <th>Genre</th>
                <th>Time uploaded</th>
               
            </tr></thead>
             <tbody>
<?php 
  $db=mysqli_connect("localhost","root","","quizes");
 
$query="SELECT * FROM movies ORDER BY timestamp DESC";
    $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
echo '<tr>
    <td>'.$row['Movie'].'</td>
<td><img src="data:image/jpeg;base64,'.base64_encode($row['Poster']).'"/> </td>
<td>'.$row['Genre'].'</td>
<td>'.$row['timestamp'].'</td>
<td><a href="delete.php?delmovie='.$row['timestamp'].'">Delete meme</a></td>
  </tr>';
}
?>	
</tbody>
        </table>
    </div>
</div>
<div class="tab-pane  text-style" id="tab8">
  <h2>News</h2>
      <div class="table-wrapper">
        <table class="quiztable">
            <thead>
            <tr>
                <th>Headline</th>
                <th>Poster</th>
                <th>Catagory</th>
                <th>Time uploaded</th>
               
            </tr></thead>
             <tbody>
<?php 
  $db=mysqli_connect("localhost","root","","quizes");
 
$query="SELECT * FROM news ORDER BY timestamp DESC";
    $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
echo '<tr>
    <td>'.$row['headline'].'</td>
<td><img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'" width="20%" height="20%"/> </td>
<td>'.$row['catagory'].'</td>
<td>'.$row['timestamp'].'</td>
<td><a href="delete.php?delnews='.$row['timestamp'].'">Delete news</a></td>
  </tr>';
}
?>	
</tbody>
        </table>
    </div>
</div>
<div class="tab-pane text-style" id="tab9">
        <form method="POST" class="quizadding" enctype="multipart/form-data" action="add.php">
    <label for="headline">Headline:</label><br>
       <textarea cols="10" rows="5" name="headline" placeholder="News Headline" id="question" required></textarea><br>
   <label for="story">News Story:</label><br>
       <textarea name="story" style="height: 100px;" placeholder="News Story" id="question" required></textarea><br>
      <label for="Catagory">News catagory:</label>
<select id="level" name="Catagory">
    <option value="celebrities" selected>Celebrities</option>
  <option value="entertainment">Entertainment</option>
  <option value="science">Science</option>
    <option value="sport">Sport</option>
          </select>
 <label for="story">News Image:</label><br>
      <input type="file" name="image" id="image" required><br>
   <input type="submit" value="Insert" id="insert" name="insert">
    </form>
        <script>
            $(document).ready(function(){
               $('#insert').click(function(){
                   var image_name= $('#image').val();
                   if(image_name=='')
                       {
                           alert("Please Select Image");
                           return false;
                       }
                   else{
                       var extension= $('#image').val().split('.').pop().toLowerCase();
                       if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1)
                           {
                               alert("Invalid image file");
                               $('#image').val('');
                               return false;
                           }
                   }
               }) 
            });
        </script>
    </div>
<div class="tab-pane text-style" id="tab10">
        <form method="POST" class="quizadding" enctype="multipart/form-data" action="add.php">
    <label for="movieName">Movie Name:</label><br>
       <input type="text" name="movieName" placeholder="Movie Name" required><br>
 <label for="Director">Director:</label><br>
       <input type="text" name="director" placeholder="Director" required><br>
   <label for="Catagory">Genre:</label>
<select id="level" name="genre">
    <option value="Comedy" selected>Comedy</option>
  <option value="Romance">Romance</option>
  <option value="Horror">Horror</option>
    <option value="Superhero">Superhero</option>
          </select>
<label for="rating">Rating:</label><br>
       <input type="text" name="rating" placeholder="Rating" required><br>
<label for="runningTime">Running Time:</label><br>
       <input type="text" name="runningTime" placeholder="Running Time" required><br>
<label for="starring">Starring:</label><br>
       <input type="text" name="starring" placeholder="Starring" required><br>
<label for="budget">Budget:</label><br>
       <input type="text" name="budget" placeholder="Budget" required><br>
<label for="Box Office">Box-Office:</label><br>
       <input type="text" name="boxoffice" placeholder="boxoffice" required><br>
 <label for="movieImage">Movie Poster:</label><br>
      <input type="file" name="poster" id="image1" required><br>
 <label for="movreview">Movie Review:</label><br>
       <textarea cols="10" rows="5" name="movreview" placeholder="Movie Review" id="question" required></textarea><br>
   <input type="submit" value="Insert" id="insert1" name="insertMovie">
    </form>
        <script>
            $(document).ready(function(){
               $('#insert1').click(function(){
                   var image_name= $('#image1').val();
                   if(image_name=='')
                       {
                           alert("Please Select Image");
                           return false;
                       }
                   else{
                       var extension= $('#image1').val().split('.').pop().toLowerCase();
                       if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1)
                           {
                               alert("Invalid image file");
                               $('#image1').val('');
                               return false;
                           }
                   }
               }) 
            });
        </script>
    </div>
</div>  
</div>
        </body>
</html>	