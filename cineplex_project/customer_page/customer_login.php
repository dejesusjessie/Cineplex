<?php 
/*
 * The user login page display by customer_index.php
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/
session_start(); 
include "movie_db_conn.php";

if (isset($_POST['c_email']) && isset($_POST['c_pwd'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['c_email']);
	$pass = validate($_POST['c_pwd']);

	if (empty($uname)) {
		header("Location: customer_index.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: customer_index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM customer WHERE c_email='$uname' AND c_pwd='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			$_SESSION['c_email'] = $row['c_email'];
			$_SESSION['c_usr'] = $row['c_usr'];
			$_SESSION['c_pwd'] = $row['c_pwd'];
			$_SESSION['c_fname'] = $row['c_fname'];
			$_SESSION['c_lname'] = $row['c_lname'];
			$_SESSION['c_phone'] = $row['c_phone'];
			$_SESSION['c_birth'] = $row['c_birth'];

            		if ($row['c_email'] === $uname && $row['c_pwd'] === $pass) {
            	 		header('Location: ../movie/movie_index.php');
		        	exit();
            		}else{
				header("Location: customer_index.php?error=Incorect Email or password");
		        	exit();
			}
		}else{
			header("Location: customer_index.php?error=Incorect Email or password");
	        	exit();
		}
	}
	
}else{
	header("Location: customer_index.php");
	exit();
}