<html>
<head>
  <title>Welcome Page</title>
</head>
<body>
  <h1>Terimakasih <?php echo $this->session->userdata('nama'); ?></h1>
  <h4>Ini adalah halaman thanks yang hanya bisa di akses setelah login</h4>
  <a href="<?php echo base_url('index.php/page/welcome') ?>">Welcome Page</a> |
  <a href="<?php echo base_url('index.php/auth/logout') ?>">Logout</a>
</body>
</html>