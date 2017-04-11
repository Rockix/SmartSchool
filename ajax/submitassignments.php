<?php // You need to add server side validation and better error handling here
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// if(isset($_POST['btnPublish'])&& $_FILES['fileselect']['size']>0){
// 	$filename = $_FILES['fileselect']['name'];
// }

$title = isset($_POST['title']) ? $_POST['title'] : null;
$ext = ".docx";
$date = date('Y-m-d H:i:s');

$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");

$data = array();


if(isset($_GET['files']))
{	
	$error = false;
	$files = array();

	$uploaddir = '../uploads/';
	foreach($_FILES as $file)
	{
		if(move_uploaded_file($file['tmp_name'], $uploaddir .basename($file['name'])))
		{
			$files[] = $uploaddir .$file['name'];
			$filename = $file['name'];


		}
		else
		{
		    $error = true;
		}
	}
	$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);




}
else
{
	$data = array('success' => 'Form was submitted', 'formData' => $_POST);
}

echo json_encode($data);

/////////////////////////////////////////

//prepare and bind parameters

$stmt = $con->prepare("INSERT INTO assignment (title, filename, published_date, status) VALUES (?, ?, ?, ?)");
//$result = mysqli_query($con,$stmt);
$filename = $title.$ext;
$status = "not completed";
$stmt->bind_param("ssss", $title, $filename, $date, $status);
$stmt->execute();

$stmt = serialize($stmt);

//$result = mysqli_query($con,$stmt);

//for debugging purpose
if(mysqli_query($con,$stmt)){
	echo "Yhh query";
}else{
	echo "Shit";
}

echo $title. "Wf*#**ck" . $date . $filename  ;


mysqli_close($con);

?>