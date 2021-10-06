<?php 
  $db=mysqli_connect("localhost","root","","tutorial");
$query="SELECT * FROM contents ORDER BY id DESC";
    $result=mysqli_query($db,$query);
while($row=mysqli_fetch_array($result)){
    echo '
    <tr>
        <td>
        <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200px" height="200px"/>
        <p>' .$row['text'].'</p>
        </td>
    </tr>';
}
?>
