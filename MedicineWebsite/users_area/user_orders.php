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
    <title>MEDIC - USER PROFILE</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>

    <?php
$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result = mysqli_query($conn, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

?>
    <h2 class='title mt-2'>My Orders</h2>

    <table class="table table-bordered mt-5">
        <thead class="bg-success">
            <tr class="text-center">
                <th>SL No</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Order Status</th>
                <th class="text-center">Payment Status</th>

            </tr>
        </thead>

        <tbody>
            <?php

            $get_order_details = "SELECT * FROM user_orders WHERE user_id=$user_id";
            $result_orders = mysqli_query($conn, $get_order_details);
            $number = 1;
            while($row_orders=mysqli_fetch_assoc($result_orders)){
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_status = $row_orders['order_status'];
            if($order_status == 'pending'){
                $order_status = 'Incomplete';
            }else{
                $order_status = 'Complete';
            }
            $order_date = $row_orders['order_date'];
            
            echo "<tr class='text-center'>
            <td>$number</td>
            <td>$amount_due.00 BDT</td>
            <td>$total_products</td>
            <td>$invoice_number</td>
            <td>$order_date</td>
            <td>$order_status</td>";
            ?>
            <?php
            if($order_status == 'Complete'){
                echo "<td class='text-center fw-bold'>Paid</td>";
            }else{
                echo "<td class='text-center'><a href='confirm_payment.php?order_id=$order_id'><h6 class='fw-bold'>Confirm</h6></td>
                </tr>";
            }
        $number++;
    }
        ?>
            
            </tbody>
    </table>

</body>

</html>