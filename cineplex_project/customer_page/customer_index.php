<!DOCTYPE html>
<!-- 
/*
 * The user login page using to display the code from customer_login.php
 * the "Movie Tickets Reservation Systems Project"
 * TCSS 445: Database Systems Design
 * @author Kannika Armstrong, Nordine Chaumath, and Jessie De Jesus
 * @Version Spring 2022
*/
 -->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container" style="position: fixed;">
	
		<form action="customer_login.php" method="POST" class="login-email">
		<p class="login-text" style="font-size: 2rem; font-weight: 800; display:flex; flex-direction: row; justify-content: center; align-items: center"><img class="mb-4 mb-4-centered" src="logo4.png" alt="" width="120px" height="70px">&nbsp &nbsp Login</p>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			    <label for="email">Email:</label> 
				<input style="margin-left:10px" type="email" placeholder="Email" name="c_email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			    <label for="password">Password:</label> 
				<input style="margin-left:10px" type="password" placeholder="Password" name="c_pwd" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="customer_register.php">Register Here</a>.</p>
		</form>
	</div>

	<footer class="blog-footer text-center" style="position:  fixed;
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