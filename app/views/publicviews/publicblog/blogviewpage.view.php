<?php
use app\models\Session;

/**
 * header nav file combined inclusion.
 */
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
						<!-- <h3><?=$totalcomment?> comments</h3> -->

						<!-- Comment level 1 -->
						<?php if (is_array($data['comment']) && count($data['comment'])): ?>
						<?php foreach ($data['comment'] as $comment): ?>
						<?php foreach ($data['rowcreatorusers'] as $rowcreatorusers): ?>
						<?php if ($comment->user_id === $rowcreatorusers->user_id): ?>
						<div class="my-4 d-flex">
							<img class="avatar avatar-md rounded-circle float-start me-3"
								src="assets/images/avatar/01.html" alt="avatar">
							<div>
								<p><?= htmlspecialchars($comment->Content) ?>
								</p>

								<div class="mb-2">
									<?php if (!empty($comment->usercommentimage)): ?>
									<div class="col-12">
										<?php
	        $imageSrclogged = ROOT . esc($comment->usercommentimage);
									    // Check if the image URL is correctly formatted
									    // echo $imageSrc;
									    // echo $commentnotlogged->usercommentimage;
									    ?>
										<img class="rounded"
											src="<?= $imageSrclogged ?>"
											alt="comment photo" style="object-fit: cover; height:150px; width:500px;"
											data-bs-toggle="modal"
											data-bs-target="#imageModal-<?= $comment->commentID ?>">
									</div>

									<!-- Bootstrap Modal -->
									<div class="modal fade"
										id="imageModal-<?= $comment->commentID ?>"
										tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-fullscreen">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="imageModalLabel">Image</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div
													class="modal-body d-flex justify-content-center align-items-center">
													<img src="<?= $imageSrclogged ?>"
														class="img-fluid" alt="comment photo">
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<h5 class="m-0">
										<?= htmlspecialchars($rowcreatorusers->firstname . " " . $rowcreatorusers->lastname) ?>
									</h5>
									<span
										class="me-3 small"><?= date('F j, Y \a\t g:i a', strtotime($comment->CreatedAt)) ?></span>
									<a href="#" class="text-body fw-normal reply-btn" data-bs-toggle="collapse"
										data-bs-target="#replyForm-<?= $comment->commentID ?>">Reply</a>
									<a href="#" class="myrepliesclass text-body fw-normal reply-btn"
										data-bs-toggle="collapse"
										data-bs-target="#replies-<?= $comment->commentID ?>">Replies</a>
								</div>
								<?php if($ses->user("user_id") === $comment->user_id):?>
								<div class="mb-3">
									<a href="#" class="btn btn-primary myrepliesclass  fw-normal "
										data-bs-toggle="collapse"
										data-bs-target="#edit-<?= $comment->commentID ?>">Edit</a>
									<div class="collapse"
										id="edit-<?= $comment->commentID ?>">
										<form id="editBlogCommentReplyForm" method="post" enctype="multipart/form-data">
											<input type="hidden" name="form_type" value="edit_blog_comment">
											<input type="hidden" name="commentID"
												value="<?= $comment->commentID ?>">
											<div class="col-md-6">
												<label class="form-label">Name *</label>
												<input name="name" type="text" class="form-control">
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
												<button type="submit" class="btn btn-primary">edit reply</button>
											</div>
										</form>
									</div>
									<!-- <form id="deletereplyForm" method="post" >
						<input type="hidden" name="form_type" value="delete_blog_comment">
						<input type="hidden" name="delID" value="<?=$comment->commentID?>">
									<button type="submit" class="btn btn-danger">delete reply</button>
									</form> -->
								</div>
								<?php endif?>
								<!-- Reply Form Start -->
								<div class="collapse"
									id="replyForm-<?= $comment->commentID ?>">
									<?php if ($ses->isLoggedIn()): ?>
									<form id="addBlogCommentReplyForm" method="post" enctype="multipart/form-data">
										<input type="hidden" name="form_type" value="add_blog_comment_reply">
										<input type="hidden" name="commentID"
											value="<?= $comment->commentID ?>">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="namereply" type="text" class="form-control">
											<div class="text-danger" id="namereplyError">
												<?= $user->getError('namereply') ?>
											</div>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="emailreply" type="email" class="form-control">
											<div class="text-danger" id="emailreplyError">
												<?= $user->getError('emailreply') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Contentreply" class="form-control" rows="3"></textarea>
											<div class="text-danger" id="ContentError">
												<?= $user->getError('Contentreply') ?>
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
											<button type="submit" class="btn btn-primary">Post reply</button>
										</div>
									</form>
									<?php else: ?>
									<form id="addBlogCommentReplyForm" method="post" enctype="multipart/form-data">
										<input type="hidden" name="form_type"
											value="add_blog_comment_reply_not_logged_in_fromloggeduser">
										<input type="hidden" name="commentID"
											value="<?= $comment->commentID ?>">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="namereply" type="text" class="form-control">
											<div class="text-danger" id="namereplyError">
												<?= $user->getError('namereply') ?>
											</div>
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="emailreply" type="email" class="form-control">
											<div class="text-danger" id="emailreplyError">
												<?= $user->getError('emailreply') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Contentreply" class="form-control" rows="3"></textarea>
											<div class="text-danger" id="ContentError">
												<?= $user->getError('Contentreply') ?>
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
											<button type="submit" class="btn btn-primary">Post reply</button>
										</div>
									</form>
									<?php endif; ?>
								</div>
								<!-- Reply Form End -->

								<!-- Comment children level 2 -->
								<?php if (is_array($data['commentreply']) && count($data['commentreply'])): ?>
								<div class="collapse"
									id="replies-<?= $comment->commentID ?>">
									<?php foreach ($data['commentreply'] as $commentreply): ?>
									<?php if ($commentreply->commentID === $comment->commentID): ?>
									<div class="my-4 d-flex ps-2 ps-md-3">
										<img class="avatar avatar-md rounded-circle float-start me-3"
											src="assets/images/avatar/02.html" alt="avatar">
										<div>
											<p><?= htmlspecialchars($commentreply->Contentreply, ENT_QUOTES, 'UTF-8') ?>
											</p>
											<?php if (!empty($commentreply->usercommentimage)): ?>
											<div class="col-12">
												<?php
									                                $imageSrcreply = ROOT . esc($commentreply->usercommentimage);
											    ?>
												<img class="rounded"
													src="<?= $imageSrcreply ?>"
													alt="comment photo"
													style="object-fit: cover; height:150px; width:500px;"
													data-bs-toggle="modal"
													data-bs-target="#imageModalreply-<?= $commentreply->commentID ?>">
												<!-- Ensure unique ID -->
											</div>

											<!-- Bootstrap Modal -->
											<div class="modal fade"
												id="imageModalreply-<?= $commentreply->commentID ?>"
												tabindex="-1"
												aria-labelledby="imageModalLabelreply-<?= $commentreply->commentID ?>"
												aria-hidden="true">
												<div class="modal-dialog modal-dialog-fullscreen">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title"
																id="imageModalLabelreply-<?= $commentreply->commentID ?>">
																Image</h5> <!-- Unique ID for each modal -->
															<button type="button" class="btn-close"
																data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<div
															class="modal-body d-flex justify-content-center align-items-center">
															<img src="<?= $imageSrcreply ?>"
																class="img-fluid" alt="comment photo">
														</div>
													</div>
												</div>
											</div>
											<?php endif; ?>
											<div class="mb-2">
												<h5 class="m-0">
													<?= htmlspecialchars($commentreply->namereply, ENT_QUOTES, 'UTF-8') ?>
												</h5>
												<span
													class="me-3 small"><?= date('F j, Y \a\t g:i a', strtotime($commentreply->CreatedAt)) ?></span>

											</div>
										</div>
									</div>
									<?php if($ses->user("user_id") === $commentreply->user_id):?>
									<div class="mb-3">
										<a href="#" class="btn btn-primary myrepliesclass  fw-normal "
											data-bs-toggle="collapse"
											data-bs-target="#edit-<?= $commentreply->replyID ?>">Edit</a>
										<div class="collapse"
											id="edit-<?= $commentreply->replyID?>">
											<form id="editBlogCommentReplyForm" method="post"
												enctype="multipart/form-data">
												<input type="hidden" name="form_type" value="edit_blog_comment_reply">
												<input type="hidden" name="replyID"
													value="<?= $commentreply->replyID ?>">
												<div class="col-md-6">
													<label class="form-label">Name *</label>
													<input name="namereply" type="text" class="form-control">
													<div class="text-danger" id="namereplyError">
														<?= $user->getError('namereply') ?>
													</div>
												</div>
												<div class="col-md-6">
													<label class="form-label">Email *</label>
													<input name="emailreply" type="email" class="form-control">
													<div class="text-danger" id="emailreplyError">
														<?= $user->getError('emailreply') ?>
													</div>
												</div>
												<div class="col-12">
													<label class="form-label">Your Comment *</label>
													<textarea name="Contentreply" class="form-control"
														rows="3"></textarea>
													<div class="text-danger" id="ContentreplyError">
														<?= $user->getError('Contentreply') ?>
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
													<button type="submit" class="btn btn-primary">edit reply</button>
												</div>
											</form>
										</div>
										<!-- <form id="deletereplyForm" method="post" >
						<input type="hidden" name="form_type" value="delete_blog_reply_comment">
						<input type="hidden" name="delID" value="<?=$comment->commentID?>">
										<button type="submit" class="btn btn-danger">delete reply</button>
										</form> -->
									</div>
									<?php endif?>
									<!-- Comment children level 2 end -->
									<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<?php endif; ?>


							</div>
						</div>
						<?php endif; ?>
						<?php endforeach; ?>
						<?php endforeach; ?>
						<?php endif; ?>


						<!-- Comment level 1 and 2 for not logged users-->
						<?php if (is_array($data['commentnotlogged']) && count($data['commentnotlogged'])): ?>
						<?php foreach ($data['commentnotlogged'] as $commentnotlogged): ?>
						<!-- Comment level 1 stsrt -->

						<div class="my-4 d-flex">
							<img class="avatar avatar-md rounded-circle float-start me-3"
								src="assets/images/avatar/01.html" alt="avatar">
							<div>
								<p><?=$commentnotlogged->Content?>
								</p>
								<!-- Image with modal trigger -->
								<?php if (!empty($commentnotlogged->usercommentimage)): ?>
								<div class="col-12">
									<?php
            $imageSrc = ROOT . esc($commentnotlogged->usercommentimage);
								    // Check if the image URL is correctly formatted
								    // echo $imageSrc;
								    // echo $commentnotlogged->usercommentimage;
								    ?>
									<img class="rounded"
										src="<?= $imageSrc ?>"
										alt="comment photo" style="object-fit: cover; height:150px; width:500px;"
										data-bs-toggle="modal"
										data-bs-target="#imageModal-<?= $commentnotlogged->commentID ?>">
								</div>

								<!-- Bootstrap Modal -->
								<div class="modal fade"
									id="imageModal-<?= $commentnotlogged->commentID ?>"
									tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-fullscreen">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="imageModalLabel">Image</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal"
													aria-label="Close"></button>
											</div>
											<div class="modal-body d-flex justify-content-center align-items-center">
												<img src="<?= $imageSrc ?>"
													class="img-fluid" alt="comment photo">
											</div>
										</div>
									</div>
								</div>
								<?php endif; ?>

								<div class="mb-2">
									<h5 class="m-0">
										<?= $commentnotlogged->name?>
									</h5>

									<span
										class="me-3 small"><?= date('F j, Y \a\t g:i a', strtotime($commentnotlogged->CreatedAt)) ?></span>
									<span><i class="text-danger" style="margin-right:10px">not a registered
											user</i></span>
									<a href="#" class=" text-body fw-normal reply-btn" data-bs-toggle="collapse"
										data-bs-target="#replyForm-<?=$commentnotlogged->commentID?>">Reply</a>
									<a href="#" class="myrepliesclass text-body fw-normal reply-btn "
										data-bs-toggle="collapse"
										data-bs-target="#replies-<?= $commentnotlogged->commentID ?>">Replies</a>
								</div>

								<!-- Reply Form Start -->
								<div class="collapse"
									id="replyForm-<?=$commentnotlogged->commentID?>">
									<?php if ($ses->isLoggedIn()): ?>

									<form id="addBlogCommentReplyNotLoggedInForm" method="post"
										enctype="multipart/form-data">
										<input type="hidden" name="form_type"
											value="add_blog_comment_reply_comment_from_notlogged">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="namereply" type="text" class="form-control">
											<div class="text-danger" id="namereplyError" Required>
												<?= $user->getError('namereply') ?>
											</div>
											<input type="hidden" name="commentID"
												value="<?=$commentnotlogged->commentID?>">
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="emailreply" type="email" class="form-control">
											<div class="text-danger" id="emailreplyError" Required>
												<?= $user->getError('emailreply') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Contentreply" class="form-control" rows="3"></textarea Required>
											<div class="text-danger" id="ContentreplyError">
												<?= $user->getError('Contentreply') ?>
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
									<?php else:?>
										<form id="addBlogCommentReplyNotLoggedInForm" method="post" enctype="multipart/form-data">
								<input type="hidden" name="form_type" value="add_blog_comment_reply_not_logged_in">
										<div class="col-md-6">
											<label class="form-label">Name *</label>
											<input name="namereply" type="text" class="form-control" required>
											<div class="text-danger" id="namereplyError">
												<?= $user->getError('namereply') ?>
											</div>
											<input type="hidden" name="commentID" value="<?=$commentnotlogged->commentID?>">
										</div>
										<div class="col-md-6">
											<label class="form-label">Email *</label>
											<input name="emailreply" type="email" class="form-control" required>
											<div class="text-danger" id="emailreplyError">
												<?= $user->getError('emailreply') ?>
											</div>
										</div>
										<div class="col-12">
											<label class="form-label">Your Comment *</label>
											<textarea name="Contentreply" class="form-control" rows="3" required></textarea>
											<div class="text-danger" id="ContentreplyError">
												<?= $user->getError('Contentreply') ?>
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
											<button type="submit" class="btn btn-primary">Post reply</button>
										</div>
									</form>
									<?php endif?>
								</div>
								<!-- Reply Form End -->
							</div>
						</div>

						<!-- Comment level 1 end -->
						<!-- Comment children level 2 -->
						<?php if (is_array($data['commentreplynotlogged']) && count($data['commentreplynotlogged'])): ?>
						<div class="collapse"
							id="replies-<?= $commentnotlogged->commentID ?>">
							<?php foreach ($data['commentreplynotlogged'] as $commentreplynotlogged): ?>
							<?php if ($commentreplynotlogged->commentID === $commentnotlogged->commentID): ?>
							<!-- Comment children level 2 -->
							<div class="my-4 d-flex ps-2 ps-md-3">
								<img class="avatar avatar-md rounded-circle float-start me-3"
									src="assets/images/avatar/02.html" alt="avatar">
								<div>
									<p><?= htmlspecialchars($commentreplynotlogged->Contentreply, ENT_QUOTES, 'UTF-8') ?>
									</p>
									<?php if (!empty($commentreplynotlogged->usercommentimage)): ?>
									<div class="col-12">
										<?php
								                                $imageSrcnotloggedreply = ROOT . esc($commentreplynotlogged->usercommentimage);
									    ?>
										<img class="rounded"
											src="<?= $imageSrcnotloggedreply ?>"
											alt="comment photo" style="object-fit: cover; height:150px; width:500px;"
											data-bs-toggle="modal"
											data-bs-target="#imageModalreplynotlogged-<?= $commentreplynotlogged->replyID ?>">
										<!-- Unique ID for each image -->
									</div>

									<!-- Bootstrap Modal -->
									<div class="modal fade"
										id="imageModalreplynotlogged-<?= $commentreplynotlogged->replyID ?>"
										tabindex="-1"
										aria-labelledby="imageModalLabel-<?= $commentreplynotlogged->replyID ?>"
										aria-hidden="true">
										<div class="modal-dialog modal-dialog-fullscreen">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title"
														id="imageModalLabel-<?= $commentreplynotlogged->replyID ?>">
														Image</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal"
														aria-label="Close"></button>
												</div>
												<div
													class="modal-body d-flex justify-content-center align-items-center">
													<img src="<?= $imageSrcnotloggedreply ?>"
														class="img-fluid" alt="comment reply photo">
												</div>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<div class="mb-2">
										<h5 class="m-0">
											<?= htmlspecialchars($commentreplynotlogged->namereply, ENT_QUOTES, 'UTF-8') ?>
										</h5>
										<span
											class="me-3 small"><?= date('F j, Y \a\t g:i a', strtotime($commentreplynotlogged->CreatedAt)) ?></span>
									</div>
								</div>
							</div>

							<!-- Comment children level 2 end -->

							<?php endif; ?>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
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





				<?php if ($ses->isLoggedIn()): ?>
				<!-- Reply START -->
				<div>
					<h3>Leave a reply</h3>
					<small>Your email address will not be published. Required fields are marked
						<span class="text-danger">*</span>
					</small>
					<form id="addBlogCommentForm" method="post" enctype="multipart/form-data">
						<input type="hidden" name="form_type" value="add_blog_comment">


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
				<!-- Reply END -->
				<?php else: ?>
				<!-- Reply START -->
				<div>
					<h3>Leave a reply</h3>
					<small>Your email address will not be published. Required fields are marked
						<span class="text-danger">*</span>
					</small>
					<form id="addBlogCommentNotLoggedInForm" method="post" enctype="multipart/form-data">
						<input type="hidden" name="form_type" value="add_blog_comment_not_logged_in">

						<div class="col-md-6">
							<label class="form-label">Name
								<span class="text-danger">*</span>
							</label>
							<input name="name" type="text" class="form-control">
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
						<p class="text-danger">
							You are currently not logged in. You may not have control over this comment in the future
							after you terminate this session. Please <a
								href="<?=ROOT?>Login">log in</a> to
							have lifetime control of this comment.
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