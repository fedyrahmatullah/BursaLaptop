	<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='developer') {
	?>
<?php } ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo base_url();?>pembelian/add_cart">

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> ID Pesanan </label>
	<div class="col-sm-9">
		<input type="text" placeholder="nomor" class="col-xs-10 col-sm-5" name="nonota" value="AUTO" readonly="true" />
	</div>
	</div>

	<div class="form-group" >
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pesan Service  </label>
	<div class="col-sm-5">
	
		<button class="btn btn-primary" id="fil_brg_beli" type="button"><i class="fa fa-plus"></i> Pesan Service</button>
	</div>
	</div>

	<!-- <div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tambah Barang Baru </label>
	<div class="col-sm-5">
	
		<button class="btn btn-success" type="button" data-toggle="modal" data-target="#add-brg"><i class="fa fa-plus"></i> Tambah Barang</button>
	</div>
	</div> -->

	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
	</form>
	<div class="space-4"></div>

</div>


<?php echo br(3);?>

<div class="table-responsive">

<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='admin') {
	?>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="10%">ID Pesan</th>
					<th class="center" width="20%">Nama Pelanggan</th>
					<th class="center" width="20%">Laptop</th>
					<th class="center" width="20%">Tanggal Pesan</th>
					<th class="center" width="20%">Actions</th>
				</tr>	
			</thead>
			<tbody>
			<!-- PHP -->
				<?php 
				foreach ($cart as $items) { ?>
			<tr>
				<td class="center"><?php echo $items->id_pesan ;?></td>
				<td class="center"><?php echo $items->nama_pelanggan;?></td>
				<td class="center"><?php echo $items->tgl_pesan?></td>
				<td contenteditable="true" onBlur="updatepembelian(this,'qty','<?php echo $items->id; ?>')" onClick="showEdit(this);"><?php echo $items->qty; ?></td>
				<td>
				<a href="<?php echo base_url();?>pembelian/del_cart/<?php echo $items->no;?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
				</td>
			</tr>

		<?php } ?>
			</tbody>
		</table>
<?php } else { ?>
	<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center" width="15%">ID Pesanan</th>
					<th class="center" width="23%">Nama Pelanggan</th>
					<th class="center" width="23%">Laptop </th>
					<th class="center">Tanggal Masuk</th>
					<th class="center" >Actions</th>
				</tr>
			</thead>
			<tbody>
			<!-- PHP -->
				<?php 
				$no = 1;
				foreach ($cart as $items) { ?>
			<tr>
				<td class="center"><?php echo $no++ ;?></td>
				<td class="center"><?php echo $items->name;?></td>
				<td contenteditable="true" onBlur="updatepembelian(this,'qty','<?php echo $items->id; ?>')" onClick="showEdit(this);"><?php echo $items->qty; ?></td>
				<td>
				<a href="<?php echo base_url();?>pembelian/del_cart/<?php echo $items->no;?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a>
				</td>
			</tr>

		<?php } ?>
			</tbody>
		</table>
<?php } ?>
</div>
<script type="text/javascript">
	$('#fil_brg_beli').click(function(){
			$('#cr-brg_beli').modal('show');
			cr_brg_beli();
	});
</script>
