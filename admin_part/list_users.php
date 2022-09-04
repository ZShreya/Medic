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
    <title>All Users - ADMIN</title>
<style>
    .product_img {
    width: 100px;
    object-fit: contain;
    
}
</style>
</head>

<body>

    <h2 class='title mt-2'>All Users</h2>

    <table class="table table-bordered border-dark">
        <thead class="bg-success">
            <?php
        $get_payments = "SELECT * FROM user_table";
        $result=mysqli_query($conn,$get_payments);
        $row_count=mysqli_num_rows($result);
       if($row_count == 0){
        echo "<h3 class='text-danger text-center mt-5'>No Users Found</h3>";
       } else{
        echo "<tr class='text-center'>
        <th class='text-center'>SL No</th>
        <th class='text-center'>Username</th>
        <th class='text-center'>User Email</th>
        <th class='text-center'>User Image</th>
        <th class='text-center'>Address</th>
        <th class='text-center'>Mobile</th>
        <th class='text-center'>Delete</th>           
    </tr>
    </thead>
    "; }
       
        $number = 0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id = $row_data['user_id'];
            $username = $row_data['username'];
            $user_email = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            $number++;
        
            ?>
            <tbody>
            <tr class='text-center'>
            <td class='text-center'><?php echo $number;?></td>
            <td class='text-center'><?php echo $username;?></td>
            <td class='text-center'><?php echo $user_email;?></td>
            <td><img src='../users_area/user_images/<?php echo $user_image;?>'  alt='No Image' class='product_img'/></td>
            <td class='text-center'><?php echo $user_address;?></td>
            <td class='text-center'><?php echo $user_mobile;?></td>
            <td class='text-center'><a href='index.php?delete_user=<?php echo $user_id?>' class='text-dark'><i class='fas fa-trash'></i></a></td>
            </tr>

            <?php   
            }
            ?>
        </tbody>
    </table>
</body>

</html>