<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Firmy </h1>
			</header>
			<section>
				<div class="collapsible">
					<h2>Pridať firmu do Databázy</h2>
					<i class="fa fa-chevron-down" aria-hidden="true"></i>

				</div>
				<div class="content">
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
										<input type="number" class="form-control" name="ico" id="ico">
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="dic">DIČ</label>
										<input type="number" class="form-control" name="dic" id="dic" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="ic_dph">IČ DPH</label>
										<input type="number" class="form-control" name="ic_dph" id="ic_dph" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="contact_person">Kontaktná osoba</label>
										<input id="email" type="text" name="contact_person" class="form-control">
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
										<textarea name="address" id="address" placeholder="" rows="1"></textarea>
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
				</div>

			</section>
			<hr class="major">
			<section>
				<h2>Zoznam firiem v DB </h2>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Meno</th>
								<th>Telefón</th>
								<th>K. osoba</th>
								<th>E-mail</th>
								<th>IČO</th>
								<th>DIČ</th>
								<th>IČ DPH</th>
								<th>Adresa</th>
								<th>Upraviť</th>
								<th>Vymazať</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($company as $key => $value):?>
								<tr>
									<td><?= $value['company_name'];  ?></td>
									<td><?= $value['phone'];  ?></td>
									<td><?= $value['contact_person'];  ?></td>
									<td><?= $value['email'];  ?></td>
									<td><?= $value['ico'];  ?></td>
									<td><?= $value['dic'];  ?></td>
									<td><?= $value['ic_dph'];  ?></td>
									<td><?= $value['company_address'];  ?></td>
									<td><a href="/Company/update/<?= $value['company_id'];  ?>">Upraviť</a> </td>
									<td><a href="#" data-toggle="modal" data-id="<?= $value['company_id'];  ?>" class="to-delete-certificate" data-target="#delete-certi">Vymazať</td>

								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>


	<div class="modal fade" id="delete-certi" tabindex="-1" aria-labelledby="success" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header text-right">
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
					<form class="myform deleteCompany" action="/Company/deleteCompany" method="post" novalidate="novalidate" >
						<input type="hidden" value="" name="company_id" id="delete-certificate_id" required>
						<h2 class="text-dark">Naozaj chceš odstrániť túto firmu?</h2>
						<input type="submit" value="Odstrániť" class="button">
					</form>
	      </div>
	    </div>
	  </div>
	</div>


<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
