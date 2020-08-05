<div class="post-comments">
                  

                  <?php
$sql="select * from comments where cmt_status=1 and art_id='$id'";
                            $rsCmt=mysqli_query($conn,$sql);
                            $cntCmt=mysqli_num_rows($rsCmt);
                            
$sql="select user_id from articles where art_id='$id'";
$userID=ReturnAnyValue($conn,$sql);

?>
<header>
<h3 class="h6">Post Comments<span class="no-of-comments">(<?php echo $cntCmt;?>)</span></h3>
</header>

 <?php
                            
                            while ($rowCmt=mysqli_fetch_array($rsCmt))
                            {

                            ?>
                  <div class="comment">
                    <div class="comment-header d-flex justify-content-between">
                      <div class="user d-flex align-items-center">
                        <div class="image"></div>
                        <div class="title"><strong><?php echo $rowCmt['name'];?></strong><span class="date"><?php echo $rowCmt['cmt_date'];?></span></div>
                      </div>
                    </div>
                    <div class="comment-body">
                      <p><?php echo $rowCmt['comment'];?></p>
                       <?php
                                                    if ($rowCmt['reply']!=null) 
                                                    {
                                                    ?>
                                                        <?php 
                                                        if($userID==0) echo $repliedBy="Admin";
                                                        else
                                                        {
                                                            $sql="select first_name from users where user_id=".$userID;
                                                            
                                                            $repliedBy=ReturnAnyValue($conn,$sql);
                                                        }
                                                        ?>

                                                    <div class=""><b><?php echo $repliedBy;?></b><br>
                                                        <p><?php echo $rowCmt['reply'];?></p>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                    </div>
                  </div>
                  <?php
                                }
                                ?>
                  
                </div>