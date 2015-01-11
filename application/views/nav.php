<nav class="global-nav aside">
	<header>
		<img src="<?= base_url().IMG ?>logo.png" width="300" height="132"/>
	</header>
	
	<ul class="nav-menu">
		<a href="<?= base_url().'portal/currencies'; ?>" target="_self">
			<li>
				Waluty
			</li>
		</a>
		<a href="<?= base_url().'portal/stock'; ?>" target="_self">
			<li>
				Giełda
			</li>
		</a>
	</ul>

	<div class="bottom-panel">
		<a href="<?php echo $user['user_profile']['link']; ?> " target="_blank">
			<div class="user-panel">
				<img src="https://graph.facebook.com/<?php echo $user['user_profile']['id'] ?>/picture?type=large" />
				<h3><?php echo $user['user_profile']['name']; ?></h3>
			</div>
		</a>
		<div class="settings-panel">
			<ul>
				<li>
					<a href="<?php echo base_url().'portal/ustawienia' ?> " target="_self">
						ustawienia
					</a>
				</li>
				<li>
					<a href="<?php echo $user['logout_url']; ?> " target="_self">
						wyloguj
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>