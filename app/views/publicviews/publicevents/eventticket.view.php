<?php
/**
 * header nav file combined inclusion.
 */

use app\models\Session;

renderpageHeader();
?>
<?php
$ses = new Session();
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
</header>




<?php
/**
 * html footer function
 */
// rendermainFooter();

renderHtmlFooter();
rendersmfooter();
?>