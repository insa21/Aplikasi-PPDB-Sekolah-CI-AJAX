<!DOCTYPE html>
<html>

<head>
    <title>BIODATA DIRI</title>
</head>

<body>
    <div class="container">
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
                            <!-- <input type="submit" name="upload" value="Upload"> -->
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?= $this->session->userdata('status'); ?></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><?= $this->session->userdata('kelas'); ?></td>
                </tr>
                <tr>
                    <td>ke</td>
                    <td><?= $this->session->userdata('ke'); ?></td>
                </tr>
                <tr>
                    <td>Testing</td>
                    <td><?= $this->session->userdata('testing'); ?></td>
                </tr>
                <tr>
                    <td>Ruangan</td>
                    <td><?= $this->session->userdata('ruangan'); ?></td>
                </tr>
                <tr>
                    <td>Gelombang</td>
                    <td> <?= $this->session->userdata('gelombang'); ?></td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td> <?= $this->session->userdata('waktu'); ?></td>
                </tr>
                <tr>
                    <td>Pesan</td>
                    <td><?= $this->session->userdata('pesan'); ?></td>
                </tr>
            </table>
        </div>
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