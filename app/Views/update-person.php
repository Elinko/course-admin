<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Zamestnanec</h1>
			</header>
			<br>
			<section>
				<h2>Upraviť zamestnanca <u><?=$queri[0]['name']?></u> </h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform update" action="/Person/updatePerson"  method="post" novalidate="novalidate" >
						 <input type="hidden" value="<?=$queri[0]['person_id']?>" name="person_id" id="person_id" required>

						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="name">Meno</label>
										<input type="text" class="form-control" name="name" value="<?=$queri[0]['name']?>" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="birth">Dátum narodenia</label>
										<input type="text" name="birth" id="birth"  value="<?=$queri[0]['birth']?>" required class="form-control data-picker">
									</div>
								</div>
								<div class="col-12 col-12-xsmall">
									<div class="form-group">
										<label for="company_id">Firma</label>
										<select name="company_id" id="company_id">
											<option selected="true" disabled="disabled">Vyber zo zoznamu</option>
											<?php foreach ($company as $key => $value): ?>
												<?php if( $value['company_id'] == $queri[0]['company_id']): ?>
													<option selected="selected" value="<?= $value['company_id'] ?>"><?= $value['name'] ?></option>
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
												<?php if( $value['occupation'] == $queri[0]['occupation']): ?>
													<option selected="selected" value="<?= $value['occupation'] ?>"><?= $value['occupation'] ?></option>
												<?php else: ?>
													<option value="<?= $value['occupation'] ?>"><?= $value['occupation'] ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
											</select>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="occupation-type">alebo Pridať</label>
										<input type="text" class="form-control" name="occupation-type" id="add-occupation-type-input" >
										<input type="button" class="primary small" id="add-occupation-type" name="" value="Pridať">
									</div>
								</div>
							</div>
							<hr>
							<div class="row gtr-uniform">

								<!-- Break -->
								<div class="col-12">
									<div class="form-group">
										<label for="address">Adresa</label>
										<textarea name="address" id="address" placeholder="" rows="4"><?= $queri[0]['address']  ?></textarea>
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
			<hr class="major">
			<section>
				<h2>Zoznam certifikátov <u><?=$queri[0]['name']?></u> </h2>
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
					<a href="/Certificate/add/<?=$queri[0]['person_id']?>" class="button primary">Pridať certifikát</a>
				</div>
			</section>
		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
