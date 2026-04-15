<?php

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$errors = [];
$old = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $old = $_POST;

    if (empty($_POST["username"])) {
        $errors["username"] = "Username is required";
    } else {
        $username = cleanInput($_POST["username"]);
    }

    if (empty($_POST["name"])) {
        $errors["name"] = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Invalid email";
        }
    }

    if (empty($_POST["phone"])) {
        $errors["phone"] = "Phone is required";
    } else {
        $phone = cleanInput($_POST["phone"]);
        if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
            $errors["phone"] = "Invalid phone number";
        }
    }

    if (!empty($errors)) {
        header("Location: form.php?errors=" . urlencode(json_encode($errors)) . "&old=" . urlencode(json_encode($old)));
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>

    <style>
        body {
            background: linear-gradient(to right, #43cea2, #185a9d);
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .success-box {
            background: rgba(255,255,255,0.1);
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.3);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 8px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: white;
            color: #185a9d;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        a:hover {
            background: #ddd;
        }
    </style>
</head>

<body>

<div class="success-box">
    <h1>✅ Form Submitted Successfully!</h1>

    <p><strong>Username:</strong> <?= $username ?></p>
    <p><strong>Name:</strong> <?= $name ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Phone:</strong> <?= $phone ?></p>

    <a href="form.php">⬅ Go Back</a>
</div>

</body>
</html>