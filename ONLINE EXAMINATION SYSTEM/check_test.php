<?php



$test_id = $_POST['test_id'];
$t_password = $_POST['t_password'];


session_start();
$user_email = $_SESSION['email']; // Access the variable set in file1.php




if (isset($_POST['test_id'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);


    if (!$con) {

        die("fail");

    }



    $sql = "SELECT test_time FROM `mini_project`.`test_details` WHERE ( test_id = '$test_id'  && test_password='$t_password'); ";

    $result = mysqli_query($con, $sql);

    $row_count = mysqli_num_rows($result);

    if ($result) {


        if (($row_count > 0)) {


            $sql = "SELECT user_email FROM `mini_project`.`test_information` WHERE ( test_id = '$test_id'  && user_email='$user_email'); ";

            $result = mysqli_query($con, $sql);

            $row_count = mysqli_num_rows($result);

            if (($row_count > 0)) {


                header("Location: test_already_given.php");
                exit;

            } else {


                $row = mysqli_fetch_assoc($result);
                $test_time = $row['test_time'];

                $_SESSION['test_id'] = $test_id;
                $_SESSION['test_time'] = $test_time;



                header("Location: test_page.php");
                exit;

            }

        } else {

            echo $row_count;

            // echo $test_id;
            // echo $t_password;
            header("Location: test_check_fail.php");
            exit;

        }
    } else {
        echo "Query Failed"; // Query execution failed
    }

    $con->close();

}

?>