<?php 
    session_start();
    include('db.config.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_GET['id'];
        $fname = $_POST['f_name'];      
        $lname = $_POST['l_name'];   
        $age = $_POST['age'];
        $location = $_POST['location'];       

$query = mysqli_query($con, "update users set f_name='$fname' ,l_name='$lname' ,age='$age', location='$location' where id='$id' ");
    if($query){
    echo "<script>alert('successfully updated user details')</script>";
    sleep(1);
    $_SESSION['status'] = "User details edited!";
    echo "<script type='text/javascript'>document.location = 'view.php'</script>";
} else {
    echo "<script>alert('An error occured')</script>";
}

}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create page</title>
</head>
<body>
    <div class="bg-dark d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="bg-white w-25 rounded p-3">
            <h2>Update Details</h2>
            <form action="" method="post">
                <?php 
                include('db.config.php');
                $id = $_GET['id'];
                $query = mysqli_query($con, "select * from users where id='$id'");
                while ($row = mysqli_fetch_array($query)){

                ?>
                <div class="mb-2">
                    <input type="text" class="form-control" value=<?php echo $row['f_name'] ?> name="f_name" id="" placeholder="Enter first name" >
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" value=<?php echo $row['l_name'] ?> name="l_name" id="" placeholder="Enter last name" >
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" value=<?php echo $row['age'] ?> name="age" id="" placeholder="Enter age" >
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" value=<?php echo $row['location'] ?> name="location" id="" placeholder="Enter location" >
                </div>
                <?php } ?>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>

    </div>
</body>
</html>

