<?php 
session_start();
$email = $_SESSION["email"];
$reviewId = $_GET['id'];

if(isset($_SESSION['email'])) {

}
else{
	header("location: login.php");
}

?>


<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- CSS here -->

    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
   
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/animate.min.css">

 
</head>

<body>
   
      <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                   
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="home.php">home</a></li>
                                            <li><a href="browse_reviews.php">Browse Reviews</a></li>
                                           <li><a href="policy.php">privacy & policy</a></li>
                                           
                                          
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="post_review.php">Post a Review</a>
                                    </div>
                                    
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn2" href="logout.php">Log out</a>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
        
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb">
                                    <img src="img/svg_icon/1.svg" alt="">
                                </div>
                                <div class="jobs_conetent">

                                
                                <?php
                                        
                                        
                                        $conn = new mysqli("localhost", "root", "", "review_site");

                        $query = "SELECT * FROM `review` where `reviewId` = '$reviewId'";
                        
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            
                            while ($row = $result->fetch_assoc()) {
                            
                                $cata = $row['jobCatagory'];
                                $cname = $row['companyName'];
                                $id = $row['reviewId'];
                                $post = $row['post'];
                                $salary = $row['salary'];
                                $duration = $row['jobDuration'];
                                $address = $row['address'];
                                $exp = $row['experience'];
                                $rating = $row['rating'];
								$postemail = $row['email'];
                                
                             
                                
                                echo "<a href='job_details.php?id=$id'><h4>$cata</h4></a>";
                                
                                
                                 echo  "<div class='links_locat d-flex align-items-center'>
                                        <div class='location'>
                                            <h4> <i class='fa fa-map-marker'></i><span class='badge badge-danger'> {$cname}</span></h4>
                                        </div>
                                        <div class='location'>
                                            <h4> <i class='fa fa-clock-o'></i> {$duration}</h4>
                                        </div>
                                        <div class='location'>
                                            <h4>posted by:<span class='badge badge-success'> {$postemail}</span></h4>
                                        </div>
                                    </div>"
                                ;
                            
                                
                            }
                        }
                                    ?>
                                
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <?php
                     echo "<div class='descript_wrap white-bg'>
                        <img class='wave3' src='img/job_details.svg'>
                    <div class='single_wrap'>
                            <h3>Job Post</h3>
                            <h5>{$post}</h5>
                            
                        </div>
                        <div class='single_wrap'>
                            <h3>Job Experience</h3>
                            <h5>{$exp}</h5>
                            
                        </div>
                        <div class='single_wrap'>
                            <h3>Salary</h3>
                            <h5>{$salary} taka</h5>
                            
                        </div>
                        <div class='single_wrap'>
                            <h3>Office Location</h3>
                            <h5>{$address}</h5>
                            
                        </div>
                        <div class='single_wrap'>
                            <h3>In this postion for</h3>
                            <h5>{$duration} months</h5>
                            
                        </div>
                          <div class='single_wrap'>
                            <h3>Personal ratings  </h3>
                            <h5>{$rating} (Out of 10)</h5>
                            
                        </div>
                        
                    </div>
                   ";
                    ?>
                    
                   
                </div>
                
            </div>
        </div>
    </div>

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top" style="padding: 50px 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    
                                </a>
                            </div>
                            <p>
                                HOUSE NO 168 <br>
                                ROAD NO 8, BLOCK G <br>
                                BASHUNDHARA R/A, DHAKA <br>
                                +8801841434022 <br>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
               
                    

                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-5 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                       

                             <img width="100%" src="img/fb.svg" alt="">
                        </div>
                    </div> 

                
            </div>
        </div>
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by ANIK RAIHAN  
                        </p>
                    </div>
                </div>
            </div>
        </div>

    
    </footer>

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>
</body>

</html>