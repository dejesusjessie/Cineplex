<?php
/*
 * The user dashboard page
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/


session_start();
include "movie_db_conn.php";
$c_query = mysqli_query($conn, "SELECT * FROM customer Where c_email = '".$_GET['index']."'");
$c_result = mysqli_fetch_array($c_query);

?>
<html>
        <head>
                <title>User Dashboard</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        </head>

        <body> 
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #150d6b!important;">
                <a class="navbar-brand" href="#"><img src="logo5.png" width="250" height="150" alt=""></a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav justify-content-right">
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link active" href="../movie/movie_index.php#">Home</a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="#">Theatre</a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="#">Event</a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="#">News</a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="#">Food & Drink</a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="#">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="../customer_page/customer_dashboard.php">
                                        <img src="img_avatar.png" alt="Avatar" style="width:50px; border-radius: 50%; background-color: white;">
                                        </a>
                                </li>
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link" href="../movie/movie_home.php">&nbsp &nbsp Logout</a>
                                </li>
                        </ul>
                </div>
                </nav>

                <nav class="navbar bg-light" style="background-color: #150d6b!important;">
                        <div class="container-fluid">
                                <a class="navbar-brand" style="color: white; font-size: 30px;"><u><b>Pending Ticket</b></u></a>
                                <form class="d-flex" role="search">
                                         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                        </div>
                </nav>

        <div class="album py-5 bg-light" style="height: 70%; background-image: linear-gradient( 180deg,  rgba(21,13,107,1) 1.1%, rgba(188,16,80,1) 130.5% )!important;">
        <h2 style="color: white; width: 80%; margin-left: auto; margin-right: auto;">Pending Ticket of: <?=$c_result['c_fname']?></h2>
          <div class="table-responsive">
                <div class="table-responsive" >
                        <table class="table table-striped table-sm" style="color: white; width: 80%; margin-left: auto; margin-right: auto; border-spacing: 0 15px; border-collapse: collapse;">
                                <thead>
                                <tr style="border-bottom: 1pt solid white;">
                                        <th>Ticket No.</th>
                                        <th>Movie Title</th>
                                        <th>Showtime Date</th>
                                        <th>Start Time</th>
                                        <th>Theatre Name</th>
                                        <th>Location</th>
                                        <th>Seat No.</th>
                                        <th>&nbsp &nbsp</th>

                  
                                </tr>
                                </thead>
                                <tbody style="border-bottom: 1pt solid white;">
                                        <?php 

                                                $query = mysqli_query($conn, "SELECT * FROM ticket join booked using (booked_id) 
                                                join showtime using (showtime_id) 
                                                join movie using (movie_id) 
                                                join theatre using (theatre_id) 
                                                join branch using (branch_id) 
                                                join seat using (seat_id)
                                                join customer using (c_email) 
                                                Where c_email = '".$_GET['index']."' and
                                                booked_status = 'p'
                                                group by ticket_id");

                                                
                                                while($result = mysqli_fetch_array($query)) {
                                                        $_SESSSION[$result['ticket_id']] = $result['ticket_id'];
                                                        
                                        ?>
                        
                                                <tr>
                                                        <td><?=$result['ticket_id']?></td>
                                                        <td><?=$result['movie_title']?></td>
                                                        <td><?=$result['showtime_date']?></td>
                                                        <td><?=$result['start_time']?></td>
                                                        <td><?=$result['theatre_name']?></td>
                                                        <td><?=$result['branch_name']?></td>
                                                        <td><?=$result['seat_id']?></td>
                                                        <td><button type="button" class="btn btn-danger btn-sm" style="height: 50%;">Delete</button></td>
                                                      
                                                        
                                        
                                        
                                                </tr>
                                        <?php }
                                        ?>

                
                                </tbody>
                        </table>
                        <div style="text-align: center;">
                        <button type="button" class="btn btn-primary">Purchase</button>
                        </div>
                        
                </div>
                
        </div>

        <div>

        <footer class="blog-footer text-center" style="position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: white;
                color: black;
                text-align: center">
                <p class="mb-1">© 2022 Kannika Armstrong</p>
        </footer>
</div>


        </body>
</html>

