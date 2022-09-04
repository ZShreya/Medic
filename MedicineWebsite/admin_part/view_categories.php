<?php
$con=mysqli_connect('localhost','root','','medic');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories - ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<h2 class='title mt-2'>View Categories</h2>
<table class="table table-bordered border-dark">
        <thead class="bg-success">
            <tr class="text-center">
                <th class="text-center">SL No</th>
                <th class="text-center">Category Title</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $select_cat="SELECT * FROM `categories`";
            $result=mysqli_query($con,$select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['category_id'];
                $category_title=$row['category_title'];
                $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number;?></td>
                <td><?php echo $category_title;?></td>
                <td><a href='index.php?edit_category=<?php echo $category_id?>' class='text-dark'><i class='fas fa-edit'></i></a></td>
                <td class="text-center"><a href='index.php?delete_category=<?php echo $category_id?>' type="button" class=" text-dark" data-toggle="modal" data-target="#exampleModalLong"><i class='fas fa-trash'></i></a></td>
                
            </tr>
            <?php
            }?>
        </tbody>
</body>

</html>
