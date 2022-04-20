<?php 

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
}
if ($_SESSION['is_admin']!=1){
    die ("Access Denied");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../css/test.css" /> -->
    <link rel="stylesheet" href="../css/manualOrder.css" />
    <link rel="stylesheet" href="../css/adminNav.css" />

    <title>Manual Order</title>
</head>

<body>
    <?php include('../navbars/adminNav.html') ?>

    <div class="main">
        <form action="addOrderToUser.php" method="POST" id="form" class="order-data">

            <?php
                echo"<div class='select-user'>
                <div class='user-title'>Add To User: </div>           
                <select name='user' id='user'>";

                while ($ele = $stmt->fetch()) {
                echo" <option value='{$ele['user_id']}'>{$ele['username']}</option>";
                }

                echo"</select>
                </div> ";    
            ?>
            <div class="order">

                <div id="list"></div>
            </div>
            <hr>
            <div class="notes">
                <label id="notes" for="notes">Notes:</label>
                <textarea name="notes" id="notes" rows="4" cols="50">
                    </textarea>
            </div>
            <div class="room">
                <label for="room">Room</label>
                <select name="room" id="room">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div class='footer'>
                <div id="orderFooter" class="orderFooter">
                    <hr>
                    <span id=total>Total: 0 $</span><br>
                    <hr>
                </div>
                <button class="confirm" type="submit">Confirm</button>
            </div>
        </form>

        <div class="product-list-addUser">


            <?php
            include '../pdo.php';
            //select user
            $query = "SELECT user_id,username FROM `user`";
            $stmt = $db->query($query);
            echo"<div class='select-user'>
            <div class='user-title'>Add To User: </div>           
            <select name='user' id='user'>";

            while ($ele = $stmt->fetch()) {
               echo" <option value='{$ele['user_id']}'>{$ele['username']}</option>";
            }
            
            echo"</select>
            </div> ";
            //show all products
            $query = "SELECT product_id,name,price,pic FROM product";
            $stmt = $db->query($query);

            ?>

            <form class="d-flex">
                <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search"
                    name='search' id='search'>
            </form>
            <?php
            echo "<div class='items-list'>";
            while ($ele = $stmt->fetch()) {
                echo (
                "<div class='item'>
                    <img class='item-img' data-price={$ele['price']} data-name={$ele['name']} data-id={$ele['product_id']} src='../images/{$ele['pic']}' />
                    <div>{$ele['name']}</div>
                    <div>{$ele['price']}$</div>
                </div>");
            }
            echo "</div>";
            echo "</div>";
            $db = null;
            ?>

        </div>
    </div>

    <script src="../js/manualOrder.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>