<?php
require 'dbcon.php';
require 'code.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['student_id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['student_id']);
                            $query = "SELECT * FROM students WHERE student_id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Qualification</label>
                                        <p class="form-control">
                                            <?=$student['qualification'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Referral</label>
                                        <p class="form-control">
                                            <?=$student['referral'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                    <a href="student-edit.php?student_id=<?= $student['student_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="code.php" method="POST" class="d-inline">
                                        <button type="submit" name="delete_student" value="<?=$student['student_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>