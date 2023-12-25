<?php include 'header.php';
$id = $_GET['postid']; 
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <?php
                         include "config.php";
                         $sql ="SELECT * FROM post where post_id =$id";
                       $result= mysqli_query($conn,$sql);
                       if(mysqli_num_rows($result) > 0)
                        {
                          while($row = mysqli_fetch_assoc($result))
                          {
                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php
                                    if( $row['category']){
                                        $id1=$row['category'];
                                        $sql1 ="SELECT * FROM category where category_id=$id1";
                                        $result1= mysqli_query($conn,$sql1);
                                        $row1= mysqli_fetch_assoc($result1);
                                        echo $row1['category_name'];
                                    } 
                                    ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo $row['author'];?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date'];?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img'];?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description'];?> 
                            </p>
                        </div>
                        <?php
                          }
                        }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
