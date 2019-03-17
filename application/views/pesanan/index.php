<div class="container">

	<h1><?=$judul?></h1>

	<!-- FlashData Notifikasi Berhasil-->
	<?php if ($this->session->flashdata('flash')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		Pesanan <strong>berhasil</strong>
		<?=$this->session->flashdata('flash');?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif;?>

	<!-- FlashData Notifikasi Gagal Cari-->
	<?php if ($this->session->flashdata('cari-pesanan')): ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?=$this->session->flashdata('cari-pesanan');?> <strong>kosong</strong>!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php endif;?>


	<div class="row mt-3 ml-auto">
	
		<a href="<?=base_url();?>pesanan/create" class="btn btn-primary float-right mr-2 mb-2">
			<i class="fas fa-plus"></i>
			<b>Tambah Pesanan</b>
    </a>

    <a href="<?=base_url();?>pesanan/cetakPesananByTime" class="btn btn-success float-right mr-2 mb-2" target="_blank">		
			<b>Cetak PDF</b>
    </a>

	</div>


	<form action="" method="post">
		<div class="row mt-3 ml-auto form-cari-tanggal">
			<div class="col-lg-2">
				<input type="text" class="form-control tanggal mb-2" name="tanggal-awal" id="tanggal-awal" placeholder="Dari Tanggal">
			</div>
			<div class="col-lg-2">
				<input type="text" class="form-control tanggal mb-2" name="tanggal-akhir" id="tanggal-akhir" placeholder="Sampai Tanggal">
			</div>
			<div class="col-lg-2">
				<!-- <a href="#" class="btn btn-success" role="button">Cari</a> -->
				<button class="btn btn-success" role="button" name="cari-pesanan">Cari</button>
			</div>
		</div>
	</form>


	<div class="table-responsive pt-4">
		<table class="table table-striped text-center" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID Pesanan</th>
					<th>Nama</th>
					<th>No.Telphone</th>
					<th>Alamat</th>
					<!-- <th>Produk</th>
					<th>Jumlah Barang</th> -->
					<th>Total Bayar</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>ID Pesanan</th>
					<th>Nama</th>
					<th>No.Telphone</th>
					<th>Alamat</th>
					<!-- <th>Produk</th>
					<th>Jumlah Barang</th> -->
					<th>Total Bayar</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($pesanan as $key => $p): ?>
				<tr>
					<td>
						<?=$p['id_pesanan']?>
					</td>
					<td>
						<?=$p['username']?>
					</td>
					<td>
						<?=$p['phone']?>
					</td>
					<td>
						<?=$p['nama_kab']?>
					</td>

					<!-- <td> -->
					<!-- <?=$p['nama_produk']?> -->
					<!-- produk -->
					<!-- </td> -->
					<!-- <td> -->
					<!-- <?=$p['jumlah_produk']?> -->
					<!-- </td> -->

					<?php 
					$subtotal = 0;
					foreach ($detail as $d) {
						
						if ($d['id_pesanan'] == $p['id_pesanan']) {
							$subtotal += $d['total_harga'];
						}
					}
					?>

					<td>
						<?="Rp " . number_format($subtotal, 2, ',', '.');?>

					</td>

					<td>
						<?php if ($p['status'] == 0):
    echo "Belum Lunas";
else:
    echo "Lunas";
endif;
?>
					</td>
					<td>
						<a href="<?=base_url();?>pesanan/konfirmasi/<?=$p['id_pesanan']?>" class="btn btn-sm btn-info mb-2">Konfirmasi</a>
						<a href="<?=base_url();?>pesanan/detail/<?=$p['id_pesanan']?>" class="btn btn-sm btn-primary mb-2">Detail</a>
						<a href="<?=base_url();?>pesanan/delete/<?=$p['id_pesanan']?>" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Anda yakin ingin menghapus data produk ?');">Delete</a>
					</td>

				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>

</div>
<!-- end container -->