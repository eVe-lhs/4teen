<?php   
$db=mysqli_connect("localhost","root","","quizes");
if(isset($_POST['submit'])){
    $table=$_POST['level'];
    $question=$_POST['question'];
    $choice1=$_POST['choice1'];
    $choice2=$_POST['choice2'];
    $choice3=$_POST['choice3'];
    $choice4=$_POST['choice4'];
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
        echo '<script>alert("Data is inserted to the database");</script>';
    }
    else{
        echo '<script>alert("error");</script>';
    }
}
?>
<html>
    <head> <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="adminpanelstyle.css?version51"/></head>
<body>
<div class="sidebar">
    <ul>
        <li><a href="javascript:void(0)" style="color: white;" class="main">Game Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="gamecorner.php">View Table</a></li>
                <li><a href="quizadd.php">Add to Table</a></li>
            </ul></li>
            <script>
            $(document).ready(function(){
  $(".main").click(function(){
    
      if($(".dropdown").hasClass("active"))
         {$(".dropdown").removeClass("active");}
        else
        {$(".dropdown").addClass("active");}
  });
});
        </script>
        <li><a href="memecorner.php">Meme Corner</a></li>
        <li><a href="newscorner.php">News Corner</a></li>
        <li><a href="reviewcorner.php">Review Corner</a></li></ul></div>
   <form method="POST" class="quizadding" enctype="multipart/form-data">
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

</body>
       
</html>
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
	