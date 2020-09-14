<?php
	includE('path.php');
	include(ROOT_PATH.'/app/db.php');
	include(ROOT_PATH.'/app/download.php');
	$path = ROOT_PATH.'/dps';
	$files = glob($path."/{*.jpg,*.jpeg,*.png}",GLOB_BRACE|GLOB_NOSORT);
?>
	
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
	
	<?php include(ROOT_PATH.'/assets/includes/meta-links.php'); ?>

</head>
<body class="bg-purple-800">
	
	<?php include(ROOT_PATH.'/assets/includes/navbar.php'); ?>

	<h1 class="text-4xl md:text-5xl text-center text-white px-4">
		Pair DP's for everyone <span class="text-red-500">&hearts;</span>
	</h1>

	<!-- Main -->
	<div class="w-11/12 md:5/6 container bg-purple-400 mx-auto my-8 flex flex-row flex-wrap justify-center items-center">
		<?php for($i = count($files); $i > 0 ; $i--) { ?>
			<?php if ($i < 10): ?>
				<img class="to-show my-4" src="<?php echo('dps/00'.$i.'.jpeg');?>" alt="...">
			<?php else: ?>
				<img class="to-show my-4" src="<?php echo('dps/0'.$i.'.jpeg');?>" alt="...">
			<?php endif ?>
		<?php } ?>
	</div>

	<!-- MODAL -->
	<div class="modal-bg">
		<div class="modal-overlay _active"></div>
		
		<div class="modal _active mx-auto bg-purple-200 text-white text-center">
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