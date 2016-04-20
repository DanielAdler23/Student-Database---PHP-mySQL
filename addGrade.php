<html>
	<head>
		<title>Students</title>	
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

			require_once('connect.php');


			$query = "SELECT id, first_name, last_name, street, city, birthday FROM students";

			$response = @mysqli_query($dbc, $query);


			if($response){

			echo '<table id="table">
			

			<tr><th align="left"><b>ID</b></th>
			<th align="left"><b>First Name</b></th>
			<th align="left"><b>Last Name</b></th>
			<th align="left"><b>Street</b></th>
			<th align="left"><b>City</b></th>
			<th align="left"><b>Birth Day</b></th></tr>';


			while($row = mysqli_fetch_array($response)){

				echo '<tr><td align="left">' . 
				$row['id'] . '</td><td align="left">' . 
				$row['first_name'] . '</td><td align="left">' . 
				$row['last_name'] . '</td><td align="left">' .
				$row['street'] . '</td><td align="left">' .
				$row['city'] . '</td><td align="left">' . 
				$row['birthday'] . '</td>';

				echo '</tr>';
			}

				echo '</table>';

			} else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

			}
			
			
			
			
			$query2 = "SELECT id, first_name, last_name, street, city, birthday FROM students";
			$query4 = "SELECT * FROM courses";

			$response2 = @mysqli_query($dbc, $query2);
			$response4 = @mysqli_query($dbc, $query4);
			
			
			$i = 0;
			while($row = mysqli_fetch_array($response2))
			{
				$ids[$i]=$row['id'];
				$i++;
			}
			$total = count($ids);
			
			$x = 0;
			while($row = mysqli_fetch_array($response4))
			{
				$cour[$x]=$row['course'];
				$x++;
			}
			$totalcour = count($cour);

			if($response2 && $response4){
			?>
				<form method="POST" action="">
					Select the Name to Update: <select name="upd">
					<option>Select</option>
			<?php
				for($j=0;$j<$total;$j++)
				{
			?>
			<option>
				<?php 
					echo $ids[$j];
				?>
			</option>
				<?php
					}
				?>
				</select><br />
				Select the course to Update: <select name="cour">
				<option>Select</option>
				<?php
				for($y=0;$y<$totalcour;$y++)
				{
			?>
			<option>
				<?php 
					echo $cour[$y];
				?>
			</option>
				<?php
					}
				?>
				</select>
				<br>
				<label>Enter new grade: <input type="text" name="newGrade"></label>
				<br><br>
			<input name="submit" type="submit" value="Update"/><br><br>
			</form>
					
<?php

if(isset($_POST['submit'])){
	

	$value=$_POST['upd'];
	$value2=$_POST['cour'];	
	$value3=$_POST['newGrade'];	
	
	$query6 = "SELECT id, first_name, last_name FROM students WHERE id='$value'";
	$response6 = @mysqli_query($dbc, $query6);
	
	if($response6){
		while($row = mysqli_fetch_array($response6))
			{
				$studid=$row['id'];
				$studfirst=$row['first_name'];
				$studlast=$row['last_name'];
			}
	}
	else{
		echo "NO";
	}
	
	$query5 = "INSERT INTO enrolled (id, first_name, last_name,
        course, grade) VALUES (?, ?, ?,
        ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query5);
        
        
        mysqli_stmt_bind_param($stmt, "isssi", $studid, $studfirst, $studlast, $value2, $value3);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo '<h2>Grade Entered</h2><br>';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo '<h2>Error Occurred</h2><br>';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
 

}
}

else {

			echo "Couldn't issue database query<br />";

			echo mysqli_error($dbc);

}

		
		?>				
		</div>
		
				
			
			
	</body>
</html>




