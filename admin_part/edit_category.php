<?php
$con=mysqli_connect('localhost','root','','medic');
if(isset($_GET['edit_category'])){
  $edit_category=$_GET['edit_category'];
  $get_categories="Select * from `categories` where category_id=$edit_category ";
  $result=mysqli_query($con,$get_categories);
  $row=mysqli_fetch_assoc($result);
  $category_title=$row['category_title'];
}

if(isset($_POST['edit_cat'])){
    $cat_title=$_POST['category_title'];
    $update_query="UPDATE categories SET category_title='$cat_title' WHERE category_id=$edit_category";
    $result_cat=mysqli_query($con, $update_query);
    if($result_cat){
        echo "<script>alert('Update Done')</script>";
        echo "<script>window.open ('./index.php?view_categories','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">

</head>
<body>
<div class="container">
        <h2 class="title">Edit Category</h2>
        <form action="" method="POST" class="">
            <div class="form-outline mb-4 w-50 m-auto">
                <h6>Category Title</h6>
                <input type="text" name="category_title" id="category_title" class="form-control shadow-none" required="required" value='<?php echo $category_title;?>'>

            </div>
            <div class="text-center">
                <input type="submit" value="Update" class="btn btn-success px-2 mb-3 shadow-none" name="edit_cat">
            </div>
            

        </form>
</div>
</body>
</html>