<?php
if(isset($_POST['add'])){

  $questions=$_POST['question'];
  $answer_key=$_POST['correct_answer'];

  include("db_connection.php");

  $insert="INSERT INTO questions (question ,answer_key) values('$questions','$answer_key')";
  $sql=mysqli_query($db,$insert);
  
  if($sql){
    echo "<script> alert('A new Question Added Successfully'); </script>" ;
  }
  else{
    echo "<script> alert('Erro! Question not added'); </script>" ;    
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Questions</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" >
              <div class="card-body">
                  <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" placeholder="Write Question here... " required>
                  </div>
                  <div class="form-group">
                    <label for="answer">Correct Answer </label>
                    <input type="text" name="correct_answer" class="form-control"  placeholder="Write Correct Answer here....." required>
                  </div>


                </div>

                <div class="form-group">
                <label for="img"> </label>
                    <button class="btn btn-primary ml-3" type="submit"  name='add'>Add Questions</button>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->
<!--                 <div class="card-footer">
                  <button class="btn btn-primary" type="submit"  name='save'>SUBMIT</button>
                </div> -->
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