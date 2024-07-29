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
	<section class="pt-4 d-none d-sm-block">
		
		<div class="container">
			
			<div class="row g-0">
				<div class="col-12 bg-primary bg-opacity-10 p-2 rounded">
					<div class="d-sm-flex align-items-center text-center text-sm-start">
						<!-- Title -->
						<div class="me-3">
							<span class="badge bg-primary p-2 px-3">Trending:</span>
						</div>
						<!-- Slider -->
						<div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
							<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="0"
								data-arrow="true" data-dots="false" data-items="1">
								<!-- Slider items -->
								<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
								<?php foreach ($data['rowpost'] as $rowpost): ?>
								<?php if ($rowpost->status === "live"): ?>
								<div> <a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>"
										class="text-reset btn-link"><?= esc($rowpost->postname) ?></a>
								</div>

								<?php endif; ?>
								<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- Row END -->
		</div>
	</section>

	<!-- =======================
Inner intro END -->
	<div class="container pt-3">
	<div class="mb-3">
			<h1 class="mb-2 mb-sm-0 h2 ml-3">Blog search for:<span
								class="badge bg-primary bg-opacity-10 text-primary "><?=!empty($_GET["findblogpublic"]) ? $_GET["findblogpublic"] : 'input search term'?></span>
						</h1>
				
				
			</div>
		<div class="row mb-5">
			<div class="col-lg-5 col-md-7 col-12">
				<div class="row g-2 g-sm-3 align-items-center">
					<div class="col-lg-6 col-md-6 col-6">
						<label class="form-label">search</label>
						<form
										action="<?=ROOT?>Blogsearch"
										method="get" role="search" class="rounded position-relative">
										<input class="form-control pe-5 bg-transparent" type="search"
											placeholder="Search" aria-label="Search" name="findblogpublic"
											value="<?=$_GET["findblogpublic"] ?? ""?>">
										<button
											class=" btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
											type="submit"><i class="fas fa-search fs-6 "></i></button>
									</form>
					</div>
					<div class="col-lg-6 col-md-6 col-6">
						<label class="form-label">select Category</label>
						<label for="categoryList" class="form-label visually-hidden">Search Category</label>
						<select class="form-select" name="category" aria-label="Default select example" required>
							<option value="" disabled selected>Select</option>
							<?php if (is_array($data['row']) && count($data['row'])): ?>
							<?php foreach ($data['row'] as $row): ?>
							<option
								value="<?= esc($row->categoryname) ?>">
								<?= esc($row->categoryname) ?>
							</option>
							<?php endforeach; ?>
							<?php endif; ?>
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
						<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
    <?php foreach ($data['rowpost'] as $rowpost): ?>
        <?php if ($rowpost->status === "live"): ?>
            <div class="col-sm-6">
                <div class="card">
                    <!-- Card img -->
                    <div class="position-relative">
                        <?php
                        $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
                        ?>
                        <img class="card-img"
                             src="<?=$image->getThumbnail($imageSrc, 300, 437) ?>"
                             alt="Post Image" style="object-fit: cover;width: 437px; height: 300px;">
                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                            <!-- Card overlay bottom -->
                            <div class="w-100 mt-auto">
                                <!-- Card category -->
                                <a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>" class="badge text-bg-warning mb-2">
                                    <i class="fas fa-circle me-2 small fw-bold"></i><?= esc($rowpost->category) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-3">
                        <h4 class="card-title">
                            <a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>" class="btn-link text-reset fw-bold">
                                <?= esc($rowpost->postname) ?>
                            </a>
                        </h4>
                        <p class="card-text">
                            <?= esc($rowpost->shortdescription) ?>
                        </p>
                        <!-- Card info -->
                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                            <li class="nav-item">
                                <div class="nav-link">
                                    <div class="d-flex align-items-center position-relative">
                                        <div class="avatar avatar-xs">
                                            <img class="avatar-img rounded-circle"
                                                 src="assets/images/avatar/01.jpg" alt="avatar">
                                        </div>
                                        <?php if (is_array($data['rowcreator']) && count($data['rowcreator'])): ?>
                                            <?php foreach ($data['rowcreator'] as $rowcreator): ?>
                                                <?php if ($rowpost->adminID === $rowcreator->adminID): ?>
                                                    <span class="ms-3">by <a href="#"
                                                                             class="stretched-link text-reset btn-link">
                                                        <?= esc($rowcreator->firstname . " " . $rowcreator->lastname) ?>
                                                    </a></span>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <?= date('M d, Y', strtotime($rowpost->createdAt)); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-danger fs-3">No posts found.<br/> click here to go back to blogs <a href="<?=ROOT?>Blog">Blogs</a> <br/>or type another search</p>
<?php endif; ?>

						<!-- Card item END -->

<!-- Pagination START -->
<nav class="my-5" aria-label="navigation">
				  <ul class="pagination d-inline-block d-md-flex justify-content-center">
				  <div>
							<?php
						    $pager->display();
?>
						</div>
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
								<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
								<?php foreach ($data['rowpost'] as $rowpost): ?>
								<?php if ($rowpost->featured === 1): ?>
								<?php
                    $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
								    // Check if the image URL is correctly formatted
								    // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
								    ?>
								<div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
									style="background-image:url(<?=$imageSrc;?>); background-position: center left; background-size: cover;">
									<div class="bg-dark-overlay-4 p-4">
										<a href="#" class="stretched-link btn-link fw-bold text-white h5"
											style="font-size: 36px;text-transform: uppercase;"><?= esc($rowpost->category) ?></a>

									</div>
								</div>
								<?php endif; ?>
								<?php endforeach; ?>
								<?php endif; ?>
								<!-- Category item  end-->

							</div>
							<!-- View All Category button -->
							<div class="text-center mt-3">
								<a href="#" class="fw-bold text-body-secondary text-primary-hover"><u>View all
										categories</u></a>
							</div>
							<!-- Trending topics widget END -->

							<div class="row">
								<!-- Recent post widget START -->
								<div class="col-12 col-sm-6 col-lg-12">
									<h4 class="mt-4 mb-3">Recent post</h4>
									<!-- Recent post item -->
									<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
									<?php foreach ($data['rowpost'] as $rowpost): ?>
									<?php if ($rowpost->status === "live"): ?>
									<?php $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
									    // Check if the image URL is correctly formatted
									    // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
									    ?>
									<div class="card mb-3">
										<li class="row g-3">
											<div class="col-4">
												<img class="rounded"
													src="<?=$imageSrc?>"
													alt="">
											</div>
											<div class="col-8">
												<h6><a href="post-single-2.html"
														class="btn-link stretched-link text-reset fw-bold"><?=$rowpost->postname?></a>
												</h6>
												<div class="small mt-1">
													<?= date('M d, Y', strtotime($rowpost->createdAt)); ?>
												</div>
											</div>
									</div>
								</div>
								<!-- Recent post item end-->
								<?php endif; ?>
								<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<!-- Recent post widget END -->

							<!-- ADV widget START -->
							<!-- ads area -->
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
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>



<!-- Back to top -->

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