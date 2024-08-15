<?php
/**
 * header nav file combined inclusion.
 */
renderpageHeader();
?>
<nav class="myclassallignsecondnav navbar navbar-expand-xl navbar-light navbar-sticky header-static pt-2">
	<div class="container-fluid">

		<ul class="navbar-nav  navbar-nav-scroll mx-auto d-flex flex-row flex-nowrap">
			<!-- Nav Search -->
			<li class="nav-item  me-3"><a class="nav-link"
					href="<?=ROOT?>Currentevents#Current"></i>current</a>
			</li>
			<li class="nav-item me-3"><a class="nav-link"
					href="<?=ROOT?>Upcommingevents#Upcomming"></i>upcomming</a>
			</li>
			<li class="nav-item me-3"><a class="nav-link"
					href="<?=ROOT?>Events#All"></i>All</a></li>
			<li class="nav-item me-3"><a class="nav-link"
					href="<?=ROOT?>Pastevents#Past"></i>past</a></li>

			</a></li>
		</ul>
		<div class="nav-item dropdown nav-search dropdown-toggle-icon-none d-md-none">
			<a class="nav-link pe-0 dropdown-toggle" role="button" href="#" id="navSearch" data-bs-toggle="dropdown"
				aria-expanded="false">
				<i class="bi bi-search fs-4"> </i>
			</a>
			<div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navSearch">
				<form class="input-group">
					<input class="form-control border-success" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-success m-0" type="submit">Search</button>
				</form>
			</div>
		</div>
	</div>
</nav>

</header>
<!-- =======================
Header END -->
<!-- **************** MAIN CONTENT START **************** -->
<main>
	<div class="pattern-square"></div>
	<!--Pageheader start-->
	<section class="py-5 py-lg-8">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-12">
					<div class="text-center">
						<h1 class="mb-3">Nyamita conferences, meetups, and events</h1>
						<p class="mb-0">Meet and converse with naymita team in uriri matters</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php if (is_array($data['eventpost']) && count($data['eventpost'])): ?>
	<section class="mb-xl-9 my-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="swiper sliderSwiper">
						<div class="swiper-wrapper pb-7">
							<?php foreach ($data['eventpost'] as $eventpost): ?>
							<?php if ($eventpost->status === "live" && $eventpost->eventschedule === 'upcomming'): ?>
							<div class="swiper-slide">
								<div class="card shadow-sm overflow-hidden">
									<div class="row g-0">
										<div class="col-xl-6 col-md-6">
											<div class="card-body h-100 d-flex align-items-start flex-column p-lg-7">
												<div class="mb-3">
													<small
														class="text-uppercase fw-semibold ls-md"><?=$eventpost->eventtype?></small>
													<h2 class="mb-0 mt-3"><a href="#"
															class="text-reset"><?=$eventpost->eventname?></a>
													</h2>
												</div>
												<div class="mb-5">
													<small
														class="me-2"><?=get_date($eventpost->eventdate)?></small>
												</div>
												<div class="mt-auto">
													<a href="<?=ROOT?>Sigleevent/<?=$eventpost->eventID?>"
														class="icon-link icon-link-hover card-link">
														Mode Details
														<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
															fill="currentColor" class="bi bi-arrow-right"
															viewBox="0 0 16 16">
															<path fill-rule="evenodd"
																d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
															</path>
														</svg>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-6" style="
																background-image: url(<?=ROOTADMIN .$eventpost->eventimage?>);
																background-size: cover;
																background-repeat: no-repeat;
																background-position: center;
																min-height: 15rem;
															">
											<!-- for mobile img-->
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
						</div>

						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Upcomming events start-->
	<section class="mb-xl-9 my-3" id="Upcomming">
		<div class="container">
			<div class="row mb-4">
				<div class="col-lg-12">
					<div class="mb-4">
						<h3 class="mb-4">Upcomming Events</h3>
					</div>
				</div>

				<div class="col-lg-6 col-md-10 col-12">
					<div class="row g-3 align-items-center">
						<div class="col-lg-6 col-md-6 col-12">
							<label for="eventList" class="form-label visually-hidden">Search Category</label>
							<select class="form-select" id="eventList">
								<option selected disabled value="">Type of event</option>
								<option value="Conferences">Conferences</option>
								<option value="Online">Online</option>
								<option value="Livestream">Livestream</option>
								<option value="Video">Video</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="row g-5 mb-4"> <!-- Single row for all cards with spacing -->
				<?php foreach ($data['eventpost'] as $eventpost): ?>
				<?php if ($eventpost->status === "live" && $eventpost->eventschedule === 'upcomming'): ?>
				<div class="col-md-6">
					<div class="card shadow-sm h-100 border-0 card-lift overflow-hidden">
						<div class="row h-100 g-0">
							<a href="<?=ROOT?>Sigleevent/<?=$eventpost->eventID?>"
								class="col-lg-5 col-md-12" style="
                                background-image: url('<?=ROOTADMIN .$eventpost->eventimage?>');
                                background-size: cover;
                                background-repeat: no-repeat;
                                background-position: center;
                                min-height: 13rem;
                            "></a>
							<div class="col-lg-7 col-md-12">
								<div
									class="card-body h-100 d-flex align-items-start flex-column border rounded-end-lg-3 rounded-bottom-3 rounded-top-0 rounded-start-lg-0 border-start-lg-0 border-top-0 border-top-lg">
									<div class="mb-3">
										<small
											class="text-uppercase fw-semibold ls-md"><?php echo htmlspecialchars($eventpost->category); ?></small>
										<h4 class="my-1"><a
												href="<?=ROOT?>Sigleevent/<?=$eventpost->eventID?>"
												class="text-reset"><?php echo htmlspecialchars($eventpost->eventname); ?></a>
										</h4>
										<small><?php echo htmlspecialchars(date('F j, Y', strtotime($eventpost->eventdate))); ?></small>
									</div>
									<div class="mt-auto">
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
										<p><small class="me-2">time start:
												<?php echo htmlspecialchars($eventTimeEAT); ?></small>
										</p>
										<p><small class="me-2">end time:
												<?php echo htmlspecialchars($eventTimeEATend); ?></small>
										</p>

										<p><small>location:
												<?php echo htmlspecialchars($eventpost->eventlocation); ?></small>
											<a href="<?=ROOT?>Sigleevent/<?=$eventpost->eventID?>"
												class="icon-link icon-link-hover card-link ms-5">
												Mode Details
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
													fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
													<path fill-rule="evenodd"
														d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
													</path>
												</svg>
											</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!--Upcomming events end-->
	<?php else: ?>
	<p class="text-danger">No events posts found.</p>
	<?php endif; ?>


</main>


<?php
/**
 * html footer function
 */
rendermainFooter();

renderHtmlFooter();
rendersmfooter();
?>