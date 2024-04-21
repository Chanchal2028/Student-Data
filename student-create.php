<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Create</title>
</head>
<body>
  
<div class="container mt-5">
    <?php include('message.php'); ?>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Create
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">

                        <div class="mb-3">
                            <label>Student ID</label>
                            <input type="text" name="student_id" class="form-control" value="001" readonly>
                        </div>
                        <div class="mb-3">
                            <label>Student Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Qualification</label>
                            <select name="qualification" class="form-select">
                                <option value="graduate">Graduate</option>
                                <option value="post graduate">Post Graduate</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Referral</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="referral" value="through"> Through Referral
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="referral" value="without"> Without Referral
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_student" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html