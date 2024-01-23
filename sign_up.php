<?php

$otp = rand(1111, 9999);

?>

<h1>SIGN UP</h1>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    <form action="otp.php" method="POST" onsubmit="return validateForm()" >

        <input type="name" name="name" id="name" placeholder="ENTER NAME" required><br>
        <input type="email" name="email" id="email" placeholder="ENTER EMAIL" required><br>
        <input type="password" name="password" id="password" placeholder="ENTER PASSWORD" required><br>
        <input type="password" name="conform_password" id="conform_password" placeholder="CONFORM PASSWORD"
            required><br>
        <input type="hidden" name="otp" value="<?php echo $otp; ?>  ">

        <button type="submit">SIGN UP</button>

    </form>

</body>

</html>


<script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var conformPassword = document.getElementById("conform_password").value;

        if (password !== conformPassword) {
            alert("Password and Conform Password do not match.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>