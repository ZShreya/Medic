<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
 @session_start();
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
    <title>MEDIC - USER DELETE ACCOUNT</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>
    <h2 class='title mt-2'>Delete Account</h2>
    <form action="" method="POST" class="mt-5">
    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto shadow-none" name="delete" value="Delete Account">
    </div>

    <div class="form-outline mb-4">
        <input type="submit" class="form-control w-50 m-auto shadow-none" name="dont_delete" value="Don't Delete Account">
    </div>
</form>

<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="DELETE FROM user_table WHERE username='$username_session'";
    $result=mysqli_query($conn, $delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>"; 
    }
}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>"; 
}
?>
</body>

</html>