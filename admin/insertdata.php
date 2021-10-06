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