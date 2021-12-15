<?php
include_once('includes/admin.inc.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Welcome Admin!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin.php">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>4
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        </div>
        <form class="form-inline">
            <button class="btn btn-outline-danger" type="button">Sign out</button>
        </form>
    </nav>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-4">
                <h3 class="text-left">Create Product</h3>
                <form action="/includes/admin.inc.php" method="POST">
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="test" class="form-control" id="product-name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="product-tag">Select tag</label>
                        <select class="form-control" id="product-tag">
                            <option>Kg</option>
                            <option>Ltr</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-catagory">Select catagory</label>
                        <select class="form-control" id="product-catagory">
                            <option>Meat & Fish</option>
                            <option>Drink & Beverages</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" class="form-control" id="product-price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Select product image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Submit</button>
                </form>
            </div>
            <div class="col-sm-4">
                <h3 class="text-left">Search & edit products</h3>
                <form class="form-inline" action="/includes/admin.inc.php" method="POST">
                    <div class="form-group mx-sm-6 mb-2">
                        <label for="product-search" class="sr-only">Product ID</label>
                        <input type="text" class="form-control" id="product-search" placeholder="Product ID">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2 mb-2">Search</button>
                </form>
                <form>
                    <div class="form-group">
                        <label for="product-name">Product Name</label>
                        <input type="test" class="form-control" id="product-name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="product-tag">Select tag</label>
                        <select class="form-control" id="product-tag">
                            <option>Kg</option>
                            <option>Ltr</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-catagory">Select catagory</label>
                        <select class="form-control" id="product-catagory">
                            <option>Meat & Fish</option>
                            <option>Drink & Beverages</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product-price">Price</label>
                        <input type="text" class="form-control" id="product-price">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Update</button>
                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </form>
            </div>
        </div>
        <h1 class="text-center mt-8">Order details</h1>
        <div class="row justify-content-between">
            <!-- card -->
            <?php loadOrderComponent() ?>
            <!-- <form action="/includes/admin.inc.php" method="POST" class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="3">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary">Approve</button>
                        <button class="btn btn-danger">Reject</button>
                    </div>
                </div>
            </form>
            <form action="/includes/admin.inc.php" method="POST" class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="3">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary">Approve</button>
                        <button class="btn btn-danger">Reject</button>
                    </div>
                </div>
            </form>
            <form action="/includes/admin.inc.php" method="POST" class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Id</td>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td colspan="3">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary">Approve</button>
                        <button class="btn btn-danger">Reject</button>
                    </div>
                </div>
            </form> -->
            <!-- card-end -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>