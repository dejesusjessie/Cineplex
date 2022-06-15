<?php

/*
 * The php function for the registration page
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$birth = $_POST['birth'];

// database connection
$sname= "localhost";
$unmae= "root";
$pwd = "";

$db_name = "cineplex_db";

$conn = mysqli_connect($sname, $unmae, $pwd, $db_name);

//$conn = new mysqli("localhost", "root", "", "cineplex_db");
if($conn->connect_error){
        die("Connection Failed:  ".$conn->connect_error);
} else {
        $stmt = $conn->prepare('INSERT INTO customer(c_email, c_usr, c_pwd, c_fname, c_lname, c_phone, c_birth)
                                VALUES(?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sssssss', $email, $username, $password, $firstname, $lastname, $phone, $birth);
        $stmt->execute();
        echo '<script type="text/javascript">
        alert("Your account is ready!" + "\n" + "Please login.");
        window.location = "customer_login.php";
     </script>';
        $stmt->close();
        $conn->close();
}
?>