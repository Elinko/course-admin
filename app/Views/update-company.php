<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1><a href="/Company">Firma</a> </h1>
			</header>
			<section>
				<div class="collapsible">
					<h2 class="">Upraviť firmu:  <?=$queri[0]['company_name']?>  </h2>
					<i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
				<div class="content">
					<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform update" autocomplete="off" action="/Company/updateCompany"  method="post" novalidate="novalidate" >
						 <input type="hidden" value="<?=$queri[0]['company_id']?>" name="company_id" id="company_id" required>

						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="name">Meno</label>
										<input type="text" class="form-control" value="<?=$queri[0]['company_name']?>" name="name" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="ico">IČO</label>
										<input type="number" class="form-control" value="<?=$queri[0]['ico']?>" name="ico" id="ico" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="dic">DIČ</label>
										<input type="number" class="form-control" value="<?=$queri[0]['dic']?>" name="dic" id="dic" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="ic_dph">IČ DPH</label>
										<input type="number" class="form-control" value="<?=$queri[0]['ic_dph']?>"  name="ic_dph" id="ic_dph" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="contact_person">Kontaktná osoba</label>
										<input id="email" type="text" value="<?=$queri[0]['contact_person']?>" name="contact_person" class="form-control">
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
										<textarea name="address" id="address"  placeholder="" rows="1"><?=$queri[0]['company_address']?></textarea>
									</div>
								</div>
							</div>
							<div class="row gtr-uniform">
								<!-- Break -->
								<div class="col-6 col-12-xsmall actions">
									<br>
									<input type="submit" value="Upraviť" class="primary large">
								</div>
								<div class="col-6 col-12-xsmall">
									<br>
									<a href="#" data-toggle="modal" data-id="<?=$queri[0]['company_id']?>>" class="to-delete-certificate button large" data-target="#delete-certi">Vymazať</a>
								</div>
							</div>
					 </form>


					</div>
				</div>
				</div>

			</section>
			<hr class="major">
			<section>
				<h2>Zoznam ludí vo firme: <?=$queri[0]['company_name']?> </h2>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Meno</th>
								<th class="time">Dát.&nbsp;nar.</th>
								<th>Adresa</th>
								<th>Zamestnanie</th>
								<th>Upraviť</th>
								<th>Vymazať</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($person as $key => $value):?>
								<tr>
									<td><?= $value['name'];  ?></td>
									<td><?= $value['birth'];  ?></td>
									<td><?= $value['address'];  ?></td>
									<td><?= $value['occupation'];  ?></td>
									<td><a href="/Person/update/<?= $value['person_id'];  ?>">Upraviť</a> </td>
									<td><a href="#" data-toggle="modal" data-id="<?= $value['person_id'];  ?>" data-name="<?= $value['name'];  ?>" class="to-delete-person" data-target="#delete-person">Vymazať</td>

								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
				<div class="col-12 text-center">
					<a href="/Person/indexCompany/<?=$queri[0]['company_id']?>" class="button primary">Pridať zamestnanca</a>
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
						<div class="actions">
							<input type="submit" value="Odstrániť" class="button">
						</div>
					</form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="delete-person" tabindex="-1" aria-labelledby="success" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header text-right">
					 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<form class="myform deletePerson" action="/Person/deletePerson" method="post" novalidate="novalidate" >
						<input type="hidden" value="" name="person_id" id="delete-person_id">
						<h2 class="text-dark">Naozaj chceš odstrániť osobu <br> <span class="todelete-name"></span> ?</h2>
						<div class="actions">
							<input type="submit" value="Odstrániť" class="button">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>


<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
