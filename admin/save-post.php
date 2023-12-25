<?php
 include "config.php";


 if(isset($_FILES['fileToUpload'])){
    $errors =array();

    $file_name =$_FILES['fileToUpload']['name'];
    $file_size=$_FILES['fileToUpload']['size'];
    $file_tmp=$_FILES['fileToUpload']['tmp_name'];
    $file_type=$_FILES['fileToUpload']['type'];
    $file_ext = explode('.',$file_name);//explode function separate the filename on the basis of dot as in above and  end function separate for eg.jpg //
     $file_ext_1 =end($file_ext);

    $extensions =array("jpeg","jpg","png");
    if(!in_array($file_ext_1, $extensions))
     {
        $error[] = "this extension file not allowed,please choose a JPG or PNG image";
     }
         //i kilobyte =1024byte  and 1MB =1024 kilobyte
        //so to make the user to upload the image less than 2MB..we make the formulta 2mb=1024*1024*2
      if($file_size > 2017512)
      {
        $errors[] ="File size must be 2mb or lower";
      } 

     if(empty($error) ==true)
     {
        move_uploaded_file($file_tmp,"upload/" .$file_name);
     }
     else{
        print_r($errors);
        die();
     }


 }
    session_start();
    $title =$_POST['post_title'];
    $description =$_POST['postdesc'];
    $category =$_POST['category'];
    $date =date("d M, Y");
    $author =$_SESSION['user_id'];
    
   //  $sql ="INSERT INTO post(title,description,category,post_date,author,post_img) VALUES ('$title', '$description', '$category', '$date','$author','$file_name');";
   //  $sql .= "UPDATE category SET post = post +1 WHERE category_id = '$category'";
   //   echo "<pre>";
   //    echo print_r($sql);
   //   echo "</pre>";
   //  if(mysqli_multi_query($conn, $sql)){
   //      header("location: http://localhost/news_website/admin/post.php");
   //  }
   //  else{
   //      echo"queryfailed";
   //  }

       $sql_insert = "INSERT INTO post(title, description, category, post_date, author, post_img) VALUES ('$title', '$description', '$category', '$date','$author','$file_name')";

       $sql_update = "UPDATE category SET post = post + 1 WHERE category_id = '$category'";

       if (mysqli_query($conn, $sql_insert) && mysqli_query($conn, $sql_update)) {
                header("location: http://localhost/news_website/admin/post.php");
        } 
        else {
             echo "Query failed: " . mysqli_error($conn);
         }
  
?>