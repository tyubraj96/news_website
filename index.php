<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                        <?php
                          include "config.php";
                          $sql ="SELECT * FROM post ";
                        $result= mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0)
                         {
                           while($row = mysqli_fetch_assoc($result))
                           {
                            if( $row['category']){
                                $id1=$row['category'];
                                $sql1 ="SELECT * FROM category where category_id=$id1";
                                $result1= mysqli_query($conn,$sql1);
                                $row1= mysqli_fetch_assoc($result1);
                            }
                            
                        ?>
                        
                        
                        
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?postid=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img'];?>" alt="" srcset=""></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?postid=<?php echo $row['post_id']; ?>'><?php echo $row['title'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?id=<?php echo $row1['category_id'] ?>'>
                                                    <?php
                                                    // if( $row['category']){
                                                    //     $id1=$row['category'];
                                                    //     $sql1 ="SELECT * FROM category where category_id=$id1";
                                                    //     $result1= mysqli_query($conn,$sql1);
                                                    //     $row1= mysqli_fetch_assoc($result1);
                                                        echo $row1['category_name'];
                                                    // } 
                                                    ?>
                                                </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?authorid=<?php echo $row['author']?>'>
                                                    <?php
                                                    if($row['author']){
                                                        $id2= $row['author'];
                                                        $sql2 ="SELECT * FROM user where user_id = $id2";
                                                        $result2= mysqli_query($conn,$sql2);
                                                        $row2= mysqli_fetch_assoc($result2);
                                                        
                                                        echo $row2['username'];
                                                    }
                                                    ?>
                                                </a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php  echo $row['post_date'];?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['description'],0,100)."......"?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?postid=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                           }
                        }
                        ?>
                        
                        <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
