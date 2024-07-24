<?php
/**
 * header nav file combined inclusion.
 */
adminrenderpageHeader();
?>


<main class="mysmbottomspace">
	<section class="pt-4">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<a href="<?=ROOTADMIN?>Admindashboard"
						class="d-block text-decoration-none">
						<div class="mybgblog bg-opacity-10 p-4 text-center rounded-3 border border-danger">
							<h1 class="text-danger m-0">DASHBOARD</h1>
							<p class="lead m-0">Checkout site analytics</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<a href="<?=ROOTADMIN?>Adminpostcategories"
						class="d-block text-decoration-none">
						<div class="mybgblog bg-opacity-10 p-4 text-center rounded-3 border border-danger">
							<h1 class="text-danger m-0">BLOG CATEGORIES</h1>
							<p class="lead m-0">view and create categories</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<a href="<?=ROOTADMIN?>Admincreatepost"
						class="d-block text-decoration-none">
						<div class="mybgblog bg-opacity-10 p-4 text-center rounded-3 border border-danger">
							<h1 class="text-danger m-0">BLOG CREATE POST</h1>
							<p class="lead m-0">Create post</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-1">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<a href="<?=ROOTADMIN?>Adminpostlist"
						class="d-block text-decoration-none">
						<div class="mybgblog bg-opacity-10 p-4 text-center rounded-3 border border-danger">
							<h1 class="text-danger m-0">BLOG POST LIST</h1>
							<p class="lead m-0">Checkout blog list and annalytics</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>


</main>

<?php
/**
 * html footer function
 */
adminrendersmfooter();
adminrenderHtmlFooter();
?>