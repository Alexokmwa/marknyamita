<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-xl">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand me-3"
				href="<?=ROOTADMIN?>Admindashboard">
				<img class="navbar-brand-item light-mode-item"
					src="<?=ROOTADMIN?>assets/adminassets/images/image.png"
					alt="<?=APP_NAMEADMIN?>">
				<img class="navbar-brand-item dark-mode-item"
					src="<?=ROOTADMIN?>assets/adminassets/images/logo-light.svg"
					alt="<?=APP_NAMEADMIN?>">
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="text-body h6 d-none d-sm-inline-block">Menu</span>
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll mx-auto">

					<!-- Nav item 1 Demos -->
					<li class="nav-item"><a class="nav-link"
							href="<?=ROOTADMIN?>Admindashboard"><i
								class="bi bi-house-door me-1"></i>Dashboard</a>
					</li>

					<!-- Nav item 2 Post -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil me-1"></i>Post</a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
							<!-- dropdown submenu -->
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminpostlist">Post
									List</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminpostcategories">Post
									Categories</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admincreatepost">Create
									a Post</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admineditpost">Edit
									Post</a> </li>
						</ul>
					</li>
					<!-- Nav item 3 libarary -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><i class="bi bi-play-btn-fill"></i>Library</a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
							<!-- dropdown submenu -->
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminpostlist">Library
									List</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminpostcategories">Library
									Categories</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admincreatepost">Create
									Library Post</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admineditpost">Edit
									Library Post</a> </li>
						</ul>
					</li>
					<!-- Nav item 3 events -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><i class="bi bi-calendar-event"></i>Events</a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
							<!-- dropdown submenu -->
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admineventlist">Events
									List</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admineventcategory">Event
									Categories</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admincreateevent">Create
									a Event</a> </li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Admineditevent">Edit
									Event</a> </li>
						</ul>
					</li>

					<!-- Nav item 3 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false"><i class="bi bi-folder me-1"></i>Pages</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminevents">Events</a>
							</li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminmedia">Media</a>
							</li>
							<li class="dropdown-divider"></li>

							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminblog">Blog</a>
							</li>
							<li> <a class="dropdown-item"
									href="<?=ROOTADMIN?>Adminsocials">Socials</a>
							</li>




						</ul>
					</li>
					<!-- Nav item 4 Pages -->


				</ul>

				<!-- Search dropdown START -->
				<div class="nav my-3 my-xl-0 px-4 px-lg-1 flex-nowrap align-items-center">
					<div class="nav-item w-100">
						<form class="position-relative">
							<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search"
								aria-label="Search">
							<button
								class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
								type="submit"><i class="fas fa-search fs-6 "></i></button>
						</form>
					</div>
				</div>
				<!-- Search dropdown END -->
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<div class="nav flex-nowrap align-items-center">

				<!-- Notification dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Notification button -->
					<a class="btn btn-primary-soft btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false" data-bs-auto-close="outside">
						<i class="bi bi-bell fa-fw"></i>
					</a>
					<?php $num = getnotifications()?>
					<?php $commentnum=getcommentnotifications()?>
					<?php if($num || $commentnum):?>
					<!-- Notification dote -->
					<span class="notif-badge animation-blink"></span>
					<?php endif?>

					<!-- Notification dropdown menu START -->
					<div
						class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
						<div
							class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
							<?php $num = getnotifications()?>
							<?php if($num):?>
							<h6 class="m-0">Notifications <span
									class="badge bg-danger bg-opacity-10 text-danger ms-2"><?=$num?>
									new</span></h6>
							<?php endif?>
							<!-- <a class="small" href="#">Clear all</a> -->
						</div>
						<div class="card-body p-0">
							<ul class="list-group list-unstyled list-group-flush">
								<!-- Notif item -->
								<?php if(!empty($rows)):?>
								<?php foreach($rows as $row):?>
								<li
									class="list-group-item d-flex justify-content-center align-items-center border-0 border-bottom">
									<a href="<?=ROOTADMIN?>Adminviewblog/<?=$row->Itemid?>"
										class="d-flex align-items-center text-decoration-none">
										<div class="me-3">
											<div class="avatar avatar-sm">
												<img class="avatar-img rounded-circle"
													src="<?=get_image($row->user_row->image)?>"
													alt="avatar">

											</div>
										</div>

										<div>
											<h6 class="mb-1">
												<?= $row->user_row->username ?>
												<?php
            switch ($row->type) {
                case 'like':
                    echo 'liked your post';
                    break;
                default:
                    // handle other cases if necessary
                    break;
            }
								    ?>
											</h6>
											<span class="small"> <i class="bi bi-clock"></i> 3 min ago</span>
										</div>
										<div class="d-flex align-items-center ms-3">
											<div class="me-3">
												<div class="avatar avatar-sm">
													<img class="avatar-img rounded-circle"
														src="<?= get_imageadmin($row->item_row->imageurl) ?>"
														alt="avatar">
												</div>
											</div>
										</div>

									</a>
								</li>
								<?php endforeach?>
								<?php endif?>






							</ul>
						</div>
						<!-- Button -->
						<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
							<a href="<?=ROOTADMIN?>Adminnotificationconroller"
								class="stretched-link">See all incoming activity</a>
						</div>
					</div>
				</div>
				<!-- Notification dropdown menu END -->
			</div>
			<!-- Notification dropdown END -->

			<!-- Profile dropdown START -->
			<div class="nav-item ms-2 ms-md-3 dropdown">
				<!-- Avatar -->
				<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside"
					data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
					<img class="avatar-img rounded-circle"
						src="<?=get_imageadmin(adminuser('image'))?>"
						alt="avatar">
				</a>

				<!-- Profile dropdown START -->
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
					aria-labelledby="profileDropdown">
					<!-- Profile info -->
					<li class="px-3">
						<div class="d-flex align-items-center">
							<!-- Avatar -->
							<div class="avatar me-3">
								<img class="avatar-img rounded-circle shadow"
									src="<?=get_imageadmin(adminuser('image'))?>"
									alt="avatar">
							</div>
							<div>
								<a class="h6 mt-2 mt-sm-0"
									href="#"><?=esc(get_username(adminuser("username")) ?? 'no username found')?></a>
								<p class="small m-0">
									<?=esc(get_email(adminuser("email")) ?? 'no email found')?>
								</p>

							</div>
						</div>
						<hr>
					</li>
					<!-- Links -->
					<li><a class="dropdown-item"
							href="<?=ROOTADMIN?>Admineditprofile"><i
								class="bi bi-person fa-fw me-2"></i>Edit Profile</a>
					</li>
					<li><a class="dropdown-item text-danger" href="#"><i
								class="bi bi-slash-circle me-2 fw-icon"></i>Delete profile</a></li>
					</li>
					<li><a class="dropdown-item"
							href="<?=ROOTADMIN?>Adminhelp"><i
								class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><a class="dropdown-item"
							href="<?=ROOTADMIN?>Adminsignout"><i
								class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
					<li class="dropdown-divider mb-2"></li>
					<li>
						<div class="align-items-center text-center py-0">
							<span class="me-3">mode:</span>
							<div class="btn-group theme-icon-active" role="group" aria-label="Default button group">
								<button type="button" class="btn btn-light btn-sm mb-0" data-bs-theme-value="light">
									<svg width="16" height="16" fill="currentColor"
										class="bi bi-brightness-high-fill fa-fw mode-switch" viewBox="0 0 16 16">
										<path
											d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-light btn-sm mb-0" data-bs-theme-value="dark">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
										class="bi bi-moon-stars-fill fa-fw mode-switch" viewBox="0 0 16 16">
										<path
											d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
										<path
											d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-light btn-sm mb-0 active"
									data-bs-theme-value="auto">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
										class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
										<use href="#"></use>
									</svg>
								</button>
							</div>
						</div>
					</li>
				</ul>
				<!-- Profile dropdown END -->
			</div>
			<!-- Profile dropdown END -->

			<!-- Nav right END -->
		</div>
		</div>
	</nav>
	<!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->