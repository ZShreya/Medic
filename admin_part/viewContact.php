<?php
$con=mysqli_connect('localhost','root','','medic');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>

    <h2 class='title mt-2'>View Messages</h2>
    <table class="table table-bordered border-dark">
        <thead class="bg-success ">
            <tr class="text-center">
                <th class="text-center">SL No</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
            
                <th class="text-center">Messages</th>

            </tr>
        </thead>

        <tbody class="bg-secondary text-light">
            <?php
            $select_cat="Select * from  `contact`";
            $result=mysqli_query($con,$select_cat);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $category_id=$row['C_ID'];
                $category_title=$row['username'];
                $category_title1=$row['email'];
               
                $category_title3=$row['messages'];
                $number++;
            
            ?>
            <tr class="text-center">
                <td><?php echo $number;?></td>
                <td><?php echo $category_title;?></td>
                <td><?php echo $category_title1;?></td>
               
                <td><?php echo $category_title3;?></td>
                
            </tr>
            <?php
            }?>
        </tbody>
    </table>
</body>
<html>