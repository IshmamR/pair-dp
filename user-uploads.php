<?php
	include('path.php');
	include(ROOT_PATH.'/app/db.php');
	include(ROOT_PATH.'/app/download-u.php');
	$path = 'assets/imgs';
	$userFiles = glob($path."/{*.jpg,*.jpeg,*.png,*.PNG}",GLOB_BRACE|GLOB_NOSORT);
	// print_r($userFiles);
	// die();
?>
	
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>

	<?php include(ROOT_PATH.'/assets/includes/meta-links.php'); ?>

</head>
<body class="bg-purple-800">

	<?php include(ROOT_PATH.'/assets/includes/navbar.php'); ?>

	<h1 class="text-4xl md:text-5xl text-center text-white px-4">
		Pair DP's for everyone <span class="text-red-500"><!-- &hearts; --></span>
	</h1>

	<!-- Main -->
	<div class="main w-11/12 md:5/6 container bg-purple-400 mx-auto my-8 flex flex-row flex-wrap justify-center items-center">
		<?php foreach ($userFiles as $userFile): ?>
			<img class="to-show my-4" src="<?php echo($userFile);?>" alt="...">
		<?php endforeach ?>
	</div>

	<!-- MODAL -->
	<div class="modal-bg">
		<div class="modal-overlay"></div>
		
		<div class="modal mx-auto bg-purple-200 text-white text-center">
			<img class="modal-img shadow-lg hover:shadow-sm mx-auto mt-4 md:mt-8 mb-4" src="">
			<form action="" method="post">
				<input id="img-src" type="hidden" name="img-src">
				<button class="down-btn bg-green-400 hover:text-purple-900 shadow-md hover:shadow-sm p-3 my-4" type="submit" name="modal">
					Download image
				</button>
			</form>
		</div>
	</div>
	
	<?php include(ROOT_PATH.'/assets/includes/footer.php'); ?>

	<script src="assets/js/main.js" defer></script>
</body>
</html>