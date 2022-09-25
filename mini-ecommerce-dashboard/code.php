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
        $_SESSION['message'] = "Product Category Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Category Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_employee']))
{
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']);

    $sku = mysqli_real_escape_string($con, $_POST['sku']);
    $cname = mysqli_real_escape_string($con, $_POST['cname']);
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $image = mysqli_real_escape_string($con, $_POST['image']);

    $query = "UPDATE students SET sku='$sku', cname='$cname', pname='$pname', price='$price', quantity='$quantity', image='$image' WHERE id='$employee_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Product Category Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Category Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_employee']))
{
    $sku = mysqli_real_escape_string($con, $_POST['sku']);
    $cname = mysqli_real_escape_string($con, $_POST['cname']);
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $image = mysqli_real_escape_string($con, $_POST['image']);
    $query = "INSERT INTO students (sku,cname,pname,price,quantity,image) VALUES ('$sku','$cname','$pname','$price','$quantity','$image')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Product Category Created Successfully";
        header("Location: product-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Category Not Created";
        header("Location: product-create.php");
        exit(0);
    }
}

?>