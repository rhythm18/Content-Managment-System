 <div class="add-comment">
                  <header>
                    <h3 class="h6">Leave a reply</h3>
                  </header>
                         <?php 
                                        if (isset($_POST['submit'])) {
                                            $name=mysqli_real_escape_string($conn,$_POST['name']);
                                            $email=mysqli_real_escape_string($conn,$_POST['email']);
                                            $cmt=mysqli_real_escape_string($conn,$_POST['cmt']);
                                            $dt=date("Y-m-d");
                                            $sql="insert into comments (art_id,name,email,comment,cmt_date) 
                                                values ('$id','$name','$email','$cmt','$dt')";
                                                echo $sql;
                                            if (mysqli_query($conn,$sql)) {
                                                echo "Comment added successfully";
                                                $url="show-article.php?cmt=s&aid=".$id;
                                                gotopage($url);
                                            }
                                            else {
                                                echo "Sorry there was a problem";
                                                $url="show-article.php?cmt=f&aid=".$id;
                                                gotopage($url);
                                            }
                                            
                                        }
                                        ?>
                                        <?php 
  if (isset($_GET['cmt']) && $_GET['cmt']=="s") {
     echo "<div class='alert alert-success bm-2'>Comment Added Successfully</div>";
  }
if(isset($_GET['cmt']) && $_GET['cmt']=="f") {
echo "<div class='alert alert-danger bm-2'>Sorry there was a problem in adding your comment</div>";
}
?>
                  <form action="" method="post" class="commenting-form">
                    <div class="row">
                      <div class="form-group col-md-6">

                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" name="email" id="email" placeholder="Email Address" class="form-control">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea name="cmt" id="cmt" placeholder="Type your Comment" class="form-control"></textarea>
                      </div>
                      <div class="form-group col-md-12">
                        <button type="submit" name="submit" id="submit" class="btn btn-secondary">Submit Comment</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>