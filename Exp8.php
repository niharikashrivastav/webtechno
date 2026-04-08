<?php

$name = "";
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($name == "" || $email == "" || $password == "") {
        echo "<p class='error'>All fields are required!</p>";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p class='error'>Invalid email format!</p>";
    } 
    elseif (strlen($password) < 6) {
        echo "<p class='error'>Password must be at least 6 characters!</p>";
    } 
    else {
        echo "<p class='success'>Form submitted successfully!</p>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Orange Theme Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ffedd5, #fdba74);
        }

        .container {
            width: 350px;
            margin: 80px auto;
            padding: 25px;
            background: white;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #ea580c;
        }

        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #fed7aa;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #fb923c;
            box-shadow: 0 0 5px #fdba74;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
        }

        .error {
            color: #dc2626;
            text-align: center;
        }

        .success {
            color: #16a34a;
            text-align: center;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Registration Form</h2>
    <form method="post">
        Name:
        <input type="text" name="name">

        Email:
        <input type="text" name="email">

        Password:
        <input type="password" name="password">

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>