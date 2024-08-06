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
											<label class="form-label">Short description </label>
											<textarea class="form-control" rows="3" placeholder="Add description"
												name="shortdescription"><?= old_value('shortdescription') ?></textarea>
											<div class="text-danger" id="shortdescriptionError">
												<?= $admin->getError('shortdescription') ?>
											</div>
										</div>
									</div>
									<!-- Short description end -->

									<!-- Quill start -->
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
												<!-- Quill editor content will be initialized here -->
												<?= old_value('postbody') ?>
											</div>
											<input type="hidden" name="postbody" id="quilleditor-input">
										</div>

										<div class="text-danger" id="postbodyError">
											<?= $admin->getError('postbody') ?>
										</div>
									</div>
									<!-- End Quill -->

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
															alt="img" class="img-thumbnail js-image-preview" style="height:auto;width:200px;">
													</div>
												</label>
											</div>
											<div class="text-danger" id="imageurlError">
												<?= $admin->getError('imageurl') ?>
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
											<select class="form-select" name="category"
												aria-label="Default select example" required>
												<option value="" disabled selected>--Select--</option>
												<?php if (is_array($data['row']) && count($data['row'])): ?>
												<?php foreach ($data['row'] as $row): ?>
												<option
													value="<?= esc($row->categoryname) ?>"
													<?= old_value('category') === esc($row->categoryname) ? 'selected' : '' ?>>
													<?= esc($row->categoryname) ?>
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
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">status</label>
											<select class="form-select" name="status"
												aria-label="Default select example" required>
												<option value="" disabled selected>--Select--</option>

												<option value="live">live</option>
												<option value="draft">draft</option>
												<option value="removed">removed</option>


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
	var quill = new Quill('#quilleditor', {
		modules: {
			toolbar: '#quilltoolbar'
		},
		theme: 'snow'
	});

	// Load old value into the Quill editor if available
	var
		oldPostBody = <?= json_encode(old_value('postbody', '')) ?> ;
	if (oldPostBody) {
		quill.setContents(JSON.parse(oldPostBody));
	}

	document.querySelector('#postForm').onsubmit = function() {
		// Clean up the content: remove empty <p> tags
		// Extract HTML content from Quill editor
		var postbody = quill.root.innerHTML;
		postbody = postbody.replace(/<p>\s*<\/p>/g, '');
		// Optionally, remove all HTML tags
		postbody = quill.getText(); // Use plain text if you prefer
		document.getElementById('quilleditor-input').value = postbody;
	};
</script>