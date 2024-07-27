<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();
?>

<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Post list START -->
	<section class="py-4">
		<div class="container">
			<div class="row pb-4">
				<div class="col-12">
					<!-- Title -->
					<div class="d-sm-flex justify-content-sm-between align-items-center">
						<h1 class="mb-2 mb-sm-0 h2">Post List <span
								class="badge bg-primary bg-opacity-10 text-primary">110</span></h1>
						<a href="#" class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>Add a post</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="row g-4 mb-4">
						<div class="col-sm-4 col-lg-2">
							<!-- Card START -->
							<div class="card card-body border h-100">
								<!-- Icon -->
								<div class="fs-3 text-start text-success">
									<i class="bi bi-file-earmark-text"></i>
								</div>
								<!-- Content -->
								<div class="ms-0">
									<h3 class="mb-0">305</h3>
									<h6 class="mb-0">Document</h6>
								</div>
							</div>
							<!-- Card END -->
						</div>
						<div class="col-sm-4 col-lg-2">
							<!-- Card START -->
							<div class="card card-body border h-100">
								<!-- Icon -->
								<div class="fs-3 text-start text-success">
									<i class="bi bi-camera-reels"></i>
								</div>
								<!-- Content -->
								<div class="ms-0">
									<h3 class="mb-0">120</h3>
									<h6 class="mb-0">Videos</h6>
								</div>
							</div>
							<!-- Card END -->
						</div>
						<div class="col-sm-4 col-lg-2">
							<!-- Card START -->
							<div class="card card-body border h-100">
								<!-- Icon -->
								<div class="fs-3 text-start text-success">
									<i class="bi bi-image"></i>
								</div>
								<!-- Content -->
								<div class="ms-0">
									<h3 class="mb-0">475</h3>
									<h6 class="mb-0">Images</h6>
								</div>
							</div>
							<!-- Card END -->
						</div>
						<div class="col-lg-6">
							<!-- Card START -->
							<div class="card card-body border h-100">
								<h3>Storage space </h3>
								<div>
									<div class="d-flex">
										<h6 class="mt-0">Storage 80%</h6>
										<span class="ms-auto">6.80GB of 10GB</span>
									</div>
									<div class="progress progress-percent-bg progress-md">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-info"
											role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
											aria-valuemax="100"></div>
									</div>
									<!-- Card END -->
								</div>
							</div>
						</div>
					</div>
					<!-- Post list table START -->
					<div class="card border bg-transparent rounded-3">

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

							<!-- Post list table START -->
							<div class="table-responsive border-0">
								<table class="table align-middle p-4 mb-0 table-hover table-shrink">
									<!-- Table head -->
									<thead class="table-dark">
										<tr>
											<th scope="col" class="border-0 rounded-start">Post Name</th>
											<th scope="col" class="border-0">Author Name</th>
											<th scope="col" class="border-0">Published Date</th>
											<th scope="col" class="border-0">Category</th>
											<th scope="col" class="border-0">Status</th>
											<th scope="col" class="border-0 rounded-end">Action</th>
										</tr>
									</thead>
									<!-- Table body START -->
									<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
									<?php foreach ($data['rowpost'] as $rowpost): ?>
									<tbody class="border-top-0">
										<!-- Table item -->
										<tr>
											<!-- Table data -->
											<td>
												<h6 class="course-title mt-2 mt-md-0 mb-0"><a
														href="#"><?= esc($rowpost->postname) ?></a>
												</h6>
											</td>
											<!-- Table data -->
											<td>
												<?php if (is_array($data['row']) && count($data['row'])): ?>
												<?php foreach ($data['row'] as $row): ?>
												<?php if ($row->adminID === $rowpost->adminID): ?>
												<h6 class="mb-0"><a
														href="#"><?= esc($row->firstname . " " . $row->lastname) ?></a>
												</h6>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
											</td>
											<!-- Table data -->
											<td><?= date('M d, Y', strtotime($rowpost->createdAt)); ?>
											</td>
											<!-- Table data -->
											<td>
												<a href="#" class="badge text-bg-warning mb-2"><i
														class="fas fa-circle me-2 small fw-bold"></i><?= esc($rowpost->category) ?></a>
											</td>
											<!-- Table data -->
											<td>
												<span
													class="badge bg-success bg-opacity-10 text-success mb-2"><?= esc($rowpost->status) ?></span>
											</td>
											<!-- Table data -->
											<td>
												<div class="d-flex gap-2">
													<a href="#!" class="btn btn-light btn-round mb-0"
														data-bs-toggle="tooltip" data-bs-placement="top"
														title="Delete"><i class="bi bi-trash"></i></a>
													<a href="<?=ROOTADMIN?>Admineditpost/<?=$rowpost->postID?>"
														class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip"
														data-bs-placement="top" title="Edit"><i
															class="bi bi-pencil-square"></i></a>
												</div>
											</td>
										</tr>
									</tbody>
									<?php endforeach; ?>
									<?php endif; ?>
									<!-- Table body END -->


								</table>
							</div>
							<!-- Post list table END -->

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
					<!-- Post list table END -->
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

<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>