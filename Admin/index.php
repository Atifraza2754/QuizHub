<?php
session_start();
if(!isset($_SESSION['email'])){
  header("location:../user_login.php");
}

// header
include("header.php")
//header

?>


    <!-- Sidebar Menu -->
    <?php include("sidebar.php"); ?>
</aside>

      <!-- row start -->
      <div class="row mb-2 mt-5">

        <!-- col start -->
        <div class="col-md-2">
          <!-- card -->
          <div class="card">
            <button type="submit" class="btn btn-danger p-10"><a href="View_LoginRecord.php" class='text-white'>All Login Records</a></button>
          </div>
          <!-- /.card close -->
        </div>
        <!-- /.col close -->

        <div class="col-md-2">
          <div class="card">
            <button type="submit" class="btn btn-danger p-10"><a href="TestResult.php" class='text-white'>Test Results</a></button>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card">
            <button type="submit" class="btn btn-danger p-10"><a href="ViewAllQuestions.php" class='text-white'>All Questions</a></button>
          </div>
        </div>
        <div class="col-md-2">
          <div class="card">
            <button type="submit" class="btn btn-danger p-10"><a href="ViewAllOptions.php" class='text-white'>All Options</a></button>
          </div>
        </div>
      </div>



      <!-- footer -->
      <?php include("footer.php") ?>
      <!-- /footer -->