<?php
	$title  = "Login";
	function get_content() {
?>

<div class="grid grid-cols-12">
	<div class="col-start-4 col-span-6">
		<form class="mt-6" action="/routes/login.php" method="POST">
			<div class="mb-4">
				<label class="block font-bold mb-2">Username</label>
				<input type="text" name="username" class="shadow border rounded w-full py-2 px-3">
			</div>
			<div class="mb-4">
				<label class="block font-bold mb-2">password</label>
				<input type="text" name="password" class="shadow border rounded w-full py-2 px-3">
			</div>
			<button class="bg-teal-700 hover:bg-teal-600 text-white py-2 px-4 rounded border-b-4 border-teal-900">Submit</button>
		</form>
	</div>
</div>

<?php
	}
	require('../layout.php');
?>