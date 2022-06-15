<?php
/*
 * The database connection for the customer section
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "cineplex_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}