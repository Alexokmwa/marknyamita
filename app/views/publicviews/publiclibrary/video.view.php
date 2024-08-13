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
			<li class="nav-item me-3"><a class="nav-link" href="<?=ROOT?>Video"></i>Videos</a></li>
			<li class="nav-item  me-3"><a class="nav-link" href="<?=ROOT?>Podcast"></i>Podcast</a></li>
			<li class="nav-item me-3"><a class="nav-link" href="<?=ROOT?>Pdfs"></i>pdfs</a></li>

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
<main class="mysmbottomspace pt-4">

</main>
<?php
/**
 * html footer function
 */
rendermainFooter();

renderHtmlFooter();
rendersmfooter();
?>