<?php

$con=mysqli_connect('localhost','root','','medic');
if(isset($_GET['delete_user'])){
    $delete_user=$_GET['delete_user'];
    $delete_query="DELETE FROM user_table WHERE user_id=$delete_user";
    $result_product=mysqli_query($con,$delete_query);
    if($result_product){
        echo "<script>alert('User Deleted')</script>";
        echo "<script>window.open ('./index.php','_self')</script>";
    }
}
?>