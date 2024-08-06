<?php
/**
 * header nav file combined inclusion.
 */
use app\models\Session;

renderpageHeader();
?>



<nav class="myclassallignsecondnav navbar navbar-expand-xl navbar-light navbar-sticky header-static pt-2">
	<div class="container-fluid">

		<ul class="navbar-nav  navbar-nav-scroll mx-auto d-flex flex-row flex-nowrap">
			<!-- Nav Search -->
			<li class="nav-item me-3"><a class="nav-link" href="<?=ROOT?>Bloggrid"></i>All blogs</a></li>
			<li class="nav-item  me-3"><a class="nav-link" href="<?=ROOT?>Bloggrid#trending"></i>Trending</a></li>
			<li class="nav-item me-3"><a class="nav-link" href="<?=ROOT?>Bloggrid#recent"></i>Recent</a></li>

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
<main class="mysmbottomspace">
	<!-- join us btn -->
	<div class="container-fluid d-md-none pt-4">
		<ul class="navbar-nav navbar-nav-scroll d-flex flex-row flex-nowrap">
			<li class="nav-item col-8 ">
				<div class="card bg-primary bg-opacity-10">
					<div class="card-header">
						<span class="badge bg-primary p-2 px-3">Trending:</span>
					</div>
					<div class="card-body" style="height: 50px; overflow-y: auto;">
						<div class="tiny-slider arrow-end arrow-xs arrow-white arrow-round arrow-md-none">
							<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-gutter="0"
								data-arrow="true" data-dots="false" data-items="1">
								<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>

								<?php
                                     $count = 0;
								    foreach ($data['rowpost'] as $rowpost):
								        if ($rowpost->status === "live" && $count < 4): ?>
								<div>
									<a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>"
										class="text-reset btn-link"><?= esc($rowpost->postname) ?></a>
								</div>
								<?php
								                $count++;
								        endif;
								    endforeach;
								    ?>
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

								<?php
     $count = 0;
								    foreach ($data['rowpost'] as $rowpost):
								        if ($rowpost->status === "live" && $count < 4): ?>
								<div>
									<a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>"
										class="text-reset btn-link"><?= esc($rowpost->postname) ?></a>
								</div>
								<?php
								                $count++;
								        endif;
								    endforeach;
								    ?>
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
					<form action="" method="POST">
    <label class="form-label" for="category">Select Category</label>
    <div class="d-flex">
        <select class="form-select" name="category" id="category" required>
            <option value="" disabled selected>Select</option>
            <?php if (is_array($data['row']) && count($data['row'])): ?>
                <?php foreach ($data['row'] as $row): ?>
                    <option value="<?= esc($row->categoryname) ?>">
                        <?= esc($row->categoryname) ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <button type="submit" class="btn btn-primary ms-2" style="padding-left: 4px;">Filter</button>
    </div>
</form>

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
										<a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>">
											<img class="card-img"
												src="<?=$image->getThumbnail($imageSrc, 300, 437) ?>"
												alt="Post Image" style="object-fit: cover;width: 437px; height: 300px;">
										</a>
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
                                <div class="likes me-3">
                                    <a href="#!" class="text-reset">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="blue" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                        </svg>
                                        <span class="ms-2 fs-6">24</span>
                                    </a>
                                </div>
                                <?php
                                $ses = new Session();
                                $postlikes = '';
                                $postlikesnotlogged = '';

                                if ($ses->isLoggedIn()) {
                                    $like_color = $likes->userLiked(user('user_id'), $rowpost->postID) ? "#fd0dd8" : "#0d6efd";
                                    $postlikes = $likes->getLikes($rowpost->postID);
                                    if ($postlikes == 0) {
                                        $postlikes = "";
                                    }
                                } else {
                                    $like_color = $likesnotlogged->getLikesnotloggedin(nonLoggedUser('user_id'), $rowpost->postID) ? "#fd0dd8" : "#0d6efd";
                                    $postlikesnotlogged = $likesnotlogged->getLikesnotloggedin($rowpost->postID);
                                    if ($postlikesnotlogged == 0) {
                                        $postlikesnotlogged = "";
                                    }
                                }
                                $totalLikes = (int)$postlikes + (int)$postlikesnotlogged
                                ?>
                                <div onclick="post.like('<?= $rowpost->postID ?>', this)" class="likes me-3">
                                    <a href="#!" class="text-reset">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="<?= $like_color ?>" class="bi bi-hand-thumbs-up-fill"
                                             viewBox="0 0 16 16">
                                            <path
                                                d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                        </svg>
                                        <span class="js-likes-count ms-2 fs-6"><?= $totalLikes ?></span>
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
							<div id="trending">
								<h4 class="mb-3">Trending topics</h4>
								<!-- Category item -->
								<?php if (is_array($data['rowpost']) && count($data['rowpost'])): ?>
    <?php
    $count = 0; // Initialize count outside the loop
    foreach ($data['rowpost'] as $rowpost):
        // Debugging: Check the properties of $rowpost
        // echo '<!-- Debugging: rowpost --> ' . print_r($rowpost, true);

        if ($rowpost->featured === 1 && $count < 3): ?>
            <?php
            $imageSrc = ROOTADMIN . esc($rowpost->imageurl);
            // Debugging: Output the image URL to check if it's correct
            // echo '<!-- Debugging: Image URL --> ' . $imageSrc;
            ?>
            <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
                 style="background-image: url('<?= $imageSrc; ?>'); background-position: center left; background-size: cover;">
                <div class="bg-dark-overlay-4 p-4">
                    <a href="<?= ROOT ?>Blogview/<?= $rowpost->postID ?>" class="btn-link fw-bold text-white h5"
                       style="font-size: 36px; text-transform: uppercase;"><?= esc($rowpost->category) ?></a>
                </div>
            </div>
            <?php
            $count++;
        endif;
    endforeach;
    ?>
<?php endif; ?>


							
								
							</div>
							<!-- Trending topics widget END -->

							<!-- Recent post widget START -->
<div class="col-12 col-sm-6 col-lg-12" id="recent">
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
                                <a href="<?=ROOT?>Blogview/<?=$rowpost->postID?>" class="btn-link stretched-link text-reset fw-bold"><?=$rowpost->postname?></a>
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
<script>
	var root = '<?=ROOT?>';
</script>
<?php
    /**
     * html footer function
     */
    rendermainFooter();

rendersmfooter();
renderHtmlFooter();

?>