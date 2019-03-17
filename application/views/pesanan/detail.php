<div class="container detail-pesanan">
	<h1><?=$judul?></h1>

	<a href="<?=base_url();?>pesanan" class="btn btn-primary">Kembali</a>
	<a href="<?=base_url();?>pesanan/cetakPesanan/<?=$pesanan['id_pesanan']?>" class="btn btn-success" target="_blank"><b>Cetak
			PDF</b></a>

	<div class="card mt-3">
		<div class="card-header bg-white">

			<div class="row">
				<div class="col-lg-2 col-4">
					<p>ID Pemesanan</p>
				</div>
				<div class="col-lg-10 col-8">
					<p>:
						<?=$pesanan['id_pesanan'];?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-4">
					<p>Nama Pemesan</p>
				</div>
				<div class="col-lg-10 col-8">
					<p>:
						<?=$pesanan['username'];?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-4">
					<p>Nomor Telephone</p>
				</div>
				<div class="col-lg-10 col-8">
					<p>:
						<?=$pesanan['phone'];?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-4">
					<p>Alamat Pengiriman</p>
				</div>
				<div class="col-lg-10 col-8">
					<p>:
						<?=$pesanan['alamat'];?>,
						Kec.
						<?=$pesanan['nama_kec'];?>,
						<?=$pesanan['nama_kab'];?>,
						<?=$pesanan['nama_prov'];?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-4">
					<p>Status</p>
				</div>
				<div class="col-lg-10 col-8">
					<?php if ($pesanan['status'] == 0) : 
							echo ": Belum Lunas";
							else :
							echo ": Lunas";
							endif;
						?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-4">
					<p>Jasa Pengiriman</p>
				</div>
				<div class="col-lg-10 col-8">
					<p>:
						<?=$pesanan['jasa_pengiriman']; ?>
					</p>
				</div>
			</div>

		</div>
	</div>
	<div class="card-body">
		<div class="card-title text-center"><b>Daftar Pesanan</b></div>
		<table class="table table-striped">

			<thead>
				<tr>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Qty</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $total = 0; ?>
				<?php foreach ($detail as $d) :?>
				<tr>
					<td>
						<?=$d['nama_produk']?>
					</td>
					<td>
						<?="Rp " . number_format(300000, 2, ',', '.');?>
					</td>
					<td>
						<?=$d['jumlah_produk']?>
					</td>
					<td>
						<?="Rp " . number_format($d['total_harga'], 2, ',', '.');?>
					</td>

					<?php $total = $total+$d['total_harga']; ?>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-lg-9 col-8">
				<label class="float-right"><b>Total</b></label>
			</div>
			<div class="col-lg-3 col-4">
				<?="Rp " . number_format($total, 2, ',', '.');?>
			</div>
		</div>
		<div class="float-right">

		</div>
	</div>
</div>


</div>