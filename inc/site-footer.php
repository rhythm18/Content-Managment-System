<footer class="main-footer" style="margin-top: 10px;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="logo">
              <h6 class="text-white"><img src="img/title-icon copy.jpg" height="40" width="40" style="margin-right: 5px;">Be Technical Blog</h6>
            </div>
            <div class="contact-details">
              <p>Email: <a href="mailto:info@betechnical.in">info@betechnical.in</a></p>
              <ul class="social-menu">
                <li class="list-inline-item"><a href="https://www.facebook.com/betechnical1"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="https://twitter.com/betechnical2"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="https://instagram.com/betechnical1?r=..."><i class="fa fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="https://youtu.be/C_FZED1vTyo"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">Recent Posts
            <div class="latest-posts" style="margin-top: 7px;">

<?php
                                    $sql="select * from articles where status=1 order by art_id desc limit 3";
                                    $rsPop=mysqli_query($conn,$sql);
                                    while ($rowPop=mysqli_fetch_array($rsPop))
                                    {
                                        ?>
              <a href="show-article.php?aid=<?php echo $rowPop['art_id'];?>">
                <div class="post d-flex align-items-center">
                  <div class="image"><img src="uploads/<?php echo $rowPop['pic1'];?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo substr($rowPop['title'],0,50);?></strong><span class="date last-meta"><?php echo $rowPop['post_date'];?></span></div>
                </div></a>

               <?php 
             }
             ?>

              </div>
          </div>
          <div class="col-md-4">Popular Posts
            <div class="latest-posts" style="margin-top: 7px;">

<?php
                                    $sql="select * from articles where status=1 order by views desc limit 3";
                                    $rsPop=mysqli_query($conn,$sql);
                                    while ($rowPop=mysqli_fetch_array($rsPop))
                                    {
                                        ?>
              <a href="show-article.php?aid=<?php echo $rowPop['art_id'];?>">
                <div class="post d-flex align-items-center">
                  <div class="image"><img src="uploads/<?php echo $rowPop['pic1'];?>" alt="..." class="img-fluid"></div>
                  <div class="title"><strong><?php echo substr($rowPop['title'],0,50);?></strong><span class="date last-meta"><?php echo $rowPop['post_date'];?></span></div>
                </div></a>

               <?php 
             }
             ?>

              </div>

          </div>
        </div>

      </div>
      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-12" align="center">
              <p>&copy; 2020. All Rights Reserved | Designed and Developed by : <a href="index.php"> betechnical.in</a></p>
            </div>
                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>