<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
 include('../functions/common_function.php');
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
    <title>MEDIC - LOGIN</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>
<style>
    .yo {
    background-image: url("back-02.jpg");
    padding-top: 0cm;
    height: 750px;

}

.right {
    background: white;
    border-radius: 30px;
    box-shadow: 10px 10px 12px 3px rgba(0, 0, 0, 0.11);
    -webkit-box-shadow: 10px 10px 12px 3px rgba(0, 0, 0, 0.11);
    -moz-box-shadow: 10px 10px 12px 3px rgba(0, 0, 0, 0.11);
}

.container {


    width: 800px;
    padding-top: 50px;

}

.container img {
    height: 650px;
    width: 750px;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}

.inp {
    height: 45px;
    width: 80%;
    border: none;
    outline: none;
    border-radius: 60px;
    box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.27);
    -webkit-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.27);
    -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.27);
}

.btn1 {
    height: 45px;
    width: 50%;
    border: none;
    outline: none;
    border-radius: 60px;
    font-weight: 600;
    background: #aff2e6;

}

.btn1:hover {
    background: #4dc5b9;
    transition: 0.5s;
    color: white;

}

.upload-box {
    font-size: 12px;
    background: transparent;

    border-radius: 60px;
    height: 45px;
    width: 80%;
    outline: none;
    margin: 6px 0;
    box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.27);
    -webkit-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.27);
    -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.27);
}

::-webkit-file-upload-button {
    background: #aff2e6;
    padding: 9px;
    height: 45px;
    border: none;
    border-radius: 20px;
    outline: none;

}
.contact-box{
    display: grid;
    grid-template-columns: repeat(2,1fr);
    justify-content: center;
    align-items: center;
    text-align: center;
    max-width: 850px;
}
</style>
<body>
    <!--BOTH NAVS-->
    <header class="header_wrapper">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid row">

                <div class="col-lg-3 justify-content-start">
                    <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" class="size" width="170"></a>
                </div>
                <div class="col-lg-6 collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="search-field me-2 p-2" type="search" name="search_data" placeholder=" Enter your product here..." aria-label="Search">
                        <button class="btn btn-outline-light" value="Search" name="search_data_product" type="submit"><i class="fa fa-search"></i></button>
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
                            <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a>
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
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item1 dropdown">
                            <a class="nav-link dropdwn-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                $select_categories = "SELECT * FROM categories";
                                $result_categories = mysqli_query($conn, $select_categories);
                                while ($row_data = mysqli_fetch_assoc($result_categories)) {
                                    $category_id = $row_data['category_id'];
                                    $category_title = $row_data['category_title'];
                                    echo " <li><a href = '../index.php?category=$category_id' class='dropdown-item py-2'>$category_title</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item1">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <div class="yo">


        <div class="container">
            
                <div class="row g-0 right">
                    <div class="left col-lg-6">
                        <img src="../img/side.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 text-center py-5">
                        <h1>LOGIN</h1>
                        <form action="" method="post">
                            <div class="form-row py-3 pt-5">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" id="user_username" class="inp px-4" placeholder="Username"
                                        name="user_username">
                                </div>
                            </div>
                            <div class="form-row py-3">
                                <div class="offset-1 col-lg-10">
                                    <input type="password" id="user_password" class="inp px-4" placeholder="Password"
                                        name="user_password">
                                </div>
                            </div>
                            <div class="form-row py-3">
                                <div class="offset-1 col-lg-10">
                                    <button class="btn1" value="user_login" name="user_login">LOGIN </button>
                                    <p class="small fw-bold mt-2 pt-1 text-decoration-none">You don't have an account?<a href="user_registration.php"
                                            class="link-danger">Register</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/"></script>

    </body>
</html>

<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_query="SELECT * FROM user_table WHERE username='$user_username'";
    $result=mysqli_query($conn,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //CART ITEM
    $select_query_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
    $select_cart=mysqli_query($conn, $select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    if (empty($user_username)==true || empty($user_password) == true)
    {
        echo "<script>alert('Fill all attributes')</script>";
    }
    else if($row_count>0)
    {   
        $_SESSION['username'] = $user_username;
        if(password_verify( $user_password,$row_data['user_password']))
        {
            //echo "<script>alert('Loggeed in Successfully')</script>";
            if($row_count == 1 and $row_count_cart == 0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Logged in Successfully')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Loggeed in Successfully')</script>";
                echo "<script>window.open('../checkout.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Wrong Password')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>