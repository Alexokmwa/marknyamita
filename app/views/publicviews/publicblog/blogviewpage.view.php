<?php
use app\models\Session;

/**
 * header nav file combined inclusion.
 */
renderpageHeader();
?>


<nav class="myclassallignsecondnav navbar navbar-expand-xl navbar-light navbar-sticky header-static pt-2">
	<div class="container-fluid">
		<ul class="navbar-nav  navbar-nav-scroll mx-auto d-flex flex-row flex-nowrap">

			<li class="nav-item  me-3"><a class="nav-link" href="dashboard.html"></i>Dashboard</a></li>
			<li class="nav-item me-3"><a class="nav-link" href="dashboard.html"></i>Dashboard</a></li>
			<li class="nav-item me-3"><a class="nav-link" href="dashboard.html"></i>Dashboard</a></li>
		</ul>
	</div>
</nav>

</header>
<!-- =======================
Header END -->
<!-- **************** MAIN CONTENT START **************** -->
<main class="mysmbottomspace">

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

					<div class="mt-5 js-comments">
						<h3>5 comments</h3>
						<!-- Comment level 1 -->
						<?php if (is_array($data['comment']) && count($data['comment'])): ?>
							<?php foreach ($data['comment'] as $comment): ?>
								<?php foreach ($data['rowcreatorusers'] as $rowcreatorusers): ?>
									<?php if ($comment->user_id === $rowcreatorusers->user_id): ?>
						<div class="my-4 d-flex">
							<img class="avatar avatar-md rounded-circle float-start me-3"
								src="assets/images/avatar/01.html" alt="avatar">
							<div>
								<p><?=$comment->Content?></p>
								<div class="mb-2">
									<h5 class="m-0"><?= esc($rowcreatorusers->firstname . " " . $rowcreatorusers->lastname) ?></h5>
									<?php endif; ?>
							<?php endforeach; ?>
									<span class="me-3 small"><?= date('F j, Y \a\t g:i a', strtotime($comment->CreatedAt)) ?></span>
									<a href="#" class="text-body fw-normal reply-btn" data-bs-toggle="collapse"
										data-bs-target="#replyForm-1">Reply</a>
								</div>
								<!-- Reply Form Start -->
								<div class="collapse" id="replyForm-1">
									<form id="replyForm" class="row g-3 mt-2" method="post"
										enctype="multipart/form-data">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="name" type="text" class="form-control" aria-label="First name">
											<div class="text-danger" id="nameError">
												<?= $user->getError('name') ?>
											</div>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="email" type="email" class="form-control">
											<div class="text-danger" id="emailError">
												<?= $user->getError('email') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Content" class="form-control" rows="3"></textarea>
											<div class="text-danger" id="ContentError">
												<?= $user->getError('Content') ?>
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<div class="position-relative">
													<h6 class="my-2">
														Upload post image here, or
														<a href="#!" class="text-primary">Browse</a>
													</h6>
													<label class="w-100" style="cursor:pointer;">
														<span>
															<input onchange="display_image(this.files[0])"
																class="form-control stretched-link" type="file"
																id="image" name="usercommentimage">
														</span>
														<div>
															<img src="<?= get_image() ?>"
																alt="img" class="img-thumbnail js-image-preview"
																style="height:auto;width:150px;">
														</div>
													</label>
												</div>
												<div class="text-danger" id="usercommentimageError">
													<?= $user->getError('usercommentimage') ?>
												</div>
												<p class="small mb-0 mt-2">
													<b>Note:</b> Only JPG, JPEG and PNG.
												</p>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary">Post comment</button>
										</div>
									</form>
								</div>
								<!-- Reply Form End -->
							</div>
						</div>
						
						<!-- Comment level 1 end -->

						<!-- Comment children level 2 -->
						<div class="my-4 d-flex ps-2 ps-md-3">
							<img class="avatar avatar-md rounded-circle float-start me-3"
								src="assets/images/avatar/02.html" alt="avatar">
							<div>
								<p>main comment reply</p>
								<div class="mb-2">
									<h5 class="m-0">author</h5>
									<span class="me-3 small">June 11, 2022 at 6:55 am </span>
									<a href="#" class="text-body fw-normal reply-btn" data-bs-toggle="collapse"
										data-bs-target="#replyForm-2">Reply</a>
								</div>
								<!-- Reply Form Start -->
								<div class="collapse" id="replyForm-2">
									<form id="replyForm" class="row g-3 mt-2" method="post"
										enctype="multipart/form-data">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="name" type="text" class="form-control" aria-label="First name">
											<div class="text-danger" id="nameError">
												<?= $user->getError('name') ?>
											</div>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="email" type="email" class="form-control">
											<div class="text-danger" id="emailError">
												<?= $user->getError('email') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Content" class="form-control" rows="3"></textarea>
											<div class="text-danger" id="ContentError">
												<?= $user->getError('Content') ?>
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<div class="position-relative">
													<h6 class="my-2">
														Upload post image here, or
														<a href="#!" class="text-primary">Browse</a>
													</h6>
													<label class="w-100" style="cursor:pointer;">
														<span>
															<input onchange="display_image(this.files[0])"
																class="form-control stretched-link" type="file"
																id="image" name="usercommentimage">
														</span>
														<div>
															<img src="<?= get_image() ?>"
																alt="img" class="img-thumbnail js-image-preview"
																style="height:auto;width:150px;">
														</div>
													</label>
												</div>
												<div class="text-danger" id="usercommentimageError">
													<?= $user->getError('usercommentimage') ?>
												</div>
												<p class="small mb-0 mt-2">
													<b>Note:</b> Only JPG, JPEG and PNG.
												</p>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary">Post comment</button>
										</div>
									</form>
								</div>
								<!-- Reply Form End -->
							</div>
						</div>
						<!-- Comment children level 2 end -->
						<?php endforeach; ?>
						<?php endif; ?>
						<!-- Comment level 1 and 2 for -->
						<?php if (is_array($data['commentnotlogged']) && count($data['commentnotlogged'])): ?>
							<?php foreach ($data['commentnotlogged'] as $commentnotlogged): ?>
								
						<div class="my-4 d-flex">
							<img class="avatar avatar-md rounded-circle float-start me-3"
								src="assets/images/avatar/01.html" alt="avatar">
							<div>
								<p><?=$commentnotlogged->Content?></p>
								<div class="mb-2">
									<h5 class="m-0"><?= $commentnotlogged->name?></h5>
									
									<span class="me-3 small"><?= date('F j, Y \a\t g:i a', strtotime($commentnotlogged->CreatedAt)) ?></span>
									<span><i class="text-danger" style="margin-right:10px">not a registered user</i></span>
									<a href="#" class="text-body fw-normal reply-btn" data-bs-toggle="collapse"
										data-bs-target="#replyForm-1">Reply</a>
								</div>
								<!-- Reply Form Start -->
								<div class="collapse" id="replyForm-1">
									<form id="replyForm" class="row g-3 mt-2" method="post"
										enctype="multipart/form-data">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="name" type="text" class="form-control" aria-label="First name">
											<div class="text-danger" id="nameError">
												<?= $user->getError('name') ?>
											</div>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="email" type="email" class="form-control">
											<div class="text-danger" id="emailError">
												<?= $user->getError('email') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Content" class="form-control" rows="3"></textarea>
											<div class="text-danger" id="ContentError">
												<?= $user->getError('Content') ?>
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<div class="position-relative">
													<h6 class="my-2">
														Upload post image here, or
														<a href="#!" class="text-primary">Browse</a>
													</h6>
													<label class="w-100" style="cursor:pointer;">
														<span>
															<input onchange="display_image(this.files[0])"
																class="form-control stretched-link" type="file"
																id="image" name="usercommentimage">
														</span>
														<div>
															<img src="<?= get_image() ?>"
																alt="img" class="img-thumbnail js-image-preview"
																style="height:auto;width:150px;">
														</div>
													</label>
												</div>
												<div class="text-danger" id="usercommentimageError">
													<?= $user->getError('usercommentimage') ?>
												</div>
												<p class="small mb-0 mt-2">
													<b>Note:</b> Only JPG, JPEG and PNG.
												</p>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary">Post comment</button>
										</div>
									</form>
								</div>
								<!-- Reply Form End -->
							</div>
						</div>
						
						<!-- Comment level 1 end -->

						<!-- Comment children level 2 -->
						<div class="my-4 d-flex ps-2 ps-md-3">
							<img class="avatar avatar-md rounded-circle float-start me-3"
								src="assets/images/avatar/02.html" alt="avatar">
							<div>
								<p>main comment reply</p>
								<div class="mb-2">
									<h5 class="m-0">author</h5>
									<span class="me-3 small">June 11, 2022 at 6:55 am </span>
									<a href="#" class="text-body fw-normal reply-btn" data-bs-toggle="collapse"
										data-bs-target="#replyForm-2">Reply</a>
								</div>
								<!-- Reply Form Start -->
								<div class="collapse" id="replyForm-2">
									<form id="replyForm" class="row g-3 mt-2" method="post"
										enctype="multipart/form-data">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="name" type="text" class="form-control" aria-label="First name">
											<div class="text-danger" id="nameError">
												<?= $user->getError('name') ?>
											</div>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="email" type="email" class="form-control">
											<div class="text-danger" id="emailError">
												<?= $user->getError('email') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Content" class="form-control" rows="3"></textarea>
											<div class="text-danger" id="ContentError">
												<?= $user->getError('Content') ?>
											</div>
										</div>
										<div class="col-12">
											<div class="mb-3">
												<div class="position-relative">
													<h6 class="my-2">
														Upload post image here, or
														<a href="#!" class="text-primary">Browse</a>
													</h6>
													<label class="w-100" style="cursor:pointer;">
														<span>
															<input onchange="display_image(this.files[0])"
																class="form-control stretched-link" type="file"
																id="image" name="usercommentimage">
														</span>
														<div>
															<img src="<?= get_image() ?>"
																alt="img" class="img-thumbnail js-image-preview"
																style="height:auto;width:150px;">
														</div>
													</label>
												</div>
												<div class="text-danger" id="usercommentimageError">
													<?= $user->getError('usercommentimage') ?>
												</div>
												<p class="small mb-0 mt-2">
													<b>Note:</b> Only JPG, JPEG and PNG.
												</p>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-primary">Post comment</button>
										</div>
									</form>
								</div>
								<!-- Reply Form End -->
							</div>
						</div>
						<!-- Comment children level 2 end -->
						<?php endforeach; ?>
						<?php endif; ?>
						<?php
	                $pager->display();
	    ?>
						<!-- pager end -->
					</div>
					<!-- Comments END -->


				</div> <!-- row END -->

				<?php
$ses = new Session();

	    ?>

				<?php if ($ses->isLoggedIn()): ?>
				<!-- Reply START -->
				<div>
					<h3>Leave a reply</h3>
					<small>Your email address will not be published. Required fields are marked
						<span class="text-danger">*</span>

					</small>
					<form id="postForm" class="row g-3 mt-2" method="post" enctype="multipart/form-data">
						<div class="col-md-6">
							<label class="form-label">Name
								<span class="text-danger">*</span>

							</label>
							<input name="name" type="text" class="form-control">
							<div class="text-danger" id="nameError">
								<?= $user->getError('name') ?>
							</div>
						</div>
						<div class="col-md-6">
							<label class="form-label">Email
								<span class="text-danger">*</span>

							</label>
							<input name="email" type="email" class="form-control">
							<div class="text-danger" id="emailError">
								<?= $user->getError('email') ?>
							</div>
						</div>

						<div class="col-12">
							<label class="form-label">Your Comment
								<span class="text-danger">*</span>

							</label>
							<textarea name="Content" class="form-control" rows="3"></textarea>
							<div class="text-danger" id="ContentError">
								<?= $user->getError('Content') ?>
							</div>
						</div>

						<div class="col-12">
							<div class="mb-3">
								<!-- Image -->
								<div class="position-relative">
									<h6 class="my-2">
										please Upload comment image here, or
										<a href="#!" class="text-primary">Browse</a>
									</h6>
									<label class="w-100" style="cursor:pointer;">
										<span>
											<input onchange="display_image(this.files[0])"
												class="form-control stretched-link" type="file" id="image"
												name="usercommentimage">
										</span>
										<div>
											<img src="<?= get_image() ?>"
												alt="img" class="img-thumbnail js-image-preview"
												style="height:auto;width:150px;">
										</div>
									</label>
								</div>

								<p class="small mb-0 mt-2">
									<b>Note:</b> Only JPG, JPEG and PNG.
								</p>
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Post comment</button>
						</div>
					</form>
				</div>
				<!-- Reply END -->
				<?php else: ?>

				<!-- Reply START -->
				<div>
					<h3>Leave a reply</h3>
					<small>Your email address will not be published. Required fields are marked
						<span class="text-danger">*</span>

					</small>

					<form id="postForm" class="row g-3 mt-2" method="post" enctype="multipart/form-data">
						<div class="col-md-6">
							<label class="form-label">Name
								<span class="text-danger">*</span>

							</label>
							<input name="name" type="text" class="form-control" aria-label="First name">
							<div class="text-danger" id="nameError">
								<?= $usernotloggedin->getError('name') ?>
							</div>
						</div>
						<div class="col-md-6">
							<label class="form-label">Email
								<span class="text-danger">*</span>

							</label>
							<input name="email" type="email" class="form-control">
							<div class="text-danger" id="emailError">
								<?= $usernotloggedin->getError('email') ?>
							</div>
						</div>

						<div class="col-12">
							<label class="form-label">Your Comment
								<span class="text-danger">*</span>

							</label>
							<textarea name="Content" class="form-control" rows="3"></textarea>
							<div class="text-danger" id="ContentError">
								<?= $usernotloggedin->getError('Content') ?>
							</div>
						</div>

						<div class="col-12">
							<div class="mb-3">
								<!-- Image -->
								<div class="position-relative">
									<h6 class="my-2">
										please Upload comment image here, or
										<a href="#!" class="text-primary">Browse</a>
									</h6>
									<label class="w-100" style="cursor:pointer;">
										<span>
											<input onchange="display_image(this.files[0])"
												class="form-control stretched-link" type="file" id="image"
												name="usercommentimage">
										</span>
										<div>
											<img src="<?= get_image() ?>"
												alt="img" class="img-thumbnail js-image-preview"
												style="height:auto;width:150px;">
										</div>
									</label>
								</div>
								<div class="text-danger" id="usercommentimageError">
									<?= $usernotloggedin->getError('usercommentimage') ?>
								</div>
								<p class="small mb-0 mt-2">
									<b>Note:</b> Only JPG, JPEG and PNG.
								</p>
							</div>
						</div>
						<p class="text-danger">you are currently not logged in,you may not have control to this
							comment
							in
							future after you
							terminate this session please <br /> <a
								href="<?=ROOT?>Login">log in</a>
							to
							have lifetime controll of this
							comment
						</p>
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Post comment</button>
						</div>
					</form>
				</div>
				<!-- Reply END -->
				<?php endif; ?>
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
<script>
	function display_image(file) {
		let allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
		if (!allowed.includes(file.type)) {

			alert("the only file types supported are: " + allowed.toString().replaceAll("image/", ""));
			return;
		}

		document.querySelector(".js-image-preview").src = URL.createObjectURL(file);
	}
</script>
<?php
    /**
     * html footer function
     */
    rendermainFooter();

rendersmfooter();
renderHtmlFooter();

?>