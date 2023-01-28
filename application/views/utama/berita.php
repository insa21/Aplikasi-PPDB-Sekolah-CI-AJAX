		  <style>
		  	.card {
		  		height: auto !important;
		  		padding-top: -20px;
		  	}

		  	.aksi {
		  		position: relative;
		  		margin: 0px;
		  		margin-bottom: -200px;
		  		left: 35%;

		  	}

		  	.ak {
		  		position: absolute;
		  		right: auto;
		  		background-color: transparent;
		  		border: transparent;
		  		margin-bottom: -100px;
		  	}
		  </style>
		  <!-- start banner Area -->
		  <section class="banner-area relative about-banner" id="home">
		  	<div class="overlay overlay-bg"></div>
		  	<div class="container">
		  		<div class="row d-flex align-items-center justify-content-center">
		  			<div class="about-content col-lg-12">
		  				<h1 class="text-white">
		  					Berita
		  				</h1>
		  				<p class="text-white link-nav"><a href="<?php echo site_url('/') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="event-details.html"> Berita</a></p>
		  			</div>
		  		</div>
		  	</div>
		  </section>
		  <!-- End banner Area -->



		  <!-- Start blog Area -->
		  <?php foreach ($project as $key) : ?>
		  	<div class="whole-wrap">
		  		<div class="container">
		  			<div class="section-top-border">
		  				<!-- <h3 class="mb-30">Left Aligned</h3> -->

		  				<div class="row">
		  					<div class="col-md-3">
		  						<img src="<?php echo base_url('upload/' . $key->photo) ?>" alt="<?php echo $key->title; ?></</" class="img-fluid">
		  					</div>
		  					<div class="col-md-9 mt-sm-20 left-align-p">
		  						<p><?php echo $key->date; ?></p>
		  						<p><a href="">
		  								<h4><?php echo $key->title; ?></h4>
		  							</a></p>
		  						<p><?php echo $key->keyword; ?></p>

		  					</div>
		  				</div>
		  			</div>
		  		<?php endforeach ?>



		  		</div>
		  	</div>
		  	</section>

		  	<!-- End blog Area -->