<?php 
    include("assets/inc/index_header.php");
    include("assets/inc/conn.php");
?>
    <div>
        <div class="center_button text-center">
            <div class = "add_student">
                <h2 class = "header">Add Student</h2>
                <?php
                    if(isset($_POST['name']) && isset($_POST['matric_number']) && isset($_FILES['photo'])){
                        if(!empty($_POST['name']) && !empty($_POST['matric_number']) && !empty($_FILES['photo'])){
                            $name = $_POST['name'];
                            $matric_number = $_POST['matric_number'];
                            $photo = $_FILES['photo'];
                            
                            //Getting the  file extension
                            $file_name_array = explode('.', $photo['name']);
                            $file_extension = strtolower(end($file_name_array));
                            //Checking if what is being uploaded is an actual image.
                            $allowed_extensions = array('jpg', 'png', 'jpeg');
                            if(in_array($file_extension, $allowed_extensions)){
                                if($photo['error'] === 0){
                                    $file_new_name = strtolower(end(array_reverse(explode(' ',$name))));
                                    $file_destination = './people_pictures/'.$file_new_name.'.'.$file_extension;
                                    
                                    //Send the file to the new directory 
                                    if(move_uploaded_file($photo['tmp_name'], '.'.$file_destination)){
                                        
                                        $insert_student = "INSERT INTO students (photograph, full_name, photo_name, matric_number) VALUES ('".$file_destination."', '".$name."', '".$file_new_name."', '".$matric_number."')";
                                        $query_insert_student = mysqli_query($conn, $insert_student);
                                        
                                        header("location: index.php");
                                    }else{
                                        echo "<p class = 'text-danger'>Error uploading file</p>";
                                    }
                                }else{
                                    echo "<p class = 'text-danger'>Error uploading file</p>";
                                }
                            }else{
                                echo "<p class = 'text-danger'>Please, only attempt uploading images of extension 'jpg', 'jpeg', 'png'</p>";    
                            }
                        }else{
                            echo "<p class = 'text-danger'>You can't add a car until you fill the form completely</p>";
                        }
                    }
                ?>
                <form action="index.php" method="POST" enctype = "multipart/form-data" class = "form-inline add_student_form">
                    <label for="picture" style = "display: inline; font-weight: bold">
                        Photograph:
                    </label>
                    <input type="file" id = "picture" name = "photo" class = "form-control mr-sm-2">
                    <label for="picture" style = "display: inline; font-weight: bold">
                        Name:
                    </label>
                    <input placeholder = "Full Name" type="text" id = "name" name = "name" class = "form-control mr-sm-2">
                    <label for="picture" style = "display: inline; font-weight: bold">
                        Matric number:
                    </label>
                    <input placeholder = "Matric Number" type="text" id = "matric_number" name = "matric_number" class = "form-control mr-sm-2">
                    <button type = "submit" class = "fa fa-plus btn btn-dark"></button>
                </form>
                
            </div>
            
        </div>
        <div class="container">
        <div class="row">
                <?php
                    //Searching for students 
                    if(isset($_GET['query'])):
                        $query = $_GET['query'];
                        $sql_students = "SELECT * FROM students WHERE full_name LIKE '%".$query."%' OR matric_number LIKE '%".$query."%'";
                        $query_students = mysqli_query($conn, $sql_students);
                        if(mysqli_num_rows($query_students)):
                            while($fetch_students = mysqli_fetch_assoc($query_students)):
                ?>
                <a href="student_details.php?student_id=<?php echo $fetch_students['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_students['full_name']?>
                        </div>
                        <div class="col-md-7 sub_items">
                            <?php echo $fetch_students['matric_number']?>
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
                        $sql_students = "SELECT * FROM students ORDER BY id DESC";
                        $query_students = mysqli_query($conn, $sql_students);
                        while($fetch_students = mysqli_fetch_assoc($query_students)):
                ?>
                <a href="student_details.php?student_id=<?php echo $fetch_students['id']?>" class = "list_item">
                    <div class="row">
                        <div class="col-md-3 sub_items">
                            <?php echo $fetch_students['full_name']?>
                        </div>
                        <div class="col-md-7 sub_items">
                            <?php echo $fetch_students['matric_number']?>
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

