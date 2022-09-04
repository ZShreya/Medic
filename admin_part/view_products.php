<?php
$conn=mysqli_connect('localhost','root','','medic');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <title>View Products - ADMIN</title>
</head>
<style>
    .product_img{
        width: 100px;
        object-fit: contain;
    }
    </style>


<body>

<h2 class='title mt-2'>View Products</h2>
    <table class="table table-bordered border-dark">
        <thead class="bg-success">
            <tr class="text-center">
                <th class="text-center">Product ID</th>
                <th class="text-center">Product Title</th>
                <th class="text-center">Product Image</th>
                <th class="text-center">Product Price</th>
                <th class="text-center">Total Sold</th>
                <th class="text-center">Status</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $get_products="SELECT * FROM products";
            $result=mysqli_query($conn,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_img1'];
                $product_price=$row['product_price'];
                $status=$row['states'];
                $number++;
                ?>
                
                <tr class='text-center'>
                <td><?php echo $number;?></td>
                <td><?php echo $product_title;?></td>
                <td><img src='./product_images/<?php echo $product_image1;?>'class='product_img'/></td>
                <td><?php echo $product_price;?>/-</td>
                <td><?php
                $get_count="SELECT * FROM orders_pending WHERE product_id= $product_id";
                $result_count=mysqli_query($conn,$get_count);
                $rows_count=mysqli_num_rows($result_count);
                echo $rows_count;
                ?>
                </td>
                <td><?php echo $status;?></td>
                <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-dark'><i class='fas fa-edit'></i></a></td>
                <td class="text-center"><a href='index.php?delete_product=<?php echo $product_id?>' class='text-dark'><i class='fas fa-trash'></i></a></td>
            </tr>
             <?php   
            }
            ?>
        </tbody>
    </table>
</body>

</html>