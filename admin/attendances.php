<?php 
    include("assets/inc/index_header.php");
    include("assets/inc/conn.php")
    
?>
    <div>
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h1 class="header">Attendances</h1>
                </div>
                <?php
                    //Searching for attendances 
                    if(isset($_GET['query'])):
                        $query = $_GET['query'];
                        $sql_attendances = "SELECT * FROM attendances WHERE course_code LIKE '%".$query."%' OR course_title LIKE '%".$query."%' OR student_name LIKE '%".$query."%' OR student_matric_number LIKE '%".$query."%'";
                        $query_attendances = mysqli_query($conn, $sql_attendances);
                        if(mysqli_num_rows($query_attendances)):
                            while($fetch_attendances = mysqli_fetch_assoc($query_attendances)):
                ?>
                <a href="attendance_details.php?attendance_id=<?php echo $fetch_attendances['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_attendances['course_code']?>
                        </div>
                        <div class="col-md-5 sub_items">
                            <?php echo $fetch_attendances['student_matric_number']?>
                        </div>
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_attendances['date']?>
                        </div>
                    </div>
                </a>
                <?php   
                            endwhile;
                        else:
                            echo "<p class='text-center' style = 'margin-bottom: 15%'>NO COURSE MATCHES YOUR SEARCH. <a href = 'courses.php'>VIEW ALL COURSES?</a></p>";
                        endif;
                    else:
                        //Displaying all courses
                        $sql_attendances = "SELECT * FROM attendances ORDER BY id DESC";
                        $query_attendances = mysqli_query($conn, $sql_attendances);
                        while($fetch_attendances = mysqli_fetch_assoc($query_attendances)):
                ?>
                <a href="attendance_details.php?attendance_id=<?php echo $fetch_attendances['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_attendances['course_code']?>
                        </div>
                        <div class="col-md-5 sub_items">
                            <?php echo $fetch_attendances['student_matric_number']?>
                        </div>
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_attendances['date']?>
                        </div>
                    </div>
                </a>
                <?php
                        endwhile;
                    endif;
                ?>
            </div>
            
        </div>
    </div>

<?php include("assets/inc/footer.php")?>