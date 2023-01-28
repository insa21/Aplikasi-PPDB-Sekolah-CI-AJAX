-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 04:00 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `kategori` varchar(250) DEFAULT NULL,
  `keyword` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `photo`, `title`, `kategori`, `keyword`, `date`) VALUES
(7, '1568002167799.gif', 'LIBUR', 'Perlombaan', '            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias at sequi molestiae atque cupiditate vero, exercitationem, consequuntur, corporis eos ipsam dolorum omnis possimus laborum. Deserunt accusamus nostrum velit recusandae omnis.\r\n', '2019-09-11'),
(8, '1568187757918.jpg', 'duka saha', 'Prestasi', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias at sequi molestiae atque cupiditate vero, exercitationem, consequuntur, corporis eos ipsam dolorum omnis possimus laborum. Deserunt accusamus nostrum velit recusandae omnis.', '2019-09-11'),
(9, '1568187844234.jpg', 'jurusan Baru', 'Pendidikan', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias at sequi molestiae atque cupiditate vero, exercitationem, consequuntur, corporis eos ipsam dolorum omnis possimus laborum. Deserunt accusamus nostrum velit recusandae omnis.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias at sequi molestiae atque cupiditate vero, exercitationem, consequuntur, corporis eos ipsam dolorum omnis possimus laborum. Deserunt accusamus nostrum velit recusandae omnis.Lorem, ipsum dolor', '2019-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE IF NOT EXISTS `data_kelas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(250) DEFAULT NULL,
  `ke` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id`, `kelas`, `jurusan`, `ke`, `nama`) VALUES
(1, 'X', 'rpl', 1, 'indra_saepudin.spd'),
(2, 'X', 'tkj', 2, 'indra_saepudin.spd'),
(3, 'XII', 'mm', 3, 'indra_saepudin');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(500) NOT NULL,
  `nama` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `photo`, `nama`) VALUES
(3, '1568783939416.jpg', 'Teknik Informatika'),
(4, '1568784003322.jpg', 'Teknik Electronika  Industri'),
(5, '1568784085593.png', 'Teknik Gambar dan Informasi Bangunan'),
(6, '1568784133651.png', 'Teknik Otomotif'),
(7, '1568784181022.png', 'Microtik Academy');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `photo`, `nama`, `tanggal`) VALUES
(4, '1568344531297.png', 'indra', '2019-09-13'),
(6, '1568346897115.jpg', 'smk ypc', '2019-09-13'),
(7, '1568346925014.gif', 'logo', '2019-09-13'),
(8, '1568346952617.jpg', 'indra', '2019-09-25'),
(9, '1568347147394.jpg', 'gebdung', '2019-09-13'),
(10, '1568347177147.jpg', 'indra', '2019-09-13'),
(12, '1568347472934.jpg', 'Compeny', '2019-09-13'),
(13, '1568347564311.jpg', 'oleng', '2019-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Komputer Jaringan'),
(3, 'Multimedia'),
(4, 'Teknik Electronika Industri'),
(5, 'Teknik Desain Dan Informasi Bangunan'),
(6, 'Teknik Kendaraan Ringan'),
(7, 'Tenik Bisnis Sepeda Motor');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Kegiatan Osis'),
(2, 'Perlombaan'),
(3, 'Prestasi'),
(4, 'Pendidikan'),
(5, 'Tutorial');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE IF NOT EXISTS `kepala_sekolah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(650) NOT NULL,
  `nama` varchar(900) NOT NULL,
  `deskripsi` varchar(900) NOT NULL,
  `selanjutnya` varchar(900) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`id`, `photo`, `nama`, `deskripsi`, `selanjutnya`) VALUES
(1, '1567999427149.jpg', 'Drs. Ujang Sanusi, MM', 'Alhamdulillah kita panjatkan kepada Allah SWT atas limpahan rahmat, taufiq dan hidayah-Nya, mudah-mudahan kita selalu dalam lindungan-Nya. Amien. Perkembangan ilmu…', 'Alhamdulillah kita panjatkan kepada Allah SWT atas limpahan rahmat, taufiq dan hidayah-Nya, mudah-mudahan kita selalu dalam lindungan-Nya. Amien. Perkembangan ilmu pengetahuan dan teknologi sudah semakin pesat. Hal ini akan membawa dampak yang luas dalam kehidupan kita, tak terlepas pula dalam dunia pendidikan. Peluang dan tantangan dalam dunia pendidikan akan semakin besar, oleh karena itu harus dihadapi dengan mempersiapkan generasi penerus bangsa yang handal. SMK YPC Singaparna Tasikmalaya sebagai salah salah satu institusi pendidikan memiliki tugas dan tanggung jawab yang tidak ringan,terutama dalam mempersiapkan generasi penerus bangsa yang berkualitas, profesional, memiliki kompetensi yang tangguh,yakni dengan menyelenggarakan proses pendidikan dan latihan yang berkualitas sehingga dapat menghasilkan output yang bermutu, mampu bersaing baik di tingkat nasional maupun internasional.');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `subjek` varchar(500) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(2, 'indra', 'sisawaktu0@gmail.com', 'bebas', 'bebas');

-- --------------------------------------------------------

--
-- Table structure for table `profile_sekolah`
--

CREATE TABLE IF NOT EXISTS `profile_sekolah` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(250) DEFAULT NULL,
  `pembuat` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tempat` varchar(250) DEFAULT NULL,
  `nks` varchar(250) DEFAULT NULL,
  `visi` varchar(550) DEFAULT NULL,
  `misi` varchar(500) DEFAULT NULL,
  `tujuan` varchar(500) DEFAULT NULL,
  `kebijakan` varchar(500) DEFAULT NULL,
  `moto` varchar(500) DEFAULT NULL,
  `selengkapnya` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profile_sekolah`
--

INSERT INTO `profile_sekolah` (`id`, `photo`, `pembuat`, `date`, `tempat`, `nks`, `visi`, `misi`, `tujuan`, `kebijakan`, `moto`, `selengkapnya`) VALUES
(3, '1567996586276.jpg', 'Indra Saepudin', '2019-09-09', 'Komplek Yayasan Pesantren Cintawana', 'Drs. Ujang Sanusi, MM', 'Menjadi SMK yang unggul dalam prestasi, didasari IMTAK, dihiasi Akhlakul Karimah dan dibekali dengan IPTEK serta mampu bersaing pada tingkat Nasional dan Global', 'Untuk mewujudkan visi tersebut maka misi yang diemban oleh SMK YPC adalah sebagai berikut:\r\nMeningkatkan profesionalisme dan akuntabilitas kinerja serta tanggap terhadap perubahan dan simpatik dalam pelayanan.\r\nMenumbuhkan semangat keunggulan dan kompetitif secara intensif kepada seluruh warga sekolah.\r\nMewujudkan lingkungan pendidikan yang kondusif, penuh kreativitas, kerjasama dan dinamika dengan penonjolan prestasi tinggi.\r\nMenyelenggarakan pendidikan yang aktif, efektif, efesien, berkualitas', ' Pengembangan SMK berstandar nasional/internasional.\r\nMengembangkan pembelajaran dengan mengintegrasikan konsep BBE pada semua Bidang Diklat.\r\nPemberdayaan SMK YPC sebagai Pusat Pendidikan dan Pelatihan Kejuruan Terpadu ( PPKT ).\r\nMeningkatkan kompetensi guru dan peserta didik sebagai sumber daya profesional masa depan.\r\nMenghasilkan lulusan yang produktif.\r\nMenyempurnakan fasilitas pendidikan dan pengajaran serta mewujudkan suasana belajar mengajar yang kondusif.\r\nMemelihara dan meningkatkan ja', 'Menghasilkan lulusan yang percaya diri, bermoral dan produktif melalui sistem pendidikan dan manajemen sekolah yang bermutu tinggi maupun melalui kerjasama dengan dunia usaha dan industri secara berkelanjutan.', 'Ilmu yang amaliah, amal yang ilmiah, dan akhlakul karimah', 'Alhamdulillah kita panjatkan kepada Allah SWT atas limpahan rahmat, taufiq dan hidayah-Nya, mudah-mudahan kita selalu dalam lindungan-Nya. Amien. Perkembangan ilmu…');

-- --------------------------------------------------------

--
-- Table structure for table `sarana`
--

CREATE TABLE IF NOT EXISTS `sarana` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(250) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sarana`
--

INSERT INTO `sarana` (`id`, `photo`, `nama`, `keterangan`, `date`) VALUES
(1, '1567534874545.png', 'Studio Musik', 'Studio Musik Smk Ypc Tasikmalaya', '2019-08-30'),
(3, '1567534748578.png', 'Bengkel TBSM', 'Bengkel TBSM SMK YPC Tasikmalaya', '2019-08-30'),
(4, '1567534804342.png', 'Bengkel TKR', 'Bengkel Teknik Kendaraan ringan', '2019-09-11'),
(5, '1567534629529.png', 'Ruangan Teknik Komputer Jaringan', 'Ruangan Teknik Komputer Jaringan', '2019-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `show`
--

CREATE TABLE IF NOT EXISTS `show` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `show`
--

INSERT INTO `show` (`id`, `photo`, `title`, `deskripsi`, `date`) VALUES
(2, '1567137299553.jpg', 'Teknik Komputer dan Jaringan', 'Teknik Komputer dan Jaringan adalah jurusan yang memperdalam ilmu komputer dalam bidang Jaringan Komputer', '2019-08-20'),
(3, '1567137246854.png', 'Rekayasa Perangkat Lunak', 'Rekayasa Perangkat Lunak atau Software Enginering adalah jurusan yang memperdalam ilmu komputer dalam bidang Software  ', '2019-08-29'),
(4, '1567137364427.jpg', 'Multimedia', 'Mutimedia adalah Jurusan yang memperdalam ilmu mutimedia', '2019-08-30'),
(5, '1568184811080.jpg', 'Teknik Bisnis Sepeda Motor', 'Teknik Bisnis Sepeda Motor adalah Jurusan yang memperdalam ilmu Teknik Bisnis Sepeda Motor', '2019-08-30'),
(6, '1568185009868.jpg', 'Teknik Kendaraan Ringan', 'Teknik Kendaraan Ringan adalah Jurusan yang memperdalam ilmu Permobilan', '2019-08-30'),
(7, '1568184746385.jpg', 'Teknik Electronika Industri', 'Teknik Electronika Industri adalah ilmu yang mempelajari tentang Robotik', '2019-08-30'),
(8, '1567138678349.png', 'Desain Permodelan dan Informasi Bangunan', 'Desain Permodelan dan Informasi Bangunan Adalah Jurusan untuk memperdalam ilmu Bangunan', '2019-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(250) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nis` int(50) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tahun_masuk` varchar(100) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `agama` enum('islam','kristen protestan','kristen katolik','hindu','buddha','konghuchu') DEFAULT NULL,
  `sekolah_asal` varchar(200) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `jurusan` varchar(500) DEFAULT NULL,
  `ke` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(500) DEFAULT NULL,
  `ruangan` varchar(500) DEFAULT NULL,
  `gelombang` varchar(500) DEFAULT NULL,
  `testing` varchar(500) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `photo`, `nama`, `nis`, `kelas`, `jenis_kelamin`, `tahun_masuk`, `ttl`, `alamat`, `agama`, `sekolah_asal`, `nama_ibu`, `nama_ayah`, `email`, `jurusan`, `ke`, `tanggal`, `waktu`, `ruangan`, `gelombang`, `testing`, `status`) VALUES
(33, '1568359571550.jpg', 'nama', 12345, 'X', 'perempuan', '2019', '2001-07-15', 'tasikmalaya', 'islam', 'mts al-aziz', 'dedeh', 'aep', 'sisawaktu0@gmail.com', 'Rekayasa Perangkat Lunak', '2', '2019-09-13', '12:12', 'aula lantai 2', '3', 'ikut', 'Diterima'),
(36, '1568616575409.jpg', 'saepudin', 12345, 'XII', 'laki-laki', '09/09/2019', '2001-07-15', 'tasikmalaya', 'islam', 'mts al-aziz', 'dedeh', 'aep', 'sisawaktu0@gmail.com', 'Rekayasa Perangkat Lunak', '1', '2019-09-13', '21:34', 'lapangan', '1', 'tidak', 'Sedang di Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `nama_user` (`nama_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `password`, `nama_user`, `level`) VALUES
(1, 'admin', 'admin', 'indra', 'admin'),
(2, 'user', 'user', 'saepudin', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', 'admin', 'indra');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
