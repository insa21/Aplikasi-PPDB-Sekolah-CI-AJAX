<!DOCTYPE html>
<html>

<head>
    <title>BIODATA DIRI</title>
</head>

<body>
    <div class="col-md-12 text-center">

        <button onclick="printContent('div')" class="btn btn-danger text-center"> <i class="fa fa-print"></i> Print</button>
    </div><br><br><br>
    <div id="div">
        <!-- <h1 align="center">BIODATA DIRI</h1> -->
        <table id="table" width="745" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr align="center" bgcolor="#66CC33">
                <td width="174">DATA DIRI</td>
                <td width="353">KETERANGAN</td>
                <td width="232">FOTO</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= $this->session->userdata('nama'); ?></td>
                <!-- <td img src="URL-GAMBAR-ANDA.jpg" width="210" height="313"></td> -->
                <td rowspan="10" align="center">
                    <form action="<?php echo base_url() . 'gabung/ajax_add' ?>" method="post" enctype="multipart/form-data">
                        <!-- <?= $this->session->userdata('photo'); ?> -->
                        <img src="<?php echo base_url() . 'assets/images/user.png' ?> " width="210" id="image-preview" alt="image preview" height="313" class="tampil-gambar">
                        <br />
                        <!-- <input type="file" id="image-source" onchange="previewImage();" /> -->
                    </form>
                </td>
            </tr>
            <tr>
                <td>NISN</td>
                <td><?= $this->session->userdata('nis'); ?></td>
            </tr>
            <tr>
                <td>SKHUN</td>
                <td><?= $this->session->userdata('skhun'); ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><?= $this->session->userdata('jenis_kelamin'); ?></td>
            </tr>
            <tr>
                <td>Tahun Masuk</td>
                <td><?= $this->session->userdata('tahun_masuk'); ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td> <?= $this->session->userdata('ttl'); ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td> <?= $this->session->userdata('alamat'); ?></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td><?= $this->session->userdata('agama'); ?></td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td><?= $this->session->userdata('sekolah_asal'); ?></td>
            </tr>
            <tr>
                <td>Nama Ibu</td>
                <td><?= $this->session->userdata('nama_ibu'); ?></td>
            </tr>
            <tr>
                <td>Nama Ayah</td>
                <td><?= $this->session->userdata('nama_ayah'); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $this->session->userdata('email'); ?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><?= $this->session->userdata('jurusan'); ?></td>
            </tr>
        </table>
    </div>
</body>

</html>
<!-- image review -->
<script>
    function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("image-preview").src = oFREvent.target.result;
        };
    };
</script>

<!-- print -->

<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>