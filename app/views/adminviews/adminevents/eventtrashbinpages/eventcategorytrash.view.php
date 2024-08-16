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
		<h6 class="m-0">trash categories<span class="badge bg-danger bg-opacity-10 text-danger ms-2">2 new</span></h6>
		<p class="text-danger">Actions</p>

	</div>
	<?php if(!empty($row)):?>
	<span class="text-danger pt-3"style="text-allign:center;">deletion of a category will lead to deletion of all realated posts be sure you need to delete or the category has no posts</span>
	<?php endif?>
	<div class="card-body p-0">
		<ul class="list-group list-unstyled list-group-flush">
			<!-- Notif item -->
			<?php if (is_array($data['row']) && count($data['row'])): ?>
			<?php foreach ($data['row'] as $row): ?>
			<?php if ($row->categorystatus == 'deleted'): ?>
			<?php
                    $datetime = $row->CreatedAt; // Fetching the datetime from the row object
			    $timeAgo = time_elapsed_string($datetime);
			    ?>
			<li>
				<a href="#" class="list-group-item-action border-0 border-bottom d-flex p-3">
					<div class="me-3">
						<div class="icon-lg shadow bg-body rounded-circle">⛰️
						</div>
					</div>
					<div>
						<h6 class="mb-1"><?=$row->categoryname?></h6>
						<span class="small"> <i
								class="bi bi-clock"></i><?=$timeAgo?></span>
					</div>
					<?php
        $ses = new Adminsession();
				    $sesidadmin = $ses->adminuser("adminID");
				    ;
				    ?>
								<?php if($sesidadmin === $row->admid):?>
					<form id="restoreForm" method="post" class="ms-auto">
						<button class="btn btn-primary restoreeventcategory" type="submit" name="restoreeventcategory"
							value="<?= $row->categoryID ?>">Restore</button>
					</form>

					<form id="deleteForm" method="post" class="ms-auto">
						<button class="btn btn-round btn-danger deleteeventcategorytrash" type="submit"
							name="deleteeventcategorytrash"
							value="<?= $row->categoryID ?>">
							<i class="bi bi-trash"></i>
						</button>
					</form>

					<?php endif?>
				</a>


			</li>
			<?php endif; ?>
			<?php endforeach; ?>

			<?php else: ?>
			<p class="text-danger text-center ">no deleted event categories items in trash</p>
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