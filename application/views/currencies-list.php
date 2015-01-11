
<section class="currencies elements-gallery-default">
	<header>
		<h2>Kursy euro w porównaniu do walut</h2>
		<p>Wybierz walutę, której chcesz poznać szczegółowy kurs.</p>
	</header>
	<div class="currencies-gallery">
		<h3 class="date">Kurs za dzień: <?= $currencies['date'] ?></h3>
		
		<ul class="list-currencies">
			<?php foreach ($currencies['currencies'] as $field => $value){ ?>	
				<a href="<?php echo base_url().'charts/currencies/'.$field; ?>" target="_self">
					<li>
						<h3><?= $field ?></h3>
						<p><?= $value['rate'] ?></p>
					</li>
				</a>
			<?php }; ?>
		</ul>
	</div>
</section>
