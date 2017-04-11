<?php 

$fname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : null;
$lname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : null;
$pname = isset($_POST['parent']) ? htmlspecialchars($_POST['parent']) : null;


$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");

//prepare and bind parameters

$sql=$con->prepare("INSERT INTO student (firstname, lastname, parentname) VALUES (?, ?, ?)"); 
$sql->bind_param("sss", $fname, $lname, $pname);
$sql->execute();

if(!$sql){
	echo "Shittto";
}else{
	echo "Yhh";
}

mysqli_close($con);

?>