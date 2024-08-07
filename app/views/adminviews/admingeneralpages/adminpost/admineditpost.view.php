<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();
?>

<!-- **************** MAIN CONTENT START **************** -->
<main>
	<!-- =======================
Post edit START -->
	<section class="py-4">
		<div class="container">
			<div class="row pb-4">
				<div class="col-12">
					<!-- Title -->
					<h1 class="mb-0 h2">Edit post</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Chart START -->
					<div class="card border h-100">
						<!-- Card body -->
						<div class="card-body">
							<!-- Form START -->
							<?php if (isset($rowpost) && is_object($rowpost)): ?>
							<form id="postForm" method="post" enctype="multipart/form-data">
								<!-- Main form -->
								<div class="row">
									<div class="col-12">
										<!-- Post name -->
										<div class="mb-3">
											<label class="form-label">Post name</label>
											<input required id="con-name" name="postname" type="text"
												class="form-control"
												value="<?=old_value('postname', esc($rowpost->postname) ?? '')?>">
											<div class="text-danger" id="postnameError">
												<?= $admin->getError('postname') ?>
											</div>
										</div>
									</div>
									<!-- Post type START -->
									<div class="col-12">
										<div class="mb-3">
											<label class="form-label">Post type</label>
											<div class="d-flex flex-wrap gap-3">
												<!-- Post type item -->
												<div class="flex-fill">
													<input type="radio" class="btn-check" name="posttype" id="option"
														value="1"
														<?= old_checked('posttype', 1) ?>
													required checked>
													<label class="btn btn-outline-light w-100" for="option">
														<i class="bi bi-chat-left-text fs-1"></i>
														<span class="d-block"> Post </span>
													</label>
													<div class="text-danger" id="posttypeError">
														<?= $admin->getError('posttype') ?>
													</div>
												</div>
												<!-- Post type item end -->
											</div>
										</div>
									</div>
									<!-- Post type END -->

									<!-- Short description -->
									<div class="col-12">
										<div class="mb-3">
											<label class="form-label" name="shortdescription">Short description </label>
											<textarea class="form-control"
												rows="3"><?= old_value('shortdescription', esc($rowpost->shortdescription) ?? '') ?></textarea>
											<div class="text-danger" id="shortdescriptionError">
												<?= $admin->getError('shortdescription') ?>
											</div>
										</div>
									</div>

									<!-- Main toolbar -->
									<div class="col-md-12">
										<!-- Subject -->
										<div class="mb-3">
											<label class="form-label">Post body</label>
											<!-- Editor toolbar -->
											<div class="bg-light border border-bottom-0 rounded-top py-3"
												id="quilltoolbar">
												<span class="ql-formats">
													<select class="ql-size"></select>
												</span>
												<span class="ql-formats">
													<button class="ql-bold"></button>
													<button class="ql-italic"></button>
													<button class="ql-underline"></button>
													<button class="ql-strike"></button>
												</span>
												<span class="ql-formats">
													<select class="ql-color"></select>
													<select class="ql-background"></select>
												</span>
												<span class="ql-formats">
													<button class="ql-code-block"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-list" value="ordered"></button>
													<button class="ql-list" value="bullet"></button>
													<button class="ql-indent" value="-1"></button>
													<button class="ql-indent" value="+1"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-link"></button>
													<button class="ql-image"></button>
												</span>
												<span class="ql-formats">
													<button class="ql-clean"></button>
												</span>
											</div>
											<!-- Main toolbar -->
											<div class="bg-body border rounded-bottom h-300 overflow-hidden"
												id="quilleditor">
												<?= old_value('postbody', esc($rowpost->postbody) ?? '')?>
											</div>

											<input type="hidden" name="postbody" id="quilleditor-input"
												value="<?=old_value('postbody', esc($rowpost->postbody) ?? '')?>">

										</div>
									</div>
									<div class="col-lg-7 mt-4">
										<div class="mb-3">
											<!-- Image -->
											<div class="row align-items-center mb-2">
												<div class="col-4 col-md-2">
													<div class="position-relative">
														<?php
                    $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
							    // Check if the image URL is correctly formatted
							    // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
							    ?>
														<span>current photo</span>
														<img class="rounded"
															src="<?=get_imageadmin($rowpost->imageurl, 'post')?>"
															alt="edit photo">
														<div class="position-absolute top-0 end-0 mt-n2 me-n2">
															<a class="btn btn-icon btn-xs btn-danger" href="#"><i
																	class="bi bi-x"></i></a>
														</div>
													</div>
												</div>
												<div class="col-sm-8 col-md-10 position-relative">
													<h6 class="my-2">Edit blog image </h6>
													<label class="w-100" style="cursor:pointer;">
														<span>
															<input onchange="display_image(this.files[0])"
																class="form-control stretched-link" type="file"
																name="imageurl" id="image"
																value="<?= old_value('imageurl') ?>">
														</span>
														<div>
															<img src=" <?=get_imageadmin($rowpost->imageurl, 'post')?>"
																alt="img" class="img-thumbnail js-image-preview"style="height:auto;width:200px;">
														</div>
													</label>
												</div>


											</div>
											<div class="text-danger" id="imageurlError">
												<?= $admin->getError('imageurl') ?>
											</div>
											<p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our
												suggested dimensions are 600px * 450px. Larger image will be cropped to
												4:3 to fit our thumbnails/previews.</p>
										</div>
									</div>
									<div class="col-lg-5 mt-4">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">Category</label>
											<select class="form-select" name="category"
												aria-label="Default select example">
												<option value="" disabled>--Select--</option>
												<?php if (isset($data['row']) && is_array($data['row']) && count($data['row'])): ?>
												<?php foreach ($data['row'] as $category): ?>
												<option
													value="<?= esc($category->categoryname) ?>"
													<?=old_value('category') === esc(($rowpost->category == $category->categoryname)) ? 'selected' : '' ?>>
													<?= esc($category->categoryname) ?>
												</option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
											<div class="text-danger" id="categoryError">
												<?= $admin->getError('category') ?>
											</div>
										</div>
									</div>
									<div class="col-lg-7">
										<!-- Tags -->
										<div class="mb-3">
											<label class="form-label">Tags</label>
											<textarea class="form-control"
												rows="1"><?=old_value('tags', esc($rowpost->tags) ?? '') ?></textarea>
											<div class="text-danger" id="tagsError">
												<?= $admin->getError('tags') ?>
											</div>
											<small>Maximum of 14 keywords. Keywords should all be in lowercase and
												separated by commas. e.g. javascript, react, marketing.</small>
										</div>
									</div>
									<div class="col-lg-5">
										<!-- Status -->
										<div class="mb-3">
											<label class="form-label">Status</label>
											<select class="form-select" name="status"
												aria-label="Default select example">
												<option value="live" <?= ($rowpost->status == 'live') ? 'selected' : '' ?>>Live
												</option>
												<option value="draft" <?= ($rowpost->status == 'draft') ? 'selected' : '' ?>>Draft
												</option>
												<option value="removed" <?= ($rowpost->status == 'removed') ? 'selected' : '' ?>>Removed
												</option>
											</select>
											<div class="text-danger" id="statusError">
												<?= $admin->getError('status') ?>
											</div>
										</div>
									</div>

									<!-- Checkbox -->
									<!-- Featured checkbox -->
									<div class="col-12">
										<div class="form-check mb-3">
											<input class="form-check-input" type="checkbox" name="featured"
												id="postCheck" value="1"
												<?= old_checked('featured', 1), ($rowpost->featured) ? 'checked' : '' ?>>
											<div class="text-danger" id="featuredError">
												<?= $admin->getError('featured') ?>
											</div>
											<label class="form-check-label" for="postCheck">
												Make this post featured?
											</label>
										</div>
									</div>
									<!-- Crate post button -->
									<div class="col-md-12 text-start">
										<button class="btn btn-primary" type="submit">Save changes</button>
										<!-- <button class="btn btn-danger" type="submit">Delete post</button> -->
									</div>
								</div>
							</form>
							<?php endif; ?>
							<!-- Form END -->
						</div>
					</div>
					<!-- Chart END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Post edit END -->

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
adminrendersmfooter();
adminrenderHtmlFooter();
?>
<script>
	var quill = new Quill('#quilleditor', {
		modules: {
			toolbar: '#quilltoolbar'
		},
		theme: 'snow'
	});

	// Load old value into the Quill editor if available
	var
		oldPostBody = <?= json_encode(old_value('postbody', esc($rowpost->postbody) ?? '')) ?> ;
	if (oldPostBody) {
		quill.clipboard.dangerouslyPasteHTML(oldPostBody);
	}

	document.querySelector('#postForm').onsubmit = function() {
		// Extract HTML content from Quill editor
		var postbody = quill.root.innerHTML;
		postbody = postbody.replace(/<p>\s*<\/p>/g, '');
		// Optionally, remove all HTML tags
		postbody = quill.getText(); // Use plain text if you prefer
		document.getElementById('quilleditor-input').value = postbody;
	};
</script>