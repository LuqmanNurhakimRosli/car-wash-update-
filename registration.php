<?php
require('db.php');

// When form submitted, insert values into the database.
if (isset($_REQUEST['username'])) {
    // Remove backslashes
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con, $name);

    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);

    $contactnumber = stripslashes($_REQUEST['contactnumber']);
    $contactnumber = mysqli_real_escape_string($con, $contactnumber);

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);

    $create_datetime = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (name, username, password, contactnumber, email, create_datetime)
              VALUES ('$name','$username', '" . md5($password) . "','$contactnumber', '$email', '$create_datetime')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='index.php'>login</a></p>
              </div>";
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
              </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("wp3203647.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .form h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form input[type="submit"] {
            background-color: #3272f1;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form input[type="submit"]:hover {
            background-color: #244ec9;
        }

        .link a {
            color: #3272f1;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .form p {
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name" />
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="contactnumber" placeholder="Contact Number" />
        <input type="text" class="login-input" name="email" placeholder="Email Address" />
        <input type="password" class="login-input" name="password" placeholder="Password" />
        <input type="submit" name="submit" value="Register" class="login-button" />
        <p class="link">
            <a href="index.php">Click to Login</a>
        </p>
    </form>
</body>
</html>
