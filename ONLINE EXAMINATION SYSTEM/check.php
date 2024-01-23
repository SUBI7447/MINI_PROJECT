<?php



$email = $_POST['email'];
$u_password = $_POST['password'];



session_start();
$_SESSION['email'] = $email;


if (isset($_POST['email'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);


    if (!$con) {

        die("fail");

    }



    $sql = "SELECT PASSWORD FROM `mini_project`.`user_information` WHERE email = '$email';";

    $result = mysqli_query($con, $sql);

    $row_count = mysqli_num_rows($result);

    if ($result) {


        if (($row_count > 0)) {

            $row = mysqli_fetch_assoc($result);

            if (password_verify($u_password, $row["PASSWORD"])) {

                // echo $hash;

                header("Location: homepage.html");
                exit;
            } else {

                // echo $hash."<br>";
                // echo"incorrect";
                header("Location: login_fail.html");
                exit;
            }


        } else {

            header("Location: login_fail.html");
            exit;

        }
    } else {
        echo "Query Failed"; // Query execution failed
    }

    $con->close();

}

?>