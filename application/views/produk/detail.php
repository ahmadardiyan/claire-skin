<!-- container -->
<div class="container">

	<h1><?=$judul?></h1>

	<div class="row detail-produk mt-5">
		<div class="col-lg-6 text-center ">
			<img src="<?=base_url();?>assets/img/produk/<?=$produk['foto_produk']?>" alt="<?=$produk['foto_produk']?>" class="img-fluid">
		</div>
		<div class="col-lg-5">
			<h3><?=$produk['nama_produk']?></h3>
			<h4 class="mb-2 text-muted"><?="Rp " . number_format($produk['harga_produk'],2,',','.');?></h2>
			<p><?=$produk['deskripsi_produk']?></p>
			<a href="<?=base_url();?>produk/update/<?=$produk['id_produk']?>" class="btn btn-success">Edit Produk</a>
			<a href="<?=base_url();?>produk" class="btn btn-primary">Kembali</a>
		</div>
	</div>

</div>
<!-- end container -->
