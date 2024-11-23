<?php

include('db_connection.php');

$id = $_GET['id'];
$totalQ = $_POST['totalQ'];
$correctQ = $_POST['correctQ'];
$wrongQ = $_POST['WrongQ'];
$total_marks = $_POST['total_marks'];
$obtain_marks = $_POST['obtain_marks'];
$test_date = $_POST['test_date'];
$status = $_POST['result_status'];



$update = "UPDATE result SET total_question='$totalQ', correct_question='$correctQ', wrong_question='$wrongQ',
 total_marks='$total_marks', obtain_marks='$obtain_marks',test_date='$test_date',result_status='$status' WHERE result_id='$id'";
$query = mysqli_query($db, $update);
header("location:TestResult.php");
