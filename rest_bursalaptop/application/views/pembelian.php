<div class="page-content">
	<div class="page-header">
		<h1>
		<b>Pesanan Service<b>
		</h1>
	</div><!-- /.page-header -->


<div id="view_beli">



</div>

<!--OPEN MODAL CARI BARANG-->
<div id="cr-brg_beli" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div style ="text-align: center" class="modal-header">
			<a href="<?php echo base_url();?>pembelian" class="close">&times;</a>
		<h3>Pesan Service<h3>
		</div>
		<form class="form-horizontal" method="post" role="form" action="#">
		<div class="modal-body">
		
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="col-sm-4 control-label no-padding-right" for="form-field-1-1"> Nama Pelanggan </label>
					<div class="col-sm-8">
						<input type="text" class="col-xs-10 col-sm-11" name="nama_pelanggan" id="nama_pelanggan" required="true" />
					</div>
				</div>
			</div>
			<div class="col-sm-6">	
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Alamat </label>
					<div class="col-sm-9">
						<input type="text" class="col-xs-10 col-sm-11" name="alamat" id="alamat" required="true" />
					</div>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> No HP </label>
				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-4" name="no_hp" id="no_hp" required="true" />
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Merk Laptop</label>
				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-4" name="merk" id="merk" required="true" />
				</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Type Laptop </label>
				<div class="col-sm-9">
					<input type="text" class="col-xs-10 col-sm-4" name="merk" id="merk" required="true" />
				</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Kerusakan </label>
				<div class="col-sm-9">
					<textarea type="text" class="col-xs-10 col-sm-5" name="merk" id="merk" required="true" ></textarea>
				</div>
		</div>

		<h5>Kelengkapan dan kondisi :<h5>

		<div class="form-group">
			<label style="margin-right:10px" class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Layar </label>
				<div class="col-sm-6">
				<div class ="clear-fix"></div>
					<input type="radio" name="layar" value="baik" > Baik
  					<input  style="margin-left:40px" type="radio" name="layar" value="rusak"> Rusak
				</div>
		</div>

		<div class="form-group">
			<label style="margin-right:10px" class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Keyboard </label>
				<div class="col-sm-6">
				<div class ="clear-fix"></div>
					<input type="radio" name="keyboard" value="baik" > Baik
  					<input  style="margin-left:40px"type="radio" name="keyboard" value="rusak"> Rusak
				</div>
		</div>

		<div class="form-group">
			<label style="margin-right:10px" class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Hardisk </label>
				<div class="col-sm-6">
				<div class ="clear-fix"></div>
					<input type="radio" name="hardisk" value="baik" > Baik
  					<input  style="margin-left:40px"type="radio" name="hardisk" value="rusak"> Rusak
				</div>
		</div>

		<div class="form-group">
			<label style="margin-right:10px" class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> OS </label>
				<div class="col-sm-6">
				<div class ="clear-fix"></div>
					<input type="radio" name="os" value="baik" > Baik
  					<input  style="margin-left:40px"type="radio" name="os" value="rusak"> Rusak
				</div>
		</div>
		
		<div class="form-group">
			<label style="margin-right:10px" class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Speaker </label>
				<div class="col-sm-6">
				<div class ="clear-fix"></div>
					<input type="radio" name="speaker" value="baik" > Baik
  					<input  style="margin-left:40px"type="radio" name="speaker" value="rusak"> Rusak
				</div>
		</div>

		<div class="form-group">
			<label style="margin-right:10px" class="col-sm-2 control-label no-padding-right" for="form-field-1-1"> Charger </label>
				<div class="col-sm-6">
				<div class ="clear-fix"></div>
					<input type="radio" name="charger" value="ada" > Ada
  					<input  style="margin-left:40px"type="radio" name="charger" value="tidak ada"> Tidak Ada
				</div>
		</div>

		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-success" id="savecust"><i class="fa fa-save"></i> Simpan</button>
		<button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Reset</button>
		</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
</form>

	
	
		</div>
		</div>
	</div>
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</div>
</div>