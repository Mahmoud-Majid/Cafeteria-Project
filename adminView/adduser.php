<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

  session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
      header('Location: ../login.php');
  }
  if ($_SESSION['is_admin']!=1){
      die ("Access Denied");     //????
  }
    include('../navbars/admin_header.php');

    if(isset($_GET['errors'])){
		$errors = json_decode($_GET['errors']);
        // var_dump($errors);
        // exit;
    
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Niconne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" >
    <link rel="stylesheet" href="../css/adduser.css">  
    <link rel="stylesheet" href="../css/admin_header.css"> 
    <style>
        .error{
            color:red;
           font-family: 'Niconne', cursive;
        }
    </style>
</head>
<body>
    <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0 alert-warning">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Sign Up Customer Account</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <!-- <form id=""> -->
                            <!-- fieldsets -->
                            <form class="msform" action="validateUser.php" method="post" enctype="multipart/form-data">
                            <fieldset  id="first-fieldset">
                                <div class="form-card">
                                    <h2 class="fs-title">Account Information</h2> 
                                    <input type="hidden" name="formType" value="1" />
                                    <input type="text" name="username" placeholder="Username" /> 
		                            <p class="error"><?php if(isset($errors->username)){echo $errors->username;}?></p>	
                                    <input type="email" name="email" placeholder="Email Id" />
		                            <p class="error"><?php if(isset($errors->email)){echo $errors->email;}?></p>	
                                    <input type="password" name="password" placeholder="Password" /> 
		                            <p class="error"><?php if(isset($errors->password)){echo $errors->password;}?></p>	
                                    <input type="password" name="confirmpass" placeholder="Confirm Password" />
		                            <p class="error"><?php if(isset($errors->confirmpass)){echo $errors->confirmpass;}?></p>	
                                </div> 
                                <!-- <input type="submit" name="submit" class="action-button submit" value="Submit" /> -->
                                <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <!-- </form> -->
                            <!-- <form class="msform" action="validateUser.php" method="post" enctype="multipart/form-data"> -->
                            <fieldset id="second-fieldset">
                                <div class="form-card">
                                    <h2 class="fs-title">Personal Information</h2> 
                                    <input type="hidden" name="formType" value="2" />
                                    <input type="number" name="room" placeholder="Room No." /> 
		                            <p class="error"><?php if(isset($errors->room)){echo $errors->room;}?></p>	
                                    <input type="number" name="ext" placeholder="Contact No." /> 
		                            <p class="error"><?php if(isset($errors->ext)){echo $errors->ext;}?></p>	
                                    <input type="file" name="image" placeholder="Image" />
		                            <p class="error"><?php if(isset($errors->image)){echo $errors->image;}?></p>	
                                </div> 
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                <input type="submit" name="submit" class=" action-button submit" value="Submit" />
                                <!-- <button type="submit" class="btn btn-warning">Submit</button> -->
                            </fieldset>
                            </form>
                            <!-- <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3"> <img src="logo.png" class="fit-image"> </div>
                                    </div> <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset> -->
                        <!-- </form>  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../js/adduser.js"></script> 
</body>
</html>