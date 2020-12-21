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
									<td><a href="/Certificate/delete/<?= $value['certificate_id'];  ?>">Vymazať</td>
								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
				<div class="text-center">
					<a href="/<?= $value['certificate_id'];  ?>" class="button primary">Pridať certifikát</a>
				</div>
			</section>
		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
