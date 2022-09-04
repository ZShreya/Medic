<?php
$conn = mysqli_connect("localhost", "root", "", "medic");

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST["prod-input"])) {
    $product_title = test_input($_POST['product_title']);
    $product_desc = test_input($_POST['product_desc']);
    $product_categories = test_input($_POST['product_categories']);
    $product_amount = $_POST['product_amount'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    //ACCESSING IMG
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    //ACCESSING IMG TEMP NAME
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];
    //CHECKING EMPTY CONDITION
    if (
        $product_title == '' or $product_desc == '' or $product_categories == '' or $product_amount == '' or $product_price == '' or
        $product_image1 == '' or $temp_image1 == ''
    ) {
        echo "<script>alert('Fillup Empty Fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //INSERT QUERY
        $insert_products = "INSERT INTO `products`
        (product_title, product_desc, category_id, product_img1, product_img2, product_img3, product_amount, product_price, dates, states) 
        VALUES ('$product_title', '$product_desc', '$product_categories', '$product_image1', '$product_image2', '$product_image3', '$product_amount', '$product_price', NOW(), '$product_status')";
        $result_query = mysqli_query($conn, $insert_products);

        if ($result_query) {
            echo "<script>alert('Product Inserted')</script>";
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
    <title>Product Ins - ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: rgb(209, 230, 212);">
    <div class="container mt-4">
    <h2 class='title mt-2'>Insert New Products</h2>

        <form class="" method="post" enctype="multipart/form-data">

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Name</h6>
                <input type="text" name="product_title" id="product_title" class="form-control shadow-none py-2"
                    placeholder="Enter Product Name" autocomplete="off" required="required" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Description</h6>
                <input type="text" name="product_desc" id="product_desc" class="form-control shadow-none py-2"
                    placeholder="Enter Product Description" autocomplete="off" required="required" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Category</h6>
                <select name="product_categories" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_categories = "SELECT * FROM categories";
                    $result_categories = mysqli_query($conn, $select_categories);
                    while ($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_id = $row_data['category_id'];
                        $category_title = $row_data['category_title'];
                        echo " <option value = '$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Image 1</h6>
                <input type="file" name="product_image1" id="product_image1" class="form-control shadow-none py-2"
                    required="required" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Image 2</h6>
                <input type="file" name="product_image2" id="product_image2" class="form-control shadow-none py-2" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Image 3</h6>
                <input type="file" name="product_image3" id="product_image3" class="form-control shadow-none py-2" />
            </div>


            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Amount</h6>
                <input type="text" name="product_amount" id="product_amount" class="form-control shadow-none py-2"
                    placeholder="Enter Product Description" autocomplete="off" required="required" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Product Price</h6>
                <input type="text" name="product_price" id="product_price" class="form-control shadow-none py-2"
                    placeholder="Enter Product Price" autocomplete="off" required="required" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <input class="mb-3 bg-success text-white border-0" name="prod-input" type="submit" value="Add Product">
            </div>

        </form>
    </div>

    <!--js links-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>