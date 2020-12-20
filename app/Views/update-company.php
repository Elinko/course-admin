<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Firma</h1>
			</header>
			<br>
			<section>
				<h2>Upraviť firmu <u><?=$queri[0]['name']?></u> </h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-9 col-12-small">
					 <form class="myform update" action="/Company/updateCompany"  method="post" novalidate="novalidate" >
						 <input type="hidden" value="<?=$queri[0]['company_id']?>" name="company_id" id="company_id" required>

						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="name">Meno</label>
										<input type="text" class="form-control" value="<?=$queri[0]['name']?>" name="name" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="ico">ICO</label>
										<input type="number" class="form-control" value="<?=$queri[0]['ico']?>" name="ico" id="ico" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="dic">DIC</label>
										<input type="number" class="form-control" value="<?=$queri[0]['dic']?>" name="dic" id="dic" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="email">E-mail</label>
										<input id="email" type="email" name="email" value="<?=$queri[0]['email']?>" class="form-control">
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="phone">Tel. číslo</label>
										<input id="phone" type="text" name="phone" value="<?=$queri[0]['phone']?>" class="form-control">
									</div>
								</div>
								<!-- Break -->
								<div class="col-12">
									<div class="form-group">
										<label for="address">Adresa</label>
										<textarea name="address" id="address" value="<?=$queri[0]['address']?>" placeholder="" rows="6"></textarea>
									</div>
								</div>
								<!-- Break -->
								<div class="col-12">
									<ul class="actions">
										<li><input type="submit" value="Upraviť" class="primary"></li>
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
