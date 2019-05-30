<div class="page-content">
	<div class="page-header">
		<h1>
		<i class="fa fa-users"></i> PELANGGAN
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-pel"><i class="fa fa-plus"></i> Tambah</button>
<br><br>
<table id="dynatable" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">No</th>
					<th class="center">Nama</th>
					<th class="center">Alamat</th>
					<th class="center">Email</th>
					<th class="center">No HP</th>
					<th class="center">Password</th>
					<th class="center" width="15%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($pelanggan as $p) {
			?>
				<td class="center"><?php echo $no++;?></td>
				<td class="center"><?php echo $p->nama_pelanggan; ?></td>
				<td class="center"><?php echo $p->alamat; ?></td>
				<td class="center"><?php echo $p->email; ?></td>
				<td class="center"><?php echo $p->no_hp; ?></td>
				<td class="center"><?php echo $p->password; ?></td>
				<td class="center">
				<button class="btn btn-danger" onclick="delcust(<?=$p->id_pelanggan;?>)"><i class="fa fa-close"></i> Delete</button>
			</tr>
			<?php  } ?>
			</tbody>
		</table>
</div>
</div>
</div>

<!--OPEN MODAL ADD PELANGGAN-->
<div id="add-pel" class="modal fade" role="dialog">
<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>pelanggan" class="close">&times;</a>
		Tambah Pelanggan
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?=base_url();?>pelanggan/simpan_pelanggan">
		<div class="modal-body">
			<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-6" name="nama_pelanggan" id="nama_pelanggan" required="true" />
	</div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
		<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-6" name="alamat" id="alamat" required="true" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Email </label>
		<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-6" name="email" id="email" required="true" />
		</div>
	</div>
	<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> No HP </label>
				<div class="col-sm-9">
				<input type="text" class="col-xs-10 col-sm-5" name="no_hp" id="no_hp" required="true" />
				</div>
			</div>
	<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>
				<div class="col-sm-9">
				<input type="password" id="form-field-1" class="col-xs-10 col-sm-6" name="password" />
				</div>
			</div>
		</div>
		<div class="modal-footer">
		<button type="submit" class="btn btn-success" id="savecust"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
	</div>
</div>
</div>



</div>
</div>
