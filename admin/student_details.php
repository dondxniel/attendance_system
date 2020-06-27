<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");

?>
    <div>
        
        <div class="container page_body ">
            
            <?php
                if(isset($_GET['student_id'])){
                    $student_id = $_GET['student_id'];

                    $select_student = "SELECT * FROM students WHERE id = '".$student_id."'";
                    $query_student = mysqli_query($conn, $select_student);
                    $fetch_student = mysqli_fetch_assoc($query_student);

                }else{
                    header("location: index.php");
                }
            ?>
            <div class="attendance_body text-center">
                
                <div class="page_body row">
                    <br>
                    <div class="col-md-3">
                        <img src=".<?php echo $fetch_student['photograph']?>" alt="" class = "side_image">
                    </div>
                    <hr>
                    <div class="col-md-8">
                        <p>
                            <b>Student Name</b>:<br> <?php echo $fetch_student['full_name']?><br>
                            <b>Student Matric Number</b>:<br> <?php echo $fetch_student['matric_number']?><br>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("assets/inc/footer.php")?>