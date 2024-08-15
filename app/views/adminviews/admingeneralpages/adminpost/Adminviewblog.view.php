<?php
/**
 * header nav file combined inclusion.
 */
use app\models\Adminsession;

$ses = new Adminsession();
$successMessage = $ses->pop('comment_success');

adminrenderpageHeader();

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
<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Inner intro START -->
	<?php if (isset($rowpost) && is_object($rowpost)): ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-9 mx-auto pt-md-5">
					<a href="#" class="badge text-bg-danger mb-2"><i
							class="fas fa-circle me-2 small fw-bold"></i><?=$rowpost->category?></a>
					<h1 class="display-4"><?=$rowpost->postname?>
					</h1>
					<p class="lead"><?=$rowpost->shortdescription?>
					</p>
					<!-- Info -->
					<ul class="nav nav-divider align-items-center">
						<li class="nav-item">
							<?php if (is_array($data['rowcreator']) && count($data['rowcreator'])): ?>
							<?php foreach ($data['rowcreator'] as $rowcreator): ?>
							<?php if ($rowpost->adminID === $rowcreator->adminID): ?>
							<div class="nav-link">
								by <a href="#"
									class="text-reset btn-link"><?= esc($rowcreator->firstname . " " . $rowcreator->lastname) ?></a>
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
							<?php endif; ?>
						</li>
						<li class="nav-item">
							<?= date('M d, Y', strtotime($rowpost->createdAt)); ?>
						</li>
						<li class="nav-item">5 min read</li>
					</ul>
					<?php
                    $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
	    // Check if the image URL is correctly formatted
	    // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
	    ?>
					<img class="rounded mt-5 img-fluid"
						src="<?=$imageSrc?>" alt="Image"
						style="object-fit: contain;width: 100%; height: auto;">
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Inner intro END -->

	<!-- =======================
Main START -->
	<section class="pt-0">
		<div class="container position-relative">
			<div class="row">
				<!-- Main Content START -->
				<div class="col-lg-9 mx-auto">
					<p><span
							class="dropcap bg-primary bg-opacity-10 text-primary px-2">R</span><?=$rowpost->postbody?>

					</p>

					<!-- Divider -->
					<div class="text-center h5 mb-4">. . .</div>



					<!-- Author info START -->

					<!-- Author info END -->

					<!-- Next prev post START -->
					<div class="row g-0 mt-5 mx-0 border-top border-bottom">
						<div class="col-sm-6 py-3 py-md-4">
							<div class="d-flex align-items-center position-relative">
								<!-- Icon -->
								<div class="bg-primary py-1">
									<i class="bi bi-chevron-compact-left fs-3 text-white px-1 rtl-flip"></i>
								</div>
								<!-- Title -->
								<div class="ms-3">
									<h5 class="m-0"> <a href="#" class="stretched-link btn-link text-reset">Around the
											web: 20 fabulous infographics about business</a></h5>
								</div>
							</div>
						</div>
						<div class="col-sm-6 py-3 py-md-4 text-sm-end">
							<div class="d-flex align-items-center position-relative">
								<!-- Title -->
								<div class="me-3">
									<h5 class="m-0"> <a href="#" class="stretched-link btn-link text-reset">12 worst
											types of business accounts you follow on Twitter</a></h5>
								</div>
								<!-- Icon -->
								<div class="bg-primary py-1">
									<i class="bi bi-chevron-compact-right fs-3 text-white px-1 rtl-flip"></i>
								</div>
							</div>
						</div>
					</div>
					<!-- Next prev post START -->

				</div>
				<!-- Main Content END -->
			</div>
		</div>
	</section>
	<!-- =======================
Main END -->

	<!-- =======================
Tag and share END -->
	<section class="pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 mx-auto">
					<div class="text-center">
						<!-- Share -->
						<div class="list-group-inline list-unstyled">
							<h6 class="mt-2 me-4 d-inline-block"><i class="fas fa-share-alt me-2"></i>Share on:</h6>
							<ul class="list-inline list-unstyled d-inline-block">
								<li class="list-inline-item"><a href="#" class="me-3 text-body">Facebook</a></li>
								<li class="list-inline-item"><a href="#" class="me-3 text-body">Twitter</a></li>

							</ul>
						</div>
						<!-- Tags -->
						<ul class="list-inline text-primary-hover mt-0 mt-lg-3">
							<li class="list-inline-item">
								<a class="text-body" href="#">#agency</a>
							</li>

						</ul>
					</div>
				</div> <!-- row END -->
			</div>
		</div>
	</section>
	<!-- =======================
Tag and share END -->
	<?php endif; ?>

</main>
<!-- **************** MAIN CONTENT END **************** -->



<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>