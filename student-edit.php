<?php
session_start();
require "dbcon.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Edit</title>
</head>
<body>
  
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Edit
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if(isset($_GET['student_id'])) {
                        $student_id = mysqli_real_escape_string($con,$_GET['student_id']);
                        $query = "SELECT * FROM students WHERE student_id='$student_id' ";
                        $query_run = mysqli_query($con, $query);

                        if($query_run) {
                            if(mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                                // print_r($student);
                                ?>
                                <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?= $student['student_id']; ?>">
                                    <div class="mb-3">
                                        <label>Student Name</label>
                                        <input type="text" name="name" value="<?= $student['name'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Qualification</label>
                                        <select name="qualification" class="form-select">
                                            <option value="graduate" <?= $student['qualification'] == 'graduate' ? 'selected' : '' ?>>Graduate</option>
                                            <option value="post graduate" <?= $student['qualification'] == 'post graduate' ? 'selected' : '' ?>>Post Graduate</option>
                                            <option value="others" <?= $student['qualification'] == 'others' ? 'selected' : '' ?>>Others</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Referral</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="referral" value="through" <?= $student['referral'] == 'through' ? 'checked' : '' ?>> Through Referral
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="referral" value="without" <?= $student['referral'] == 'without' ? 'checked' : '' ?>> Without Referral
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Cancel</button>
                                    </div>
                                </form>
                                <?php
                            } else {
                                echo "<h4>No Such Data Found</h4>";
                            }
                        } else {
                            echo "<h4>Error in SQL Query: " . mysqli_error($con) . "</h4>";
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
