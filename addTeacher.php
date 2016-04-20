<html>
<head>
<title>Add Teacher</title>
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
		<form action="http://localhost/project/teacheradded.php" method="post">
			<br>
			<h2>Add a New Teacher</h2>
			<br><br>
			<p>ID:
			<input type="text" name="id" size="30" value="" />
			</p>
			<br>
			<p>First Name:
			<input type="text" name="first_name" size="30" value="" />
			</p>
			<br>
			<p>Last Name:
			<input type="text" name="last_name" size="30" value="" />
			</p>
			<br>
			<p>Street:
			<input type="text" name="street" size="30" value="" />
			</p>
			<br>
			<p>City:
			<input type="text" name="city" size="30" value="" />
			</p>
			<br>
			<p>
			<input type="submit" name="submit" value="Send" />
			</p>
			
		</form>
	</div>
</body>
</html>