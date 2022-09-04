<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
//GETTING PRODUCT
function getproducts()
{
    $conn = mysqli_connect("localhost", "root", "", "medic");
    if (!isset($_GET['category'])) {
        $select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0, 8";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $category_id = $row['category_id'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];

            echo "<div class='col-4'>

<img src='./admin_part/product_images/$product_img1' class='' alt=''>
<h5 class='#'>$product_title</h5>
<h6 class='#'>$product_price BDT</h6>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart ></a>
</div>";
        }
    }
}


//GETTING DIFF CATEGORY PRODUCTS
function getuniquecategories()
{
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $conn = mysqli_connect("localhost", "root", "", "medic");
        $select_query = "SELECT * FROM products WHERE category_id = $category_id ORDER BY rand()";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h3 class = 'text-center text-danger'>No Products Available in this Category!</h3>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $category_id = $row['category_id'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];

            echo "<div class='col-4'>
    
    <img src='./admin_part/product_images/$product_img1' class='' alt=''>
    <h5 class='#'>$product_title</h5>
    <h6 class='#'>$product_price BDT</h6>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart ></a>
    
    </div>";
        }
    }
}

//SEARCHING PRODUCTS
function search_product()
{
    $conn = mysqli_connect("localhost", "root", "", "medic");
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM products WHERE product_title LIKE '%$search_data_value%'";
        $result_query = mysqli_query($conn, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h3 class = 'text-center text-danger'>This product is not available</h3>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $category_id = $row['category_id'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];

            echo "<div class='col-4'>

<img src='./admin_part/product_images/$product_img1' class='' alt=''>
<h5 class='#'>$product_title</h5>
<h6 class='#'>$product_price BDT</h6>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart ></a>
<a href='#' class='btn btn-secondary'>View</a>

</div>";
        }
    }
}


function getallproducts()
{
    $conn = mysqli_connect("localhost", "root", "", "medic");
    if (!isset($_GET['category'])) {
        $select_query = "SELECT * FROM products ORDER BY rand() ";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $category_id = $row['category_id'];
            $product_img1 = $row['product_img1'];
            $product_price = $row['product_price'];

            echo "<div class='col-4'>

<img src='./admin_part/product_images/$product_img1' class='' alt=''>
<h5 class='#'>$product_title</h5>
<h6 class='#'>$product_price BDT</h6>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart ></a>
<a href='#' class='btn btn-secondary'>View</a>

</div>";
        }
    }
}

//GET IP ADDRESS FUNC
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


//CART FUNCTION
function cart()
{
    $conn = mysqli_connect("localhost", "root", "", "medic");
    if (isset($_GET['add_to_cart'])) {
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip' AND product_id = $get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in the cart')
            </script>";
            echo "<script>window.open('index.php','_self')
            </script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id, ip_address, quantity)
            VALUES ($get_product_id, '$ip', 0)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('Item is added to cart')
            </script>";
            echo "<script>window.open('index.php','_self')
            </script>";
        }
    }
}

//FUNCTION FOR CART ITEM NUMBER
function cart_item()
{
    $conn = mysqli_connect("localhost", "root", "", "medic");
    if (isset($_GET['add_to_cart'])) {
        $ip = getIPAddress();

        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    } else {
        $ip = getIPAddress();

        $select_query = "SELECT * FROM cart_details WHERE ip_address = '$ip'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    }
    echo  $count_cart_item;
}


//TOTAL PRICE FUNCTION
function total_cart_price(){
    $conn = mysqli_connect("localhost", "root", "", "medic");
    $ip = getIPAddress();
    $total_price = 0;

    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
    $result_query = mysqli_query($conn, $cart_query);
    while($row=mysqli_fetch_array($result_query)){
        $product_id = $row['product_id'];
        $select_products="SELECT * FROM products WHERE product_id='$product_id'";
        $result_products=mysqli_query($conn, $select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price+=$product_values;
        }   
    }
    echo $total_price;
    echo " /-";
}

//CART FUNCTION
function cart_details(){
    $conn = mysqli_connect("localhost", "root", "", "medic");
    $ip = getIPAddress();
    $total_price = 0;

    $cart_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
    $result_query = mysqli_query($conn, $cart_query);
    while($row=mysqli_fetch_array($result_query)){
        $product_id = $row['product_id'];
        $select_products="SELECT * FROM products WHERE product_id='$product_id'";
        $result_products=mysqli_query($conn, $select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price = array($row_product_price['product_price']);
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image1 = $row_product_price['product_image1'];
            $product_values = array_sum($product_price);
            $total_price+=$product_values;
        } 
    }
}

//GET USER ORDER DETAILS
function get_user_order_details(){
    
    $conn = mysqli_connect("localhost", "root", "", "medic");
    $username = $_SESSION['username'];
    $get_details="SELECT * FROM user_table WHERE username='$username'";
    $result_query=mysqli_query($conn, $get_details);
    while($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['user_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM user_orders WHERE user_id=$user_id AND order_status ='pending'";
                    $result_orders_query=mysqli_query($conn, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h2 class='title mt-2'>Pending Orders</h2>"; 
                        echo "<h4 class='text-center mt-5'>You have <span class='text-danger'>$row_count</span> Pending Orders</h4>";
                    }else{
                        echo "<h2 class='title mt-2'>Pending Orders</h2>"; 
                        echo "<h4 class='text-center mt-5'>You have <span class='text-danger'>0</span> Pending Orders</h4>";
                    
                    }
                }
            }
        }
    }
}
?>