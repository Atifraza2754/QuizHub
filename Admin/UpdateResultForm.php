<?php
include("db_connection.php");

$id = $_GET['id'];
$view = "SELECT * from result where result_id='$id'";;
$query = mysqli_query($db, $view);
$row = mysqli_fetch_assoc($query);
?>


<!-- header -->
<?php include("header.php") ?>
<!-- /header -->

<!-- header -->
<?php include("sidebar.php") ?>
<!-- /header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Update Result Record</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" method="POST" action="UpdateResultQuery.php?id=<?php echo $id; ?>">
            <div class="card-body">
              <div class="form-group">
                <label for="U_ID">User ID</label>
                <input type="text" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>" readonly>
              </div>

              <div class="form-group">
                <label for="totalQ">Total Question</label>
                <input type="text" name="totalQ" class="form-control" value="<?php echo $row['total_question']; ?>">
              </div>

              <div class="form-group">
                <label for="correctQ">Correct Question</label>
                <input type="text" name="correctQ" class="form-control" value="<?php echo $row['correct_question']; ?>">
              </div>

              <div class="form-group">
                <label for="wrongQ">Wrong Question</label>
                <input type="text" name="wrongQ" class="form-control" value="<?php echo $row['wrong_question']; ?>">
              </div>

              <div class="form-group">
                <label for="totalMarks">Total Marks</label>
                <input type="text" name="total_marks" class="form-control" value="<?php echo $row['total_marks']; ?>">
              </div>

              <div class="form-group">
                <label for="ObtainMarks">Obtain Marks</label>
                <input type="text" name="obtain_marks" class="form-control" value="<?php echo $row['obtain_marks']; ?>">
              </div>

              <div class="form-group">
                <label for="Testdate">Test Date</label>
                <input type="text" name="test_date" class="form-control" value="<?php echo $row['test_date']; ?>">
              </div>

              <div class="form-group">
                <label for="Status">Passing Status</label>
                <input type="text" name="result_status" class="form-control" value="<?php echo $row['result_status']; ?>">
              </div>
              
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-primary" type="submit" name='save'>Update Data</button>
              </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- header -->
<?php include("footer.php") ?>
<!-- /header -->