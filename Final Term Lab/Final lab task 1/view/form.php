<?php
$errors = [];
$old = [];

if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
}

if (isset($_GET['old'])) {
    $old = json_decode($_GET['old'], true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Form</title>

    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>User Information Form</h2>

    <form action="formValidation.php" method="POST">

        Username:
        <input type="text" name="username" value="<?= $old['username'] ?? '' ?>">
        <div class="error"><?= $errors['username'] ?? '' ?></div>

        Name:
        <input type="text" name="name" value="<?= $old['name'] ?? '' ?>">
        <div class="error"><?= $errors['name'] ?? '' ?></div>

        Email:
        <input type="email" name="email" value="<?= $old['email'] ?? '' ?>">
        <div class="error"><?= $errors['email'] ?? '' ?></div>

        Phone:
        <input type="text" name="phone" value="<?= $old['phone'] ?? '' ?>">
        <div class="error"><?= $errors['phone'] ?? '' ?></div>

        <button type="submit">Submit</button>

    </form>
</div>

</body>
</html>