<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Archive</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    
</head>
<div class = "">
<br><br><br><br><br>
    <div class="header text-center">
        <h2>Admin Login</h2>
    </div>
    <?php
        include("./assets/inc/conn.php");
        if(isset($_POST['email']) && isset($_POST['password'])){
            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $sql_email = "SELECT * FROM admin WHERE email = '".$email."'";
                $query_email = mysqli_query($conn, $sql_email);
                if(mysqli_num_rows($query_email)){
                    $fetch_admin = mysqli_fetch_assoc($query_email);
                    if($fetch_admin['password'] == $password){
                        $_SESSION['admin'] = true;
                        header("location: ./admin/");
                    }
                }
            }
        }
    ?>
    <form action="admin_login.php" method = "POST" class = "register_form text-center">
        <input type="text" name = "email" class = "form-control" placeholder = "Enter your email">
        <br>
        <input type="password" name = "password" class = "form-control" placeholder = "Enter your password">
        <br>
        <br>
        <button class = "btn btn-dark">Login</button>
    </form>

</div>
<?php include("./assets/inc/footer.php")?>