<?php
/**
 * header nav file combined inclusion.
 */
renderpageHeader();
?>
</header>
<main>

	<div class="pattern-square"></div>
	<!--Back to page start-->
	<section class="py-5 py-lg-8">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="<?=ROOT?>Events"
						class="text-reset icon-link icon-link-hover">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
							class="bi bi-arrow-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd"
								d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
						</svg>
						back to events
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--Back to page end-->
	<!--Digital experience start-->
	<?php if (!empty($eventpost)): ?>

	<section class="mb-xl-9">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mb-6">
						<h1 class="mb-0"><?=$eventpost->eventname?>
						</h1>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-7 col-md-12">
					<figure>
						<img src="<?=ROOTADMIN .$eventpost->eventimage?>"
							class="img-fluid rounded-3 shadow-sm" alt="events" />
					</figure>
				</div>
				<div class="col-lg-4 offset-lg-1 col-md-12">
					<div class="d-flex pt-4 pt-lg-0 pb-5">
						<div
							class="icon-md icon-shape rounded-circle bg-body-tertiary bg-opacity-50 border mb-3 flex-shrink-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
								<path
									d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
							</svg>
						</div>

						<div class="ms-3">
							<h5>Location</h5>
							<p class="mb-0">
								<?=$eventpost->eventlocation?>
							</p>
						</div>
					</div>

					<div class="d-flex border-1 border-top-dashed border-secondary border-opacity-25 py-5">
						<div
							class="icon-md icon-shape rounded-circle bg-body-tertiary bg-opacity-50 border mb-3 flex-shrink-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-window-dock" viewBox="0 0 16 16">
								<path
									d="M3.5 11a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm4.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
								<path
									d="M14 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h12ZM2 14h12a1 1 0 0 0 1-1V5H1v8a1 1 0 0 0 1 1ZM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2Z" />
							</svg>
						</div>
						<div class="ms-3">
							<h5>Date and time</h5>
							<?php
                                // Convert time to East African Time (EAT)
                                $datetime = new DateTime($eventpost->timestart, new DateTimeZone('UTC')); // Assuming 'timestart' is stored in UTC
	    $datetime->setTimezone(new DateTimeZone('Africa/Nairobi'));
	    $eventTimeEAT = $datetime->format('g:iA T');
	    // Convert time to East African Time (EAT)
	    $datetimeend = new DateTime($eventpost->endtime, new DateTimeZone('UTC')); // Assuming 'timestart' is stored in UTC
	    $datetimeend->setTimezone(new DateTimeZone('Africa/Nairobi'));
	    $eventTimeEATend = $datetimeend->format('g:iA T');
	    ?>

							<p class="mb-0">
								<?php echo htmlspecialchars(date('F j, Y', strtotime($eventpost->eventdate))); ?>
								<?php echo htmlspecialchars($eventTimeEAT); ?>
								-
								<?php echo htmlspecialchars($eventTimeEATend); ?>
							</p>
						</div>
					</div>
					<div class="d-flex border-1 border-top-dashed border-secondary border-opacity-25 py-5">
						<div
							class="icon-md icon-shape rounded-circle bg-body-tertiary bg-opacity-50 border mb-3 flex-shrink-0">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
								class="bi bi-ticket-detailed-fill" viewBox="0 0 16 16">
								<path
									d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5Zm4 1a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5Zm0 5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5ZM4 8a1 1 0 0 0 1 1h6a1 1 0 1 0 0-2H5a1 1 0 0 0-1 1Z" />
							</svg>
						</div>
						<div class="ms-3">
							<h5>Event charges</h5>
							<p class="mb-0"><?=$eventpost->eventcharges?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-7 col-md-12 order-2">
					<h2 class="mb-4">Event About</h2>
					<p><?=add_root_to_images($eventpost->eventdescription)?>
					</p>


				</div>
				<div class="col-lg-4 offset-lg-1 col-md-12 order-lg-2">
					<div class="card shadow-sm">
						<div class="card-body">
							<div class="mb-6 text-center">
								<h3 class="mb-0">Register for our next live group demo session</h3>
							</div>
							<form class="row g-3 needs-validation" novalidate method="post">
    <div class="col-md-12">
        <label for="eventFirstNameInput" class="form-label">
            First Name <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" id="eventFirstNameInput" name="first_name" required />
        <div class="invalid-feedback">Please enter your first name.</div>
    </div>
    <div class="col-md-12">
        <label for="eventLastNameInput" class="form-label">
            Last Name <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" id="eventLastNameInput" name="last_name" required />
        <div class="invalid-feedback">Please enter your last name.</div>
    </div>
    <div class="col-md-12">
        <label for="eventEmailInput" class="form-label">
            Email <span class="text-muted">(optional)</span>
        </label>
        <input type="email" class="form-control" id="eventEmailInput" name="email" />
        <div class="invalid-feedback">Please enter a valid email address.</div>
    </div>
    <div class="col-md-12">
        <label for="eventPhoneInput" class="form-label">
            Phone Number <span class="text-danger">*</span>
        </label>
        <input type="tel" class="form-control" id="eventPhoneInput" name="phone_number" required />
        <div class="invalid-feedback">Please enter your phone number.</div>
    </div>
    <div class="col-md-12">
        <label for="eventCountyInput" class="form-label">
            County <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" id="eventCountyInput" name="county" required />
        <div class="invalid-feedback">Please enter your county.</div>
    </div>
    <div class="col-md-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="termsCheck" name="agree_terms" required />
            <label class="form-check-label ms-2 fs-6" for="termsCheck">
                By continuing, you agree to our <a href="#">Terms of Use</a> and have read our <a href="#">Privacy Policy</a>.
            </label>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
    </div>
    <div class="d-grid">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif?>
	<!--Digital experience end-->
</main>



<?php
/**
 * html footer function
 */
rendermainFooter();

renderHtmlFooter();
rendersmfooter();
?>