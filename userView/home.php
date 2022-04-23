<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: ../login.php');
}
if ($_SESSION['is_admin'] == 1) {
    die("Access Denied");
}

// default value for testing

$_SESSION['id'] = 5;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="../css/home.css" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/adminNav.css" />


    <title>Home</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            background: rgb(181 200 208 / 70%);

        }

        .nav-bar {
            margin: 0px;
            display: flex;
            background-color: black;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            justify-content: space-between;
            align-items: center;
        }

        .left-nav * {
            padding: 5px;
            text-decoration: none;
        }

        .right-nav {
            display: flex;
            align-items: center;

        }

        .log-out {
            margin-left: 10px;
            display: flex;
        }

        #logOut {
            text-decoration: none;
            margin-left: 15px;
        }

        .user-pic {
            width: 50px;
            height: 50px;
        }

        .main {
            display: flex;
            height: 100%;
        }

        #list {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;

        }


        .product-list-addUser {
            display: flex;
            width: 100%;
            flex-basis: 80%;
            flex-direction: column;

            align-content: center;
            justify-content: baseline;
        }

        .search-bar {
            margin-bottom: 15px;
            width: 100%;
            display: flex;
            justify-content: end;
        }

        #search {
            margin-right: 20px;
            background: rgb(231 235 236);
            border: 1px solid #b4b4cb;
        }


        .select-user {
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 8px;
            height: 5rem;
            background-color: rgb(231, 224, 224);
        }

        .user-title {
            margin-right: 15px;
            font-size: 1.5rem;
            font-weight: bold;
            color: midnightblue;

        }

        #user {
            width: auto;

            text-align: center;
            padding: 2px;
            text-rendering: auto;
            cursor: pointer;
            color: midnightblue;
            font-weight: bold;
            height: 40px;
        }

        .order-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            align-content: center;
        }

        .item-img {
            width: 75px;
            height: 75px;
            border-radius: 15px;
        }

        .products-list {
            padding-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            background-color: rgb(211, 201, 201);

        }

        .produts-list-title {
            margin: 5px;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .items-list {
            display: flex;
            width: 50%;
            justify-content: space-evenly;
        }

        .item {
            border: solid 2px #716ec363;
            border-radius: 15px;
            box-shadow: 0 2.8px 2.2px rgb(0 0 0 / 3%), 0 6.7px 5.3px rgb(0 0 0 / 5%), 0 12.5px 10px rgb(0 0 0 / 6%), 0 22.3px 17.9px rgb(0 0 0 / 7%), 0 41.8px 33.4px rgb(0 0 0 / 9%), 0 100px 80px rgb(0 0 0 / 12%);
            background: rgb(53 149 189 / 18%);

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
        }

        .item:hover {
            cursor: pointer;
        }

        .item div {
            margin-top: 5px;
            font-size: 16px;
        }




        .order-data {
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgb(231, 224, 224);

        }

        .order {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .order p {
            font-size: 2em;
            font-weight: bolder;
            margin-top: 1rem;
            margin-bottom: 1.2rem;
            color: midnightblue;
        }

        .list_element {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            width: 100%;

        }

        .item-name {

            min-width: 50px;
            margin-right: 5px;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: left;
            align-items: center;
        }

        .item-input {
            display: flex;

        }

        .item-input * {
            margin: 5px;
        }

        .item-input input {
            width: 35px;
            text-align: center;
        }

        .item-input button {
            width: min-content;
            text-align: center;
            padding: 0;
            font-weight: bolder;
        }

        .deleteBtn {
            width: 25px;
            text-align: center;
            padding: 0;
            font-weight: bolder;
            background-color: rgb(228, 67, 67);
            color: bisque;

        }

        hr {
            border: 3px solid rgb(147, 156, 147);
            border-radius: 5px;
            width: 100%;
        }

        .order-details {
            font-size: 1em;
            font-weight: bolder;
            margin-top: 0.25rem;
            margin-bottom: 1.2rem;
            color: midnightblue;

        }

        .notes {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #notes {
            resize: none;
            width: 75%;
            margin: 5px;
        }


        #room {
            min-width: 40px;
            width: auto;
            text-align: center;
            font-size: 14px;
        }

        .orderFooter {
            display: flex;
            flex-direction: column;
        }

        .confirm {
            height: 40px;
            font-size: 20px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 70%;
        }

        .all-items {
            display: flex;
        }

        .all-items .order-item {
            border: solid 2px #716ec363;
            border-radius: 15px;
            box-shadow: 0 2.8px 2.2px rgb(0 0 0 / 3%), 0 6.7px 5.3px rgb(0 0 0 / 5%), 0 12.5px 10px rgb(0 0 0 / 6%), 0 22.3px 17.9px rgb(0 0 0 / 7%), 0 41.8px 33.4px rgb(0 0 0 / 9%), 0 100px 80px rgb(0 0 0 / 12%);
            background: rgb(53 149 189 / 18%);

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>

    <!-- TO DO getting all user info  -->

    <?php include('../navbars/user_header.php') ?>

    <div class="main">
        <form class="order-data" id="form" action="insertOrder.php" method="post">
            <div class="order">
                <div id="list"></div>
            </div>
            <hr>
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
            <?php
            include '../pdo.php';
            //latest order
            $user_id = $_SESSION['id'];

            $query = "SELECT p.name , o.quantity ,p.pic FROM order_product o,product p WHERE p.product_id=o.product_id AND order_id=(SELECT order_id FROM orders WHERE user_id=$user_id ORDER by date DESC limit 1 )";
            $stmt = $db->query($query);
            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            echo "<div class='latest-order'>
            <div class='latestOrder-title'>Latest Order</div>
            <div class='all-items'>";

            while ($ele = $stmt->fetch()) {
                echo ("<div class='order-item'>
                <img class='item-img' src={$ele['pic']}  />
                <div>{$ele['name']}</div>
            </div>");
            }
            echo "</div></div>";

            // show all products
            $query = "SELECT product_id,name,price,pic FROM product";
            $stmt = $db->query($query);

            $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            echo "<div class='d-flex'>
            <input class='form-control me-2 search-bar' type='search' placeholder='Search' aria-label='Search'
                name='search' id='search'>
             </div>";
            echo "<div class='products-list'><div class='products-list-title'>Available Products</div>";
            // echo "<div class='search-bar'><input type='text' placeholder='find product' name='search' id='search'></div>";
            echo "<div class='items-list'>";
            while ($ele = $stmt->fetch()) {
                echo ("<div class=item>
                <img class='item-img product'  data-price={$ele['price']} data-name={$ele['name']} data-id={$ele['product_id']} src={$ele['pic']}  />
                <div>{$ele['name']} </div>
                <div>{$ele['price']} L.E</div>

            </div>");
            }
            echo "</div>";
            echo "</div>";
            $db = null;
            ?>
        </div>
    </div>

    <script>
        let items = [...document.getElementsByClassName("product")]


        for (const item of items) {

            item.addEventListener("click", function(e) {
                let orderList = document.getElementById("list")
                let {
                    name,
                    price,
                    id
                } = e.target.dataset;
                price = parseInt(price);

                let elementExist = document.getElementById(`${id}`);
                let total = document.getElementById("total");

                if (elementExist) {
                    return;
                }

                let div = document.createElement("div");
                div.setAttribute("class", "list_element");
                div.setAttribute("id", `${id}`);

                let span = document.createElement("div");
                span.innerText = `${name}`;
                span.setAttribute("class", "item-name");
                div.appendChild(span);
                let counterDiv = document.createElement("div");
                counterDiv.setAttribute("class", "item-input");
                let minusBtn = document.createElement("button");
                minusBtn.setAttribute("class", "minus");
                minusBtn.type = "button";
                minusBtn.innerText = "-";
                counterDiv.appendChild(minusBtn);
                let quantity = document.createElement("input");
                quantity.setAttribute("name", `quantity[${id}]`);
                quantity.setAttribute("type", "text");
                quantity.setAttribute("value", "1");
                quantity.setAttribute("data-price", `${price}`);
                counterDiv.appendChild(quantity);
                let plusBtn = document.createElement("button");
                plusBtn.type = "button";
                plusBtn.innerText = "+";
                plusBtn.setAttribute("class", "plus");
                counterDiv.appendChild(plusBtn)
                div.appendChild(counterDiv);

                let elementPrice = document.createElement("span");

                elementPrice.innerText = `${price}$`
                elementPrice.setAttribute("class", "elementPrice");
                div.appendChild(elementPrice);

                let deleteBtn = document.createElement("button");
                deleteBtn.innerText = "X";
                deleteBtn.type = "button"
                deleteBtn.setAttribute("class", "deleteBtn");
                deleteBtn.addEventListener("click", function() {
                    orderList.removeChild(div);
                    total.innerText = totalOrderPrice() + "$";
                })
                div.appendChild(deleteBtn);
                orderList.appendChild(div);

                minusBtn.addEventListener("click", () => {
                    let count = parseInt(quantity.value) - 1;
                    count = count < 1 ? 1 : count;
                    quantity.value = count;
                    let itemPrice = price * parseInt(quantity.value);
                    elementPrice.innerText = itemPrice + "$";

                    total.innerText = "Total: " + totalOrderPrice() + "$";
                })

                plusBtn.addEventListener("click", () => {
                    let count = parseInt(quantity.value) + 1;
                    quantity.value = count;
                    let itemPrice = price * parseInt(quantity.value);
                    elementPrice.innerText = itemPrice + "$";

                    total.innerText = "Total: " + totalOrderPrice() + "$";

                })

                total.innerText = "Total: " + totalOrderPrice() + "$";
            })
        }


        const totalOrderPrice = function() {
            let eachElementPrice = [...document.getElementsByClassName("elementPrice")];
            let sum = 0;
            for (const item of eachElementPrice) {
                sum += parseInt(item.innerText);
            }

            return sum;
        }

        let searchfield = document.getElementById("search");

        searchfield.addEventListener("keyup", (e) => {
            const searchText = e.target.value;

            [...document.body.getElementsByClassName("item")].forEach(item => {

                if (item.childNodes[1].dataset.name.includes(searchText)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            })

        })

        const form = document.getElementById("form");
    </script>
    <!-- <script src="../js/home.js"></script> -->
</body>

</html>