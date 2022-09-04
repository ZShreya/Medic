<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: rgb(209, 230, 212);">
    <!--BOTH NAVBARS-->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid row">
                <div class="col-lg-10">
                    <a class="navbar-brand" href="#"><img src="../img/logo.png" class="size" width="170"></a>
                </div>
            </div>
            <div class="col-lg-2 justify-content-end">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hello, Admin</a>
                    </li>
                </ul>
            </div>

        </nav>

        <nav class="navbar navbar-expand-lg navbar-light mt-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav">
                        <li class="nav-item1">
                            <a class="nav-link" id="insert_product" href="index.php?insert_product">Insert New Products</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?view_products">View Products</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?insert_category">Insert Categories</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?view_categories">View Categories</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?list_orders">All Orders</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?list_payments">View Payments</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?list_users">View Users</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php?viewContact">Contact Info</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div class="container my-5">
        <?php
        if (isset($_GET['insert_product'])) {
            include('insert_product.php');
        }
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        } 
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }  
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        } 
        if (isset($_GET['delete_products'])) {
            include('delete_products.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }  
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }     
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        } 
        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }   
        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }  
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['delete_user'])) {
            include('delete_user.php');
        }   
        if (isset($_GET['viewContact'])) {
            include('viewContact.php');
        }   
        ?>
    </div>




    <!--js links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>