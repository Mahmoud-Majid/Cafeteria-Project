<?php 

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
}
if ($_SESSION['is_admin']!=1){
    die ("Access Denied");
}

?>

<?php

    include '../pdo.php';
    
    //select user
    $query = "SELECT user_id,username FROM `user`";
    $stmt = $db->query($query);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/manualOrder.css" />
    <link rel="stylesheet" href="../css/adminNav.css" />

    <title>Manual Order</title>


</head>

<body>

    <?php include('adminNav.html') ?>

    <div class="main">
        <form class="order-data" id="form" action="adminInsertOrder.php" method="post">
            <div class="order">
                <div id="list"></div>
            </div>
            <?php
            echo "<select name='user' id='user'>";
                while ($ele = $stmt->fetch()) 
                {
                    $user_id = $ele['user_id'];
                    $username = $ele['username'];
                    echo "<option value='$user_id'>$username</option>";
                }
            echo"</select>";
            ?>
            <div class="notes">
                <label id="notes" for="notes">Notes:</label>
                <textarea name="notes" id="notes" rows="4" cols="50"></textarea>
            </div>
            <div class="room">
                <label for="room">Room</label>
                <select name="room" id="room">
                    <option value="1001">1001</option>
                    <option value="1002">1002</option>
                    <option value="1003">1003</option>
                </select>
            </div>
            <div class='footer'>
                <div id="orderFooter" class="orderFooter">
                    <hr>
                    <span id=total>Total: 0$</span><br>
                    <hr>
                </div>
                <button class="confirm" type="submit">Confirm</button>
            </div>
        </form>
        <div class="product-list-addUser">
            <div class="d-flex">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search"
                    name='search' id='search'>
            </div>
            <?php
            $query = "SELECT product_id,name,price,pic FROM product";
            $stmt = $db->query($query);

            echo "<div class='items-list '>";
            while ($ele = $stmt->fetch()) {
                echo (
                "<div class='item'>
                    <img class='item-img' data-price={$ele['price']} data-name={$ele['name']} data-id={$ele['product_id']} src='../images/{$ele['pic']}' />
                    <div>{$ele['name']}</div>
                    <div>{$ele['price']}$</div>
                </div>"
            );
            }
            echo "</div>";
            echo "</div>";
            $db = null;
            ?>

        </div>
    </div>

    <script src="../js/manualOrder.js"></script>
    <script>

    </script>
</body>

</html>