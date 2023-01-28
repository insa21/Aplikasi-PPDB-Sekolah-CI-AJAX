			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Sarana dan Prasarana		
							</h1>	
							<p class="text-white link-nav"><a href="<?php echo site_url('/') ?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="event-details.html"> Sarana Dan Prasarana</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<?php foreach ($project as $key) : ?>
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 pb-30">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="<?php echo base_url('upload/' . $key->photo) ?>"alt="<?php echo $key->nama; ?>">
								</div>
								<div class="detials col-12 col-md-6">
									<p><?php echo $key->date; ?></</p>
									<a href="event-details.html"><h4><?php echo $key->nama; ?></</h4></a>
									<p>
										<?php echo $key->keterangan; ?></
									</p>
								</div>
							</div>
						</div>
						<?php endforeach ?>																			
					</div>
				</div>	
			</section>
			<!-- End events-list Area -->