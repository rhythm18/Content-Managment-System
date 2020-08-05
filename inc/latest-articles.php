 <section class="latest-posts"> 
      <div class="container">
        <header> 
          <h2>Latest from Be Technical</h2>
          <p class="text-big">All this modern technology just makes people try to do everything at once.</p>
        </header>
        <?php 
$str="";
if (isset($_GET['id'])) {
    $str1=" and cat_id=".$_GET['id'];
}

if (isset($_GET['uid'])) {
    $str1=" and user_id=".$_GET['uid'];
}
$userId=$_GET['uid'];



$sql="select * from articles where status=1 ".$str1." order by art_id desc limit 9";
$rsArt=mysqli_query($conn,$sql);

$i=1;

while ($rowArt=mysqli_fetch_array($rsArt))
{
$str=substr($rowArt['details'],0,400);

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

        if($i==1 || $i==4 || $i==7 || $i==10)
        {
?>

        <div class="row">
        <?php
        }
      ?>
          <div class="post col-md-4">
            <div class="post-thumbnail"><a href="#"><img src="uploads/<?php echo $rowArt['pic1'];?>" style="height: 200px;" alt="..." class="img-fluid"></a></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="category"><a href="#"><?php echo $catName;?></a>
              </div>
                <div class="date"><?php echo $rowArt['post_date']." By "; echo $author;?>
                <a href="show-article.php?aid=<?php echo $rowArt['art_id'];?>"></div></div>
                <h3 class="h4"><?php echo $rowArt['title'];?></h3></a>
              <p class="text-muted"><?php echo $str;?></p>
            </div>
          </div>
<?php
          if($i==3 || $i==6 || $i==9 || $i==12)
        {
?>
        </div>
<?php
        }
        $i=$i+1;

}
?>

      </div>
    </section>