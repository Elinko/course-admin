<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Školenia - Roli</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/assets/css/bootstrap.min.css" />
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/custom.css" />
		<noscript><link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/noscript.css" /></noscript>
		<meta name="robots" content="noindex">
		<meta name="googlebot" content="noindex">

	</head>
	<body class="is-preload">
		<div id="wrapper">
			<header id="header" class="reveal alt">
				<a href="/AdminHP" class="logo"><strong>Školenia</strong> <span>by Roli</span></a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

			<?= $this->renderSection('content') ?>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<br>
						<ul class="icons text-center">
							<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
							<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						</ul>
						<ul class="copyright text-center">
							<li>&copy; Untitled</li><li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				</footer>

		</div>

		<nav id="menu">
			<div class="inner">
				<ul class="links">
					<li><a href="/AdminHP">Domov</a></li>
					<li><a href="/Company">Firmy</a></li>
					<li><a href="/Course">Kurzy</a></li>
					<li><a href="/Person">Pridať zamestnanca</a></li>
					<!-- <li><a href="generic.html">Generic</a></li>
					<li><a href="elements.html">Elements</a></li> -->
				</ul>

				<ul class="actions stacked">
					<li><a href="/Home" class="button primary fit">Log OUT</a></li>
					<!-- <li><a href="#" class="button fit">Log In</a></li> -->
				</ul>
			</div>
			<a class="close" href="#menu">Close</a>
		</nav>



		<!-- Scripts -->
			<script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/jquery.scrolly.min.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/jquery.scrollex.min.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/browser.min.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/breakpoints.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/assets/js/bootstrap.min.js" async></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/util.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>
			<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>


	</body>
</html>
