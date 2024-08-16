<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();


use app\models\Adminsession;

$ses = new Adminsession();
$successMessage = $ses->pop('comment_success');


?>
<?php if ($successMessage): ?>
<div class="position-fixed  top-0 end-0 p-3" style="z-index: 1050;">
	<div id="toastSuccess" class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true"
		data-bs-autohide="true" data-bs-delay="5000">
		<div class="toast-header bg-success">
			<strong class="me-auto">Success</strong>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
		<div class="toast-body">
			<?= $successMessage ?>
		</div>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', (event) => {
		var toastEl = document.getElementById('toastSuccess');
		var toast = new bootstrap.Toast(toastEl);
		toast.show();
	});
</script>
<?php endif; ?>
<main class="mysmbottomspace">
	<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
		<?php $num = getnotifications();
$commentnum = getcommentnotifications()?>
		<?php if($num || $commentnum):?>
		<?php  $newnum = $num + $commentnum?>
		<h6 class="m-0">Notifications <span
				class="badge bg-danger bg-opacity-10 text-danger ms-2"><?=$newnum ?>
				new</span></h6>
		<?php endif?>
		<!-- <a class="small" href="#">Clear all</a> -->
	</div>
	<?php if (!empty($rows)): ?>
	<?php foreach ($rows as $row): ?>
	<div class="card-body p-3">
		<ul class="list-group list-unstyled list-group-flush">
			<!-- Notif item -->
			<?php
                    $color = $row->seen ? "white" : "rgb(185, 232, 185)";
	    $text = $row->seen ? "read" : "new notification";
	    $colortext = $row->seen ? "red" : "blue";
	    $datetime = $row->createdAt; // Fetching the datetime from the row object
	    $timeAgo = time_elapsed_string($datetime);
	    ?>
			<li class="d-flex align-items-center text-decoration-none pt-2"
				style="background-color:<?= $color ?>">
				<a href="<?= ROOTADMIN ?>Adminviewblog/<?= $row->Itemid ?>?seen=1&notif=<?= $row->id?>"
					class="d-flex align-items-center text-decoration-none w-100" style="background-color:inherit;">
					<div class="me-3">
						<div class="avatar avatar-sm">
							<img class="avatar-img rounded-circle"
								src="<?= get_image($row->user_row->image) ?>"
								alt="avatar">
						</div>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-1 text-center">
							<?= $row->user_row->username ?>
							<?php
	                    switch ($row->type) {
	                        case 'like':
	                            echo 'liked your post<br/><i>'." ".esc($row->item_row->postname)."</i>";
	                            break;
	                        case 'comment':
	                            echo 'commented  on your post<br/><i>'." ".esc($row->item_row->postname)."</i>";
	                            break;
	                        default:
	                            // handle other cases if necessary
	                            break;
	                    }
	    ?>
						</h6>

						<span class="small text-center"><i class="bi bi-clock"></i>
							<?= $timeAgo ?></span>
						<span class="small text-center ms-3"
							style="color:<?= $colortext ?>"><?= $text?></span>

					</div>
					<div class="d-flex align-items-center ms-3">
						<div class="me-3">

							<div class="avatar avatar-sm">
								<img class="avatar-img rounded-circle"
									src="<?= get_imageadmin($row->item_row->imageurl) ?>"
									alt="avatar">
							</div>
						</div>
					</div>
				</a>
				<?php if($row->seen == 1):?>
				<form id="deletenotif" method="post">
					<input type="hidden" name="form_type" value="delete_notification">
					<input type="hidden" name="id"
						value="<?= $row->id ?>">
					<button type="submit" class="btn btn-danger"
						style="margin-left: 40px;margin-right:40px">clear</button>
				</form>


				<?php endif?>

			</li>
		</ul>
	</div>
	<?php endforeach; ?>

	<?php endif ?>
	<?php if (!empty($rowss)): ?>
	<?php foreach ($rowss as $row): ?>
	<div class="card-body p-3">
		<ul class="list-group list-unstyled list-group-flush">
			<!-- Notif item -->
			<?php
	                $color = $row->seen ? "white" : "rgb(185, 232, 185)";
	    $text = $row->seen ? "read" : "new notification";
	    $colortext = $row->seen ? "red" : "blue";
	    $datetime = $row->createdAt; // Fetching the datetime from the row object
	    $timeAgo = time_elapsed_string($datetime);
	    ?>
			<li class="d-flex align-items-center text-decoration-none pt-2"
				style="background-color:<?= $color ?>">
				<a href="<?= ROOTADMIN ?>Adminviewblog/<?= $row->Itemid ?>?seen=1&notifcomment=<?= $row->id?>"
					class="d-flex align-items-center text-decoration-none w-100" style="background-color:inherit;">
					<div class="me-3">
						<div class="avatar avatar-sm">
							<img class="avatar-img rounded-circle"
								src="<?= get_image($row->user_row->image) ?>"
								alt="avatar">
						</div>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-1 text-center">
							<?= $row->user_row->username ?>
							<?php
	                    switch ($row->type) {
	                        case 'like':
	                            echo 'liked your post<br/><i>'." ".esc($row->item_row->postname)."</i>";
	                            break;
	                        case 'comment':
	                            echo 'commented  on your post<br/><i>'." ".esc($row->item_row->postname)."</i>";
	                            break;
	                        default:
	                            // handle other cases if necessary
	                            break;
	                    }
	    ?>
						</h6>

						<span class="small text-center"><i class="bi bi-clock"></i>
							<?= $timeAgo ?></span>
						<span class="small text-center ms-3"
							style="color:<?= $colortext ?>"><?= $text?></span>

					</div>
					<div class="d-flex align-items-center ms-3">
						<div class="me-3">

							<div class="avatar avatar-sm">
								<img class="avatar-img rounded-circle"
									src="<?= get_imageadmin($row->item_row->imageurl) ?>"
									alt="avatar">
							</div>
						</div>
					</div>
				</a>
				<?php if($row->seen == 1):?>
				<form id="deletenotif" method="post">
					<input type="hidden" name="form_type" value="commentdelete_notification">
					<input type="hidden" name="id"
						value="<?= $row->id ?>">
					<button type="submit" class="btn btn-danger"
						style="margin-left: 40px;margin-right:40px">clear</button>
				</form>


				<?php endif?>

			</li>
		</ul>
	</div>
	<?php endforeach; ?>
	
	<?php endif; ?>
	<?php if(empty($rows)&& empty($rowss)): ?>
		
	<p class="text-danger text-center">no notification</p>
	<?php endif; ?>
</main>


<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>