<?php

session_start();
include('db.config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Records</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center vh-100 w-100 ">
        <div class="bg-white p-4 w-max rounded">
            <?php 
            if(isset($_SESSION['status'])){
            ?>
            <div class="alert alert-warning role-alert fade show alert-dismissible">
                <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss=alert ></button>
            </div>    
             <?php   unset($_SESSION['status']);
            }
            ?>
            <a href="create.php" class="btn btn-success">Add New</a>
            <?php  $datetime = new DateTime();
            
            
            ?>
            <table class="table ">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Location</th>
                    <th>Date added</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                    include('db.config.php');

                    $fetch = mysqli_query($con, 'select * from users');
                    $row = mysqli_num_rows($fetch);
                    if($row > 0){
                        while($r = mysqli_fetch_array($fetch)){
                    ?>        
                            <tr>
                                <td><?php echo $r['f_name'] ?></td>
                                <td><?php echo $r['l_name'] ?></td>
                                <td><?php echo $r['age'] ?></td>
                                <td><?php echo $r['location'] ?></td>
                                <td><?php
                                    $datetime = new DateTime($r['date_added'], new DateTimeZone('Europe/Amsterdam'));
                                    echo $datetime->format('D d M y') 
                                 
                                 ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $r['id'] ?>" class="btn btn-sm btn-info">Update</a>
                                    <a href="delete.php?delid=<?php echo $r['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }}
                    elseif ($row == 0) { 
                        
                        ?>
                    <tr><td colspan="6" class="fs-5 fw-bold font-monospace text-center border-bottom-0">No Records Found!</td></tr>
    
                   <?php }    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

