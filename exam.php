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

$class_id=$_GET['class_id'];
$section_id=$_GET['section_id'];


	if (isset($_GET['class_id']) && isset($_GET['section_id'])) {

	$query="SELECT subject.name, horarios_examenes.day, horarios_examenes.time_start, horarios_examenes.time_start_min,horarios_examenes.time_end,horarios_examenes.time_end_min,horarios_examenes.fecha FROM subject INNER JOIN horarios_examenes ON subject.subject_id=horarios_examenes.subject_id WHERE horarios_examenes.class_id = '{$class_id}' AND horarios_examenes.section_id = '{$section_id}'  ";

	$result=$conn->query($query);

	if($result->num_rows > 0)
	{
			
		while($row=$result->fetch_assoc()){
			$response1= Array(
		
			'name' => $row["name"],
			'time_start' => $row["time_start"],
			'time_start_min' => $row["time_start_min"],
			'time_end' => $row["time_end"],
			'time_end_min' => $row["time_end_min"],
			'examDate' => $row["fecha"],
			'day' => $row["day"]);
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