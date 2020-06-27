<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");

?>
    <div>
        
        <div class="container page_body ">
            
            <?php
                if(isset($_GET['attendance_id'])){
                    $attendance_id = $_GET['attendance_id'];

                    $select_attendance = "SELECT * FROM attendances WHERE id = '".$attendance_id."'";
                    $query_attendance = mysqli_query($conn, $select_attendance);
                    $fetch_attendance = mysqli_fetch_assoc($query_attendance);

                    $mat_num = $fetch_attendance['student_matric_number'];

                    $select_student = "SELECT * FROM students WHERE matric_number = '".$mat_num."'";
                    $query_student = mysqli_query($conn, $select_student);
                    $fetch_student = mysqli_fetch_assoc($query_student);

                }else{
                    header("location: attendances.php");
                }
            ?>
            <div class="attendance_body text-center">
                <div class = "page-header">
                    <h1>Course: <?php echo $fetch_attendance['course_code']?></h1>
                    <p>
                        
                        <br>
                        <b>Date:</b> <?php echo $fetch_attendance['date']?>
                    </p>
                </div>
                <hr>
                <div class="page_body row">
                    <div class="col-md-3">
                        <img src=".<?php echo $fetch_student['photograph']?>" alt="" class = "side_image">
                    </div>
                    <hr>
                    <div class="col-md-8">
                        <p>
                            <b>Student Name</b>:<br> <?php echo $fetch_attendance['student_name']?><br>
                            <b>Student Matric Number</b>:<br> <?php echo $fetch_attendance['student_matric_number']?><br>
                            <b>Time:</b><br> <?php echo $fetch_attendance['time']?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>