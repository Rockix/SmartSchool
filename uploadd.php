<?php
/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
include 'db.php';

$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

if ($fn) {

	// AJAX call
	file_put_contents(
		'uploads/' . $fn,
		file_get_contents('php://input')
	);
	echo "$fn uploaded";
	exit();

}
else {

    if(isset($_POST['btnPublish'])&& $_FILES['fileselect']['size']>0){

    	// form submit
	$filename = $_FILES['fileselect']['name'];
	$title = $_POST['title'];
	$date = date("Y/m/d");
	$file=$_FILES['fileselect'];

	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = $files['name'][$id];
			move_uploaded_file(
				$files['tmp_name'][$id],
				'uploads/' . $fn
			);
			echo "<p>File $fn uploaded.</p>";
			header('Location: home.html');


		}
	}

	// prepare and bind
$stmt = $conn->prepare("INSERT INTO assignment (title, published_file, published_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sss", $title, $file, $published_date);

// set parameters and execute
// $title = "John";
// $lastname = "Doe";
// $email = "john@example.com";
$stmt->execute();

// $firstname = "Mary";
// $lastname = "Moe";
// $email = "mary@example.com";
// $stmt->execute();

// $firstname = "Julie";
// $lastname = "Dooley";
// $email = "julie@example.com";
// $stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();

    }

	

}