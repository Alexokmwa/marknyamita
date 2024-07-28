<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?=$admintitle ?? "Admin"?> |
		<?=APP_NAME?>
	</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="primesoftwares.tech">
	<meta name="description" content="hon mark nyamita campaign platform">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function(theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
			var el = document.querySelector('.theme-icon-active');
			if (el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
					const activeThemeIcon = document.querySelector('.theme-icon-active use')
					const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
					const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

					document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
						element.classList.remove('active')
					})

					btnToActive.classList.add('active')
					activeThemeIcon.setAttribute('href', svgOfActiveBtn)
				}

				window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
					if (storedTheme !== 'light' || storedTheme !== 'dark') {
						setTheme(getPreferredTheme())
					}
				})

				showActiveTheme(getPreferredTheme())

				document.querySelectorAll('[data-bs-theme-value]')
					.forEach(toggle => {
						toggle.addEventListener('click', () => {
							const theme = toggle.getAttribute('data-bs-theme-value')
							localStorage.setItem('theme', theme)
							setTheme(theme)
							showActiveTheme(theme)
						})
					})

			}
		})
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon"
		href="<?=ROOTADMIN?>assets/adminassets/images/favicon.ico">
	<!-- cdns start-->
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link
		href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap"
		rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.32.0/apexcharts.min.css">
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.0/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css">
	<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
	<!-- glightbox -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">

	<!-- Theme CSS -->
	<link rel="stylesheet"
		href="<?=ROOTADMIN?>assets/adminassets/css/style.css">

	<!-- Additional CSS -->

	<link rel="stylesheet"
		href="<?=ROOTADMIN?>/assets/css/adminsignup.css">
	<link rel="stylesheet"
		href="<?=ROOTADMIN?>/assets/css/adminsmfooter.css">



	<!-- cdns end-->


</head>

<body>
	<!-- Pre loader -->
	<!-- <div class="preloader">
	<div class="preloader-item">
		<div class="spinner-grow text-primary"></div>
	</div>
</div> -->