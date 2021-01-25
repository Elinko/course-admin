<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Administrácia</h1>
			</header>
			<br>
			<section>
				<h2>Pridávanie objektov do Databázy</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-9 col-12-small">
						<ul class="actions fit">
							<li>
								<a href="./Company/" class="button fit large">Pridať firmu</a>
							</li>
							<li>
								<a href="/Course/" class="button fit large">Pridať školenie</a>
							</li>
							<li>
								<a href="/Person/" class="button fit large">Pridať osobu</a>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<br>
			<section>
				<h2>Vyhľadávanie v Databáze</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-9 col-12-small">
						<div class="row">
							<div class="col-4 col-12-medium">
								<h3>Firma</h3>
								<select class="multiple" name="demo-category" multiple id="demo-category">
									<?php foreach ($company as $key => $value): ?>
										<option value="<?= $value['company_id'] ?>"><?= $value['name'] ?></option>

									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-4 col-12-medium">
								<h3>Školenie</h3>
								<select class="multiple" name="demo-category" multiple id="demo-category">
									<?php foreach ($course as $key => $value): ?>
										<option value="<?= $value['course_id'] ?>"><?= $value['name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="col-4 col-12-medium">
								<h3>Zamestanec</h3>
								<select class="multiple" name="demo-category" multiple id="demo-category">
									<?php foreach ($occupation as $key => $value): ?>
										<option value="<?= $value['occupation'] ?>"><?= $value['occupation'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<br>
						<br>
						<br>
						<div class="row">
							<div class="col-4 col-12-medium">
								<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" class="data-picker">
							</div>

						</div>
					</div>
				</div>
			</section>

		</div>
	</div>

<?= $this->endSection() ?>
