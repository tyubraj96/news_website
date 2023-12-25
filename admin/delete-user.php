<?php
if(!$_SESSION["user_role"] == 1){
   header("location: http://localhost/news_website/admin/post.php");
}
   include "config.php";
   $userid =$_GET['userid'];
   $sql ="DELETE  FROM user WHERE user_id =$userid";
   $result =mysqli_query($conn,$sql);
   if($result){
    header("location: http://localhost/news_website/admin/users.php");
   }
?>