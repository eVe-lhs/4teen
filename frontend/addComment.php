<?php 
                                     
$db=mysqli_connect("localhost","root","","quizes");
                                        if(isset($_POST['comment'])){
                                        $comment=str_replace("'","''",$_POST['message']);
                                        $id=$_GET['id'];
                                        $name=$_GET['name'];
                                        $sql="INSERT into newscomments(post_id,comment,user,timestamp) VALUES ($id,'$comment','$name',NOW())";
                                          if(mysqli_query($db,$sql))
                                        {
                                    echo '<script>alert("Comment added")</script>';
                                   header("location:newsdetailLoggedIn.php?id=".$id."");
                                          
                                        }
                                    else{
                                       echo("Error adding comment: " . mysqli_error($db));
                                        }
                                    } 
if(isset($_POST['commentMov'])){
                                        $comment=str_replace("'","''",$_POST['message']);
                                        $id=$_GET['id'];
                                        $name=$_GET['name'];
                                        $sql="INSERT into moviecomments(post_id,comment,user,timestamp) VALUES ($id,'$comment','$name',NOW())";
                                          if(mysqli_query($db,$sql))
                                        {
                                    echo '<script>alert("Comment added")</script>';
                                   header("location:moviedetailLoggedIn.php?id=".$id."");
                                          
                                        }
                                    else{
                                       echo("Error adding comment: " . mysqli_error($db));
                                        }
                                    } 
if(isset($_POST['meme'])){
                                 $imagetmp=addslashes (file_get_contents($_FILES['meme']['tmp_name'])); 
                                        $comment=str_replace("'","''",$_POST['story']);
                                        $name=$_GET['name'];
                                        $sql="INSERT into memes(meme,caption,timestamp,username) VALUES ('$imagetmp','$comment',NOW(),'$name')";
                                          if(mysqli_query($db,$sql))
                                        {
                                    echo '<script>alert("Comment added")</script>';
                                   header("location:memeLoggedIn.php");
                                          
                                        }
                                    else{
                                       echo("Error adding comment: " . mysqli_error($db));
                                        }
                                    } 
                            mysqli_close($db);?>