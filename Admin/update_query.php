<?php

include('db_connection.php');

$id = $_GET['id'];
$username = $_POST['username'];
$gender = $_POST['gender'];
$mobile_no = $_POST['mobno'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$hashed_password=password_hash($password,PASSWORD_DEFAULT);

$update = "UPDATE candidates SET username='$username',gender='$gender', mobile_no='$mobile_no', email='$email', password='$hashed_password',role='$role' WHERE user_id='$id'";
$query = mysqli_query($db, $update);
header("location:View_LoginRecord.php");
