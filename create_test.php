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



    <form action="submit_test.php" method="POST" onsubmit="return validateForm()">

        <input type="text" name="test_name" id="test_name" placeholder="ENTER TEST NAME" required><br>
        <input type="password" name="test_password" id="test_password" placeholder="ENTER TEST  PASSWRD" required><br>
        <input type="password" name="test_C_password" id="test_C_password" placeholder="ENTER CONFORM PASSWORD"
            required><br>

        <input type="number" name="test_time" id="test_time" placeholder="ENTER TEST TIME" required><br>
        <input type="number" name="total_mark" id="total_mark" placeholder="TOTAL MARK" required><br>

        <h1>QUESTIONS</h1>

        <!-- Input field to enter the total number of questions -->
        <input type="number" name="total_questions" id="total_questions" placeholder="TOTAL QUESTIONS" required
            oninput="addQuestionFields(this.value)"><br>

        <!-- Container to dynamically add question fields -->



        <div class="container">

            <div class="left-half" id="questionFields"></div>
            <div class="right-half" id="result">

                <?php
                if(isset($_POST['run_python'])) {
                    // Handle the button click event here
                    exec('python python.py'); // Replace 'your_script.py' with the actual filename
                


                    $server = "localhost";
                    $username = "root";
                    $password = "";

                    $con = mysqli_connect($server, $username, $password);

                    if(!$con) {


                        die("fail");
                    }



                    $sql = "SELECT * FROM `mini_project`.`question_bank` WHERE 1; ";
                    $result = mysqli_query($con, $sql);


                    echo "<h1><br><br><br><br>QUESTION BANK </h1>";
                    echo "<table>";
                    echo "<tr><th>QUESTION </th><th>ANSWER</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['QUESTION']."</td>";
                        echo "<td>".$row['ANS']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";


                    if($con->query($sql) == true) {

                        //echo "SUCCESS";
                
                        $inser = true;
                        ;
                    }

                    $con->close();
                }

                ?>
            </div>

        </div>

        <br>

        <center>

            <button type="submit">CREATE TEST</button>
        </center>

    </form>



    <form method="post">

        <center>
            <input type="submit" name="run_python" value="GENERATE QUESTION">
        </center>
    </form>




</body>

</html>
<script>
    function validateForm() {
        var password = document.getElementById("test_password").value;
        var conformPassword = document.getElementById("test_C_password").value;

        if (password !== conformPassword) {
            alert("Password and Conform Password do not match.");
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    } function addQuestionFields(totalQuestions) {
        const questionFields = document.getElementById("questionFields");
        questionFields.innerHTML = ""; // Clear previous fields

        for (let i = 1; i <= totalQuestions; i++) {
            const questionDiv = document.createElement("div");



            // Question field
            const questionInput = document.createElement("input");
            questionInput.type = "text";
            questionInput.name = `question_${i}`;
            questionInput.placeholder = `QUESTION NO ${i}`;
            questionDiv.appendChild(questionInput);

            // Answer field
            const answerInput = document.createElement("input");
            answerInput.type = "text";
            answerInput.name = `answer_${i}`;
            answerInput.placeholder = `ANS FOR QUESTION  ${i}`;
            questionDiv.appendChild(answerInput);

            const markInput = document.createElement("input");
            markInput.type = "number";
            markInput.name = `mark_${i}`;
            markInput.placeholder = `MARK FOR QUESTION  ${i}`;
            questionDiv.appendChild(markInput);

            questionFields.appendChild(questionDiv);

            // Add line break for the next set of question, answer, and mark
            questionFields.appendChild(document.createElement("br"));
        }
    }

</script>