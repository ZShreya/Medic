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
    <title>All Payments - ADMIN</title>
</head>

<body>

    <h2 class='title mt-2'>All Payments</h2>

    <table class="table table-bordered border-dark">
        <thead class="bg-success">
            <?php
        $get_payments = "SELECT * FROM user_payments";
        $result=mysqli_query($conn,$get_payments);
        $row_count=mysqli_num_rows($result);
       if($row_count == 0){
        echo "<h3 class='text-danger text-center mt-5'>No Payment History</h3>";
       } else{
        echo "<tr class='text-center'>
        <th class='text-center'>SL No</th>
        <th class='text-center'>Invoice Number</th>
        <th class='text-center'>Amount</th>
        <th class='text-center'>Payment Mode</th>
        <th class='text-center'>Order Date</th>                
    </tr>
    </thead>
    <tbody>";

        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id = $row_data['order_id'];
            $payment_id = $row_data['payment_id'];
            $amount = $row_data['amount'];
            $invoice_number = $row_data['invoice_number'];
            $payment_mode = $row_data['payment_mode'];
            $date = $row_data['date'];
            $number++;
            echo "<tr class='text-center'>
            <td class='text-center'>$number</td>
            <td class='text-center'>$invoice_number</td>
            <td class='text-center'>$amount.00 BDT</td>
            <td class='text-center'>$payment_mode</td>
            <td class='text-center'>$date</td>        
            </tr>";
        }
    }
        ?>

            </tbody>
    </table>

</body>

</html>