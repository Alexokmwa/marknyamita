<!-- =======================
Header START -->
<header class="navbar-light navbar-sticky header-static">
	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg" >
		<div class="container">
			<div class="container d-flex">
			<!-- Logo START -->
			<a class="navbar-brand" href="<?=ROOT?>Home">
				<img class="navbar-brand-item light-mode-item" src="<?=ROOT?>assets/asset/images/image.png" alt="<?=APP_NAME?>">			
				<img class="navbar-brand-item dark-mode-item" src="<?=ROOT?>assets/asset/images/image.png" alt="<?=APP_NAME?>">			
			</a>
			<!-- Logo END -->

			<!-- Responsive navbar toggler -->
			<button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="text-body h6 d-none d-sm-inline-block">Menu</span>
			  <span class="navbar-toggler-icon"></span>
		  </button>

			<!-- Main navbar START -->
			<div class="collapse navbar-collapse pt-4 pt-md-0" id="navbarCollapse">
				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					
					<!-- Nav item 1 home link-->
					<li class="nav-item"> <a class="nav-link" href="<?=ROOT?>Home">Home</a></li>
					
					<!-- Nav item 2 about link-->

					<li class="nav-item"> <a class="nav-link" href="<?=ROOT?>Aboutus">About</a></li>
					
					<!-- Nav item 3 blog link-->
					<li class="nav-item"> <a class="nav-link" href="<?=ROOT?>Events">Events</a></li>
					<!-- Nav item 3 blog link-->
					<li class="nav-item"> <a class="nav-link" href="<?=ROOT?>Resource">Library</a></li>
					<!-- Nav item 3 blog link-->
					<li class="nav-item"> <a class="nav-link" href="<?=ROOT?>Blog">Blog</a></li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<div class="nav ms-sm-3 flex-nowrap align-items-center">
				<!-- Dark mode options START -->
				<div class="nav-item dropdown ms-3">
					<!-- Switch button -->
					<button class="modeswitch" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
						<svg class="theme-icon-active"><use href="#"></use></svg>
					</button>
					<!-- Dropdown items -->
					<ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
						<li class="mb-1">
							<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
								<svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
									<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
									<use href="#"></use>
								</svg>Light
							</button>
						</li>
						<li class="mb-1">
							<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
									<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
									<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
									<use href="#"></use>
								</svg>Dark
							</button>
						</li>
						<li>
							<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
									<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
									<use href="#"></use>
								</svg>Auto
							</button>
						</li>
					</ul>
				</div>
				<!-- Dark mode options END -->
				 <!-- Notification dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Notification button -->
					<a class="btn btn-primary-soft btn-round mb-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
						<i class="bi bi-bell fa-fw"></i>
					</a>
					<!-- Notification dote -->
					<?php $num = getnotificationspublic() ?>
					<?php $numevent = eventgetnotificationspublic() ?>
		<?php if ($num || $numevent): ?>

					<span class="notif-badge animation-blink"></span>
					<?php endif ?>
					<!-- Notification dropdown menu START -->
					<div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0">
						<div class="card bg-transparent">
						<div class="card-header bg-transparent border-bottom p-3 d-flex justify-content-between align-items-center">
		<?php $num = getnotificationspublic() ?>
		<?php $numevent = eventgetnotificationspublic() ?>

		<?php if ($num || $numevent): ?>
		<?php $numtotal=$num + $numevent ?>
		<h6 class="m-0">Notifications <span
				class="badge bg-danger bg-opacity-10 text-danger ms-2"><?= $numtotal ?>
				new</span></h6>
		<?php endif ?>
	</div>
	<div class="card-body p-3">
		<?php if (!empty($rowspublic)): ?>
		<ul class="list-group list-unstyled list-group-flush">
			<?php foreach ($rowspublic as $row): ?>
			<?php
                        $color = $row->seen ? "white" : "rgb(185, 232, 185)";
			    $text = $row->seen ? "read" : "new notification";
			    $colortext = $row->seen ? "red" : "blue";
			    $datetime = $row->createdAt;
			    $timeAgo = time_elapsed_string($datetime);
			    ?>
			<li class="d-flex align-items-center text-decoration-none pt-2 mb-3"
				style="background-color: <?= $color ?>">
				<a href="<?= ROOT ?>Blogview/<?= $row->Itemid ?>?seen=1&notif=<?= $row->id ?>"
					class="d-flex align-items-center text-decoration-none w-100" style="background-color:inherit;">
					<div class="me-3">
						<div class="avatar avatar-sm">
							<img class="avatar-img rounded-circle"
								src="<?= isset($row->user_row) && $row->user_row ? get_imageadmin($row->user_row->adminimage) : '' ?>"
								alt="avatar">
						</div>
					</div>
					<div class="flex-grow-1">
						<h6 class="mb-1 text-center">
							<?= isset($row->user_row) && $row->user_row ? htmlspecialchars($row->user_row->username) : 'Unknown User' ?>
							<?php
			                        switch ($row->type) {
			                            case 'blogpost':
			                                echo 'made a post<br/><i>' . esc($row->item_rowblog->postname) . '</i>';
			                                break;
			                            default:
			                                // handle other cases if necessary
			                                break;
			                        }
			    ?>
						</h6>
						<span class="small text-center"><i class="bi bi-clock"></i>
							<?= $timeAgo ?></span>
						<span class="small text-center ms-3"
							style="color: <?= $colortext ?>"><?= $text ?></span>
					</div>
					<div class="d-flex align-items-center ms-3">
						<div class="me-3">
							<div class="avatar avatar-sm">
								<?php $postpic = ROOTADMIN . esc($row->item_rowblog->imageurl); ?>
								<img class="avatar-img rounded-circle"
									src="<?= $postpic ?>"
									alt="avatar">
							</div>
						</div>
					</div>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
							<!-- Button -->
							<div class="card-footer bg-transparent border-0 py-3 text-center position-relative">
							<a href="<?=ROOT?>Notifications" class="stretched-link">See all incoming activity</a>	
							</div>
						</div>
						
					</div>
					<!-- Notification dropdown menu END -->
				</div>
				<!-- Notification dropdown END -->
				 <!-- Profile dropdown START -->
				<div class="nav-item ms-2 ms-md-3 dropdown">
					<!-- Avatar -->
					<a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-circle" src="<?=get_image(user('image'))?>" alt="avatar">
					</a>

					<!-- Profile dropdown START -->
					<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
						<!-- Profile info -->
						<li class="px-3">
							<div class="d-flex align-items-center">
								<!-- Avatar -->
								<div class="avatar me-3">
									<img class="avatar-img rounded-circle shadow" src="<?=get_image(user('image'))?>" alt="avatar">
								</div>
								<div>
									<a class="h6 mt-2 mt-sm-0" href="#"> <?=esc(get_username(adminuser("username")) ?? 'no username found')?></a>
									<p class="small m-0"><?=esc(get_email(adminuser("email")) ?? 'no email found')?></p>
								</div>
							</div>
							<hr>
						</li>
						<!-- Links -->
						<li><a class="dropdown-item" href="<?=ROOT?>"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
						<li><a class="dropdown-item" href="#"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
						<li><a class="dropdown-item" href="<?=ROOT?>"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
						<li><a class="dropdown-item" href="<?=ROOT?>Logout"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
						<li class="dropdown-divider mb-2"></li>
						<li>
							<div class="align-items-center text-center py-0">
								<span class="me-3">mode:</span>
								<div class="btn-group theme-icon-active" role="group" aria-label="Default button group">
									<button type="button" class="btn btn-light btn-sm mb-0" data-bs-theme-value="light">
										<svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
											<use href="#"></use>
										</svg>
									</button>
									<button type="button" class="btn btn-light btn-sm mb-0" data-bs-theme-value="dark">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
											<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
											<use href="#"></use>
										</svg>
									</button>
									<button type="button" class="btn btn-light btn-sm mb-0 active" data-bs-theme-value="auto">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
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
				<!-- Nav additional link -->
				

				<!-- Nav Button -->
				<div class="nav-item d-none d-md-block">
					<a href="<?=ROOT?>Logout" class="btn btn-sm btn-danger mb-0 mx-2">LOG OUT!</a>
				</div>
				<!-- Nav Search -->
				<div class="nav-item dropdown nav-search dropdown-toggle-icon-none d-none d-md-block">
					<a class="nav-link pe-0 dropdown-toggle" role="button" href="#" id="navSearch" data-bs-toggle="dropdown" aria-expanded="false">
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
			<!-- Nav right END -->
		</div>
	</nav>
	<!-- Logo Nav END -->
