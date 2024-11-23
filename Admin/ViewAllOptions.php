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
                <h3 class="card-title ">All Options of Questions</h3>
              </div>
              </div>  
              <table class='table table-bordered table-striped'>
                <thead>
                <tr class="text-white bg-warning">
            <td>S.No</td>
            <td>Question_ID</td>
            <td>Option</td>

          </tr>
                </thead>
                <?php
          require("db_connection.php"); // Adjust path to your db_connection.php file

          $no = 1;
          $view = "SELECT * FROM answers ";
          $query = mysqli_query($db, $view);
          while ($row = mysqli_fetch_assoc($query)) {
            $option_id=$row['answer_id'];
            $qid=$row['question_id'];
            $options=$row['answer'];


          ?>
              <tbody>
              <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo  $qid ?></td>
              <td><?php echo  $options ?></td>

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
