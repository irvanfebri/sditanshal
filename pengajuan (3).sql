-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2019 at 04:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengajuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `noid` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `akses` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`noid`, `nama`, `jabatan`, `akses`, `email`, `nohp`) VALUES
('1234', 'Ferry Adnan Sasmita', 'Tenaga Kependidikan', 'keuangan', 'later@later', '6289509803563'),
('1430.06.01.01', 'Prima Kurniawan', 'Guru', 'guru', 'a@a', '628562341977'),
('1430.07.02.01', 'Mujtahid', 'Guru', 'guru', 'a@a', '6281808284414'),
('1431.05.01.01', 'Hamdani Nasution', 'Guru', 'guru', 'a@a', '6288809014302'),
('1434.02.09.01', 'Paino ', 'Tenaga Kependidikan', 'guru', 'a@a', '6281385911077'),
('1434.06.10.01', 'Muhamad Jamaludin ', 'Tenaga Kependidikan', 'guru', 'a@a', ''),
('1434.07.11.01', 'Kosasih ', 'Guru', 'guru', 'a@a', '6282125215373'),
('1434.07.16.01', 'Selma Kurniawan', 'Kepala Divisi Akademik', 'kadiv akademik', 'selma@anakshalihbogor.sch.od', '6282211720329'),
('1434.07.20.01', 'Jemli Jubaedi', 'Guru', 'guru', 'a@a', '6285692849063'),
('1434.07.22.01', 'Syafrizal Fahri', 'Guru', 'guru', 'a@a', '628889004657'),
('1434.07.23.01', 'Abbas Kiri Bin Jou', 'Guru', 'guru', 'abbas_kiri@anakshalihbogor.sch.id', '6285694844486'),
('1434.11.08.01', 'Maryani Ulfah', 'Guru', 'guru', 'a@a', '6281214066296'),
('1434.11.12.01', 'Muhammad Tungguan ', 'Tenaga Kependidikan', 'guru', 'a@a', ''),
('1435.01.03.01', 'Isni Rodhiah', 'Guru', 'guru', 'a@a', '6281291995481'),
('1435.06.11.01', 'Armini Rahameru ', 'Guru', 'guru', 'a@a', '6281517486301'),
('1435.06.13.01', 'Junaidin Kiri ', 'Guru', 'guru', 'a@a', '6289611651609'),
('1435.07.04.01', 'Metis Gumelar', 'Guru', 'guru', 'a@a', '6285813703784'),
('1435.07.05.01', 'Hasanudin Karimalai ', 'Guru', 'guru', 'a@a', '6285694521332'),
('1436.07.03.01', 'Muzayyin Akbar ', 'Guru', 'guru', 'a@a', '6287874303822'),
('1436.07.05.01', 'Hergianto Mahardika ', 'Guru', 'guru', 'a@a', '6287873886588'),
('1437.08.01.01', 'Abdul Qohar ', 'Guru', 'guru', 'a@a', '6285777151757'),
('1437.09.04.01', 'Sobar ', 'Tenaga Kependidikan', 'guru', 'a@a', '6282112091459'),
('1438.01.13.01', 'Muhamad Kusdi', 'Guru', 'guru', 'a@a', '6283824690294'),
('1438.05.11.01', 'Muh. Amrullah', 'Guru', 'guru', 'a@a', '6285230509032'),
('1438.09.08.01', 'Irvan Febriansyah', 'Tenaga Kependidikan', 'guru', 'a@a', '6287888832125'),
('1439.02.16.01', 'Mierza Miranti', 'Guru', 'guru', 'a@a', '6281369372335'),
('1439.04.17.01', 'Marni Roslita', 'Guru', 'guru', 'a@a', '6285714047696'),
('1439.07.04.01', 'Bagus Anshori ', 'Guru', 'guru', 'a@a', '6282217583461'),
('1439.07.07.01', 'Muhammad Azhar Rinaldi ', 'Tenaga Kependidikan', 'guru', 'a@a', '6289515550143'),
('1439.07.08.01', 'Harits Jawas', 'Guru', 'guru', 'a@a', '628567219821'),
('1439.09.12.01', 'Agung Laksono', 'Guru', 'guru', 'a@a', '6281380215184'),
('1439.11.14.01', 'Muhammad Farras Maruf', 'Kadiv Keuangan', 'admin', 'farras@anakshalihbogor.sch.id', '6281287873121'),
('1440.02.01.01', 'Ayu Agustina', 'Guru', 'guru', 'a@a', '6281906537049'),
('1440.02.02.02', 'Karvita Parmawati ', 'Guru', 'guru', 'a@a', '6289651678390'),
('1440.03.02.01', 'Agus Purwanto', 'Guru', 'guru', 'a@a', '6285880975004'),
('1440.03.03.01', 'Elsa Susilawati ', 'Guru', 'guru', 'a@a', '6287899660284'),
('1440.04.03.01', 'Ricki Threezardi', 'Kepala Divisi Kesiswaan', 'kadiv kesiswaan', 'ricky@blablabl.com', '6281905056225'),
('1440.06.03.01', 'Tania Dwi Haryanti ', 'Guru', 'guru', 'a@a', '6281802923272'),
('1440.06.05.01', 'Tri Rahmawati', 'Guru', 'guru', 'a@a', '6281802923272'),
('1440.07.02.01', 'Randi Ashary Subagja ', 'Guru', 'guru', 'a@a', '6287765925608'),
('1440.08.01.01', 'Larasati Ratih Indahsari', 'Tenaga Kependidikan', 'guru', 'a@a', '6285810904145'),
('1440.08.01.03', 'Aura Nabila Azelia ', 'Guru', 'guru', 'a@a', '6281380170047'),
('1440.08.02.01', 'Nurdiansyah Yudi Purnama ', 'Guru', 'guru', 'a@a', '6289503223447'),
('1440.08.02.03', 'Ahmad Riyadhus Shalihin', 'Tenaga Kependidikan', 'guru', 'a@a', '628970064460'),
('1440.10.01.03', 'Agus Sugiyanto', 'Guru', 'guru', 'a@a', '6287882485537'),
('1440.10.02.01', 'Henra Syaputra', 'Guru', 'guru', 'a@a', '6285265927676'),
('1440.10.02.03', 'Imam Syapei ', 'Guru', 'guru', 'a@a', '6285880998001'),
('1440.10.03.01', 'Adilah Firda Fahmala', 'Guru', 'guru', 'a@a', '6285777886332'),
('1440.10.03.03', 'Muhammad Rafikin ', 'Guru', 'guru', 'a@a', '6287881703093'),
('1440.10.04.01', 'Anggun Ardhiani', 'Guru', 'guru', 'a@a', '6281393314763'),
('1440.10.05.01', 'Nengsih Suhawa', 'Guru', 'guru', 'a@a', '6287774553870'),
('1440.10.05.03', 'Udi Fajarudin ', 'Guru', 'guru', 'a@a', '6287870475711'),
('1440.10.06.01', 'Dhimas Rizqi Akbar Pradana', 'Guru', 'guru', 'a@a', '6281337229233'),
('1440.10.06.03', 'Muhammad Fikri Haikal ', 'Guru', 'guru', 'a@a', '62895383181645'),
('1440.11.01.04', 'Salim Yazid', 'Guru', 'guru', 'a@a', ''),
('1440.11.02.04', 'Halki Muhammad Riswan', 'Guru', 'guru', 'a@a', ''),
('1440.11.03.04', 'Rondi Gunawan', 'Guru', 'guru', 'a@a', ''),
('271295', 'Muhammad Farras', 'Guru', 'guru', 'maruffarras@gmail.com', '6281287873121'),
('272727', 'Farah Diba Alba Fitria', 'Guru', 'guru', 'farah@gmail.com', '6285770663500'),
('870', 'Putra Adi Wibowo', 'Tenaga Kependidikan', 'guru', 'later@later', '6281287873121');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan-divisi`
--

CREATE TABLE `kegiatan-divisi` (
  `no` int(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `divisi` varchar(40) NOT NULL,
  `opt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan-divisi`
--

INSERT INTO `kegiatan-divisi` (`no`, `kegiatan`, `divisi`, `opt`) VALUES
(1, 'Buku Siswa', 'Kadiv Akademik', 'Divisi Akademik'),
(2, 'Daurah Al Quran', 'Kadiv Akademik', ''),
(3, 'Fasilitas Kelas', 'Kadiv Akademik', ''),
(4, 'Kegiatan TryOut US & UN', 'Kadiv Akademik', ''),
(5, 'Media Pembelajaran', 'Kadiv Akademik', ''),
(6, 'Outing Class dan Guest Teacher', 'Kadiv Akademik', ''),
(7, 'Pembagian Rapor', 'Kadiv Akademik', ''),
(8, 'Perpisahan Kelas 6', 'Kadiv Akademik', ''),
(9, 'Ujian Komprehensif', 'Kadiv Akademik', ''),
(10, 'Ulangan', 'Kadiv Akademik', ''),
(11, 'Bimbingan Konseling', 'Kadiv Kesiswaan', 'Divisi Kesiswaan'),
(12, 'Bimbingan Prilaku Siswa', 'Kadiv Kesiswaan', ''),
(13, 'Ekstrakulikuler', 'Kadiv Kesiswaan', ''),
(14, 'Kegiatan Hari Jumat', 'Kadiv Kesiswaan', ''),
(15, 'kegiatan Mading', 'Kadiv Kesiswaan', ''),
(16, 'Market Day', 'Kadiv Kesiswaan', ''),
(17, 'MPLS', 'Kadiv Kesiswaan', ''),
(18, 'OutBond', 'Kadiv Kesiswaan', ''),
(19, 'Peka Musabaqoh', 'Kadiv Kesiswaan', ''),
(20, 'Perpustakaan', 'Kadiv Kesiswaan', ''),
(21, 'PPS', 'Kadiv Kesiswaan', ''),
(22, 'Pramuka', 'Kadiv Kesiswaan', ''),
(23, 'Reward Siswa', 'Kadiv Kesiswaan', ''),
(24, 'School Trip', 'Kadiv Kesiswaan', ''),
(25, 'Sience Day', 'Kadiv Kesiswaan', ''),
(26, 'UKS', 'Kadiv Kesiswaan', ''),
(27, 'Persatuan Orangtua Siswa', 'Kepala Sekolah', 'Kepala Sekolah'),
(28, 'Rapat & Pertemuan Internal', 'Keuangan', 'Keuangan'),
(29, 'Biaya Transport non-Perjalanan Dinas', 'Keuangan', ''),
(30, 'Biaya Alat Tulis Kantor', 'Keuangan', ''),
(31, 'Biaya Rumah Tangga', 'Keuangan', ''),
(32, 'Peralatan dan Perlengkapan Kantor', 'Keuangan', ''),
(33, 'Keamanan & Kebersihan', 'Keuangan', ''),
(34, 'Sumbangan', 'Keuangan', ''),
(35, 'Pemeliharaan Taman', 'Keuangan', ''),
(36, 'Jamuan Tamu', 'Keuangan', ''),
(37, 'Biaya Listrik, Air, & Komunikasi', 'Keuangan', ''),
(38, 'Pemeliharaan dan Perbaikan', 'Keuangan', ''),
(39, 'Sarana Prasarana', 'keuangan', '');

-- --------------------------------------------------------

--
-- Table structure for table `stepchecker`
--

CREATE TABLE `stepchecker` (
  `kode` varchar(6) NOT NULL,
  `noid` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nominal` varchar(15) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `nominal2` varchar(15) NOT NULL,
  `pengambildana` varchar(50) NOT NULL,
  `waktupengambildana` varchar(15) NOT NULL,
  `pelapor` varchar(30) NOT NULL,
  `waktumelapor` varchar(15) NOT NULL,
  `realisasi` varchar(18) NOT NULL,
  `step` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stepchecker`
--

INSERT INTO `stepchecker` (`kode`, `noid`, `nama`, `kegiatan`, `divisi`, `keterangan`, `nominal`, `waktu`, `catatan`, `nominal2`, `pengambildana`, `waktupengambildana`, `pelapor`, `waktumelapor`, `realisasi`, `step`) VALUES
('5BER9H', '1440.10.02.01', 'Henra Syaputra', 'UKS', 'Kadiv Kesiswaan', 'Membesuk siswa kelas 5A \r\nAtas Nama Muhammad Afkar Sayyef', '50000', '1562922683', 'ok', '50000', 'Pak Henra', '1562919579', 'Farras', '1563155310', '280000', 'done'),
('9N3VZH', '1234', 'Ferry Adnan Sasmita', 'MPLS', 'Kadiv Kesiswaan', 'pengajuan dana untuk simulasi game anak', '300000', '1562919579', 'dana yang di cairkan Rp. 200.000', '200.000', 'Pak Kusdi', '1562919579', '1', '1563127934', '1', 'done'),
('DSN28J', '870', 'Putra Adi Wibowo', 'Media Pembelajaran', 'Kadiv Akademik', 'test final before launching this week insyaAllah', '180000', '1563174491', 'Gua genepin 20.000', '200000', 'cakep', '1563175100', 'gya', '1563175218', '500000', 'done'),
('EX6ESO', '870', 'Putra Adi Wibowo', 'Jamuan Tamu', 'Keuangan', 'Buat nikahan', '2000000', '1563174138', 'Mahal', '1000000', 'putra', '1563174348', 'farras', '1563174402', '250000', 'done'),
('L6V1M8', '1439.11.14.01', 'Muhammad Farras Maruf', 'Biaya Listrik, Air, & Komunikasi', 'Keuangan', 'farras', '180000', '1563171477', 'oke', '', 'farras', '1563173812', 'farras', '1563173887', '180000', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `nopengajuan` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `terbilang` varchar(30) NOT NULL,
  `kadiv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`nopengajuan`, `nama`, `gender`, `kegiatan`, `keterangan`, `jumlah`, `divisi`, `tanggal`, `terbilang`, `kadiv`) VALUES
('1U8RYT8', 'Syuaib', 'ikhwan', 'pembagian rapor', 'Pembelian lampu untuk ruang guru dan kamar mandi', 300000, 'Akademik', '18 April 2019', 'tiga ratus ribu rupiah', 'Selma Kurniawan'),
('2UE2YJS', 'Farras', 'ikhwan', 'pembagian rapor', 'Tujuan', 280000, 'Akademik', '02 July 2019', 'Dua Ratus Delapan Puluh Ribu', 'Selma Kurniawan'),
('AYAA1IA', 'Muhammad Farras Maruf', 'ikhwan', 'media pembelajaran', 'Susus', 280000, 'Akademik', '19 April 2019', 'Dua Ratus Delapan Puluh Ribu', 'Selma Kurniawan'),
('DU2LA9U', 'Farras', 'ikhwan', 'pembagian rapor', 'Kepo', 737373, 'Akademik', '02 July 2019', 'Satu juta lima ratus ribu rupi', 'Selma Kurniawan'),
('JEYS1US', 'Farras', 'ikhwan', 'pembagian rapor', 'Tujuan', 280000, 'Akademik', '02 July 2019', 'Dua Ratus Delapan Puluh Ribu', 'Selma Kurniawan'),
('RL8A9DD', 'Syuaib', 'ikhwan', 'pembagian rapor', 'Pembelian lampu untuk ruang guru dan kamar mandi', 250000, 'Akademik', '18 April 2019', 'Dua Ratus Lima Puluh Ribu Rupi', 'Selma Kurniawan'),
('UEJ1J0U', 'Farah', 'akhwat', 'pembagian rapor', '123', 123, 'Akademik', '02 July 2019', '123', 'Abaikan Kolom ini');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `noid` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`noid`, `username`, `password`) VALUES
('1234', 'ferry', 'bismillah1304'),
('1430.06.01.01', 'kurniawan', '000000'),
('1430.07.02.01', 'jtahid', '000000'),
('1431.05.01.01', 'nasution', '000000'),
('1434.02.09.01', 'paino ', '000000'),
('1434.06.10.01', 'jamaludin ', '000000'),
('1434.07.11.01', 'sasih', '000000'),
('1434.07.16.01', 'selma', '000000'),
('1434.07.20.01', 'jubaedi', '000000'),
('1434.07.22.01', 'fahri', '000000'),
('1434.07.23.01', 'abbaskiri', '000000'),
('1434.11.08.01', 'ulfah', '000000'),
('1434.11.12.01', 'tungguan ', '000000'),
('1435.01.03.01', 'rodhiah', '000000'),
('1435.06.11.01', 'rahameru', '000000'),
('1435.06.13.01', 'kiri ', '000000'),
('1435.07.04.01', 'gumelar', '000000'),
('1435.07.05.01', 'karimalai ', '000000'),
('1436.07.03.01', 'akbar ', '000000'),
('1436.07.05.01', 'mahardika', '000000'),
('1437.08.01.01', 'qohar', '000000'),
('1437.09.04.01', 'sobar ', '000000'),
('1438.01.13.01', 'kusdi', '000000'),
('1438.05.11.01', 'amrullah', '000000'),
('1438.09.08.01', 'febriansyah', '000000'),
('1439.02.16.01', 'miranti', '000000'),
('1439.04.17.01', 'roslita', '000000'),
('1439.07.04.01', 'anshori ', '000000'),
('1439.07.07.01', 'rinaldi ', '000000'),
('1439.07.08.01', 'haritsjawas', '000000'),
('1439.09.12.01', 'laksono', '000000'),
('1439.11.14.01', 'farras', 'farrasmuhammad'),
('1440.02.01.01', 'agustina', '000000'),
('1440.02.02.02', 'wati ', '000000'),
('1440.03.02.01', 'purwanto', '000000'),
('1440.03.03.01', 'susilawati ', '000000'),
('1440.04.03.01', 'ricky', '000000'),
('1440.06.03.01', 'tania', '000000'),
('1440.06.05.01', 'rahmawati', '000000'),
('1440.07.02.01', 'asharysubagja ', '000000'),
('1440.08.01.01', 'indahsari', '000000'),
('1440.08.01.03', 'azelia ', '000000'),
('1440.08.02.01', 'yudi', '000000'),
('1440.08.02.03', 'shalihin', '000000'),
('1440.10.01.01', 'abuzakaria', '000000'),
('1440.10.01.03', 'sugiyanto', '000000'),
('1440.10.02.01', 'syaputra', '000000'),
('1440.10.02.03', 'syapei ', '000000'),
('1440.10.03.01', 'firda', '000000'),
('1440.10.03.03', 'rafikin ', '000000'),
('1440.10.04.01', 'ardhiani', '000000'),
('1440.10.05.01', 'suhawa', '000000'),
('1440.10.05.03', 'fajarudin ', '000000'),
('1440.10.06.01', ' pradana', '000000'),
('1440.10.06.03', 'haikal ', '000000'),
('1440.11.01.04', 'yazid', '000000'),
('1440.11.02.04', 'riswan', '000000'),
('1440.11.03.04', 'gunawan', '000000'),
('271295', 'farrasmaruf', 'farrasmuhammad'),
('272727', 'alba', 'yayah31'),
('870', 'putra', '111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`noid`);

--
-- Indexes for table `kegiatan-divisi`
--
ALTER TABLE `kegiatan-divisi`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `stepchecker`
--
ALTER TABLE `stepchecker`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`nopengajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`noid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
