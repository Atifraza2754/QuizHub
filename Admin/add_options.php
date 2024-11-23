<?php
if(isset($_POST['save'])){
  $Q_id = $_POST['q_id'];
  $options = [
    $_POST['option1'],
    $_POST['option2'],
    $_POST['option3']
  ];

  include("db_connection.php");

  $success = true;
  foreach ($options as $option) {
    $insert = "INSERT INTO answers (question_id, answer) VALUES ('$Q_id', '$option')";
    $sql = mysqli_query($db, $insert);

    if (!$sql) {
      $success = false;
      break;
    }
  }

  if ($success) {
    echo "<script>alert('Options added successfully');</script>";
  } else {
    echo "<script>alert('Error! Options not added');</script>";
  }
}
?>

<!-- header -->
<?php include("header.php") ?>
<!-- /header -->

<!-- header -->
<?php 
 session_start();
include("sidebar.php") 
?>
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
            <h3 class="card-title">Add Question Options</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="quickForm" method="POST">
            <div class="card-body">
            <div class="form-group">
      <label for="qid">Question</label>
      <select name="q_id" class="form-control" required>
        <option value="">Select Question</option>
        <?php
        include("db_connection.php");
        $query = "SELECT question_id, question FROM questions"; 
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='" . $row['question_id'] . "'>" . $row['question'] . "</option>";
        }
        ?>
      </select>
    </div>              <div class="form-group">
                <label for="option1">Option 1</label>
                <input type="text" name="option1" class="form-control" placeholder="Option 1" required>
              </div>
              <div class="form-group">
                <label for="option2">Option 2</label>
                <input type="text" name="option2" class="form-control" placeholder="Option 2" required>
              </div>
              <div class="form-group">
                <label for="option3">Option 3</label>
                <input type="text" name="option3" class="form-control" placeholder="Option 3" required>
              </div>
            </div>

            <div class="form-group">
              <label for="img"> </label>
              <button class="btn btn-primary ml-3" type="submit" name='save'>Add Question Options</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php include("footer.php") ?>
<!-- /footer -->
