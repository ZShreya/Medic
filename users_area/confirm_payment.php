<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
 @session_start();

 if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    
    $select_data = "SELECT * FROM user_orders WHERE order_id=$order_id";
    $result = mysqli_query($conn, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];

    if(isset($_POST['confirm_payment'])){
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = $_POST['payment_mode'];
        $insert_query = "INSERT INTO user_payments (order_id, invoice_number, amount, payment_mode) 
        VALUES ($order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($conn, $insert_query);
        if($result){
            echo "<script>alert('Payment Completed Successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
        $update_orders = "UPDATE user_orders SET order_status = 'Complete' WHERE order_id=$order_id";
        $result_orders = mysqli_query($conn, $update_orders);
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
    <title>MEDIC - CONFIRM PAYMENT</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
<style>
    .container{        
        justify-content: center;
        align-items: center;
        margin-top: 100px;
    }
</style>
</head>

<body>
    <div class="container justify-content-center align-items-center">

        <form action="" method="POST">
            <h3 class="title">Confirm Payment</h3>
            <div class="pb-4 w-50 m-auto">
                <h6 class="">Invoice Number</h6>
                <input type="text" name="invoice_number" id="invoice_number" class="form-control shadow-none py-2"
                    value="<?php echo $invoice_number?>" autocomplete="off" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Amount</h6>
                <input type="text" name="amount" id="amount" class="form-control shadow-none py-2"
                    value="<?php echo $amount_due?>" autocomplete="off" />
            </div>

            <div class="pb-4 w-50 m-auto">
                <h6 class="">Payment Method</h6>
                <select type="text" name="payment_mode" id="payment_mode" class="form-select shadow-none py-2">
                        <option>Cash on Delivery</option>
                        <option>Bkash</option>
                        <option>Rocket</option>
                        <option>Nagad</option>
                        <option>Visa</option>
                        <option>MasterCard</option>
                </select>
            </div>

            <div class="pb-4 w-50 m-auto text-center form-outline">
            <input class="mb-3 bg-success text-white border-0" name="confirm_payment" type="submit" value="Confirm">
        </div>

        </form>

    </div>
</body>

</html>