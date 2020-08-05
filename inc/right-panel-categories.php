<div class="widget categories">
            <header>
              <h3 class="h6">Categories</h3>
            </header>

            <?php 
        
        $sql="select * from category";
        $rs=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_array($rs))
         {
         	$c_id=$row['cat_id'];
         	$sql="select count(*) from articles where status=1 and cat_id='$c_id'";
            $cnt=ReturnAnyValue($conn,$sql);

         	?>
          
            <div class="item d-flex justify-content-between"><a href="index.php?id=<?php echo $c_id;?>"><?php echo $row['cat_name']; ?></a><span><?php echo $cnt;?></span></div>

            <?php
        }
        ?>
            
          </div>