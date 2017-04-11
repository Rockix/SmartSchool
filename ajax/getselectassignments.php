
<?php

$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");

$sql="SELECT id,title FROM assignment"; 
$result = mysqli_query($con,$sql);

echo "<option value='' disabled selected>Select assignment to view marks:</option>";
while($row = mysqli_fetch_array($result)) {

    echo '<option value="'.$row['id'].'">' . $row['title'] . "</option>";
 
}

mysqli_close($con);
?>
