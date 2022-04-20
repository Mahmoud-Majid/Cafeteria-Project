<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);


    if(isset($_GET['errors'])){
		$errors = json_decode($_GET['errors']);
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">   
    <link rel="stylesheet" href="css/main.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
    <title>Login</title>
</head>
<body>
    <div class="alert alert-warning parent" style="width: 30%;">
        <h1 class="text-center text-color">Reset Password</h1>
        <form action="reset_password_validation.php" method="post" enctype="multipart/form-data">
            
            <div class="form-group">
              <label for="username" class="text-color text-size">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="<?php if(isset(($old)->username)) {echo $old->username;}?>">
		      <p class="error"><?php if(isset($errors->username)){echo $errors->username;}?></p>	
            </div>
            <div class="form-group">
              <label for="password" class="text-color text-size">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter New Password">
		      <p class="error"><?php if(isset($errors->password)){echo $errors->password;}?></p>	
            </div>
            <div class="form-group">
              <label for="confirmpass" class="text-color text-size">Confirm Password</label>
              <input type="password" name="confirmpass" class="form-control" id="confirmpass" placeholder="Confirm Password">
		      <p class="error"><?php if(isset($errors->confirmpass)){echo $errors->confirmpass;}?></p>	
            </div>
            <div class="text-center">
            <button type="submit" class="btn btn-warning text-color">Reset</button>
            <br><br>
            <a href="login.php" class="text-color">Remembered your password? Log in.</a>
            <div>
          </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
</body>
</html>
