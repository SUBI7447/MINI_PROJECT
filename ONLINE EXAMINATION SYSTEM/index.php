<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN_PAGE</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            /* Set the background image URL */
            background-image: url('background.jpg');

            /* Specify how the background image should behave */
            background-size: cover;
            /* Cover the entire background */
            background-position: center center;
            /* Center the background image */
            background-repeat: no-repeat;
            /* Do not repeat the background image */
            background-attachment: fixed;
            /* Fixed background, doesn't scroll with the content */
        }
    </style>

</head>

<body>
    <h1>LOG IN</h1>
    <br><br><br><br><br><br>

    <form action="check.php" method="POST">

        <input type="email" name="email" id="email" placeholder="ENTER EMAIL" required><br>
        <input type="password" name="password" id="password" placeholder="ENTER PASSWORD" required><br>

        <br><br><br><br><br>

        <button type="submit">LOGIN</button>

    </form>


    <br>
    <a href="sign_up.php">

        <button>SIGN UP</button>

    </a>


</body>

</html>