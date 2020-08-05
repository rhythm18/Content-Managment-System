<section class="featured-posts no-padding-top" style="margin-top: 10px;">
      <div class="container">
        <!-- Post-->
       

<?php 
$str="";
if (isset($_GET['id'])) {
    $str1=" and cat_id=".$_GET['id'];
}

if (isset($_GET['uid'])) {
    $str1=" and user_id=".$_GET['uid'];
}
$userId=$_GET['uid'];



//$sql="select * from articles where status=1 ".$str1." order by art_id desc limit 4";
$sql="SELECT * FROM articles WHERE status=1 ".$str1." ORDER BY RAND ( ) LIMIT 4";

$rsArt=mysqli_query($conn,$sql);

$i=1;

while ($rowArt=mysqli_fetch_array($rsArt))
{
$str=substr($rowArt['details'],0,600);

    if($rowArt['user_id']==0)
        {
            $sql="select name from admin where admin_id=1";
            $author=ReturnAnyValue($conn,$sql);

        }
    else
        {
            $sql="select first_name from users where user_id=".$rowArt['user_id'];
            $author=ReturnAnyValue($conn,$sql);

        }
        $sql="select cat_name from category where cat_id=".$rowArt['cat_id'];
        $catName=ReturnAnyValue($conn,$sql);
?>

 <div class="row d-flex align-items-stretch">
  <?php

  if($i%2==0)
  {
    ?>
            <div class="image col-lg-5"><img src="uploads/<?php echo $rowArt['pic1'];?>" alt="..."></div>

          <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">

                  <div class="category"><a href="#"><?php echo $catName;?></a></div>
                  <a href="show-article.php?aid=<?php echo $rowArt['art_id'];?>">
                    <h2 class="h4"><?php echo $rowArt['title'];?></h2></a>
                </header>
                <p><?php echo $str;?></p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"></div>
                    <div class="title"><span>By <?php echo $author;?></span></div></a>
                  <div class="date"><i class="icon-clock"></i><?php echo $rowArt['post_date'];?></div>
                </footer>
              </div>
            </div>
          </div>
        </div>
<?php
}
else
{
  ?>
   <div class="row d-flex align-items-stretch">
    <div class="text col-lg-7">
            <div class="text-inner d-flex align-items-center">
              <div class="content">
                <header class="post-header">

                  <div class="category"><a href="#"><?php echo $catName;?></a></div>
                  <a href="show-article.php?aid=<?php echo $rowArt['art_id'];?>">
                    <h2 class="h4"><?php echo $rowArt['title'];?></h2></a>
                </header>
                <p><?php echo $str;?></p>
                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"></div>
                    <div class="title"><span>By <?php echo $author;?></span></div></a>
                  <div class="date"><i class="icon-clock"></i><?php echo $rowArt['post_date'];?></div>
                </footer>
              </div>
            </div>
          </div>
          <div class="image col-lg-5"><img src="uploads/<?php echo $rowArt['pic1'];?>" height="200" width="700" alt="..."></div>
        </div>
<?php

}
 $i=$i+1;
  }
  ?>






       
      </div>
    </section>