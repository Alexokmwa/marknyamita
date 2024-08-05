<?php
/**
 * header nav file combined inclusion.
 */
renderpageHeader();
?>

<main>
	<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
		<?php $num = getnotificationspublic() ?>
		<?php if ($num): ?>
		<h6 class="m-0">Notifications <span
				class="badge bg-danger bg-opacity-10 text-danger ms-2"><?= $num ?>
				new</span></h6>
		<?php endif ?>
	</div>
	<div class="card-body p-3">
		<?php if (!empty($rowspublic)): ?>
		<ul class="list-group list-unstyled list-group-flush">
			<?php foreach ($rowspublic as $row): ?>
			<?php
                        $color = $row->seen ? "white" : "rgb(185, 232, 185)";
			    $text = $row->seen ? "read" : "new notification";
			    $colortext = $row->seen ? "red" : "blue";
			    $datetime = $row->createdAt;
			    $timeAgo = time_elapsed_string($datetime);
			    ?>
			<li class="d-flex align-items-center text-decoration-none pt-2 mb-3"
				style="background-color: <?= $color ?>">
				<a href="<?= ROOT ?>Blogview/<?= $row->Itemid ?>?seen=1&notif=<?= $row->id ?>"
					class="d-flex align-items-center text-decoration-none w-100" style="background-color:inherit;">
					<div class="me-3">
						<div class="avatar avatar-sm">
							<img class="avatar-img rounded-circle"
								src="<?= isset($row->user_row) && $row->user_row ? get_imageadmin($row->user_row->adminimage) : '' ?>"
								alt="avatar">
						</div>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-1 text-center">
							<?= isset($row->user_row) && $row->user_row ? htmlspecialchars($row->user_row->username) : 'Unknown User' ?>
							<?php
			                        switch ($row->type) {
			                            case 'blogpost':
			                                echo 'made a post<br/><i>' . esc($row->item_rowblog->postname) . '</i>';
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
							style="color: <?= $colortext ?>"><?= $text ?></span>
					</div>
					<div class="d-flex align-items-center ms-3">
						<div class="me-3">
							<div class="avatar avatar-sm">
								<?php $postpic = ROOTADMIN . esc($row->item_rowblog->imageurl); ?>
								<img class="avatar-img rounded-circle"
									src="<?= $postpic ?>"
									alt="avatar">
							</div>
						</div>
					</div>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
</main>


<?php
/**
 * html footer function
 */
renderHtmlFooter();
rendersmfooter();
?>