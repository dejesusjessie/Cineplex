<!DOCTYPE html>
<!-- 
/*
 * The user registration page
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

	<title>Register Form</title>
</head>
<body>
	<div class="container">
	
		<form action="register_conn.php" method="POST" class="login-email">
            	<p class="login-text" style="font-size: 2rem; font-weight: 800; display:flex; flex-direction: row; justify-content: center; align-items: center"><img class="mb-4 mb-4-centered" src="logo4.png" alt="" width="120px" height="70px">&nbsp &nbsp Register</p>
	    		<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			    <label for="firstname">Firstname:</label> 
				<input style="margin-left:10px;" type="text" placeholder="Firstname" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
			</div>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<label for="lastname">Lastname:</label>
				<input style="margin-left:10px" type="text" placeholder="Lastname" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
			</div>
			
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<label for="date of birth">Date of Birth:</label> 
				<input style="margin-left:10px" type="date" placeholder="Date of birth" id="birth" name="birth" value="<?php echo $birth; ?>" required>
			</div>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<label for="username">Username:</label>
				<input style="margin-left:10px" type="text" placeholder="Username" id="username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<label for="email">Email:</label>
				<input style="margin-left:10px" type="email" placeholder="Email" id="email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<label for="phone">Phone:</label>
				<input style="margin-left:10px" type="phone" placeholder="Phone" id="phone" name="phone" value="<?php echo $phone; ?>" required>
			</div>
			<div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<label for="password">Password:</label>
				<input style="margin-left:10px" type="password" placeholder="Password" id="password" name="password" value="<?php echo $password; ?>" required>
           		 </div>
            
			    <div class="input-group" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="customer_index.php">Login Here</a>.</p>
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