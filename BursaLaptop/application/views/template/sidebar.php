<div class="main-container" id="main-container">
<?php 
if($this->session->userdata('level')=='owner') {
?>
<div id="sidebar" class="sidebar responsive">
<ul class="nav nav-list">
	<li class="<?php 
		if($sidebar=='Dashboard') {
		if(isset($menu)) { 
		echo $menu; } else {
		echo "";
		}
		}	
		?>">
			<a href="<?php echo base_url();?>dashboard">
				<i class="menu-icon fa fa-home"></i>
				<span class="menu-text">Dashboard</span>
			</a>
			<b class="arrow"></b>
		</li>
	
		<li class="<?php 
	if($sidebar=='Admin') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>admin">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text">Pegawai</span>
		</a>
		<b class="arrow"></b>
	</li>
	
	<li class="
	<?php 
	if($sidebar=='Daftar Barang') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>inventory">
			<i class="menu-icon fa fa-cubes"></i>
			<span class="menu-text">Daftar Barang</span>
		</a>
		<b class="arrow"></b>
	</li>

	
	<li class="<?php 
	if($sidebar=='Kategori') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-database"></i>
			<span class="menu-text"> Kategori </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url();?>kategori">
					<i class="menu-icon fa fa-database"></i>
					Kategori Barang
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url();?>kategori/sub_kat">
					<i class="menu-icon fa fa-database"></i>
					Sub Kategori
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>

	<li class="<?php 
	if($sidebar=='Pelanggan') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>pelanggan">
			<i class="menu-icon fa fa-users"></i>
			<span class="menu-text">Pelanggan</span>
		</a>
		<b class="arrow"></b>
	</li>

	<!--<li class="<?php 
	if($sidebar=='Penjualan') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>penjualan">
			<i class="menu-icon fa fa-shopping-cart"></i>
			<span class="menu-text">Penjualan</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="<?php 
	if($sidebar=='Pembelian') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>pembelian">
			<i class="menu-icon fa fa-cube"></i>
			<span class="menu-text">Pesanan Service </span>
			<span class="badge badge-danger">0</span>
		</a>
		<b class="arrow"></b>
	</li>-->


	<!--<li class="<?php 
	if($sidebar=='Tukar_tambah') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>tukar_tambah">
			<i class="menu-icon fa fa-paper-plane"></i>
			<span class="menu-text">Tukar Tambah</span>
		</a>
		<b class="arrow"></b>
	</li>-->

			<!-- <li class="">
				<a href="<?php echo base_url();?>akunting/neraca_percobaan">
					<i class="menu-icon fa fa-book"></i>
					Neraca Percobaan
				</a>

				<b class="arrow"></b>
			</li> -->

			<!--<li class="">
				<a href="<?php echo base_url();?>akunting/lap_rugi_laba">
					<i class="menu-icon fa fa-book"></i>
					Laporan Rugi Laba
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>akunting/neraca">
					<i class="menu-icon fa fa-book"></i>
					Neraca
				</a>

				<b class="arrow"></b>
			</li>


		</ul>
	</li>



	<li class="<?php 
	if($sidebar=='Laporan') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-book"></i>
			<span class="menu-text"> Laporan </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url();?>laporan/lap_penjualan">
					<i class="menu-icon fa fa-book"></i>
					Lap.Penjualan
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>laporan/lap_pembelian">
					<i class="menu-icon fa fa-book"></i>
					Lap.Pembelian
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="<?php echo base_url();?>laporan/lap_brg_keluar">
					<i class="menu-icon fa fa-book"></i>
					Lap.Stock Opname
				</a>

				<b class="arrow"></b>
			</li>
	</li>-->


</ul>
<!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>

<?php } 
//navbar admin
else if ($this->session->userdata('level')=='admin'){ ?>
<div id="sidebar" class="sidebar responsive">
<ul class="nav nav-list">
	<li class="<?php 
	if($sidebar=='Dashboard') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>dashboard">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text">Dashboard</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="<?php 
	if($sidebar=='Pelanggan') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>pelanggan">
			<i class="menu-icon fa fa-users"></i>
			<span class="menu-text">Pelanggan</span>
		</a>
		<b class="arrow"></b>
	</li>


	<li class="<?php 
	if($sidebar=='Kategori') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-database"></i>
			<span class="menu-text"> Tambah Kategori </span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url();?>kategori">
					<i class="menu-icon fa fa-database"></i>
					Kategori Barang
				</a>

				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url();?>kategori/sub_kat">
					<i class="menu-icon fa fa-database"></i>
					Jenis Barang
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>
	
	<li class="
	<?php 
	if($sidebar=='Daftar Barang') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>inventory">
			<i class="menu-icon fa fa-cubes"></i>
			<span class="menu-text">Daftar Barang</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="<?php 
	if($sidebar=='Pesanan Service') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>pembelian">
			<i class="menu-icon fa fa-paper-plane"></i>
			<span class="menu-text">Pesanan Service </span>
			<span class="badge badge-danger">0</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="<?php 
	if($sidebar=='Servicedikerjakan') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>Servicedikerjakan">
			<i class="menu-icon fa fa-wrench"></i>
			<span class="menu-text">Service dikerjakan</span>
		</a>
		<b class="arrow"></b>
	</li>

</ul>

<!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>


<?php } 
//navbar Bagian service
else if ($this->session->userdata('level')=='service'){ ?>
<div id="sidebar" class="sidebar responsive">
<ul class="nav nav-list">
	<li class="<?php 
	if($sidebar=='Dashboard') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>Dashboard">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text">Dashboard</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="<?php 
	if($sidebar=='Servicedikerjakan') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>Servicedikerjakan">
			<i class="menu-icon fa fa-wrench"></i>
			<span class="menu-text">Pesanan Dikerjakan</span>
		</a>
		<b class="arrow"></b>
	</li>

	<li class="
	<?php 
	if($sidebar=='Daftar Barang') {
	if(isset($menu)) { 
	echo $menu; } else {
	echo "";
	}
	}	
	?>">
		<a href="<?php echo base_url();?>inventory">
			<i class="menu-icon fa fa-cubes"></i>
			<span class="menu-text">Daftar Barang</span>
		</a>
		<b class="arrow"></b>
	</li>

</ul>




<!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<script type="text/javascript">
	try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>


<?php } ?>


<div class="main-content">
<div class="main-content-inner">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#"><?php echo $this->session->userdata('level'); ?></a>
			</li>
			<li>
				<a href="#"><?php echo $sidebar; ?></a>
			</li>

			<li>
				<a href="#"><?php 
				if(isset($sidebar2)) { 
				echo $sidebar2; 
				} else {
				echo "";
				} 
				?></a>
			</li>
		</ul><!-- /.breadcrumb -->
	</div>

	