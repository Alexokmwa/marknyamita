<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();
?>

<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
	<?php $num = getnotifications()?>
	<?php if($num):?>
	<h6 class="m-0">Notifications <span
			class="badge bg-danger bg-opacity-10 text-danger ms-2"><?=$num?>
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
		</li>
	</ul>
</div>
<?php endforeach; ?>
<?php endif; ?>


<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>