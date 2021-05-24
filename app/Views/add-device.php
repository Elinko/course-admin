<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

	<div id="main" class="main">
		<div class="inner">
			<header class="major">
				<h1>Pridať zariadenie</h1>
			</header>
      <br>
			<section>
				<!-- <div class="collapsible <?php if(isset($current_company[0])) {echo 'active';} ?>">
					<h2>Pridať zariadeneie do Databázy</h2>
					<i class="fa fa-chevron-down" aria-hidden="true"></i>

				</div> -->
        <!-- content -->
				<div class="" <?php if(isset($current_company[0])){echo 'style="display:block"';} ?>>
					<div class="row">
					<div class="col-1">
					</div>
					<div class="col-10 col-12-small">
					 <form class="myform addDevice" autocomplete="off" action="/Device/addDevice"  method="post" novalidate="novalidate" >

             <div class="row gtr-uniform">
								<div class="col-12 col-12-small">
									<div class="form-group">
										<label for="company_id">Firma</label>
										<select name="company_id" id="company_id" required>
											<option selected="true" disabled="disabled">Vyber zo zoznamu</option>
											<?php foreach ($company as $key => $value): ?>
												<?php if(isset($current_company[0])): ?>
													<?php if($value['company_id'] == $current_company[0]['company_id']): ?>
														<option selected value="<?= $value['company_id'] ?>"><?= $value['company_name'] ?></option>
													<?php endif; ?>

												<?php else: ?>
													<option value="<?= $value['company_id'] ?>"><?= $value['company_name'] ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
											</select>
									</div>
								</div>
							</div>
              <br>

							<div class="row gtr-uniform">
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="occupation">Druh zariadenia</label>
										<select name="device_name" id="device">
											<option selected="true" disabled="disabled" value="false">Vyber zo zoznamu</option>
											<?php foreach ($device as $key => $value): ?>
												<option value="<?= $value['device_name'] ?>"><?= $value['device_name'] ?></option>
											<?php endforeach; ?>
											</select>
									</div>
								</div>
								<div class="col-6 col-12-small">
									<div class="form-group">
										<label for="device_name_new">alebo pridať nové</label>
										<input type="text" class="form-control" name="device_name_new" id="add-new-device" >
									</div>
                </div>

							</div>
              <br>
              <div class="row">
                <div class="col-6 col-12-small">
                  <div class="form-group">
                    <label for="device_time">Lehota</label>
                    <input type="text" name="device_time" id="time" data-toggle="datepicker" class="form-control" required>
                  </div>
                </div>
                <div class="col-6 col-12-small">
                  <div class="form-group">
                    <label for="device_revision">Dátum revízie</label>
                    <input type="text" name="device_revision" id="time2" data-toggle="datepicker" class="form-control data-picker" required>
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
  								<th class="device_revision">Vypršanie lehoty</th>
  								<th>Upraviť</th>
  								<th>Vymazať</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php foreach ($companyDevice as $key => $value):?>
  								<tr>
  									<td><?= $value['device_name'];  ?></td>
  									<td><?= $value['device_time'];  ?></td>
  									<td><?= $value['device_revision'];  ?></td>
  									<td><a href="/Device/update/<?= $value['device_id'];  ?>">Upraviť</a> </td>
  									<td><a href="#" data-toggle="modal" data-id="<?= $value['device_id'];  ?>" data-name="<?= $value['device_name'];  ?>" class="to-delete-person" data-target="#delete-person">Vymazať</td>

  								</tr>
  							<?php endforeach; ?>

  						</tbody>
  					</table>
  				</div>
        </section>


       <?php endif; ?>
			</section>

		</div>
	</div>

<?= $this->include('partials/form-success') ?>


<?= $this->endSection() ?>
