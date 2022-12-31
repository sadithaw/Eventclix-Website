<?php

if(isset($_POST['register'])){
    
	require_once '../Connection/connection.php';
	
	$first_name = $_POST['firstname'];
	$last_name = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password))
	{
		header("Location: ../../Views/Auth/signup.php?error=emptyfields&first_name=".$first_name."&last_name=".$last_name."&email=".$email);
		exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		header("Location: ../../Views/Auth/signup.php?error=emailerror&first_name=".$first_name."&last_name=".$last_name);
		exit();
	}
	elseif ($password != $confirm_password){

		header("Location: ../../Views/Auth/signup.php?error=passwordmismatch&first_name=".$first_name."&last_name=".$last_name."&email=".$email);
		exit();
	}
	else{
		try{

			$sql = "SELECT email from users WHERE email = ?";
			$stmt = $conn->prepare($sql);

			if($stmt === false){
				echo $conn->error;
			}

			$stmt->bind_param("s", $email);
			$stmt->execute();

			$result = $stmt->get_result();

			if($result->num_rows > 0){

				$stmt->close();
				$conn->close();

				header("Location: ../../Views/Auth/signup.php?error=emailalreadyexits&first_name=".$first_name."&last_name=".$last_name."&email=".$email);
				exit();

			}
			else{

				$insert_sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?,?,?,?)";

				$insert_stmt = $conn->prepare($insert_sql);

				$hash_password = password_hash($password, PASSWORD_DEFAULT);

				$insert_stmt->bind_param("ssss", $first_name, $last_name, $email, $hash_password);

				$result = $insert_stmt->execute();

				if(!$result){
					echo $insert_stmt->error;
				}

				$insert_stmt->close();
				$conn->close();

				header("Location: ../../Views/Auth/login.php?register=success");
				exit();
			}
		}
		catch(mysqli_sql_exception $e)
		{
		    echo $e->getMessage();
		}
	}
}
else{
	header("Location: ../../Views/Auth/signup.php");
	exit();
}

?>