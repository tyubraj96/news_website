<?php

include "config.php";

if(empty($_FILES['new-image'])){
   $file_name =$_POST['old-image'];      
}
else
{
         $errors =array();

         $file_name =$_FILES['new-image']['name'];
         $file_size=$_FILES['new-image']['size'];
         $file_tmp=$_FILES['new-image']['tmp_name'];
         $file_type=$_FILES['new-image']['type'];
         $file_ext_parts = explode('.', $file_name);
         $file_ext = end($file_ext_parts);
          $desc = addslashes($_POST['postdesc']);
         // $file_ext = end(explode('.',$file_name));//explode function separate the filename on the basis of dot as in above and  end function separate for eg.jpg //
     
     
         $extensions =array("jpeg","jpg","png");
         if(in_array($file_ext, $extensions)=== false)
          {
             $errors[] = "this extension file not allowed,please choose a JPG or PNG image";
          }
              //i kilobyte =1024byte  and 1MB =1024 kilobyte
             //so to make the user to upload the image less than 2MB..we make the formulta 2mb=1024*1024*2
           if($file_size > 2017512)
           {
             $errors[] ="File size must be 2mb or lower";
           } 
     
          if(empty($errors) ==true)
          {
             move_uploaded_file($file_tmp,"upload/" .$file_name);
          }
          else{
             print_r($errors);
             die();
          }    
}
           $sql = "UPDATE post set title='$_POST[post_title]',description='$desc ',category=$_POST[category],post_img='$file_name' where post_id=$_POST[post_id]";
           $result = mysqli_query($conn,$sql);
           if($result){
                  header("location: http://localhost/news_website/admin/post.php");
           }
           else{
                  echo "query failed";
           }

?>