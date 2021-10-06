<html>
    <head> <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="adminpanelstyle.css?version51"/></head>
<body>
<div class="sidebar">
    <ul>
        <li><a href="javascript:void(0)" style="color: white;" onClick="expend(this)">Quiz Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="gamecorner.php">View Table</a></li>
                <li><a href="quizadd.php">Add to Table</a></li>
            </ul></li>
        <li onClick="expend(this)"><a href="javascript:void(0)" style="color: white;">Meme Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="memecorner.php">View Table</a></li>
                <li><a href="memeEdit.php">Add to Table</a></li>
            </ul></li>
        <li><a href="javascript:void(0)" style="color: white;" onClick="expend(this)" >Review Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="reviewcorner.php">View Table</a></li>
                <li><a href="reviewEdit.php">Add to Table</a></li>
            </ul></li>
        <li><a href="javascript:void(0)" style="color: white;" onClick="expend(this)" >News Corner<span> ▼</span></a>
            <ul class="dropdown">
                <li><a href="newscorner.php">View Table</a></li>
                <li><a href="addnews.php">Add to Table</a></li>
            </ul></div>
       <script>
           
            function expend(x)
                {
                    if(x.find("ul").hasClass('active'))
                        {x.find("ul").removeClass('active');}
                    else
                       x.find("ul").addClass('active');
                    }
            ;
        </script>
    <form class="tablename" method="POST" enctype="multipart/form-data"> 
<select id="level" name="level" class="level">
    <option value="Easy">Easy</option>
  <option value="Medium">Medium</option>
  <option value="Hard">Hard</option>
    <input type="submit" name="submit" class="submit" value="Submit">
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
if(isset($_POST['submit'])){
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
<td><a href="gamecorner.php?del='.$row['date'].';">Delete</a></td>

  </tr>';
}

if(isset($_GET['del'])) {
    $table=$_POST['level'];
    $delete_id = mysqli_real_escape_string($db,$_GET['del']);
    $sql = mysqli_query($db,"DELETE FROM ".$table." WHERE date = '".$delete_id."'");
    if($sql) {
        echo '<script>alert("DELETED SUCCESSFULLY");</script>';
    } else {
        echo "ERROR";
    }
}
}
?>	
</tbody>
        </table>
    </div>

</body>   
</html>
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
