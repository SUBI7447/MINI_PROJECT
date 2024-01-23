<?php

$email = $_POST['email'];
$otp = $_POST['otp'];

$to_email = $email;
$subject = "AAB MAT BHULNA PASSWORD";
$body = "OTP =   " . ($otp + 9) . " - 6 / 2 ( 1 + 2 ) )               :)";
$headers = "FROM EXIMENATION SYSTEM";

if (mail($to_email, $subject, $body, $headers)) {
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


    <h1>ENTER OTP</h1>

    <form action="submit_forgot.php" method="POST" onsubmit="return validateForm()">

        <input type="hidden" name="email" value="<?php echo $email ?>">
        <input type="password" name="password" id="password" placeholder="ENTER NEW PASSWORD" required><br>

        <input type="password" name="conform_password" id="conform_password" placeholder="CONFORM NEW PASSWORD"
            required><br>

        <input type="number" name="check_otp" placeholder="ENTER OTP">
        <input type="hidden" name="otp" value="<?php echo $otp ?>">
        <button type="submit">VEFIFY</button>

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