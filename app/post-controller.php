<?php
	include (ROOT_PATH . "/app/db.php");
	session_start();

	$table = 'pairdp';
	$_SESSION['msg'] = "";

	$image1 = "";
	$image2 = "";
	$email = "";

	$files_to_go = ROOT_PATH . '/assets/imgs/';

	$regex = "/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";

	// UPLOAD
	if(isset($_POST['upload-pair'])) {

		if (!preg_match($regex, $_POST['email'])) {
			$image1 = $_FILES['image1']['name'];
			$image2 = $_FILES['image2']['name'];
			$email = $_POST['email'];
			$_SESSION['msg'] = 'Enter a valid email';

			header('Location: upload.php');
			// exit();
		}

		// $extension = array_pop(explode(".", $_FILES["image"]["name"])); // return file extension

		if (!empty($_FILES['image1']['name']) && !empty($_FILES['image1']['name'])) {
			
			if ($_FILES['image1']['size'] > 512*1024 || $_FILES['image2']['size'] > 512*1024) {
		 		$_SESSION['msg'] = "file too big";
				// header('Location: upload.php');
				// exit();
			} elseif($_FILES['image1']['size'] < 512*1024 && $_FILES['image2']['size'] < 512*1024) {
			// if (in_array($extension, array("jpg", "jpeg", "png", "PNG"))) {
				
				$image_name1 = time() . "_" . $_FILES['image1']['name'];
				$destination1 = $files_to_go . $image_name1;
				$result1 = move_uploaded_file($_FILES['image1']['tmp_name'], $destination1);

				$image_name2 = time() . "_" . $_FILES['image2']['name'];
				$destination2 = $files_to_go . $image_name2;
				$result2 = move_uploaded_file($_FILES['image2']['tmp_name'], $destination2);

				if ($result1 && $result2) {
					$_POST['image1'] = $image_name1;
					$_POST['image2'] = $image_name2;
				} else {
					$_SESSION['msg'] = "There was a problem uploading your image.";
					header('Location: upload.php');
				}

				unset($_POST['upload-pair']);

				if (!empty($_POST['email'])) {

					$post_id = create($table, $_POST);

					header("Location: " . BASE_URL . "user-uploads.php");
				}
			}
		}
	}


	// SQL EXECUTION
	function executeQuery($sql, $data) {
		GLOBAL $connect;

		$stnt = $connect->prepare($sql); // statement to...
		$values = array_values($data);
		$types = str_repeat('s', count($values)); // creates a string of 's' as same as the number of indexes in $values array
		$stnt->bind_param($types, ...$values); // DO NOT mess with this line again ^^ // come back when you understand this fully
		$stnt->execute();

		return $stnt;
	}

	// CREATE FUNCTION
	function create($table, $data) {
		GLOBAL $connect;

		$sql = "INSERT INTO $table SET";

		$i = 0;
		foreach ($data as $key => $value) {
			if ($i===0) {
				$sql = $sql . " $key=?";
			} else {
				$sql = $sql . ", $key=?";
			}
			$i++;
		}
		$stnt = executeQuery($sql, $data);
		$id = $stnt->insert_id;
		// defined a $data object to initiate at the top
		return $id;
	}
?>