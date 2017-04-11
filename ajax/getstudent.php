<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
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

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM student WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

//echo "<table>
echo "<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Parentname</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['parentname'] . "</td>";
    
    echo "</tr>";
}
//echo "</table>";
mysqli_close($con);
?>
</body>
</html>