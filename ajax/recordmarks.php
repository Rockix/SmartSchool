<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border-bottom: 1px solid #ddd;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");
//$sql="SELECT * FROM assessment WHERE assignmentId = '".$q."'";
$sql="SELECT student.firstname,student.lastname FROM student,assessment WHERE assignmentID='".$q."' and assessment.studentID = student.id"; 
$result = mysqli_query($con,$sql);

echo "<table class='w3-table-all w3-card-4 w3-hoverable'>
<tr class='w3-text-teal'>
<th>Student</th>
<th>Marks</th>


</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr class='w3-text-grey'>";
    echo "<td>" . $row['firstname'] . " " . $row['lastname'] ."</td>";
    
    echo "<td><input class='w3-input w3-animate-input ' style='width:30%' type='text'/></td>";
    
    
    echo "</tr>";
}
echo "<button type='submit' id='btnRecord' class='w3-btn w3-blue-grey w3-right'><i class='fa fa-upload w3-padding'></i>Upload Marks</button>";
echo "</table>";
mysqli_close($con);
?>
</body>
</html>