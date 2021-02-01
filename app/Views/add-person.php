<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Zamestnanec</h1>
			</header>
			<br>
			<section>
				<h2>Pridať zamestnanca do Databázy</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform" action="/Person/addPerson"  method="post" novalidate="novalidate" >
						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="name">Meno</label>
										<input type="text" class="form-control" name="name" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="birth">Dátum narodenia</label>
										<input type="text" name="birth" id="birth" required class="form-control data-picker">
									</div>
								</div>
								<div class="col-12 col-12-xsmall">
									<div class="form-group">
										<label for="company_id">Firma</label>
										<select name="company_id" id="company_id" required>
											<option selected="true" disabled="disabled">Vyber zo zoznamu</option>
											<?php foreach ($company as $key => $value): ?>
												<?php if(isset($current_company[0])): ?>
													<?php if($value['company_id'] == $current_company[0]['company_id']): ?>
														<option selected value="<?= $value['company_id'] ?>"><?= $value['name'] ?></option>
													<?php endif; ?>

												<?php else: ?>
													<option value="<?= $value['company_id'] ?>"><?= $value['name'] ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
											</select>
									</div>
								</div>
							</div>
							<hr>
							<div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="occupation">Druh zamestnania</label>
										<select name="occupation" id="occupation">
											<option selected="true" disabled="disabled">Vyber zo zoznamu</option>
											<?php foreach ($occupation as $key => $value): ?>
												<option value="<?= $value['occupation'] ?>"><?= $value['occupation'] ?></option>
											<?php endforeach; ?>
											</select>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="occupation-type">alebo Pridať</label>
										<div class="row gtr-uniform">
											<div class="col-8">
												<input type="text" class="form-control" name="occupation-type" id="add-occupation-type-input" >
											</div>
											<div class="col-4">
												<input type="button" class="primary small" id="add-occupation-type" name="" value="Pridať">
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="row gtr-uniform">

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
