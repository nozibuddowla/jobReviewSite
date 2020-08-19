<?php
session_start();
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

                    $insert = $conn->query("INSERT into review (`email`, `jobCatagory`, `companyName`, `post`, `salary`, `jobDuration`,`type`, `address`, `experience`, `rating`) VALUES ('$email','$catagory','$company_name','$job_post','$salary','$job_duration','$type','$company_address','$experience','$rating')");

                    $conn->close();
                 

                    if ($insert) {
                        $status = 'success';
                        $statusMsg = "review posted successfully.";
                    } else {
                        $statusMsg = "review post failed, please try again.";
                    }
                 
            
        // Display status message
        echo $statusMsg;
}
header("Location: browse_reviews.php");

	


    ?>
	