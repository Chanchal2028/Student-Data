<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE student_id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);
    $referral = mysqli_real_escape_string($con, $_POST['referral']);

    $query = "UPDATE students SET name='$name', qualification='$qualification', referral='$referral' WHERE student_id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $qualification = mysqli_real_escape_string($con, $_POST['qualification']);
    
    // Check if referral is through or without referral
    $referral = "";
    if(isset($_POST['referral'])) {
        if(is_array($_POST['referral'])) {
            $referral = implode(", ", $_POST['referral']);
        } else {
            $referral = $_POST['referral'];
        }
    }

    $query = "INSERT INTO students (name, qualification, referral) VALUES ('$name', '$qualification', '$referral')";

    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit();
    } else {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit();
    }
}
?>
