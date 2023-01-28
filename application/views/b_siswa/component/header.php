<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="Miminium Admin Template v.1">
    <meta name="author" content="Indra Saepudin">
    <meta name="keyword" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smk YPC Tasikmalaya</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'miminium/asset/css/bootstrap.min.css' ?>">

    <!-- cuaca xml -->
    <link href="<?php echo base_url('assets/xml/DigitalForecast-JawaBarat.xml') ?>">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'miminium/asset/css/plugins/font-awesome.min.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'miminium/asset/css/plugins/simple-line-icons.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'miminium/asset/css/plugins/animate.min.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'miminium/asset/css/plugins/fullcalendar.min.css' ?>" />
    <link href="<?php echo base_url() . 'miminium/asset/css/style.css' ?>" rel="stylesheet">
    <!-- end: Css -->

    <!--content  -->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>" rel="stylesheet">
    <!-- akhir -->

    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/component/logo_smk-2.gif' ?>">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="mimin" class="dashboard">
    <!-- start: Header -->
    <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <a href="<?php echo base_url() . 'miminium/index.html' ?>" class="navbar-brand">
                    <b>PPDB <i>sekolah</i></b>
                </a>

                <ul class="nav navbar-nav search-nav">
                    <li>
                        <div class="search">
                            <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                            <div class="form-group form-animate-text">
                                <input type="text" class="form-text" required>
                                <span class="bar"></span>
                                <label class="label-search">Type anywhere to <b>Search</b> </label>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="user-name"><span><?php echo $nama; ?></span></li>
                    <li class="dropdown avatar-dropdown">
                        <img src="<?php echo base_url() . 'miminium/asset/img/avatar.jpg' ?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                        <ul class="dropdown-menu user-dropdown">
                            <li><a href="<?php echo base_url() . '#' ?>"><span class="fa fa-user"></span> My Profile</a></li>
                            <li><a href="<?php echo base_url() . '#' ?>"><span class="fa fa-calendar"></span> My Calendar</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="more">
                                <ul>
                                    <li><a href="<?php echo base_url() . 'miminium/' ?>><span class=" fa fa-cogs></span></a></li>
                                    <li><a href="<?php echo base_url() . 'miminium/' ?>><span class=" fa fa-lock></span></a></li>
                                    <li><a href="<?php echo base_url() . 'auth' ?>><span class=" fa fa-power-off></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href=" <?php echo base_url() . 'index.php/auth' ?>" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end: Header -->

    <div class="container-fluid mimin-wrapper">

        <!-- start:Left Menu -->
        <div id="left-menu">
            <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li>
                        <div class="left-bg"></div>
                    </li>
                    <li class="time">
                        <h1 class="animated fadeInLeft">21:00</h1>
                        <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="active ripple">
                    <li class="ripple"><a href="<?php echo base_url() . 'bs_data' ?>"><span class="fa fa-home"></span>Dashboard</a></li>
                    </li>
                    <li class="ripple"><a href="<?php echo base_url() . 'bs_data/biodata' ?>"><span class="fa fa-user"></span>Biodata</a></li>
                    <li class="ripple"><a href="<?php echo base_url() . 'bs_data/sarat' ?>"><span class="fa fa-th-list"></span>Syarat</a></li>
                    <li class="ripple"><a href="<?php echo base_url() . 'bs_data/status' ?>"><span class="fa fa-exchange"></span>Status</a></li>
                </ul>
            </div>
        </div>
        <!-- end: Left Menu -->

        <!-- start: content -->
        <div id="content">
            <div class="panel">
                <div class="panel-body">
                    <div class="col-md-6 col-sm-12">

                        <h3 class="animated fadeInLeft">
                            <font face="sans serif"> Halaman Admin </font>
                        </h3>
                        <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Tasikmalaya, Jawa Barat </p>
                        <!-- Singaparna,Tasikmalaya -->
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo base_url() . 'bs_data/biodata'  ?>">Biodata</a></li>
                            <li><a href="<?php echo base_url() . 'bs_data/sarat' ?>">syarat</a></li>
                            <li><a href="<?php echo base_url() . 'bs_data/status' ?>">Status</a></li>
                            <!-- <a><a href="<?php echo base_url() . 'isi_profile' ?>">Profile Sekolah</a></li> -->
                            <!-- <li><a href="<">Rebum</a></li> -->
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
                            <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Singaparna</h3>
                            <h1 style="margin-top: -10px;color: #ddd;">28<sup>o</sup></h1>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="panel-body">
                                <div class="suny">
                                    <div class="sun animated pulse infinite">
                                    </div>
                                    <div class="mount"></div>
                                    <div class="mount mount1"></div>
                                    <div class="mount mount2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 

        <div class="col-md-4 col-sm-6 col-xs-6">
          <div class="panel">
            <div class="panel-heading bg-white border-none">
              <h4>Suny</h4>
            </div>
            <div class="panel-body" style="padding-bottom:140px;">
              <div class="suny">
                <div class="sun animated pulse infinite">
                </div>
                <div class="mount"></div>
                <div class="mount mount1"></div>
                <div class="mount mount2"></div>
              </div>
              </center>
            </div>
          </div>
        </div> -->