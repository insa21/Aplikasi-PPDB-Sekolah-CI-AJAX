						<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Profile Sekolah			
							</h1>	
							<p class="text-white link-nav"><a href="<?php echo site_url() . '/' ?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Profile Sekolah</a><span class="lnr lnr-arrow-right"></span>  <a href="/">Sambutan Kepala Sekolah</a>  </p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->

<!-- Start Sample Area -->
			<section class="sample-text-area">
				<div class="container">
					<h3 class="text-heading">Sambutan Kepala Sekolah</h3>
					<p class="sample-text">
					<?php foreach ($kepala_sekolah as $sekolah) : ?>
                       <?php echo $sekolah->selanjutnya; ?>
						 <?php endforeach ?>
					</p>
                    </div>
            </section>
			<!-- End Sample Area -->