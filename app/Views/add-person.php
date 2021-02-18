<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Osoby</h1>
			</header>
			<br>
			<section>
				<div class="collapsible">
					<h2>Pridať osobu do Databázy</h2>
					<i class="fa fa-chevron-down" aria-hidden="true"></i>

				</div>
				<div class="content">
					<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform addPerson" action="/Person/addPerson"  method="post" novalidate="novalidate" >
						 <div class="row gtr-uniform">
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="name">Meno</label>
										<input type="text" class="form-control" name="name" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="birth">Dátum narodenia</label>
										<input type="text" name="birth" id="birth" required class="form-control data-picker">
									</div>
								</div>
								<div class="col-12 col-12-small">
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
													<option value="<?= $value['company_id'] ?>"><?= $value['company_name'] ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
											</select>
									</div>
								</div>
							</div>
							<hr>
							<div class="row gtr-uniform">
								<div class="col-6 col-12-small">
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
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="occupation-type">alebo Pridať</label>
										<div class="row gtr-uniform">
											<div class="col-8 col-12-medium">
												<input type="text" class="form-control" name="occupation-type" id="add-occupation-type-input" >
											</div>
											<div class="col-4 col-12-medium">
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
				</div>
				<hr>
				<div class="collapsible active">
					<h2>Vyhľadať osobu v Databáze</h2>
					<i class="fa fa-chevron-down" aria-hidden="true"></i>

				</div>
				<div class="content" style="display: block;">
					<div class="row">
						<div class="col-1">
						</div>
						<div class="col-10 col-12-small">
						 <form class="myform searchPerson" action="/Person/searchPerson"  method="get" novalidate="novalidate" >
							 <div class="row gtr-uniform">
									<div class="col-6 col-12-small">
										<div class="form-group">
											<label for="name">Meno</label>
											<input type="text" class="form-control" name="name" id="name" required>
										</div>
									</div>
									<div class="col-6 col-12-small">
										<div class="form-group">
											<br>

											<input type="submit" value="Hľadať" class="primary fit">
										</div>
									</div>

								</div>

						 </form>


						</div>
					</div>
				</div>
			</section>
			<br>
			<div id="search-scroll">
				<section class="search-result">
					<hr>
					<div class="row">
						<div class="col-6 col-12-medium">
							<h2>Výsledky vyhľadávania: <span class="searchInput"></span> </h2>
						</div>
						<div class="col-6 col-12-medium text-right">
							<input type="button" onclick="printDiv('result')" value="Vytlaciť PDF" />
						</div>

					</div>
					<div class="row">
						<div class="col-12 col-12-small">
							<br>
							<div class="" id="result">
									<div class="search-section">
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Č.</th>
														<th>Meno</th>
														<th>Firma</th>
														<th>Narodenie</th>
														<th>Adresa</th>
														<th>Zamestnanie</th>
														<th class="no-print">Detaily</th>
													</tr>
												</thead>
												<tbody class="thbody">
													<tr class="template personRow">
														<td>1</td>
														<td class="name">Jozekoooo</td>
														<td class="company">2020-12-11</td>
														<!-- <td class="company_name">firmaa</td> -->
														<td class="birth">ge98</td>
														<td class="address">Adresa</td>
														<td class="occupation">occupation </td>
														<td  class="no-print"><a href="" target="_blank">Detaily</a> </td>
													</tr>
												</tbody>
											</table>

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

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
