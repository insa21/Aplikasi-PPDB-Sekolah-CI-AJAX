 <!-- slide -->

 <link rel="stylesheet" href="<?php echo base_url() . 'assets/slide/bootstrap.min.css' ?>">
 <script src="<?php echo base_url() . 'assets/slide/jquery.min.js' ?>"></script>
 <script src="<?php echo base_url() . 'assets/slide/bootstrap.min.js' ?>"></script>
 <!-- slide -->

 <!-- start banner Area -->
 <section class="banner-area relative about-banner" id="home">
 	<div class="overlay overlay-bg"></div>
 	<div class="container">
 		<div class="row d-flex align-items-center justify-content-center">
 			<div class="about-content col-lg-12">
 				<h2 class="text-white">
 					<img src="<?php echo base_url() . 'assets/images/component/logo_smk-2.gif' ?>" srcset=""><br>
 					SMK Yayasan Pesantren <br>
 					Cintawana
 				</h2>
 				<h3 class="text-white">Siap Belajar, Siap Kerja, Siap Berprestasi</h3>
 			</div>
 		</div>
 </section>
 <!-- End banner Area -->


 <!-- Start search-course Area -->
 <section class=" relative">
 	<div class="overlay overlay-bg"></div>
 	<div class="container">
 		<div class="row justify-content-between align-items-center">
 			<div class="col-lg-8 col-md-8 search-course-left">

 				<div align='center'>
 					<h2>
 						<marquee behavior="scroll" direction="" style="calibry" bgcolor="#17A2B8"><b class="text-white">“Ilmu yang amaliah, amal yang ilmiah, dan akhlakul karimah”
 						</marquee>
 					</h2>
 				</div>
 				<div id="myCarousel" class="carousel slide" data-ride="carousel">
 					<!-- Carousel indicators -->
 					<ol class="carousel-indicators">
 						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
 						<li data-target="#myCarousel" data-slide-to="1"></li>
 						<li data-target="#myCarousel" data-slide-to="2"></li>
 						<li data-target="#myCarousel" data-slide-to="0"></li>
 						<li data-target="#myCarousel" data-slide-to="1"></li>
 						<li data-target="#myCarousel" data-slide-to="2"></li>
 					</ol>
 					<!-- Wrapper for carousel items -->
 					<div class="carousel-inner">
 						<div class="item active bg-info">
 							<img src="<?php echo base_url() . 'assets/images/component/logo_smk-2.gif' ?>" alt=" First Slide">
 							<div class="carousel-caption">
 								<h3 class="text-right">Logo Smk Ypc Tasikmalaya</h3>
 								<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
 							</div>
 						</div>
 						<?php foreach ($bergerak as $key) : ?>
 							<div class="item">
 								<img src="<?php echo base_url('upload/' . $key->photo) ?>" alt="Third Slide">
 								<div class="carousel-caption">
 									<h3><?php echo $key->nama; ?></h3>
 									<!-- <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
 								</div>
 							</div>
 						<?php endforeach ?>
 					</div>
 					<!-- Carousel controls -->
 					<a class="carousel-control left" href="#myCarousel" data-slide="prev">
 						<span class="glyphicon glyphicon-chevron-left"></span>
 					</a>
 					<a class="carousel-control right" href="#myCarousel" data-slide="next">
 						<span class="glyphicon glyphicon-chevron-right"></span>
 					</a>
 				</div>
 			</div>

 			<!-- kategori -->

 			<div class="col-lg-4 sidebar-widgets">
 				<div class="widget-wrap">
 					<div class="single-sidebar-widget search-widget">
 						<div class="single-sidebar-widget post-category-widget">
 							<h4 class="category-title bg-info">KATEGORI</h4>
 							<ul class="cat-list">
 								<li>
 									<a href="<?php echo base_url('index.php/jurusan') ?>" class="d-flex justify-content-between">
 										<p>Jurusan</p>
 									</a>
 								</li>
 								<li>
 									<a href="<?php echo base_url('index.php/saranaa') ?>" class="d-flex justify-content-between">
 										<p>Sarana Dan Prasarana</p>
 									</a>
 								</li>
 								<!-- <li>
 									<a href="#" class="d-flex justify-content-between">
 										<p>Kegiatan Siswa</p>
 									</a>
 								</li> -->
 								<li>
 									<a href="berita" class="d-flex justify-content-between">
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
 			</div>
 			</>
 		</div>
 </section>

 <hr>
 <!-- End search-course Area -->
 <section class="upcoming-event-area section-gap">
 	<div class="container">
 		<div class="row d-flex justify-content-center">
 			<div class="menu-content pb-70 col-lg-8">
 				<div class="title text-center">
 					<h1 class="mb-10">JURUSAN</h1>
 					<p>yang ada untuk saat ini</p>
 				</div>
 			</div>
 		</div>
 		<div class="row">
 			<div class="active-upcoming-event-carusel">
 				<?php foreach ($project as $key) : ?>
 					<div class="single-carusel row align-items-center">
 						<div class="col-12 col-md-6 thumb">
 							<img class="img-fluid" src="<?php echo base_url('upload/' . $key->photo) ?>" alt="">
 						</div>
 						<div class="detials col-12 col-md-6">
 							<p><?php echo $key->date; ?></p>
 							<a href="#">
 								<h4><?php echo $key->title; ?></h4>
 							</a>
 							<p>
 								<?php echo $key->deskripsi; ?>
 							</p>
 						</div>
 					</div>
 				<?php endforeach ?>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End upcoming-event Area -->

 <ol class="breadcrumb post-header bg-info">
 	<li class="fa-fa-sign-out text-white">
 		Informasi <span class="">>></span>
 	</li>
 </ol>
 <section class="upcoming-event-area section-gap">
 	<div class="container">
 		<!-- <div class="row d-flex justify-content-center"> -->
 		<!-- <div class="menu-content pb-70 col-lg-8"> -->
 		<!-- <div class="title text-center"> -->
 		<!-- <h1 class="mb-10">JURUSAN</h1>
 					<p>yang ada untuk saat ini</p> -->
 	</div>
 	</div>
 	</div>
 	<div class="row">
 		<div class="active-upcoming-event-carusel">
 			<?php foreach ($artikel as $key) : ?>
 				<div class="single-carusel row align-items-center">
 					<div class="col-12 col-md-6 thumb">
 						<img class="img-fluid" src="<?php echo base_url('upload/' . $key->photo) ?>" alt="">
 					</div>
 					<div class="detials col-12 col-md-6">
 						<p><?php echo $key->date; ?></p>
 						<a href="#">
 							<h4><?php echo $key->title; ?> | <?php echo $key->kategori; ?> </h4>
 						</a>
 						<p>
 							<?php echo $key->keyword; ?>
 						</p>
 					</div>
 				</div>
 			<?php endforeach ?>
 		</div>
 	</div>
 	</div>
 </section>
 <hr class="">


 <!-- Start upcoming-event Area -->
 <section class="upcoming-event-area section-gap">
 	<div class="container">
 		<div class="row d-flex justify-content-center">
 			<div class="menu-content pb-70 col-lg-8">
 				<div class="title text-center">
 					<h1 class="mb-10">Sarana dan Prasarana</h1>
 					<p>yang ada untuk saat ini</p>
 				</div>
 			</div>
 		</div>
 		<div class="row">
 			<div class="active-upcoming-event-carusel">
 				<?php foreach ($sarana as $key) : ?>
 					<div class="single-carusel row align-items-center">
 						<div class="col-12 col-md-6 thumb">
 							<img class="img-fluid" src="<?php echo base_url('upload/' . $key->photo) ?>" alt="">
 						</div>
 						<div class="detials col-12 col-md-6">
 							<p><?php echo $key->date; ?></p>
 							<a href="#">
 								<h4><?php echo $key->nama; ?></h4>
 							</a>
 							<p>
 								<?php echo $key->keterangan; ?>
 							</p>
 						</div>
 					</div>
 				<?php endforeach ?>
 			</div>
 		</div>
 	</div>
 </section>
 <!-- End upcoming-event Area -->