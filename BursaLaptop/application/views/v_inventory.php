<?php 
if($this->session->userdata('level')=='owner' || $this->session->userdata('level')=='admin') {
	?>
<!--DATA INVENTORY-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-barang"><i class="fa fa-plus"></i> Tambah Barang</button>
<br><br>
<table id="dynatable" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center" width="5%">No</th>
			<th class="center">Nama Barang</th>
			<th class="center">Kategori</th>
			<th class="center">Jenis</th>
			<th class="center">Harga Beli</th>
			<th class="center">Harga Jual</th>
			<th class="center">Stok</th>
			<th class="center" width="10%">Actions</th>
		</tr>
	</thead>
	<tbody>

	</tbody>
</table>

<!--Open Modal TAMBAH BARANG-->
<div id="add-barang" class="modal fade" role="dialog">
<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
				<a href="<?php echo base_url();?>inventory" class="close">&times;</a>
		Tambah Barang
		</div>
		<form class="form-horizontal" method="post" role="form" action="<?=base_url();?>inventory/simpan_barang">
		<div class="modal-body">
			<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nama Barang </label>
	<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-6" name="nama" id="nama" required="true" />
	</div>
	</div>

	<div class="form-group">
	<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Kategori </label>
			<div class="col-sm-9">
				<select class="form-control" name="kategori" id="kategori">
         	      	<option>Pilih Kategori</option>
							<?php 
							foreach ($kategori as $k) {
							?>
					<option><?php echo $k->kategori;?></option>
							<?php } ?>
				</select>
			</div>	
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Jenis </label>
		<div class="col-sm-9">
		<input type="text" class="col-xs-10 col-sm-6" name="jenis" id="jenis" required="true" />
		</div>
	</div>
	<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Harga Beli </label>
				<div class="col-sm-9">
				<input type="number" class="col-xs-10 col-sm-5" name="harga_beli" id="harga_beli" required="true" />
				</div>
			</div>
	<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Harga Jual</label>
				<div class="col-sm-9">
				<input type="number" id="harga_jual" class="col-xs-10 col-sm-6" name="harga_jual" />
				</div>
			</div>
	<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Stok</label>
				<div class="col-sm-9">
				<input type="number" id="stok" class="col-xs-10 col-sm-6" name="stok" />
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
<!--TAMBAH BARANG-->
	
	<h4>Tambah Barang Baru</h4>
		<table id="dynatable" class="table table-striped table-bordered table-hover" action="<?php echo base_url();?>admin/add_data_ajax" >
			<thead>
				<tr>
					<th class="center" width="5%">No</th>
					<th class="center">Nama Barang</th>
					<th class="center">Kategori</th>
					<th class="center">Jenis</th>
					<th class="center">Harga Beli</th>
					<th class="center">Harga Jual</th>
					<th class="center">Stok</th>
					<th class="center" width="20%">Actions</th>
				</tr>
			</thead>
			<tbody>
			<tr>  
          	<td></td>  
            <td><div id="col_nama"  contenteditable="true" style="height: 55px;"></div></td>  
            <td><div id="col_kat"  style="height: 55px;">
            <select class="form-control" name="kategori" id="d_kat">
               <option>Pilih Kategori</option>
						<?php 
						foreach ($kategori as $k) {
						?>
					<option><?php echo $k->kategori;?></option>
						<?php } ?>
				</select>
               </div>
            </td>  
            <td>
            	<select class="form-control" id="d_jenis">
            		<option></option>
            	</select>
            </td>  
            <td><div id="col_harga_b" contenteditable="true" style="height: 55px;"></div></td>  
            <td><div id="col_harga_j" contenteditable="true" style="height: 55px;"></div></td>
            <td><div id="col_stok" contenteditable="true" style="height: 55px;"></div></td>  
            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-success"><i class="fa fa-plus"   action="<?php echo base_url();?>admin/add_data_ajax"></i> Tambah</button></td>  
        	</tr>
		</tbody>
	</table>
	<?php } 
	
	//tampilan admin
	else { ?>

	<table id="dynatable1" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center" width="5%">No</th>
			<th class="center">Nama Barang</th>
			<th class="center">Kategori</th>
			<th class="center">Jenis</th>
			<th class="center">Harga Jual</th>
			<th class="center">Stok</th>
		</tr>
	</thead>
</table>
<?php } ?>

<script type="text/javascript">
	// $('#dynatable').dynatable();
	$('#dynatable').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('inventory/ajax_barang');?>",
            "type": "POST"
        },
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });
	$('#dynatable1').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=base_url('inventory/ajax_barang_2');?>",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
	$('#d_kat').change(function(){ // CARI KATEGORI DYNAMIC 
		var kat = $(this).find('option:selected').text();
		$.ajax({
			url 	: '<?=base_url();?>inventory/cari_kat',
			type 	: 'POST',
			data 	: 'kat=' + kat + '&<?php echo $this->security->get_csrf_token_name(); ?>='+ '<?php echo $this->security->get_csrf_hash(); ?>',
			dataType: 'text',
			success:function(data) {
				$('#d_sub_1').html(data);
			}
		});
	});
</script>
