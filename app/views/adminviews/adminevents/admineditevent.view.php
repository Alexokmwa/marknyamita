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
					<h1 class="mb-0 h2">Create an event</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Chart START -->
					<div class="card border">
						<!-- Card body -->
						<div class="card-body">
							<!-- Form START -->
							<?php if (isset($rowpost) && is_object($rowpost)): ?>
							<form id="postForm" method="post" enctype="multipart/form-data">
								<!-- Main form -->
								<div class="row">
									<div class="col-12">
										<!-- event name name -->
										<div class="mb-3">
											<label class="form-label">Event name</label>
											<input id="eventname" type="text" class="form-control"
												value="<?= old_value('eventname', esc($rowpost->eventname) ?? '') ?>"
												name="eventname">
											<div class="text-danger" id="eventnameError">
												<?= $admin->getError('eventname') ?>
											</div>
										</div>
										<!-- event name name end -->
									</div>
									<!-- event posta start -->
									<div class="col-lg-7">
										<div class="mb-3">
											<!-- Image -->
											<div class="position-relative">
												<h6 class="my-2">
													Upload event graphic here, or
													<a href="#!" class="text-primary">Browse</a>
												</h6>
												<label class="w-100" style="cursor:pointer;">
													<span>
														<input onchange="display_image(this.files[0])"
															class="form-control stretched-link" type="file" id="image"
															value="<?= old_value('eventimage', ) ?>"
															name="eventimage">
													</span>
													<div>
														<img src="<?= get_imageadmin($rowpost->eventimage) ?>"
															alt="img" class="img-thumbnail js-image-preview"
															style="height:auto;width:200px;">
													</div>
												</label>
											</div>
											<div class="text-danger" id="eventimageError">
												<?=$admin->getError('eventimage') ?>
											</div>
											<p class="small mb-0 mt-2">
												<b>Note:</b> Only JPG, JPEG and PNG. Our suggested dimensions are 600px
												* 450px. Larger image will be cropped to 4:3 to fit our
												thumbnails/previews.
											</p>
										</div>
									</div>
									<!-- event posta end -->
									<!-- event category  start -->
									<div class="col-lg-5">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">Event Category</label>
											<select class="form-select" id="categorySelect" name="categoryname"
												aria-label="Default select example" required>
												<option value="" disabled selected>--Select--</option>
												<?php if (is_array($data['row']) && count($data['row'])): ?>
												<?php foreach ($data['row'] as $row): ?>
												<option
													value="<?= esc($row->categoryname) ?>"
													data-id="<?= esc($row->categoryID) ?>"
													<?= old_value('categoryname', esc($rowpost->category)) === esc($row->categoryname) ? 'selected' : '' ?>>
													<?= esc($row->categoryname) ?>
												</option>
												<?php endforeach; ?>
												<?php endif; ?>
											</select>
											<input type="hidden" id="categoryID" name="categoryID"
												value="<?= old_value('categoryID', $rowpost->categoryID) ?>">
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
									<!-- event  category end -->
									<!-- event location-->
									<div class="col-lg-6">
										<!-- eventlocation -->
										<div class="mb-3">
											<label class="form-label">location</label>
											<textarea class="form-control" rows="1" name="eventlocation"
												placeholder="business, sports ..."><?= old_value('eventlocation', esc($rowpost->eventlocation)) ?></textarea>
											<div class="text-danger" id="eventlocationError">
												<?= $admin->getError('eventlocation') ?>
											</div>
											<small>Maximum of 14 keywords. Keywords should all be in lowercase and
												separated by commas. e.g. javascript, react, marketing.</small>
										</div>
									</div>
									<!-- event location-->
									<!-- event status start -->
									<div class="col-lg-6">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">status</label>
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
									<!-- event status end -->
									<!-- event type start -->
									<div class="col-lg-6">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">event type</label>
											<select class="form-select" id="eventList" name="eventtype">
												<option value="" disabled <?= old_value('eventtype') == '' ? 'selected' : '' ?>>Type
													of event</option>
												<option value="Conferences" <?= ($rowpost->eventtype == 'Conferences') ? 'selected' : '' ?>>Conferences
												</option>
												<option value="Online" <?= ($rowpost->eventtype == 'Online') ? 'selected' : ''  ?>>Online
												</option>
												<option value="Livestream" <?= ($rowpost->eventtype == 'Livestream') ? 'selected' : '' ?>>Livestream
												</option>
												<option value="Video" <?= ($rowpost->eventtype == 'Video') ? 'selected' : ''?>>Video
												</option>
											</select>
											<div class="text-danger" id="eventtypeError">
												<?= $admin->getError('eventtype') ?>
											</div>
										</div>
									</div>
									<!-- event type end -->
									<!-- event schedule start -->
									<div class="col-lg-6">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">event schedule</label>
											<select class="form-select" id="eventList" name="eventschedule">
												<option value="" disabled <?= old_value('eventschedule') == '' ? 'selected' : '' ?>>event
													schedule</option>
												<option value="Past" <?= ($rowpost->eventschedule == 'Past') ? 'selected' : ''?>>Past
												</option>
												<option value="current" <?= ($rowpost->eventschedule == 'current') ? 'selected' : '' ?>>current
												</option>
												<option value="upcomming" <?= ($rowpost->eventschedule == 'upcomming') ? 'selected' : '' ?>>upcomming
												</option>
											</select>
											<div class="text-danger" id="eventscheduleError">
												<?= $admin->getError('eventschedule') ?>
											</div>
										</div>
									</div>
									<!-- event schedule end -->
									<!-- event start time start-->
									<div class="col-lg-6">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">start time</label>


											<input type="time" class="form-control" id="timeInput" name="timestart"
												value="<?=$rowpost->timestart?>"
												required>

											<div class="text-danger" id="timestartError">
												<?= $admin->getError('timestart') ?>
											</div>
										</div>
									</div>
									<!-- event start time end -->
									<!-- event end time start-->
									<div class="col-lg-6">
										<!-- Category -->
										<div class="mb-3">
											<label class="form-label">End time</label>


											<input type="time" class="form-control" id="timeInput" name="endtime"
												value="<?=$rowpost->endtime?>"
												required>

											<div class="text-danger" id="endtimeError">
												<?= $admin->getError('endtime') ?>
											</div>
										</div>
									</div>
									<!-- event end time end -->
									<!-- event date start -->
									<div class="col-lg-6">
										<!-- Category -->
										<div class="mb-3">

											<label for="dateInput" class="form-label">Select Date</label>
											<input type="date" class="form-control" id="dateInput" name="eventdate"
												value="<?=$rowpost->eventdate?>"
												required>
											<div class="text-danger" id="eventdateError">
												<?= $admin->getError('eventdate') ?>
											</div>
										</div>
									</div>
									<!-- event date end -->
									<!-- event date end -->
									<div class="col-6">
										<!-- event charges -->
										<div class="mb-3">
											<label class="form-label">Event charges</label>
											<input id="eventcharges" type="text" class="form-control"
												value="<?= old_value('eventcharges', $rowpost->eventcharges) ?>"
												name="eventcharges">
											<div class="text-danger" id="eventchargesError">
												<?= $admin->getError('eventcharges') ?>
											</div>
										</div>
										<!-- event charges end -->
									</div>
									<!-- edit area START -->
									<div class="col-12">
										<label class="form-label">eventdescription <i class="text-danger">do not
												input same image
												twice</i></label>
										<textarea id="summernote" class="form-control" rows="8"
											name="eventdescription"><?= old_value('eventdescription', add_root_to_images($rowpost->eventdescription))?></textarea>
									</div>
									<div class="text-danger" id="eventdescriptionError">
										<?= $admin->getError('eventdescription') ?>
									</div>

									<!-- edit area end -->

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


									<!-- Create post button -->
									<div class="col-md-12 text-start">
										<button class="btn btn-primary w-100" type="submit">Edit event</button>
									</div>
								</div>
							</form>
							<?php endif?>
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