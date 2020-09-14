<?php
	include("path.php");
	include(ROOT_PATH . "/app/post-controller.php");
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
	<div class="w-11/12 md:5/6 container bg-purple-400 mx-auto my-8">
		<h2 class="text-2xl md:text-4xl text-center text-gray-100">Upload a pair</h2>
		<div class=" w-full bg-red-100 text-center text-black"><?php echo($_SESSION['msg']); ?></div>
		<div class="block w-full py-4">
			<form class="w-4/5 md:w-1/2 bg-white shadow-md px-8 pt-6 pb-8 mx-auto my-4" action="upload.php" method="post" enctype="multipart/form-data">
					
				<label><b>Choose image 1(right):</b></label>
				<input class="shadow appearance-none w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none" type="file" name="image1" required accept=".jpg, .jpeg, .png, .PNG">
				<small class="text-blue-500">*MAX FILE SIZE = 512kb</small><br>
			
				<label><b>Choose image 2(left):</b></label>
				<input class="shadow appearance-none w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none" type="file" name="image2" requiblue accept=".jpg, .jpeg, .png, .PNG">
				<small class="text-blue-500">*MAX FILE SIZE = 512kb</small><br>

				<label><b>Your e-mail:</b></label>
				<input class="shadow appearance-none w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none border" type="email" name="email" required >

				<button class="bg-purple-500 hover:text-white p-3 mt-3" name="upload-pair" type="submit">Upload</button>
			</form>
		</div>
	</div>
	<!-- gmail info -->
	<div class="w-full bg-indigo-900 text-gray-100 text-center">
		Help everyone with more pair DP's. ^^ <!-- &#x1F60A; --><br>
		You can also send your DP's at <br>
		&lt;<a href="mailto:promethewz@gmail.com">promethewz@gmail.com</a>&gt;
	</div>
	<?php include(ROOT_PATH.'/assets/includes/footer.php'); ?>
</body>
</html>