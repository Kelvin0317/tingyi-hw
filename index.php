<?php
	require_once('./models/Post.php');
	$title = "Home";
	function get_content() {
?>

<?php if(isset($_SESSION['user'])): ?>
<div class="grid grid-cols-12">
	<div class="col-start-4 col-span-6">
		<form class="mt-6" action="/routes/add_post.php" method="POST">
			<div class="mb-4">
				<label class="block font-bold mb-2">Title</label>
				<input type="text" name="title" class="shadow border rounded w-full py-2 px-3">
			</div>
			<div class="mb-4">
				<label class="block font-bold mb-2">Description</label>
				<input type="text" name="description" class="shadow border rounded w-full py-2 px-3">
			</div>
			<button class="bg-teal-700 hover:bg-teal-600 text-white py-2 px-4 rounded border-b-4 border-teal-900">Submit</button>
		</form>
	</div>
</div>
<?php endif; ?>
<div class="container">
	<?php foreach( post::all() as $post) : ?>
		<div class="rounded shadow mb-5 flex">
			<img src="" class="">
			<div>
				<div class="mb-8">
					<div class="font-bold text-xl mb-2 text-gray-900"><?php echo $post->title ?>
						<p class="text-gray-700"><?php echo $post->description ?></p>
					</div>
					<div class="flex items-center">
						<img src="" alt="Profile Picture" class="mr-4 rounded-full w-10 h-10">
						<div class="text-sm">
							<p class="text-gray-900"><?php echo $post->author?></p>
							<p class="text-gray-900"><?php echo $post->datePosted?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>


<?php }
	require 'views/layout.php';
?>