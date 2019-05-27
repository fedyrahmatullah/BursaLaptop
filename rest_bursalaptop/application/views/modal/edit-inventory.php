<div class="page-content">
<div class="page-header">
	<h1>
	EDIT INVENTORY BARANG
	<div class="modal-header">
		<a href="<?php echo base_url();?>inventory" class="close">&times;</a>
	</div>
	</h1>
	
</div>
<!-- /.page-header -->
<div class="row">
<div class="col-xs-12"><br>
<?php foreach ($brg as $b) { ?>
	<form class="form-horizontal" method="post" role="form" action="<?php echo base_url();?>inventory/update_brg">
	<div class="modal-body">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Barang</label>
			<div class="col-sm-9">
				<input type="hidden" value="<?php echo $b->id;?>" name="id">
				<input type="text" id="form-field-1" placeholder="Layanan" class="col-xs-10 col-sm-8" name="nama" value="<?php echo $b->nama;?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Kategori</label>
			<div class="col-sm-9">
				<select class="col-sm-3" id="d_kat" name="kategori">
					<option><?=$b->kategori;?></option>
					<?php foreach ($get_kat as $g) { ?>
					<option><?=$g->kategori;?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis</label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-8" name="jenis" value="<?php echo $b->jenis;?>" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga Beli</label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-8" name="harga_beli" value="<?php echo $b->harga_beli;?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga Jual</label>
			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-8" name="harga_jual" value="<?php echo $b->harga_jual;?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Stok</label>
			<div class="col-sm-9">
				<input type="text" readonly="true" id="form-field-1" class="col-xs-10 col-sm-8" name="stok" value="<?php echo $b->stok;?>" />
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-success" name="add-inventory"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
	</div>
	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>
<?php } ?>
</div>
</div>
</div>