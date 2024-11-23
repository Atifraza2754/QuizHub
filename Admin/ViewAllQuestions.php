<!-- header -->
<?php include("header.php") ?>
<!-- /header -->

<!-- sidebar -->
<?php 
session_start();
include("sidebar.php") ?>
<!-- /sidebar -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 ">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title ">All Questions With Correct Answer </h3>
              </div>
              </div>  
              <table class='table table-bordered table-striped'>
                <thead>
                <tr class="text-white bg-warning">
            <td>S.No</td>
            <td>Question</td>
            <td>Correct Answer</td>
            
          </tr>
                </thead>
                <?php
          require("db_connection.php"); // Adjust path to your db_connection.php file

          $no = 1;
          $view = "SELECT * FROM questions ";
          $query = mysqli_query($db, $view);
          while ($row = mysqli_fetch_assoc($query)) {
            $qid=$row['question_id'];
            $question=$row['question'];
            $correct_answer=$row['answer_key'];

            $_SESSION['question_id']=$qid;
            $_SESSION['question']=$question;

          ?>
              <tbody>
              <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo  $question ?></td>
              <td><?php echo  $correct_answer ?></td>
            </tr>

              </tbody>

              <?php  }?>

              </table>
              </div>
              </div>
              </div>
            </section>

<!-- footer -->
<?php include("footer.php") ?>
<!-- /footer -->
