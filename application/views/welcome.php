<html>
<head>
  <title>Welcome Page</title>
</head>
<body>
  <h1>Selamat datang <?php echo $this->session->userdata('nama'); ?></h1>
  <h4>Anda berhasil login ke dalam aplikasi. Halaman ini hanya bisa diakses setelah login.</h4>
  <a href="<?php echo base_url('index.php/page/thanks') ?>">Thanks Page</a> |
  <a href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
</body>
</html>