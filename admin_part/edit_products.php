<?php
$con=mysqli_connect('localhost','root','','medic');
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="SELECT * FROM products WHERE product_id=$edit_id";
    $result=mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_desc'];
    $category_id=$row['category_id'];
    $product_image1=$row['product_img1'];
    $product_image2=$row['product_img2'];
    $product_image3=$row['product_img3'];
    $product_price=$row['product_price'];

    $select_category="SELECT * FROM categories WHERE category_id= $category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title']; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <title>ADMIN - EDIT PRODUCT</title>
</head>
<style>
.product_img {
    width: 100px;
    object-fit: contain;
}
</style>

<body>

    <h2 class='title mt-2'>Edit Product</h2>

    <div class="container mtq-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title " class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title"
                    class="form-control shadow-none" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" id="product_desc" value="<?php echo $product_description?>" name="product_desc"
                    class="form-control shadow-none" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category" class="form-select shadow-none">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title?> </option>
                    <?php
                    $select_category_all="SELECT * FROM categories";
                    $result_category_all=mysqli_query($con,$select_category_all);
                    while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    };
                    ?>
                </select>
            </div>

            <div class="form-outline w-50 m-auto mb-1">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="">
                    <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto shadow-none"
                        required="required">
                    <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">

                </div>

            </div>
            <div class="form-outline w-50 m-auto mb-1">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="">
                    <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto shadow-none"
                        >
                    <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">

                </div>

            </div>
            <div class="form-outline w-50 m-auto mb-1">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="">
                    <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto shadow-none"
                        >
                    <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_img">

                </div>

            </div>

            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control shadow-none" required="required"
                    value="<?php echo $product_price?>">
            </div>
            <div class="w-50 m-auto text-center">
                <input type="submit" name="edit_product" value="Update" class="btn btn-success px-3 mb-3">
            </div>
            <form>
    </div>

     
    <!----editing products-->
    <?php
    if(isset($_POST['edit_product'])){
        $product_title=$_POST['product_title']; 
        $product_desc=$_POST['product_desc'];
        $product_category=$_POST['product_category'];

        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];


        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];


        //checking empty fields
        if($product_title == '' or $product_desc==''or $product_category=='' or $product_image1=='' or $product_price==''){
            echo "<script>alert('Fill all attributes')</script>";
        }
        else {
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            //update product query
            $update_products="UPDATE products SET product_title='$product_title', product_desc='$product_desc', category_id='$product_category', product_img1='$product_image1', product_img2='$product_image2', product_img3='$product_image3', product_price='$product_price', dates = NOW() where product_id = $edit_id";
            $result_update=mysqli_query($con,$update_products);
            if($result_update)
            {
                echo "<script>alert('Product Updated')</script>";
                echo "<script>window.open ('./index.php?view_products','_self')</script>";
           }
        }
    }
    ?>
</body>

</html>