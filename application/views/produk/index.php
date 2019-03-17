<div class="container daftar-produk">
 
	<h1><?=$judul?></h1>

	<?php if ($this->session->flashdata('flash')): ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		Produk <strong>berhasil</strong>
		<?=$this->session->flashdata('flash');?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<?php endif;?>

	<a href="<?=base_url();?>produk/create" class="btn btn-primary mt-3 tambah-produk">
		<i class="fas fa-plus"></i>
		<b> Tambah Produk</b>
	</a>

	<br><br>

	<div class="table-responsive">
		<table class="table table-striped text-center" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Jenis Produk</th>
					<th>Foto</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nama</th>
					<th>Jenis Produk</th>
					<th>Foto</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($produk as $p): ?>
				<tr>
					<td>
						<?=$p['nama_produk']?>
					</td>
					<td>
						<?=$p['jenis_produk']?>
					</td>
					<td>
						<img src="<?=base_url();?>assets/img/produk/<?=$p['foto_produk']?>" height="50px" width="50px" alt="<?=$p['foto_produk']?>"
						 class="img-thumbnail">
					</td>
					<td>
						<?="Rp " . number_format($p['harga_produk'], 2, ',', '.');?>
					</td>
					<td>
						<?=$p['jumlah_produk']?>
					</td>
					<td>
						<a href="<?=base_url();?>produk/detail/<?=$p['id_produk']?>" class="btn btn-sm btn-primary mb-2">Detail</a>
						<a href="<?=base_url();?>produk/update/<?=$p['id_produk']?>" class="btn btn-sm btn-success mb-2">Edit</a>
						<a href="<?=base_url();?>produk/delete/<?=$p['id_produk']?>" class="btn btn-sm btn-danger mb-2" onclick="return confirm('Anda yakin ingin menghapus data produk ?');">Delete</a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>

</div>
<!-- end container -->