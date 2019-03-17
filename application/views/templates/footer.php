


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?=base_url();?>assets/js/jquery-3.3.1.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
 crossorigin="anonymous"></script>

<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->

<!-- Core plugin JavaScript-->
<script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?=base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom JavaScript -->
<script src="<?=base_url();?>assets/js/script.js"></script>

<!-- Demo scripts for this page-->
<script src="<?=base_url();?>assets/js/demo/datatables-demo.js"></script>

<!-- DatePicker -->
<script src="<?=base_url();?>assets/js/datepicker/bootstrap-datepicker.js"></script>



<!-- Get Select Alamat -->
<script type="text/javascript">
	$(document).ready(function () {
		$("#provinsi").append('<option value="">Pilih</option>');
		$("#kabupaten").html('');
		$("#kecamatan").html('');
		$("#kelurahan").html('');
		$("#kabupaten").append('<option value="">Pilih</option>');
		$("#kecamatan").append('<option value="">Pilih</option>');
		url = '<?=base_url();?>wilayah/provinsi';
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				for (var i = 0; i < result.length; i++) {
					// if (result[i].id_prov == <?=set_value('provinsi')?>) {
					// 	$("#provinsi").append('<option value="' + result[i].id_prov + '" selected >' + result[i].nama_prov + '</option>');
					// } else {
						$("#provinsi").append('<option value="' + result[i].id_prov + '">' + result[i].nama_prov + '</option>');
					// }
				}
			}
		});
	});
	$("#provinsi").change(function () {
		var id_prov = $("#provinsi").val();
		var url = '<?=base_url();?>wilayah/kabupaten/' + id_prov;
		$("#kabupaten").html('');
		$("#kecamatan").html('');
		$("#kelurahan").html('');
		$("#kabupaten").append('<option value="">Pilih</option>');
		$("#kecamatan").append('<option value="">Pilih</option>');
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				for (var i = 0; i < result.length; i++) {
					// if (result[i].id_kab == set_value)
					$("#kabupaten").append('<option value="' + result[i].id_kab + '">' + result[i].nama_kab + '</option>');
				}
			}
		});
	});
	$("#kabupaten").change(function () {
		var id_kab = $("#kabupaten").val();
		var url = '<?=base_url();?>wilayah/kecamatan/' + id_kab;
		$("#kecamatan").html('');
		$("#kelurahan").html('');
		$("#kecamatan").append('<option value="">Pilih</option>');
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				for (var i = 0; i < result.length; i++)
					$("#kecamatan").append('<option value="' + result[i].id_kec + '">' + result[i].nama_kec + '</option>');
			}
		});
	});
</script>

<!-- Multi input produk -->

<script>
	$(document).ready(function () {
		$("#tambah-inputan").click(function () {

			//target append
			var inputProduk = document.getElementById('input-produk');

			//membuat element
			var row = document.createElement('div');
			row.setAttribute('class', 'row');

			var col8 = document.createElement('div');
			col8.setAttribute('class', 'col-md-8 mt-4');

			var col3 = document.createElement('div');
			col3.setAttribute('class', 'col-md-3');

			var hapus = document.createElement('div');
			hapus.setAttribute('class', 'col-md-1 pl-0 pr-0 pt-4 mb-2 text-center');

			//append element
			inputProduk.appendChild(row);
			row.appendChild(col8);
			row.appendChild(col3);
			row.appendChild(hapus);

			col8.innerHTML =
				"<div class='form-group'>" +
				"<label for='produk'>Produk </label>" +

				"<select class='form-control' name='produk[]' id='produk' class='produk'>" +
				"<option value=''>Pilih</option>" +
				"<?php foreach ($produk as $p): ?>" +
				"<option value='<?=$p['nama_produk'];?>'>" +
				"<?=$p['nama_produk'];?>" +
				"</option>" +
				"<?php endforeach;?>" +
				"</select>" +

				// "<input type='text' class='form-control' name='produk[]' id='produk' value=''>" +

				"<small class='form-text text-danger'>" +
				"<?=form_error('produk')?></small>" +
				"</div>";

			col3.innerHTML =
				"<div class='form-group'>" +
				"<label for='jumlah_produk'>Jumlah Produk</label>" +
				"<input type='number' class='form-control' id='jumlah_produk' name='jumlah_produk[]' min='1' value=''>" +
				"<small class='form-text text-danger'>" +
				"<?=form_error('jumlah_produk')?></small>" +
				"</div>" +
				"</div>";

			hapus.innerHTML =
				"<a class='btn btn-small btn-danger text-white' id='hapus-inputan' role='button'>delete</a>";

			// membuat aksi delete element
			hapus.onclick = function () {
				row.parentNode.removeChild(row);
			};

		});


	});
</script>

<!-- Datepicker -->
<script type="text/javascript">
	$(document).ready(function () {
		$('.tanggal').datepicker({
			format: "dd-mm-yyyy",
			changeMonth: true,
			changeYear: true,
			autoclose: true
		});
	});
</script>


<!-- Get Select Produk
<script type="text/javascript">
	$(document).ready(function () {
		document.getElementById('produk').innerHTML = '<option value="">Pilih</option>';
		// $("#produk").append('<option value="">Pilih</option>');
		url = '<?=base_url();?>produk/listProduk';
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			success: function (result) {
				for (var i = 0; i < result.length; i++)
					$("#produk").append('<option value="' + result[i].id_produk + '">' + result[i].nama_produk + '</option>');
			}
		});
	});
</script> -->


</body>

</html>