<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Firma</h1>
			</header>
			<br>
			<section>
				<h2>Pridať firmu do Databázy</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform" action="/Company/addCompany"  method="post" novalidate="novalidate" >
						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="name">Meno</label>
										<input type="text" class="form-control" name="name" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="ico">IČO</label>
										<input type="number" class="form-control" name="ico" id="ico" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="dic">DIČ</label>
										<input type="number" class="form-control" name="dic" id="dic" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="email">E-mail</label>
										<input id="email" type="email" name="email" class="form-control">
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="phone">Tel. číslo</label>
										<input id="phone" type="text" name="phone" class="form-control">
									</div>
								</div>
								<!-- Break -->
								<div class="col-12">
									<div class="form-group">
										<label for="address">Adresa</label>
										<textarea name="address" id="address" placeholder="" rows="4"></textarea>
									</div>
								</div>
								<!-- Break -->
								<div class="col-12">
									<ul class="actions">
										<li><input type="submit" value="Pridať" class="primary"></li>
									</ul>
								</div>
							</div>
					 </form>


					</div>
				</div>
			</section>
		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
