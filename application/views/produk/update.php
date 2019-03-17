<div class="container">
	<h1><?=$judul?></h1>
	<br>

	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="" method="post" enctype="multipart/form-data">

				<input type="hidden" name="id_produk" value="<?=$produk['id_produk']?>">
				<input type="hidden" name="foto_lama" value="<?=$produk['foto_produk'];?>">
				<small class="form-text text-danger">
					<?=form_error('foto_lama')?>
				</small>

				<div class="form-group">
					<label for="nama">Nama Produk</label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?=$produk['nama_produk']?>">
					<small class="form-text text-danger">
						<?=form_error('nama')?></small>
				</div>

				<div class="form-group">
					<label for="deskripsi">Deskripsi Produk</label>
					<textarea name="deskripsi" class="form-control" id="deskripsi" name="deskripsi" cols="30" rows="3"><?=$produk['deskripsi_produk']?></textarea>
					<small class="form-text text-danger">
						<?=form_error('deskripsi')?></small>
				</div>

				<div class="form-group">
					<label for="jenis">Jenis Produk</label>
					<select class="form-control" id="jenis" name="jenis">
						<option value="">Pilih</option>
						<?php foreach( $jenis as $j) : ?>
						<?php if ($j['nama_jenis'] == $produk['jenis_produk']) :?>
						<option value="<?= $j['nama_jenis'] ;?>" selected>
							<?= $j['nama_jenis'] ;?>
						</option>
						<?php else :?>
						<option value="<?= $j['nama_jenis'] ;?>">
							<?= $j['nama_jenis'] ;?>
						</option>
						<?php endif; ?>
						<?php endforeach; ?>
					</select> 
					<small class="form-text text-danger">
						<?=form_error('jenis')?></small>
				</div>

				<div class="form-group">
					<label for="jumlah">Jumlah Produk</label>
					<input type="number" class="form-control" id="jumlah" name="jumlah" value="<?=$produk['jumlah_produk']?>">
					<small class="form-text text-danger">
						<?=form_error('jumlah')?></small>
				</div>

				<div class="form-group">
					<label for="harga">Harga Produk</label>
					<input type="number" class="form-control" id="harga" name="harga" value="<?=$produk['harga_produk']?>">
					<small class="form-text text-danger">
						<?=form_error('harga')?></small>
				</div>

				<div class="form-group">
					<label for="foto">Foto Produk</label><br>
					<img class="img-thumbnail mb-2" src="<?=base_url();?>assets/img/produk/<?=$produk['foto_produk']?>" width="100px"
					 height="100px">
					<input type="file" class="form-control-file" id="foto" name="foto">
					<small class="form-text text-danger">
						<?=form_error('foto')?>
					</small>
				</div>

				<button id="submit" name="submit" type="submit" class="btn btn-success">Simpan</button>
				<a href="<?=base_url();?>produk" class="btn btn-primary">Kembali</a>
			</form>
		</div>
	</div>
</div>