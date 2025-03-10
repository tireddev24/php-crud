<?php 

    session_start();
    include('db.config.php');
    if(isset($_GET['delid'])){
        $id = $_GET['delid'];

        
        $query = mysqli_query($con, "delete from users where id='$id'");
    }

    if($query){
        echo "<script>alert('Deleted record')</script>";
        $_SESSION['status'] = 'User deleted!';
        sleep(1);
        echo "<script type='text/javascript'>document.location = 'view.php'</script>";
    } else {
        echo "<script>alert('An error occured')</script>";
    }

?>