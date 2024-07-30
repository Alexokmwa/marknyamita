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
<main class="mysmbottomspace">
	<!-- join us btn -->
	<div class="container-fluid d-md-none pt-4">
		<ul class="navbar-nav navbar-nav-scroll d-flex flex-row flex-nowrap w-100">
		<li class="nav-item col-8">
    <div class="card bg-primary bg-opacity-10">
        <div class="card-header">
            <span class="badge bg-primary p-2 px-3">Trending:</span>
        </div>
        <div class="card-body" style="height: 50px; overflow-y: auto;">
            <div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
                <div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="0" data-arrow="true" data-dots="false" data-items="1">
                    <?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
                        <?php foreach ($data['rowpost'] as $rowpost): ?>
                            <?php if ($rowpost->status === "live"): ?>
                                <div>
                                    <a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>" class="text-reset btn-link"><?= esc($rowpost->postname) ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</li>
		<li class="nav-item ms-auto">
				<a href="<?=ROOT?>Signup"
					class="btn btn-sm btn-danger mb-0 mx-2">Join us!</a>
			</li>
		</ul>
	</div>
	<!-- =======================
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
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-5 col-md-7 col-12">
				<div class="row g-2 g-sm-3 align-items-center">
					<div class="col-lg-6 col-md-6 col-6">
						<label class="form-label">search</label>
						<form
										action="<?=ROOT?>Bloggridsearch"
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
						<div class="row gy-4">

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
							    // Check if the image URL is correctly formatted
							    // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
							    ?>
										<img class="card-img"
											src="<?=$image->getThumbnail($imageSrc, 300, 437) ?>"
											alt="Post Image" style="object-fit: cover;width: 437px; height: 300px;">
										<div class="card-img-overlay d-flex align-items-start flex-column p-3">
											<!-- Card overlay bottom -->
											<div class="w-100 mt-auto">
												<!-- Card category -->
												<a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>" class="badge text-bg-warning mb-2"><i
														class="fas fa-circle me-2 small fw-bold"></i><?= esc($rowpost->category) ?></a>
											</div>
										</div>
									</div>
									<div class="card-body px-0 pt-3">
										<h4 class="card-title"><a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>"
												class="btn-link text-reset fw-bold"><?= esc($rowpost->postname) ?></a>
										</h4>
										<p class="card-text">
											<?= esc($rowpost->shortdescription) ?>
										</p>
										<!-- Card info -->
										<div class="d-md-flex align-items-center justify-content-between">
                                 <div class="d-flex align-items-center mb-3 mb-md-0">
                                    <div class="d-flex align-items-center">
                                       <img src="assets/images/avatar/avatar-1.jpg" alt="Avatar" class="avatar avatar-xs rounded-circle" />
                                       <div class="ms-2">

									   <?php if (is_array($data['rowcreator']) && count($data['rowcreator'])): ?>
													<?php foreach ($data['rowcreator'] as $rowcreator): ?>
													<?php if ($rowpost->adminID === $rowcreator->adminID): ?>
                                          <a href="#" class="text-reset fs-6"><?= esc($rowcreator->firstname . " " . $rowcreator->lastname) ?></a>
										  <?php endif; ?>
													<?php endforeach; ?>
													<?php endif; ?>
                                       </div>
									   
                                    </div>
                                    <div class="ms-3"><span class="fs-6"><?= date('M d, Y', strtotime($rowpost->createdAt)); ?></span></div>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                    <div class="me-3">
                                       <a href="#!" class="text-reset">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
                                             <path
                                                d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                          </svg>
                                          <span class="ms-2 fs-6">24</span>
                                       </a>
                                    </div>
                                    <div class="me-3">
                                       <a href="#!" class="text-reset">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                             <path
                                                d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                          </svg>
                                          <span class="ms-2 fs-6">1.2k</span>
                                       </a>
                                    </div>

                                    
                                 </div>
                              </div>
									</div>
								</div>
							</div>
							<?php endif; ?>

							<?php endforeach; ?>
							<?php endif; ?>
							<!-- Card item END -->
							<!-- Pagination START -->
							<div>
								<?php
                            $pager->display();
?>
							</div>

							<!-- Pagination END -->

						</div>
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
										<a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>" class="stretched-link btn-link fw-bold text-white h5"
											style="font-size: 36px;text-transform: uppercase;"><?= esc($rowpost->category) ?></a>

									</div>
								</div>
								<?php endif; ?>
								<?php endforeach; ?>
								<?php endif; ?>


								<!-- View All Category button -->
								<div class="text-center mt-3">
									<a href="#" class="fw-bold text-body-secondary text-primary-hover"><u>View all
											categories</u></a>
								</div>
							</div>
							<!-- Trending topics widget END -->

							<!-- Recent post widget START -->
<div class="col-12 col-sm-6 col-lg-12">
    <h4 class="mt-4 mb-3">Recent post</h4>
    <!-- Recent post item -->
    <?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
        <?php
        $count = 0;
        foreach ($data['rowpost'] as $rowpost):
            if ($rowpost->status === "live" && $count < 4):
                $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
                // Check if the image URL is correctly formatted
                // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
                ?>
                <div class="card mb-3">
                    <li class="row g-3">
                        <div class="col-4">
                            <img class="rounded" src="<?=$imageSrc?>" alt="">
                        </div>
                        <div class="col-8">
                            <h6>
                                <a href="post-single-2.html" class="btn-link stretched-link text-reset fw-bold"><?=$rowpost->postname?></a>
                            </h6>
                            <div class="small mt-1">
                                <?= date('M d, Y', strtotime($rowpost->createdAt)); ?>
                            </div>
                        </div>
                    </li>
                </div>
                <!-- Recent post item end-->
                <?php
                $count++;
            endif;
        endforeach;
        ?>
    <?php endif; ?>
</div>
<!-- Recent post widget END -->


						<!-- ADV widget START -->

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
<?php
    /**
     * html footer function
     */
    rendermainFooter();

rendersmfooter();
renderHtmlFooter();

?>