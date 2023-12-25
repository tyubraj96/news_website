<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
    <?php
                          include "config.php";
                          $limit =3;
                          $sql ="SELECT * FROM post order by post_id desc limit  $limit";
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
                        
                        
        <h4>Recent Posts</h4>
        <div class="recent-post">
           
            <a class="post-img" href="single.php?postid=<?php echo $row['post_id']; ?>">
               <img src="admin/upload/<?php echo $row['post_img'];?>" alt="" srcset="">
            </a>
            <div class="post-content">
                <h5><a href='single.php?postid=<?php echo $row['post_id']; ?>'><?php echo $row['title'];?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?id=<?php echo $row1['category_id'] ?>'> <?php echo $row1['category_name'];?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php  echo $row['post_date'];?>
                </span>
                <a class='read-more pull-right' href='single.php?postid=<?php echo $row['post_id']; ?>'>read more</a>
            </div>
        </div>
       <?php
                           }
                        }
         ?>       
        
        
    </div>
    <!-- /recent posts box -->
</div>
