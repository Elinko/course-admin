<?= $this->extend('layouts\main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1><a href="/Course">Kurz</a> </h1> 
			</header>
			<br>
			<section>
				<h2>Upraviť kurz <u><?=$queri[0]['name']?></u> </h2>
				<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform update" action="/Course/updateCourse"  method="post" novalidate="novalidate" >
						 <input type="hidden" value="<?=$queri[0]['course_id']?>" name="course_id" id="course_id" required>
						 <div class="row gtr-uniform">

							 <div class="col-6 col-12-xsmall">
								 <div class="form-group">
									 <label for="name">Meno kurzu</label>
									 <input type="text" class="form-control"  value="<?=$queri[0]['name']?>"  name="name" id="name" required>
								 </div>
							 </div>
							 <div class="col-6 col-12-xsmall">
								 <div class="form-group">
									 <label for="time">Doba trvania</label>
									 <input type="text" class="form-control"  value="<?=$queri[0]['time']?>"  name="time" id="time" required>
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
		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
