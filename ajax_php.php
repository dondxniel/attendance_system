<?php
    include("assets/inc/conn.php");
    if(isset($_GET['img_name']) && isset($_GET['course_id'])){
        $img  = $_GET['img_name'];
        $course_id = $_GET['course_id'];

        //Check if student exists
        $select_student = "SELECT * FROM students WHERE photo_name = '".$img."'";
        $query_student = mysqli_query($conn, $select_student);
        $fetch_student = mysqli_fetch_assoc($query_student);
        if(mysqli_num_rows($query_student)){
            //Fetch all the data on the course 
            $sql_course = "SELECT * FROM courses WHERE id = '".$course_id."'";
            $query_course = mysqli_query($conn, $sql_course);
            $fetch_course = mysqli_fetch_assoc($query_course);

            $course_code = $fetch_course['code'];
            $course_title = $fetch_course['title'];
            $full_name = $fetch_student['full_name'];
            $matric_number = $fetch_student['matric_number'];
            $time = date("H:i");
            $date = date("Y-m-d");

            //Add a new attendance to the table
            $sql_save = "INSERT INTO attendances(course_code, course_title, student_name, student_matric_number, time, date) VALUES('".$course_code."', '".$course_title."', '".$full_name."', '".$matric_number."', '".$time."', '".$date."')";
            $query_save = mysqli_query($conn, $sql_save);

            echo $date;
        }else{
            echo "false";
        }
    }

    if(isset($_GET['date']) && isset($_GET['course'])){
        $date = $_GET['date'];
        $course_id = $_GET['course'];

        $sql_course = "SELECT * FROM courses WHERE id = '".$course_id."'";
        $query_course = mysqli_query($conn, $sql_course);
        $fetch_course = mysqli_fetch_assoc($query_course);
        $course_code = $fetch_course['code'];

        $sql_attendances = "SELECT * FROM `attendances` WHERE `course_code` = '".$course_code."' AND `date` = '".$date."' ORDER BY id DESC";
        $query_attendances = mysqli_query($conn, $sql_attendances);
        while($fetch_attendances = mysqli_fetch_assoc($query_attendances)){
            $mat_num = $fetch_attendances['student_matric_number'];
            $student_details = "SELECT * FROM students WHERE matric_number = '".$mat_num."'";
            $query_student_details = mysqli_query($conn, $student_details);
            $fetch_student_details = mysqli_fetch_assoc($query_student_details);
            echo "<div class = 'list_item'>
                        <div class='row'>
                            <div class='col-md-4'>
                                ".$fetch_attendances['student_name']."
                            </div>
                            <div class='col-md-8'>
                                ".$fetch_attendances['student_matric_number']."
                            </div>
                        </div>
                    </div>";
    // the supposed href attribute of the above echoed div if it was an anchor tag
    // ==>  href='student_details.php?student_id=".$fetch_student_details['id']."'
        }
    }
?>
