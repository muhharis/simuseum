-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Apr 2019 pada 18.30
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
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `grup_brg_id` varchar(10) NOT NULL,
  `kategori_brg_id` varchar(10) NOT NULL,
  `satuan_id` varchar(10) NOT NULL,
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
('1', 'INSO', '2', '2', '1', 'SE', '', '2019-04-04 01:19:20', '2019-04-04 01:19:25', '1'),
('909090', 'koko', '120', 'KTB02', 'SB01', 'op', 'KM.png', '2019-04-07 14:31:54', NULL, 'Aktif'),
('PROD', 'SKINCARE', '120', 'KTB01', 'SB01', 'Tidak Ada', '3070052576_2ADeHaCF_panda_14.j', '2019-04-07 16:32:09', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_hadiah`
--

CREATE TABLE `m_hadiah` (
  `id_hadiah` varchar(10) NOT NULL,
  `hadiah` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_hadiah`
--

INSERT INTO `m_hadiah` (`id_hadiah`, `hadiah`, `create_at`, `update_at`, `is_aktif`) VALUES
('09', 'PIRING', '2019-03-17 23:05:51', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `no_rek_medik` varchar(60) NOT NULL,
  `nm_pasien` varchar(90) NOT NULL,
  `id_gender` varchar(10) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tmpt_lahir` varchar(50) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kd_kel` varchar(10) NOT NULL,
  `agama_id` varchar(10) NOT NULL,
  `pend_id` varchar(10) NOT NULL,
  `id_pekerjaan` varchar(10) NOT NULL,
  `id_sk` varchar(10) NOT NULL,
  `foto_pasien` varchar(255) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`no_rek_medik`, `nm_pasien`, `id_gender`, `tgl_lahir`, `tmpt_lahir`, `no_identitas`, `no_telp`, `gol_darah`, `alamat`, `kd_kel`, `agama_id`, `pend_id`, `id_pekerjaan`, `id_sk`, `foto_pasien`, `create_at`, `update_at`, `is_aktif`) VALUES
('REKMED-MUTIAVIE-0002', 'HARIS', 'GEN01', '2019-04-24', 'ertyuio', 'rtyuil;', '4567890', 'fg', 'fghjkl;', '90', '01', '01', 'PEK01', 'SK01', '3070052576_2ADeHaCF_panda_14.jpg', '2019-04-24 11:52:01', '2019-04-24 12:11:06', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pelaksana`
--

CREATE TABLE `m_pelaksana` (
  `kode_pelaksana` varchar(10) NOT NULL,
  `peran_pelaksana_id` varchar(10) NOT NULL,
  `nama_pelaksana` varchar(90) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pelaksana`
--

INSERT INTO `m_pelaksana` (`kode_pelaksana`, `peran_pelaksana_id`, `nama_pelaksana`, `create_at`, `update_at`, `is_aktif`) VALUES
('oop', '45', 'o', NULL, NULL, 'Aktif'),
('PEL01', '1243', 'Tri Iriawati', '2019-04-07 16:29:53', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pemasok`
--

CREATE TABLE `m_pemasok` (
  `kode_pemasok` varchar(10) NOT NULL,
  `nm_pemasok` varchar(90) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto_pemasok` varchar(255) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pemasok`
--

INSERT INTO `m_pemasok` (`kode_pemasok`, `nm_pemasok`, `no_ktp`, `alamat`, `kota`, `telp`, `foto_pemasok`, `ket`, `create_at`, `update_at`, `is_aktif`) VALUES
('PEMASOK01', 'MUHAMMAD HARIS CH', '123', 'Sunagakure', 'Bakpao', '01293', '', 'no', '2019-03-13 01:57:31', '2019-04-03 02:21:37', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_tindakan`
--

CREATE TABLE `m_tindakan` (
  `kode_tindakan` varchar(10) NOT NULL,
  `grup_tindakan_id` varchar(10) NOT NULL,
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
('098', 'GT2', 'kulit', 'Ya', '2019-03-13 23:42:13', NULL, 'Aktif'),
('576', 'GT5', 'oio', 'Ya', '2019-03-16 02:55:36', NULL, 'Tidak Aktif'),
('TDT01', 'GT3', 'Lulur dan Masker', 'Ya', NULL, '2019-03-13 23:42:28', 'Aktif'),
('TDT02', 'GT3', 'Akupuntur Betis', 'Ya', NULL, '2019-03-13 23:42:40', 'Aktif'),
('TIN2', '0956', 'AKUPUNTUR', 'Ya', '2019-04-07 16:08:20', NULL, 'Aktif'),
('TINDAKAN/1', '0956', 'AKUMULASI', 'Ya', '2019-04-08 00:49:08', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_agama`
--

CREATE TABLE `r_agama` (
  `agama_id` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_agama`
--

INSERT INTO `r_agama` (`agama_id`, `agama`, `create_at`, `update_at`, `is_aktif`) VALUES
('01', 'ISLAM', '2019-04-07 15:20:35', '2019-04-14 01:53:46', 'Aktif'),
('02', 'NASRANI', '2019-03-13 02:47:47', '2019-04-14 01:53:55', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_bank`
--

CREATE TABLE `r_bank` (
  `bank_id` varchar(10) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_bank`
--

INSERT INTO `r_bank` (`bank_id`, `bank`, `create_at`, `update_at`, `is_aktif`) VALUES
('10', 'BNI SYARIAH', NULL, '2019-04-07 16:06:21', 'Tidak Aktif'),
('11', 'BANK JATENG', NULL, '2019-03-14 01:26:25', 'Aktif'),
('12', 'LINK', NULL, '2019-04-07 16:05:40', 'Aktif'),
('123', 'WERE', NULL, '2019-04-07 16:05:46', 'Aktif'),
('13', 'Britama', NULL, '2019-04-07 16:05:50', 'Aktif'),
('3', 'BNI', NULL, '2019-04-07 16:05:59', 'Aktif'),
('78', 'BMI', NULL, '2019-04-07 16:06:07', 'Aktif'),
('9', 'BSM', NULL, '2019-04-07 16:06:14', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_gender`
--

CREATE TABLE `r_gender` (
  `id_gender` varchar(10) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_gender`
--

INSERT INTO `r_gender` (`id_gender`, `gender`, `create_at`, `update_at`, `is_aktif`) VALUES
('GEN01', 'LAKI-LAKI', '2019-04-14 02:28:01', NULL, '1'),
('GEN02', 'PEREMPUAN', '2019-04-14 02:28:10', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_grup_barang`
--

CREATE TABLE `r_grup_barang` (
  `grup_brg_id` varchar(10) NOT NULL,
  `nm_grup_brg` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_grup_barang`
--

INSERT INTO `r_grup_barang` (`grup_brg_id`, `nm_grup_brg`, `create_at`, `update_at`, `is_aktif`) VALUES
('120', 'SABUN', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_grup_tindakan`
--

CREATE TABLE `r_grup_tindakan` (
  `grup_tindakan_id` varchar(10) NOT NULL,
  `grup_tindakan` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_grup_tindakan`
--

INSERT INTO `r_grup_tindakan` (`grup_tindakan_id`, `grup_tindakan`, `create_at`, `update_at`, `is_aktif`) VALUES
('0956', 'ADMINISTASI', '2019-04-07 15:17:36', '2019-04-07 15:18:10', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_harga_jual`
--

CREATE TABLE `r_harga_jual` (
  `harga_jual_id` varchar(10) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `disc_persen` decimal(4,0) NOT NULL,
  `disc_rupiah` int(10) NOT NULL,
  `tgl_berlaku` datetime NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_jenis_kunjungan`
--

CREATE TABLE `r_jenis_kunjungan` (
  `Jenis_kunjungan_id` varchar(10) NOT NULL,
  `jenis_kunjungan` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_jenis_kunjungan`
--

INSERT INTO `r_jenis_kunjungan` (`Jenis_kunjungan_id`, `jenis_kunjungan`, `create_at`, `update_at`, `is_aktif`) VALUES
('KUN01', 'MAMPIR', '2019-04-20 02:38:21', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_jenis_pengeluaran`
--

CREATE TABLE `r_jenis_pengeluaran` (
  `id` varchar(10) NOT NULL,
  `jenis_pengeluaran` varchar(200) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kab`
--

CREATE TABLE `r_kab` (
  `kd_prop` varchar(10) NOT NULL,
  `kd_kab` varchar(10) NOT NULL,
  `nm_kab` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kab`
--

INSERT INTO `r_kab` (`kd_prop`, `kd_kab`, `nm_kab`, `create_at`, `update_at`) VALUES
('PROP01', 'KAB01', 'SURAKARTA', '2019-04-14 01:49:32', '2019-04-14 01:51:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kategori_brg`
--

CREATE TABLE `r_kategori_brg` (
  `kategori_brg_id` varchar(10) NOT NULL,
  `kategori_brg` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kategori_brg`
--

INSERT INTO `r_kategori_brg` (`kategori_brg_id`, `kategori_brg`, `create_at`, `update_at`, `is_aktif`) VALUES
('KTB01', 'BEBAS', '2019-03-13 23:49:41', '2019-04-07 15:19:37', 'Tidak Aktif'),
('KTB03', 'OBAT KERAS', '2019-03-13 23:50:22', NULL, 'Aktif'),
('KTB04', 'Luminous cream', '2019-03-13 23:50:41', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kec`
--

CREATE TABLE `r_kec` (
  `kd_kab` varchar(10) NOT NULL,
  `kd_kec` varchar(10) NOT NULL,
  `nm_kec` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kec`
--

INSERT INTO `r_kec` (`kd_kab`, `kd_kec`, `nm_kec`, `create_at`, `update_at`) VALUES
('KAB01', 'KEC01', 'LAWEYAN', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kel`
--

CREATE TABLE `r_kel` (
  `kd_kec` varchar(10) NOT NULL,
  `kd_kel` varchar(10) NOT NULL,
  `nm_kel` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kel`
--

INSERT INTO `r_kel` (`kd_kec`, `kd_kel`, `nm_kel`, `create_at`, `update_at`) VALUES
('KEC01', '3544', 'dgfghfhgh', '2019-04-20 12:40:55', NULL),
('KEC01', '90', 'ji', '2019-04-15 15:10:25', NULL),
('KEC01', 'KEL01', 'BUMI', '2019-04-14 01:50:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kelas`
--

CREATE TABLE `r_kelas` (
  `kelas_id` varchar(10) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_kelas`
--

INSERT INTO `r_kelas` (`kelas_id`, `kelas`, `create_at`, `update_at`, `is_aktif`) VALUES
('989', 'AKUPUNTUR', '2019-04-07 15:15:15', '2019-04-07 15:18:44', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_kurir`
--

CREATE TABLE `r_kurir` (
  `kurir_id` varchar(10) NOT NULL,
  `kurir` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pekerjaan`
--

CREATE TABLE `r_pekerjaan` (
  `id_pekerjaan` varchar(10) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_pekerjaan`
--

INSERT INTO `r_pekerjaan` (`id_pekerjaan`, `pekerjaan`, `create_at`, `update_at`, `is_aktif`) VALUES
('PEK01', 'TANI', '2019-04-07 16:04:13', '2019-04-07 16:04:22', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pend`
--

CREATE TABLE `r_pend` (
  `pend_id` varchar(10) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_pend`
--

INSERT INTO `r_pend` (`pend_id`, `pendidikan`, `create_at`, `update_at`, `is_aktif`) VALUES
('01', 'SD', '2019-04-07 16:00:37', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_peran_pelaksana`
--

CREATE TABLE `r_peran_pelaksana` (
  `peran_pelaksana_id` varchar(10) NOT NULL,
  `peran_pelaksana` varchar(50) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_peran_pelaksana`
--

INSERT INTO `r_peran_pelaksana` (`peran_pelaksana_id`, `peran_pelaksana`, `create_at`, `update_at`, `is_aktif`) VALUES
('1243', 'DOKTER', '2019-04-07 15:16:30', '2019-04-07 15:18:26', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_prop`
--

CREATE TABLE `r_prop` (
  `id` int(10) NOT NULL,
  `kd_prop` varchar(10) NOT NULL,
  `nm_prop` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_prop`
--

INSERT INTO `r_prop` (`id`, `kd_prop`, `nm_prop`, `create_at`, `update_at`) VALUES
(10, 'PROP01', 'JAWA TENGAH', '2019-04-15 15:11:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_rekening`
--

CREATE TABLE `r_rekening` (
  `rek_id` varchar(10) NOT NULL,
  `bank_id` varchar(10) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_rekening`
--

INSERT INTO `r_rekening` (`rek_id`, `bank_id`, `no_rek`, `create_at`, `update_at`, `is_aktif`) VALUES
('09', '3', '890', NULL, NULL, '1'),
('123', '10', '321', NULL, NULL, '1'),
('REK02', '11', '129032BrkaNAI2iIJaoo', '2019-04-07 16:07:01', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_satuan`
--

CREATE TABLE `r_satuan` (
  `satuan_id` varchar(10) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_satuan`
--

INSERT INTO `r_satuan` (`satuan_id`, `satuan`, `create_at`, `update_at`, `is_aktif`) VALUES
('PO01', 'BOTOL', '2019-04-07 15:20:08', '2019-04-07 15:20:16', 'Tidak Aktif'),
('SB01', 'BOTOL', '2019-03-13 23:51:39', NULL, 'Aktif'),
('SB02', 'AMP', '2019-03-13 23:51:53', NULL, 'Aktif'),
('SB03', 'TUBE', '2019-03-13 23:52:13', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_status`
--

CREATE TABLE `r_status` (
  `status_id` varchar(10) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `r_status`
--

INSERT INTO `r_status` (`status_id`, `status`, `create_at`, `update_at`) VALUES
('0', 'TUNGGU', NULL, NULL),
('1', 'DITANGANI', NULL, NULL),
('2', 'SELESAI', NULL, NULL),
('3', 'BATAL', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_status_kawin`
--

CREATE TABLE `r_status_kawin` (
  `id_sk` varchar(10) NOT NULL,
  `status_kawin` varchar(30) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `r_status_kawin`
--

INSERT INTO `r_status_kawin` (`id_sk`, `status_kawin`, `create_at`, `update_at`, `is_aktif`) VALUES
('SK01', 'KAWIN', '2019-04-07 16:05:11', '2019-04-07 16:05:20', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_harga_beli`
--

CREATE TABLE `t_harga_beli` (
  `harga_beli_id` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kategori_brg_id` varchar(10) DEFAULT NULL,
  `harga_beli` int(10) NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_harga_beli`
--

INSERT INTO `t_harga_beli` (`harga_beli_id`, `kode_barang`, `kategori_brg_id`, `harga_beli`, `tgl_berlaku`, `ket`, `create_at`, `update_at`) VALUES
('HB01', 'PROD', 'KTB04', 3000, '2019-04-18', 'Ada', '2019-04-07 16:39:11', '2019-04-07 16:39:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_harga_jual`
--

CREATE TABLE `t_harga_jual` (
  `id` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kategori_brg_id` varchar(10) DEFAULT NULL,
  `kelas_id` varchar(10) NOT NULL DEFAULT '1',
  `harga_jual` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tgl_berlaku` date DEFAULT NULL,
  `diskon_persen` decimal(4,1) DEFAULT NULL,
  `diskon_rupiah` int(10) UNSIGNED DEFAULT NULL,
  `ket` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_harga_jual`
--

INSERT INTO `t_harga_jual` (`id`, `kode_barang`, `kategori_brg_id`, `kelas_id`, `harga_jual`, `tgl_berlaku`, `diskon_persen`, `diskon_rupiah`, `ket`, `create_at`, `update_at`) VALUES
('123', '1445', 'KTB03', 'KLS01', 23000, '2019-03-27', '0.7', 12, 'nowey', '2019-03-16 02:19:07', '2019-03-16 02:21:57'),
('HJ01', '909090', 'KTB03', '989', 9000, '2019-04-17', '9.9', 9000, 'Tidak Ada', '2019-04-07 16:40:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_janji`
--

CREATE TABLE `t_janji` (
  `id` varchar(10) NOT NULL,
  `peaksana_id` varchar(10) DEFAULT NULL,
  `pasien_id` varchar(10) DEFAULT NULL,
  `jenis_kunjungan_id` varchar(10) DEFAULT NULL,
  `tanggal_janji` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `urut` int(3) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_janji_batal`
--

CREATE TABLE `t_janji_batal` (
  `id` varchar(10) NOT NULL,
  `janji_id` varchar(10) DEFAULT NULL,
  `tanggal_batal` datetime DEFAULT NULL,
  `pembatalan` varchar(20) DEFAULT NULL,
  `alasan` varchar(500) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penerimaan_hadiah_rinci`
--

CREATE TABLE `t_penerimaan_hadiah_rinci` (
  `kode_penerimaan_hadiah` varchar(10) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `jam` time DEFAULT NULL,
  `id_hadiah` varchar(10) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_penerimaan_hadiah_rinci`
--

INSERT INTO `t_penerimaan_hadiah_rinci` (`kode_penerimaan_hadiah`, `tanggal_penerimaan`, `jam`, `id_hadiah`, `jumlah`, `ket`, `create_at`, `update_at`) VALUES
('PH01', '2019-05-01', '20:44:11', '09', 2147483647, 'NO', '2019-04-13 01:44:02', '2019-04-13 01:44:26'),
('PH02', '2019-04-24', '20:44:40', '09', 2147483647, 'NO', '2019-04-13 01:44:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penerimaan_rinci`
--

CREATE TABLE `t_penerimaan_rinci` (
  `kode_penerimaan` varchar(10) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `jam` time DEFAULT NULL,
  `kode_pemasok` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_penerimaan_rinci`
--

INSERT INTO `t_penerimaan_rinci` (`kode_penerimaan`, `tanggal_penerimaan`, `jam`, `kode_pemasok`, `kode_barang`, `jumlah`, `ket`, `create_at`, `update_at`) VALUES
('90', '2019-05-07', '17:40:10', 'PEMASOK01', '909090', 9, 'no', '2019-04-12 22:40:02', '2019-04-12 22:41:39'),
('sfdfddfds', '2019-05-01', '18:08:45', 'PEMASOK01', '1', 34, 'sdfdsf', '2019-04-14 23:08:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengeluaran`
--

CREATE TABLE `t_pengeluaran` (
  `pengeluaran_id` varchar(10) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `pengeluaran` int(10) NOT NULL,
  `jenis_pengeluaran_id` varchar(10) NOT NULL,
  `ket` text NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_periksa`
--

CREATE TABLE `t_periksa` (
  `periksa_id` varchar(10) NOT NULL,
  `registrasi_id` varchar(10) DEFAULT NULL,
  `tanggal_periksa` datetime DEFAULT NULL,
  `anamnesa` varchar(500) DEFAULT NULL,
  `diagnosa` varchar(500) DEFAULT NULL,
  `terapi` varchar(500) DEFAULT NULL,
  `tekanan_darah` varchar(10) DEFAULT NULL,
  `tinggi_badan` varchar(5) DEFAULT NULL,
  `berat_badan` varchar(5) DEFAULT NULL,
  `pelaksana_id` varchar(10) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pesan`
--

CREATE TABLE `t_pesan` (
  `pesan_id` varchar(10) NOT NULL,
  `kode_pesan` varchar(10) DEFAULT NULL,
  `tanggal_pesan` datetime DEFAULT NULL,
  `registrasi_id` varchar(10) DEFAULT NULL,
  `alamat_kirim` varchar(500) DEFAULT NULL,
  `sub_total` int(3) DEFAULT NULL,
  `diskon_persen` decimal(4,0) DEFAULT NULL,
  `diskon_rupiah` decimal(4,0) DEFAULT NULL,
  `grand_total` int(3) DEFAULT NULL,
  `ongkir` int(3) DEFAULT NULL,
  `total` int(3) DEFAULT NULL,
  `s_bayar` int(3) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `kurir_id` varchar(10) DEFAULT NULL,
  `no_resi` varchar(15) DEFAULT NULL,
  `s_kirim` varchar(15) DEFAULT NULL,
  `tanggal_kirim` datetime DEFAULT NULL,
  `tanggal_terima` datetime DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_registrasi`
--

CREATE TABLE `t_registrasi` (
  `no_registrasi` varchar(60) NOT NULL,
  `no_rek_medik` varchar(60) NOT NULL,
  `tgl_reg` datetime DEFAULT NULL,
  `jenis_kunjungan_id` varchar(10) NOT NULL DEFAULT '1',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_registrasi`
--

INSERT INTO `t_registrasi` (`no_registrasi`, `no_rek_medik`, `tgl_reg`, `jenis_kunjungan_id`, `create_at`, `update_at`) VALUES
('REGISTRASI-PAIEN-MUTIAVIE-0001', 'REKMED-MUTIAVIE-0002', '2019-04-23 00:00:00', '', '2019-04-24 23:09:31', NULL),
('REGISTRASI-PAIEN-MUTIAVIE-0002', 'REKMED-MUTIAVIE-0002', '2019-04-24 00:00:00', '', '2019-04-24 23:19:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stok_opname`
--

CREATE TABLE `t_stok_opname` (
  `id` varchar(10) NOT NULL,
  `kode_stok_opname` varchar(10) DEFAULT NULL,
  `tgl_stok_opname` datetime DEFAULT NULL,
  `ket` varchar(500) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stok_opname_hadiah`
--

CREATE TABLE `t_stok_opname_hadiah` (
  `id` varchar(10) NOT NULL,
  `kode_stok_opname` varchar(10) DEFAULT NULL,
  `tanggal_stok_opname` datetime DEFAULT NULL,
  `ket` varchar(500) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stok_opname_hadiah_rinci`
--

CREATE TABLE `t_stok_opname_hadiah_rinci` (
  `id` varchar(10) NOT NULL,
  `stok_opname_id` varchar(10) DEFAULT NULL,
  `urut` int(3) DEFAULT NULL,
  `hadiah_id` varchar(10) DEFAULT NULL,
  `opname_terakhir` date DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `stok_fisik` int(5) DEFAULT NULL,
  `selisih` int(6) DEFAULT NULL,
  `ket` varchar(500) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stok_opname_rinci`
--

CREATE TABLE `t_stok_opname_rinci` (
  `kode_stok_opname_obat` varchar(10) NOT NULL,
  `urut` int(3) DEFAULT NULL,
  `kode_brg` varchar(10) DEFAULT NULL,
  `opname_terakhir` date DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `stok_fisik` int(5) DEFAULT NULL,
  `selisih` int(5) DEFAULT NULL,
  `ket` varchar(500) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif_tindakan`
--

CREATE TABLE `t_tarif_tindakan` (
  `tarif_tindakan_id` varchar(10) NOT NULL,
  `kode_tindakan` varchar(10) NOT NULL,
  `grup_tindakan_id` varchar(10) DEFAULT NULL,
  `kelas_id` varchar(10) NOT NULL,
  `tarif` int(10) NOT NULL,
  `disc_persen` decimal(4,0) NOT NULL,
  `disc_rupiah` int(10) NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `ket` text NOT NULL,
  `is_aktif` varchar(15) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tarif_tindakan`
--

INSERT INTO `t_tarif_tindakan` (`tarif_tindakan_id`, `kode_tindakan`, `grup_tindakan_id`, `kelas_id`, `tarif`, `disc_persen`, `disc_rupiah`, `tgl_berlaku`, `ket`, `is_aktif`, `create_at`, `update_at`) VALUES
('012', '098', '0956', '989', 9000, '2', 2000, '2019-04-25', 'Ada', 'Tidak Aktif', '2019-04-07 16:38:15', '2019-04-07 16:38:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `nama` varchar(90) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_aktif` varchar(15) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `pass`, `level`, `create_at`, `update_at`, `is_aktif`) VALUES
('123211', '09', 'c20ad4d76fe97759aa27a0c99bff6710', 2, NULL, NULL, '1'),
('ADMIN', 'ADMIN', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, '1'),
('asdsd', 'asdsad', 'b447c27a00e3a348881b0030177000cd', 2, NULL, NULL, '1'),
('haris', 'haris', '202cb962ac59075b964b07152d234b70', 2, NULL, NULL, '1'),
('MuhammadHaris99', 'Haria Ae Ea', 'cc2fd37643fce0b20647ca97cba18000', 2, NULL, NULL, '1'),
('sadsa', 'safsafdfdsf', 'ae65ca6fdbbead5105c0254745371bba', 2, NULL, NULL, '1'),
('USER', 'HARIS', 'd8578edf8458ce06fbc5bb76a58c5ca4', 2, NULL, NULL, '1'),
('WESMULAI', 'wes mulai', 'cc2fd37643fce0b20647ca97cba18000', 2, NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD KEY `grup_brg_id` (`grup_brg_id`),
  ADD KEY `kategori_brg_id` (`kategori_brg_id`),
  ADD KEY `satuan_id` (`satuan_id`);

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
  ADD PRIMARY KEY (`kode_pelaksana`),
  ADD KEY `peran_pelaksana_id` (`peran_pelaksana_id`);

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
-- Indexes for table `r_harga_jual`
--
ALTER TABLE `r_harga_jual`
  ADD PRIMARY KEY (`harga_jual_id`),
  ADD KEY `barang_id` (`kode_barang`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `barang_id_2` (`kode_barang`);

--
-- Indexes for table `r_jenis_kunjungan`
--
ALTER TABLE `r_jenis_kunjungan`
  ADD PRIMARY KEY (`Jenis_kunjungan_id`);

--
-- Indexes for table `r_jenis_pengeluaran`
--
ALTER TABLE `r_jenis_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_kab`
--
ALTER TABLE `r_kab`
  ADD PRIMARY KEY (`kd_prop`),
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
-- Indexes for table `r_kurir`
--
ALTER TABLE `r_kurir`
  ADD PRIMARY KEY (`kurir_id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_janji`
--
ALTER TABLE `t_janji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_janji_batal`
--
ALTER TABLE `t_janji_batal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_penerimaan_hadiah_rinci`
--
ALTER TABLE `t_penerimaan_hadiah_rinci`
  ADD PRIMARY KEY (`kode_penerimaan_hadiah`);

--
-- Indexes for table `t_penerimaan_rinci`
--
ALTER TABLE `t_penerimaan_rinci`
  ADD PRIMARY KEY (`kode_penerimaan`);

--
-- Indexes for table `t_pengeluaran`
--
ALTER TABLE `t_pengeluaran`
  ADD PRIMARY KEY (`pengeluaran_id`),
  ADD KEY `jenis_pengeluaran_id` (`jenis_pengeluaran_id`);

--
-- Indexes for table `t_periksa`
--
ALTER TABLE `t_periksa`
  ADD PRIMARY KEY (`periksa_id`);

--
-- Indexes for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indexes for table `t_registrasi`
--
ALTER TABLE `t_registrasi`
  ADD PRIMARY KEY (`no_registrasi`);

--
-- Indexes for table `t_stok_opname`
--
ALTER TABLE `t_stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_stok_opname_hadiah`
--
ALTER TABLE `t_stok_opname_hadiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_stok_opname_hadiah_rinci`
--
ALTER TABLE `t_stok_opname_hadiah_rinci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_stok_opname_rinci`
--
ALTER TABLE `t_stok_opname_rinci`
  ADD PRIMARY KEY (`kode_stok_opname_obat`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_prop`
--
ALTER TABLE `r_prop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
