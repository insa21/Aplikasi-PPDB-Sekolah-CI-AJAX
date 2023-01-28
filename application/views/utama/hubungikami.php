	  <!-- start banner Area -->
	  <section class="banner-area relative about-banner" id="home">
	  	<div class="overlay overlay-bg"></div>
	  	<div class="container">
	  		<div class="row d-flex align-items-center justify-content-center">
	  			<div class="about-content col-lg-12">
	  				<h1 class="text-white">
	  					Hubungi Kami
	  				</h1>
	  				<p class="text-white link-nav"><a href="<?= base_url('index.php') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="<?= base_url('hubungikami') ?>"> Hubungi Kami</a></p>
	  			</div>
	  		</div>
	  	</div>
	  </section>
	  <!-- End banner Area -->
	  <?php echo $this->session->flashdata('insert'); ?>
	  <!-- Start contact-page Area -->
	  <section class="contact-page-area section-gap">
	  	<div class="container">
	  		<div class="row">
	  			<div class="map-wrap" style="width:100%; height: 445px;" id="map"></div><!-- 7°24'38.2"S 108°10'25.1"E -->
	  			<script>
	  				var map;

	  				function initMap() {
	  					map = new google.maps.Map(document.getElementById('map'), {
	  						center: {
	  							lat: -7.361299,
	  							lng: 108.103682
	  						},
	  						zoom: 15,
	  					});
	  				}
	  			</script>
	  			<div class="col-lg-4 d-flex flex-column address-wrap">
	  				<div class="single-contact-address d-flex flex-row">
	  					<div class="icon ">
	  						<span class="lnr lnr-home text-info"></span>
	  					</div>
	  					<div class="contact-details">
	  						<h5>SMK YPC Tasikmlaya,Cintawana,Singaparna</h5>
	  						<p>
	  							Komplek Yayasan Pesantren Cintawana
	  						</p>
	  					</div>
	  				</div>
	  				<div class="single-contact-address d-flex flex-row">
	  					<div class="icon">
	  						<span class="lnr lnr-phone-handset text-info"></span>
	  					</div>
	  					<div class="contact-details">
	  						<h5>0265-547-717</h5>
	  						<p>Setiap Hari, pukul 07.00 hingga 17.00</p>
	  					</div>
	  				</div>
	  				<div class="single-contact-address d-flex flex-row">
	  					<div class="icon">
	  						<span class="lnr lnr-envelope text-info"></span>
	  					</div>
	  					<div class="contact-details">
	  						<h5>smkypctasikmalaya@gmail.com</h5>
	  						<p>Kirimi kami pertanyaan Anda kapan saja!</p>
	  					</div>
	  				</div>
	  			</div>
	  			<div class="col-lg-8">
	  				<form class="form-area contact-form text-right" id="form" action="<?php echo base_url('komentar/ajax_add') ?>" method="post">
	  					<div class="row">
	  						<div class="col-lg-6 form-group">
	  							<input name="nama" placeholder="Masukan Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nama Lengkap'" class="common-input mb-20 form-control" required="" type="text">

	  							<input name="email" placeholder="Masukan Email Anda" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Email Anda'" class="common-input mb-20 form-control" required="" type="email">

	  							<input name="subjek" placeholder="Masukan Subjek" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Subjek'" class="common-input mb-20 form-control" required="" type="text">
	  						</div>
	  						<div class="col-lg-6 form-group">
	  							<textarea class="common-textarea form-control" name="pesan" placeholder="Masukan Pesan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Pesan'" required=""></textarea>
	  						</div>
	  						<div class="col-lg-12">
	  							<div class="alert-msg" style="text-align: left;"></div>
	  							<!-- <div class="alert alert-success alert-dismissible" role="alert">
	  								<button type="button" class="close" aria-label="Close" data-dismiss="alert">
	  									<span aria-hidden="true">&times;</span>
	  								</button>
	  								<strong>Sukses !</strong> Data Berhasil Disimpan ...
	  							</div> -->
	  							<button class="genric-btn primary text-white bg-info " style="float: right;">Kirim Pesan</button>
	  						</div>
	  					</div>
	  				</form>
	  			</div>
	  		</div>
	  	</div>
	  </section>
	  <!-- End contact-page Area -->
	  <!-- kordinat smk ypc tasikmalaya -->
	  <!-- 7°24'38.2"S 108°10'25.1"E -->
	  <!-- api key -->
	  <!-- AIzaSyD1gFjofbvtbv-YdpE_qjgw9gaYSOQlGNA -->

	  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1gFjofbvtbv-YdpE_qjgw9gaYSOQlGNA&callback=initMap" async defer></script>