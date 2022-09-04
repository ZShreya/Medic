<?php
//include('../includes/connect.php');
$conn = mysqli_connect("localhost", "root", "", "medic");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST["cat-input"])) {
    $category_title = test_input($_POST['cat_title']);
    //mysqli_select_db($con, 'medic');
    //$insert_query = "INSERT INTO `categories` (`category_title`) VALUES ('$_POST[cat_title]')";
    $select_query = "SELECT * FROM categories WHERE category_title='$category_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('Already in Database')</script>";
    } else {
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Category has been inserted sucessfully')</script>";
            //echo "1 RECORD ADDED";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Ins - ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: rgb(209, 230, 212);">
    <div class="container">
    <h2 class='title mt-2'>Insert New Categories</h2>
        <div>
            <form action="" method="post" class="mb-2 w-50 m-auto">
                <div class="input-group w-90 pb-4">
                    <span class="input-group-text  bg-success" id="basic-addon1"><i class="fa-solid fa-bars"></i></span>
                    <input type="text" class="form-control shadow-none py-2" name="cat_title" placeholder="Insert Categories">
                </div>
                <div class="input group w-10 mb-2">
                    <input type="submit" class="bg-success text-white border-0" name="cat-input" value="Insert Category">
                </div>
            </form>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>