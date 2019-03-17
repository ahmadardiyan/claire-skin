<div class="container">
	<h1><?=$judul?></h1>
	<br>

	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama">Nama Produk</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?=set_value('nama')?>">
					<small class="form-text text-danger">
						<?=form_error('nama')?></small>
				</div>

				<div class="form-group">
					<label for="deskripsi">Deskripsi Produk</label>
					<textarea name="deskripsi" class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="3"><?=set_value('deskripsi')?></textarea>
					<small class="form-text text-danger">
						<?=form_error('deskripsi')?></small>
				</div>

				<!-- Jenis Sebaiknya dibikin DB sendiri -->
				<div class="form-group">
					<label for="jenis">Jenis Produk</label>
					<select class="custom-select" id="jenis" name="jenis">
						<option value="">Pilih</option>
						<?php foreach ($jenis as $j): ?>
						<option value="<?=$j['nama_jenis'];?>">
							<?=$j['nama_jenis'];?>
						</option>
						<?php endforeach;?>
					</select>
					<small class="form-text text-danger">
						<?=form_error('jenis')?></small>
				</div>

				<div class="form-group">
					<label for="harga">Harga Produk</label>
					<input type="number" class="form-control" id="harga" name="harga" min="0" value="<?=set_value('harga')?>">
					<small class="form-text text-danger">
						<?=form_error('harga')?></small>
				</div>

				<div class="form-group">
					<label for="jumlah">Jumlah Produk</label>
					<input type="number" class="form-control" id="jumlah" name="jumlah" value="<?=set_value('jumlah')?>">
					<small class="form-text text-danger">
						<?=form_error('jumlah')?></small>
				</div>

				<div class="form-group">
					<label for="foto">Foto Produk</label>
					<input type="file" class="form-control-file" id="foto" name="foto" value="<?=set_value('foto')?>">
					<small class="form-text text-danger">
						<?=form_error('foto')?></small>
				</div>


				<button id="submit" name="submit" type="submit" class="btn btn-success">Simpan</button>
				<a href="<?=base_url();?>produk" class="btn btn-primary">Kembali</a>
			</form>
		</div>
	</div>
</div>