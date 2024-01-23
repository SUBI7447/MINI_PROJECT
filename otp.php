<?php

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$otp = $_POST['otp'];

$to_email = $email;
$subject = "DKHO WO AAGAYA";
$body = "OTP =   ".($otp + 9)." - 6 / 2 ( 1 + 2 ) )               :)";
$headers = "From: subodhsubi362gmail.com";

if(mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

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

    <br><br>
    <h1>ENTER OTP</h1>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <form action="submit.php" method="POST">

        <input type="hidden" name="name" value="<?php echo $name ?>">
        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="hidden" name="password" value="<?php echo $password ?>">

        <input type="number" name="check_otp" placeholder="ENTER OTP">
        <input type="hidden" name="otp" value="<?php echo $otp ?>">
        <br><br>
        <button type="submit">VEFIFY</button>

    </form>

</body>

</html>