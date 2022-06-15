<?php
/*
 * The seating page for shows all seats in the theatre with the seat status, available and booked
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/
include "movie_db_conn.php";
session_start();
$id = $_GET['index'];
$branch = $_GET['branch'];
$theatre = $_GET['theatre'];
$showtime = $_GET['showtime'];
//add to cache
$_SESSION['movie_id'] = $id;
$_SESSION['branch_id'] = $branch;
$_SESSION['theatre_id'] = $theatre;
$_SESSION['showtime_id'] = $showtime;
$query = mysqli_query($conn, "SELECT * FROM movie Where movie_id = $id");
$result = mysqli_fetch_array($query);

?>
<html>
        <head>
                <title>Seating-<?=$result['movie_title']?></title>
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
                                <a class="navbar-brand" style="color: white; font-size: 30px;"><u><b>Seating</b></u></a>
                        </div>
                </nav>
                <div class="album py-5 bg-light" style="width: 100%; height: 70%; background-image: linear-gradient( 180deg,  rgba(21,13,107,1) 1.1%, rgba(188,16,80,1) 130.5% )!important;">
                <h2 style="color: white; width: 1000px; margin-left: auto; margin-right: auto;">Seating Arrangement</h2>
                <div class="container">
                <form method = "post" action = "movie_checkout.php">
                        <div class="table-responsive">
                                <table class="table table-striped table-sm" style="color: white; width: 1000px; margin-left: auto; margin-right: auto">
                                <thead>
                                        <tr>
                                                <th></th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                                <th>4</th>
                                                <th>5</th>
                                                <th>6</th>
                                                <th>7</th>
                                                <th>8</th>
                                                <th>9</th>
                                                <th>10</th>
                                                <th>seat type</th>
                                        
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td>A</td>
                                                <td><input type="checkbox" value="A01" name = "checkbox[]" id="A01"></td>
                                                <td><input type="checkbox" value="A02" name = "checkbox[]" id="A02"></td>
                                                <td><input type="checkbox" value="A03" name = "checkbox[]" id="A03"></td>
                                                <td><input type="checkbox" value="A04" name = "checkbox[]" id="A04"></td>
                                                <td><input type="checkbox" value="A05" name = "checkbox[]" id="A05"></td>
                                                <td><input type="checkbox" value="A06" name = "checkbox[]" id="A06"></td>
                                                <td><input type="checkbox" value="A07" name = "checkbox[]" id="A07"></td>
                                                <td><input type="checkbox" value="A08" name = "checkbox[]" id="A08"></td>
                                                <td><input type="checkbox" value="A09" name = "checkbox[]" id="A09"></td>
                                                <td><input type="checkbox" value="A10" name = "checkbox[]" id="A10"></td>
                                                <td>Gold</td>

                                        </tr>
                                        <tr>
                                                <td>B</td>
                                                <td><input type="checkbox" value="B01" name = "checkbox[]" id="B01"></td>
                                                <td><input type="checkbox" value="B02" name = "checkbox[]" id="B02"></td>
                                                <td><input type="checkbox" value="B03" name = "checkbox[]" id="B03"></td>
                                                <td><input type="checkbox" value="B04" name = "checkbox[]" id="B04"></td>
                                                <td><input type="checkbox" value="B05" name = "checkbox[]" id="B05"></td>
                                                <td><input type="checkbox" value="B06" name = "checkbox[]" id="B06"></td>
                                                <td><input type="checkbox" value="B07" name = "checkbox[]" id="B07"></td>
                                                <td><input type="checkbox" value="B08" name = "checkbox[]" id="B08"></td>
                                                <td><input type="checkbox" value="B09" name = "checkbox[]" id="B09"></td>
                                                <td><input type="checkbox" value="B10" name = "checkbox[]" id="B10"></td>
                                                <td>Silver</td>

                                        </tr>
                                        <tr>
                                                <td>C</td>
                                                <td><input type="checkbox" value="C01" name = "checkbox[]" id="C01"></td>
                                                <td><input type="checkbox" value="C02" name = "checkbox[]" id="C02"></td>
                                                <td><input type="checkbox" value="C03" name = "checkbox[]" id="C03"></td>
                                                <td><input type="checkbox" value="C04" name = "checkbox[]" id="C04"></td>
                                                <td><input type="checkbox" value="C05" name = "checkbox[]" id="C05"></td>
                                                <td><input type="checkbox" value="C06" name = "checkbox[]" id="C06"></td>
                                                <td><input type="checkbox" value="C07" name = "checkbox[]" id="C07"></td>
                                                <td><input type="checkbox" value="C08" name = "checkbox[]" id="C08"></td>
                                                <td><input type="checkbox" value="C09" name = "checkbox[]" id="C09"></td>
                                                <td><input type="checkbox" value="C10" name = "checkbox[]" id="C10"></td>
                                                <td>Normal</td>

                                        </tr>
                                        <tr>
                                                <td>D</td>
                                                <td><input type="checkbox" value="D01" name = "checkbox[]" id="D01"></td>
                                                <td><input type="checkbox" value="D02" name = "checkbox[]" id="D02"></td>
                                                <td><input type="checkbox" value="D03" name = "checkbox[]" id="D03"></td>
                                                <td><input type="checkbox" value="D04" name = "checkbox[]" id="D04"></td>
                                                <td><input type="checkbox" value="D05" name = "checkbox[]" id="D05"></td>
                                                <td><input type="checkbox" value="D06" name = "checkbox[]" id="D06"></td>
                                                <td><input type="checkbox" value="D07" name = "checkbox[]" id="D07"></td>
                                                <td><input type="checkbox" value="D08" name = "checkbox[]" id="D08"></td>
                                                <td><input type="checkbox" value="D09" name = "checkbox[]" id="D09"></td>
                                                <td><input type="checkbox" value="D10" name = "checkbox[]" id="D10"></td>
                                                <td>Normal</td>

                                        </tr>
                                        <tr>
                                                <td>E</td>
                                                <td><input type="checkbox" value="E01" name = "checkbox[]" id="E01"></td>
                                                <td><input type="checkbox" value="E02" name = "checkbox[]" id="E02"></td>
                                                <td><input type="checkbox" value="E03" name = "checkbox[]" id="E03"></td>
                                                <td><input type="checkbox" value="E04" name = "checkbox[]" id="E04"></td>
                                                <td><input type="checkbox" value="E05" name = "checkbox[]" id="E05"></td>
                                                <td><input type="checkbox" value="E06" name = "checkbox[]" id="E06"></td>
                                                <td><input type="checkbox" value="E07" name = "checkbox[]" id="E07"></td>
                                                <td><input type="checkbox" value="E08" name = "checkbox[]" id="E08"></td>
                                                <td><input type="checkbox" value="E09" name = "checkbox[]" id="E09"></td>
                                                <td><input type="checkbox" value="E10" name = "checkbox[]" id="E10"></td>
                                                <td>Normal</td>

                                        </tr>
                                        <tr>
                                                <td>F</td>
                                                <td><input type="checkbox" value="F01" name = "checkbox[]" id="F01"></td>
                                                <td><input type="checkbox" value="F02" name = "checkbox[]" id="F02"></td>
                                                <td><input type="checkbox" value="F03" name = "checkbox[]" id="F03"></td>
                                                <td><input type="checkbox" value="F04" name = "checkbox[]" id="F04"></td>
                                                <td><input type="checkbox" value="F05" name = "checkbox[]" id="F05"></td>
                                                <td><input type="checkbox" value="F06" name = "checkbox[]" id="F06"></td>
                                                <td><input type="checkbox" value="F07" name = "checkbox[]" id="F07"></td>
                                                <td><input type="checkbox" value="F08" name = "checkbox[]" id="F08"></td>
                                                <td><input type="checkbox" value="F09" name = "checkbox[]" id="F09"></td>
                                                <td><input type="checkbox" value="F10" name = "checkbox[]" id="F10"></td>
                                                <td>Normal</td>

                                        </tr>
                                        <tr>
                                                <td>G</td>
                                                <td><input type="checkbox" value="G01" name = "checkbox[]" id="G01"></td>
                                                <td><input type="checkbox" value="G02" name = "checkbox[]" id="G02"></td>
                                                <td><input type="checkbox" value="G03" name = "checkbox[]" id="G03"></td>
                                                <td><input type="checkbox" value="G04" name = "checkbox[]" id="G04"></td>
                                                <td><input type="checkbox" value="G05" name = "checkbox[]" id="G05"></td>
                                                <td><input type="checkbox" value="G06" name = "checkbox[]" id="G06"></td>
                                                <td><input type="checkbox" value="G07" name = "checkbox[]" id="G07"></td>
                                                <td><input type="checkbox" value="G08" name = "checkbox[]" id="G08"></td>
                                                <td><input type="checkbox" value="G09" name = "checkbox[]" id="G09"></td>
                                                <td><input type="checkbox" value="G10" name = "checkbox[]" id="G10"></td>
                                                <td>Normal</td>

                                        </tr>
                                        
                                </tbody>
                                </table>
                                <?php 

                                                $query = mysqli_query($conn, "SELECT * 
                                                FROM showtime JOIN theatre USING (theatre_id) JOIN branch USING (branch_id) JOIN seat USING (theatre_id)
                                                Where movie_id = $id AND branch_id = $branch AND theatre_id = $theatre AND seat_status = 'B'");
                                                
                                                while($result = mysqli_fetch_array($query)) {
                                                        $seat = $result['seat_id'];
                                                        echo "<script> 
                                                                document.getElementById('$seat').disabled = true;
                                                                </script>";
                                                        
                                                ?>
                                                        
                                                <?php }
                                        ?>
                                
                        </div>
                        </div>

                        <div style = "text-align: center">                                 
                        <a class="navbar-brand" href="#"><img src="img/Screen.png" width="100%" height="30px" alt=""></a><br></br>
                        </div>

                        <div style = "text-align: center">
                                <input type = "submit" name = "submit" value = "checkout"/>
                        </div>
                        
                </form>
                        
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

