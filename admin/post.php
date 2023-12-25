<?php include "header.php"; 
include "config.php";
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        $sql ="SELECT * FROM post ORDER BY post_id DESC";
                        $result= mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0){
                           while($row = mysqli_fetch_assoc($result)){
                            
                        ?>
                          <tr>
                              <td class='id'><?php echo $row['post_id']; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td>
                                <?php 
                                if( $row['category']){
                                    $id1=$row['category'];
                                    $sql1 ="SELECT * FROM category where category_id=$id1";
                                    $result1= mysqli_query($conn,$sql1);
                                    $row1= mysqli_fetch_assoc($result1);
                                    echo $row1['category_name'];
                                } 
                                ?>
                            </td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td>
                              <?php 
                              if( $row['author'])
                              {
                                $id2= $row['author'];
                                $sql2 ="SELECT * FROM user where user_id = $id2";
                                $result2= mysqli_query($conn,$sql2);
                                $row2= mysqli_fetch_assoc($result2);
                                // if($row2['role'] ==1){
                                //     echo "Admin";
                                // }
                                // else{
                                //     echo "Normal user";
                                // }
                                echo $row2['username'];
                              

                              ?>
                              </td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>&catid=<?php echo $row1['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                        
                          
                      </tbody>
                  </table>
                
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
