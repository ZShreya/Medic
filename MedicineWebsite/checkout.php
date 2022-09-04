<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
include('./functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>MEDIC - CART</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
     <!--BOTH NAVS-->
     <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg navbar-light header-1">
            <div class="container-fluid row">

                <div class="col-lg-3 justify-content-start">
                    <!-- LOGO -->
                    <a class="navbar-brand" href="index.php"><img src="img/logo.png" class="size" width="170"></a>
                </div>
                <div class="col-lg-6 collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <!-- SEARCH BAR -->
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="search-field me-2 p-2" type="search" name="search_data"
                            placeholder=" Enter your product here..." aria-label="Search">
                        <button class="btn btn-outline-light" value="Search" name="search_data_product" type="submit"><i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="col-lg-3 d-flex justify-content-end">
                    <!-- LOGIN AND GUEST -->
                    <ul class="navbar-nav">
                        <?php
                            if(!isset($_SESSION['username'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                            </li>";
                            }
                            else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./users_area/logout.php'>Log Out</a>
                            </li>";
                            }

                            if(!isset($_SESSION['username'])){
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='#'>Hello, Guest</a>
                            </li>";
                            }
                            else{
                                echo "<li class='nav-item'>
                                <a class='nav-link' href='./users_area/profile.php'>Hello, ".$_SESSION['username']."</a>
                            </li>";
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="checkout.php"><i
                                    class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- 2ND NAV BAR -->
        <nav class="navbar navbar-expand-lg navbar-light mt-0 header-2">
            <div class="container-fluid">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav menu-navbar-nav seconds">
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
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <!--CART FUNCTION CALL-->
    <?php
    cart();
    ?>

    <h2 class="title2 mt-5">Checkout</h2>
    <div class="cart container">
        <form class="" method="POST">
        <table>
            
            <tbody>
                <!-- PHP FOR DYNAMIC CART DATA -->
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "medic");
                    $ip = getIPAddress();
                    $total_price = 0;

                    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
                    $result = mysqli_query($conn, $cart_query);
                    $result_count = mysqli_num_rows($result);
                    if($result_count>0){       
                        
                        echo "<tr>
                        <th>Product</th>
                        <th class='text-center'>Remove</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Update</th>
                    </tr>" ;
                        while($row=mysqli_fetch_array($result)){
                            $product_id = $row['product_id'];
                            $select_products="SELECT * FROM products WHERE product_id='$product_id'";
                            $result_products=mysqli_query($conn, $select_products);
                            while($row_product_price=mysqli_fetch_array($result_products)){
                                $product_price = array($row_product_price['product_price']);
                                $price_table = $row_product_price['product_price'];
                                $product_title = $row_product_price['product_title'];
                                $product_image1 = $row_product_price['product_img1'];
                                $product_values = array_sum($product_price);
                                $total_price+=$product_values;
                                ?>
                                <tr>
                                    <td>
                                        <div class="cart-info">
                                            <img src="./admin_part/product_images/<?php echo $product_image1?>">
                                            <div>
                                                <p><?php echo $product_title?></p>
                                                <small>Price: <?php echo $price_table ?> BDT</small>
                                        
                                                <!-- <a href="" class="text-decoration-none mt-2"><h6>Remove<h6></a> -->
                                                <button type="submit" name="remove_cart"  id="" value="" class="mx-2 mt-3 border-0 bg-success text-light">Remove</button></td>
                                    
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3"><input type="checkbox" name="removeitem[]" class="form-check-input shadow-none" value="<?php echo $product_id ?>"> </td>

                                    <td><input  type="text" name="qty" class="form-input"> </td>
            
                                    <?php
                                    $get_ip = getIPAddress();
                                    if(isset($_POST['update_cart'])){
                                        
                                        $quantities=$_POST['qty'];
                                        $update_cart="UPDATE cart_details SET quantity= $quantities WHERE ip_address = '$get_ip' ";
                                        $result_products_quantity=mysqli_query($conn, $update_cart);
                                        $total_price = $total_price*$quantities;
                                    }

                                    ?>
                                    <td><button type="submit" name="update_cart" id="update_cart" value="" class="py-1 border-0 text-center bg-success text-light">Update</button></td>

                                </tr>
                            <?php
                        }
                    }
                }
                    else{
                        echo "<h3 class = 'text-center text-danger'>Cart is Empty</h3>";
                    }
                    ?>
            </tbody>
        </table>
        
        <div class=" row total-price">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "medic");
                $ip = getIPAddress();
                $cart_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
                $result = mysqli_query($conn, $cart_query);
                $result_count = mysqli_num_rows($result);
                if($result_count>0){ 
                    echo " <table>
                    <tr>
                        <td><h5>Sub Total</h5></td>
                        <td><h5>$total_price.00 BDT</h5></td>
                    </tr>
                </table>
                <div class='row'>
                    <button class='btn m-auto btn-info bg-success text-white py-2 border-0' type='submit'><a href='./users_area/confirm.php' class='text-light text-decoration-none'>Checkout</a></button>
                </div>
                </table>";
                }
            ?>      
        </div>
    </div>
    </form>

    <!-- REMOVE ITEM -->
    <?php
    function remove_cart_item(){
        $conn = mysqli_connect("localhost", "root", "", "medic");
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                $delete_query="DELETE FROM cart_details WHERE product_id='$remove_id'";
                $run_delete = mysqli_query($conn, $delete_query);
                if($run_delete){
                    echo "<script>window.open('checkout.php','_self')</script>";
                }
            }
            }
            
    }
    echo $remove_item = remove_cart_item();
?>


    <!--js links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/"></script>
</body>

</html>