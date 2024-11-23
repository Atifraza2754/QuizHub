<?php 
session_start();
if(!isset($_SESSION['username'])){
header("location:user_login.php");
exit();
}
?>
<?php
include("header.php");
?>
    <h1 class="text-center mt-3">PHP Quiz</h1>
 <div class="container d-flex justify-content-center mt-2 p-3">
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title">Instructions Before Starting the Test</h5>
                <ul>
                    <li>There are total 20 questions.</li>
                    <li>Each question carries 5 mark.</li>
                    <li>There is no negative marking.</li>
                    <li>The duration of the test is 30 minutes.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="form-container">
            <form action='test.php' method='POST'>
                <input type='hidden' name='op' value='null'>
                <input type='hidden' name='answerkey' value=''>
                <input type='hidden' name='qid' value='1'>
                <input type='hidden' name='marks' value='0'>
                <input type='submit' class="btn btn-primary" value='Start Test' name='btn' id="startbtn">
            </form>
        </div>
    </div>
