<?php

session_start();
// If the user is not logged in redirect to the login page...
// if (!isset($_SESSION['loggedin'])) {
//     header('Location: ../login.php');
// }
// if ($_SESSION['is_admin']!=1){
//     die ("Access Denied");
// }
$user_id = $_POST['user'];
$products = $_POST['itemId[]'];
// var_dump($products);

$products = $_POST['quantity'];

if (!empty($products)) {
    include '../pdo.php';

    ///insert into orders table 
    $sql = "INSERT INTO orders (user_id , status) VALUES($user_id, 'processing')";
    $db->exec($sql);
    $order_id = $db->lastInsertId();


    ///insert into order_product table 
    
    foreach ($products as $id => $qunatity) {
        $sql = "INSERT INTO order_product (order_id , product_id , quantity) VALUES( $order_id , '$id', 1)";
        $db->exec($sql);
    }
    echo json_encode("success");
}
else{
    header("location: manualOrder.php");
}
$db = null;