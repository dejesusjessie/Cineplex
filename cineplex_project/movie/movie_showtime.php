<?php
/*
 * The showtime page use to show showtime schedule of each movie
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/
include "movie_db_conn.php";
session_start();
$id = $_GET['index'];
$query = mysqli_query($conn, "SELECT * FROM movie Where movie_id = $id");
$result = mysqli_fetch_array($query);

?>
<html>
        <head>
                <title>Showtime-<?=$result['movie_title']?></title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        </head>

        <body> 
                <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #150d6b!important;">
                <a class="navbar-brand" href="#"><img src="img/logo5.png" width="250" height="150" alt=""></a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav justify-content-center">
                                <li class="nav-item" style="font-size: 25px !important;">
                                        <a class="nav-link active" href="./movie_index.php#">Home</a>
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
                                <a class="navbar-brand" style="color: white; font-size: 30px;"><u><b>Showtime</b></u></a>
                        </div>
                </nav>
                <div class="album py-5 bg-light" style="background-image: linear-gradient( 180deg,  rgba(21,13,107,1) 1.1%, rgba(188,16,80,1) 130.5% )!important;">
                <h2 style="color: white; width: 1000px; margin-left: auto; margin-right: auto;">Showtime: <?=$result['movie_title']?></h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm" style="color: white; width: 1000px; margin-left: auto; margin-right: auto">
              <thead>
                <tr>
                  <th>Branch name</th>
                  <th>Date</th>
                  <th>Start time</th>
                  <th>End time</th>
                  <th>Book</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php 

                    $query = mysqli_query($conn, "SELECT * FROM showtime 
                    JOIN theatre USING (theatre_id) 
                    JOIN branch USING (branch_id) 
                    Where movie_id = $id 
                    ORDER BY showtime_date, start_time");
                    
                    while($result = mysqli_fetch_array($query)) {
                        $_SESSSION[$result['branch_id']] = $result['branch_id'];
                        
                    ?>
                        
                        <tr>
                                <td><?=$result['branch_name']?></td>
                                <td><?=$result['showtime_date']?></td>
                                <td><?=$result['start_time']?></td>
                                <td><?=$result['end_time']?></td>
                                <td><button type="button" class="btn btn-sm btn-outline-secondary"><a href="./movie_seating.php?index=<?=$result['movie_id']?>&branch=<?=$result['branch_id']?>&theatre=<?=$result['theatre_id']?>&showtime=<?=$result['showtime_id']?>">Book </a></button></td>
                                
                        </tr>
                <?php }
                ?>

                
              </tbody>
            </table>
          </div>
                </div> 
                </div>
                </div>

                

                <footer class="blog-footer text-center" style="position: flex;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: white;
                color: black;
                text-align: center">
                <p class="mb-1">© 2022 Nordine Chaumath</p>
        </footer>



        </body>
</html>
