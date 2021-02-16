<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<!-- Banner -->
	<section id="banner" class="major">
		<div class="inner">
			<header class="major">
				<h1 class="text-center">Registrácia užívateľa</h1>
			</header>
			<div class="">
	      <section class="row">
					<div class="col-3">
						&nbsp;
					</div>
					<div class="col-6 col-12-small">
						<form method="post" action="/Home/registration" class="myform"  novalidate="novalidate">
							<div class="fields">
								<div class="field half">
									<label for="name">Meno</label>
									<input type="text" name="name" id="name" />
								</div>
								<div class="field half">
									<label for="password">Heslo</label>
									<input type="password" name="password" id="password" />
								</div>
							</div>
							<ul class="actions text-center ">
								<li><input type="submit" value="Registrácia" class="primary" /></li>
							</ul>
						</form>

					</div>
	      </section>
			</div>
		</div>
	</section>

	<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
