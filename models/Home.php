<?php
	require_once('./models/Post.php');
	require_once('./models/Comments.php');
	$title = "Home";
	function get_content(){
?>
<?php if(isset($_SESSION['user']) && isset($_COOKIE['username'])): ?>
	<div class="grid grid-cols-12">
		<div class="col-start-4 col-span-6">
			<form class="mt-6" action="/routes/add_post.php" method="POST" enctype="multipart/form-data">
				<div class="mb-4">
					<label class="block font-blod mb-2">Title</label>
					<input type="text" name="title" class="shadow border rounded w-full py-2">
				</div>
				<div class="mb-4">
					<label class="block font-blod mb-2">Description</label>
					<input type="text" name="description" class="shadow border rounded w-full">
				</div>
				<div class="mb-4">
					<label class="block font-blod mb-2">Image</label>
					<input type="text" name="image" class="shadow border rounded w-full py-2">
				</div>
				<button class="bg-teal-700 hover:bg-teal-600 text-white py-2 px-4 rounded border-b-4 border-teal-900">Submit</button>
			</form>
		</div>
	</div>
<?php endif; ?>
<div class="grid grid-cols-12">
	<?php foreach(Post:all() as $post): ?>
		<div class="col-start-4 col-span-6 mt-5 rounded py-5 shadow mb-5">
			<div class="flex">
				<div class="col-start-4 col-span-6">
					<img class="h-48" style="width: 20rem" src="<?php echo $post->image ?>">
				</div>
				<div class="p-5">
					<div>
						<div class="font-blod text-xl mb-2 text-gray-900"><?php echo $post->title?>
							<p class="text-gray-700"><?php echo $post->description ?></p>
						</div>
						<div class="flex items-center mt-4">
							<img alt="Progile Picture" class="mr-4 rounded-full w-16 h-16 border" src="<?php echo $post->author_image?>">
							<div class="text-sm">
								<p class="text-gray-900"><?php echo $post->author ?></p>
								<p class="text-gray-900"><?php echo $post->dataPosted ?></p>
							</div>
						</div>
						<?php if(isset($_SESSION['user'])): ?>
						<form class="mt-6" action="/routes/add_comments/php" method="POST">
							<div class="mb-4">
								<label class="block font-blod mb-2">Comment</label>
								<input type="text" name="message" class="shadow border rounded w-full py-2 px-3">
								<input type="text" name="postId" value="<?php echo $post->id; ?>"hidden>
								<input type="text" name="username" value="<?php echo $_SESSION['user']->username?>" hidden>
							</div>
							<button class="bg-teal-700 hover:bg-teal-600 text-white py-2 px-4 rounded border-b-4 border-teal-900">Submit</button>
						</form>
					<?php endif; ?>
					</div>
				</div>
				<?php foreach(Comment::all() as $comments): ?>
					<?php if($comments->postId == $post->id): ?>
						<div class="px-5">
							<h5><?php echo $comments->username;?></h5>
							<p><?php echo $comments->comment;?></p>
							<?php if($_SESSION['user']->username == $comments->username): ?>
								<a href="/routes/delete_comment.php?commentId=<?php echo $comments->id?>">Delete</a>
							<?php endif?>
						</div>
					<?php endif;?>
				<?php endforeach;?>
			</div>
		</div>
	<?php endforeach;?>
</div>
<?php }
	require 'views/layout.php';
?>