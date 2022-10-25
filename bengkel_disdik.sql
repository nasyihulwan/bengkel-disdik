-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2022 at 08:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel_disdik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tipe_barang` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `jenis_kendaraan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `nama_bulan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember'),
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `b_service`
--

CREATE TABLE `b_service` (
  `nama_pemegang` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `alamat_pemegang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `no_regis_kendaraan` varchar(255) NOT NULL,
  `nama_tipe_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `no_regis` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat_stnk` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `thn_pembuatan` varchar(255) NOT NULL,
  `silinder` int(11) NOT NULL,
  `no_rangka` varchar(255) NOT NULL,
  `no_mesin` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `warna_tnkb` varchar(255) NOT NULL,
  `thn_registrasi` varchar(255) NOT NULL,
  `no_bpkb` varchar(255) NOT NULL,
  `kd_lokasi` varchar(255) NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `kilometer` int(11) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `jenis_service` varchar(255) NOT NULL,
  `ket_booking` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `kode_antri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_service`
--

INSERT INTO `b_service` (`nama_pemegang`, `nip`, `alamat_pemegang`, `email`, `no_telp`, `no_regis_kendaraan`, `nama_tipe_kendaraan`, `jenis_kendaraan`, `no_regis`, `nama_pemilik`, `alamat_stnk`, `merk`, `tipe`, `jenis`, `thn_pembuatan`, `silinder`, `no_rangka`, `no_mesin`, `warna`, `bahan_bakar`, `warna_tnkb`, `thn_registrasi`, `no_bpkb`, `kd_lokasi`, `berlaku_sampai`, `kilometer`, `booking_date`, `jenis_service`, `ket_booking`, `status`, `kode_antri`) VALUES
('Muhammad Nasyih Ulwan', '202020', 'BOJONG AWI', 'mmhdnnas@gmail.com', '08123456789', 'D666GOG', 'BEAT CBS ISS', 'Motor', 'D666GOG', 'GOKU', 'ARCAMANIK', '1', '1', 'SPD MOTOR', '2020', 110, '1', '1', 'HITAM', 'BENSIN', 'HITAM', '2020', '1', '1', '2025-10-31', 2000, '2022-10-08', 'Perawatan Rutin', '', 'Antri', 'QA0000000001');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`id`, `nama`, `no_telp`, `email`, `alamat`, `image`) VALUES
(1, 'DISDIK BANDUNG', '0227106568', 'disdik@bandung.go.id', 'Jl. Ahmad Yani No.239, Pasir Kaliki, Kec. Cicendo, Kota Bandung, Jawa Barat 40171', 'disdik1.png');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_regis` varchar(25) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `thn_pembuatan` varchar(255) NOT NULL,
  `silinder` int(11) NOT NULL,
  `no_rangka` varchar(255) NOT NULL,
  `no_mesin` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `bahan_bakar` varchar(255) NOT NULL,
  `warna_tnkb` varchar(255) NOT NULL,
  `thn_registrasi` varchar(255) NOT NULL,
  `no_bpkb` varchar(255) NOT NULL,
  `kd_lokasi` varchar(255) NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `kilometer` int(11) NOT NULL,
  `service_terakhir` date NOT NULL,
  `check_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`no_regis`, `nama_pemilik`, `alamat`, `merk`, `tipe`, `jenis`, `thn_pembuatan`, `silinder`, `no_rangka`, `no_mesin`, `warna`, `bahan_bakar`, `warna_tnkb`, `thn_registrasi`, `no_bpkb`, `kd_lokasi`, `berlaku_sampai`, `kilometer`, `service_terakhir`, `check_service`) VALUES
('D4820ADE', 'EPI YULIA', 'BOJONG AWI KALER RT 004 RW 003 ARCAMANIK', 'HONDA', 'H1B02N42L0', 'MOTOR', '2020', 110, 'MH1JM0117LK266798', 'JM91E1267516', 'HITAM', 'BENSIN', 'HITAM', '2020', 'Q 05878368', '12020', '2025-12-25', 12000, '2022-10-04', 1),
('D666GOG', 'GOKU', 'ARCAMANIK', '1', '1', 'SPD MOTOR', '2020', 110, '1', '1', 'HITAM', 'BENSIN', 'HITAM', '2020', '1', '1', '2025-10-31', 2000, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `list_barang_supplier`
--

CREATE TABLE `list_barang_supplier` (
  `kode_barang` varchar(255) NOT NULL,
  `kode_supplier` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `jenis_kendaraan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_barang_supplier`
--

INSERT INTO `list_barang_supplier` (`kode_barang`, `kode_supplier`, `nama_barang`, `jenis_barang`, `merk`, `model`, `harga`, `stok`, `jenis_kendaraan`) VALUES
('SUPBRG00001', 'SUP00001', 'Oli Aseli', 'Oli', '1', '1', 60000, 58, 'Motor'),
('SUPBRG00002', 'SUP00002', 'Jalu Stang', 'Sparepart', 'KTC', 'Universal', 100000, 99, 'Motor'),
('SUPBRG00003', 'SUP00002', 'Spion Carbon', 'Sparepart', 'Unk', 'Carbon', 30000, 5, 'Motor');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Kendaraan'),
(2, 'Pemegang'),
(3, 'Barang'),
(4, 'Service'),
(5, 'Supplier'),
(6, 'Pelanggan'),
(7, 'Profile'),
(8, 'Edit_profile'),
(9, 'List'),
(10, 'Tambah_user'),
(11, 'Bengkel'),
(12, 'Update_role'),
(13, 'Booking');

-- --------------------------------------------------------

--
-- Table structure for table `menu_access`
--

CREATE TABLE `menu_access` (
  `id` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `menu_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_access`
--

INSERT INTO `menu_access` (`id`, `role_id`, `menu_id`) VALUES
(1, '1', '1'),
(2, '1', '2'),
(3, '1', '3'),
(4, '1', '4'),
(5, '1', '5'),
(6, '1', '6'),
(7, '1', '7'),
(8, '1', '8'),
(9, '1', '9'),
(10, '1', '10'),
(11, '1', '11'),
(12, '1', '12'),
(13, '2', '1'),
(14, '2', '2'),
(15, '2', '3'),
(16, '2', '4'),
(17, '2', '5'),
(18, '2', '6'),
(19, '2', '7'),
(20, '2', '8'),
(21, '3', '3'),
(22, '3', '5'),
(23, '3', '7'),
(24, '3', '8'),
(25, '1', '13'),
(37, '2', '1'),
(38, '2', '2'),
(39, '2', '3'),
(40, '2', '4'),
(41, '2', '5'),
(42, '2', '6'),
(43, '2', '7'),
(44, '2', '8'),
(45, '3', '3'),
(46, '3', '5'),
(47, '3', '7'),
(48, '3', '8'),
(55, '2', '13'),
(60, '4', '5'),
(61, '4', '7'),
(62, '4', '8');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp`) VALUES
('CS00001', 'Anas', 'KAMBOJA', '089604129300');

-- --------------------------------------------------------

--
-- Table structure for table `pemegang_kendaraan`
--

CREATE TABLE `pemegang_kendaraan` (
  `kode_pemegang` varchar(255) NOT NULL,
  `nama_pemegang` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `alamat_pemegang` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `no_regis_kendaraan` varchar(255) NOT NULL,
  `nama_tipe_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `foto_pemegang` varchar(255) NOT NULL,
  `foto_kendaraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemegang_kendaraan`
--

INSERT INTO `pemegang_kendaraan` (`kode_pemegang`, `nama_pemegang`, `nip`, `alamat_pemegang`, `email`, `no_telp`, `no_regis_kendaraan`, `nama_tipe_kendaraan`, `jenis_kendaraan`, `foto_pemegang`, `foto_kendaraan`) VALUES
('PM00001', 'Nasyih Ulwan	', '202110011', 'ARCAMANIK', 'nasyih@disdik.com	', '089604129300', 'D4820ADE', 'BEAT CBS ISS', 'Motor', 'pemegang_default.jpg', 'kendaraan_default.jpg'),
('PM00002', 'Muhammad Nasyih Ulwan', '202020', 'BOJONG AWI', 'mmhdnnas@gmail.com', '08123456789', 'D666GOG', 'BEAT CBS ISS', 'Motor', 'pemegang_default.jpg', 'kendaraan_default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_faktur` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tunai` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `kode_pelanggan` varchar(255) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_faktur`, `tgl_transaksi`, `tunai`, `status`, `kode_pelanggan`, `jenis_transaksi`, `id_user`) VALUES
('BRG1010220001', '2022-10-10', 100000, 'Selesai', 'CS00001', 'Barang', '1'),
('BRG1010220002', '2022-10-10', 100000, 'Selesai', 'CS00001', 'Barang', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `no_faktur` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `tipe_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`no_faktur`, `kode_barang`, `jenis_transaksi`, `tipe_barang`, `harga`, `qty`) VALUES
('BRG1010220001', 'BR00003', 'Barang', 'Sparepart', 100000, 1),
('BRG1010220002', 'BR00003', 'Barang', 'Sparepart', 100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail_temp`
--

CREATE TABLE `penjualan_detail_temp` (
  `kode_barang` varchar(255) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_stok`
--

CREATE TABLE `p_stok` (
  `no_faktur` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_stok`
--

INSERT INTO `p_stok` (`no_faktur`, `tgl_transaksi`, `kode_supplier`, `id_user`) VALUES
('STCK0510220001', '2022-10-05', 'SUP00001', '1'),
('STCK0610220001', '2022-10-06', 'SUP00002', '2');

-- --------------------------------------------------------

--
-- Table structure for table `p_stok_detail`
--

CREATE TABLE `p_stok_detail` (
  `no_faktur` varchar(255) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_stok_detail`
--

INSERT INTO `p_stok_detail` (`no_faktur`, `kode_supplier`, `kode_barang`, `jenis_barang`, `harga`, `qty`) VALUES
('STCK0510220001', 'SUP00001', 'SUPBRG00001', 'Oli', 60000, 10),
('STCK0610220001', 'SUP00002', 'SUPBRG00002', 'Sparepart', 100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `p_stok_temp`
--

CREATE TABLE `p_stok_temp` (
  `kode_supplier` varchar(255) NOT NULL,
  `kode_barang_temp` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `kode_service` varchar(255) NOT NULL,
  `nama_service` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `tipe_kendaraan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`kode_service`, `nama_service`, `jenis_kendaraan`, `tipe_kendaraan`, `harga`) VALUES
('SR00001', 'Servis Tune Up', 'mobil', '', 600000),
('SR00002', 'Paket Service Ringan', 'mobil', '', 500000),
('SR00005', 'Service Ringan', 'motor', 'BEAT CBS ISS', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(20) NOT NULL,
  `id_user` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `id_user`, `nama`, `email`, `alamat`, `no_telp`) VALUES
('SUP00001', '4', 'Jamal', 'jamal.allin@gmail.com', 'Cisaranten Bina Harapan', '08970539710'),
('SUP00002', '', 'Nas Knalpot', 'mnasyihulwan1103@gmail.com', 'BOJONG AWI', '08912345678');

-- --------------------------------------------------------

--
-- Table structure for table `t_service`
--

CREATE TABLE `t_service` (
  `no_faktur` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tunai` int(11) NOT NULL,
  `kode_pemegang` varchar(255) NOT NULL,
  `nomor_plat_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jam_masuk` datetime NOT NULL,
  `jam_keluar` datetime NOT NULL,
  `initial_km` int(11) NOT NULL,
  `current_km` int(11) NOT NULL,
  `next_service` date NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_service`
--

INSERT INTO `t_service` (`no_faktur`, `tgl_transaksi`, `tunai`, `kode_pemegang`, `nomor_plat_kendaraan`, `jenis_kendaraan`, `status`, `jam_masuk`, `jam_keluar`, `initial_km`, `current_km`, `next_service`, `id_user`) VALUES
('SRV0410220001', '2022-10-04', 100000, 'PM00001', 'D4820ADE', 'Motor', 'Selesai', '2022-10-04 18:42:24', '2022-10-04 19:30:31', 6000, 12000, '2023-04-04', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_service_detail`
--

CREATE TABLE `t_service_detail` (
  `no_faktur` varchar(255) DEFAULT NULL,
  `kode_service` varchar(255) DEFAULT NULL,
  `jenis_transaksi` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_service_detail`
--

INSERT INTO `t_service_detail` (`no_faktur`, `kode_service`, `jenis_transaksi`, `harga`, `qty`) VALUES
('SRV0410220001', 'SR00005', 'Service', 70000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_service_detail_temp`
--

CREATE TABLE `t_service_detail_temp` (
  `kode_service` varchar(255) NOT NULL,
  `jenis_transaksi` varchar(255) NOT NULL,
  `harga_service` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `kode_supplier` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `no_telp`, `alamat`, `role_id`, `kode_supplier`, `is_active`, `date_created`) VALUES
(1, 'Administrator', 'administrator@disdik.com', 'default.jpg', '$2y$10$PUjEwg2/rmLQ3CmXHcbXauCQLBVWf3MTe.w27XpxP7nHqgeoaJyVS', '08123456789', 'DINAS PENDIDIKAN', 1, '', 1, 1657898467),
(2, 'Admin', 'admin@disdik.com', 'default.jpg', '$2y$10$u3NpEJXSeE2QsCdG2rui.uKfEDTZlGWTi3OLW0zcmyGSZiNHKh/x2', '08123456789', 'DINAS PENDIDIKAN', 2, '', 1, 1664477181),
(3, 'Staff', 'staff@disdik.com', 'default.jpg', '$2y$10$POhcfEttT6EFEFF4O4sQpeo3vLavfKIQLtMc5phRDVMRgm9ifYKiS', '08123456789', 'DINAS PENDIDIKAN', 3, '', 1, 1664477137),
(4, 'Supplier', 'supplier@disdik.com', 'default.jpg', '$2y$10$ybKpJlbNRyzs1OSbCgrzEO8BFo9FTfzq1NDPCkK6L1Q9zGPeyC0ZS', '08123456789', 'DINAS PENDIDIKAN', 4, 'SUP00001', 1, 1664731166),
(127, 'Nas Knalpot', 'mnasyihulwan1103@gmail.com', 'default.jpg', '$2y$10$Ikd4DtT/HYCorQGjjAspJOHxP.H0341GiVSuDP4qS9xt9PO2mM.UW', '089666', 'BOJONG AWI', 4, 'SUP00002', 1, 1665239475);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Admin'),
(3, 'Staff'),
(4, 'Supplier');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalpembelian`
-- (See below for the actual view)
--
CREATE TABLE `view_totalpembelian` (
`no_faktur` varchar(255)
,`totalpembelian` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totalpenjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_totalpenjualan` (
`no_faktur` varchar(255)
,`totalpenjualan` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_totaltrxservice`
-- (See below for the actual view)
--
CREATE TABLE `view_totaltrxservice` (
`no_faktur` varchar(255)
,`totalt_service` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_totalpembelian`
--
DROP TABLE IF EXISTS `view_totalpembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalpembelian`  AS SELECT `p_stok_detail`.`no_faktur` AS `no_faktur`, sum(`p_stok_detail`.`harga` * `p_stok_detail`.`qty`) AS `totalpembelian` FROM `p_stok_detail` GROUP BY `p_stok_detail`.`no_faktur` ;

-- --------------------------------------------------------

--
-- Structure for view `view_totalpenjualan`
--
DROP TABLE IF EXISTS `view_totalpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totalpenjualan`  AS SELECT `penjualan_detail`.`no_faktur` AS `no_faktur`, sum(`penjualan_detail`.`harga` * `penjualan_detail`.`qty`) AS `totalpenjualan` FROM `penjualan_detail` GROUP BY `penjualan_detail`.`no_faktur` ;

-- --------------------------------------------------------

--
-- Structure for view `view_totaltrxservice`
--
DROP TABLE IF EXISTS `view_totaltrxservice`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_totaltrxservice`  AS SELECT `t_service_detail`.`no_faktur` AS `no_faktur`, sum(`t_service_detail`.`harga` * `t_service_detail`.`qty`) AS `totalt_service` FROM `t_service_detail` GROUP BY `t_service_detail`.`no_faktur` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `b_service`
--
ALTER TABLE `b_service`
  ADD PRIMARY KEY (`nama_pemegang`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_regis`);

--
-- Indexes for table `list_barang_supplier`
--
ALTER TABLE `list_barang_supplier`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_access`
--
ALTER TABLE `menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `pemegang_kendaraan`
--
ALTER TABLE `pemegang_kendaraan`
  ADD PRIMARY KEY (`kode_pemegang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `p_stok`
--
ALTER TABLE `p_stok`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`kode_service`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `t_service`
--
ALTER TABLE `t_service`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu_access`
--
ALTER TABLE `menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
