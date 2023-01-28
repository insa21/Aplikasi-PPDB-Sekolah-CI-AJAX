<html>

<link rel="stylesheet" href="<?php echo base_url() . 'education/css/linearicons.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/font-awesome.min.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/bootstrap.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/magnific-popup.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/nice-select.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/animate.min.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/owl.carousel.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/jquery-ui.css' ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'education/css/main.css' ?>">

<head>
  <title>Form Login</title>
</head>

<body class="bg-primary">
  <!-- <h1>Silahkan login terlebih dahulu...</h1> -->
  <?php
  // Cek apakah terdapat session nama message
  if ($this->session->flashdata('message')) { // Jika ada
    echo $this->session->flashdata('message'); // Tampilkan pesannya
  }
  ?>
  <form method="post" action="<?php echo base_url('index.php/auth/login') ?>">
    </div class="border-blue center-block ">
    <div class="about-content center bg-info">
      <img src="<?php echo base_url() . 'assets/images/component/logo_smk-2.gif' ?>" alt="" height="100" width="auto" class="radius"><br><br>
      <div class="container">
        <div class="border-blue">
          <label class="text-white">Username :</label>
          <input type="text" name="username" class="btn "><br><br>
          <div class="border-blue">
            <label class="text-white">Password :</label>
            <input type="password" name="password" class="btn"><br><br>
            <button type="submit" class="btn bg-success  text-white">Login</button>
          </div>
        </div>
      </div>
  </form>
</body>

</html>



<!-- isi di dalam script -->
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>





<script src="<?php echo base_url() . 'education/js/vendor/jquery-2.2.4.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/popper.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/vendor/bootstrap.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/easing.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/hoverIntent.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/superfish.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/jquery.ajaxchimp.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/jquery.magnific-popup.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/jquery.tabs.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/jquery.nice-select.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/owl.carousel.min.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/mail-script.js' ?>"></script>
<script src="<?php echo base_url() . 'education/js/main.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/bootstrap5.min.js' ?>"></script>



<!-- </footer> -->
<!-- End footer Area -->

</body>

</html>