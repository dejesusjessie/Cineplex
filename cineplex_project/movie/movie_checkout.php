<?php
/*
 * The checkout function working with the movie_seating page
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/
include "movie_db_conn.php";
session_start();
//grab variable from cache
$movie_id = $_SESSION['movie_id'];
$branch_id = $_SESSION['branch_id'];
$theatre_id = $_SESSION['theatre_id'];
$c_email = $_SESSION['c_email'];
$showtime_id = $_SESSION['showtime_id'];
$sum = 0;

?>


<?php
//insert into book
// Calculate the booked price (sum without tax)
// Calculate the total price (booked price * tax (make up a number))

if(isset($_POST['submit'])){
    if(isset($_POST['checkbox'])){
        foreach($_POST['checkbox'] as $key => $val){
            //grab price for each seat and add it to the sum
            $query = mysqli_query($conn, "SELECT type_price FROM seat JOIN seat_type USING (type_id) WHERE theatre_id = $theatre_id AND seat_id = '$val'");
            if($query){
                while($result = mysqli_fetch_array($query)) {
                    $sum += $result['type_price']; 
                }
            }else{
                echo "ERROR: Could not execute query" .mysqli_error($conn);
            }          
            
        }

        //after getting sum, insert into database
        $date = date("Y-m-d");
        $query = mysqli_query($conn, "INSERT INTO booked (booked_price, tax, total_price, booked_date, c_email, booked_status) VALUE ($sum, booked_price * 0.1, booked_price + tax, '$date', '$c_email', 'p')");
        if(!$query){
            echo "ERROR: Could not execute query" .mysqli_error($conn);
        }
        
        //insert into ticket
        // Need to grab max ID
        $query = mysqli_query($conn, "SELECT max(booked_id) AS booked_id FROM booked");
        $result = mysqli_fetch_array($query);
        $booked_id = $result['booked_id'];
        foreach($_POST['checkbox'] as $key => $val){
            $query = mysqli_query($conn, "INSERT INTO ticket (seat_id, showtime_id, booked_id) VALUE ('$val', $showtime_id, $booked_id)");
            if(!$query){
                echo "<br>";
                echo "ERROR: Could not execute query" .mysqli_error($conn);
                echo "<br>";
            }
        }

        // Update seating availibility
        foreach($_POST['checkbox'] as $key => $val){
            $query = mysqli_query($conn, "UPDATE seat SET seat_status = 'B' WHERE seat_id = '$val' AND theatre_id = $theatre_id");
            if(!$query){
                echo "<br>";
                echo "ERROR: Could not execute query" .mysqli_error($conn);
                echo "<br>";
            }
        }
        
        if($query){
            echo "<script>
                    alert('Ticket(s) created succesfully');
                    location='../customer_page/customer_dashboard.php?index=$c_email';
                    </script>";
        }else{
            echo "<br>ERROR: something overall went wrong. Message admin. <br>";
        }


    } else{
        echo "<script>
                    alert('No seats chosen');
                    location='movie_seating.php?index=$movie_id&branch=$branch_id&theatre=$theatre_id&showtime=$showtime_id';
                </script>";
    }
}

        


?>