<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
</head>

<body>
    <div class="col-md-4 col-md-offset-4" style="margin-top:15%">
        <div class="panel panel-default">
            <h3 align="center">Hello, <?php echo $nama; ?>! <button type="button" class="btn btn-info btn-sm" onclick="window.location='<?php echo base_url("index.php/login/keluar"); ?>'">Logout</button></h3>
            <!-- <h3 align="center">Hello, <?php echo $jurusan; ?>! <button type="button" class="btn btn-info btn-sm" onclick="window.location='<?php echo base_url("index.php/login/keluar"); ?>'">Logout</button></h3> -->
        </div>
    </div>
</body>

</html>