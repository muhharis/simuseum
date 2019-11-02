-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jul 2019 pada 06.44
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_klinik2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `grup_id` varchar(15) NOT NULL,
  `grup` varchar(15) NOT NULL,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`grup_id`, `grup`, `is_aktif`) VALUES
('1', 'Administrator', 'Aktif'),
('2', 'Dokter', 'Aktif'),
('3', 'Resepsionis', 'Aktif'),
('4', 'Kasir', 'Aktif'),
('5', 'Ketua', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `in_penerimaan_hadiah`
--

CREATE TABLE `in_penerimaan_hadiah` (
  `no_penerimaan_hadiah` varchar(60) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `id_hadiah` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `in_penerimaan_hadiah`
--

INSERT INTO `in_penerimaan_hadiah` (`no_penerimaan_hadiah`, `tanggal`, `jam`, `id_hadiah`, `jumlah`, `ket`, `create_at`, `update_at`) VALUES
('PENERIMAAN-HADIAH-0001', NULL, '07:26:33', 'KD-DAF-HADIAH-0001', 50, '', '2019-07-17 12:26:54', NULL),
('PENERIMAAN-HADIAH-0002', NULL, '07:26:58', 'KD-DAF-HADIAH-0002', 20, '', '2019-07-17 12:27:04', NULL),
('PENERIMAAN-HADIAH-0003', NULL, '07:27:04', 'KD-DAF-HADIAH-0005', 20, '', '2019-07-17 12:27:09', NULL),
('PENERIMAAN-HADIAH-0004', NULL, '07:27:10', 'KD-DAF-HADIAH-0008', 20, '', '2019-07-17 12:27:13', NULL),
('PENERIMAAN-HADIAH-0005', NULL, '07:27:13', 'KD-DAF-HADIAH-0006', 10, '', '2019-07-17 12:27:17', NULL),
('PENERIMAAN-HADIAH-0006', NULL, '07:27:17', 'KD-DAF-HADIAH-0004', 50, '', '2019-07-17 12:27:22', NULL),
('PENERIMAAN-HADIAH-0007', '2019-08-01', '22:03:00', 'KD-DAF-HADIAH-0002', 0, '', '2019-07-20 03:03:05', '2019-07-20 03:05:32'),
('PENERIMAAN-HADIAH-0008', '2019-07-19', '22:05:09', 'KD-DAF-HADIAH-0002', 90, '', '2019-07-20 03:05:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `in_penerimaan_obat`
--

CREATE TABLE `in_penerimaan_obat` (
  `no_penerimaan_obat` varchar(60) NOT NULL,
  `jam` time DEFAULT NULL,
  `tanggal_penerimaan` date DEFAULT NULL,
  `id_pemasok` varchar(20) DEFAULT NULL,
  `id_barang` varchar(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `in_penerimaan_obat`
--

INSERT INTO `in_penerimaan_obat` (`no_penerimaan_obat`, `jam`, `tanggal_penerimaan`, `id_pemasok`, `id_barang`, `jumlah`, `ket`, `create_at`, `update_at`) VALUES
('PENERIMAAN-OBAT-0001', '07:17:15', '2019-07-17', 'KD-PEM-KLINIK-0001', 'BRG-0001', 60, '', '2019-07-17 12:16:00', '2019-07-17 12:17:19'),
('PENERIMAAN-OBAT-0002', '07:17:28', '2019-07-17', 'KD-PEM-KLINIK-0001', 'BRG-0002', 70, '', '2019-07-17 12:17:34', NULL),
('PENERIMAAN-OBAT-0003', '07:17:47', '2019-07-17', 'KD-PEM-KLINIK-0001', 'BRG-0003', 60, '', '2019-07-17 12:17:51', NULL),
('PENERIMAAN-OBAT-0004', '07:17:52', '2019-07-17', 'KD-PEM-KLINIK-0001', 'BRG-0004', 70, '', '2019-07-17 12:17:56', NULL),
('PENERIMAAN-OBAT-0005', '07:17:57', '2019-07-17', 'KD-PEM-KLINIK-0001', 'BRG-0005', 80, '', '2019-07-17 12:18:02', NULL),
('PENERIMAAN-OBAT-0006', '07:18:02', '2019-07-17', 'KD-PEM-KLINIK-0001', 'BRG-0006', 40, '', '2019-07-17 12:18:05', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `grup_brg_id` varchar(20) NOT NULL,
  `kategori_brg_id` varchar(20) NOT NULL,
  `satuan_id` varchar(20) NOT NULL,
  `spesifikasi` text NOT NULL,
  `foto_brg` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`kode_barang`, `nm_barang`, `grup_brg_id`, `kategori_brg_id`, `satuan_id`, `spesifikasi`, `foto_brg`, `create_at`, `update_at`, `is_aktif`) VALUES
('BRG-0001', 'A Compac', '1', 'KD-KAT-BRG-0001', 'KD-SATUAN-BRG-0001', 'Tidak Ada', 'KM.png', '2019-07-17 11:53:38', NULL, 'Aktif'),
('BRG-0002', 'A Compac laightening', '1', 'KD-KAT-BRG-0001', 'KD-SATUAN-BRG-0001', 'TIdak Ada', '1.png', '2019-07-17 11:54:16', NULL, 'Aktif'),
('BRG-0003', 'A Compac sebum control', '1', 'KD-KAT-BRG-0001', 'KD-SATUAN-BRG-0001', 'Tidak Ada', '3070052576_2ADeHaCF_panda_14.j', '2019-07-17 11:54:55', NULL, 'Aktif'),
('BRG-0004', 'A powder sebum control', '1', 'KD-KAT-BRG-0001', 'KD-SATUAN-BRG-0001', 'Tidak Ada', '3070052576_2ADeHaCF_panda_14.j', '2019-07-17 11:55:24', NULL, 'Aktif'),
('BRG-0005', 'Acne Lotion', '1', 'KD-KAT-BRG-0001', 'KD-SATUAN-BRG-0001', 'Tidak Ada', 'KM.png', '2019-07-17 11:55:44', NULL, 'Aktif'),
('BRG-0006', 'Acne Lotion Sol', '1', 'KD-KAT-BRG-0001', 'KD-SATUAN-BRG-0001', 'Tidak Ada', '1.png', '2019-07-17 11:56:07', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_bayar`
--

CREATE TABLE `m_bayar` (
  `kode_kwitansi` varchar(60) NOT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `kode_pelaksana` varchar(60) DEFAULT NULL,
  `no_registrasi` varchar(60) DEFAULT NULL,
  `b_periksa` double DEFAULT NULL,
  `b_obat` double DEFAULT NULL,
  `total_bayar` double DEFAULT NULL,
  `tunai` double DEFAULT NULL,
  `kembali` double DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_bayar`
--

INSERT INTO `m_bayar` (`kode_kwitansi`, `tgl`, `jam`, `kode_pelaksana`, `no_registrasi`, `b_periksa`, `b_obat`, `total_bayar`, `tunai`, `kembali`, `create_at`, `update_at`) VALUES
('KWITANSI-PASIEN-MUTIAVIE-0001', '2019-07-17', '14:10:00', 'PELKSANA-KLINIK-0001', 'REGISTRASI-PASIEN-MUTIAVIE-0001', 90000, 89000, 179000, 200000, 21000, '2019-07-17 14:10:56', NULL),
('KWITANSI-PASIEN-MUTIAVIE-0002', '2019-07-20', '08:59:00', 'PELKSANA-KLINIK-0003', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 23000, 32456, 55456, 9000000, 8944544, '2019-07-20 20:52:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_hadiah`
--

CREATE TABLE `m_hadiah` (
  `id_hadiah` varchar(20) NOT NULL,
  `hadiah` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_hadiah`
--

INSERT INTO `m_hadiah` (`id_hadiah`, `hadiah`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-DAF-HADIAH-0001', 'PIRING', '2019-07-17 12:23:36', NULL, 'Aktif'),
('KD-DAF-HADIAH-0002', 'PAYUNG', '2019-07-17 12:23:45', NULL, 'Aktif'),
('KD-DAF-HADIAH-0003', 'JAM DINDING', '2019-07-17 12:24:57', NULL, 'Aktif'),
('KD-DAF-HADIAH-0004', 'PARFUM', '2019-07-17 12:25:02', NULL, 'Aktif'),
('KD-DAF-HADIAH-0005', 'TAPLAK MEJA', '2019-07-17 12:25:08', NULL, 'Aktif'),
('KD-DAF-HADIAH-0006', 'GELAS', '2019-07-17 12:25:11', NULL, 'Aktif'),
('KD-DAF-HADIAH-0007', 'HAND BODY LOTION', '2019-07-17 12:25:18', NULL, 'Aktif'),
('KD-DAF-HADIAH-0008', 'SUNBLOK', '2019-07-17 12:25:23', NULL, 'Aktif'),
('KD-DAF-HADIAH-0009', 'LOOSE POWRED', '2019-07-17 12:25:30', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `no_rek_medik` varchar(60) NOT NULL,
  `nm_pasien` varchar(30) NOT NULL,
  `id_gender` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kd_kel` varchar(20) NOT NULL,
  `agama_id` varchar(20) NOT NULL,
  `pend_id` varchar(20) NOT NULL,
  `id_pekerjaan` varchar(25) NOT NULL,
  `id_sk` varchar(20) NOT NULL,
  `foto_pasien` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`no_rek_medik`, `nm_pasien`, `id_gender`, `tgl_lahir`, `tmpt_lahir`, `no_identitas`, `no_telp`, `gol_darah`, `alamat`, `kd_kel`, `agama_id`, `pend_id`, `id_pekerjaan`, `id_sk`, `foto_pasien`, `create_at`, `update_at`, `is_aktif`) VALUES
('REKMED-MUTIAVIE-0001', 'Muhammad Haris', 'LAKI-LAKI', '2019-07-16', 'Solo', '456', '5678', 'A', 'Surakarta', 'KD-WIL-KEL-0004', 'ISLAM', 'Tamat SMA', 'Lainnya', 'Belum kawin', '3070052576_2ADeHaCF_', '2019-07-17 14:06:26', NULL, 'Aktif'),
('REKMED-MUTIAVIE-0002', 'Muhammad Haris', 'LAKI-LAKI', '2019-08-06', 'Solo', '2323', '232434', 'A', 'Surakarta', 'KD-WIL-KEL-0001', 'BUDDHA', 'Masih SD', 'Lainnya', 'Belum kawin', '3070052576_2ADeHaCF_', '2019-07-20 20:48:43', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pelaksana`
--

CREATE TABLE `m_pelaksana` (
  `kode_pelaksana` varchar(60) NOT NULL,
  `nama_pelaksana` varchar(30) NOT NULL,
  `peran_pelaksana_id` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pelaksana`
--

INSERT INTO `m_pelaksana` (`kode_pelaksana`, `nama_pelaksana`, `peran_pelaksana_id`, `create_at`, `update_at`, `is_aktif`) VALUES
('PELKSANA-KLINIK-0001', 'Hasbi', 'KD-PR-PEL-0001', '2019-07-17 11:40:57', NULL, 'Aktif'),
('PELKSANA-KLINIK-0002', 'Firda', 'KD-PR-PEL-0002', '2019-07-17 11:41:04', NULL, 'Aktif'),
('PELKSANA-KLINIK-0003', 'Devina', 'KD-PR-PEL-0003', '2019-07-17 11:41:12', NULL, 'Aktif'),
('PELKSANA-KLINIK-0004', 'Bagas', 'KD-PR-PEL-0004', '2019-07-17 11:41:21', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pelayanan`
--

CREATE TABLE `m_pelayanan` (
  `kode_pelayanan` varchar(60) NOT NULL,
  `no_registrasi` varchar(60) DEFAULT NULL,
  `id_kunjungan` varchar(20) DEFAULT NULL,
  `tgl_pelayanan` date DEFAULT NULL,
  `antrian` int(5) DEFAULT NULL,
  `masuk` datetime DEFAULT NULL,
  `keluar` datetime DEFAULT NULL,
  `is_aktif` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pelayanan`
--

INSERT INTO `m_pelayanan` (`kode_pelayanan`, `no_registrasi`, `id_kunjungan`, `tgl_pelayanan`, `antrian`, `masuk`, `keluar`, `is_aktif`) VALUES
('PELAYANAN-PASIEN-MUTIAVIE-0001', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-01', '2019-07-18', 5, NULL, NULL, 'Aktif'),
('PELAYANAN-PASIEN-MUTIAVIE-0002', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-01', '2019-07-11', 9, NULL, NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pemasok`
--

CREATE TABLE `m_pemasok` (
  `kode_pemasok` varchar(20) NOT NULL,
  `nm_pemasok` varchar(90) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto_pemasok` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pemasok`
--

INSERT INTO `m_pemasok` (`kode_pemasok`, `nm_pemasok`, `no_ktp`, `alamat`, `kota`, `telp`, `foto_pemasok`, `ket`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-PEM-KLINIK-0001', 'Bu Tri', '123', 'Jepara', 'Jepara', '0989903290432', '', 'Pemasok Tetap', '2019-07-17 11:57:46', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tindakan`
--

CREATE TABLE `m_tindakan` (
  `kode_tindakan` varchar(60) NOT NULL,
  `grup_tindakan_id` varchar(20) NOT NULL,
  `tindakan` varchar(100) NOT NULL,
  `s_pelaksana` varchar(10) NOT NULL DEFAULT '1',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_tindakan`
--

INSERT INTO `m_tindakan` (`kode_tindakan`, `grup_tindakan_id`, `tindakan`, `s_pelaksana`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-TIN-MED-0001', 'KD-GRUP-TIN-0001', 'Akupuntur Betis', 'Ya', '2019-07-17 11:46:10', NULL, 'Aktif'),
('KD-TIN-MED-0002', 'KD-GRUP-TIN-0001', 'Akupuntur Kaki', 'Ya', '2019-07-17 11:46:19', NULL, 'Aktif'),
('KD-TIN-MED-0003', 'KD-GRUP-TIN-0001', 'Akupuntur Lengan', 'Ya', '2019-07-17 11:46:31', NULL, 'Aktif'),
('KD-TIN-MED-0004', 'KD-GRUP-TIN-0001', 'Akupuntur Paha', 'Ya', '2019-07-17 11:46:41', NULL, 'Aktif'),
('KD-TIN-MED-0005', 'KD-GRUP-TIN-0001', 'Akupuntur Penggemukan', 'Ya', '2019-07-17 11:46:55', NULL, 'Aktif'),
('KD-TIN-MED-0006', 'KD-GRUP-TIN-0001', 'Akupuntur Perut', 'Ya', '2019-07-17 11:47:10', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `harga_jual_id` varchar(60) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `harga_jual_id`, `qty`, `subtotal`) VALUES
(1, 'HARGA-JUAL-BRG-0001', 30, '2700000'),
(2, 'HARGA-JUAL-BRG-0002', 10, '800000'),
(3, 'HARGA-JUAL-BRG-0003', 2, '160000'),
(4, 'HARGA-JUAL-BRG-0001', 1, '90000'),
(5, 'HARGA-JUAL-BRG-0002', 1, '80000'),
(6, 'HARGA-JUAL-BRG-0003', 1, '80000'),
(7, 'HARGA-JUAL-BRG-0004', 1, '70000'),
(8, 'HARGA-JUAL-BRG-0005', 1, '90000'),
(9, 'HARGA-JUAL-BRG-0001', 1, '90000'),
(10, 'HARGA-JUAL-BRG-0002', 1, '80000'),
(11, 'HARGA-JUAL-BRG-0003', 1, '80000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_agama`
--

CREATE TABLE `r_agama` (
  `agama_id` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_agama`
--

INSERT INTO `r_agama` (`agama_id`, `agama`, `create_at`, `update_at`, `is_aktif`) VALUES
('BUDDHA', 'BUDDHA', '2019-07-17 02:47:58', NULL, 'Aktif'),
('HINDU', 'HINDU', '2019-07-17 02:48:05', NULL, 'Aktif'),
('ISLAM', 'ISLAM', '2019-07-17 02:47:32', NULL, 'Aktif'),
('KHATOLIK', 'KHATOLIK', '2019-07-17 02:47:46', NULL, 'Aktif'),
('KONG HU CHU', 'KONG HU CH', '2019-07-17 02:48:13', NULL, 'Aktif'),
('KRISTEN', 'KRISTEN', '2019-07-17 02:47:39', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_bank`
--

CREATE TABLE `r_bank` (
  `bank_id` varchar(20) NOT NULL,
  `bank` varchar(10) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_bank`
--

INSERT INTO `r_bank` (`bank_id`, `bank`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-REF-BANK-0001', 'BRI', '2019-07-17 11:42:36', NULL, 'Aktif'),
('KD-REF-BANK-0002', 'BNI', '2019-07-17 11:42:43', NULL, 'Aktif'),
('KD-REF-BANK-0003', 'BCA', '2019-07-17 11:42:56', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_gender`
--

CREATE TABLE `r_gender` (
  `id_gender` varchar(20) NOT NULL,
  `gender` varchar(9) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_gender`
--

INSERT INTO `r_gender` (`id_gender`, `gender`, `create_at`, `update_at`, `is_aktif`) VALUES
('LAKI-LAKI', 'LAKI-LAKI', '2019-07-17 11:28:41', '2019-07-17 11:29:02', 'Aktif'),
('PEREMPUAN', 'PEREMPUAN', '2019-07-17 11:28:59', '2019-07-17 11:29:04', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_grup_barang`
--

CREATE TABLE `r_grup_barang` (
  `grup_brg_id` varchar(20) NOT NULL,
  `nm_grup_brg` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_grup_barang`
--

INSERT INTO `r_grup_barang` (`grup_brg_id`, `nm_grup_brg`, `create_at`, `update_at`, `is_aktif`) VALUES
('1', 'PRODUK KECANTIKAN', '2019-07-17 11:51:51', '2019-07-17 11:52:29', 'Aktif'),
('2', 'OBAT/ALKES HABIS PAKAI', '2019-07-17 11:52:25', '2019-07-17 11:52:34', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_grup_tindakan`
--

CREATE TABLE `r_grup_tindakan` (
  `grup_tindakan_id` varchar(20) NOT NULL,
  `grup_tindakan` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_grup_tindakan`
--

INSERT INTO `r_grup_tindakan` (`grup_tindakan_id`, `grup_tindakan`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-GRUP-TIN-0001', 'ADMINISTRASI', '2019-07-17 02:38:56', NULL, 'Aktif'),
('KD-GRUP-TIN-0002', 'TINDAKAN', '2019-07-17 02:39:00', NULL, 'Aktif'),
('KD-GRUP-TIN-0003', 'KONSUL DOKTER', '2019-07-17 02:39:05', NULL, 'Aktif'),
('KD-GRUP-TIN-0004', 'PEMERIKSAAN DOKTER', '2019-07-17 02:39:11', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_jenis_kunjungan`
--

CREATE TABLE `r_jenis_kunjungan` (
  `jenis_kunjungan_id` varchar(20) NOT NULL,
  `jenis_kunjungan` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_jenis_kunjungan`
--

INSERT INTO `r_jenis_kunjungan` (`jenis_kunjungan_id`, `jenis_kunjungan`, `create_at`, `update_at`, `is_aktif`) VALUES
('KUNJUNGAN-01', 'PERAWATAN', '2019-07-17 14:08:48', '2019-07-17 14:08:52', 'Aktif'),
('KUNJUNGAN-02', 'KONSULTASI DOKTER', NULL, NULL, 'Aktif'),
('KUNJUNGAN-04', 'PESAN PRODUK', NULL, NULL, 'Aktif'),
('KUNJUNGAN-05', 'RETUR', NULL, NULL, 'Aktif'),
('KUNUUNGAN-03', 'BELI PRODUK', NULL, NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_jenis_pengeluaran`
--

CREATE TABLE `r_jenis_pengeluaran` (
  `jenis_pengeluaran_id` varchar(20) NOT NULL,
  `jenis_pengeluaran` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_jenis_pengeluaran`
--

INSERT INTO `r_jenis_pengeluaran` (`jenis_pengeluaran_id`, `jenis_pengeluaran`, `create_at`, `update_at`, `is_aktif`) VALUES
('1', 'LAUNDRY KLINIK', '2019-07-19 11:17:02', '2019-07-19 11:17:24', '1'),
('10', 'QUOTA 3 INTERNET', '2019-07-19 11:17:10', '2019-07-19 11:17:25', '1'),
('11', 'PLASTIK MASKER', '2019-07-19 11:17:10', '2019-07-19 11:17:25', '1'),
('12', 'PAKET', '2019-07-19 11:17:12', '2019-07-19 11:17:25', '1'),
('13', 'KARTU DIAGNOSA', '2019-07-19 11:17:13', '2019-07-19 11:17:25', '1'),
('14', 'LAMPU UANG', '2019-07-19 11:17:16', '2019-07-19 11:17:25', '1'),
('15', 'DIBAWA IBU', '2019-07-19 11:17:17', '2019-07-19 11:17:25', '1'),
('16', 'KOS MBK ARIN', '2019-07-19 11:17:18', '2019-07-19 11:17:25', '1'),
('17', 'PAKET LAILIS', '2019-07-19 11:17:19', '2019-07-19 11:17:25', '1'),
('18', 'PAKET ROHMAT', '2019-07-19 11:17:24', '2019-07-19 11:17:25', '1'),
('2', 'PULSA KLINIK', '2019-07-19 11:17:03', '2019-07-19 11:17:24', '1'),
('3', 'AQUA GALON', '2019-07-19 11:17:04', '2019-07-19 11:17:24', '1'),
('4', 'FOTO COPY', '2019-07-19 11:17:05', '2019-07-19 11:17:24', '1'),
('5', 'PULSA IBU', '2019-07-19 11:17:06', '2019-07-19 11:17:24', '1'),
('6', 'PARFUM LAUNDRY', '2019-07-19 11:17:07', '2019-07-19 11:17:24', '1'),
('7', 'SAMAK COKLAT', '2019-07-19 11:17:07', '2019-07-19 11:17:25', '1'),
('8', 'PAKET DWI A', '2019-07-19 11:17:07', '2019-07-19 11:17:25', '1'),
('9', 'PAKET RIKA', '2019-07-19 11:17:08', '2019-07-19 11:17:25', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kab`
--

CREATE TABLE `r_kab` (
  `kd_prop` varchar(20) NOT NULL,
  `kd_kab` varchar(20) NOT NULL,
  `nm_kab` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kab`
--

INSERT INTO `r_kab` (`kd_prop`, `kd_kab`, `nm_kab`, `create_at`, `update_at`) VALUES
('KD-WIL-PROP-0001', 'KD-WIL-KAB-0001', 'SURAKARTA', '2019-07-17 02:26:42', NULL),
('KD-WIL-PROP-0001', 'KD-WIL-KAB-0002', 'SUKOHARJO', '2019-07-17 02:28:23', NULL),
('KD-WIL-PROP-0001', 'KD-WIL-KAB-0003', 'KARANGANYAR', '2019-07-17 02:28:30', NULL),
('KD-WIL-PROP-0001', 'KD-WIL-KAB-0004', 'COLOMADU', '2019-07-17 02:28:40', NULL),
('KD-WIL-PROP-0001', 'KD-WIL-KAB-0005', 'KARTASURA', '2019-07-17 02:29:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kategori_brg`
--

CREATE TABLE `r_kategori_brg` (
  `kategori_brg_id` varchar(20) NOT NULL,
  `kategori_brg` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kategori_brg`
--

INSERT INTO `r_kategori_brg` (`kategori_brg_id`, `kategori_brg`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-KAT-BRG-0001', 'BEBAS', '2019-07-17 02:42:12', NULL, 'Aktif'),
('KD-KAT-BRG-0002', 'BEBAS TERBATAS', '2019-07-17 02:42:19', NULL, 'Aktif'),
('KD-KAT-BRG-0003', 'OBAT KERAS', '2019-07-17 02:42:23', NULL, 'Aktif'),
('KD-KAT-BRG-0004', 'Luminous cream', '2019-07-17 02:42:34', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kec`
--

CREATE TABLE `r_kec` (
  `kd_kab` varchar(20) NOT NULL,
  `kd_kec` varchar(20) NOT NULL,
  `nm_kec` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kec`
--

INSERT INTO `r_kec` (`kd_kab`, `kd_kec`, `nm_kec`, `create_at`, `update_at`) VALUES
('KD-WIL-KAB-0001', 'KD-WIL-KEC-0001', 'LAWEYAN', NULL, NULL),
('KD-WIL-KAB-0002', 'KD-WIL-KEC-0002', 'GROGOL', NULL, NULL),
('KD-WIL-KAB-0003', 'KD-WIL-KEC-0003', 'TAWANGMANGU', NULL, NULL),
('KD-WIL-KAB-0001', 'KD-WIL-KEC-0004', 'JEBRES', NULL, NULL),
('KD-WIL-KAB-0003', 'KD-WIL-KEC-0005', 'JATEN', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kel`
--

CREATE TABLE `r_kel` (
  `kd_kec` varchar(20) NOT NULL,
  `kd_kel` varchar(20) NOT NULL,
  `nm_kel` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kel`
--

INSERT INTO `r_kel` (`kd_kec`, `kd_kel`, `nm_kel`, `create_at`, `update_at`) VALUES
('KD-WIL-KEC-0004', 'KD-WIL-KEL-0001', 'SENOPATI', '2019-07-17 02:32:10', NULL),
('KD-WIL-KEC-0005', 'KD-WIL-KEL-0002', 'SATIVA', '2019-07-17 02:32:28', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0003', 'JUMOG', '2019-07-17 02:32:35', NULL),
('KD-WIL-KEC-0001', 'KD-WIL-KEL-0004', 'BUMI', '2019-07-17 02:32:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kelas`
--

CREATE TABLE `r_kelas` (
  `kelas_id` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kelas`
--

INSERT INTO `r_kelas` (`kelas_id`, `kelas`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-KLS-PEL-0001', 'UMUM', '2019-07-17 02:33:39', NULL, 'Aktif'),
('KD-KLS-PEL-0002', 'MEMBER', '2019-07-17 02:33:43', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pekerjaan`
--

CREATE TABLE `r_pekerjaan` (
  `id_pekerjaan` varchar(25) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_pekerjaan`
--

INSERT INTO `r_pekerjaan` (`id_pekerjaan`, `pekerjaan`, `create_at`, `update_at`, `is_aktif`) VALUES
('Lainnya', 'Lainnya', '2019-07-17 02:49:38', '2019-07-17 02:49:56', 'Aktif'),
('Nelayan', 'Nelayan', '2019-07-17 02:49:37', '2019-07-17 02:49:52', 'Aktif'),
('Pedagang', 'Pedagang', '2019-07-17 02:49:37', '2019-07-17 02:49:53', 'Aktif'),
('Pegawai Negeri', 'Pegawai Negeri', '2019-07-17 02:49:37', '2019-07-17 02:49:53', 'Aktif'),
('Pegawai swasta', 'Pegawai swasta', '2019-07-17 02:49:37', '2019-07-17 02:49:54', 'Aktif'),
('Pensiunan', 'Pensiunan', '2019-07-17 02:49:37', '2019-07-17 02:49:55', 'Aktif'),
('Petani', 'Petani', '2019-07-17 02:49:37', '2019-07-17 02:49:52', 'Aktif'),
('Tidak bekerja', 'Tidak bekerja', '2019-07-17 02:49:37', '2019-07-17 02:49:51', 'Aktif'),
('TNI/Polri', 'TNI/Polri', '2019-07-17 02:49:37', '2019-07-17 02:49:54', 'Aktif'),
('Wiraswasta', 'Wiraswasta', '2019-07-17 02:49:37', '2019-07-17 02:49:55', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pend`
--

CREATE TABLE `r_pend` (
  `pend_id` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_pend`
--

INSERT INTO `r_pend` (`pend_id`, `pendidikan`, `create_at`, `update_at`, `is_aktif`) VALUES
('Masih SD', 'Masih SD', '2019-07-17 02:54:40', NULL, 'Aktif'),
('Masih SMA', 'Masih SMA', '2019-07-17 02:54:57', NULL, 'Aktif'),
('Masih SMP', 'Masih SMP', '2019-07-17 02:55:16', NULL, 'Aktif'),
('Tamat SD', 'Tamat SD', '2019-07-17 02:54:49', NULL, 'Aktif'),
('Tamat SMA', 'Tamat SMA', '2019-07-17 02:55:06', NULL, 'Aktif'),
('Tamat SMP', 'Tamat SMP', '2019-07-17 02:55:24', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_peran_pelaksana`
--

CREATE TABLE `r_peran_pelaksana` (
  `peran_pelaksana_id` varchar(20) NOT NULL,
  `peran_pelaksana` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_peran_pelaksana`
--

INSERT INTO `r_peran_pelaksana` (`peran_pelaksana_id`, `peran_pelaksana`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-PR-PEL-0001', 'DOKTER', '2019-07-17 02:37:06', '2019-07-17 02:38:11', 'Aktif'),
('KD-PR-PEL-0002', 'AKUPUNTUR', '2019-07-17 02:38:20', NULL, 'Aktif'),
('KD-PR-PEL-0003', 'TERAPIS', '2019-07-17 02:38:24', NULL, 'Aktif'),
('KD-PR-PEL-0004', 'PERAWAT', '2019-07-17 02:38:28', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_prop`
--

CREATE TABLE `r_prop` (
  `kd_prop` varchar(20) NOT NULL,
  `nm_prop` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_prop`
--

INSERT INTO `r_prop` (`kd_prop`, `nm_prop`, `create_at`, `update_at`) VALUES
('KD-WIL-PROP-0001', 'JAWA TENGAH', '2019-07-17 02:22:32', NULL),
('KD-WIL-PROP-0002', 'JAWA TIMUR', '2019-07-17 02:22:50', NULL),
('KD-WIL-PROP-0003', 'JAWA BARAT', '2019-07-17 02:23:02', NULL),
('KD-WIL-PROP-0004', 'JAKARTA', '2019-07-17 02:23:06', NULL),
('KD-WIL-PROP-0005', 'GORONTALO', '2019-07-17 02:23:10', NULL),
('KD-WIL-PROP-0006', 'D.I ACEH', '2019-07-17 02:23:42', NULL),
('KD-WIL-PROP-0007', 'SUMATERA UTARA', '2019-07-17 02:24:40', '2019-07-17 02:25:02'),
('KD-WIL-PROP-0008', 'SUMATERA BARAT', '2019-07-17 02:24:50', NULL),
('KD-WIL-PROP-0009', 'RIAU', '2019-07-17 02:25:07', NULL),
('KD-WIL-PROP-0010', 'JAMBI', '2019-07-17 02:25:10', NULL),
('KD-WIL-PROP-0011', 'BENGKULU', '2019-07-17 02:25:15', NULL),
('KD-WIL-PROP-0012', 'BANTEN', '2019-07-17 02:25:19', NULL),
('KD-WIL-PROP-0013', 'LAMPUNG', '2019-07-17 02:25:23', NULL),
('KD-WIL-PROP-0014', 'DKI JAKARTA', '2019-07-17 02:25:29', NULL),
('KD-WIL-PROP-0015', 'BALI', '2019-07-17 02:25:32', NULL),
('KD-WIL-PROP-0016', 'BANTEN', '2019-07-17 02:25:35', NULL),
('KD-WIL-PROP-0017', 'KEP. RIAU', '2019-07-17 02:25:40', NULL),
('KD-WIL-PROP-0018', 'SULAWESI UTARA', '2019-07-17 02:25:48', NULL),
('KD-WIL-PROP-0019', 'SULAWESI TENGAH', '2019-07-17 02:25:58', NULL),
('KD-WIL-PROP-0020', 'KALIMANTAN SELATAN', '2019-07-17 02:26:05', NULL),
('KD-WIL-PROP-0021', 'KALIMANTAN BARAT', '2019-07-17 02:26:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_rekening`
--

CREATE TABLE `r_rekening` (
  `rek_id` varchar(20) NOT NULL,
  `bank_id` varchar(20) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_rekening`
--

INSERT INTO `r_rekening` (`rek_id`, `bank_id`, `no_rek`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-REK-KLINIK-0001', 'KD-REF-BANK-0001', '123', '2019-07-17 11:43:09', NULL, 'Aktif'),
('KD-REK-KLINIK-0002', 'KD-REF-BANK-0002', '321', '2019-07-17 11:43:19', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_satuan`
--

CREATE TABLE `r_satuan` (
  `satuan_id` varchar(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_satuan`
--

INSERT INTO `r_satuan` (`satuan_id`, `satuan`, `create_at`, `update_at`, `is_aktif`) VALUES
('KD-SATUAN-BRG-0001', 'BOTOL', '2019-07-17 02:44:01', NULL, 'Aktif'),
('KD-SATUAN-BRG-0002', 'AMP', '2019-07-17 02:44:05', NULL, 'Aktif'),
('KD-SATUAN-BRG-0003', 'TUBE', '2019-07-17 02:44:09', NULL, 'Aktif'),
('KD-SATUAN-BRG-0004', 'PCS', '2019-07-17 02:44:12', NULL, 'Aktif'),
('KD-SATUAN-BRG-0005', 'PCS', '2019-07-17 02:44:15', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_status`
--

CREATE TABLE `r_status` (
  `status_id` varchar(20) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_status_kawin`
--

CREATE TABLE `r_status_kawin` (
  `id_sk` varchar(20) NOT NULL,
  `status_kawin` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_status_kawin`
--

INSERT INTO `r_status_kawin` (`id_sk`, `status_kawin`, `create_at`, `update_at`, `is_aktif`) VALUES
('Belum kawin', 'Belum kawin', '2019-07-17 11:31:16', '2019-07-17 11:31:28', 'Aktif'),
('Janda/duda', 'Janda/duda', '2019-07-17 11:31:17', '2019-07-17 11:31:30', 'Aktif'),
('Kawin', 'Kawin', '2019-07-17 11:31:16', '2019-07-17 11:31:29', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_harga_beli`
--

CREATE TABLE `t_harga_beli` (
  `harga_beli_id` varchar(20) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `kategori_brg_id` varchar(20) DEFAULT NULL,
  `harga_beli` int(10) NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `ket` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_harga_beli`
--

INSERT INTO `t_harga_beli` (`harga_beli_id`, `kode_barang`, `kategori_brg_id`, `harga_beli`, `tgl_berlaku`, `ket`, `create_at`, `update_at`) VALUES
('KD-HARGA-BELI-0001', 'BRG-0001', 'KD-KAT-BRG-0001', 50000, '2019-07-26', '', '2019-07-17 12:01:23', NULL),
('KD-HARGA-BELI-0002', 'BRG-0002', 'KD-KAT-BRG-0001', 50000, '2019-07-27', '', '2019-07-17 12:01:36', NULL),
('KD-HARGA-BELI-0003', 'BRG-0003', 'KD-KAT-BRG-0001', 70000, '2019-07-20', '', '2019-07-17 12:01:47', NULL),
('KD-HARGA-BELI-0004', 'BRG-0004', 'KD-KAT-BRG-0001', 60000, '2019-07-25', '', '2019-07-17 12:02:00', NULL),
('KD-HARGA-BELI-0005', 'BRG-0006', 'KD-KAT-BRG-0001', 60000, '2019-10-11', '', '2019-07-17 12:02:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_harga_jual`
--

CREATE TABLE `t_harga_jual` (
  `harga_jual_id` varchar(60) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `kelas_id` varchar(20) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `disc_persen` decimal(4,0) NOT NULL,
  `disc_rupiah` int(10) NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `ket` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_harga_jual`
--

INSERT INTO `t_harga_jual` (`harga_jual_id`, `kode_barang`, `kelas_id`, `harga_jual`, `disc_persen`, `disc_rupiah`, `tgl_berlaku`, `ket`, `create_at`, `update_at`, `is_aktif`) VALUES
('HARGA-JUAL-BRG-0001', 'BRG-0001', 'KD-KLS-PEL-0001', 90000, '0', 0, '2019-07-19', '', '2019-07-17 12:12:45', NULL, '1'),
('HARGA-JUAL-BRG-0002', 'BRG-0002', 'KD-KLS-PEL-0001', 80000, '0', 0, '2019-08-03', '', '2019-07-17 12:13:02', NULL, '1'),
('HARGA-JUAL-BRG-0003', 'BRG-0003', 'KD-KLS-PEL-0001', 80000, '0', 0, '2019-08-03', '', '2019-07-17 12:13:15', NULL, '1'),
('HARGA-JUAL-BRG-0004', 'BRG-0004', 'KD-KLS-PEL-0001', 70000, '0', 0, '2019-08-01', '', '2019-07-17 12:13:26', NULL, '1'),
('HARGA-JUAL-BRG-0005', 'BRG-0005', 'KD-KLS-PEL-0001', 90000, '0', 0, '2019-07-26', '', '2019-07-17 12:13:38', NULL, '1'),
('HARGA-JUAL-BRG-0006', 'BRG-0006', 'KD-KLS-PEL-0001', 80000, '0', 0, '2019-07-30', '', '2019-07-17 12:13:48', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_janji`
--

CREATE TABLE `t_janji` (
  `janji_id` varchar(60) NOT NULL,
  `no_registrasi` varchar(60) DEFAULT NULL,
  `jenis_kunjungan_id` varchar(20) DEFAULT NULL,
  `tanggal_janji` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `kode_pelaksana` varchar(60) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_janji`
--

INSERT INTO `t_janji` (`janji_id`, `no_registrasi`, `jenis_kunjungan_id`, `tanggal_janji`, `jam`, `keterangan`, `kode_pelaksana`, `create_at`, `update_at`, `is_aktif`) VALUES
('JANJI-PASIEN-MUTIAVIE-0001', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-02', '2019-07-31', '19:15:51', '', 'PELKSANA-KLINIK-0001', '2019-07-18 00:16:03', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengeluaran`
--

CREATE TABLE `t_pengeluaran` (
  `pengeluaran_id` varchar(60) NOT NULL,
  `pengeluaran` varchar(20) DEFAULT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `jenis_pengeluaran_id` varchar(10) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengeluaran`
--

INSERT INTO `t_pengeluaran` (`pengeluaran_id`, `pengeluaran`, `tanggal_pengeluaran`, `jumlah`, `jenis_pengeluaran_id`, `ket`, `create_at`, `update_at`) VALUES
('PENGELUARAN-KLINIK-MUTIAVIE-0001', 'Kertas Kwitansi', '2019-07-26', 15, '4', 'Fotocopy sekarang', '2019-07-19 11:18:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_registrasi`
--

CREATE TABLE `t_registrasi` (
  `no_registrasi` varchar(60) NOT NULL,
  `tanggal_registrasi` date DEFAULT NULL,
  `no_rek_medik` varchar(60) DEFAULT NULL,
  `jenis_kunjungan_id` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_registrasi`
--

INSERT INTO `t_registrasi` (`no_registrasi`, `tanggal_registrasi`, `no_rek_medik`, `jenis_kunjungan_id`, `create_at`, `update_at`) VALUES
('REGISTRASI-PASIEN-MUTIAVIE-0001', '2019-07-24', 'REKMED-MUTIAVIE-0001', 'KUNJUNGAN-01', '2019-07-17 14:09:48', NULL),
('REGISTRASI-PASIEN-MUTIAVIE-0002', '2019-07-31', 'REKMED-MUTIAVIE-0001', 'KUNJUNGAN-01', '2019-07-17 14:56:28', NULL),
('REGISTRASI-PASIEN-MUTIAVIE-0003', '2019-07-25', 'REKMED-MUTIAVIE-0001', 'KUNJUNGAN-04', '2019-07-20 20:49:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif_tindakan`
--

CREATE TABLE `t_tarif_tindakan` (
  `tarif_tindakan_id` varchar(60) NOT NULL,
  `kode_tindakan` varchar(60) NOT NULL,
  `grup_tindakan_id` varchar(20) DEFAULT NULL,
  `kelas_id` varchar(20) NOT NULL,
  `tarif` int(10) NOT NULL,
  `disc_persen` decimal(4,0) NOT NULL,
  `disc_rupiah` int(10) NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `ket` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tarif_tindakan`
--

INSERT INTO `t_tarif_tindakan` (`tarif_tindakan_id`, `kode_tindakan`, `grup_tindakan_id`, `kelas_id`, `tarif`, `disc_persen`, `disc_rupiah`, `tgl_berlaku`, `ket`, `create_at`, `update_at`, `is_aktif`) VALUES
('TARIF-TINDAKAN-PASIEN-0001', 'KD-TIN-MED-0001', 'KD-GRUP-TIN-0001', 'KD-KLS-PEL-0001', 50000, '0', 0, '2019-07-19', 'Tidak Ada', '2019-07-17 11:59:24', NULL, 'Aktif'),
('TARIF-TINDAKAN-PASIEN-0002', 'KD-TIN-MED-0002', 'KD-GRUP-TIN-0001', 'KD-KLS-PEL-0001', 60000, '0', 0, '2019-07-27', '', '2019-07-17 11:59:49', NULL, 'Aktif'),
('TARIF-TINDAKAN-PASIEN-0003', 'KD-TIN-MED-0003', 'KD-GRUP-TIN-0001', 'KD-KLS-PEL-0001', 50000, '0', 0, '2019-07-27', '', '2019-07-17 12:00:08', NULL, 'Aktif'),
('TARIF-TINDAKAN-PASIEN-0004', 'KD-TIN-MED-0004', 'KD-GRUP-TIN-0001', 'KD-KLS-PEL-0001', 50000, '0', 0, '2019-07-27', '', '2019-07-17 12:00:28', NULL, 'Aktif'),
('TARIF-TINDAKAN-PASIEN-0005', 'KD-TIN-MED-0005', 'KD-GRUP-TIN-0001', 'KD-KLS-PEL-0001', 60000, '0', 0, '2019-08-03', '', '2019-07-17 12:00:47', NULL, 'Aktif'),
('TARIF-TINDAKAN-PASIEN-0006', 'KD-TIN-MED-0006', 'KD-GRUP-TIN-0001', 'KD-KLS-PEL-0001', 50000, '0', 0, '2019-07-26', '', '2019-07-17 12:01:06', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `code_user` varchar(15) NOT NULL,
  `nama` varchar(90) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `grup_id` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`code_user`, `nama`, `pass`, `grup_id`, `create_at`, `update_at`, `is_aktif`) VALUES
('Administrator', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', '1', '2019-07-19 10:33:44', NULL, 'Aktif'),
('dokter', 'dokter', 'd22af4180eee4bd95072eb90f94930e5', '2', '2019-07-17 15:02:38', NULL, 'Aktif'),
('kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', '4', '2019-07-17 15:01:05', NULL, 'Aktif'),
('ketua', 'ketua', '00719910bb805741e4b7f28527ecb3ad', '5', '2019-07-17 15:02:53', NULL, 'Aktif'),
('Muhammad_Haris', 'Muhammad Haris', '21232f297a57a5a743894a0e4a801fc3', '1', '2019-07-07 22:49:47', '2019-07-19 10:33:15', 'Aktif'),
('resepsionis', 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', '3', '2019-07-17 15:02:00', NULL, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`grup_id`);

--
-- Indexes for table `in_penerimaan_hadiah`
--
ALTER TABLE `in_penerimaan_hadiah`
  ADD PRIMARY KEY (`no_penerimaan_hadiah`);

--
-- Indexes for table `in_penerimaan_obat`
--
ALTER TABLE `in_penerimaan_obat`
  ADD PRIMARY KEY (`no_penerimaan_obat`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `grup_brg_id` (`grup_brg_id`),
  ADD KEY `kategori_brg_id` (`kategori_brg_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `m_bayar`
--
ALTER TABLE `m_bayar`
  ADD PRIMARY KEY (`kode_kwitansi`);

--
-- Indexes for table `m_hadiah`
--
ALTER TABLE `m_hadiah`
  ADD PRIMARY KEY (`id_hadiah`);

--
-- Indexes for table `m_pasien`
--
ALTER TABLE `m_pasien`
  ADD PRIMARY KEY (`no_rek_medik`);

--
-- Indexes for table `m_pelaksana`
--
ALTER TABLE `m_pelaksana`
  ADD PRIMARY KEY (`kode_pelaksana`);

--
-- Indexes for table `m_pelayanan`
--
ALTER TABLE `m_pelayanan`
  ADD PRIMARY KEY (`kode_pelayanan`);

--
-- Indexes for table `m_pemasok`
--
ALTER TABLE `m_pemasok`
  ADD PRIMARY KEY (`kode_pemasok`);

--
-- Indexes for table `m_tindakan`
--
ALTER TABLE `m_tindakan`
  ADD PRIMARY KEY (`kode_tindakan`),
  ADD KEY `grup_tindakan_id` (`grup_tindakan_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `r_agama`
--
ALTER TABLE `r_agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `r_bank`
--
ALTER TABLE `r_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `r_gender`
--
ALTER TABLE `r_gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `r_grup_barang`
--
ALTER TABLE `r_grup_barang`
  ADD PRIMARY KEY (`grup_brg_id`);

--
-- Indexes for table `r_grup_tindakan`
--
ALTER TABLE `r_grup_tindakan`
  ADD PRIMARY KEY (`grup_tindakan_id`);

--
-- Indexes for table `r_jenis_kunjungan`
--
ALTER TABLE `r_jenis_kunjungan`
  ADD PRIMARY KEY (`jenis_kunjungan_id`);

--
-- Indexes for table `r_jenis_pengeluaran`
--
ALTER TABLE `r_jenis_pengeluaran`
  ADD PRIMARY KEY (`jenis_pengeluaran_id`);

--
-- Indexes for table `r_kab`
--
ALTER TABLE `r_kab`
  ADD PRIMARY KEY (`kd_kab`),
  ADD KEY `kd_prop` (`kd_prop`,`kd_kab`) USING BTREE;

--
-- Indexes for table `r_kategori_brg`
--
ALTER TABLE `r_kategori_brg`
  ADD PRIMARY KEY (`kategori_brg_id`);

--
-- Indexes for table `r_kec`
--
ALTER TABLE `r_kec`
  ADD PRIMARY KEY (`kd_kec`),
  ADD KEY `kd_kab` (`kd_kab`);

--
-- Indexes for table `r_kel`
--
ALTER TABLE `r_kel`
  ADD PRIMARY KEY (`kd_kel`),
  ADD KEY `kd_kec` (`kd_kec`);

--
-- Indexes for table `r_kelas`
--
ALTER TABLE `r_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `r_pekerjaan`
--
ALTER TABLE `r_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `r_pend`
--
ALTER TABLE `r_pend`
  ADD PRIMARY KEY (`pend_id`);

--
-- Indexes for table `r_peran_pelaksana`
--
ALTER TABLE `r_peran_pelaksana`
  ADD PRIMARY KEY (`peran_pelaksana_id`);

--
-- Indexes for table `r_prop`
--
ALTER TABLE `r_prop`
  ADD PRIMARY KEY (`kd_prop`);

--
-- Indexes for table `r_rekening`
--
ALTER TABLE `r_rekening`
  ADD PRIMARY KEY (`rek_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `r_satuan`
--
ALTER TABLE `r_satuan`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `r_status`
--
ALTER TABLE `r_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `r_status_kawin`
--
ALTER TABLE `r_status_kawin`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `t_harga_beli`
--
ALTER TABLE `t_harga_beli`
  ADD PRIMARY KEY (`harga_beli_id`),
  ADD KEY `barang_id` (`kode_barang`);

--
-- Indexes for table `t_harga_jual`
--
ALTER TABLE `t_harga_jual`
  ADD PRIMARY KEY (`harga_jual_id`),
  ADD KEY `barang_id` (`kode_barang`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `barang_id_2` (`kode_barang`);

--
-- Indexes for table `t_janji`
--
ALTER TABLE `t_janji`
  ADD PRIMARY KEY (`janji_id`);

--
-- Indexes for table `t_pengeluaran`
--
ALTER TABLE `t_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`),
  ADD KEY `jenis_pengeluaran_id` (`jenis_pengeluaran_id`);

--
-- Indexes for table `t_registrasi`
--
ALTER TABLE `t_registrasi`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `t_tarif_tindakan`
--
ALTER TABLE `t_tarif_tindakan`
  ADD PRIMARY KEY (`tarif_tindakan_id`),
  ADD KEY `tindakan_id` (`kode_tindakan`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `kelas_id_2` (`kelas_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`code_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
