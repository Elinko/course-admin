<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Administrácia</h1>
			</header>
			<br>
			<section>
				<h2>Pridávanie objektov do Databázy</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-9 col-12-small">
						<ul class="actions fit">
							<li>
								<a href="./Company/" class="button fit large">Pridať firmu</a>
							</li>
							<li>
								<a href="/Course/" class="button fit large">Pridať školenie</a>
							</li>
							<li>
								<a href="/Person/" class="button fit large">Pridať osobu</a>
							</li>
						</ul>
					</div>
				</div>
			</section>
			<br>
			<section>
				<h2>Vyhľadávanie v Databáze</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-9 col-12-small">
						<form class="myform" action="/AdminHP/search" method="get">
							<div class="row">
								<div class="col-4 col-12-medium">
									<label for="company">Firma</label>
									<select class="multiple" name="company" multiple id="company">
										<?php foreach ($company as $key => $value): ?>
											<option value="<?= $value['company_id'] ?>"><?= $value['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-4 col-12-medium">
									<label for="course_id">Školenie</label>
									<select class="multiple" name="course_id" multiple id="course_id">
										<?php foreach ($course as $key => $value): ?>
											<option value="<?= $value['course_id'] ?>"><?= $value['name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-4 col-12-medium">
									<label for="occupation">Zamestanec</label>
									<select class="multiple" name="occupation" multiple id="occupation">
										<?php foreach ($occupation as $key => $value): ?>
											<option value="<?= $value['occupation'] ?>"><?= $value['occupation'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-4 col-12-medium">
								<div class="form-group">
									<label for="date-from">Dátum od</label>
									<input type="text" name="date-from" id="date-from" value="2000-01-01" class="form-control data-picker">
								</div>
							</div>
							<div class="col-4 col-12-medium">
								<div class="form-group">
									<label for="date-from">Dátum do</label>
									<input type="text" name="date-to" id="date-to" value="2022-01-01"  class="form-control data-picker">
								</div>
							</div>
							<div class="col-4 col-12-medium">
								<div class="form-group">
									<label for="sort">Zoradiť podľa</label>
									<select name="sort" id="sort" required="">
										<option selected="true" value="course">školenia</option>
										<option value="person">zamestnanca</option>
									</select>
								</div>
							</div>
							<div class="col-4 col-12-medium">
								<div class="form-group">
									<br>
									<input type="submit" value="Vyhľadať" class="primary large">
								</div>
							</div>
						</div>

						</form>
						<hr class="major">

						<div class="" id="result">
							ahoj ahoj
							<h2>Potrebné školenia</h2>
							<div class="row">
								<div class="col-md-6">
									<h4>Dátum vygenerovania: 7. decembra 2020</h4>
								</div>
								<div class="col-md-6 text-right">
									<h4>Vygenerované do: 30. júna 2021</h4>
								</div>
							</div>
							<hr>
							<div class="table-wrapper">
								<table>
									<thead>
										<tr>
											<th>Číslo</th>
											<th>Meno</th>
											<th>Narodenie</th>
											<th>Evidentné č.</th>
											<th>Skupina</th>
											<th>Posl. OS</th>
											<th>Posl. AOP</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Joze uhercik</td>
											<td>2020-12-11</td>
											<td>seredska 22</td>
											<td>policajt</td>
											<td>Upraviť </td>
											<td>Upraviť </td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<input type="button" onclick="printDiv('result')" value="print a div!" />

					</div>
				</div>
			</section>

		</div>
	</div>

<?= $this->endSection() ?>
