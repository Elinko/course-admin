<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Školenia </h1>
			</header> 
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
										<label for="os_time">Doba trvania OS</label>
										<input type="text" class="form-control" name="os_time" id="os_time" required>
									</div>
								</div>
								<div class="col-6 col-12-xsmall">
									<div class="form-group">
										<label for="aop_time">Doba trvania AOP</label>
										<input type="text" class="form-control" name="aop_time" id="aop_time">
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
								<th>Doba OS</th>
								<th>Doba AOP</th>
								<th>Upraviť</th>
								<th>Vymazať</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($course as $key => $value):?>
								<tr>
									<td><?= $value['course_name'];  ?></td>
									<td><?= $value['os_time'];  ?></td>
									<td><?= $value['aop_time'];  ?></td>
									<td><a href="/Course/update/<?= $value['course_id'];  ?>">Upraviť</a> </td>
									<td><a href="#" data-toggle="modal" data-id="<?= $value['course_id'];  ?>" class="to-delete-certificate" data-target="#delete-course">Vymazať</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

	<div class="modal fade" id="delete-course" tabindex="-1" aria-labelledby="success" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header text-right">
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body text-center">
					<form class="myform deleteCertificate" action="/Course/deleteCourse" method="post" novalidate="novalidate" >
						<input type="hidden" value="" name="course_id" id="delete-certificate_id" required>
						<h2 class="text-dark">Naozaj chceš odstrániť toto skolenie?</h2>
						<input type="submit" value="Odstrániť" class="button">
					</form>
	      </div>
	    </div>
	  </div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
