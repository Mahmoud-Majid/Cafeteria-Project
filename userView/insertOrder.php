<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
}
if ($_SESSION['is_admin']==1){
    die ("Access Denied");
}

$user_id = $_SESSION['id'];
if (empty($_POST['quantity']))
{
    header("location: home.php");
}
$products = $_POST['quantity'];

    include '../pdo.php';

    //insert into orders table 
  
    $sql = "INSERT INTO orders (user_id , status) 
    VALUES($user_id, 'processing')";
    $db->exec($sql);

    $order_id = $db->lastInsertId();


    ///insert into order_product table 
    foreach ($products as $id => $quantity) {
        $sql = "INSERT INTO order_product (order_id , product_id , quantity) VALUES( $order_id , $id, '$quantity')";
        $db->exec($sql);
    }
    header("location: home.php");

$db = null;