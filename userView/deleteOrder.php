<?php
ob_start();
 include("./userOrder.php");
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
}
if ($_SESSION['is_admin'] == 1) {
    die("Access Denied");
}
$opj = new Order();
    $id = $_GET['id'];
    $result1=$opj->deletefromProdactOrder($id);
    $result1=$opj->deleteOrder( $id );
    header('Location: ./userOrder.php');
?>