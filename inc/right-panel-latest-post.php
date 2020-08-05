<div class="widget latest-posts">
            <header>
              <h3 class="h6">Latest Posts</h3>
            </header>

            <div class="blog-posts">

<?php 
      
      $sql="select * from articles where status=1 order by art_id desc limit 5";
      $rsRcnt=mysqli_query($conn,$sql);
      while($rowRcnt=mysqli_fetch_array($rsRcnt))
      {
          ?>
              <a href="show-article.php?aid=<?php echo $rowRcnt['art_id'];?>">
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="uploads/<?php echo $rowRcnt['pic1'];?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo $rowRcnt['title'];?></strong>
                    <div class="d-flex align-items-center">
                      <div class="views"><i class="icon-eye"></i><?php echo $rowRcnt['views'];?></div>
                      <div class="comments"><?php echo $rowArt['post_date'];?></div>
                    </div>
                  </div>

                </div>
              </a>
<?php
}
?>
                

              </div>
          </div>