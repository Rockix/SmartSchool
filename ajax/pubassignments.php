<?php 

 $title = isset($_POST['title']) ? $_POST['title'] : null;
 $date = date("Y-m-d H:i:s");
 //$filename = $_FILES['fileselect']['name'];
// $pname = isset($_POST['parent']) ? $_POST['parent'] : null;


$con = mysqli_connect('localhost','root','','smartschool');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax");

	// prepare and bind
$stmt = $con->prepare("INSERT INTO assignment (title, published_date) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $date);
$stmt->execute();

echo "Test Yh";
mysqli_close($con);

//$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

// if ($fn) {

// 	// AJAX call
// 	file_put_contents(
// 		'uploads/' . $fn,
// 		file_get_contents('php://input')
// 	);
// 	echo "$fn uploaded";
// 	exit();

// }
// else {

//     if(isset($_POST['btnPublish'])&& $_FILES['fileselect']['size']>0){

//     	// form submit
// 	$filename = $_FILES['fileselect']['name'];
// 	$title = $_POST['title'];
// 	$date = date("Y-m-d H:i:s");
// 	$file=$_FILES['fileselect'];

// 	// foreach ($files['error'] as $id => $err) {
// 	// 	if ($err == UPLOAD_ERR_OK) {
// 	// 		$fn = $files['name'][$id];
// 	// 		move_uploaded_file(
// 	// 			$files['tmp_name'][$id],
// 	// 			'uploads/' . $fn
// 	// 		);
// 	// 		echo "<p>File $fn uploaded.</p>";
// 	// 		//header('Location: home.html');


// 	// 	}
// 	// }

// 	// prepare and bind
// $stmt = $con->prepare("INSERT INTO assignment (title, published_file, published_date) VALUES (?, ?, ?)");
// $stmt->bind_param("sbs", $title, $file, $date);
// $stmt->execute();

// echo "Test Yh";
// echo $filename.$title;

// $result = mysqli_query($con,$stmt);

// //for debugging purpose
// if($result){
// 	echo "Yhhhhhhh";
// }else{
// 	echo "Shitttto";
// }


// mysqli_close($con);

//     }



//prepare and bind parameters

// $sql=$con->prepare("INSERT INTO student (firstname, lastname, parentname) VALUES (?, ?, ?)"); 
// $sql->bind_param("sss", $fname, $lname, $pname);
// $sql->execute();

// // $result = mysqli_query($con,$sql);

// // //for debugging purpose
// // if($result){
// // 	echo "Yhhhhhhh";
// // }else{
// // 	echo "Shitttto";
// // }
// echo "Yhh";

// mysqli_close($con);

?>