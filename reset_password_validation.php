<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require "pdo.php";

    $errors = [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpass'];

    if (empty($username) or $username=="") {
        $errors["username"] = "Username is required!";
    }
    if (empty($password) or $password=="") {
        $errors["password"] = "Password is required!";
    }
    if (empty($confirm_password ) or $confirm_password=="") {
        $errors["confirmpass"] = "Confirm your password!";
    }
    if($password != $confirm_password ){
        $errors["confirmpass"] = "Not matched password!";
    }

    try{
        $select_query = "SELECT * FROM user where `username`=:username";
        $select_stmt = $db->prepare($select_query);
        $select_stmt->bindParam(':username', $username);
        $result = $select_stmt->execute(); 
        $row = $select_stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($row as $user) {
           $user_username = $user->username;
        }
        
        if($username == $user_username){
            $update_query = 'UPDATE user SET  `password` = :password WHERE `username` = :username';
            $update_stmt= $db->prepare($update_query);
            $update_stmt->bindParam(':username', $username);
            $update_stmt->bindParam(':password', $password);
            $res = $update_stmt->execute();
            if($res){
                echo "password update!";
                // header("Location:./login.php");
            }else{
                echo "can't update the password!";
            }
        }
        if($username != $user_username){
            $errors["username"] = "User not found!";
        }

        if(sizeof($errors)>0){
            $errors = json_encode($errors);
            header("Location:./forget_password.php?errors={$errors}");
        }
    

    }catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>