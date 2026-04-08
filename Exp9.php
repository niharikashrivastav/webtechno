<?php

$name = $email = $password = "";
$nameErr = $emailErr = $passErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } elseif (strlen($_POST["password"]) < 6) {
        $passErr = "Minimum 6 characters required";
    } else {
        $password = $_POST["password"];
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Experiment 9</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(135deg, #ffedd5, #fdba74);
        }

        .container {
            width: 350px;
            margin: 80px auto;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #ea580c;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #fed7aa;
            border-radius: 8px;
        }

        input:focus {
            border-color: #fb923c;
            box-shadow: 0 0 5px #fdba74;
        }

        .btn {
            background: #f97316;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background: #ea580c;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Registration Form</h2>

    <form method="post">
        Name:
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>

        Email:
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        Password:
        <input type="password" name="password">
        <span class="error"><?php echo $passErr; ?></span>

        <input type="submit" value="Submit" class="btn">
    </form>

    <?php
    if ($name && $email && $password && !$nameErr && !$emailErr && !$passErr) {
        echo "<p class='success'>Form submitted successfully!</p>";
    }
    ?>
</div>

</body>
</html>