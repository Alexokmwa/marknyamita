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
									<form id="replyFormreply" class="row g-3 mt-2" method="post"
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
											<textarea name="Contentreply" class="form-control" rows="3"></textarea>
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
											<textarea name="Contentreply" class="form-control" rows="3"></textarea>
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
								</div>
								<!-- Reply Form End -->
							</div>
						</div>
						<!-- Comment children level 2 end -->
						<?php endforeach; ?>
						<?php endif; ?>