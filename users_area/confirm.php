<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
 include('../functions/common_function.php');
 session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>
    <!--BOTH NAVS-->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid row">

                <div class="col-lg-3 justify-content-start">
                    <a class="navbar-brand" href="index.php"><img src="../img/logo.png" class="size" width="170"></a>
                </div>
                <div class="col-lg-6 collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="search-field me-2 p-2" type="search" name="search_data"
                            placeholder=" Enter your product here..." aria-label="Search">
                        <button class="btn btn-outline-light" value="Search" name="search_data_product" type="submit"><i
                                class="fa fa-search"></i></button>
                        <!--<input>h-->
                    </form>
                </div>
                <div class="col-lg-3 d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <?php
                            if(!isset($_SESSION['username'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./user_login.php'>Login</a>
                            </li>";
                            }
                            else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href=''>Log Out</a>
                            </li>";
                            }

                            if(!isset($_SESSION['username'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='#'>Hello, Guest</a>
                            </li>";
                            }
                            else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='#'>Hello, ".$_SESSION['username']."</a>
                            </li>";
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i
                                    class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php total_cart_price();?></a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light mt-0">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav">
                        <li class="nav-item1">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item1 dropdown">
                            <a class="nav-link dropdwn-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $select_categories = "SELECT * FROM categories";
                                $result_categories = mysqli_query($conn, $select_categories);
                                while ($row_data = mysqli_fetch_assoc($result_categories)) {
                                    $category_id = $row_data['category_id'];
                                    $category_title = $row_data['category_title'];
                                    echo " <li><a href = 'index.php?category=$category_id' class='dropdown-item py-2'>$category_title</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <?php
    if(!isset($_SESSION['username'])){
        //include('user_login.php');
        //echo "<script>alert('Please login first')</script>";
        echo "<script>window.open('user_login.php','_self')</script>";
    }
    else{
        //include('payment.php');
       // echo "<script>window.open('payment.php','_self')</script>";
        $user_ip=getIPAddress();
        $get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
        $result=mysqli_query($conn, $get_user);
        $run_query = mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];
        echo "<script>window.open('order.php?user_id=$user_id','_self')</script>";

    }

    ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/"></script>

</body>

</html>