<?php
include "config.php";
$post_id = $_GET['id'];
$cat_id =$_GET['catid'];

$sql="SELECT * from post where post_id = $post_id";
$result = mysqli_query($conn,$sql);
$row =mysqli_fetch_assoc($result);

unlink("upload/".$row['post_img']);//delete file from folder upload

$sql1="DELETE  FROM post where post_id = $post_id";
$sql2="UPDATE category set post = post-1 where category_id = $cat_id";
if(mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2)){
         
         header("location: http://localhost/news_website/admin/post.php");
}
else
echo "query failed";
die();
?>