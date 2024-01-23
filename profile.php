<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
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
    <?php


    session_start();
    $user_email = $_SESSION['email']; // Access the variable set in file1.php
    

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);




    if (!$con) {


        die("fail");
    }
    // Retrieve data from the database
    $sql = "SELECT `NAME`, `EMAIL`  FROM  `mini_project`.`user_information`  WHERE `EMAIL`='$user_email'  ";
    $result = mysqli_query($con, $sql);



    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "USER NAME: " . $row['NAME'] . "<br>";
            echo "USER EMAIL: " . $row['EMAIL'];
        } else {
            echo "No user found with the given email.";
        }
    } else {
        echo "Error in the SQL query: " . mysqli_error($con);
    }




    $sql = "SELECT  `test_id`,`test_name`,`date`,`total_marks`,`marks_obtain`,`pass / fail`,`date` FROM  `mini_project`.`test_information`  WHERE `user_email`='$user_email'  ORDER BY date DESC";
    $result = mysqli_query($con, $sql);


    echo"<h1>TEST ATTEMPTED </h1>";


    echo "<table>";
    echo "<tr><th>TEST ID</th><th>TEST NAME</th><th>TEST DATE</th><th>TOTAL MARKS</th><th>MARKS OBTAIN</th><th>RESULT(PASS/FAIL)</th><th>DATE</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['test_id'] . "</td>";
        echo "<td>" . $row['test_name'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['total_marks'] . "</td>";
        echo "<td>" . $row['marks_obtain'] . "</td>";
        echo "<td>" . $row['pass / fail'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";


    $sql = "SELECT * FROM `mini_project`.`test_details` WHERE `created_by`='$user_email';";
    $result = mysqli_query($con, $sql);


    echo"<h1><br><br><br><br>TEST CREATED </h1>";
    echo "<table>";
    echo "<tr><th>TEST ID</th><th>TEST NAMEE</th><th>TEST PASSWORD</th><th>TEST TIME</th><th>TOTAL MARKS</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['test_id'] . "</td>";
        echo "<td>" . $row['test_name'] . "</td>";
        echo "<td>" . $row['test_password'] . "</td>";
        echo "<td>" . $row['test_time'] . "</td>";
        echo "<td>" . $row['total_marks'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";


    if ($con->query($sql) == true) {

        //echo "SUCCESS";
    
        $inser = true;
        ;
    }

    $con->close();



    ?>


    <br>


    <a href="homepage.html">
        <button>GO TO HOME</button>
    </a>
    <a href="forgot.php">
        <button>CHANGE PASSWORD</button>
    </a>

</body>

</html>