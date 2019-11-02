-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Agu 2019 pada 19.09
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
('PENERIMAAN-HADIAH-0001', '2019-08-19', '18:42:10', 'KD-DAF-HADIAH-0001', 20, '', '2019-08-19 23:42:15', NULL),
('PENERIMAAN-HADIAH-0002', '2019-08-19', '18:42:16', 'KD-DAF-HADIAH-0005', 20, '', '2019-08-19 23:42:20', NULL),
('PENERIMAAN-HADIAH-0003', '2019-08-19', '18:42:20', 'KD-DAF-HADIAH-0004', 10, '', '2019-08-19 23:42:25', NULL),
('PENERIMAAN-HADIAH-0004', '2019-08-19', '18:42:25', 'KD-DAF-HADIAH-0003', 10, '', '2019-08-19 23:42:29', NULL),
('PENERIMAAN-HADIAH-0005', '2019-08-19', '18:42:29', 'KD-DAF-HADIAH-0002', 5, '', '2019-08-19 23:42:33', NULL),
('PENERIMAAN-HADIAH-0006', '2019-08-19', '18:42:33', 'KD-DAF-HADIAH-0007', 30, '', '2019-08-19 23:42:38', NULL),
('PENERIMAAN-HADIAH-0007', '2019-08-19', '18:42:38', 'KD-DAF-HADIAH-0008', 50, '', '2019-08-19 23:42:42', NULL),
('PENERIMAAN-HADIAH-0008', '2019-08-19', '18:42:42', 'KD-DAF-HADIAH-0009', 60, '', '2019-08-19 23:42:46', NULL);

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
('PENERIMAAN-OBAT-0001', '18:41:30', '2019-08-19', 'KD-PEM-KLINIK-0001', 'BRG-0001', 100, '', '2019-08-19 23:41:38', NULL),
('PENERIMAAN-OBAT-0002', '18:41:39', '2019-08-19', 'KD-PEM-KLINIK-0001', 'BRG-0002', 100, '', '2019-08-19 23:41:43', NULL),
('PENERIMAAN-OBAT-0003', '18:41:44', '2019-08-19', 'KD-PEM-KLINIK-0001', 'BRG-0003', 100, '', '2019-08-19 23:41:47', NULL),
('PENERIMAAN-OBAT-0004', '18:41:47', '2019-08-19', 'KD-PEM-KLINIK-0001', 'BRG-0004', 100, '', '2019-08-19 23:41:53', NULL),
('PENERIMAAN-OBAT-0005', '18:41:53', '2019-08-19', 'KD-PEM-KLINIK-0001', 'BRG-0005', 100, '', '2019-08-19 23:41:57', NULL),
('PENERIMAAN-OBAT-0006', '18:41:57', '2019-08-19', 'KD-PEM-KLINIK-0001', 'BRG-0006', 100, '', '2019-08-19 23:42:01', NULL);

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
('KWITANSI-PASIEN-MUTIAVIE-0002', '2019-07-20', '08:59:00', 'PELKSANA-KLINIK-0003', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 23000, 32456, 55456, 9000000, 8944544, '2019-07-20 20:52:56', NULL),
('KWITANSI-PASIEN-MUTIAVIE-0003', '2019-08-19', '21:12:00', 'PELKSANA-KLINIK-0001', 'REGISTRASI-PASIEN-MUTIAVIE-0003', 10000, 2000, 12000, 60000, 48000, '2019-08-19 23:56:22', '2019-08-20 00:03:43'),
('KWITANSI-PASIEN-MUTIAVIE-0004', '2019-08-19', '23:09:00', 'PELKSANA-KLINIK-0001', 'REGISTRASI-PASIEN-MUTIAVIE-0004', 90000, 50000, 140000, 400000, 260000, '2019-08-20 00:03:10', NULL),
('KWITANSI-PASIEN-MUTIAVIE-0005', '2019-08-19', '12:01:00', 'PELKSANA-KLINIK-0004', 'REGISTRASI-PASIEN-MUTIAVIE-0005', 20000, 50000, 70000, 200000, 130000, '2019-08-20 00:04:09', NULL),
('KWITANSI-PASIEN-MUTIAVIE-0006', '2019-08-19', '09:09:00', 'PELKSANA-KLINIK-0005', 'REGISTRASI-PASIEN-MUTIAVIE-0001', 12000, 30000, 42000, 100000, 58000, '2019-08-20 00:04:41', NULL);

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
('KD-DAF-HADIAH-0001', 'PIRING', '2019-08-19 23:40:41', NULL, 'Aktif'),
('KD-DAF-HADIAH-0002', 'PAYUNG', '2019-08-19 23:40:46', NULL, 'Aktif'),
('KD-DAF-HADIAH-0003', 'JAM DINDING', '2019-08-19 23:40:53', NULL, 'Aktif'),
('KD-DAF-HADIAH-0004', 'PARFUM', '2019-08-19 23:40:58', NULL, 'Aktif'),
('KD-DAF-HADIAH-0005', 'TAPLAK MEJA', '2019-08-19 23:41:03', NULL, 'Aktif'),
('KD-DAF-HADIAH-0006', 'GELAS', '2019-08-19 23:41:06', NULL, 'Aktif'),
('KD-DAF-HADIAH-0007', 'HAND BODY LOTION', '2019-08-19 23:41:11', NULL, 'Aktif'),
('KD-DAF-HADIAH-0008', 'SUNBLOK', '2019-08-19 23:41:15', NULL, 'Aktif'),
('KD-DAF-HADIAH-0009', 'LOOSE POWRED', '2019-08-19 23:41:19', NULL, 'Aktif');

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
('REKMED-MUTIAVIE-0001', 'NABIL', 'PEREMPUAN', '1994-07-19', 'JEPARA', '143249', '08921383491', 'A', 'JEPARA', 'KD-WIL-KEL-0002', 'BUDDHA', 'Masih SD', 'Lainnya', 'Belum kawin', 'Penguins.jpg', '2019-08-19 23:44:46', '2019-08-19 23:49:35', 'Aktif'),
('REKMED-MUTIAVIE-0002', 'UTARI NY', 'PEREMPUAN', '2000-07-25', 'SOLO', '4567654', '08193894234', 'A', 'SOLO', 'KD-WIL-KEL-0002', 'ISLAM', 'Masih SMP', 'Tidak bekerja', 'Belum kawin', 'Koala.jpg', '2019-08-19 23:46:00', NULL, 'Aktif'),
('REKMED-MUTIAVIE-0003', 'NIA NOVITA SARI', 'PEREMPUAN', '2019-08-20', 'MLONGGO', '34567', '08523432871', 'AB', 'MLONGGO', 'KD-WIL-KEL-0012', 'ISLAM', 'Tamat SMA', 'Lainnya', 'Belum kawin', 'Penguins.jpg', '2019-08-19 23:46:55', NULL, 'Aktif'),
('REKMED-MUTIAVIE-0004', 'LIA LIZA', 'PEREMPUAN', '2018-10-15', 'JEPARA', '56789', '0812347385784', 'O', 'SOLO', 'KD-WIL-KEL-0010', 'KRISTEN', 'Tamat SMP', 'Tidak bekerja', 'Kawin', 'Lighthouse.jpg', '2019-08-19 23:47:52', NULL, 'Aktif'),
('REKMED-MUTIAVIE-0005', 'HARWATI NY', 'PEREMPUAN', '2019-07-29', 'SOLO', '765432456', '0891238924', 'A', 'SOLO', 'KD-WIL-KEL-0010', 'ISLAM', 'Tamat SMA', 'Lainnya', 'Belum kawin', 'Hydrangeas.jpg', '2019-08-19 23:48:31', NULL, 'Aktif');

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
('PELKSANA-KLINIK-0001', 'Hasbi, dr', 'KD-PR-PEL-0001', '2019-07-17 11:40:57', '2019-08-19 23:22:30', 'Aktif'),
('PELKSANA-KLINIK-0002', 'Firda', 'KD-PR-PEL-0002', '2019-07-17 11:41:04', NULL, 'Aktif'),
('PELKSANA-KLINIK-0004', 'Bagas', 'KD-PR-PEL-0004', '2019-07-17 11:41:21', NULL, 'Aktif'),
('PELKSANA-KLINIK-0005', 'Tri Iriantiwi, dr', 'KD-PR-PEL-0001', '2019-08-19 23:18:13', NULL, 'Aktif'),
('PELKSANA-KLINIK-0006', 'Peni Lestari', 'KD-PR-PEL-0002', '2019-08-19 23:18:24', NULL, 'Aktif'),
('PELKSANA-KLINIK-0007', 'Ayu Ratih', 'KD-PR-PEL-0003', '2019-08-19 23:18:32', NULL, 'Aktif'),
('PELKSANA-KLINIK-0008', 'Dyani', 'KD-PR-PEL-0003', '2019-08-19 23:18:40', NULL, 'Aktif'),
('PELKSANA-KLINIK-0009', 'Lia', 'KD-PR-PEL-0003', '2019-08-19 23:18:45', NULL, 'Aktif'),
('PELKSANA-KLINIK-0010', 'ida', 'KD-PR-PEL-0003', '2019-08-19 23:18:52', NULL, 'Aktif');

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
('PELAYANAN-PASIEN-MUTIAVIE-0002', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-01', '2019-07-11', 9, NULL, NULL, 'Aktif'),
('PELAYANAN-PASIEN-MUTIAVIE-0003', 'REGISTRASI-PASIEN-MUTIAVIE-0004', 'KUNJUNGAN-02', '2019-08-19', 4, NULL, NULL, 'Aktif'),
('PELAYANAN-PASIEN-MUTIAVIE-0004', 'REGISTRASI-PASIEN-MUTIAVIE-0003', 'KUNUUNGAN-03', '2019-08-19', 45, NULL, NULL, 'Aktif'),
('PELAYANAN-PASIEN-MUTIAVIE-0005', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-02', '2019-08-19', 8, NULL, NULL, 'Aktif');

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
('KD-TIN-MED-0001', 'KD-GRUP-TIN-0001', 'Akupuntur Betis', 'Ya', '2019-08-19 23:10:40', '2019-08-19 23:11:13', 'Aktif'),
('KD-TIN-MED-0002', 'KD-GRUP-TIN-0001', 'Akupuntur Kaki', 'Ya', '2019-08-19 23:13:44', NULL, 'Aktif'),
('KD-TIN-MED-0003', 'KD-GRUP-TIN-0001', 'Akupuntur Lengan', 'Ya', '2019-08-19 23:14:06', NULL, 'Aktif'),
('KD-TIN-MED-0004', 'KD-GRUP-TIN-0001', 'Akupuntur Paha', 'Ya', '2019-08-19 23:15:23', NULL, 'Aktif'),
('KD-TIN-MED-0005', 'KD-GRUP-TIN-0001', 'Akupuntur Payudara', 'Ya', '2019-08-19 23:15:29', NULL, 'Aktif'),
('KD-TIN-MED-0006', 'KD-GRUP-TIN-0001', 'Akupuntur Penggemukan', 'Ya', '2019-08-19 23:15:40', NULL, 'Aktif'),
('KD-TIN-MED-0007', 'KD-GRUP-TIN-0001', 'Akupuntur Perut', 'Ya', '2019-08-19 23:15:47', NULL, 'Aktif'),
('KD-TIN-MED-0008', 'KD-GRUP-TIN-0001', 'Akupuntur Punggung', 'Ya', '2019-08-19 23:15:54', NULL, 'Aktif'),
('KD-TIN-MED-0009', 'KD-GRUP-TIN-0001', 'Akupuntur Telinga', 'Ya', '2019-08-19 23:16:02', NULL, 'Aktif'),
('KD-TIN-MED-0010', 'KD-GRUP-TIN-0001', 'Akupuntur Vagina', 'Ya', '2019-08-19 23:16:09', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(20) NOT NULL,
  `harga_jual_id` varchar(60) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `harga_jual_id`, `qty`, `subtotal`, `time`) VALUES
(11, 'HARGA-JUAL-BRG-0001', 1, '90000', '2019-08-15 03:04:52'),
(12, 'HARGA-JUAL-BRG-0001', 1, '90000', '2019-08-15 03:05:52'),
(13, 'HARGA-JUAL-BRG-0001', 1, '90000', '2019-08-15 03:09:32'),
(14, 'HARGA-JUAL-BRG-0002', 1, '80000', '2019-08-15 03:09:32'),
(15, 'HARGA-JUAL-BRG-0001', 1, '90000', '2019-08-19 01:21:34'),
(16, 'HARGA-JUAL-BRG-0002', 1, '80000', '2019-08-19 01:21:34'),
(17, 'HARGA-JUAL-BRG-0001', 14, '1260000', '2019-08-19 02:13:40'),
(18, 'HARGA-JUAL-BRG-0002', 1, '80000', '2019-08-19 02:13:40'),
(19, 'HARGA-JUAL-BRG-0001', 67, '6030000', '2019-08-19 02:28:28'),
(20, 'HARGA-JUAL-BRG-0002', 1, '80000', '2019-08-19 02:28:28'),
(21, 'HARGA-JUAL-BRG-0001', 1, '90000', '2019-08-19 02:52:32'),
(22, 'HARGA-JUAL-BRG-0002', 1, '80000', '2019-08-19 02:52:32'),
(23, 'HARGA-JUAL-BRG-0001', 90, '3600000', '2019-08-20 00:05:18'),
(24, 'HARGA-JUAL-BRG-0003', 1, '80000', '2019-08-20 00:05:19'),
(25, 'HARGA-JUAL-BRG-0004', 1, '100000', '2019-08-20 00:05:19');

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
('KD-REF-BANK-0003', 'BCA', '2019-07-17 11:42:56', NULL, 'Aktif'),
('KD-REF-BANK-0004', 'MANDIRI', '2019-08-19 23:06:09', NULL, 'Aktif'),
('KD-REF-BANK-0005', 'PERTAMA BA', '2019-08-19 23:06:50', NULL, 'Aktif'),
('KD-REF-BANK-0006', 'BANK MUAMA', '2019-08-19 23:07:03', NULL, 'Aktif'),
('KD-REF-BANK-0007', 'CIMB NIAGA', '2019-08-19 23:07:11', NULL, 'Aktif'),
('KD-REF-BANK-0008', 'BMI', '2019-08-19 23:07:17', NULL, 'Aktif'),
('KD-REF-BANK-0009', 'BSM', '2019-08-19 23:07:25', NULL, 'Aktif'),
('KD-REF-BANK-0010', 'BNI SYARIA', '2019-08-19 23:07:35', NULL, 'Aktif');

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
('KUNJUNGAN-04', 'BELI PRODUK', NULL, '2019-08-19 23:54:01', 'Aktif'),
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
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0001', 'BANJARNEGARA', '2019-08-19 22:41:53', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0002', 'BANYUMAS', '2019-08-19 22:42:07', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0003', 'BATANG', '2019-08-19 22:42:19', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0004', 'BLORA', '2019-08-19 22:42:27', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0005', 'BOYOLALI', '2019-08-19 22:42:37', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0006', 'BREBES', '2019-08-19 22:42:46', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0007', 'CILACAP', '2019-08-19 22:42:54', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0008', 'DEMAK', '2019-08-19 22:43:02', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0009', 'GROBOGAN', '2019-08-19 22:43:12', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0010', 'JEPARA', '2019-08-19 22:43:20', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0011', 'KARANGANYAR', '2019-08-19 22:43:28', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0012', 'KEBUMEN', '2019-08-19 22:43:38', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0013', 'KENDAL', '2019-08-19 22:43:45', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0014', 'KLATEN', '2019-08-19 22:43:59', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0015', 'KUDUS', '2019-08-19 22:44:06', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0016', 'MAGELANG', '2019-08-19 22:44:14', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0017', 'PATI', '2019-08-19 22:44:24', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0018', 'PEKALONGAN', '2019-08-19 22:44:32', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0019', 'PEMALANG', '2019-08-19 22:44:42', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0020', 'PURBALINGGA', '2019-08-19 22:44:52', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0021', 'PURWOREJO', '2019-08-19 22:45:03', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0022', 'REMBANG', '2019-08-19 22:45:10', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0023', 'SEMARANG', '2019-08-19 22:45:21', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0024', 'SRAGEN', '2019-08-19 22:45:28', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0025', 'SUKOHARJO', '2019-08-19 22:45:36', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0026', 'TEGAL', '2019-08-19 22:45:45', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0027', 'TEMANGGUNG', '2019-08-19 22:45:52', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0028', 'WONOGIRI', '2019-08-19 22:46:01', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0029', 'WONOSOBO', '2019-08-19 22:46:13', NULL),
('KD-WIL-PROP-0014', 'KD-WIL-KAB-0030', 'SURAKARTA', '2019-08-19 22:48:28', NULL);

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
('KD-WIL-KAB-0030', 'KD-WIL-KEC-0001', 'BANJARSARI', NULL, NULL),
('KD-WIL-KAB-0030', 'KD-WIL-KEC-0002', 'JEBRES', NULL, NULL),
('KD-WIL-KAB-0030', 'KD-WIL-KEC-0003', 'LAWEYAN', NULL, NULL),
('KD-WIL-KAB-0030', 'KD-WIL-KEC-0004', 'PASAR KLIWON', NULL, NULL),
('KD-WIL-KAB-0030', 'KD-WIL-KEC-0005', 'SERENGAN', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0006', 'BANGSRI', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0007', 'BATEALIT', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0008', 'DONOROJO', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0009', 'KALINYAMATAN', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0010', 'KARIMUN JAWA', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0011', 'KELING', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0012', 'KEMBANG', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0013', 'MANYONG', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0014', 'MLONGGO', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0015', 'NALUMSARI', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0016', 'PAKIS AJI', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0017', 'PACANGAAN', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0018', 'TAHUNAN', NULL, NULL),
('KD-WIL-KAB-0010', 'KD-WIL-KEC-0019', 'WELAHAN', NULL, NULL);

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
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0001', 'KAMPUNG BARU', '2019-08-19 22:53:28', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0002', 'KAUMAN', '2019-08-19 22:53:38', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0003', 'KEDUNG LUMBU', '2019-08-19 22:53:51', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0004', 'BALUARTI', '2019-08-19 22:53:57', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0005', 'GAJAHAN', '2019-08-19 22:54:10', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0006', 'JOYOSURAN', '2019-08-19 22:54:19', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0007', 'SEMANGGI', '2019-08-19 22:54:27', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0008', 'PASAR KLIWON', '2019-08-19 22:54:34', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0009', 'SANGKRAH', '2019-08-19 22:54:41', NULL),
('KD-WIL-KEC-0003', 'KD-WIL-KEL-0010', 'BUMI', '2019-08-19 22:54:46', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0011', 'JAMBU', '2019-08-19 22:55:17', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0012', 'JAMBU TIMUR', '2019-08-19 22:55:25', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0013', 'KARANGGODANG', '2019-08-19 22:55:32', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0014', 'MOROREJO', '2019-08-19 22:55:42', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0015', 'SEKURO', '2019-08-19 22:55:48', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0016', 'SINANGGUL', '2019-08-19 22:55:56', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0017', 'SROBYONG', '2019-08-19 22:56:06', NULL),
('KD-WIL-KEC-0014', 'KD-WIL-KEL-0018', 'SUWAWAL', '2019-08-19 22:56:12', NULL);

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
('KD-PR-PEL-0001', 'DOKTER', '2019-08-19 23:04:03', NULL, 'Aktif'),
('KD-PR-PEL-0002', 'AKUPUNTUR', '2019-08-19 23:04:08', NULL, 'Aktif'),
('KD-PR-PEL-0003', 'TERAPIS', '2019-08-19 23:04:12', NULL, 'Aktif'),
('KD-PR-PEL-0004', 'PERAWAT', '2019-08-19 23:04:16', NULL, 'Aktif');

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
('KD-WIL-PROP-0001', 'ACEH', '2019-08-19 22:37:10', NULL),
('KD-WIL-PROP-0002', 'SUMATERA UTARA', '2019-08-19 22:37:23', NULL),
('KD-WIL-PROP-0003', 'SUMATERA BARAT', '2019-08-19 22:37:29', NULL),
('KD-WIL-PROP-0004', 'RIAU', '2019-08-19 22:37:33', NULL),
('KD-WIL-PROP-0005', 'KEPULAUAN RIAU', '2019-08-19 22:37:38', NULL),
('KD-WIL-PROP-0006', 'JAMBI', '2019-08-19 22:37:43', NULL),
('KD-WIL-PROP-0007', 'BENGKULU', '2019-08-19 22:37:48', NULL),
('KD-WIL-PROP-0008', 'SMATERA SELATAN', '2019-08-19 22:37:53', NULL),
('KD-WIL-PROP-0009', 'KEPULAUAN BANGKA BEL', '2019-08-19 22:38:01', NULL),
('KD-WIL-PROP-0010', 'LAMPUNG', '2019-08-19 22:38:12', NULL),
('KD-WIL-PROP-0011', 'BANTEN', '2019-08-19 22:38:16', NULL),
('KD-WIL-PROP-0012', 'JAWA BARAT', '2019-08-19 22:38:20', NULL),
('KD-WIL-PROP-0013', 'DKI JAKARTA', '2019-08-19 22:38:24', NULL),
('KD-WIL-PROP-0014', 'JAWA TENGAH', '2019-08-19 22:38:28', NULL),
('KD-WIL-PROP-0015', 'DI YOGYAKARTA', '2019-08-19 22:38:35', NULL),
('KD-WIL-PROP-0016', 'JAWA TIMUR', '2019-08-19 22:38:39', NULL),
('KD-WIL-PROP-0017', 'BALI', '2019-08-19 22:38:42', NULL),
('KD-WIL-PROP-0018', 'NUSA TENGGARA BARAT', '2019-08-19 22:38:48', NULL),
('KD-WIL-PROP-0019', 'NURA TENGGARA TIMUR', '2019-08-19 22:38:53', NULL),
('KD-WIL-PROP-0020', 'KALIMANTAN UTARA', '2019-08-19 22:38:59', NULL),
('KD-WIL-PROP-0021', 'KALIMANTAN BARAT', '2019-08-19 22:39:05', NULL),
('KD-WIL-PROP-0022', 'KALIMANTAN TENGAH', '2019-08-19 22:39:11', NULL),
('KD-WIL-PROP-0023', 'KALIMANTAN SELATAN', '2019-08-19 22:39:16', NULL),
('KD-WIL-PROP-0024', 'KALIMANTAN TIMUR', '2019-08-19 22:39:25', NULL),
('KD-WIL-PROP-0025', 'GORONTALO', '2019-08-19 22:39:29', NULL),
('KD-WIL-PROP-0026', 'SULAWESI UTARA', '2019-08-19 22:39:35', NULL),
('KD-WIL-PROP-0027', 'SULAWESI BARAT', '2019-08-19 22:39:40', NULL),
('KD-WIL-PROP-0028', 'SULAWESI TENGAH', '2019-08-19 22:39:45', NULL),
('KD-WIL-PROP-0029', 'SULAWESI SELATAN', '2019-08-19 22:39:51', NULL),
('KD-WIL-PROP-0030', 'SULAWESI TENGGARA', '2019-08-19 22:39:59', NULL),
('KD-WIL-PROP-0031', 'MALUKU UTARA', '2019-08-19 22:40:05', NULL),
('KD-WIL-PROP-0032', 'MALUKU', '2019-08-19 22:40:08', NULL),
('KD-WIL-PROP-0033', 'PAPUA BARAT', '2019-08-19 22:40:16', NULL),
('KD-WIL-PROP-0034', 'PAPUA', '2019-08-19 22:40:21', NULL);

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
('KD-REK-KLINIK-0003', 'KD-REF-BANK-0002', '0092285330', '2019-08-19 23:08:05', NULL, 'Aktif');

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
('KD-HARGA-BELI-0001', 'BRG-0002', 'KD-KAT-BRG-0001', 35000, '2019-08-20', '', '2019-08-19 23:25:09', NULL),
('KD-HARGA-BELI-0002', 'BRG-0005', 'KD-KAT-BRG-0001', 35000, '2019-09-05', '', '2019-08-19 23:25:23', '2019-08-19 23:38:39'),
('KD-HARGA-BELI-0003', 'BRG-0003', 'KD-KAT-BRG-0001', 70000, '2019-08-27', '', '2019-08-19 23:25:35', NULL),
('KD-HARGA-BELI-0004', 'BRG-0004', 'KD-KAT-BRG-0001', 90000, '2019-08-27', '', '2019-08-19 23:25:49', NULL),
('KD-HARGA-BELI-0005', 'BRG-0006', 'KD-KAT-BRG-0001', 80000, '2019-09-05', '', '2019-08-19 23:26:00', NULL);

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
('HARGA-JUAL-BRG-0001', 'BRG-0002', 'KD-KLS-PEL-0001', 40000, '0', 0, '2019-08-27', '', '2019-08-19 23:37:35', NULL, '1'),
('HARGA-JUAL-BRG-0002', 'BRG-0005', 'KD-KLS-PEL-0001', 40000, '0', 0, '2019-08-28', '', '2019-08-19 23:38:02', '2019-08-19 23:38:55', '1'),
('HARGA-JUAL-BRG-0003', 'BRG-0003', 'KD-KLS-PEL-0001', 80000, '0', 0, '2019-09-03', '', '2019-08-19 23:39:19', NULL, '1'),
('HARGA-JUAL-BRG-0004', 'BRG-0004', 'KD-KLS-PEL-0001', 100000, '0', 0, '2019-09-03', '', '2019-08-19 23:39:36', NULL, '1'),
('HARGA-JUAL-BRG-0005', 'BRG-0006', 'KD-KLS-PEL-0001', 90000, '0', 0, '2019-08-27', '', '2019-08-19 23:40:00', NULL, '1');

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
('JANJI-PASIEN-MUTIAVIE-0001', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-02', '2019-07-31', '19:15:51', '', 'PELKSANA-KLINIK-0001', '2019-07-18 00:16:03', NULL, 'Aktif'),
('JANJI-PASIEN-MUTIAVIE-0002', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-02', '2019-08-31', '18:52:15', '', 'PELKSANA-KLINIK-0001', '2019-08-19 23:52:30', NULL, 'Aktif'),
('JANJI-PASIEN-MUTIAVIE-0003', 'REGISTRASI-PASIEN-MUTIAVIE-0005', 'KUNJUNGAN-02', '2019-08-19', '18:52:32', '', 'PELKSANA-KLINIK-0002', '2019-08-19 23:52:45', NULL, 'Aktif'),
('JANJI-PASIEN-MUTIAVIE-0004', 'REGISTRASI-PASIEN-MUTIAVIE-0003', 'KUNJUNGAN-01', '2019-08-19', '18:53:07', '', 'PELKSANA-KLINIK-0004', '2019-08-19 23:53:18', NULL, 'Aktif'),
('JANJI-PASIEN-MUTIAVIE-0005', 'REGISTRASI-PASIEN-MUTIAVIE-0002', 'KUNJUNGAN-01', '2019-08-18', '18:53:22', '', 'PELKSANA-KLINIK-0009', '2019-08-19 23:53:38', NULL, 'Aktif');

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
('PENGELUARAN-KLINIK-MUTIAVIE-0001', 'Kertas Kwitansi', '2019-07-26', 15, '4', 'Fotocopy sekarang', '2019-07-19 11:18:56', NULL),
('PENGELUARAN-KLINIK-MUTIAVIE-0002', 'LAMPU UANG', '2019-08-14', 10, '14', 'TIDAK ADA', '2019-08-20 00:05:53', NULL),
('PENGELUARAN-KLINIK-MUTIAVIE-0003', 'LAUNDRY KLINIK', '2019-08-14', 1000, '1', 'TIDAK ADA', '2019-08-20 00:06:18', NULL),
('PENGELUARAN-KLINIK-MUTIAVIE-0004', 'PAKET LAILIS', '2019-08-15', 9, '17', 'Ambil sekarang', '2019-08-20 00:06:40', NULL),
('PENGELUARAN-KLINIK-MUTIAVIE-0005', '90', '2019-08-20', 90000, '3', 'Tolong belikan sekarang', '2019-08-20 00:07:01', NULL);

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
('REGISTRASI-PASIEN-MUTIAVIE-0003', '2019-07-25', 'REKMED-MUTIAVIE-0001', 'KUNJUNGAN-04', '2019-07-20 20:49:56', NULL),
('REGISTRASI-PASIEN-MUTIAVIE-0004', '2019-08-26', 'REKMED-MUTIAVIE-0004', 'KUNUUNGAN-03', '2019-08-19 23:50:47', NULL),
('REGISTRASI-PASIEN-MUTIAVIE-0005', '2019-08-19', 'REKMED-MUTIAVIE-0005', 'KUNJUNGAN-04', '2019-08-19 23:51:02', NULL);

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
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
