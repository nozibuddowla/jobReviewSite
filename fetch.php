<?php
$connect = mysqli_connect("localhost", "root", "", "review_site");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM review 
	WHERE companyName LIKE '%".$search."%'
	OR address LIKE '%".$search."%' 
	OR post LIKE '%".$search."%' 
	OR salary LIKE '%".$search."%' 
	OR type LIKE '%".$search."%'
	";
}
else
{
	$query = "";
}
if($query==""){
	
}
else{
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Company Name</th>
							<th>Address</th>
							<th>Salary</th>
							<th>Type</th>
							<th>Category</th>
							<th>Post Details</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		
		$output .= '
			<tr>
				<td>'.$row["companyName"].'</td>
				<td>'.$row["address"].'</td>
				<td>'.$row["salary"].'</td>
				<td>'.$row["type"].'</td>
				<td>'.$row["post"].'</td>
				<td><a class="boxed-btn3" href="job_details.php?id='.$row["reviewId"].'">View Post</a></td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
}

?>