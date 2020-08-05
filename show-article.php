<?php session_start();
 include ("inc/connect.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Be Technical</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="images/title-icon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script data-ad-client="ca-pub-9133869815485125" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  </head>
  <?php 

$cnt=0;
if(isset($_SESSION['user_id']))
{
$sql="select count(*) from user_points where pt_type='1' and user_id=".$_SESSION['user_id']." and art_id=".$_GET['aid'];
$cnt=ReturnAnyValue($conn,$sql);
}
    if($cnt==0)
    {
?>
<body onload=funtime();>
    <?php
    }
    else
    {
        ?>
        <body onload=hideButton()>
            <?php
    }
    ?>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">
        <div class="search-area">
          <div class="search-area-inner d-flex align-items-center justify-content-center">
            <div class="close-btn"><i class="icon-close"></i></div>
            <div class="row d-flex justify-content-center">
              <div class="col-md-8">
                <form action="#">
                  <div class="form-group">
                    <input type="search" name="search" id="search" placeholder="What are you looking for?">
                    <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><img src="img/title-icon copy.jpg" height="40" width="40" style="margin-right: 5px;"><a href="index.php" class="navbar-brand">Be Technical</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="index.php" class="nav-link ">Home</a>
              </li>
             <!-- <li class="nav-item"><a href="blog.html" class="nav-link ">Blogs</a>
              </li>-->

               <?php 
                              
                        $sql="select * from category where cat_on_top=1";
                            $rs1=mysqli_query($conn,$sql);
                            
                            while ($row1=mysqli_fetch_array($rs1))
                            {
                               
                                 $cid=$row1['cat_id'];
                                 $cname=$row1['cat_name'];
                                 echo "<li class='nav-item'>";
                                 echo  "<a class='nav-link' href=index.php?id=$cid>$cname</a>";
                                 echo "</li>";
                            
                            }

                            if(isset($_SESSION['user_id']))
                            {
                              ?>
                              <li class="nav-item">
                                <a class="nav-link" href="user/dashboard.php"><b>Dashboard</b></a>
                            </li>
                                    <li class="nav-item">
                                <a class="nav-link" href="user/logout.php"><b>Logout</b></a>
                            </li>
                              <?php
                            }
                          else
                          {
                        ?>
                            
                            <li class="nav-item">
                                <a class="nav-link hover" href="user/user_login.php"><b>Login</b></a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link color-grey-hover" href="" data-toggle="modal" data-target="#myModal"><b>Register</b></a>
                          <?php
                          }
                      ?>

                      <!-- The Modal -->

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Write with us...</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
 
  <div class="container">

          <!--Grid row-->
          <div class="row">
        
            <!--Grid column-->
            <div class="col-md-12">
        
              <!--Title--><?php

              if (isset($_GET['refid']))
              {
                  $spid=$_GET['refid'];
              }
             else
             {
                  $spid="";
             }
                          ?>
              
        
              <!--Section: Live preview-->
              <section style="padding: 0px;">
        
                <!-- Default form register -->
                <form method="post" action="reg.php" class="text-center border border-light p-5">
        
        
                  <div class="form-row mb-4">
                    <div class="col">
                      <!-- First name -->
                       <input type="text" name="refid" id="refid" class="form-control mb-4" style="width: 335px;
" placeholder="Refered By (Optional)" value="<?php echo $spid;?>">
                      <input type="text" name="first_name" id="first_name" class="form-control mb-4" placeholder="First name"  required="">
                    </div>
                    <div class="col">
                      <!-- Last name -->
                      <input type="text" name="last_name" id="last_name" class="form-control mb-4" placeholder="Last name" required="">

                      <input type="text" name="city" id="city" class="form-control mb-4" placeholder="City" required="">

                      <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Phone number (Optional)" aria-describedby="defaultRegisterFormPhoneHelpBlock">

                      <input type="text" name="paytm" id="paytm" class="form-control" style="margin-top: 25px;" placeholder="Paytm number (Optional)" aria-describedby="defaultRegisterFormPhoneHelpBlock">

                        <input type="email" name="email" id="email" class="form-control mb-4" style="margin-top: 25px;" placeholder="E-mail" required="">
                        <input type="password" name="user_pass" id="user_pass" class="form-control mb-4" placeholder="Password" required="">
                        <input type="password" name="c_user_pass" id="c_user_pass" class="form-control mb-4" placeholder="Confirm Password" required="">

                  <!-- Password -->
                  
                  <small class="form-text text-muted mb-4">
                    At least 8 characters and 1 digit
                  </small>
                    </div>
                  </div>
        
                  <!-- E-mail -->
                
        
                  
                 
                  <!-- Sign up button -->
                  <button class="btn btn-info my-4 btn-block waves-effect waves-light" name="submit" type="submit">Sign up</button>
        
                  <hr>
        
                 </form>
               </section>

            </ul>
          </div>
        </div>
      </nav>
    </header>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
         <?php 
        $id=$_GET['aid'];
        $sql="select * from articles where art_id='$id'";
        $rsArt=mysqli_query($conn,$sql);
        $rowArt=mysqli_fetch_array($rsArt);
        $sql="select cat_name from category where cat_id=".$rowArt['cat_id'];
        $catName=ReturnAnyValue($conn,$sql);
        $sql="select first_name from users where user_id=".$rowArt['user_id'];
        $uName=ReturnAnyValue($conn,$sql);

        if($rowArt['user_id']==0)
        {
            $sql="select name from admin where admin_id=1";
            $uName=ReturnAnyValue($conn,$sql);
        }
        
        $sql="update articles set views=views+1 where art_id='$id'";
        mysqli_query($conn,$sql);
?>

        <main class="post blog-post col-lg-8"> 
          <div class="container">
            <div class="post-single">
              <div class="category"><a href="#"></a><a href="#"><?php echo $catName;?></a></div>
              <h1><?php echo $rowArt['title'];?><a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
              <div class="avatar"></div>
                    <div class="title"><span>By <?php echo $uName;?></span></div></a>
                  <div class="d-flex align-items-center flex-wrap">       
                    <div class="date"><i class="icon-clock"></i> <?php echo $rowArt['post_date'];?></div>
                    <div class="views"><i class="icon-eye"></i> <?php echo $rowArt['views'];?></div>
                  </div></div>

                                      

                                        <a href="https://twitter.com/share?url=betechnical.in/show-article.php?aid=<?php echo $id;?> &amp;text=<?php echo $rowArt['title'];?>&amp;hashtags=<?php echo $rowArt['tags'];?>" target="_blank"><img src="images/twitter.png" height="35" width="35"></a>
                                    
                                    <a href="http://www.facebook.com/share.php?u=betechnical.in/show-article.php?aid=<?php echo$id;?>" target="_blank"><img src="images/facebook.jpeg" height="35" width="35"></a>

                                     <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"  title="Linkedin"><img src="images/linkedin.jpeg" height="35" width="35"></a>

                                    <a href="https://web.whatsapp.com/send?text=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"><img src="images/whatsapp.jpeg" height="35" width="35"></a>

                               

              <div class="post-thumbnail"><img src="uploads/<?php echo $rowArt['pic1'];?>" style="margin-top: 25px;" alt="..." class="img-fluid"></div>
              <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                </div>
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                    <div class="avatar"></div>
                  <div class="d-flex align-items-center flex-wrap">       
                  </div>
                </div>
                <div class="post-body">
                  
                  <p><?php echo $rowArt['details'];?></p>

                  <?php
                                        if($cnt==0)
                                            {
                                                ?>
                                    <div id="myDIV"><a href="getpt.php?aid=<?php echo $id;?>">
                                      <!--<button type="button" class="btn btn-primary">Get Points</button></div>-->

                                            <?php
                                            }
                                        ?>
                  </div>

                <div class="post-tags"><a href="#" class="tag">#<?php echo $rowArt['tags'];?></a></div>


 
                                        <a href="https://twitter.com/share?url=betechnical.in/show-article.php?aid=<?php echo $id;?> &amp;text=<?php echo $rowArt['title'];?>&amp;hashtags=<?php echo $rowArt['tags'];?>" target="_blank"><img src="images/twitter.png" height="35" width="35"></a>
                                    
                                    <a href="http://www.facebook.com/share.php?u=betechnical.in/show-article.php?aid=<?php echo$id;?>" target="_blank"><img src="images/facebook.jpeg" height="35" width="35"></a>

                                     <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"  title="Linkedin"><img src="images/linkedin.jpeg" height="35" width="35"></a>

                                    <a href="https://web.whatsapp.com/send?text=betechnical.in/show-article.php?aid=<?php echo $id;?>" target="_blank"><img src="images/whatsapp.jpeg" height="35" width="35"></a>

                                

               <?php include("inc/other-posts.php");?>

               <?php include("inc/show-comments.php");?>

                <?php include("inc/submit-comment.php");?>
                
               
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
         
          <!-- Widget [Latest Posts Widget]        -->
          <?php include("inc/right-panel-latest-post.php");?>
          <!-- Widget [Categories Widget]-->
          <?php include("inc/right-panel-categories.php");?>
          <!-- Widget [Tags Cloud Widget]-->
            </div>
        </aside>
      </div>
    </div>
    <!-- Page Footer-->
   <?php include("inc/site-footer.php");?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/@fancyapps/fancybox/jquery.fancybox.min.js"></script>
    <script src="js/front.js"></script>
     <script type="text/javascript">

                            function funtime()
                        {   
                            document.getElementById("myDIV").style.display="none";
                            setTimeout(function()
                            {
                            document.getElementById("myDIV").style.display="block";
                            }, 30000);
                        }

                            function hideButton()
                            {
                                 document.getElementById("myDIV").style.display="none";

                            }
                        </script>

  </body>
</html>