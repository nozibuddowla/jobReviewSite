<?php
session_start();
$email = $_SESSION["email"];
$reviewId = $_GET['id'];
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM review where reviewId = $reviewId");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post a review</title>

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
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="css/style.css">

    
 

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
                                            <li><a href="#">home</a></li>
                                            <li><a href="browse_reviews.php">Browse Reviews</a></li>
                                           <li><a href="policy.php">privacy & policy</a></li>
                                           
                                          
                                            <li><a href="contact.php">Contact</a></li>
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
    
  
 
       <div class="bradcam_area_2 bradcam_bg_2">
        <div class="container">
          
            <div class="row">
                <div class="col-xl-5">
                    <div class="bradcam_text">
                        <h3>Post A Review</h3>
      
                            
                            <h3 style="color: #485460" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"> 100+ Reviews listed</h3>
                             
                    
                    </div>
                </div>

            <div class="col-xl-6 d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
        
        <img class="wave3 wow shake" data-wow-duration="1s" data-wow-delay=".2s" src="img/bg.svg">

            </div>

            </div>
        </div>
          </div> 


  
         <div class="review_details_area">
        <div class="container">
		
          <div class="review_form white-bg">
  <img class="wave" src="img/goals.svg">
          
                        <h4>Apply for the job</h4> 
						 <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
					
                        <form method="post" name = "reviewform" onsubmit="return validateform()" action="updateReview.php?id=<?php echo $row["reviewId"];?>" >
						 
                            <div class="row">
                                
                                <div class="col-md-4">
                   
									<select class="form-control" name="catagory" placeholder="Job Category">
                                <option>Developer</option>
                                <option>HR</option>
                                <option>Marketing</option>
                                <option>Finance</option>
                                <option>Other</option>
                            </select>
									
                                </div>
								
								<div class="col-md-4">
                   
									<select class="form-control" name="type" placeholder="Job Category">
                                <option>Full Time</option>
                                <option>Part Time</option>
                               
                            </select>
									
                                </div>
								
                                <div class="col-md-4">
                                    <div class="input_field">
                                           <input value='<?php echo $row["companyName"];?>' type="text" name="company_name" placeholder="Company name" onkeypress="return isChar(event)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input_field">
                                            <input value='<?php echo $row["post"];?>' type="text" name="job_post" placeholder="Post" onkeypress="return isChar(event)">
                                    </div>
                                </div>
                                 <div class="col-md-2">
                                    <div class="input_field">
                                            <input  value='<?php echo $row["salary"];?>' type="text" name="salary" placeholder="Salary" onkeypress="return isNumber(event)">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                           <input  value='<?php echo $row["jobDuration"];?>' type="text" name="job_duration" placeholder="Job duration" onkeypress="return isNumber(event)">
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="input_field">
                                        <input  value='<?php echo $row["address"];?>' type="text" name="company_address" placeholder="Company address">
                                    </div>
                                </div>
                              

                                    <div class="col-md-11">
                                <div class="input_field">
                                        <textarea name="experience" id="" cols="30" rows="10" placeholder="experience"> <?php echo $row["experience"];?></textarea>
                                    </div>

                                </div>

                                   <div class="col-md-4">
                   
                                    <select class="form-control" name="rating" placeholder="Job rating">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                              

                               
                            </select>
                                    
                                </div>


                                <div class="col-md-12">
                                 
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button id="spost"  class="btn btn-outline-success w-100" name = "submit" type="submit">Update Review</button>

                                    </div>
                                </div>

                            </div>

                        </form>

</div>
<?php
                        $i++;
                        }
                        ?>

                    </div>

        </div>
      </div>
    </div>

  </body>

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
                            
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by ANIK RAIHAN  
                        </p>
                    </div>
                </div>
            </div>
        </div>

    
    </footer>
   
   
   <script>
		
		
		function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
		
        function isChar(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return true;
            }
            return false;
        }

        function validateform() {


            var catagory = document.reviewform.catagory.value;
            var company_name = document.reviewform.company_name.value;
            var job_post = document.reviewform.job_post.value;
            var salary = document.reviewform.salary.value;
			var job_duration = document.reviewform.job_duration.value;
			var company_address = document.reviewform.company_address.value;
			var experience = document.reviewform.experience.value;
           
			


            if (catagory == null || catagory == "") {
                alert("catagory can't be blank");
                return false;
            } else if (company_name == null || company_name == "") {
                alert("company name can't be blank");
                return false;
            } else if (job_post == null || job_post == "") {
                alert("job post can't be blank");
                return false;
            } 
			 else if (salary == null || salary == "") {
                alert("salary can't be blank");
                return false;
            } 
			 else if (job_duration == null || job_duration == "") {
                alert("job duration can't be blank");
                return false;
            } 
			 else if (company_address == null || company_address == "") {
                alert("company address can't be blank");
                return false;
            } 
			 else if (experience == null || experience == "") {
                alert("experience can't be blank");
                return false;
            } 
			
		
        }
    </script>

 
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
    <script src="js/waypoints.min.js"></script>
  
    <script src="js/wow.min.js"></script>
   
    <script src="js/main.js"></script>
</html>