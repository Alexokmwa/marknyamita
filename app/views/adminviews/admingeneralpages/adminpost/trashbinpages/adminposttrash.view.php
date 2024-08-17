<?php
/**
 * header nav file combined inclusion.
 */

use app\models\Adminsession;

adminrenderpageHeader();
?>

<!-- **************** MAIN CONTENT START **************** -->
<main>

	<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
		<h6 class="m-0">trash post<span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 new</span></h6>
		<p class="text-danger">Actions</p>

	</div>


	<div class="card-body p-0">
		<ul class="list-group list-unstyled list-group-flush">
			<!-- Notif item -->
			<?php if (is_array($data['row']) && count($data['row'])): ?>
			<?php
    $deletedPostFound = false; // Initialize a flag to track if a deleted post is found

			    foreach ($data['row'] as $row):
			        if ($row->poststatus == 'deleted'):
			            $deletedPostFound = true; // Set the flag to true since a deleted post is found
			            ?>
			<span class="text-danger pt-3" style="text-align:center;">deletion of a post will lead to deletion of
				all
				realated comments and likes be sure you need to delete it</span>
			<?php
			            $datetime = $row->createdAt; // Fetching the datetime from the row object
			            $timeAgo = time_elapsed_string($datetime);
			            ?>
			<li>
				<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
					<div class="me-3">
						<div class="icon-lg shadow bg-body rounded-circle">⛰️
						</div>
					</div>
					<div>
						<h6 class="mb-1">
							<?= htmlspecialchars($row->postname) ?>
						</h6>
						<span class="small"><i class="bi bi-clock"></i>
							<?= htmlspecialchars($timeAgo) ?></span>
					</div>
					<?php
			                    $ses = new Adminsession();
			            $sesidadmin = $ses->adminuser("adminID");
			            ?>
					<?php if($sesidadmin === $row->adminID): ?>
					<form id="restoreForm" method="post" class="ms-auto">
						<button class="btn btn-primary restorepost" type="submit" name="restorepost"
							value="<?= htmlspecialchars($row->postID) ?>">Restore</button>
					</form>

					<form id="postFormdelete" method="post" class="ms-auto">
						<button class="btn btn-danger deleteposttrash" type="submit" name="deleteposttrash"
							value="<?= htmlspecialchars($row->postID) ?>">Delete
							post</button>
					</form>
					<?php endif ?>
				</a>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>

			<!-- Display "no deleted post items in trash" message if no deleted post was found -->
			<?php if (!$deletedPostFound): ?>
			<p class="text-danger text-center">No deleted post items in trash</p>
			<?php endif; ?>
			<?php else: ?>
			<!-- Display "no deleted post items in trash" message if no posts exist at all -->
			<p class="text-danger text-center">No post items found</p>
			<?php endif; ?>




		</ul>
	</div>
</main>
<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>
<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>