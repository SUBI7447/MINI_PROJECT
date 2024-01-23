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
                background - image: url('background_profile.jpeg');

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
    <script>
        // Browser Detection
        var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
        var isFirefox = /Firefox/.test(navigator.userAgent);

        // Redirect if not using supported browsers
        if (!isChrome && !isFirefox) {
            window.location.href = 'unsupported_browser.php'; // Replace with the actual page or action
        }

        // Disable Right-Click
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
            alert("Right-clicking is not allowed during the exam.");
            // You might want to take additional actions, such as logging the attempt.
        });

        // Disable Copying/Pasting
        document.addEventListener('copy', function (e) {
            e.preventDefault();
            alert("Copying is not allowed during the exam.");
            // You might want to take additional actions, such as logging the attempt.
        });

        document.addEventListener('paste', function (e) {
            e.preventDefault();
            alert("Pasting is not allowed during the exam.");
            // You might want to take additional actions, such as logging the attempt.
        });

        // Get the time limit from the PHP variable
        var testTime = <?php echo isset($_SESSION['test_time']) ? (int)$_SESSION['test_time'] : 300; ?>;

        function updateTimer() {
            var minutes = Math.floor(testTime / 60);
            var seconds = testTime % 60;

            document.getElementById('timer').innerHTML = minutes + 'm ' + seconds + 's';

            if (testTime <= 0) {
                document.getElementById('timerForm').submit();
            } else {
                testTime--;
                setTimeout(updateTimer, 1000);
            }
        }


        window.onload = function () {


            if (performance.navigation.type == 1) {
                // Page reloaded
                alert("Please don't refresh the page!");
            } else if (performance.navigation.type == 2) {
                // Page opened using the back/forward button
                alert("Please don't use the back/forward button!");
            }

            updateTimer();
        }

        if (window.history && window.history.pushState) {
            window.addEventListener('popstate', function (e) {
                // The user pressed back/forward button
                alert("Please don't use the back/forward button!");
                history.go(1);
            });
        }

    </script>

</head>

<body>


    <h1>Timed Form</h1>
    <p>Time Remaining: <span id="timer"></span></p>
    <?php


    // Set no-caching headers
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");


    session_start();
    $user_email = $_SESSION['email']; // Access the variable set in file1.php
    
    $test_id = $_SESSION['test_id']; // Access the variable set in file1.php
    $test_time = $_SESSION['test_time']; // Access the variable set in file1.php
    

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);




    if(!$con) {


        die("fail");
    }




    // Retrieve data from the database
    $sql = "SELECT `NAME`, `EMAIL`  FROM  `mini_project`.`user_information`  WHERE `EMAIL`='$user_email'  ";
    $result = mysqli_query($con, $sql);



    if($result) {
        $row = mysqli_fetch_assoc($result);
        if($row) {
            echo "USER NAME: ".$row['NAME']."<br>";
            echo "USER EMAIL: ".$row['EMAIL'];
        } else {
            echo "No user found with the given email.";
        }
    } else {
        echo "Error in the SQL query: ".mysqli_error($con);
    }

    //  echo "+" . "$test_time" . "+";
    


    $sql = "SELECT question FROM `mini_project`.`question_deatils` WHERE `test_id`=$test_id ";

    $result = mysqli_query($con, $sql);


    echo "<form id='timerForm' method='post' action='process_answers.php'>"; // Change 'process_answers.php' to your actual processing script
    echo "<h1>TEST QUESTIONS </h1>";
    echo "<table>";
    echo "<tr><th>QUESTIONS</th><th>YOUR ANSWER</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['question']."</td>";
        echo "<td><input type='text' name='user_input[]'></td>"; // Add input tag
        echo "</tr>";
    }

    echo "</table>";


    echo "<button type='submit'>SUBMIT TEST</button>";

    // echo "<input type='submit' value='Submit'>";
    echo "</form>";




    if($con->query($sql) == true) {

        //echo "SUCCESS";
    
        $inser = true;
        ;
    }

    $con->close();



    ?>


    <br>



</body>

</html>