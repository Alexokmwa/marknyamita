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
								class="badge bg-primary bg-opacity-10 text-primary">todo</span></h1>
						<a href="<?=ROOTADMIN?>Admincreatepost"
							class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>Add a post</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="row g-4 mb-4">
						<div class="col-sm-4 col-lg-3">
							<a href="#!">
								<div class="card card-body border h-100">
									<div class="fs-3 text-start text-success">
										<i class="bi bi-file-earmark-text"></i>
									</div>
									<div class="ms-0">
										<h3 class="mb-0">0</h3>
										<h6 class="mb-0">Document</h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-sm-4 col-lg-3">
							<a href="#!">
								<div class="card card-body border h-100">
									<div class="fs-3 text-start text-success">
										<i class="bi bi-camera-reels"></i>
									</div>
									<div class="ms-0">
										<h3 class="mb-0">0</h3>
										<h6 class="mb-0">Videos</h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-sm-4 col-lg-3">
							<a href="#!">
								<div class="card card-body border h-100">
									<div class="fs-3 text-start text-success">
										<i class="bi bi-image"></i>
									</div>
									<div class="ms-0">
										<h3 class="mb-0">0</h3>
										<h6 class="mb-0">Images</h6>
									</div>
								</div>
							</a>
						</div>
						<div class="col-sm-4 col-lg-3">
							<a href="<?=ROOTADMIN?>Adminpostlist">
								<div class="card card-body border h-100">
									<div class="fs-3 text-start text-success">
										<i class="fa-solid fa-blog"></i>
									</div>
									<div class="ms-0">
										<h3 class="mb-0">
											<?=$blogpostCount?>
										</h3>
										<h6 class="mb-0">blogs</h6>
									</div>
								</div>
							</a>
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
									<form
										action="<?=ROOTADMIN?>Adminpostlistsearch"
										method="get" role="search" class="rounded position-relative">
										<input class="form-control pe-5 bg-transparent" type="search"
											placeholder="Search" aria-label="Search" name="findblog"
											value="<?=$_GET["findblog"] ?? ""?>">
										<button
											class=" btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
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
											<th scope="col" class="border-0">view</th>
											<th scope="col" class="border-0">ntfc</th>
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
												<span class="badge bg-success bg-opacity-10 text-success mb-2"><a
														href="<?=ROOTADMIN?>Adminviewblog/<?=$rowpost->postID?>">view</a></span>
											</td>
											<td>
												<span class="badge bg-success bg-opacity-10 text-success mb-2"><a
														href="<?=ROOTADMIN?>Adminviewblog/<?=$rowpost->postID?>?itemid=<?=$rowpost->postID?>"><i
															class="bi bi-bell-fill"></i></a></span>
											</td>
											<!-- Table data -->
											<td>
												<div class="d-flex gap-2">
													<a href="<?=ROOTADMIN?>Admindeletepost/<?=$rowpost->postID?>"
														class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip"
														data-bs-placement="top" title="Delete"><i
															class="bi bi-trash"></i></a>
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
								<p class="mb-sm-0 text-center text-sm-start">Showing 1 to
									<?=$limitnumber?> of
									<?=$blogpostCount?> entries
								</p>
								<!-- Pagination -->
								<nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
									<ul class="pagination pagination-sm pagination-bordered mb-0">
										<?php
                            $pager->display();?>
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