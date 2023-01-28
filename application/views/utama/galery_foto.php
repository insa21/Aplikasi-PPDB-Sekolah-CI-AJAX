<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Galery Foto
                </h1>
                <p class="text-white link-nav"><a href="<?php echo site_url('/') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="event-details.html">Galery Foto</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <?php foreach ($project as $key) : ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <img class="img-thumbnail" src="<?php echo base_url('upload/' . $key->photo) ?>" alt=" <?php echo $key->nama ?>">
                    <div class="carousel-caption">
                        <!-- <h3>Teknik Informatika</h3> -->
                        <!-- <h5 class="" color="#777777"><?php echo $key->title ?></h5> -->
                    </div>
                </div>
                <!-- <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                </button>

                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
            <?php endforeach ?>
        </div>
    </div>
</section>