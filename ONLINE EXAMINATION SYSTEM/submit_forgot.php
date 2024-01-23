<?php


$check_otp = $_POST['check_otp'];

$otp = $_POST['otp'];

if ($check_otp == $otp) {

    $email = $_POST['email'];
    $u_password = $_POST['password'];


    $hash = password_hash($u_password, PASSWORD_DEFAULT);




    if (isset($_POST['email'])) {


        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if (!$con) {


            die("fail");
        }


        $sql = "SELECT * FROM `mini_project`.`user_information`
     WHERE email = '$email' ;";



        $result = mysqli_query($con, $sql);


        if ($result) {


            $row_count = mysqli_num_rows($result);

            if ($row_count > 0) {


                $sql = "UPDATE mini_project.user_information SET `PASSWORD` = '$hash' WHERE `EMAIL` = '$email';
                ";

                if ($con->query($sql) == true) {

                    echo "ACCOUNT UPDATED SUCCESSFULY <br>";

                    $inser = true;

                } else {
                    echo "Error: " . $con->error;
                    $inser = false;
                }

                echo "ACCOUNT EMAIL : " . $email . "<br>";
                echo "ACCOUNT PASSWORD : " . $u_password . "<br>";
                // echo "ACCOUNT PASSWORD : " . $hash . "<br>";

            } else {

                echo "EMAIL DOES'T EXIST PLEASE SIGN UP ";


            }
        } else {

            echo "UN SUCCESSFULL";

        }





        $con->close();

    }

} else {

    echo "AYIEN";

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

    <button id="goBackButton">RE-ENTER OTP </button>
    <br><br>


    <form method="post" action="index.php">
        <button type="submit">LOG IN </button>
    </form>
    <form method="post" action="sign_up.php">
        <button type="submit">SIGN UP </button>
    </form>

</body>

</html>

<script>
    // Function to go back to the previous page
    function goBack() {
        window.history.back();
    }
    // Add a click event listener to the button
    document.getElementById('goBackButton').addEventListener('click', goBack);
</script>