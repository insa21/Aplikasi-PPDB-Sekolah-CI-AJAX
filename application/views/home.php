<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title><?php echo $title; ?></title> -->
    <title>Login Smk Ypc Tasikmalaya.</title>

    <link rel="stylesheet" href="<?php echo base_url() . 'education/css/linearicons.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'education/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'education/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'education/css/main.css' ?>">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script> -->


<body class="bg-primary">
    <?php
    if ($this->session->flashdata('pesan') <> '') {
        ?>
        <div class="alert alert-dismissible alert-danger">
            <?php echo $this->session->flashdata('pesan'); ?>
        </div>
    <?php
    }
    ?>


    <div class="about-content center bg-info">
        <form method="post" action="<?php echo base_url('index.php/login/masuk') ?>">
            <!-- <form method="POST" class="" action="<?php echo base_url('index.php/login/masuk') ?>"> -->
            <img src="<?php echo base_url() . 'assets/images/component/logo_smk-2.gif' ?>" alt="" height="100" width="auto" class="radius" style=""><br><br>
            <div class="panel panel-default justify-content-center">
                <div class="container col-8">
                    <div class="border-blue">
                        <label class="text-white">Username :</label>
                        <input type="text" name="username" id="username" autocomplete="off" class="btn " required><br><br>
                        <div class="border-blue">
                            <label class="text-white">Password :</label>
                            <input type="password" name="password" id="password" autocomplete="off" class="btn" required><br><br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Daftar</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn bg-success  text-white">Login</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
</body>

</html>



<!-- modal pendaftaran siswa -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Calon Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <?php echo $this->session->flashdata('insert'); ?>
                <form action="<?php echo base_url() . 'gabung/ajax_add' ?>" method="POST" class="form-horizontal">
                    <input type="hidden" value="" name="id" />
                    <input name="photo" type="file" id="photo">
                    <!-- <input type=" hidden" value="" name="id_user" /> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama:</label>
                                <input type="text" name="nama" class="form-control" id="nama" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="skhun" class="col-form-label">No SKHUN/No Ujian:</label>
                            <input type="integer" name="skhun" class="form-control" id="skhun" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nis" class="col-form-label">NISN:</label>
                            <input type="integer" name="nis" class="form-control" id="nis" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ttl" class="col-form-label">Tanggal Lahir:</label>
                            <input type="date" name="ttl" class="form-control" autocomplete="off" id="ttl" required>
                        </div>
                        <div class="col-md-6">
                            <label for="alamat" class="col-form-label">Alamat:</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="sekolah_asal" class="col-form-label">Asal Sekolah:</label>
                            <input type="text" name="sekolah_asal" class="form-control" id="sekolah_asal" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_ibu" class="col-form-label">Nama Ibu:</label>
                            <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nama_ayah" class="col-form-label">Nama Ayah:</label>
                            <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tahun_masuk" class="col-form-label">Tahun Masuk:</label>
                            <input type="text" name="tahun_masuk" class="form-control" id="tahun_masuk" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="agama" class="col-form-label">Agama:</label>
                            <select name="agama" class="form-control">
                                <option value="">--Pilih Agama--</option>
                                <option value="islam">islam</option>
                                <option value="kristen_protestan">kristen protestan</option>
                                <option value="kristen_katolik">kristen katolik</option>
                                <option value="hindu">hindu</option>
                                <option value="buddha">buddha</option>
                                <option value="konghucu">konghucu</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin:</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin" class="col-form-label">Jurusan:</label>
                            <select name="jurusan" id="jurusan" class="form-control">
                                <?php foreach ($project as $jurusan) : ?>
                                    <option value="<?php echo $jurusan->jurusan ?>"><?php echo $jurusan->jurusan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="col-form-label">Username:</label>
                            <input type="text" name="username" class="form-control" id="username" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="text" name="password" class="form-control" id="password" autocomplete="off" required>
                        </div>
                        <div class="col-md">
                            <label for="jenis_user" class="col-form-label">Jenis User:</label>
                            <select name="id_jenis_user" class="form-control" id="id_jenis_user">
                                <option value="1">Admin</option>
                                <option value="2">Siswa</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success" value="Daftar">
            </div>
            <!-- </div> -->
            </form>
        </div>
    </div>
</div>
</div>
</div>


</div>
</form>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="<?php echo base_url() . 'assets/vendor/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/js/jquery-3.4.1.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/js/jquery-3.3.1.slim.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/js/popper.min.js' ?>"></script>

<!-- Button trigger modal -->