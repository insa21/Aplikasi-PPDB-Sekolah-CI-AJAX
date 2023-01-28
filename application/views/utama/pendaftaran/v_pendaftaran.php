<link rel="stylesheet" href="<?php echo base_url() . 'education/css/bootstrap.css' ?>">
<style type="text/css">
    #toTop {
        position: fixed;
        bottom: 50px;
        right: 50px;
        cursor: pointer;
        display: none;
        background: #FF0000;
        border-radius: 100%;
        color: #FFFFFF;
        font-size: 30px;
        padding: 10px 10px;
    }
</style>

<!--content  -->
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
<!-- akhir -->



<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Pengumuman Calon Siswa
                </h1>
                <p class="text-white link-nav"><a href="<?php echo site_url('/') ?>">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="event-details.html"> Pengumuman Calon Siswa</a></p>
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

            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>tanggal</th>
                        <th>waktu</th>
                        <th>ruangan</th>
                        <th>Gelombang-ke</th>
                        <th>Testing</th>
                        <th style="width:150px;">Status</th>
                        <!-- <th style="width:150px;">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>tanggal</th>
                        <th>waktu</th>
                        <th>ruangan</th>
                        <th>Gelombang-ke</th>
                        <th>Testing</th>
                        <th>Status</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </tfoot>
            </table>
        </div>


        <!-- isi di dalam script -->


        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Pendaftaran Siswa</h3>
                    </div>
                    <div class="modal-body form">
                        <form action="#" id="form" class="form-horizontal">
                            <input type="hidden" value="" name="id" />
                            <div class="form-body">
                                <div class="form-group" id="photo-preview">
                                    <label class="control-label col-md-3">Photo</label>
                                    <div class="col-md-9">
                                        (No photo)
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
                                        <input name="nama" placeholder="Masukan Nama" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nis</label>
                                    <div class="col-md-9">
                                        <input name="nis" placeholder="Masukan Nis" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Kelas</label>
                                    <div class="col-md-9">
                                        <input name="kelas" placeholder="Masukan Kelas" class="form-control" type="text">
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
                                        <input name="tahun_masuk" placeholder="Masukan Tahun Masuk" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">TTL</label>
                                    <div class="col-md-9">
                                        <input name="ttl" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" placeholder="Masukan Alamat" class="form-control"></textarea>
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
                                        <input name="sekolah_asal" placeholder="Masukan Sekolah Asal" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Ibu</label>
                                    <div class="col-md-9">
                                        <input name="nama_ibu" placeholder="Masukan Nama Ibu" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Nama Ayah</label>
                                    <div class="col-md-9">
                                        <input name="nama_ayah" placeholder="Masukan Nama Ayah" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                            <label class="control-label col-md-3">HP Wali</label>
                            <div class="col-md-9">
                                <input name="hp" placeholder="Masukan NO HP" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                                <div class="form-group">
                                    <label class="control-label col-md-3">E-mail</label>
                                    <div class="col-md-9">
                                        <input name="email" placeholder="Masukan E-mail" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Tanggal</label>
                                    <div class="col-md-9">
                                        <input name="tanggal" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Waktu</label>
                                    <div class="col-md-9">
                                        <input name="waktu" placeholder="Masukan Waktu" class="form-control" type="time">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Ruangan</label>
                                    <div class="col-md-9">
                                        <input name="ruangan" placeholder="Masukan Ruangan" class="form-control" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Gelombang-ke</label>
                                    <div class="col-md-9">
                                        <select name="gelombang" class="form-control">
                                            <option value="">Masukan Gelombang</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Testing</label>
                                    <div class="col-md-9">
                                        <select name="testing" class="form-control">
                                            <option value="">--Pilih Sesuai Kegiatan--</</option> <option value="ikut">ikut</option>
                                            <option value="tidak">tidak</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <select name="status" class="form-control">
                                            <option value="Sedang di Proses">Sedang di Proses</option>
                                            <option value="Diterima">Diterima</option>
                                            <option value="Ditolak">Ditolak</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->
        </body>

        </html>
    </div>
    </div>
</section>