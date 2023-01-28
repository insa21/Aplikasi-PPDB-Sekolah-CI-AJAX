<link rel="stylesheet" href="<?php echo base_url() . 'education/css/bootstrap.css' ?>">


<!--content  -->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
<!-- akhir -->


<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Jadwal
                </h1>
                <p class="text-white link-nav"><a href="<?php echo site_url('/') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="event-details.html"> Jadwal</a></p>
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
            <br />
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Gelombang</th>
                        <th>Pendaftaran</th>
                        <th>Test Tulisan dan Wawancara</th>
                        <th>Test Kesehatan</th>
                        <th>Pengumuman Hasil Test</th>
                        <th>Daftar Ulang</th>
                        <!-- <th style="width:150px;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Pendaftaran</th>
                        <th>Test Tulisan dan Wawancara</th>
                        <th>Test Kesehatan</th>
                        <th>Pengumuman Hasil Test</th>
                        <th>Daftar Ulang</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    </div>
</section>