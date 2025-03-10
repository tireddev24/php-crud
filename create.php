<?php
    session_start();
    include('db.config.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $fname = $_POST['f_name'];      
            $lname = $_POST['l_name'];   
            $age = $_POST['age'];
            $location = $_POST['location'];       
   
    $query = mysqli_query($con, "insert into users (f_name, l_name, age, location) values ('$fname', '$lname', '$age', '$location'  )");
        if($query){
        echo "<script>alert('successfully created record')</script>";
        $_SESSION['status'] = "User created successfully!";
        sleep(2);
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
        <div class="bg-white w-max rounded p-3">
            <a href="view.php" class="btn btn-info font-bold mb-3"> < Go Back</a>
            <h2>Fill Form</h2>
            <form action="" method="post">
                <div class="mb-2">
                    <input type="text" class="form-control" name="f_name" id="" placeholder="Enter first name" >
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="l_name" id="" placeholder="Enter last name" >
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="age" id="" placeholder="Enter age" >
                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" name="location" id="" placeholder="Enter location" >
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>

    </div>
</body>
</html>

