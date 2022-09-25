<?php
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

    <title>Product View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM students WHERE id='$employee_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $employee = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Product SKU</label>
                                        <p class="form-control">
                                            <?=$employee['sku'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Category Name</label>
                                        <p class="form-control">
                                            <?=$employee['cname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Product Name</label>
                                        <p class="form-control">
                                            <?=$employee['pname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Price</label>
                                        <p class="form-control">
                                            <?=$employee['price'];?>
                                        </p>
                                    </div>                                    
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <p class="form-control">
                                            <?=$employee['quantity'];?>
                                        </p>
                                    </div>   
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <p class="form-control">
                                            <?=$employee['image'];?>
                                            <img src="uploaded_img/<?php echo $employee['image']; ?>" height="100" alt="">
                                        </p>
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