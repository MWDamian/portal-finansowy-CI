<?php load_css(array('login.css'));?>

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
			<a href="<?php echo $login_url; ?>" target="_self">Zaloguj się z Facebook</a>
		</div>
	</div>
</section>