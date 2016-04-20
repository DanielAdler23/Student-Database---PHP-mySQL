<html>
<head>
<title>Course Added</title>
<link rel="stylesheet" type="text/css" href="style.php"/>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
<body>
	<div id='cssmenu'>
<ul>
   <li><a href='index.html'><span>Home</span></a></li>
   <li class='active has-sub'><a href='getStudent.php'><span>Students</span></a>
      <ul>
         <li><a href='getStudent.php'><span>Show students</span></a></li>
            
         <li><a href='addStudent.php'><span>Add Student</span></a></li>
         
         <li><a href='updateStudent.php'><span>Update Student</span></a></li>
         
         <li><a href='deleteStudent.php'><span>Delete Student</span></a></li>
         
         <li><a href='showGrades.php'><span>Student Grades</span></a></li>
                  
         <li><a href='addGrade.php'><span>Add Grades</span></a></li>
         
         <li><a href='updateGrade.php'><span>Update Grades</span></a></li>
             
      </ul>
   </li>
   <li class='active has-sub'><a href='getTeacher.php'><span>Teachers</span></a>
      <ul>
         <li><a href='getTeacher.php'><span>Show Teachers</span></a></li>
            
         <li><a href='addTeacher.php'><span>Add Teacher</span></a></li>
         
         <li><a href='updateTeacher.php'><span>Update Teacher</span></a></li>
         
         <li><a href='deleteTeacher.php'><span>Delete Teacher</span></a></li>          
      </ul>
   </li>
   <li class='active has-sub'><a href='getCourse.php'><span>Courses</span></a>
      <ul>
         <li><a href='getCourse.php'><span>Show Courses</span></a></li>
         
         <li><a href='getTeaches.php'><span>Courses Teachers</span></a></li>
            
         <li><a href='addCourse.php'><span>Add Course</span></a></li>
         
         <li><a href='updateCourse.php'><span>Update Course</span></a></li>
         
         <li><a href='deleteCourse.php'><span>Delete Course</span></a></li> 
         
         <li><a href='bestWorst.php'><span>Best/Worst grades</span></a></li>          
      </ul>
   </li>
</ul>
</div>
	<div id="wrapper">
<?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
	if(empty($_POST['code'])){

        // Adds name to array
        $data_missing[] = 'Code';

    } else {

        // Trim white space from the name and store the name
        $code = $_POST['code'];

    }
    
    if(empty($_POST['course'])){

        // Adds name to array
        $data_missing[] = 'Course Name';

    } else {

        // Trim white space from the name and store the name
        $course = $_POST['course'];

    }

    if(empty($_POST['semester'])){

        // Adds name to array
        $data_missing[] = 'Semester';

    } else{

        // Trim white space from the name and store the name
        $semester = $_POST['semester'];

    }

    if(empty($_POST['year'])){

        // Adds name to array
        $data_missing[] = 'Year';

    } else {

        // Trim white space from the name and store the name
        $year = $_POST['year'];

    }
  
    if(empty($data_missing)){
        
        require_once('connect.php');
        
        $query = "INSERT INTO courses (code, course, semester, year) VALUES (?, ?, ?, ?)";
       
        $stmt = mysqli_prepare($dbc, $query);
        
        
        mysqli_stmt_bind_param($stmt, "isss", $code, $course, $semester, $year);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo '<h2>Course Entered</h2><br>';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo '<h2>Error Occurred</h2><br>';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo '<h2>You need to enter the following data</h2><br><br>';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>


</div>

</body>
</html>