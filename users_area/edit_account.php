<?php
$conn = mysqli_connect("localhost", "root", "", "medic");
 @session_start();

//FETCH PART
 if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE username='$user_session_name'";
    $result_query = mysqli_query($conn, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_image = $row_fetch['user_image'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}
    //UPDATE PART
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");

        //UPDATE QUERY
        $update_data = "UPDATE user_table SET username='$username', user_email='$user_email', user_image = '$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
        $result_query_update=mysqli_query($conn, $update_data);
        if($result_query_update){
            echo "<script>alert('Data Updated Successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
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
    <title>MEDIC - USER PROFILE</title>

    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <h2 class='title mt-2'>Edit Account</h2>
        <div class="pb-4 w-50 m-auto">
            <h6 class="">Username</h6>
            <input type="text" name="user_username" id="user_username" class="form-control shadow-none py-2"
                value="<?php echo $username ?>" placeholder="" autocomplete="off" />
                
        </div>

        <div class="pb-4 w-50 m-auto">
            <h6 class="">User Email</h6>
            <input type="email" name="user_email" id="user_email" class="form-control shadow-none py-2" placeholder=""
                value="<?php echo $user_email ?>" autocomplete="off" />
        </div>

        <div class="pb-4 w-50 m-auto">
            <h6 class="">User Image</h6>
            <input type="file" name="user_image" id="user_image" class="form-control shadow-none py-2" placeholder=""
                value="<?php echo $user_image?>" autocomplete="off" />
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_image">
        </div>

        <div class="pb-4 w-50 m-auto">
            <h6 class="">User Address</h6>
            <input type="text" name="user_address" id="user_address" class="form-control shadow-none py-2"
                value="<?php echo $user_address ?>" placeholder="" autocomplete="off" />
        </div>

        <div class="pb-4 w-50 m-auto">
            <h6 class="">User Mobile</h6>
            <input type="text" name="user_mobile" id="user_mobile" class="form-control shadow-none py-2" placeholder=""
                value="<?php echo $user_mobile ?>" autocomplete="off" />
        </div>

        <div class="pb-4 w-50 m-auto">
            <input class="mb-3 bg-success text-white border-0" name="user_update" type="submit" value="Update">
        </div>

    </form>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>