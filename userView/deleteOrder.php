<?php
include("./userOrder.php");
$opj = new Order();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result1=$opj->deletefromProdactOrder($id);
    $result1=$opj->deleteOrder( $id );

    if(!$result1) {
        die("Query Failed.");
      }
    
      $_SESSION['message'] = 'order Removed Successfully';
      $_SESSION['message_type'] = 'danger';
      header('Location: userOrder.php');
    }

?>