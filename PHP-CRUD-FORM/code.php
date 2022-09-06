<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['delete_employee']);

    $query = "DELETE FROM students WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', designation='$designation', salary='$salary', address='$address' WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_employee']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $salary = mysqli_real_escape_string($con, $_POST['salary']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $query = "INSERT INTO students (name,email,phone,designation,salary,address) VALUES ('$name','$email','$phone','$designation','$salary','$address')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Employee Created Successfully";
        header("Location: employee-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Created";
        header("Location: employee-create.php");
        exit(0);
    }
}

?>