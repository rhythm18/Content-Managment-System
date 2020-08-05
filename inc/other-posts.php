 


 <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row">
                    
 <?php

        $id=$_GET['aid'];

        $sql="select * from articles where art_id<$id and status=1 ORDER by articles.art_id DESC LIMIT 1";
        $prev=mysqli_query($conn,$sql);
        while($prevRow=mysqli_fetch_array($prev))
{
        ?>
                   <a href="/show-article.php?aid=<? echo $prevRow['art_id'];?>" class="prev-post text-left d-flex align-items-center"> <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                    <div class="text"><strong class="text-primary">Previous Post </strong>
                      <h6><?php echo $prevRow['title'];?></h6>
                    </div></a>

<?php
}

$sql="select * from articles where art_id>$id and status=1 ORDER by articles.art_id DESC LIMIT 1
";
 $next=mysqli_query($conn,$sql);
        while($nextRow=mysqli_fetch_array($next))
{
?>



                <a href="/show-article.php?aid=<? echo $nextRow['art_id'];?>" class="next-post text-right d-flex align-items-center justify-content-end">
                    <div class="text"><strong class="text-primary">Next Post </strong>
                      <h6><?php echo $nextRow['title'];?></h6>
                    </div>
                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a>
<?php
}
?>



     </div>