<div class="page-content">
	<div class="page-header">
		<h1>
		<i class="fa fa-users"></i> Pesanan Service Dalam Pengerjaan
		</h1>
	</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
<br><br>
        <table id="dynatable" class="table table-striped table-bordered table-hover">
			<?php 
			if($this->session->userdata('level')=='admin') {
				?>
			<thead>
                <tr>
					<th class="center" width="15%">ID Pesanan</th>
					<th class="center" width="23%">Nama Pelanggan</th>
					<th class="center" width="23%">Laptop </th>
					<th class="center">Tanggal Masuk</th>
				</tr>
			</thead>
			
			<?php } else if($this->session->userdata('level')=='service') { ?>
				<thead>
                <tr>
					<th class="center" width="15%">ID Pesanan</th>
					<th class="center" width="23%">Nama Pelanggan</th>
					<th class="center" width="23%">Laptop </th>
					<th class="center">Tanggal Masuk</th>
					<th class="center" >Actions</th>
				</tr>
				<?php } ?>
			</thead>

			<tbody>
			<!-- PHP -->
			<tr>
			<?php 
			$no = 1;
			foreach ($service as $s) {
			?>
				<td class="center"><?php echo $no++;?></td>
				<td class="center"><?php echo $s->nama; ?></td>
				<td class="center"><?php echo $s->laptop; ?></td>
				<td class="center"><?php echo $s->tgl_coba; ?></td>
				<td class="center">
				<button class="btn btn-danger" onclick="delpes(<?=$s->id_coba;?>)"><i class="fa fa-close"></i> Delete</button>
			</tr>
			<?php  } ?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>