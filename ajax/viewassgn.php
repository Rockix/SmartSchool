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

$status="not complete";
$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");

$sql="SELECT title,filename,status FROM assignment"; 
$result = mysqli_query($con,$sql);

echo "<table class='w3-table-all w3-card-4 w3-hoverable'>
<tr class='w3-text-teal'>
<th>Title</th>

<th>Status</th>
<th></th>


</tr>";
while($row = mysqli_fetch_array($result)) {
	$status=(string)$row['status'];
    echo "<tr class='w3-text-grey'>";
    echo "<td>" . $row['title'] ."</td>";
    
    echo "<td>" . $row['status'] . "</td>";

    if($status=='not completed'){
    	echo "<td><a href='download.php?download_file=". $row['filename']. "'"."><i class='fa fa-download fa-2x w3-text-red' aria-hidden='true'></i></a></td>";
    }else{
    	echo "<td><i class='fa fa-check-circle fa-2x w3-text-teal' aria-hidden='true'></i></td>";
    }
    
    
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>