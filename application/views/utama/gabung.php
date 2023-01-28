<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Pendaftaran
				</h1>
				<p class="text-white link-nav"><a href="<?= base_url('index.php') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('/') ?>"> Pendaftaran</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->
<?php echo $this->session->flashdata('insert'); ?>
<!-- Start contact-page Area -->






<div class="modal-body form">
	<form action="<?php echo base_url() . 'gabung/ajax_add' ?>" method="POST" class="form-horizontal">
		<input type="hidden" value="" name="id" />
		<div class="form-body">
			<div class="form-group" id="photo-preview">
				<!-- <label class="control-label col-md-3">Photo</label> -->
				<div class="col-md-9">
					<!-- (No photo) -->
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3" id="label-photo">Upload Photo </label>
				<div class="col-md-9">
					<input name="photo" type="file">
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Nama</label>
				<div class="col-md-9">
					<input name="nama" placeholder="Masukan Nama" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Nis</label>
				<div class="col-md-9">
					<input name="nis" placeholder="Masukan Nis" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Jenis Kelamin</label>
				<div class="col-md-9">
					<select name="jenis_kelamin" class="form-control">
						<option value="">--Pilih Jenis Kelamin--</option>
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Tahun Masuk</label>
				<div class="col-md-9">
					<input name="tahun_masuk" placeholder="Masukan Tahun Masuk" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">TTL</label>
				<div class="col-md-9">
					<input name="ttl" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Alamat</label>
				<div class="col-md-9">
					<textarea name="alamat" placeholder="Masukan Alamat" class="form-control" required></textarea>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Agama</label>
				<div class="col-md-9">
					<select name="agama" class="form-control">
						<option value="">--Pilih Agama--</option>
						<option value="islam">islam</option>
						<option value="kristen_protestan">kristen protestan</option>
						<option value="kristen_katolik">kristen katolik</option>
						<option value="hindu">hindu</option>
						<option value="buddha">buddha</option>
						<option value="konghucu">konghucu</option>
					</select>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Sekolah Asal</label>
				<div class="col-md-9">
					<input name="sekolah_asal" placeholder="Masukan Sekolah Asal" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3">Nama Ibu</label>
				<div class="col-md-9">
					<input name="nama_ibu" placeholder="Masukan Nama Ibu" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Nama Ayah</label>
				<div class="col-md-9">
					<input name="nama_ayah" placeholder="Masukan Nama Ayah" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">E-mail</label>
				<div class="col-md-9">
					<input name="email" placeholder="Masukan E-mail" class="form-control" type="text" required>
					<span class="help-block"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3">Jurusan</label>
				<div class="col-md-9">
					<select name="jurusan" id="jurusan">
						<?php foreach ($project as $jurusan) : ?>
							<option value="<?php echo $jurusan->jurusan ?>"><?php echo $jurusan->jurusan ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="modal-footer">
					<button class="genric-btn primary text-white bg-info ">Daftar</button>
					<!-- <a href="<?= base_url() . 'laporan_pdf' ?>" class="btn btn-success">Print</a> -->
				</div>
				<!-- Bootstrap modal -->
	</form>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>

</html>


<!-- isi di dalam script -->
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>