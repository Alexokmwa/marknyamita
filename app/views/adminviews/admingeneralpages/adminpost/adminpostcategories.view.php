<?php
/**
 * header nav file combined inclusion.
 */
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
								class="badge bg-primary bg-opacity-10 text-primary">07</span></h1>
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
            <label for="recipient-name" class="col-form-label">Category Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="categoryname" value="<?= old_value('categoryname') ?>">
            <div class="text-danger" id="categorynameError"><?= $admin->getError('categoryname') ?></div>
        </div>
        <div class="mb-3">
            <label for="message-text" class="col-form-label">Category Description:</label>
            <textarea class="form-control" id="message-text" name="categorydescription"><?= old_value('categorydescription') ?></textarea>
            <div class="text-danger" id="categorydescriptionError"><?= $admin->getError('categorydescription') ?></div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save category</button>
    </div>
</form>


								</div>
							</div>
						</div>
					
						<div class="toast align-items-center text-white bg-success border-0 position-fixed top-30 start-50 translate-middle-x p-3" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            Category added successfully!
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
					</div>
				</div>
			</div>
			<div class="row g-4">
			<?php if (is_array($data['row']) && count($data['row'])): ?>
    <?php foreach ($data['row'] as $row): ?>
        <div class="col-md-6 col-xl-4">
            <div class="card border h-100">
                <div class="card-header border-bottom p-3">
                    <div class="d-flex align-items-center">
                        <div class="icon-lg shadow bg-body rounded-circle">⛰️</div>
                        <h3 class="mb-0 ms-3"><?= esc($row->categoryname) ?></h3>
                    </div>
                </div>
                <div class="card-body p-3">
                    <p><?= esc($row->categorydescription) ?></p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="mb-0">846</h5>
                            <h6 class="mb-0 fw-light">Total posts</h6>
                        </div>
                        <ul class="avatar-group mb-0">
                            <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.html" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.html" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.html" alt="avatar">
                            </li>
                            <li class="avatar avatar-xs">
                                <div class="avatar-img rounded-circle bg-primary"><i class="fas fa-plus text-white position-absolute top-50 start-50 translate-middle"></i></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer border-top text-center p-3">
                    <a href="#" class="btn btn-primary-soft w-100 mb-0">View posts</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>


				


				<div class="col-12">
					<!-- Blog list table START -->
					<div class="card border bg-transparent rounded-3">
						<!-- Card header START -->
						<div class="card-header bg-transparent border-bottom p-3">
							<div class="d-sm-flex justify-content-sm-between align-items-center">
								<h5 class="mb-2 mb-sm-0">Technology <span
										class="badge bg-primary bg-opacity-10 text-primary">105</span></h5>
								<a href="<?=ROOTADMIN?>Admincreatepost"
									class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>Create a
									post</a>
							</div>
						</div>
						<!-- Card header END -->

						<!-- Card body START -->
						<div class="card-body p-3">

							<!-- Search and select START -->
							<div class="row g-3 align-items-center justify-content-between mb-3">
								<!-- Search -->
								<div class="col-md-8">
									<form class="rounded position-relative">
										<input class="form-control pe-5 bg-transparent" type="search"
											placeholder="Search" aria-label="Search">
										<button
											class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
											type="submit"><i class="fas fa-search fs-6 "></i></button>
									</form>
								</div>

								<!-- Select option -->
								<div class="col-md-3">
									<!-- Short by filter -->
									<form>
										<select class="form-select z-index-9 bg-transparent"
											aria-label=".form-select-sm">
											<option value="">Sort by</option>
											<option>Free</option>
											<option>Newest</option>
											<option>Oldest</option>
										</select>
									</form>
								</div>
							</div>
							<!-- Search and select END -->

							<!-- Blog list table START -->
							<div class="table-responsive border-0">
								<table class="table table-dark-gray align-middle p-4 mb-0 table-hover table-shrink">
									<!-- Table head -->
									<thead>
										<tr>
											<th scope="col" class="border-0 rounded-start">Post Name</th>
											<th scope="col" class="border-0">Author Name</th>
											<th scope="col" class="border-0">Published Date</th>
											<th scope="col" class="border-0">Views</th>
											<th scope="col" class="border-0">Status</th>
											<th scope="col" class="border-0 rounded-end">Action</th>
										</tr>
									</thead>

									<!-- Table body START -->
									<tbody>
										<!-- Table item -->
										<tr>
											<!-- Table data -->
											<td>
												<h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">12 worst types of
														business accounts you follow on Twitter</a></h6>
											</td>
											<!-- Table data -->
											<td>
												<h6 class="mb-0"><a href="#">Lori Stevens</a></h6>
											</td>
											<!-- Table data -->
											<td>Jan 22, 2022</td>
											<!-- Table data -->
											<td>2,546</td>
											<!-- Table data -->
											<td>
												<span
													class="badge bg-success bg-opacity-10 text-success mb-2">Live</span>
											</td>
											<!-- Table data -->
											<td>
												<div class="d-flex gap-2">
													<a href="#" class="btn btn-light btn-round mb-0"
														data-bs-toggle="tooltip" data-bs-placement="top"
														title="Delete"><i class="bi bi-trash"></i></a>
													<a href="#" class="btn btn-light btn-round mb-0"
														data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
															class="bi bi-pencil-square"></i></a>
												</div>
											</td>
										</tr>



									</tbody>
									<!-- Table body END -->
								</table>
							</div>
							<!-- Blog list table END -->

							<!-- Pagination START -->
							<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
								<!-- Content -->
								<p class="mb-sm-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
								<!-- Pagination -->
								<nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
									<ul class="pagination pagination-sm pagination-bordered mb-0">
										<li class="page-item disabled">
											<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item active"><a class="page-link" href="#">2</a></li>
										<li class="page-item disabled"><a class="page-link" href="#">..</a></li>
										<li class="page-item"><a class="page-link" href="#">15</a></li>
										<li class="page-item">
											<a class="page-link" href="#">Next</a>
										</li>
									</ul>
								</nav>
							</div>
							<!-- Pagination END -->
						</div>
					</div>
					<!-- Blog list table END -->
				</div>
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
            document.getElementById('categorynameError').textContent = 'An error occurred. Please try again.';
            document.getElementById('categorydescriptionError').textContent = 'An error occurred. Please try again.';
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