var formCourse = document.getElementById("formCourse");
formCourse.addEventListener("submit", courseSelected);
document.getElementById("selectStudent").style.display = "none";

var theDate = new Date();
var presentDate = `${theDate.getFullYear()}-${appendZero(theDate.getMonth()+1)}-${appendZero(theDate.getDate())}`;

function appendZero(date){
    if(date<=9){
        date = date.toString();
        date = "0"+date;
    }else{
        date = date.toString();
    }
    return date;
}

function courseSelected(e){
    e.preventDefault();
    var course = document.getElementById("course").value;
    if(course == ""){
        document.getElementById("errorMessage").innerHTML = "<span class = 'text-danger'>Select a course before clicking the button.</span>";
    }else{
        document.getElementById("selectCourse").style.display = "none";
        document.getElementById("selectStudent").style.display = "block";
        localStorage.setItem("courseId", course);
        addToAttendance();
    }
}

document.getElementById("formStudent").addEventListener("submit", studentSelected);

function studentSelected(e){
    e.preventDefault();
    // console.log();
    var photoPath = document.getElementById("picture").value;
    if(photoPath != ""){
        var fileName = photoPath.split("\\");
        fileName = fileName[fileName.length-1];
        fileName = fileName.split(".")[0];
        // alert(fileName);
        //XMLHttpRequest object to check the database if a student image exists with that name
        var checkDb = new XMLHttpRequest();
        checkDb.open("GET", `ajax_php.php?img_name=${fileName}&course_id=${localStorage.getItem('courseId')}`, true);
        // var saveAttendance = new XMLHttpRequest();
        
        checkDb.onload = function(){
            if(checkDb.status == 200){
                if(this.responseText == "false"){
                    alert("Sorry this student is not recognized student of the school");
                }else{
                    alert("Student's details added to the attendance");
                    document.getElementById("formStudent").reset();
                    // var responses = this.responseText;
                    addToAttendance();
                }
            }
        }
        checkDb.send();
    }else{
        alert("Finish filling the form before submitting");
    }
}

// document.getElementById("attendanceLists").addEventListener("load", addToAttendance);
// To display the student lists immediately the page is loaded
// if(document.getElementById("selectStudent").style.display == "block"){
    
// }
// alert(presentDate);
function addToAttendance(){
    var updateAttendance = new XMLHttpRequest();
    updateAttendance.open("GET", `ajax_php.php?date=${presentDate}&course=${localStorage.getItem('courseId')}`, true);

    updateAttendance.onload = function(){
        if(updateAttendance.status == 200){
            document.getElementById("attendanceLists").innerHTML = this.responseText;
        }
    }
    updateAttendance.send();
}

function classOver(){
    localStorage.clear();
    document.getElementById("attendanceLists").innerHTML = "";
    document.getElementById("selectCourse").style.display = "block";
    document.getElementById("selectStudent").style.display = "none";
    document.getElementById("formCourse").reset();
    document.getElementById("formStudent").reset();
}