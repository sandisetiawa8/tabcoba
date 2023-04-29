-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Apr 2023 pada 08.08
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabungan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(10) NOT NULL,
  `nis` int(30) NOT NULL,
  `tgl` date NOT NULL,
  `setoran` int(15) NOT NULL,
  `penarikan` int(15) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `nis`, `tgl`, `setoran`, `penarikan`, `jenis`) VALUES
(1, 20100083, '2023-03-20', 0, 100000, 'TR'),
(2, 20100084, '2023-03-20', 150000, 0, 'ST'),
(3, 20100084, '2023-03-20', 100000, 0, 'ST'),
(4, 20100083, '2023-03-21', 200000, 0, 'ST'),
(5, 20100084, '2023-03-21', 0, 100000, 'TR'),
(6, 20100084, '2023-03-21', 0, 30000, 'TR'),
(9, 20100082, '2023-03-21', 10000, 0, 'ST'),
(10, 20100083, '2023-03-26', 200000, 0, 'ST'),
(11, 20100083, '2023-03-27', 10000, 0, 'ST'),
(12, 20100083, '2023-03-27', 0, 10000, 'TR'),
(13, 20100040, '2023-03-27', 100000, 0, 'ST'),
(14, 20100084, '2023-03-27', 50000, 0, 'ST'),
(15, 20100090, '2023-03-30', 100000, 0, 'ST'),
(16, 20100085, '2023-03-30', 100000, 0, 'ST'),
(17, 20100085, '2023-03-30', 0, 50000, 'TR'),
(18, 20100083, '2023-03-30', 15000, 0, 'ST'),
(19, 20100084, '2023-03-30', 0, 20000, 'TR'),
(20, 20100086, '2023-03-30', 200000, 0, 'ST'),
(21, 20100081, '2023-03-31', 100000, 0, 'ST'),
(22, 20100083, '2023-04-02', 100000, 0, 'ST'),
(23, 20100081, '2023-04-02', 100000, 0, 'ST'),
(24, 20100083, '2023-04-02', 0, 50000, 'TR'),
(25, 20100083, '2023-04-02', 0, 10000, 'TR'),
(26, 20100084, '2023-04-02', 0, 10000, 'TR'),
(27, 20100083, '2023-04-02', 0, 10000, 'TR'),
(28, 20100081, '2023-04-02', 0, 10000, 'TR'),
(29, 20100081, '2023-04-02', 5000, 0, 'ST'),
(30, 20100083, '2023-04-27', 0, 0, 'TR'),
(31, 20100070, '2023-04-27', 10000, 0, 'ST'),
(32, 20100069, '2023-04-27', 15000, 0, 'ST'),
(33, 20100069, '2023-04-27', 20000, 0, 'ST'),
(34, 20100091, '0000-00-00', 0, 0, ''),
(35, 20100092, '0000-00-00', 0, 0, ''),
(36, 20100094, '0000-00-00', 0, 0, ''),
(37, 0, '0000-00-00', 0, 0, ''),
(38, 20100061, '0000-00-00', 0, 0, ''),
(39, 20100062, '0000-00-00', 0, 0, ''),
(40, 20100063, '0000-00-00', 0, 0, ''),
(41, 20100064, '0000-00-00', 0, 0, ''),
(42, 20100065, '0000-00-00', 0, 0, ''),
(43, 20100066, '0000-00-00', 0, 0, ''),
(44, 20100067, '0000-00-00', 0, 0, ''),
(45, 20100068, '0000-00-00', 0, 0, ''),
(46, 20100069, '0000-00-00', 0, 0, ''),
(47, 20100070, '0000-00-00', 0, 0, ''),
(48, 0, '0000-00-00', 0, 0, ''),
(49, 20100061, '0000-00-00', 0, 0, ''),
(50, 20100062, '0000-00-00', 0, 0, ''),
(51, 20100063, '0000-00-00', 0, 0, ''),
(52, 20100064, '0000-00-00', 0, 0, ''),
(53, 20100065, '0000-00-00', 0, 0, ''),
(54, 20100066, '0000-00-00', 0, 0, ''),
(55, 20100067, '0000-00-00', 0, 0, ''),
(56, 20100068, '0000-00-00', 0, 0, ''),
(57, 20100069, '0000-00-00', 0, 0, ''),
(58, 20100070, '0000-00-00', 0, 0, ''),
(59, 20100062, '2023-04-27', 10000, 0, 'ST'),
(60, 20100082, '2023-04-27', 10000, 0, 'ST'),
(61, 20100062, '2023-04-27', 20000, 0, 'ST'),
(62, 20100062, '2023-04-27', 20000, 0, 'ST'),
(63, 20100062, '2023-04-27', 10000, 0, 'ST'),
(64, 20100081, '2023-04-27', 0, 1000, 'TR'),
(65, 20100083, '2023-04-27', 0, 10000, 'TR'),
(66, 20100062, '2023-04-27', 1000, 0, 'ST'),
(67, 20100066, '2023-04-27', 10000, 0, 'ST'),
(68, 20100063, '2023-04-27', 10000, 0, 'ST'),
(69, 20100062, '2023-04-27', 0, 1000, 'TR'),
(70, 20100062, '2023-04-27', 0, 1000, 'TR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'sandi', 1, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ortu`
--

CREATE TABLE `ortu` (
  `id` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pek_ayah` varchar(50) NOT NULL,
  `pek_ibu` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ortu`
--

INSERT INTO `ortu` (`id`, `nis`, `ayah`, `ibu`, `alamat`, `pek_ayah`, `pek_ibu`, `no_hp`) VALUES
(1, 20100083, 'Sarwaji Maulana, S.Kom', 'Sarni Maulina, S.Kom', 'Jl Raya Gadingrejo Utara', 'Karyawan Swasta', 'Ibu Rumah Tangga', '085698829929'),
(2, 20100084, 'Hi Sarmanan Haji', 'Sakinah Naina m', 'Jl Raya Gadingrejo', 'Karyawan negeri', 'Ibu rumah tangga', '082176672381'),
(3, 20100062, 'Maulana Sil', 'Silappp', 'Jl Raya Gunung Rejo No 18', 'Petani', 'Ibu rumah tangga', '08227292019819');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nis` int(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` varchar(20) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `nis`, `password`, `image`, `role_id`, `date_created`, `tmp_lahir`, `tgl_lahir`, `jk`, `alamat`, `agama`, `kelas`) VALUES
(1, 'Sandi Setiawan', 'sandi@gmail.com', 201000800, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEqi2QCHBT4T2', 'iconprofile22.png', 1, '1674188427', 'Marambung', '2008-02-05', 'Laki-Laki', 'Jl Raya kedondong', 'Islam', 6),
(2, 'Sandi Setiawan', 'sandi2@gmail.com', 20100083, '$2y$10$CrwWDHhkuaKjnHuZCs/DXu02H5ztWuin8oxxTTXRC8kDAAj/05wre', 'iconprofile23.png', 2, '1674189646', 'Marambung', '2008-02-06', 'Laki-Laki', 'Jl Raya kedondong Rt 04', 'Islam', 6),
(3, 'Dila Anggita', 'dila21p@gmail.com', 20100082, '$2y$10$aVpJ09TD9cwXO1k1xxT6y.L9mTJNXwxLE5xYcPLj85iHexpLMR1jK', 'default.jpg', 2, '1674279758', 'Tanggerang', '2007-02-14', 'Perempuan', 'Jl Raya Raden Saleh No 17', 'Islam', 6),
(4, 'Riki Yansyah', 'riki210ap@gmail.com', 20100081, '$2y$10$LMjUBymYnl7.w3HoquWyG.usOEuhW/ymR4gS4UMSijxeQNsyKChrO', 'default.jpg', 2, '1675352048', 'Bandung', '2008-01-22', 'Laki-Laki', 'Jl Raden Intan Wonodadi', 'Islam', 6),
(5, 'Zawil Istani', 'zawil@gmail.com', 20100084, '$2y$10$9Ees2cHSIs4kC57xNVHo1O0hmExMkqylm/jYBcy6cwFjj4xogx1pG', 'default.jpg', 2, '1679321802', 'Jakarta', '2008-02-10', '', 'Jl Raya Raden Intan Gadingrejo', 'Islam', 6),
(6, 'Santi Ameliasari', 'santi@gmail.com', 20100085, '$2y$10$2T0pZPa8pMyUcYQ6OtvyAuxlCmhVf.K9f9CPkk8mhrtEyv9V25I3y', 'default.jpg', 2, '1680137004', 'Tasik Malaya', '2007-12-12', 'Perempuan', 'Jl Raya Gadingrejo', 'Islam', 5),
(7, 'Sarah', 'sarah@gmail.com', 20100086, '$2y$10$Om.e4Uyp1ayhl1nJKVLwM.ADDB.OuyitbOEnV2p9YW26p5M835pCu', 'default.jpg', 2, '1680138082', 'Bogor', '2008-02-05', 'Perempuan', 'Jl Raya Wates', 'Islam', 5),
(8, 'Guru Kelas 5', 'guru5@gmail.com', 201000999, '$2y$10$ekP5kFmhpxxiVc6k8xCON.Foxr446lFB2k5sVYcH5OUIK3l/aeS.2', 'default.jpg', 1, '1680250568', '', '0000-00-00', '', '', 'Islam', 5),
(9, 'Saminah', 'saminah@gmail.com', 20100091, '$2y$10$x6OgOy0T1mQ1.pUESYeFUewAmzb5MJ64w.cpm812d/r2sunC7VmsW', 'default.jpg', 2, '1682591110', '', '0000-00-00', '', '', 'Islam', 6),
(10, 'Rizkia', 'Rizkia@gmail.com', 20100092, '$2y$10$PGTU2zaSk0KE7I77NPAqnup0yB8Y2z9.dq7bn6wusBQokR6wx2x2e', 'default.jpg', 2, '1682596449', '', '0000-00-00', '', '', 'Islam', 6),
(12, 'Mainum', 'mainem@gmail.com', 20100094, '$2y$10$sMFkTMSuI8SITKym1CU/WuSX1HIIWQjHduu4Ug5I38U5PsvdyrARW', 'default.jpg', 2, '1682596922', '', '0000-00-00', '', '', 'Islam', 6),
(46, 'Nama ', 'Email', 0, 'Password', 'Image', 0, 'date_created', 'Tempat lahir', '0000-00-00', 'jenis kelamin', 'alamat', 'agama', 0),
(47, 'Sarah Anjani', 'sarah2@gmail.com', 20100061, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Jakarta', '0000-00-00', 'Perempuan', 'Jl raden intan No 20 desa gadingrejo', 'Islam', 6),
(48, 'Anis Mukaromah', 'anisa@gmail.com', 20100062, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Jakarta Selatan', '2005-04-08', 'Perempuan', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'Islam', 6),
(49, 'Aulia Anisa', 'aulia@gmail.com', 20100063, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Bandung', '0000-00-00', 'Laki-laki', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'islam', 6),
(50, 'Milna Wati', 'milna@gmail.com', 20100064, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Semarang', '0000-00-00', 'Laki-laki', 'Jl raden intan No 20 desa gadingrejo', 'islam', 6),
(51, 'Fildin', 'fildin@gmail.com', 20100065, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Lampung', '0000-00-00', 'Laki-laki', 'Jl raden intan No 20 desa gadingrejo', 'islam', 6),
(52, 'Anisa Hundiani', 'anisaHundiani@gmail.com', 20100066, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Gadingrejo', '0000-00-00', 'Laki-laki', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'islam', 6),
(53, 'Azahra', 'azahra@gmail.com', 20100067, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Pingsewu', '0000-00-00', 'Laki-laki', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'islam', 6),
(54, 'Santoso', 'Santoso@gmail.com', 20100068, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Pesawaran', '0000-00-00', 'Perempuan', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'islam', 6),
(55, 'Farida', 'farida@gmail.com', 20100069, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Waylima', '0000-00-00', 'Perempuan', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'islam', 6),
(56, 'Vika', 'Vika289@gmail.com', 20100070, '$2y$10$rcJRkHfB.NVassPUsJ6Gmu7NqmJziHeIQjlGjqbSLEq...', 'default.jpg', 2, '1674188427', 'Kedondong', '0000-00-00', 'Perempuan', 'Jl Raya Pampangan, Kecamatan Padang ratu', 'islam', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'verifikator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'dila21p@gmail.com', 'dz9pqLkFKRJKQrBIidf4vizfxhsqXno2aulIQtGZbtI=', 1674306130),
(10, 'dila21p@gmail.com', 'cdvNhYTrRuZOoMHQLG1sgvOxAqnc9xo2/nTxc7q3Qgk=', 1674306296),
(11, 'dila21p@gmail.com', 'vtD4LI0iLgBjEKMowCslXRrjpXrihh77v79bq5rg18Y=', 1674306509),
(12, 'dila21p@gmail.com', 'QfU8G0EeQ9k/UhpsZgmJ9+OfUprFumtBgp8D8Axdh3g=', 1674306676),
(13, 'dila21p@gmail.com', 'lLphYcejP+MGaKLWP4y64iAJHh8rw74c/I2EPc7E9OM=', 1674315230),
(14, 'dila21p@gmail.com', 'eKiPF4/zZnUUn41jiXqlKKJRpiEKyeA8FOdy5xvfYPg=', 1674315235),
(16, 'arafik1p@gmail.com', 'nPRdjB9Rcs1MxuFvHyl+CWjIPp2v3sNoYkJAU6nczoE=', 1674827786),
(17, 'arafik1p@gmail.com', 'pthfopa43VIzPl/hNVX30ohD5lGcuD8w3GyZgTIjc50=', 1674827790),
(18, 'arafik1p@gmail.com', 'ZhUJ7UGb/OQRUwGYacQCK2ey0+XCBtR6067lokxukL0=', 1674827901),
(19, 'arafik1p@gmail.com', 'u2IyDdXLPc9Q4MbyLE9rgSbK7xDIiQzabtewpi7qCLk=', 1674960644),
(20, 'arafik1p@gmail.com', 'QfGrhLz2wx7aaoNT2nvPGqmdORoNfy6CuSz3gui/bs0=', 1675002133),
(21, 'dila21p@gmail.com', 'FPnG+FcWs6g3GqXTOJmofLTCwPmh/OrwsZaoudlLRj4=', 1675002453),
(22, 'Khususkuliah1p@gmail.com', 'X6iqj4ww1CPR0bFFCl1fi9lwY+TqVSOK7EP50zYGNeI=', 1675317982),
(23, 'khususksuliah1p@gmail.com', 'sj5zJobUcWNB0JXwyRTgJ5aDb2Z75vY6A11JkD0Su0Y=', 1675318382),
(24, 'sandi1@gmail.com', 'l4IkjK1e6V91E2qZOozDyn6y+3EBdn96nIRa1g6cjlU=', 1675343809),
(25, 'sandi24@gmail.com', 'dwVtakKZ2B/lXgGJ+25mC6xbchJDQYbMejewC3o1l3s=', 1675344067),
(26, 'arafik1p@gmail.com', 'F4JGJr1N6+hu/iH1WIsxvof67DYbEOj2rFzhnoUF22o=', 1675347756),
(27, 'dila21p@gmail.com', '+qx59TSQqlyKt44P73awR5vPbkfTYUT8yryEGxwtTCw=', 1675350374),
(28, 'arafik1p@gmail.com', '7My/X/y/gAnWvosTs144awstD3zZRJiP7v8pIUD9q4s=', 1675351135),
(29, 'dila21p@gmail.com', 'xqsCHls4J3lPnw96YeyRzgOKqi7GG6MGZkYHjaoh9WM=', 1675351170),
(32, 'dila21p@gmail.com', 'dIUR6utTKlTCPQ/FxYtSsvri0xlixC9NRZmV/jZmW44=', 1675351549),
(33, 'sandi5@gmail.com', 'Yb931KMKkzEEYcWfEDgKkH5l7yIVB7ng5fLcYxT6JSQ=', 1675351582),
(34, 'sandi@gmail.com', 'QzF+NDanYaK9f1jHDC6mXRxxU28tSfmRB8QMbkKk1KQ=', 1675351653),
(35, 'sandi@gmail.com', '1SgEjKCqaE3nobvimjWboXu+W5rjfdrLCVQ6M8Yiuck=', 1675351793),
(36, 'sandi@gmail.com', 'QqDj8VmHVjOBS1NWe4NcXLij4OPk3mbU/lTNe7p0o+Y=', 1675351860),
(38, 'riki210ap@gmail.com', 'swi6icAspxlP89OFvEKHin6RRcGGT45MZaIkuoPmrO4=', 1675352220),
(39, 'sandiutama2p@gmal.com', 'ebOOEmhAdIEcdT3691S/Z5BdNKlNe5K63hRi7Xj5Yj0=', 1679318784);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
