<?php
include "config.php";
$page_title="";
$page = basename($_SERVER['PHP_SELF']);
switch($page){
    case "single.php";
    if(isset($_GET['postid'])){
         $id1=$_GET['postid'];
        $sql_title="SELECT * from post where post_id=$id1";
        $result_title = mysqli_query($conn,$sql_title) or die("query failed");
        $row_title =mysqli_fetch_assoc($result_title);
        $page_title =$row_title['title'];

    }
    else{
        $page_title  ="no post found";
    }
   
    break;
    case "category.php";
    if(isset($_GET['id'])){
        $id2 =$_GET['id'];
       $sql_title="SELECT * from category where category_id=$id2";
       $result_title = mysqli_query($conn,$sql_title) or die("query failed");
       $row_title =mysqli_fetch_assoc($result_title);
    //    $page_title =$row_title['title'];
       if ($row_title) {
        $page_title = $row_title['category_name'];
    } else {
        $page_title = "no post found";
    }

   }
   else{
       $page_title  ="no post found";
   }
    break;
    case "author.php";
    if(isset($_GET['authorid'])){
        $id=$_GET['authorid'];
       $sql_title="SELECT * from user where user_id=$id";
       $result_title = mysqli_query($conn,$sql_title) or die("query failed");
       $row_title =mysqli_fetch_assoc($result_title);
       $page_title =$row_title['first_name']." ".$row_title['last_name'];

   }
   else{
       $page_title  ="no post found";
   }
    break; 
    case "search.php";
    if(isset($_GET['search'])){
        
       $page_title =$_GET['search'];

   }
   else{
       $page_title  ="no search found";
   }
    break;
    default :
    $page_title="news_site";
  
    break;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <li><a href="index.php" class="">Home</a></li>
                    <?php
                    include "config.php";
                    $sql="SELECT * FROM category where post > 0";
                    $result=mysqli_query($conn,$sql) or die("query failed : Category");
                    if(mysqli_num_rows($result) > 0){
                        while($row=mysqli_fetch_assoc($result))
                        {
                     ?>
                   
                    <li><a href='category.php?id=<?php echo $row['category_id']?>'><?php echo $row['category_name'];?></a></li>
                    <?php
                     }
                    }
                    ?>
                    </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
