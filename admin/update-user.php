<?php include "header.php";
include "config.php";
if(!$_SESSION["user_role"] == 1){
    header("location: http://localhost/news_website/admin/post.php");
}
$user_id = $_GET['userid'];
if(isset($_POST['submit']))
{
    // $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
    $firstname =mysqli_real_escape_string($conn,$_POST['f_name']);
    $lastname =mysqli_real_escape_string($conn,$_POST['l_name']);
    $username =mysqli_real_escape_string($conn,$_POST['username']);
    $role =mysqli_real_escape_string($conn,$_POST['role']);
     $sqlupdate ="UPDATE user set  first_name ='$firstname',last_name='$lastname',username='$username', role='$role' where user_id=$user_id";
     $resultupdate= mysqli_query($conn,$sqlupdate);
     if($resultupdate){
        header("location: http://localhost/news_website/admin/users.php");
     }
    //  echo "<pre>";
    //  print_r($sqlupdate);
    // echo "</pre>";
}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
<?php 
            $sql ="SELECT * FROM user where user_id=$user_id";
            $result =mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0)
            {

                while($row = mysqli_fetch_assoc($result)){
?>


<div class="col-md-offset-4 col-md-4">
    <!-- Form Start -->
    <form  action="" method ="POST">
        <div class="form-group">
            <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
        </div>
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php    echo $row['first_name']; ?>" placeholder="" required>
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control" value="<?php  echo $row['username']; ?>" placeholder="" required>
        </div>
        <div class="form-group">
    <label>User Role</label>
    <select class="form-control" name="role">
        <option value="0"<?php if ($row['role'] == 0) echo " selected"; ?>>Normal User</option>
        <option value="1"<?php if ($row['role'] == 1) echo " selected"; ?>>Admin</option>
    </select>
</div>
    <?php } 
        
    }
    ?>
        <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
    </form>
    <!-- /Form -->
</div>
</div>
</div>
</div>
<?php include "footer.php"; ?>
