<?php


$otp = rand(1111, 9999);
?>

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

    <form action="otp_forgot.php" method="post">

        <input type="email" name="email" id="email" placeholder="ENTER EMAIL" required><br>

        <input type="hidden" name="otp" value="<?php echo $otp; ?>  ">

        <button type="submit">SEND OTP</button>



    </form>

</body>

</html>