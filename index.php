<?php 
    include("assets/inc/header.php");
    include("assets/inc/conn.php");    
?>
    <div>
        <div class="center_button text-center">
            <div class = "select_course" id = "selectCourse">
                <form id="formCourse" class = "form-inline add_student_form">
                    <label for="picture" style = "display: inline; font-weight: bold">
                        Select Course
                    </label>
                    <select name="course" id="course" class = "form-control mr-sm-2">
                        <option value="" selected>--Select Course--</option>
                        <?php 
                            $sql_courses = "SELECT * FROM courses";
                            $query_courses = mysqli_query($conn, $sql_courses);
                            while($fetch_courses = mysqli_fetch_assoc($query_courses)):
                        ?>
                            <option value="<?php echo $fetch_courses['id']?>"><?php echo $fetch_courses['code']?></option>
                        <?php
                            endwhile;
                        ?>
                    </select>
                    <button id = "btnCourse"  class = "fa fa-check btn btn-dark"></button>
                    <p id="errorMessage"></p>
                </form>
            </div>
            <div class = "select_course" id = "selectStudent">
                <form id = "formStudent" class = "form-inline add_student_form">
                    <label for="picture" style = "display: inline; font-weight: bold">
                        Select Picture
                    </label>
                    <input type="file" id = "picture" class = "form-control mr-sm-2">
                    <button type = "submit" class = "fa fa-plus btn btn-dark"></button>
                    <div>
                        <br>
                        <button type = "button" onclick = "classOver()" class = "btn btn-dark">Class Over</button>
                    </div>
                </form>
                <div class="small" id= "small">
                    <p>
                        Note that this is a simulation, and in an actual system, this process will be automated in the sense that a camera will take a picture and compare it with a list of students in the students table of the web app's database.
                    </p>
                </div>
            </div>
            
        </div>
        <div class="container">
            <div class="row" id = "attendanceLists">
                
            </div>
        </div>
    </div>


<?php include("assets/inc/footer.php")?>