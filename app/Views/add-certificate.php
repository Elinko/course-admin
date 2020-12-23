<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Certifikát</h1>
			</header>
			<br>
			<section>
				<h2>Pridať certifikát pre <u><?=$person[0]['name']?></u> </h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform update" action="/Certificate/addCertificate"  method="post" novalidate="novalidate" >
						 <input type="hidden" value="<?=$person[0]['person_id']?>" name="person_id" id="person_id" required>

						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="course_id">Kurz</label>
										<select name="course_id" id="course_id">
											<option selected="true" disabled="disabled">Vyber zo zoznamu</option>
											<?php foreach ($course as $key => $value): ?>
												<option value="<?= $value['course_id'] ?>"><?= $value['name'] ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="evidence_num">Evidenčné číslo</label>
										<input type="text" class="form-control" name="evidence_num" id="evidence_num" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="os">OS</label>
										<input type="text" name="os" id="os"  class="form-control data-picker">
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="aop">AOP</label>
										<input type="text" name="aop" id="aop"  class="form-control data-picker">
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="types">Skupina</label>
										<input type="text" class="form-control" placeholder="A, B, DC" name="types" id="types" >
									</div>
								</div>
							</div>
							<div class="row gtr-uniform">
								<!-- Break -->
								<div class="col-12">
									<br>
									<input type="submit" value="Pridať" class="primary">
								</div>
							</div>

					 </form>


					</div>
				</div>
			</section>
			<hr class="major">
			<section>
				<h2>Zoznam certifikátov <u><?=$person[0]['name']?></u> </h2>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Meno kurzu</th>
								<th>Doba</th>
								<th>Ev. číslo</th>
								<th>OS</th>
								<th>AOP</th>
								<th>Skupina</th>
								<th>Upraviť</th>
								<th>Vymazať</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($certificate as $key => $value):?>
								<tr>
									<td><?= $value['name'];  ?></td>
									<td><?= $value['time'];  ?></td>
									<td><?= $value['evidence_num'];  ?></td>
									<td><?= $value['os'];  ?></td>
									<td><?= $value['aop'];  ?></td>
									<td><?= $value['types'];  ?></td>
									<td><a href="/Certificate/update/<?= $value['certificate_id'];  ?>">Upraviť</a> </td>
									<td><a href="#" data-toggle="modal" data-id="<?= $value['certificate_id'];  ?>" class="to-delete-certificate" data-target="#delete-certi">Vymazať</td>

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
					<form class="myform deleteCertificate" action="/Certificate/deleteCertificate" data-person="<?= $person[0]['person_id']?>"  method="post" novalidate="novalidate" >
						<input type="hidden" value="" name="certificate_id" id="delete-certificate_id" required>
						<h2 class="text-dark">Naozaj chceš odstrániť tento certifikát?</h2>
						<input type="submit" value="Odstrániť" class="button">
					</form>
	      </div>
	    </div>
	  </div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
