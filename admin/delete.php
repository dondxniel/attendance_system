<?php 
    include("assets/inc/conn.php"); 
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $sql_delete = "DELETE FROM courses WHERE id = '".$course_id."'";
        $query_delete = mysqli_query($conn, $sql_delete);
        
    }

    header("location: courses.php");
?>