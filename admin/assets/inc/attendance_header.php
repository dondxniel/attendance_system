<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header("location: ../admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/css/styles.css">

    
</head>
<body>
    <nav class = "navbar navbar-expand-md navbar-dark bg-dark">
        <a href="#" class = "navbar-brand">Attendance System</a>
        <button type="button" class = "navbar-toggler" data-toggle="collapse" data-target = "#navbarCollapse">
            <span class = "navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarCollapse">
            <div class = "navbar-nav">
                <a href="index.php" class = "nav-item nav-link">Home</a>
                <a href="courses.php" class = "nav-item nav-link">Courses</a>
                <a href="attendances.php" class = "nav-item nav-link">Attendances</a>
                <a href="logout.php" class = "nav-item nav-link">Logout</a>
                
            </div>
            <form action="attendances.php" method = "GET" class = "form-inline ml-auto">
                <input type="text" name = "query" class = "form-control mr-sm-2" placeholder = "Search Student or Course">
                <button type = "submit" class = "fa fa-search btn btn-outline-light"></button>
            </form>
        </div>
    </nav>