<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Portal walutowy</title>
		<?= autoload_header_css(); ?>
		<?= autoload_header_js(); ?>
		<?php load_css(array('login.css'));?>

		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>	
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<section class="login">
			<div class="container">
				<header>
					<img src="<?= base_url().IMG ?>logo-color.png" width="300" height="132"/>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</header>
				<div class="login-box">
					<h2>Zaloguj się, aby móc korzystać ze wszystkich funkcjinalności portalu.</h2>
					<a href="<?php echo $login_url; ?>" target="_self">
						<span>Zaloguj się z Facebook</span>
						<img src="<?= base_url().IMG ?>icons/fb-white.png" width="50"/>
					</a>
				</div>
			</div>
		</section>
		
		<?= autoload_footer_js(); ?>
	</body>
</html>
