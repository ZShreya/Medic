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
    <title>All Orders - ADMIN</title>
</head>
<style>
.product_img {
    width: 100px;
    object-fit: contain;
}
</style>


<body>

    <h2 class='title mt-2'>All Orders</h2>

    <table class="table table-bordered border-dark">
        <thead class="bg-success">
            <?php
        $get_orders = "SELECT * FROM user_orders";
        $result=mysqli_query($conn,$get_orders);
        $row_count=mysqli_num_rows($result);
       if($row_count == 0){
        echo "<h3 class='text-danger text-center mt-5'>No Orders Placed Yet</h3>";
       } else{
        echo "<tr class='text-center'>
        <th class='text-center'>SL No</th>
        <th class='text-center'>Due Amount</th>
        <th class='text-center'>Invoice Number</th>
        <th class='text-center'>Total Products</th>
        <th class='text-center'>Order Date</th>
        <th class='text-center'>Status</th>                
    </tr>
</thead>
<tbody>";
        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;
            echo "<tr class='text-center'>
            <td class='text-center'>$number</td>
            <td class='text-center'>$amount_due.00 BDT</td>
            <td class='text-center'>$invoice_number</td>
            <td class='text-center'>$total_products</td>
            <td class='text-center'>$order_date</td>
            <td class='text-center'>$order_status</td>        
            </tr>";
        }
    }
        ?>

            </tbody>
    </table>

</body>

</html>