<?php
session_start();
include("db_connection.php");

echo("
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Online Testing</title>
    <link href='bootstrap-5.3/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #0b9164;
        }
        #questiontable {
            padding: 10px;
            width: 100%;
            height: auto;
        }
        #nextbtn, #prevbtn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: yellow;
            font-weight: bold;
            font-size: large;
        }
    </style>
</head>
<body>
<center>
    <h2 class='text-white p-3'> Candidate Name: ". $_SESSION['username']."</h2>
");

if (isset($_POST['btn'])) {
    $qid = $_POST['qid'];
    $marks = $_POST['marks'];
    $op = isset($_POST['op']) ? $_POST['op'] : null; // Fix for undefined index
    $answerkey = $_POST['answerkey'];

    // Store answers in session 
    if (!isset($_SESSION['answers'])) {
        $_SESSION['answers'] = [];
    }

    // Save the current answer
    if ($op !== null) {
        $_SESSION['answers'][$qid - 1] = $op;
    }

    if ($op == $answerkey) {
        $marks += 5;
    }

    if ($_POST['btn'] == 'Next') {
        $qid++;
    } elseif ($_POST['btn'] == 'Previous' && $qid > 1) {
        $qid--;
        if (isset($_SESSION['answers'][$qid - 1]) && $_SESSION['answers'][$qid - 1] == $answerkey) {
            $marks += 5;  // Restore marks if the previous answer was correct
        } else {
            $marks -= 5;  // Remove marks of the current question when going back
        }
    }

    $query = "SELECT * FROM questions WHERE question_id='$qid'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    if ($rows <= 0) {
        $totalquestion = $qid - 1;
        $correctquestion = $marks / 5;
        $wrong_question = $totalquestion - $correctquestion;
        $totalmarks = $totalquestion * 5;
        $obtain_marks = $correctquestion * 5;
        $date = date("Y-m-d");
        $user_id = $_SESSION['user_id'];

        if ($obtain_marks >= 40) {
            $insert = "INSERT INTO result (user_id, total_question, correct_question, wrong_question, total_marks, obtain_marks, test_date, result_status)
                       VALUES ('$user_id', '$totalquestion', '$correctquestion', '$wrong_question', '$totalmarks', '$obtain_marks', '$date', 'Pass')";            
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
                echo "<br><h2 class='text-warning'>Congratulations! You Have Qualified the Test</h2>";
            }
        } else {
            $add = "INSERT INTO result (user_id, total_question, correct_question, wrong_question, total_marks, obtain_marks, test_date, result_status)
                    VALUES ('$user_id', '$totalquestion', '$correctquestion', '$wrong_question', '$totalmarks', '$obtain_marks', '$date', 'Fail')";            
            mysqli_query($conn, $add);
            echo "<br><h2 class='text-danger'>Sorry! You have Failed</h2>";
        }

        // Display results
        $view = "SELECT * FROM result WHERE user_id='$user_id ORDER BY test_date DESC'";
        $query = mysqli_query($conn, $view);
        if ($query) {
            echo "<div class='container mt-5'>
                    <div class='row'>
                      <div class='col-md-12'>
                        <table class='table table-bordered table-striped'>
                          <thead>
                            <tr>
                              <th>Total Question</th>
                              <th>Correct Question</th>
                              <th>Wrong Question</th>
                              <th>Total Marks</th>
                              <th>Obtain Marks</th>
                              <th>Test Date</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>";
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>{$row['total_question']}</td>
                        <td>{$row['correct_question']}</td>
                        <td>{$row['wrong_question']}</td>
                        <td>{$row['total_marks']}</td>
                        <td>{$row['obtain_marks']}</td>
                        <td>{$row['test_date']}</td>
                        <td>{$row['result_status']}</td>
                      </tr>";
            }
            echo "  </tbody>
                        </table>
                      </div>
                    </div>
                  </div>";
        }

        die("<a href='logout.php'><h2>Logout</h2></a>");
    }
}

echo "
<div class='container mt-5'>
    <div class='card'>
        <div class='card-body'>
            <table class='table' id='questiontable'>
                <form action='test.php' method='POST'>
";

while ($row = mysqli_fetch_assoc($result)) {
    $answerkey = $row['answer_key'];
    echo "<tr><td><h2 style='color: red;'>Question No $qid: ".$row['question']."?</h2></td></tr>";

    $answerquery = "SELECT * FROM answers WHERE question_id='$qid'";
    $result2 = mysqli_query($conn, $answerquery);

    echo "<tr><td><ul>";
    while ($ansrow = mysqli_fetch_assoc($result2)) {
        $checked = (isset($_SESSION['answers'][$qid - 1]) && $_SESSION['answers'][$qid - 1] == $ansrow['answer']) ? 'checked' : '';
        echo "<h4><input type='radio' name='op' value='".$ansrow['answer']."' $checked> ".$ansrow['answer']."</h4>";
    }
    echo "</ul></td></tr>";
}

echo "
            </table>
            <input type='hidden' name='marks' value='$marks'>
            <input type='hidden' name='qid' value='$qid'>
            <input type='hidden' name='answerkey' value='$answerkey'>
            <div class='text-center'>
                <input type='submit' class='btn btn-success text-dark' value='Previous' name='btn' id='prevbtn'>
                <input type='submit' class='btn btn-danger text-dark' value='Next' name='btn' id='nextbtn'>
            </div>
        </form>
    </div>
</div>
</div>
</center>
</body>
</html>
";
?>
