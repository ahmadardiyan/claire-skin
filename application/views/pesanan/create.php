<div class="container">
	<h1><?=$judul?></h1>
	<br>

	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data">
				<!--isi <?=base_url();?>pesanan/insert -->

				<div class="form-group">
					<label for="nama">Nama Pemesan</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?=set_value('nama')?>">
					<small class="form-text text-danger">
						<?=form_error('nama')?></small>
				</div>

				<div class="form-group">
					<label for="phone">Nomor Telephone</label>
					<input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>">
					<small class="form-text text-danger">
						<?=form_error('phone')?></small>
				</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea name="alamat" class="form-control" id="alamat" name="alamat" cols="30" rows="3"><?=set_value('alamat')?></textarea>
					<small class="form-text text-danger">
						<?=form_error('alamat')?></small>
				</div>

				<div class="col-md-12">
					<div class="row justify-content-center">
						<div class="col-md-4">
							<div class="form-group">
								<label for="provinsi">Provinsi</label>
								<select class="form-control" name="provinsi" id="provinsi"></select>
								<small class="form-text text-danger">
									<?=form_error('provinsi')?></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="kabupaten">Kabupaten</label>
								<select class="form-control" name="kabupaten" id="kabupaten"></select>
								<small class="form-text text-danger">
									<?=form_error('kabupaten')?></small>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="kecamatan">Kecamatan</label>
								<select class="form-control" name="kecamatan" id="kecamatan"></select>
								<small class="form-text text-danger">
									<?=form_error('kecamatan')?></small>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="produk">Produk</label>

							<!-- Select Produk -->
							<select class="form-control" name="produk[]" id="produk" class="produk">
								<option value="">Pilih</option>
								<?php foreach ($produk as $p): ?>
								<option value="<?=$p['nama_produk'];?>">
									<?=$p['nama_produk'];?>
								</option>
								<?php endforeach;?>
							</select>

							<!-- Input Produk -->
							<!-- <input type="text" class="form-control" name="produk[]" id="produk" value="<?=set_value('produk[]')?>"> -->


							<small class="form-text text-danger">
								<?=form_error('produk[]')?></small>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="jumlah_produk">Jumlah Produk</label>

							<!-- <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk" min="1" value="<?=set_value('jumlah_produk')?>"> -->

							<input type="number" class="form-control" id="jumlah_produk[]" name="jumlah_produk[]" min="1" value="<?=set_value('jumlah_produk[]')?>">

							<small class="form-text text-danger">
								<?=form_error('jumlah_produk[]')?></small>
						</div>
					</div>
				</div>

				<!-- menampilkan input tambahan -->
				<div id="input-produk"></div>

				<!-- tambah input produk -->
				<!-- <a class="btn mb-3" id="tambah-inputan"><i class="fa fa-plus"></i></a> -->
				<a class="btn btn-small btn-primary text-white mb-3 mt-2" id="tambah-inputan" role="button">Tambah Produk</a>

				<!-- kurang input produk -->
				<!-- <a class="btn mb-3" id="kurang-inputan"><i class="fa fa-minus"></i></a> -->

				<div class="form-group">
					<label for="jasa_pengiriman">Jasa Pengiriman</label>
					<input type="text" class="form-control" id="jasa_pengiriman" name="jasa_pengiriman" value="<?=set_value('jasa_pengiriman')?>">
					<small class="form-text text-danger">
						<?=form_error('jasa_pengiriman')?></small>
				</div>

				<button id="submit" name="submit" type="submit" class="btn btn-success">Simpan</button>
				<a href="<?=base_url();?>produk" class="btn btn-primary">Kembali</a>
			</form>
		</div>
	</div>
</div>