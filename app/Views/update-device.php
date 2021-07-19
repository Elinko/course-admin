<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Upraviť zariadenie <u><? $queri[0]['device_name']  ?></u>	</h1>
			</header>

      <br>
			<section>
				<div class="" <?php if(isset($current_company[0])){echo 'style="display:block"';} ?>>
					<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform updateDevice" autocomplete="off" action="/Device/updateDevice"  method="post" novalidate="novalidate" >
						 <input type="hidden" name="device_id" value="<?php echo $queri[0]['device_id'] ?>">
						 <input type="hidden" name="company_id" value="<?php echo $current_company[0]['company_id'] ?>">

							<div class="row gtr-uniform">
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="occupation">Zariadenie</label>
										<input type="text" name="device_name" value="<?php echo $queri[0]['device_name'] ?>">

									</div>
								</div>
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="occupation">Firma</label>

										<p><?php echo $current_company[0]['company_name'] ?></p>
									</div>
								</div>

							</div>
              <div class="row">
                <div class="col-6 col-12-small">
                  <div class="form-group">
                    <label for="device_time">Lehota</label>
                    <input type="text" name="device_time" id="time" data-toggle="datepicker" class="form-control" value="<?= $queri[0]['device_time']  ?>" required>
                  </div>
                </div>
                <div class="col-6 col-12-small">
                  <div class="form-group">
                    <label for="device_revision">Dátum revízie</label>
                    <input type="text" name="device_revision" id="time2"  value="<?= $queri[0]['device_revision']  ?>" data-toggle="datepicker" class="form-control data-picker" required>
                  </div>
                </div>
              </div>
              <br>
              <br>

							<div class="row gtr-uniform">

								<!-- Break -->
								<div class="col-12">
									<ul class="actions">
										<li><input type="submit" value="Uložiť" class="primary"></li>
									</ul>
								</div>
							</div>
					 </form>


					</div>
				</div>
				</div>
				<hr>

			</section>
			<br>


      <?php if(isset($current_company[0])): ?>
        <section>
          <h2>Zoznam zariední vo firme <u><?= $current_company[0]['company_name']  ?></u> </h2>
          <div class="table-wrapper">
  					<table>
  						<thead>
  							<tr>
  								<th>Názov zariadenia</th>
  								<th>Lehota</th>
									<th class="device_revision">Dátum revízie</th>
									<th class="device_revision_exp">Vypršanie lehoty</th>
  								<th>Upraviť</th>
  								<th>Vymazať</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php foreach ($company_device as $key => $value):?>
  								<tr>
  									<td><?= $value['device_name'];  ?></td>
  									<td><?= $value['device_time'];  ?></td>
										<td><?= $value['device_revision'];  ?></td>
										<td><?= $value['device_revision_exp'];  ?></td>
  									<td><a href="/Device/update/<?= $value['device_id'];  ?>">Upraviť</a> </td>
  									<td><a href="#" data-toggle="modal" data-id="<?= $value['device_id'];  ?>" data-name="<?= $value['device_name'];  ?>" class="to-delete-device" data-target="#delete-device">Vymazať</td>

  								</tr>
  							<?php endforeach; ?>

  						</tbody>
  					</table>
  				</div>
        </section>


       <?php endif; ?>
			</section>

			<div class="modal fade" id="delete-device" tabindex="-1" aria-labelledby="success" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header text-right">
							 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body text-center">
							<form class="myform " action="/Device/deleteDevice"  method="post" novalidate="novalidate" >
								<input type="hidden" value="" name="device_id" id="delete-device_id" required>
								<h2 class="text-dark">Naozaj chceš odstrániť toto zariadenie?</h2>
								<div class="actions">
									<input type="submit" value="Odstrániť" class="button">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
