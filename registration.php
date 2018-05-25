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
else{
	
$name=$_GET['name'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$password=sha1($_GET['password']);
$address=$_GET['address'];
$profession=$_GET['profession'];
$username=$_GET['username'];


	
	if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['password']) && isset($_GET['address']) && isset($_GET['profession']) && isset($_GET['username'])) {

		$response = array("error" => FALSE);
		$sql="Select * from parent Where email='{$email}'";

    $result = $conn->query($sql);

if ($result->num_rows > 0) 
{	
        $response["error"] = TRUE;
        $response["error_msg"] = "This emailid is already exists! try another.";
        echo json_encode($response);
}
else
{
	$query="INSERT INTO parent SET name='{$name}',email='{$email}',phone='{$phone}',password='{$password}',address='{$address}',profession='{$profession}',username='{$username}'";
		if(mysqli_query($conn, $query))
		{
		
			$response["error"] = FALSE;
        			$response["error_msg"] = "Registration Successfully.!";
        			echo json_encode($response);
		}
		else
		{
			$response["error"] = TRUE;
        			$response["error_msg"] = "Entered Details are wrong. Please try again!";
        			echo json_encode($response);
		}
	
}
$conn->close();
}	
}