<?php


$test_name = $_POST["test_name"];

session_start();
$user_email = $_SESSION['email']; // Access the variable set in file1.php
// $user_email = $_POST["email"];
$test_password = $_POST["test_password"];
$test_time = $_POST["test_time"];
$total_mark = $_POST["total_mark"];
$total_questions = $_POST["total_questions"];

// You can access the dynamically created question fields here




if (isset($_POST['test_name'])) {


    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {

        die("fail");
    }

    $test_id = null;

    // Your SQL query to get the test_id from the "test_information" table
    $sql = "SELECT MAX(test_id) as max_test_id FROM `mini_project`.`test_details`";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $test_id = $row['max_test_id'];
    }


    $test_id = $test_id + 1234;




    $sql = "INSERT INTO `mini_project`.`test_details` (`created_by`,`test_id`, `test_name`, `test_password`, `test_time`, `total_marks`) VALUES 
    ('$user_email','$test_id', '$test_name', '$test_password', '$test_time', '$total_mark');";



    $result = mysqli_query($con, $sql);

    if ($result) {

        echo "TEST CREATED SUCCESSFULLY <br>";
    }


    for ($i = 1; $i <= $total_questions; $i++) {
        $question = $_POST["question_" . $i];
        $answer = $_POST["answer_" . $i];
        $mark = $_POST["mark_" . $i];


        $sql = "INSERT INTO `mini_project`.`question_deatils` (`test_id`, `question`, `answer`, `mark`) VALUES ('$test_id', '$question', '$answer', '$mark');";


        $result = mysqli_query($con, $sql);


    }

    //$result = mysqli_query($con, $sql);

    if ($result) {

        echo "QUECREATED SUCCESSFULLY <br>";
    }

    echo "TEST ID : " . "$test_id" . "<br>";
    echo "TEST PASSWORD : " . "$test_password" . "<br>";





    $con->close();

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>


    <form method="post" action="profile.php">
        <button type="submit">GO TO PROFILE </button>
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