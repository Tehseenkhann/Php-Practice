<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Product Category CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Details
                            <a href="product-create.php" class="btn btn-primary float-end">Add Product Category</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product SKU</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Product Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM students";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $employee)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $employee['id']; ?></td>
                                                <td><?= $employee['sku']; ?></td>
                                                <td><?= $employee['cname']; ?></td>
                                                <td><?= $employee['pname']; ?></td>
                                                <td><?= $employee['price']; ?></td>
                                                <td><?= $employee['quantity']; ?></td>
                                                <td><?= $employee['image']; ?></td>   
                                                <img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt="">
                                                <td>
                                                    <a href="product-view.php?id=<?= $employee['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="product-edit.php?id=<?= $employee['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_employee" value="<?=$employee['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>