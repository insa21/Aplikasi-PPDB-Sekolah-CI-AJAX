						<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Profile Sekolah			
							</h1>	
							<p class="text-white link-nav"><a href="<?php echo site_url('/') ?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="event-details.html"> Profile Sekolah</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			
			<!-- Start post-content Area -->
			<?php foreach ($project as $key) : ?>
			<section class="post-content-area single-post-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-12">
									<div class="feature-img">
										<img class="img-fluid" src="<?php echo base_url('upload/' . $key->photo) ?>">
									</div>									
								</div>
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="#"><?php echo $key->tempat; ?></ </a></li>
									</ul>
									<div class="user-details row">
									    <p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Developers :</a><p>
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $key->pembuat; ?></a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?php echo $key->date; ?> </a> <span class="lnr lnr-calendar-full"></span></p>
										<p class="view col-lg-12 col-md-12 col-6"><a href="#">Dilihat 4072 Kali</a> <span class="lnr lnr-eye"></span></p>
										<!-- <span class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p> -->
										<ul class="social-links col-lg-12 col-md-12 col-6">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-github"></i></a></li>
											<li><a href="#"><i class="fa fa-behance"></i></a></li>
										</ul>																				
									</div>
								</div>
								<div class="col-lg-9 col-md-9">
									<h3 class="mt-20 mb-20">Profile Sekolah</h3>
									<p class="excert">
                                <?php echo $key->date; ?> ~ Oleh <?php echo $key->pembuat; ?>	~ Dilihat 4072 Kali
                                </p>
                                <h3>Visi SMK YPC Tasikmalaya</h3>
								<p>SMK YPC Tasikmalaya memiliki komitmen jangka panjang terhadap pengembangan sumber daya manusia. Pandangan ke depan dan cita-cita SMK YPC dinyatakan dalam Visi sebagai berikut:</p>
								<p>"<?php echo $key->visi; ?>"</p>
                                <h3>Misi SMK YPC Tasikmalaya</h3>
                                    <br>
                                    <li><?php echo $key->misi; ?></li>
                                    <h3>TUJUAN SMK YPC Tasikmalaya</h3>
                                    <p>Agar visi  tersebut tercapai sesuai dengan misi yang dijalankan maka tujuan  SMK YPC adalah sebagai berikut :</p>
                                    <li><?php echo $key->misi; ?></li>
                                    <br>
                                    <h3>Kebijakan Mutu</h3>
                                    <p>Agar tujuan tersebut terwujud, maka kebijakan mutu SMK YPC adalah sebagai berikut:</p>
                                    <p><?php echo $key->kebijakan; ?></p>
                                    <br>
                                    <h3>MOTO</h3>
                                    <p>Guna menggelorakan semangat untuk mencapai kebijakan mutu, maka disusun moto SMK YPC sebagai berikut:
                                    <p>“<?php echo $key->moto; ?>”</p></p>
                            </div>
							</div>
						</div>
                            <?php endforeach ?>																			
						<!-- kategori -->
						<?php foreach ($kepala_sekolah as $sekolah) : ?>
						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">
								<div class="single-sidebar-widget search-widget">
									<form class="search-form" action="#">
			                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
			                            <button type="submit"><i class="fa fa-search"></i></button>
			                        </form>
								</div>
								<div class="single-sidebar-widget user-info-widget">
									<img src="<?php echo base_url() . 'assets/images/component/kepala_sekolah.jpg' ?>" class="rounded-circle border-secondary" alt="">
									<a href="#"><h4><?php echo $sekolah->nama; ?></h4></a>
									<p>
										Kepala Sekolah
									</p>
									<ul class="social-links">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-github"></i></a></li>
										<li><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
									<p>
										<?php echo $sekolah->deskripsi; ?>
                                    </p>
                                    
                                    <button class="btn btn-success"> <a href=" <?php echo site_url('profile_sekolah/selanjutnya') ?>"> <i class="text-white"> selengkapnya>></i></a></button>
								</div>
								 <?php endforeach ?>																			
								<div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">KATEGORI</h4>
									<ul class="cat-list">
										<li>
											<a href="<?php echo base_url('index.php/jurusan') ?>" class="d-flex justify-content-between">
												<p>Jurusan</p>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/saranaa') ?>"class="d-flex justify-content-between">
												<p>Sarana Dan Prasarana</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Kegiatan Siswa</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Informasi</p>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url('index.php/profile_sekolah') ?>" class="d-flex justify-content-between">
												<p>Profile Sekolah</p>
											</a>
										</li>														
									</ul>
								</div>	
							</div>
						</div>

						<!-- akhir kategori -->
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->

			