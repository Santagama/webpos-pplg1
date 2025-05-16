-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Bulan Mei 2025 pada 01.16
-- Versi server: 8.0.30
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_codinglinepos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` varchar(100) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `stock` int NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `stock_minimal` int NOT NULL,
  `gambar` varchar(100) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama`, `telp`, `deskripsi`, `alamat`) VALUES
(2, 'PT. ABCD Perkasa Jaya', '081214940761', 'Distributor Makanan Ringan', 'Jakarta'),
(3, 'PT. DHEF', '081214940761', 'lorem', 'lorem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `level` int NOT NULL,
  `foto` varchar(100) NOT NULL
) ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `fullname`, `password`, `address`, `level`, `foto`) VALUES
(1, 'admin', 'Admin', '$2y$10$ZsbzHmcD2ZX./jBQBzhN9uKcl36G2yB2UsvIAe3rwzPAJHvGUSSLe', 'Majalengka', 1, '726-219986.png'),
(2, 'manager', 'Rayna Cindy Nazafarin', '$2y$10$I9iafzHofkDV4n/9CP8vDektv26yPtFG1DGeOcJ8sDYVSQeQXweUK', 'Majalengka', 2, '962-219969.png'),
(4, 'kasir', 'Raisya', '$2y$10$Bv8EpuWdsQVWlA9Es0XtJueBGYpftKINfH81gepAsOdJ1UETA23oi', 'lorem', 3, '913-3135715.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
