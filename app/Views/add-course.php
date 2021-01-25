<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1><a href="/Course">Školenie</a> </h1>
			</header>
			<br>
			<section>
				<h2>Pridať školenie do Databázy</h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform" action="/course/addCourse"  method="post" novalidate="novalidate" >
						 <div class="row gtr-uniform">
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="name">Meno školenia</label>
										<input type="text" class="form-control" name="name" id="name" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="time">Doba trvania</label>
										<input type="text" class="form-control" name="time" id="time" required>
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
			<hr class="major">
			<section>
				<h2>Zoznam školení </h2>
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Meno školenia</th>
								<th>Doba</th>
								<th>Upraviť</th>
								<th>Vymazať</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($course as $key => $value):?>
								<tr>
									<td><?= $value['name'];  ?></td>
									<td><?= $value['time'];  ?></td>
									<td><a href="/Course/update/<?= $value['course_id'];  ?>">Upraviť</a> </td>
									<td><a href="#" data-toggle="modal" data-id="<?= $value['course_id'];  ?>" class="to-delete-certificate" data-target="#delete-certi">Vymazať</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
