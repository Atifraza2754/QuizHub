<?php

include('db_connection.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $delete_query = "DELETE from candidates Where user_id='$id'";


    $result = mysqli_query($db, $delete_query);


    if ($result) {
        header("location:View_LoginRecord.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }


    mysqli_close($db);
} else {
    echo "ID parameter missing";
}
