<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    
    require "pdo.php";

    $errors = [];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) or $username=="") {
        $errors["username"] = "Username is required!";
    }
    if (empty($password) or $password=="") {
        $errors["password"] = "Password is required!";
    }

    try{
        $select_query = "SELECT * FROM user where `username`=:username";
        $select_stmt = $db->prepare($select_query);
        $select_stmt->bindParam(':username', $username);
        $result = $select_stmt->execute(); 
        $row = $select_stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($row as $user) {
           $user_username = $user->username;
           $user_hashed_password = $user->password;
        }
        
        // if($username == $user_username && password_verify($password, $user_hashed_password)){
        //     echo('hello in users pages!');
        //     // header("Location:users.php");
        // }
        if($username != $user_username){
            $errors["username"] = "Wrong username!";
        }
        if(!empty($password) && !password_verify($password, $user_hashed_password)){
            $errors["password"] = "Wrong password!";
        }

        if(sizeof($errors)>0){
            $errors = json_encode($errors);
            header("Location:./login.php?errors={$errors}");
        }else{
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $user->username;
            $_SESSION['id'] = $user->user_id;
            $_SESSION['profile_pic']=$user->profile_pic;
            $_SESSION['is_admin']=$user->is_admin;

            if($user->is_admin){
                header('Location: adminView/add_user.php');
            }
            else{
                // header('Location: userPages/home.php');
                echo "hello in user pages!";
            }
        }
    

    }catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
