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
            background-image: url('background_profile.jpeg');

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
    <h1>JOIN TEST</h1>

    <form action="check_test.php" method="POST">

        <input type="text" name="test_id" id="test_id" placeholder="ENTER TEST ID" required><br>
        <input type="password" name="t_password" id="t_password" placeholder="ENTER TEST PASSWORD" required><br>

        
        <button type="submit">JOIN TEST</button>

    </form>

    



</body>

</html>