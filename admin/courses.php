<?php 
    include("assets/inc/courses_header.php");
    include("assets/inc/conn.php");    
?>
    <div>
        <div class="center_button text-center">
            
            <div class = "add_student">
                <h2 class = "header">Add Course</h2>
                <?php
                    if(isset($_GET['code']) && isset($_GET['title'])){
                        if(!empty($_GET['code']) && !empty($_GET['title'])){
                            $code = $_GET['code'];
                            $title = $_GET['title'];

                            $sql_add_course = "INSERT INTO courses(code, title) VALUES('$code', '$title')";
                            $query_add_course = mysqli_query($conn, $sql_add_course);
                        }else{
                            echo "<p class='text-danger'>Complete the form before submitting</p>";
                        }
                    }
                ?>
                <form action="#" class = "form-inline add_student_form">
                    
                    <input placeholder = "Course Code" type="text" id = "code" name = "code" class = "form-control mr-sm-2">
                    
                    <input placeholder = "Course Title" type="text" id = "title" name = "title" class = "form-control mr-sm-2">
                    <button type = "submit" class = "fa fa-plus btn btn-dark"></button>
                </form>
                
            </div>
            
        </div>
        <div class="container">
            <div class="row">
                <?php
                    //Searching for courses 
                    if(isset($_GET['query'])):
                        $query = $_GET['query'];
                        $sql_courses = "SELECT * FROM courses WHERE code LIKE '%".$query."%' OR title LIKE '%".$query."%'";
                        $query_courses = mysqli_query($conn, $sql_courses);
                        if(mysqli_num_rows($query_courses)):
                            while($fetch_courses = mysqli_fetch_assoc($query_courses)):
                ?>
                <div href="topic_details.php" class = "list_item">
                    <div class="row">
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_courses['code']?>
                        </div>
                        <div class="col-md-5 sub_items">
                            <?php echo $fetch_courses['title']?>
                        </div>
                        <div class="col-md-3 sub_items">
                            <a href="delete.php?course_id=<?php echo $fetch_courses['id']?>"><button class = "btn btn-dark">Delete</button></a>
                        </div>
                    </div>
                </div>
                <?php   
                            endwhile;
                        else:
                            echo "<p class='text-center' style = 'margin-bottom: 15%'>NO COURSE MATCHES YOUR SEARCH. <a href = 'courses.php'>VIEW ALL COURSES?</a></p>";
                        endif;
                    else:
                        //Displaying all courses
                        $sql_courses = "SELECT * FROM courses ORDER BY id DESC";
                        $query_courses = mysqli_query($conn, $sql_courses);
                        while($fetch_courses = mysqli_fetch_assoc($query_courses)):
                ?>
                <div href="topic_details.php" class = "list_item">
                    <div class="row">
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_courses['code']?>
                        </div>
                        <div class="col-md-5 sub_items">
                            <?php echo $fetch_courses['title']?>
                        </div>
                        <div class="col-md-3 sub_items">
                            <a href="delete.php?course_id=<?php echo $fetch_courses['id']?>"><button class = "btn btn-dark">Delete</button></a>
                        </div>
                    </div>
                </div>
                <?php
                        endwhile;
                    endif;
                ?>
            </div>
            
        </div>
    </div>

<?php include("assets/inc/footer.php")?>