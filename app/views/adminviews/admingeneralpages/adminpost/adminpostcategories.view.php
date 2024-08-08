<?php
/**
 * header nav file combined inclusion.
 */

use app\models\Adminsession;

adminrenderpageHeader();
?>

<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main contain START -->
	<section class="py-4">
		<div class="container">
			<div class="row pb-4">
				<div class="col-12">

					<!-- Title -->
					<div class="d-sm-flex justify-content-sm-between align-items-center">
						<h1 class="mb-2 mb-sm-0 h2">Categories <span
								class="badge bg-primary bg-opacity-10 text-primary"><?=$countcategorisnumber?></span></h1>
								<?php if (is_array($data['row']) && count($data['row'])): ?>
    <?php 
    $buttonDisplayed = false; // Flag to track button display
    foreach ($data['row'] as $row): 
        if ($row->categorystatus == 'deleted' && !$buttonDisplayed): 
            $buttonDisplayed = true; // Set flag to true once button is displayed
    ?>
	<?php
        $ses = new Adminsession();
				    $sesidadmin = $ses->adminuser("adminID");
				    ;
				    ?>
								<?php if($sesidadmin === $row->admid):?>
            <a href="<?= ROOTADMIN ?>Categorytrash">
                <button class="bi-trash btn btn-danger">trash bin</button>
            </a>
        <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

						<button type="button" class="btn btn-sm btn-primary mb-0" data-bs-toggle="modal"
							data-bs-target="#exampleModal"><i class="fas fa-plus me-2"></i>
							Add new
							category
						</button>
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form id="categoryForm" method="post">
										<div class="modal-body">
											<div class="mb-3">
												<label for="recipient-name" class="col-form-label">Category
													Title:</label>
												<input type="text" class="form-control" id="recipient-name"
													name="categoryname"
													value="<?= old_value('categoryname') ?>">
												<div class="text-danger" id="categorynameError">
													<?= $admin->getError('categoryname') ?>
												</div>
											</div>
											<div class="mb-3">
												<label for="message-text" class="col-form-label">Category
													Description:</label>
												<textarea class="form-control" id="message-text"
													name="categorydescription"><?= old_value('categorydescription') ?></textarea>
												<div class="text-danger" id="categorydescriptionError">
													<?= $admin->getError('categorydescription') ?>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary"
												data-bs-dismiss="modal">Cancel</button>
											<button type="submit" class="btn btn-primary">Save category</button>
										</div>
									</form>


								</div>
							</div>
						</div>

						<div class="toast align-items-center text-white bg-success border-0 position-fixed top-30 start-50 translate-middle-x p-3"
							role="alert" aria-live="assertive" aria-atomic="true">
							<div class="d-flex">
								<div class="toast-body">
									Category added successfully!
								</div>
								<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
									aria-label="Close"></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row g-4">
				<?php if (is_array($data['row']) && count($data['row'])): ?>
				<?php foreach ($data['row'] as $row): ?>
				<?php if ($row->categorystatus == 'active'): ?>
				<div class="col-md-6 col-xl-4">
					<div class="card border h-100">
						<div class=" card-header border-bottom p-3">
							<div class="d-flex  align-items-center">
								<div class="icon-lg shadow bg-body rounded-circle">⛰️</div>
								<h3 class="mb-0 ms-3 ">
									<?= esc($row->categoryname) ?>
								</h3>
								<?php
        $ses = new Adminsession();
				    $sesidadmin = $ses->adminuser("adminID");
				    ;
				    ?>
								<?php if($sesidadmin === $row->admid):?>
								<form id="postForm" method="post" class=" ms-auto">
									<button class="btn btn-round btn-danger deletetrash" type="submit"
										name="deletetrash"
										value="<?=$row->categoryID?>"><i
											class="bi bi-trash"></i></button>
								</form>
								<?php endif?>
							</div>
						</div>
						<div class="card-body p-3">
							<p><?= esc($row->categorydescription) ?>
							</p>
							<div class="d-flex justify-content-between">
								<?php

				    // Initialize necessary objects
				    $ses = new Adminsession();
				    // $getcategories = new Adminpostsmodel();

				    // Initialize total category count
				    $totalcategory = 0;

				    // Check if the user is logged in
				    if ($ses->isLoggedIn()) {
				        // Loop through each category
				        // Get the category name from the row
				        $categoryName = $row->categoryname;

				        // Fetch the total number of posts in this category
				        $totalcategory = $getcategories->getCategoriesNumber($categoryName);

				        // Display the total number of posts
				        ?>
								<div>
									<h5 class="mb-0">
										<?= $totalcategory ?>
									</h5>
									<h6 class="mb-0 fw-light">Total posts</h6>
								</div>
								<?php if (is_array($data['categorycreator']) && count($data['categorycreator'])): ?>
												<?php foreach ($data['categorycreator'] as $categorycreator): ?>
												<?php if ($row->admid === $categorycreator->adminID): ?>
								<h6 class="mb-0 fw-light text-primary">By: <?= esc($categorycreator->firstname . " " . $categorycreator->lastname) ?></h6>
								<?php endif; ?>
								<?php endforeach; ?>
								<?php endif; ?>
								<?php

				    }
				    ?>


							</div>
						</div>
						<div class="card-footer border-top text-center p-3">
							<a href="#" class="btn btn-primary-soft w-100 mb-0">View posts</a>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>

				<?php else: ?>
				<p class="text-danger">no categories found click add category above to create one</p>
				<?php endif; ?>






			</div>
		</div>
	</section>
	<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->



<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		document.getElementById('categoryForm').addEventListener('submit', function(event) {
			event.preventDefault();
			const form = event.target;
			const formData = new FormData(form);

			fetch('', {
					method: 'POST',
					body: formData,
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						alert('Category added successfully!');
						form.reset();
						document.querySelector('.btn-close').click(); // Close the modal
						// Show toast
						var toastEl = document.querySelector('.toast');
						var toast = new bootstrap.Toast(toastEl);
						toast.show();
					} else {
						// Clear previous errors
						document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');

						// Display validation errors
						for (const [field, message] of Object.entries(data.errors)) {
							const errorDiv = document.getElementById(`${field}Error`);
							if (errorDiv) {
								errorDiv.textContent = message;
							}
						}
					}
				})
				.catch(error => {
					console.error('Error:', error);

					// Display a general error message in the categoryname and categorydescription fields
					document.getElementById('categorynameError').textContent =
						'An error occurred. Please try again.';
					document.getElementById('categorydescriptionError').textContent =
						'An error occurred. Please try again.';
				});
		});
	});
</script>

<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>