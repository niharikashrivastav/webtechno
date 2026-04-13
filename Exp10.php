<?php
session_start();

// Handle Login
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $_SESSION["user"] = $username;

    // Cookie (1 hour)
    setcookie("user", $username, time() + 3600);
}

// Handle Add to Cart
if (isset($_GET["item"])) {
    $item = $_GET["item"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $_SESSION["cart"][] = $item;
}

// Handle Logout
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: restaurant.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Store</title>
    <style>
        body {
            font-family: Arial;
            background: #ffe6f0;
            text-align: center;
        }
        .box {
            background: white;
            padding: 20px;
            margin: 20px auto;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        a {
            text-decoration: none;
            color: white;
            background: #ff4d88;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>🍽️ Restaurant Login</h2>

    <?php if (!isset($_SESSION["user"])) { ?>
        <form method="post">
            <input type="text" name="username" placeholder="Enter Name" required><br><br>
            <button type="submit" name="login">Login</button>
        </form>
    <?php } else { ?>
        <h3>Welcome, <?php echo $_SESSION["user"]; ?></h3>

        <?php
        if (isset($_COOKIE["user"])) {
            echo "<p>Cookie: " . $_COOKIE["user"] . "</p>";
        }
        ?>

        <a href="?logout=true">Logout</a>
    <?php } ?>
</div>

<?php if (isset($_SESSION["user"])) { ?>

<div class="box">
    <h2>🍕 Menu</h2>
    <p>Pizza <a href="?item=Pizza">Add</a></p>
    <p>Burger <a href="?item=Burger">Add</a></p>
    <p>Pasta <a href="?item=Pasta">Add</a></p>
</div>

<div class="box">
    <h2>🛒 Cart</h2>

    <?php
    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
        foreach ($_SESSION["cart"] as $item) {
            echo $item . "<br>";
        }
    } else {
        echo "Cart is empty";
    }
    ?>
</div>

<?php } ?>

</body>
</html>