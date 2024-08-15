<?php
/**
 * header nav file combined inclusion.
 */
renderpageHeader();

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
				<?php
$link = '';
switch ($row->type) {
    case 'blogpost':
        $link = ROOT . "Blogview/" . $row->Itemid . "?seen=1&notif=" . $row->id;
        break;
    case 'eventpost':
        $link = ROOT . "Sigleevent/" . $row->Itemid . "?seen=1&notif=" . $row->id;
        break;
    default:
        // handle other cases if necessary
        break;
}
?>

<a href="<?= $link ?>" class="d-flex align-items-center text-decoration-none w-100" style="background-color:inherit;">
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
                    case 'eventpost':
                        echo 'created an event<br/><i>' . esc($row->item_rowblog->postname ?? $row->item_rowevent->eventname) . '</i>';
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
                <?php $postpic = ROOTADMIN . esc($row->item_rowblog->imageurl ?? $row->item_rowevent->eventimage); ?>
                <img class="avatar-img rounded-circle"
                    src="<?= $postpic ?>"
                    alt="avatar">
            </div>
        </div>
    </div>
</a>

				<?php if($row->seen == 1):?>
				<form id="deletenotif" method="post" >
				<input type="hidden" name="form_type" value="delete_notification">
				<input type="hidden" name="id" value="<?= $row->id ?>">
				<button type="submit" class="btn btn-danger" >clear</button>
				</form>

				
<?php endif?>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
			<p class="text-danger text-center">no notification</p>
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