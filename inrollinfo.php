<?php

$server_name = 'localhost';
$mysql_username = 'focesin_school_pro';
$mysql_password = 'admin@123';
$db_name = 'focesin_school_pro';

// Create connection
$conn = new mysqli($server_name, $mysql_username, $mysql_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{

	

$student_id=$_GET['student_id'];

	if (isset($_GET['student_id'])) {

	$query="SELECT * From enroll Where student_id='{$student_id}'";

	$result=$conn->query($query);
	if($result->num_rows > 0)
	{
			
		while($row=$result->fetch_assoc()){
			$response1= Array(
		
			'student_id' => $row["student_id"],
			'class_id' => $row["class_id"],
			'section_id' => $row["section_id"]);
			$response[]=$response1;			
			}
	
		echo json_encode($response);
		}
		else
		{
			$response["error"] = TRUE;
        			$response["error_msg"] = "No Data Found";
        			echo json_encode($response);
		}
	

$conn->close();
	}else{
			$response["error"] = TRUE;
        			$response["error_msg"] = "Entered Details are wrong. Please try again!";
        			echo json_encode($response);
	}		
}

?> 