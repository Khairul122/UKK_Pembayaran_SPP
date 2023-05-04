-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2023 pada 17.13
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id_detail_pembayaran` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_detail_pembayaran`, `id_pembayaran`, `bulan`, `tahun`, `keterangan`, `tgl_bayar`, `nominal`, `id_petugas`) VALUES
(519, 124, 7, 2023, 'Juli 2023', '2023-04-29', 100000, 1),
(520, 124, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(521, 124, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(522, 124, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(523, 124, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(524, 124, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(525, 124, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(526, 124, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(527, 124, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(528, 124, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(529, 124, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(530, 124, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(531, 125, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(532, 125, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(533, 125, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(534, 125, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(535, 125, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(536, 125, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(537, 125, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(538, 125, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(539, 125, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(540, 125, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(541, 125, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(542, 125, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(543, 126, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(544, 126, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(545, 126, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(546, 126, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(547, 126, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(548, 126, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(549, 126, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(550, 126, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(551, 126, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(552, 126, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(553, 126, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(554, 126, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(555, 127, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(556, 127, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(557, 127, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(558, 127, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(559, 127, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(560, 127, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(561, 127, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(562, 127, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(563, 127, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(564, 127, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(565, 127, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(566, 127, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(567, 128, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(568, 128, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(569, 128, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(570, 128, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(571, 128, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(572, 128, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(573, 128, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(574, 128, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(575, 128, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(576, 128, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(577, 128, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(578, 128, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(579, 129, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(580, 129, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(581, 129, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(582, 129, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(583, 129, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(584, 129, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(585, 129, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(586, 129, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(587, 129, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(588, 129, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(589, 129, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(590, 129, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(591, 130, 7, 2023, 'Juli 2023', '2023-04-29', 100000, 1),
(592, 130, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(593, 130, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(594, 130, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(595, 130, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(596, 130, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(597, 130, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(598, 130, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(599, 130, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(600, 130, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(601, 130, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(602, 130, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(603, 131, 7, 2023, 'Juli 2023', '2023-04-29', 100000, 1),
(604, 131, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(605, 131, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(606, 131, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(607, 131, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(608, 131, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(609, 131, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(610, 131, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(611, 131, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(612, 131, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(613, 131, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(614, 131, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(615, 132, 7, 2023, 'Juli 2023', '2023-04-30', 100000, 1),
(616, 132, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(617, 132, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(618, 132, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(619, 132, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(620, 132, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(621, 132, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(622, 132, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(623, 132, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(624, 132, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(625, 132, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(626, 132, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(627, 133, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(628, 133, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(629, 133, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(630, 133, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(631, 133, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(632, 133, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(633, 133, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(634, 133, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(635, 133, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(636, 133, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(637, 133, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(638, 133, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(639, 134, 7, 2023, 'Juli 2023', '2023-04-30', 100000, 1),
(640, 134, 8, 2023, 'Agustus 2023', '2023-04-30', 100000, 1),
(641, 134, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(642, 134, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(643, 134, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(644, 134, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(645, 134, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(646, 134, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(647, 134, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(648, 134, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(649, 134, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(650, 134, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(651, 135, 7, 2023, 'Juli 2023', '2023-04-30', 100000, 1),
(652, 135, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(653, 135, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(654, 135, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(655, 135, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(656, 135, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(657, 135, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(658, 135, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(659, 135, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(660, 135, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(661, 135, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(662, 135, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(663, 136, 7, 2023, 'Juli 2023', '2023-04-30', 100000, 1),
(664, 136, 8, 2023, 'Agustus 2023', '2023-04-30', 100000, 1),
(665, 136, 9, 2023, 'September 2023', '2023-04-30', 100000, 1),
(666, 136, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(667, 136, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(668, 136, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(669, 136, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(670, 136, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(671, 136, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(672, 136, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(673, 136, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(674, 136, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(675, 137, 7, 2023, 'Juli 2023', '2023-04-30', 100000, 1),
(676, 137, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(677, 137, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(678, 137, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(679, 137, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(680, 137, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(681, 137, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(682, 137, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(683, 137, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(684, 137, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(685, 137, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(686, 137, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(687, 138, 7, 2023, 'Juli 2023', '0000-00-00', 100000, 0),
(688, 138, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(689, 138, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(690, 138, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(691, 138, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(692, 138, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(693, 138, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(694, 138, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(695, 138, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(696, 138, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(697, 138, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(698, 138, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(699, 139, 7, 2023, 'Juli 2023', '2023-04-30', 100000, 1),
(700, 139, 8, 2023, 'Agustus 2023', '2023-05-01', 100000, 1),
(701, 139, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(702, 139, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(703, 139, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(704, 139, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(705, 139, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(706, 139, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(707, 139, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(708, 139, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(709, 139, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(710, 139, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0),
(711, 140, 7, 2023, 'Juli 2023', '2023-05-01', 100000, 1),
(712, 140, 8, 2023, 'Agustus 2023', '0000-00-00', 100000, 0),
(713, 140, 9, 2023, 'September 2023', '0000-00-00', 100000, 0),
(714, 140, 10, 2023, 'Oktober 2023', '0000-00-00', 100000, 0),
(715, 140, 11, 2023, 'November 2023', '0000-00-00', 100000, 0),
(716, 140, 12, 2023, 'Desember 2023', '0000-00-00', 100000, 0),
(717, 140, 1, 2024, 'Januari 2024', '0000-00-00', 100000, 0),
(718, 140, 2, 2024, 'Pebruari 2024', '0000-00-00', 100000, 0),
(719, 140, 3, 2024, 'Maret 2024', '0000-00-00', 100000, 0),
(720, 140, 4, 2024, 'April 2024', '0000-00-00', 100000, 0),
(721, 140, 5, 2024, 'Mei 2024', '0000-00-00', 100000, 0),
(722, 140, 6, 2024, 'Juni 2024', '0000-00-00', 100000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_siswa`
--

CREATE TABLE `detail_siswa` (
  `id_detail_siswa` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_siswa`
--

INSERT INTO `detail_siswa` (`id_detail_siswa`, `nisn`, `id_kelas`, `id_spp`) VALUES
(73, '1111111111', 50, 128);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(3) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `nama_kelas` varchar(15) DEFAULT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `nama_kelas`, `id_unit`) VALUES
(48, 'X', 'IPA 1', 2),
(50, 'X', 'IPA 1', 3),
(51, 'X', 'IPA 2', 4),
(52, 'X', 'IPA 3', 5),
(53, 'X', 'IPA 4', 6),
(54, 'X', 'IPA 5', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_detail_siswa` int(11) DEFAULT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_detail_siswa`, `total_bayar`) VALUES
(140, 73, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama_petugas` varchar(45) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(40, 'Budi', 'budi', 'Budi', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(15) NOT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `nama_siswa` varchar(45) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(12) DEFAULT NULL,
  `total_tagihan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama_siswa`, `jenis_kelamin`, `alamat`, `no_telepon`, `total_tagihan`, `total_bayar`, `photo`) VALUES
('1111111111', '1111111111', 'AL-FAJRI', 'Laki-laki', 'KURANJI', '082145679090', 1200000, 100000, '010520232212227309681.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun_ajaran`, `nominal`) VALUES
(128, '2023/2024', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`) VALUES
(3, 'SMA 1 KARTIKA'),
(4, 'SMA 2 KARTIKA'),
(5, 'SMA 3 KARTIKA'),
(6, 'SMA 4 KARTIKA'),
(7, 'SMA 5 KARTIKA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id_detail_pembayaran`);

--
-- Indeks untuk tabel `detail_siswa`
--
ALTER TABLE `detail_siswa`
  ADD PRIMARY KEY (`id_detail_siswa`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id_detail_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=723;

--
-- AUTO_INCREMENT untuk tabel `detail_siswa`
--
ALTER TABLE `detail_siswa`
  MODIFY `id_detail_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
