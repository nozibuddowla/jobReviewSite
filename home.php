<?php 
session_start();
$email = $_SESSION["email"];

if(isset($_SESSION['email'])) {

}
else{
	header("location: login.php");
}

?>


<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM review");

$result2 = mysqli_query($conn,"SELECT * FROM feedback");

$result3 = mysqli_query($conn,"SELECT * FROM review group by jobCatagory order by COUNT(jobCatagory) desc");

$result5 = mysqli_query($conn,"SELECT * FROM review group by companyName order by COUNT(companyName) desc");

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    <!-- CSS here -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slicknav.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/custom.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
	
</head>

<body>
  

    <!-- header-start -->
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
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="logout.php">Log out</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="post_review.php">Post a Review</a>
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

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">4536+ Reviews listed</h5>
                             <h1>logged in as <?php echo $email;?></h1>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="browse_reviews.php" class="boxed-btn3">View all Reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->
	
	<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">Search</h2><br />
			<div class="form-group">
				<div class="input-group">
					<input type="text" name="search_text" id="search_text" placeholder="Search by Company Details" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />

    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>
			
            <div class="row">
			<?php
					$i=0;
					while($row = mysqli_fetch_array($result3)) {
					?>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="browse_reviews.php"><h4><?php echo $row["jobCatagory"]; $jc = $row["jobCatagory"]; ?></h4></a>
						
							<?php
							include_once 'database.php';
							$query = "SELECT COUNT(jobCatagory) FROM review where `jobCatagory` ='$jc'";
							$result4 = mysqli_query($conn,$query);
							while ($row = $result4->fetch_assoc()) {
								$rx = $row["COUNT(jobCatagory)"];
								
							}
							?>
						
                        <p> <span><?php echo $rx;?></span> Available reviews</p>
                    </div>
                </div>
                 <?php
						$i++;
						}
						?>
            </div>
			
        </div>
    </div>
    <!-- popular_catagory_area_end  -->
<div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="brouse_job text-right">
                        
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row" >
                        <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                         $id = $row['reviewId'];
                           $cata = $row['jobCatagory'];
                           $cname = $row['companyName'];
                                $id = $row['reviewId'];
                                $type = $row['type'];
                                 $rating = $row['rating'];
                               
                    echo "<a  href='job_details.php?id=$id'><h4 style='margin-top: 50px;'>$cata</h4></a>";
                    
                   echo "<div class='col-lg-12 col-md-12'>
                        <div class='single_jobs white-bg d-flex justify-content-between'>
                            <div class='jobs_left d-flex align-items-center'>
                                <div class='thumb' >
                                    <img style='width: 100%' src='img/svg_icon/1.svg' alt=''>
                                </div>
                                <div class='jobs_conetent'>
                                    <a href='job_details.php?id=$id'><h4>{$cname}</h4></a>
                                    <div class='links_locat d-flex align-items-center'>
                                        <div class='location'>
                                            <p> <i class='fa fa-map-marker'></i><span class='badge badge-secondary'> {$type}</span></p>
                                        </div>
                                       
                                        <div class='location'>
                                                    <p> <i class='fa fa-star' aria-hidden='true'></i> Rating :<span class='badge badge-warning'>{$rating}</span></p>
                                                </div>
                                                <div class='location'>
                                                    <p> <i class='fa fa-user' aria-hidden='true'></i> Posted by :<span class='badge badge-pill'>{$email}</span></p>
                                                </div>
                                                <div class='location'>
                                    <p>Review Id: <span class='badge badge-danger'> {$id}</span></p>
                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class='jobs_right'>
                                <div class='apply_now'>
                                  
                                      <a href='job_details.php?id=$id' class='boxed-btn3'>readNow</a>
                                   
                                </div>
                                
                            </div>

                        </div>
                    </div>";
                      }
                           
                                    ?>

                    
                </div>
            </div>
        </div>
    </div>



    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row"><?php
					$i=0;
					while($row = mysqli_fetch_array($result5)) {
						$cn = $row["companyName"];
					?>
                <div class="col-lg-4 col-xl-3 col-md-6">
				
				
					
                    <div class="single_company">
                        <div class="thumb">
                            <img src="img/svg_icon/5.svg" alt="">
                        </div>
						
						
						<?php
							include_once 'database.php';
							$query = "SELECT COUNT(jobCatagory) FROM review where `companyName` ='$cn'";
							$result4 = mysqli_query($conn,$query);
							while ($row = $result4->fetch_assoc()) {
								$rx = $row["COUNT(jobCatagory)"];
								
							}
							?>
						
						
                        <a href="browse_reviews.php"><h3><?php echo $cn?></h3></a>
                        <p> <span><?php echo $rx;?></span> Available reviews</p>
                    </div>
					
					 
                </div>
				<?php
						$i++;
						}
						?>
            </div>
        </div>
    </div>

    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online reviews </p>
                        <a href="browse_reviews.php" class="boxed-btn3">Browse Reviews</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Want to share your experience?</h3>
                        <p>You can share your personal job experience</p>
                        <a href="post_review.php" class="boxed-btn3">Post a Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

      </div>
    </div>

    <!-- testimonial_area  -->
    <div class="testimonial_area  ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-40">
                        <h3>Testimonial</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">


                    	<?php
					$i=0;
					while($row = mysqli_fetch_array($result2)) {
					?>
                        <div class="single_carousel">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="single_testmonial d-flex align-items-center">
                                        <div class="thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                            <div class="quote_icon">
                                                <i class="Flaticon flaticon-quote"></i>
                                            </div>
                                        </div>
                                        <div class="info">
                                          <p><?php echo $row["message"]; ?></p>
                                            <span>- <?php echo $row["name"]; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
						 <?php
						$i++;
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->


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
                                +8801922438860 <br>
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
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
                            
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by Md Nozib Ud Dowla  
                        </p>
                    </div>
                </div>
            </div>
        </div>

    
    </footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>


   
    <!--/ footer end  -->

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