<?php
/*
 * The movie page use to show all information of each movie
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/
include "movie_db_conn.php";

$id = $_GET['index'];
$query = mysqli_query($conn, "SELECT * FROM movie Where movie_id = $id");
$result = mysqli_fetch_array($query);

?>
<html>
        <head>
                <title><?=$result['movie_title']?></title>
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
                                <a class="navbar-brand" style="color: white; font-size: 30px;"><u><b>Booking Tickets</b></u></a>
                        </div>
                </nav>
                <div class="album py-5 bg-light" style=" background-image: linear-gradient( 180deg,  rgba(21,13,107,1) 1.1%, rgba(188,16,80,1) 130.5% )!important;">
                <div class="container">
                        <div class="row">
                                <div class="col-md-3">
                                        <div class="card mb-4 shadow-sm">
                                                <img src=<?=$result['movie_poster']?> width="100%" height="380" />
                                                <div class="card-body">
                                                <p class="card-text"><?=$result['movie_title']?></p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary"><a href="./movie_showtime.php?index=<?=$result['movie_id']?>">Showtime Schedules</a></button>
                                                </div>
                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-9">
                                        <div class="card shadow-sm text-center"><h3>Official Trailer</h3></div>
                                        <div class="card mb-4 shadow-sm">
                                        <iframe width="100%" height="425" src="https://www.youtube.com/embed/<?=$result['movie_vdo']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                </div>
                        </div> 
                        <div class="row">
                                <div class="col-md-12">
                                        <div class="card mb-4 shadow-sm" style="position: flex;
                                                                                background-color: transparent;
                                                                                color: white; font-family: sans-serif;">
                                                <div class="card-body">
                                                <p class="card-text"><h5><?=$result['duration']?> Hr &nbsp| &nbsp <?=$result['genre']?> &nbsp |  &nbsp<?=$result['rate']?></h5></p>
                                           
                                                <p class="card-text"><h4><?=$result['movie_info']?></h4></p>
                                                
                                        </div>
                                                </div>
                                        </div>
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
                <p class="mb-1">© 2022 Kannika Armstrong</p>
        </footer>


        </body>
</html>


