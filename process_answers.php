<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>
    <?php


    echo " <h1> RESULT</h1>";

    // $userInputs = $_POST['user_input'];
    

    // // Loop through the array and process each input
    // foreach ($userInputs as $index => $input) {
    
    //     echo "Answer for question " . ($index + 1) . ": " . htmlspecialchars($input) . "<br>";
    //     // Perform any processing or validation here
    // }
    


    session_start();
    $user_email = $_SESSION['email']; // Access the variable set in file1.php
    

    $test_id = $_SESSION['test_id']; // Access the variable set in file1.php
    

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);




    if (!$con) {


        die("fail");
    }
    // Retrieve data from the database
    
    $sql = "SELECT question,answer,mark FROM `mini_project`.`question_deatils` WHERE `test_id`=$test_id ";

    $result = mysqli_query($con, $sql);


    echo "<table>";
    echo "<tr><th>QUE.NO</th><th>QUESTIONS</th><th>YOUR ANSWER</th><th>CORRECT ANSWER</th><th>MARK</th><th>MARK OBTAIN </th></tr>";
    $i = 0;
    $t_marks = 0;
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>" . ($i + 1) . "</td>";

        echo "<td>" . $row['question'] . "</td>";
        echo "<td>" . htmlspecialchars($_POST['user_input'][$i]) . "</td>";
        echo "<td>" . $row['answer'] . "</td>";
        echo "<td>" . $row['mark'] . "</td>";

        if ($row['answer'] == htmlspecialchars($_POST['user_input'][$i])) {

            echo "<td>" . $row['mark'] . "</td>";

            $t_marks += $row['mark'];

        } else {

            echo "<td>" . "0" . "</td>";


        }

        echo "</tr>";
        $i++;
    }

    echo "</table>";





    $sql = "SELECT test_name,total_marks FROM `mini_project`.`test_details` WHERE `test_id`=$test_id ";

    $result = mysqli_query($con, $sql);

    if ($result) {
        // Fetch the first row from the result set
        $row = mysqli_fetch_assoc($result);

        // Check if a row was retrieved
        if ($row) {
            // Store the values in two separate variables
            $testName = $row['test_name'];
            $totalMarks = $row['total_marks'];

            // Now, $testName and $totalMarks contain the respective values
            // echo "Test Name: $testName, Total Marks: $totalMarks";
        } else {
            echo "No matching record found for the provided test ID.";
        }
    }


    if ($t_marks >= (($totalMarks * 35) / 100)) {

        $result = "pass";

    } else {
        $result = "fail";

    }

    $sql = "INSERT INTO `mini_project`.`test_information` (`user_email`, `test_id`, `test_name`, `total_marks`, `marks_obtain`, `pass / fail`, `date`) 
    VALUES ('$user_email', '$test_id', '$testName', '$totalMarks', '$t_marks', '$result', current_timestamp());";

  //  $result = mysqli_query($con, $sql);

    if ($con->query($sql) == true) {

        //echo "SUCCESS";
    
        $inser = true;
        ;
    }

    $con->close();

    ?>

    <a href="profile.php">
        <button>GO TO PROFILE</button>
    </a>

</body>

</html>