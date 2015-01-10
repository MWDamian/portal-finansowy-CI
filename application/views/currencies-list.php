<div class="container">
	<section class="currencies elements-gallery-default">
		<header>
			<h2>Kursy euro w porównaniu do walut</h2>
			<p>Wybierz walutę, której chcesz poznać szczegółowy kurs.</p>
		</header>
		<div class="currencies-gallery">
			<h3 class="date">Kurs za dzień: <?= $currencies['date'] ?></h3>
			
			<ul class="list-currencies">
				<?php foreach ($currencies['currencies'] as $field => $value){ ?>			
					<li data-currency-name="<? $field ?>">
						<h3><?= $field ?></h3>
						<p><?= $value['rate'] ?></p>
					</li>
				<?php }; ?>
			</ul>
		</div>
	</section>
</div>