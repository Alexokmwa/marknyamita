<?php
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
<main>


	<!-- join us btn -->
	<div class="container-fluid d-md-none pt-4">
		<ul class="navbar-nav navbar-nav-scroll d-flex flex-row flex-nowrap w-100">
			<li class="nav-item ms-auto">
				<a href="<?=ROOT?>Signup"
					class="btn btn-sm btn-danger mb-0 mx-2">Join us!</a>
			</li>
		</ul>
	</div>
	<!-- =======================
<section class="pt-4">
Inner intro START -->
	<section class="pt-4">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="border p-4 text-center rounded-3">
						<h1>Post list style</h1>
						<nav class="d-flex justify-content-center" aria-label="breadcrumb">
							<ol class="breadcrumb breadcrumb-dots m-0">
								<li class="breadcrumb-item"><a href="index-2.html"><i class="bi bi-house me-1"></i>
										Home</a></li>
								<li class="breadcrumb-item active">All post</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Inner intro END -->
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 col-md-7 col-12">
				<div class="row g-2 g-sm-3 align-items-center">
					<div class="col-lg-6 col-md-6 col-6">
						<form>
							<label for="searchInput" class="form-label visually-hidden">Search Blog</label>
							<input type="search" class="form-control" id="searchInput" placeholder="Search Blog" />
						</form>
					</div>
					<div class="col-lg-6 col-md-6 col-6">
						<label for="categoryList" class="form-label visually-hidden">Search Category</label>
						<select class="form-select" id="categoryList">
							<option selected disabled value="">Select Category</option>
							<option value="Digital">Digital</option>
							<option value="Design">Design</option>
							<option value="Business">Business</option>
							<option value="Startup">Startup</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-7 col-md-5 col-12 d-none d-lg-block">
				<ul class="nav d-flex gap-1 justify-content-md-end mt-3 mt-md-0">
					<li>
						<a class="btn btn-primary btn-icon btn-md"
							href="<?=ROOT?>Blog">
							<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
								class="bi bi-list" viewBox="0 0 16 16">
								<path fill-rule="evenodd"
									d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
							</svg>
						</a>
					</li>

					<li>
						<a class="btn btn-light btn-icon btn-md"
							href="<?=ROOT?>Bloggrid">
							<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor"
								class="bi bi-grid" viewBox="0 0 16 16">
								<path
									d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
							</svg>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- =======================
Main content START -->
		<section class="position-relative pt-0">
			<div class="container" data-sticky-container>
				<div class="row">
					<!-- Main Post START -->
					<div class="col-lg-9">
						<!-- Card item START -->
						<div class="card mb-4">
							<div class="row">
								<div class="col-md-5">
									<img class="rounded-3"
										src="<?=ROOT;?>assets/asset/images/blog/4by3/01.jpg"
										alt="">
								</div>
								<div class="col-md-7 mt-3 mt-md-0">
									<a href="#" class="badge text-bg-danger mb-2"><i
											class="fas fa-circle me-2 small fw-bold"></i>Lifestyle</a>
									<h3><a href="post-single-2.html" class="btn-link stretched-link text-reset">The
											pros
											and cons of business agency</a></h3>
									<p>Pleasure and so read the was hope entire first decided the so must have as on
										was
										want up of I will rival in came this touched got a physics to travelling so
										all
										especially refinement monstrous desk they was arrange the overall helplessly
										out
										of particularly ill are purer Person she control of to beginnings view
										looked
										eyes Than continues its and because</p>
									<!-- Card info -->
									<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
										<li class="nav-item">
											<div class="nav-link">
												<div class="d-flex align-items-center position-relative">
													<div class="avatar avatar-xs">
														<img class="avatar-img rounded-circle"
															src="<?=ROOT;?>assets/asset/images/avatar/01.jpg"
															alt="avatar">
													</div>
													<span class="ms-3">by <a href="#"
															class="stretched-link text-reset btn-link">Samuel</a></span>
												</div>
											</div>
										</li>
										<li class="nav-item">Jan 22, 2022</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Card item END -->
						<!-- Card item START -->
						<div class="card mb-4">
							<div class="row">
								<div class="col-md-5">
									<img class="rounded-3"
										src="<?=ROOT;?>assets/asset/images/blog/4by3/02.jpg"
										alt="">
								</div>
								<div class="col-md-7 mt-3 mt-md-0">
									<a href="#" class="badge text-bg-info mb-2"><i
											class="fas fa-circle me-2 small fw-bold"></i>Sports</a>
									<h3><a href="post-single-2.html" class="btn-link stretched-link text-reset">5
											reasons why you shouldn't startup</a></h3>
									<p>Given and shown creating curiously to more in are man were smaller by we
										instead
										the these sighed Avoid in the sufficient me real man longer of his how her
										for
										countries to brains warned notch important Finds be to the of on the
										increased
										explain noise of power deep asking contribution this live of suppliers goals
										bit
										separated poured sort several the was </p>
									<!-- Card info -->
									<ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
										<li class="nav-item">
											<div class="nav-link">
												<div class="d-flex align-items-center position-relative">
													<div class="avatar avatar-xs">
														<img class="avatar-img rounded-circle"
															src="<?=ROOT?>assets/asset/images/avatar/02.jpg"
															alt="avatar">
													</div>
													<span class="ms-3">by <a href="#"
															class="stretched-link text-reset btn-link">Dennis</a></span>
												</div>
											</div>
										</li>
										<li class="nav-item">Mar 07, 2022</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- Card item END -->

						<!-- Pagination START -->
						<nav class="my-5" aria-label="navigation">
							<ul class="pagination d-inline-block d-md-flex justify-content-center">
								<li class="page-item disabled">
									<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item disabled"><a class="page-link" href="#">...</a></li>
								<li class="page-item"><a class="page-link" href="#">15</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</nav>
						<!-- Pagination END -->
					</div>
					<!-- Main Post END -->

					<!-- Sidebar START -->
					<div class="col-lg-3 mt-5 mt-lg-0">
						<div data-sticky data-margin-top="80" data-sticky-for="767">
							<!-- Trending topics widget START -->
							<div>
								<h4 class="mb-3">Trending topics</h4>
								<!-- Category item -->
								<div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
									style="background-image:url(assets/images/blog/4by3/01.jpg); background-position: center left; background-size: cover;">
									<div class="bg-dark-overlay-4 p-3">
										<a href="#" class="stretched-link btn-link fw-bold text-white h5">Travel</a>
									</div>
								</div>
								<!-- Category item -->
								<div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
									style="background-image:url(assets/images/blog/4by3/02.jpg); background-position: center left; background-size: cover;">
									<div class="bg-dark-overlay-4 p-3">
										<a href="#" class="stretched-link btn-link fw-bold text-white h5">Business</a>
									</div>
								</div>
								<!-- Category item -->
								<div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
									style="background-image:url(assets/images/blog/4by3/03.jpg); background-position: center left; background-size: cover;">
									<div class="bg-dark-overlay-4 p-3">
										<a href="#" class="stretched-link btn-link fw-bold text-white h5">Marketing</a>
									</div>
								</div>
								<!-- Category item -->
								<div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
									style="background-image:url(assets/images/blog/4by3/04.jpg); background-position: center left; background-size: cover;">
									<div class="bg-dark-overlay-4 p-3">
										<a href="#"
											class="stretched-link btn-link fw-bold text-white h5">Photography</a>
									</div>
								</div>
								<!-- Category item -->
								<div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
									style="background-image:url(assets/images/blog/4by3/05.jpg); background-position: center left; background-size: cover;">
									<div class="bg-dark-overlay-4 p-3">
										<a href="#" class="stretched-link btn-link fw-bold text-white h5">Sports</a>
									</div>
								</div>
								<!-- View All Category button -->
								<div class="text-center mt-3">
									<a href="#" class="fw-bold text-body-secondary text-primary-hover"><u>View all
											categories</u></a>
								</div>
							</div>
							<!-- Trending topics widget END -->

							<div class="row">
								<!-- Recent post widget START -->
								<div class="col-12 col-sm-6 col-lg-12">
									<h4 class="mt-4 mb-3">Recent post</h4>
									<!-- Recent post item -->
									<div class="card mb-3">
										<div class="row g-3">
											<div class="col-4">
												<img class="rounded" src="assets/images/blog/4by3/thumb/01.jpg" alt="">
											</div>
											<div class="col-8">
												<h6><a href="post-single-2.html"
														class="btn-link stretched-link text-reset fw-bold">The pros
														and
														cons of business agency</a></h6>
												<div class="small mt-1">May 17, 2022</div>
											</div>
										</div>
									</div>
									<!-- Recent post item -->
									<div class="card mb-3">
										<div class="row g-3">
											<div class="col-4">
												<img class="rounded" src="assets/images/blog/4by3/thumb/02.jpg" alt="">
											</div>
											<div class="col-8">
												<h6><a href="post-single-2.html"
														class="btn-link stretched-link text-reset fw-bold">5 reasons
														why
														you shouldn't startup</a></h6>
												<div class="small mt-1">Apr 04, 2022</div>
											</div>
										</div>
									</div>
									<!-- Recent post item -->
									<div class="card mb-3">
										<div class="row g-3">
											<div class="col-4">
												<img class="rounded" src="assets/images/blog/4by3/thumb/03.jpg" alt="">
											</div>
											<div class="col-8">
												<h6><a href="post-single-2.html"
														class="btn-link stretched-link text-reset fw-bold">Ten
														questions
														you should answer truthfully.</a></h6>
												<div class="small mt-1">Jun 30, 2022</div>
											</div>
										</div>
									</div>
									<!-- Recent post item -->
									<div class="card mb-3">
										<div class="row g-3">
											<div class="col-4">
												<img class="rounded" src="assets/images/blog/4by3/thumb/04.jpg" alt="">
											</div>
											<div class="col-8">
												<h6><a href="post-single-2.html"
														class="btn-link stretched-link text-reset fw-bold">Five
														unbelievable facts about money.</a></h6>
												<div class="small mt-1">Nov 29, 2022</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Recent post widget END -->

								<!-- ADV widget START -->
								<div class="col-12 col-sm-6 col-lg-12 my-4">
									<a href="#" class="d-block card-img-flash">
										<img src="assets/images/adv.png" alt="">
									</a>
									<div class="smaller text-end mt-2">ads via <a href="#"
											class="text-body-secondary"><u>Bootstrap</u></a></div>
								</div>
								<!-- ADV widget END -->
							</div>
						</div>
					</div>
					<!-- Sidebar END -->
				</div> <!-- Row end -->
			</div>
		</section>
		<!-- =======================
Main content END -->



</main>
<!-- **************** MAIN CONTENT END **************** -->



<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->



<?php
    /**
     * html footer function
     */
    rendermainFooter();

rendersmfooter();
renderHtmlFooter();

?>