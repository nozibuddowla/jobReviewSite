<?php
session_start();
$postid = $_GET['id'];
$statusMsg = "";
if (isset($_POST['submit'])) {
	
	$conn = new mysqli("localhost", "root", "", "review_site");

        // If file upload form is submitted
		$catagory = $_POST["catagory"];
		$company_name = $_POST["company_name"]; 
		$job_post = $_POST["job_post"];
		$salary = $_POST["salary"];
		$job_duration = $_POST["job_duration"];
		$company_address = $_POST["company_address"];
		$experience = $_POST["experience"];
		$email = $_SESSION["email"];
		$type = $_POST["type"];
		$rating = $_POST["rating"];

                    $update = $conn->query("UPDATE `review` SET `email` = '$email', `jobCatagory` = '$catagory' , `companyName` = '$company_name', `post` = '$job_post', `salary` = '$salary', `jobDuration` = '$job_duration',`type` = '$type', `address` = '$company_address', `experience`= '$experience', `rating`= '$rating'  where `reviewId` = '$postid'");
					
                    $conn->close();
                 

                    if ($update) {
                        $status = 'success';
                        $statusMsg = "review posted successfully.";
						header("location: admin.php");
                    } else {
                        $statusMsg = "review post failed, please try again.";
                    }
                 
            
        // Display status message
        echo $statusMsg;
		
		
}


	


    ?>
	