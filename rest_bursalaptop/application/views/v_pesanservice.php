<div class="col-xs-6">
<form method="post" class="form-horizontal" action="<?php echo base_url();?>tukar_tambah/save_TT">
	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
	<div class="col-sm-9">
		<select class="select_nm_pel col-xs-10 col-sm-5" name="nama_pelanggan" id="pelanggan" style="width: 50%">
		<option> Nama Pelanggan </option>
		<?php foreach ($pelanggan as $p) { ?>
			<option value="<?php echo $p->no; ?>" data-alamat="<?php echo $p->alamat; ?>" data-hp="<?php echo $p->no_hp; ?>">
			<?php echo $p->nama; ?></option>
		<?php } ?>
		</select>
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="alamat" required="true" id="alamat_pel" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No HP </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="no_hp" required="true" id="no_hp_pel" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Garansi </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-5" name="garansi" required="true"  />
	</div>
	</div>