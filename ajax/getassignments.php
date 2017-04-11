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

$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");

$sql="SELECT title,published_date,status FROM assignment"; 
$result = mysqli_query($con,$sql);

echo "<table class='w3-table-all w3-card-4 w3-hoverable'>
<tr class='w3-text-teal'>
<th>Title</th>
<th>Date Published</th>
<th>Status</th>


</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr class='w3-text-grey'>";
    echo "<td>" . $row['title'] ."</td>";
    
    echo "<td>" . $row['published_date'] . "</td>";
    echo "<td>" . $row['status'] ."</td>";
    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>