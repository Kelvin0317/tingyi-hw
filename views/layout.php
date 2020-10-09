<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<title>My Articles | <?php echo $title ?></title>
	 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="/../css/style.css">
</head>
<body>
	?php require_once 'partials/nav.php';?>

	<main>

		<?php get_content(); ?>
	</main>

	<?php require_once 'partials/footer.php';?>

	<script type="text/javascript">
		let btn = document.getElementById('btn-menu')
		let menu = document.getElementById('menu')
		btn.addEventListener('click',() => {
			menu.classList.toggle("hidden");
		})
	</script>
</body>
</html>