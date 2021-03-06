<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Certifikát</h1>
			</header>
			<section>
				<h2>Upraviť certifikát: &nbsp;<u><?=$queri[0]['course_name']?></u>&nbsp; pre: &nbsp;<u><?=$person[0]['name']?></u> </h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform update" autocomplete="off" action="/Certificate/updateCertificate"  method="post" novalidate="novalidate" >
						 <input type="hidden" value="<?=$queri[0]['certificate_id']?>" name="certificate_id" id="certificate_id" required>
						 <input type="hidden" value="<?=$queri[0]['person_id']?>" name="person_id" id="person_id" required>
						 <input type="hidden" value="<?=$queri[0]['course_id']?>" name="course_id" id="course_id" required>

						 <div class="row ">

								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="evidence_num">Evidenčné číslo</label>
										<input type="text" class="form-control"  value="<?=$queri[0]['evidence_num']?>" name="evidence_num" id="evidence_num" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="types">Skupina</label>
										<input type="text" class="form-control" value="<?=$queri[0]['types']?>" placeholder="A, B, DC" name="types" id="types" >
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="os">OS</label>
										<input type="text" name="os" id="os" value="<?=$queri[0]['os']?>"  class="form-control data-picker">
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="aop">AOP</label>
										<input type="text" name="aop" id="aop" value="<?=$queri[0]['aop']?>"  class="form-control data-picker">
									</div>
								</div>
							</div>
							<div class="row  ">
								<!-- Break -->
								<div class="col-6 col-12-xsmall actions">
									<br>
									<input type="submit" value="Upraviť" class="primary large">
								</div>
								<div class="col-6 col-12-xsmall">
									<br>
									<a href="#" data-toggle="modal" data-id="<?=$queri[0]['certificate_id']?>" class="to-delete-certificate button large" data-target="#delete-certi">Vymazať</a>
								</div>
							</div>

					 </form>


					</div>
				</div>
			</section>
			<hr class="major">
			<section>
				<h2>Zoznam certifikátov: <u><?=$person[0]['name']?></u> </h2>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Meno kurzu</th>
								<th>Doba OS</th>
								<th>Doba AOP</th>
								<th>Ev. číslo</th>
								<th class="time">Posl.&nbsp;OS</th>
								<th class="time">Posl.&nbsp;AOP</th>
								<th>Skupina</th>
								<th>Upraviť</th>
								<th>Vymazať</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($certificate as $key => $value):?>
								<tr>
									<td><?= $value['course_name'];  ?></td>
									<td><?= $value['os_time'];  ?></td>
									<td><?= $value['aop_time'];  ?></td>
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

				<div class="col-12 text-center">
					<a href="/Certificate/add/<?=$queri[0]['person_id'] ?>" class="button primary">Pridať certifikát</a>
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
					<form class="myform deleteCertificate" action="/Certificate/deleteCertificate" data-person="<?=$person[0]['person_id']?>"  method="post" novalidate="novalidate" >
						<input type="hidden" value="" name="certificate_id" id="delete-certificate_id" required>
						<h2 class="text-dark">Naozaj chceš odstrániť tento certifikát?</h2>
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
