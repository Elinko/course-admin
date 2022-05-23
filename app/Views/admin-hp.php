<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major text-center">
				<h1>Administrácia</h1>
			</header>
			<section>
				<div class="row">
					<div class="col-12 col-12-small ">
						<div class="d-flex d-flex-center admin-buttons">
							<a href="./Company/" class="button large">&nbsp;&nbsp;&nbsp;Firmy&nbsp;&nbsp;&nbsp;</a>
							<a href="/Course/" class="button large">&nbsp;Školenia&nbsp;</a>
							<a href="/Person/" class="button large">&nbsp;&nbsp;&nbsp;Osoby&nbsp;&nbsp;&nbsp;</a>
							<a href="/Device/" class="button large">&nbsp;Zariadenia&nbsp;</a>

						</div>
					</div>
				</div>
			</section>
			<section>
				<hr>
				<div class="row">
					<div class="col-12 col-12-small">
						<form class="myform search" action="/AdminHP/search" method="get">
							<div class="row">
								<div class="col-3 col-12-small col-6-medium">
									<label for="company_id">Firma</label>
									<select class="multiple" name="company_id[]" multiple id="company_id">
										<?php foreach ($company as $key => $value): ?>
											<option value="<?= $value['company_id'] ?>"><?= $value['company_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-3 col-12-small col-6-medium">
									<label for="course_id">Školenie</label>
									<select class="multiple" name="course_id[]" multiple id="course_id">
										<?php foreach ($course as $key => $value): ?>
											<option value="<?= $value['course_id'] ?>"><?= $value['course_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-3 col-12-small col-6-medium">
									<label for="occupation">Zamestnanec</label>
									<select class="multiple" name="occupation[]" multiple id="occupation">
										<?php foreach ($occupation as $key => $value): ?>
											<option value="<?= $value['occupation'] ?>"><?= $value['occupation'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-3 col-12-small col-6-medium">
									<label for="occupation">Zariadenie</label>
									<select class="multiple" name="device[]" multiple id="device">
										<?php foreach ($device as $key => $value): ?>
											<option value="<?= $value['device_name'] ?>"><?= $value['device_name'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
							<div class="col-4 col-12-medium">
								<div class="form-group">
									<label for="date-from">Dátum od</label>
									<input type="text" name="date-from" id="date-from" value="01-01-2000" class="form-control data-picker">
								</div>
							</div>
							<div class="col-4 col-12-medium">
								<div class="form-group">
									<label for="date-from">Dátum do</label>
									<input type="text" name="date-to" id="date-to" value="01-01-2022"  class="form-control data-picker">
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
								<div class="form-group actions">
									<br>
									<input type="submit" value="Vyhľadať" class="primary large">
								</div>
							</div>
						</div>

						</form>
						<hr class="major">

					</div>
				</div>
			</section>
			<div id="search-scroll">
				<section class="search-result">
					<div class="d-flex d-flex-align">
						<h1>Výsledky vyhľadávania:</h1>
						<input type="button" onclick="printDiv('result')" value="Vytlaciť PDF" />
					</div>
					<div class="row">
						<div class="col-12 col-12-small">
							<br>
							<br>
							<div class="" id="result">
								<div class="course-print">
									<div class="row">
										<div class="col-6 medium text-left">
											<h4>Dátum vygenerovania: <span class="generated"></span> </h4>
										</div>
										<div class="col-6 medium text-right">
											<h4>Vygenerované do: <span class="generated-until"></span> </h4>
										</div>
									</div>
									<div id="ifCompany">
									</div>
									<div class=" template course-section">
										<h3 class="course_name">Php kurz </h3>
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th class="pc">P.č.</th>
														<th>Priezvisko&nbsp;meno</th>
														<th class="time">Dát.&nbsp;nar.</th>
														<!-- <th>Firma</th> -->
														<th>EV</th>
														<th class="types">Skupina</th>
														<th class="time">Posl.&nbsp;OS</th>
														<th class="time">Posl.&nbsp;AOP</th>
														<th class="no-print">Zmena</th>
													</tr>
												</thead>
												<tbody class="thbody">
													<tr class="template personRow">
														<td class="pc">1</td>
														<td class="name">Jozekoooo</td>
														<td class="birth">2020-12-11</td>
														<!-- <td class="company_name">firmaa</td> -->
														<td class="evidence_num">ge98</td>
														<td class="types">b</td>
														<td class="os ">2020-12-11 </td>
														<td class="aop">2020-12-11 </td>
														<td  class="no-print"><a href="" target="_blank">Upraviť</a> </td>
													</tr>
												</tbody>
											</table>

										</div>
									</div>
								</div>
								<div class="person-print">
									<div class="row">
										<div class="col-6 medium text-left">
											<h4>Dátum vygenerovania: <span class="generated"></span> </h4>
										</div>
										<div class="col-6 medium text-right">
											<h4>Vygenerované do: <span class="generated-until"></span> </h4>
										</div>
									</div>

									<div class=" template course-section">
										<h3 class="course_name">Meno cloveka</h3>
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th class="pc">P.č.</th>
														<th>Školenie</th>
														<th class="time">Dát.&nbsp;nar.</th>
														<th>EV.</th>
														<th>Skupina</th>
														<th class="time">Posl.&nbsp;OS</th>
														<th class="time">Posl.&nbsp;AOP</th>
														<th class="no-print">Zmena</th>
													</tr>
												</thead>
												<tbody class="thbody">
													<tr class="template personRow">
														<td class="pc">1</td>
														<td class="course">meno kurzu</td>
														<td class="birth">2020-12-11</td>
														<td class="evidence_num">ge98</td>
														<td class="types">b</td>
														<td class="os">2020-12-11 </td>
														<td class="aop">2020-12-11 </td>
														<td  class="no-print"><a href="" target="_blank">Upraviť</a> </td>
													</tr>
												</tbody>
											</table>

										</div>
									</div>
								</div>

								<div class="device-print">
									<div class="row">
										<div class="col-6 medium text-left">
											<h4>Dátum vygenerovania: <span class="generated"></span> </h4>
										</div>
										<div class="col-6 medium text-right">
											<h4>Vygenerované do: <span class="generated-until"></span> </h4>
										</div>
									</div>

									<div class=" template course-section">
										<h3 class="device_company_name">Meno cloveka</h3>
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th class="pc">P.č.</th>
														<th>Názov zariadenia</th>
														<th>Lehota</th>
														<th class="time">Dátum revízie</th>
														<th class="time">Vypršanie lehoty</th>
														<th class="no-print">Zmena</th>
													</tr>
												</thead>
												<tbody class="thbody">
													<tr class="template deviceRow">
														<td class="pc">1</td>
														<td class="device_name">meno zariadenia</td>
														<td class="device_time">2020-12-11</td>
														<td class="device_revision">2020-12-11</td>
														<td class="device_revision_exp">2020-12-11</td>
														<td  class="no-print"><a href="" target="_blank">Upraviť</a> </td>
													</tr>
												</tbody>
											</table>

										</div>
									</div>
								</div>


							</div>

							<input type="button" onclick="printDiv('result')" value="Vytlaciť PDF" />

						</div>
					</div>
				</div>
			</section>

			</div>

		</div>
	</div>

<?= $this->endSection() ?>
