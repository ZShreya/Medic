<?php

$con=mysqli_connect('localhost','root','','medic');

include('functions/common_function.php');
@session_start();

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];


    $from=$_POST['email'];
    $name=$_POST['name'];
    $message=$_POST['message'];

    $subject2 = "Your Message Submitted Successfully";
    $body2 = "Dear ".$name."Wrote the Following Message."."/n /n".$_POST["message"];
    $header = "From: zshreya@outlook.com \r\n";
    $header .= "MIME-Version: 1.0" . "\r\n";
    $header .= "Content-type:text/html;charset=UTF-8"."\r\n";
    $result=mail($from,$subject2,$body2,$header);
    
    

    if(empty($name) == true ||empty($email) == true ||empty($phone) == true ||empty($message) == true  ){
    echo "<script>alert('All field required')</script>";
     }
   
   else{
    if($result){
        echo "Email sent successfully to $from";
    }
    
    
    $insert_query="INSERT INTO `contact`(username,email,phone,messages) values('$name','$email','$phone','$message')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>alert('Done')</script>";
    
  }   
}
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
    <title>MEDIC - Contact Us</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    .a {

        margin-top: 40px;
        margin-left: 95px;
        font-size: 30px;
        font-family: 'Montserrat', sans-serif;
        color: green;
    }

    .b {
        line-height: -20;
        margin-top: 10px;
        margin-left: 95px;
        font-size: 20px;
        color: #454a4a;
    }

    .fa-color {
        color: #454a4a;
    }

    .xyz {
        background-color: white;
        box-sizing: border-box;
        border-radius: 2px;
        height: 550px;
        overflow: hidden;
        display: grid;
        box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.5);

    }

    .far fa-map-marker-alt {
        color: black;
    }

    textarea {
        font-family: 'Montserrat', sans-serif;
    }

    .title {
        color: black;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
        margin-bottom: 0.7rem;
    }

    .input-container {
        position: relative;
        margin: 1rem 0;
    }

    .input-container label {
        position: absolute;
        top: 50%;
        left: 110px;
        transform: translateY(-50%);
        padding: 0 0.3rem;
        color: black;
        font-size: 0.9rem;
        font-weight: 400;
        pointer-events: none;
        z-index: 1000;
        transition: 0.5s;
    }

    .input-container.textarea label {
        top: 1rem;
        transform: translateY(0);
    }

    .input {
        width: 70%;
        margin-left: 100px;
        outline: none;
        border: 2px solid black;
        background: none;
        padding: 0.6rem 1.2rem;

        font-weight: 500;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        border-radius: 25px;
        transition: 0.3s;
    }

    textarea.input {
        padding: 0.8rem 1.2rem;
        min-height: 150px;
        border-radius: 22px;
        resize: none;
        overflow-y: auto;
    }

    button.btn1 {
        width: 20%;
        padding: 0.6rem 1rem;
        background: green;
        color: white;
        font-size: 0.95rem;
        border-radius: 25px;
        margin-left: 250px;
    }

    button.btn1:hover {
        background-color: green;
        color: white;
    }


    .input-container span {
        position: absolute;
        top: 0;
        left: 110px;
        transform: translateY(-50%);
        font-size: 0.8rem;
        padding: 0 2.2rem;
        color: transparent;
        pointer-events: none;
        z-index: 500;


    }

    .inpput-container span:before,
    .input-container span:after {
        content: "";
        position: absolute;
        width: 10%;
        opacity: 0;
        transition: 0.3s;

        height: 5px;
        background-color: white;
        top: 50%;
        transform: translateY(-50%);
    }

    .input-container span:before {
        left: 50%;
    }

    .input-container span:after {
        right: 50%;
    }

    .input-container.focus label {
        top: 0;
        transform: translateY(-50%);
        left: 110px;
        font-size: 0.8rem;
    }

    .input-container.focus span:before,
    .input-container.focus span:after {
        width: 50%;
        opacity: 1;
    }
    </style>

</head>

<body>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?php total_cart_price();?></a>
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


    <section id="contact" class="full-height">
        <h2 class="title2 mt-5">Contact Us</h2>
        <div class="container-fluid">

            <div class="row justify-content-center text-left" data-aos="fade-up">


                <div class="row justify-content-center text-center mb-4" data-aos="fade-up">
                </div>

                <div class="col-5 ">

                    <div class="a">
                        <h5><a href=''><i class="fas fa-envelope fa-1x fa-color me-2"></i></a> General Support</h5>
                    </div>
                    <div class="b">
                        <h6 class="ms-4">medic12345@gmail.com</h6>
                    </div>
                    <div class="a">
                        <h5><a href=''><i class="fas fa-map-marker-alt fa-1x fa-color me-2"></i></a> Address</h5>
                    </div>
                    <div class="b">
                        <h6 class="ms-4">Dhaka, Bangladesh</h6>
                    </div>
                    <div class="a">
                        <h5><a href=''><i class="fas fa-phone-alt fa-1x  fa-color me-2"></i></a> Lets Talk</h5>
                    </div>
                    <div class="b">
                        <h6 class="ms-4"> +8801234-567890</h6>
                    </div>





                </div>

                <div class="col-lg-5 xyz">

                    <h4 class="">Have any inquiry?</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-container">
                            <input type="text" name="name" class="input" />
                            <label for="">Name</label>
                            <span>Name</span>
                        </div>
                        <div class="input-container">
                            <input type="email" name="email" class="input" />
                            <label for="">Email</label>
                            <span>Email</span>
                        </div>

                        <div class="input-container textarea focus">
                            <textarea name="message" name='message' class="input"></textarea>
                            <label for="">Message</label>
                            <span>Message</span>
                        </div>
                        <button class="btn1 border-0" name='submit'>Submit </button>

                    </form>


                </div>

            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>

        <script src="app.js"></script>


</body>

</html>