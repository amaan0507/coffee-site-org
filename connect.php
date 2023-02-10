<?php
	$user_name = $_POST['user_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','login_db');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user_info(user_name, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $user_name, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		 echo " Registration successfully...";
    

		$stmt->close();
		$conn->close();
	}
?>