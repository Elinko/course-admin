<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Domovská stránka</h1>
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
								<a href="#" class="button fit large">Pridať firmu</a>
							</li>
							<li>
								<a href="#" class="button fit large">Pridať školenie</a>
							</li>
							<li>
								<a href="#" class="button fit large">Pridať osobu</a>
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
									<option value="">- Category -</option>
									<option value="1">Manufacturing</option>
									<option value="1">Shipping</option>
									<option value="1">Administration</option>
									<option value="1">Human Resources</option>
								</select>
							</div>
							<div class="col-4 col-12-medium">
								<h3>Školenie</h3>
								<select class="multiple" name="demo-category" multiple id="demo-category">
									<option value="">- Category -</option>
									<option value="1">Manufacturing</option>
									<option value="1">Shipping</option>
									<option value="1">Administration</option>
									<option value="1">Human Resources</option>
								</select>
							</div>
							<div class="col-4 col-12-medium">
								<h3>Zamestanec</h3>
								<select class="multiple" name="demo-category" multiple id="demo-category">
									<option value="">- Category -</option>
									<option value="1">Manufacturing</option>
									<option value="1">Shipping</option>
									<option value="1">Administration</option>
									<option value="1">Human Resources</option>
								</select>
							</div>
						</div>
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
