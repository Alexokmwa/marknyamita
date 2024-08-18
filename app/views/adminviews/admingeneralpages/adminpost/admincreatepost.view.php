<?php
/**
 * header nav file combined inclusion.
 */


adminrenderpageHeader();
?>

<!-- <h1 class="myclassmargintop">admin create POST</h1> -->
<!-- **************** MAIN CONTENT START **************** -->
<main class="mysmbottomspace">

	<!-- =======================
    Main contain START -->
	<section class="py-4">
		<div class="container">
			<div class="row pb-4">
				<div class="col-12">
					<!-- Title -->
					<h1 class="mb-0 h2">Create a post</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Chart START -->
					<div class="card border">
						<!-- Card body -->
						<div class="card-body">
							<!-- Form START -->
							<form id="postForm" method="post" enctype="multipart/form-data">
								<!-- Main form -->
								<div class="row">
									<div class="col-12">
										<!-- Post name -->
										<div class="mb-3">
											<label class="form-label">Post name</label>
											<input id="postName" type="text" class="form-control"
												value="<?= old_value('postname') ?>"
												name="postname">
											<div class="text-danger" id="postnameError">
												<?= $admin->getError('postname') ?>
											</div>
										</div>
										<!-- Post name end -->
									</div>

									<!-- Post type START -->
									<div class="col-12 ">
										<div class="mb-3">
											<label class="form-label">Post type</label>
											<div class="d-flex flex-wrap gap-3 border border-primary p-2 rounded">
												<!-- Post type item -->
												<div class="flex-fill">
													<input type="radio" class="btn-check" name="posttype" id="option"
														value="1"
														<?= old_checked('posttype', 1) ?>
													required checked>
													<label class="btn btn-outline-light w-100" for="option">
														<div class="text-danger" id="posttypeError">
															<?= $admin->getError('posttype') ?>
														</div>
														<i class="bi bi-chat-left-text fs-1"></i>
														<span class="d-block"> Post </span>
													</label>
												</div>
											</div>
										</div>
									</div>
									<!-- Post type END -->

									<!-- Short description -->
									<div class="col-12">
										<div class="mb-3">
											<label class="form-label">Short description ></label>
											<textarea class="form-control" rows="3" placeholder="Add description"
												name="shortdescription"><?= old_value('shortdescription') ?></textarea>
											<div class="text-danger" id="shortdescriptionError">
												<?= $admin->getError('shortdescription') ?>
											</div>
										</div>
									</div>
									<!-- Short description end -->

									<!-- edit area start -->
									<div class="col-12">
										<label class="form-label">postbody <i class="text-danger">do not
												input same image
												twice</i> </label>
										<textarea id="summernote" class="form-control" rows="8"
											name="postbody"><?= old_value('postbody') ?></textarea>
									</div>
									<div class="text-danger" id="postbodyError">
										<?= $admin->getError('postbody') ?>
									</div>

									<!-- edit area end -->

									<div class="col-lg-7">
										<div class="mb-3">
											<!-- Image -->
											<div class="position-relative">
												<h6 class="my-2">
													Upload post image here, or
													<a href="#!" class="text-primary">Browse</a>
												</h6>
												<label class="w-100" style="cursor:pointer;">
													<span>
														<input onchange="display_image(this.files[0])"
															class="form-control stretched-link" type="file" id="image"
															value="<?= old_value('imageurl') ?>"
															name="imageurl">
													</span>
													<div>
														<img src="<?= get_imageadmin() ?>"
															alt="img" class="img-thumbnail js-image-preview"
															style="height:auto;width:200px;">
													</div>
												</label>
											</div>
											<div class="text-danger" id="imageurlError">
												<?=$admin->getError('imageurl') ?>
											</div>
											<p class="small mb-0 mt-2">
												<b>Note:</b> Only JPG, JPEG and PNG. Our suggested dimensions are 600px
												* 450px. Larger image will be cropped to 4:3 to fit our
												thumbnails/previews.
											</p>
										</div>
									</div>
									<div class="col-lg-5">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">Category</label>
											<select class="form-select" id="categorySelect" name="categoryname"
												aria-label="Default select example" required>
												<option value="" disabled selected>--Select--</option>
												<?php if (is_array($data['row']) && count($data['row'])): ?>
												<?php foreach ($data['row'] as $row): ?>
												<?php if ($row->categorystatus === 'active'): ?>
												<option
													value="<?= esc($row->categoryname) ?>"
													data-id="<?= esc($row->categoryID) ?>"
													<?= old_value('categoryname') === esc($row->categoryname) ? 'selected' : '' ?>>
													<?= esc($row->categoryname) ?>
												</option>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
											<input type="hidden" id="categoryID" name="categoryID"
												value="<?= old_value('categoryID') ?>">
											<div class="text-danger" id="categoryError">
												<?=$admin->getError('category') ?>
											</div>
										</div>
									</div>

									<script>
										document.getElementById('categorySelect').addEventListener('change', function() {
											var selectedOption = this.options[this.selectedIndex];
											var selectedCategoryID = selectedOption.getAttribute('data-id');
											document.getElementById('categoryID').value = selectedCategoryID;
										});
									</script>

									<div class="col-lg-7">
										<!-- Tags -->
										<div class="mb-3">
											<label class="form-label">Tags</label>
											<textarea class="form-control" rows="1" name="tags"
												placeholder="business, sports ..."><?= old_value('tags') ?></textarea>
											<div class="text-danger" id="tagsError">
												<?= $admin->getError('tags') ?>
											</div>
											<small>Maximum of 14 keywords. Keywords should all be in lowercase and
												separated by commas. e.g. javascript, react, marketing.</small>
										</div>
									</div>
									<div class="col-lg-5">

										<div class="mb-3">
											<label class="form-label">status</label>
											<select class="form-select" name="status"
												aria-label="Default select example" required>
												<option value="" disabled selected>--Select--</option>
												<option value="live" <?= old_value('status') == 'live' ? 'selected' : '' ?>>live
												</option>
												<option value="draft" <?= old_value('status') == 'draft' ? 'selected' : '' ?>>draft
												</option>
												<option value="removed" <?= old_value('status') == 'removed' ? 'selected' : '' ?>>removed
												</option>
											</select>
											<div class="text-danger" id="statusError">
												<?= $admin->getError('status') ?>
											</div>
										</div>
									</div>

									<div class="col-12">
										<div class="form-check mb-3">
											<input class="form-check-input" type="checkbox" name="featured"
												id="postCheck" value="1"
												<?= old_checked('featured', 1) ?>>
											<div class="text-danger" id="featuredError">
												<?= $admin->getError('featured') ?>
											</div>
											<label class="form-check-label" for="postCheck">
												Make this post featured? a featured post category appears as a trending
												topic
											</label>
										</div>
									</div>


									<!-- Create post button -->
									<div class="col-md-12 text-start">
										<button class="btn btn-primary w-100" type="submit">Create post</button>
									</div>
								</div>
							</form>
							<!-- Form END -->
						</div>
					</div>
					<!-- Chart END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
    Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
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
adminrendersmfooter();
adminrenderHtmlFooter();
?>

<script>
	$('#summernote').summernote({
		placeholder: 'Post content',
		tabsize: 2,
		height: 300,
		dialogsInBody: true, // This option appends dialogs to the body instead of the summernote container
	});
</script>