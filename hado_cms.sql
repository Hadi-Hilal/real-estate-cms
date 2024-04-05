-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2024 at 03:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hado_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `publish` enum('published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'published',
  `citizenship` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `visites` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(6087, 'Adrar', 112),
(6088, 'Awlaf', 112),
(6089, 'Rijan', 112),
(6090, 'Timimun', 112),
(6091, 'Hydra', 113),
(6092, 'Kouba', 113),
(6093, 'Annabah', 114),
(6094, 'Birrahhal', 114),
(6095, 'Saraydih', 114),
(6096, 'Sidi Amar', 114),
(6097, 'al-Buni', 114),
(6098, 'al-Hajar', 114),
(6099, '\'Abadlah', 115),
(6100, 'Bani Wanif', 115),
(6101, 'Bashshar', 115),
(6102, 'Qanadsan', 115),
(6103, 'Taghit', 115),
(6104, '\'Aris', 116),
(6105, '\'Ayn Tutah', 116),
(6106, 'Barikah', 116),
(6107, 'Batnah', 116),
(6108, 'Marwanah', 116),
(6109, 'Naghaus', 116),
(6110, 'Ra\'s-al-\'Ayun', 116),
(6111, 'Tazult', 116),
(6112, '\'Ayt Rizin', 117),
(6113, 'Akbu', 117),
(6114, 'Amizur', 117),
(6115, 'Barbasha', 117),
(6116, 'Bijayah', 117),
(6117, 'Farrawn', 117),
(6118, 'Ighram', 117),
(6119, 'Sadduk', 117),
(6120, 'Shamini', 117),
(6121, 'Sidi \'Aysh', 117),
(6122, 'Taskaryut', 117),
(6123, 'Tazmalt', 117),
(6124, 'Timazrit', 117),
(6125, 'Uz-al-Laqin', 117),
(6126, 'al-Qasr', 117),
(6127, 'Awlad Jallal', 118),
(6128, 'Biskrah', 118),
(6129, 'Sidi Khalid', 118),
(6130, 'Sidi Ukbah', 118),
(6131, 'Tulja', 118),
(6132, 'Um\'ash', 118),
(6133, 'Zaribat-al-Wad', 118),
(6134, 'Awlad Salam', 119),
(6135, 'Awlad Yaysh', 119),
(6136, 'Bani Khalil', 119),
(6137, 'Bani Marad', 119),
(6138, 'Bani Tamu', 119),
(6139, 'Blidah', 119),
(6140, 'Bu Arfa', 119),
(6141, 'Bufarik', 119),
(6142, 'Buinan', 119),
(6143, 'Buqara', 119),
(6144, 'Maftah', 119),
(6145, 'Muzayah', 119),
(6146, 'Shabli', 119),
(6147, 'Shari\'ah', 119),
(6148, 'Shiffa', 119),
(6149, 'Sidi Mussa', 119),
(6150, 'Suma', 119),
(6151, 'Wadi al-Allagh', 119),
(6152, 'al-\'Afrun', 119),
(6153, 'al-Arba\'a', 119),
(6154, '\'Ayn Bissim', 120),
(6155, 'Aghbalu', 120),
(6156, 'Bi\'r Ghabalu', 120),
(6157, 'Buirah', 120),
(6158, 'Lakhdariyah', 120),
(6159, 'Shurfa', 120),
(6160, 'Sur-al-Ghuzlan', 120),
(6161, '\'Ayn Tayah', 121),
(6162, 'Awlad Haddaj', 121),
(6163, 'Awlad Mussa', 121),
(6164, 'Bani Amran', 121),
(6165, 'Budwawu', 121),
(6166, 'Budwawu al-Bahri', 121),
(6167, 'Bumardas', 121),
(6168, 'Burj Minayal', 121),
(6169, 'Dalis', 121),
(6170, 'Hammadi', 121),
(6171, 'Issar', 121),
(6172, 'Khamis-al-Khashnah', 121),
(6173, 'Nasiriyah', 121),
(6174, 'Raghayah', 121),
(6175, 'Sa\'abat', 121),
(6176, 'Tinyah', 121),
(6177, 'al-Arba\'a Tash', 121),
(6178, 'ar-Ruwibah', 121),
(6179, 'Ammi Mussa', 123),
(6180, 'Ghalizan', 123),
(6181, 'Jidiwiyah', 123),
(6182, 'Mazunah', 123),
(6183, 'Sidi Muhammad Ban \'Ali', 123),
(6184, 'Wadi Rahiyu', 123),
(6185, 'Zammurah', 123),
(6186, 'Biryan', 124),
(6187, 'Bu Nura', 124),
(6188, 'Ghardaia', 124),
(6189, 'Ghardayah', 124),
(6190, 'Matlili', 124),
(6191, 'al-Ghuli\'ah', 124),
(6192, 'al-Qararah', 124),
(6193, 'Ilizi', 125),
(6194, 'Amir \'Abd-al-Qadar', 126),
(6195, 'Jijili', 126),
(6196, 'Shifka', 126),
(6197, 'Tahar', 126),
(6198, 'al-Miliyah', 126),
(6199, '\'Ayn Wissarah', 127),
(6200, '\'Ayn-al-Ibil', 127),
(6201, 'Birin', 127),
(6202, 'Dar Shiyukh', 127),
(6203, 'Hassi Bahbah', 127),
(6204, 'Jilfah', 127),
(6205, 'Mis\'ad', 127),
(6206, 'Sharif', 127),
(6207, 'al-Idrisiyah', 127),
(6208, 'Khanshalah', 128),
(6209, 'Sharshar', 128),
(6210, 'Tawziyanat', 128),
(6211, 'al-Mahmal', 128),
(6212, '\'Ayn-al-Hajal', 129),
(6213, '\'Ayn-al-Milh', 129),
(6214, 'Bu Sa\'adah', 129),
(6215, 'Hammam Dhala\'a', 129),
(6216, 'Ma\'adid', 129),
(6217, 'Maghra', 129),
(6218, 'Masilah', 129),
(6219, 'Sidi \'Aysa', 129),
(6220, 'Wanugha', 129),
(6221, '\'Ayn Bu Sif', 130),
(6222, 'Birwaghiyah', 130),
(6223, 'Midyah', 130),
(6224, 'Qasr-al-Bukhari', 130),
(6225, 'Shillalah', 130),
(6226, 'Tablat', 130),
(6227, 'Farjiwah', 131),
(6228, 'Milah', 131),
(6229, 'Qararam Quqa', 131),
(6230, 'Ruwashad', 131),
(6231, 'Salghum-al-\'Ayd', 131),
(6232, 'Sidi Maruf', 131),
(6233, 'Sidi Marwan', 131),
(6234, 'Tajananah', 131),
(6235, 'Talighmah', 131),
(6236, 'Wadi Athmaniyah', 131),
(6237, 'Bu Khanifiyah', 132),
(6238, 'Muaskar', 132),
(6239, 'Muhammadiyah', 132),
(6240, 'Siq', 132),
(6241, 'Tighinnif', 132),
(6242, 'Wadi al-Abtal', 132),
(6243, 'Zahana', 132),
(6244, '\'Ayn Tadalas', 133),
(6245, 'Hassi Mamash', 133),
(6246, 'Mazaghran', 133),
(6247, 'Mustaghanam', 133),
(6248, 'Sidi Ali', 133),
(6249, '\'Ayn Safra', 134),
(6250, 'Mishriyah', 134),
(6251, 'Naama', 134),
(6252, 'Oran', 135),
(6253, 'Ouargla', 136),
(6254, '\'Ayn Bardah', 137),
(6255, 'Bumahra Ahmad', 137),
(6256, 'Hamman Awlad \'Ali', 137),
(6257, 'Qalmah', 137),
(6258, 'Wadi Zinati', 137),
(6259, '\'Ayn Abid', 138),
(6260, '\'Ayn Samara', 138),
(6261, 'Didush Murad', 138),
(6262, 'Hamma Bu Ziyan', 138),
(6263, 'Qustantinah', 138),
(6264, 'Zighut Yusuf', 138),
(6265, 'al-Khurub', 138),
(6266, '\'Azzabah', 139),
(6267, 'Amjaz Adshish', 139),
(6268, 'Fil Fila', 139),
(6269, 'Karkira', 139),
(6270, 'Ramadan Jamal', 139),
(6271, 'Sakikdah', 139),
(6272, 'Shataybih', 139),
(6273, 'Tamalus', 139),
(6274, 'al-Harush', 139),
(6275, 'al-Qull', 139),
(6276, '\'Ayn \'Azl', 140),
(6277, '\'Ayn Arnat', 140),
(6278, '\'Ayn Taqrut', 140),
(6279, '\'Ayn Wilman', 140),
(6280, '\'Ayn-al-Khabira', 140),
(6281, 'Bouira', 140),
(6282, 'Buq\'ah', 140),
(6283, 'Salah Bay', 140),
(6284, 'Satif', 140),
(6285, 'Setif', 140),
(6286, 'Ziyama Mansuriyah', 140),
(6287, 'al-\'Ulmah', 140),
(6288, '\'Ayn-al-Hajar', 141),
(6289, 'Sayda\'', 141),
(6290, '\'Ayn Qazzan', 144),
(6291, '\'Ayn Salah', 144),
(6292, 'Tamanghasat', 144),
(6293, '\'Ayn Binyan', 145),
(6294, 'Bu Isma\'il', 145),
(6295, 'Bu Midfar\'ah', 145),
(6296, 'Damus', 145),
(6297, 'Duwirah', 145),
(6298, 'Hajut', 145),
(6299, 'Hammam Righa', 145),
(6300, 'Sawlah', 145),
(6301, 'Shiragha', 145),
(6302, 'Shirshall', 145),
(6303, 'Sidi Farj', 145),
(6304, 'Stawali', 145),
(6305, 'Tibazah', 145),
(6306, 'Ziralda', 145),
(6307, 'al-Qull\'ah', 145),
(6308, 'Bi\'r-al-\'Itir', 146),
(6309, 'Hammamat', 146),
(6310, 'Mursut', 146),
(6311, 'Shariyah', 146),
(6312, 'Tibissah', 146),
(6313, 'Winzah', 146),
(6314, 'al-\'Awaynat', 146),
(6315, 'Awlad Mimun', 147),
(6316, 'Bani Mastar', 147),
(6317, 'Bani Sikran', 147),
(6318, 'Ghazawat', 147),
(6319, 'Hannayah', 147),
(6320, 'Maghniyah', 147),
(6321, 'Nidruma', 147),
(6322, 'Ramsh', 147),
(6323, 'Sabra', 147),
(6324, 'Shatwan', 147),
(6325, 'Sibdu', 147),
(6326, 'Sidi \'Abdallah', 147),
(6327, 'Tilimsan', 147),
(6328, 'al-Mansurah', 147),
(6329, 'Tinduf', 148),
(6330, 'Thaniyat-al-Had', 149),
(6331, 'Tisamsilt', 149),
(6332, '\'Ayn Dhahab', 150),
(6333, 'Firindah', 150),
(6334, 'Mahdiyah', 150),
(6335, 'Mashra\'a Asfa', 150),
(6336, 'Qasr Shillalah', 150),
(6337, 'Rahuyah', 150),
(6338, 'Sughar', 150),
(6339, 'Takhamarat', 150),
(6340, 'Tiyarat', 150),
(6341, '\'Ayn Bayda', 152),
(6342, '\'Ayn Fakrun', 152),
(6343, '\'Ayn Kirshah', 152),
(6344, '\'Ayn Malilah', 152),
(6345, 'Bi\'r Shuhada', 152),
(6346, 'Miskyanah', 152),
(6347, 'Shamurah', 152),
(6348, 'Umm-al-Bawaghi', 152),
(6349, '\'Ayn Biya', 153),
(6350, '\'Ayn-at-Turk', 153),
(6351, 'Arzu', 153),
(6352, 'Bi\'r-al-Jir', 153),
(6353, 'Butlilis', 153),
(6354, 'Hassi Bu Nif', 153),
(6355, 'Mars-al-Kabir', 153),
(6356, 'Qadayal', 153),
(6357, 'Sidi ash-Shami', 153),
(6358, 'Wadi Thalatha', 153),
(6359, 'Wahran', 153),
(6360, 'al-Ansur', 153),
(6361, 'as-Saniyah', 153),
(6362, 'Hassi Mas\'ud', 154),
(6363, 'Nazla', 154),
(6364, 'Ruwisiyat', 154),
(6365, 'Tabisbast', 154),
(6366, 'Tamalhat', 154),
(6367, 'Tamasin', 154),
(6368, 'Tayabat-al-Janubiyah', 154),
(6369, 'Tughghurt', 154),
(6370, 'Warqla', 154),
(6371, 'al-Hajirah', 154),
(6372, 'Aflu', 158),
(6373, 'Hassi al-Raml', 158),
(6374, 'al-Aghwat', 158),
(6375, 'Brizyanah', 159),
(6376, 'al-Abyad Sidi Shaykh', 159),
(6377, 'al-Bayadh', 159),
(6378, 'Bab Azwar', 160),
(6379, 'Baraki', 160),
(6380, 'Bir Murad Rais', 160),
(6381, 'Birkhadam', 160),
(6382, 'Burj-al-Kiffan', 160),
(6383, 'Dar-al-Bayda', 160),
(6384, 'al-Jaza\'ir', 160),
(6385, 'Bayadha', 161),
(6386, 'Dabilah', 161),
(6387, 'Hassan \'Abd-al-Karim', 161),
(6388, 'Hassi Halifa', 161),
(6389, 'Jama\'a', 161),
(6390, 'Maqran', 161),
(6391, 'Qamar', 161),
(6392, 'Raqiba', 161),
(6393, 'Rubbah', 161),
(6394, 'Sidi Amran', 161),
(6395, 'al-Mighair', 161),
(6396, 'al-Wad', 161),
(6397, '\'Ayn Maran', 162),
(6398, 'Abu al-Hassan', 162),
(6399, 'Bani Hawa', 162),
(6400, 'Bu Qadir', 162),
(6401, 'Sidi Ukaskah', 162),
(6402, 'Tanas', 162),
(6403, 'Wadi Sali', 162),
(6404, 'Wadi al-Fiddah', 162),
(6405, 'ash-Shalif', 162),
(6406, 'ash-Shattiyah', 162),
(6407, 'Ban Mahdi', 163),
(6408, 'Bani Amar', 163),
(6409, 'Basbas', 163),
(6410, 'Dariyan', 163),
(6411, 'Saba\'ita Muk', 163),
(6412, 'al-Qal\'ah', 163),
(6413, 'at-Tarif', 163),
(39667, 'Ilan', 3478),
(39668, 'Lotung', 3478),
(39669, 'Suao', 3478),
(39670, 'Toucheng', 3478),
(39695, 'Dali', 3489),
(39696, 'South District', 3489),
(39697, 'Ta-Ya Shang', 3489),
(39698, 'Dali', 3490),
(39699, 'South District', 3490),
(39700, 'Ta-Ya Shang', 3490),
(39714, 'Hsilo', 3499),
(39715, 'Huwei', 3499),
(39716, 'Peikang', 3499),
(39717, 'Touliu', 3499),
(39718, 'Tounan', 3499),
(39719, 'Tuku', 3499),
(40253, 'Adana', 3663),
(40254, 'Aladag', 3663),
(40255, 'Ceyhan', 3663),
(40256, 'Feke', 3663),
(40257, 'Imamoglu', 3663),
(40258, 'Karaisali', 3663),
(40259, 'Karatas', 3663),
(40260, 'Kozan', 3663),
(40261, 'Pozanti', 3663),
(40262, 'Saimbeyli', 3663),
(40263, 'Tufanbeyli', 3663),
(40264, 'Yumurtalik', 3663),
(40265, 'Adiyaman', 3664),
(40266, 'Besni', 3664),
(40267, 'Celikhan', 3664),
(40268, 'Gerger', 3664),
(40269, 'Golbasi', 3664),
(40270, 'Kahta', 3664),
(40271, 'Samsat', 3664),
(40272, 'Sincik', 3664),
(40273, 'Tut', 3664),
(40274, 'Afyonkarahisar', 3665),
(40275, 'Basmakci', 3665),
(40276, 'Bayat', 3665),
(40277, 'Bolvadin', 3665),
(40278, 'Cay', 3665),
(40279, 'Dazkiri', 3665),
(40280, 'Dinar', 3665),
(40281, 'Emirdag', 3665),
(40282, 'Evciler', 3665),
(40283, 'Hocalar', 3665),
(40284, 'Ihsaniye', 3665),
(40285, 'Iscehisar', 3665),
(40286, 'Kiziloren', 3665),
(40287, 'Sandikli', 3665),
(40288, 'Sincanli', 3665),
(40289, 'Suhut', 3665),
(40290, 'Sultandagi', 3665),
(40291, 'Diyadin', 3666),
(40292, 'Dogubeyazit', 3666),
(40293, 'Eleskirt', 3666),
(40294, 'Hamur', 3666),
(40295, 'Karakose', 3666),
(40296, 'Patnos', 3666),
(40297, 'Taslicay', 3666),
(40298, 'Tutak', 3666),
(40299, 'Agacoren', 3667),
(40300, 'Aksaray', 3667),
(40301, 'Eskil', 3667),
(40302, 'Gulagac', 3667),
(40303, 'Guzelyurt', 3667),
(40304, 'Ortakoy', 3667),
(40305, 'Sariyahsi', 3667),
(40306, 'Amasya', 3668),
(40307, 'Goynucek', 3668),
(40308, 'Gumushacikoy', 3668),
(40309, 'Hamamozu', 3668),
(40310, 'Merzifon', 3668),
(40311, 'Suluova', 3668),
(40312, 'Tasova', 3668),
(40313, 'Akyurt', 3669),
(40314, 'Ankara', 3669),
(40315, 'Ayas', 3669),
(40316, 'Beypazari', 3669),
(40317, 'Camlidere', 3669),
(40318, 'Cubuk', 3669),
(40319, 'Elmadag', 3669),
(40320, 'Evren', 3669),
(40321, 'Gudul', 3669),
(40322, 'Haymana', 3669),
(40323, 'Kalecik', 3669),
(40324, 'Kazan', 3669),
(40325, 'Kizilcahamam', 3669),
(40326, 'Nallihan', 3669),
(40327, 'Polatli', 3669),
(40328, 'Sereflikochisar', 3669),
(40329, 'Yenisehir', 3669),
(40330, 'Akseki', 3670),
(40331, 'Alanya', 3670),
(40332, 'Antalya', 3670),
(40333, 'Elmali', 3670),
(40334, 'Finike', 3670),
(40335, 'Gazipasa', 3670),
(40336, 'Gundogmus', 3670),
(40337, 'Ibradi', 3670),
(40338, 'Kale', 3670),
(40339, 'Kas', 3670),
(40340, 'Kemer', 3670),
(40341, 'Konya', 3670),
(40342, 'Korkuteli', 3670),
(40343, 'Kumluca', 3670),
(40344, 'Manavgat', 3670),
(40345, 'Serik', 3670),
(40346, 'Ardahan', 3671),
(40347, 'Damal', 3671),
(40348, 'Gole', 3671),
(40349, 'Hanak', 3671),
(40350, 'Posof', 3671),
(40351, 'Ardanuc', 3672),
(40352, 'Arhavi', 3672),
(40353, 'Artvin', 3672),
(40354, 'Borcka', 3672),
(40355, 'Hopa', 3672),
(40356, 'Murgul', 3672),
(40357, 'Savsat', 3672),
(40358, 'Yusufeli', 3672),
(40359, 'Aydin', 3673),
(40360, 'Bozdogan', 3673),
(40361, 'Buharkent', 3673),
(40362, 'Cine', 3673),
(40363, 'Didim', 3673),
(40364, 'Germencik', 3673),
(40365, 'Incirliova', 3673),
(40366, 'Karacasu', 3673),
(40367, 'Karpuzlu', 3673),
(40368, 'Kocarli', 3673),
(40369, 'Kosk', 3673),
(40370, 'Kusadasi', 3673),
(40371, 'Kuyucak', 3673),
(40372, 'Nazilli', 3673),
(40373, 'Soke', 3673),
(40374, 'Sultanhisar', 3673),
(40375, 'Yenipazar', 3673),
(40376, 'Ayvalik', 3674),
(40377, 'Balikesir', 3674),
(40378, 'Balya', 3674),
(40379, 'Bandirma', 3674),
(40380, 'Bigadic', 3674),
(40381, 'Burhaniye', 3674),
(40382, 'Dursunbey', 3674),
(40383, 'Edremit', 3674),
(40384, 'Erdek', 3674),
(40385, 'Gomec', 3674),
(40386, 'Gonen', 3674),
(40387, 'Havran', 3674),
(40388, 'Ivrindi', 3674),
(40389, 'Kepsut', 3674),
(40390, 'Manyas', 3674),
(40391, 'Marmara', 3674),
(40392, 'Sakarya', 3674),
(40393, 'Savastepe', 3674),
(40394, 'Sindirgi', 3674),
(40395, 'Susurluk', 3674),
(40396, 'Amasra', 3675),
(40397, 'Bartin', 3675),
(40398, 'Kurucasile', 3675),
(40399, 'Ulus', 3675),
(40400, 'Batman', 3676),
(40401, 'Besiri', 3676),
(40402, 'Gercus', 3676),
(40403, 'Hasankeyf', 3676),
(40404, 'Kozluk', 3676),
(40405, 'Sason', 3676),
(40406, 'Aydintepe', 3677),
(40407, 'Bayburt', 3677),
(40408, 'Demirozu', 3677),
(40409, 'Bilecik', 3678),
(40410, 'Bozuyuk', 3678),
(40411, 'Golpazari', 3678),
(40412, 'Inhisar', 3678),
(40413, 'Osmaneli', 3678),
(40414, 'Pazaryeri', 3678),
(40415, 'Sogut', 3678),
(40416, 'Yenipazar', 3678),
(40417, 'Adakli', 3679),
(40418, 'Bingol', 3679),
(40419, 'Genc', 3679),
(40420, 'Karliova', 3679),
(40421, 'Kigi', 3679),
(40422, 'Solhan', 3679),
(40423, 'Yayladere', 3679),
(40424, 'Yedisu', 3679),
(40425, 'Adilcevaz', 3680),
(40426, 'Ahlat', 3680),
(40427, 'Bitlis', 3680),
(40428, 'Guroymak', 3680),
(40429, 'Hizan', 3680),
(40430, 'Mutki', 3680),
(40431, 'Tatvan', 3680),
(40432, 'Akcakoca', 3681),
(40433, 'Bolu', 3681),
(40434, 'Dortdivan', 3681),
(40435, 'Gerede', 3681),
(40436, 'Goynuk', 3681),
(40437, 'Kibriscik', 3681),
(40438, 'Mengen', 3681),
(40439, 'Mudurnu', 3681),
(40440, 'Seben', 3681),
(40441, 'Yenicaga', 3681),
(40442, 'Aglasun', 3682),
(40443, 'Altinyayla', 3682),
(40444, 'Bucak', 3682),
(40445, 'Burdur', 3682),
(40446, 'Golhisar', 3682),
(40447, 'Karamanli', 3682),
(40448, 'Kemer', 3682),
(40449, 'Tefenni', 3682),
(40450, 'Yesilova', 3682),
(40451, 'Bursa', 3683),
(40452, 'Buyukorhan', 3683),
(40453, 'Gemlik', 3683),
(40454, 'Gursu', 3683),
(40455, 'Harmancik', 3683),
(40456, 'Inegol', 3683),
(40457, 'Iznik', 3683),
(40458, 'Karacabey', 3683),
(40459, 'Keles', 3683),
(40460, 'Kestel', 3683),
(40461, 'Mudanya', 3683),
(40462, 'Mustafakemalpasa', 3683),
(40463, 'Orhaneli', 3683),
(40464, 'Orhangazi', 3683),
(40465, 'Yenisehir', 3683),
(40466, 'Ayvacik', 3684),
(40467, 'Bayramic', 3684),
(40468, 'Biga', 3684),
(40469, 'Bozcaada', 3684),
(40470, 'Can', 3684),
(40471, 'Canakkale', 3684),
(40472, 'Eceabat', 3684),
(40473, 'Ezine', 3684),
(40474, 'Gelibolu', 3684),
(40475, 'Gokceada', 3684),
(40476, 'Lapseki', 3684),
(40477, 'Yenice', 3684),
(40478, 'Atkaracalar', 3685),
(40479, 'Bayramoren', 3685),
(40480, 'Cankiri', 3685),
(40481, 'Cerkes', 3685),
(40482, 'Eldivan', 3685),
(40483, 'Ilgaz', 3685),
(40484, 'Kizilirmak', 3685),
(40485, 'Korgun', 3685),
(40486, 'Kursunlu', 3685),
(40487, 'Orta', 3685),
(40488, 'Sabanozu', 3685),
(40489, 'Yaprakli', 3685),
(40490, 'Alaca', 3686),
(40491, 'Bayat', 3686),
(40492, 'Corum', 3686),
(40493, 'Dodurga', 3686),
(40494, 'Iskilip', 3686),
(40495, 'Kargi', 3686),
(40496, 'Lacin', 3686),
(40497, 'Mecitozu', 3686),
(40498, 'Oguzlar', 3686),
(40499, 'Ortakoy', 3686),
(40500, 'Osmancik', 3686),
(40501, 'Sungurlu', 3686),
(40502, 'Ugurludag', 3686),
(40503, 'Acipayam', 3687),
(40504, 'Akkoy', 3687),
(40505, 'Babadag', 3687),
(40506, 'Baklan', 3687),
(40507, 'Bekilli', 3687),
(40508, 'Bozkurt', 3687),
(40509, 'Buldan', 3687),
(40510, 'Cardak', 3687),
(40511, 'Civril', 3687),
(40512, 'Denizli', 3687),
(40513, 'Guney', 3687),
(40514, 'Honaz', 3687),
(40515, 'Kale', 3687),
(40516, 'Saraykoy', 3687),
(40517, 'Serinhisar', 3687),
(40518, 'Tavas', 3687),
(40519, 'Bismil', 3688),
(40520, 'Cermik', 3688),
(40521, 'Cinar', 3688),
(40522, 'Cungus', 3688),
(40523, 'Dicle', 3688),
(40524, 'Diyarbakir', 3688),
(40525, 'Egil', 3688),
(40526, 'Ergani', 3688),
(40527, 'Hani', 3688),
(40528, 'Hazro', 3688),
(40529, 'Kocakoy', 3688),
(40530, 'Kulp', 3688),
(40531, 'Lice', 3688),
(40532, 'Silvan', 3688),
(40533, 'Cumayeri', 3689),
(40534, 'Duzce', 3689),
(40535, 'Golyaka', 3689),
(40536, 'Gumusova', 3689),
(40537, 'Kaynasli', 3689),
(40538, 'Yigilca', 3689),
(40539, 'Edirne', 3690),
(40540, 'Enez', 3690),
(40541, 'Havsa', 3690),
(40542, 'Ipsala', 3690),
(40543, 'Kesan', 3690),
(40544, 'Lalapasa', 3690),
(40545, 'Meric', 3690),
(40546, 'Suleoglu', 3690),
(40547, 'Uzunkopru', 3690),
(40548, 'Agin', 3691),
(40549, 'Alacakaya', 3691),
(40550, 'Aricak', 3691),
(40551, 'Baskil', 3691),
(40552, 'Elazig', 3691),
(40553, 'Karakocan', 3691),
(40554, 'Keban', 3691),
(40555, 'Kovancilar', 3691),
(40556, 'Maden', 3691),
(40557, 'Palu', 3691),
(40558, 'Sivrice', 3691),
(40559, 'Erzincan', 3692),
(40560, 'Ilic', 3692),
(40561, 'Kemah', 3692),
(40562, 'Kemaliye', 3692),
(40563, 'Otlukbeli', 3692),
(40564, 'Refahiye', 3692),
(40565, 'Tercan', 3692),
(40566, 'Uzumlu', 3692),
(40567, 'Askale', 3693),
(40568, 'Erzurum', 3693),
(40569, 'Hinis', 3693),
(40570, 'Horasan', 3693),
(40571, 'Ilica', 3693),
(40572, 'Ispir', 3693),
(40573, 'Karacoban', 3693),
(40574, 'Karayazi', 3693),
(40575, 'Koprukoy', 3693),
(40576, 'Narman', 3693),
(40577, 'Oltu', 3693),
(40578, 'Olur', 3693),
(40579, 'Pasinler', 3693),
(40580, 'Pazaryolu', 3693),
(40581, 'Senkaya', 3693),
(40582, 'Tekman', 3693),
(40583, 'Tortum', 3693),
(40584, 'Uzundere', 3693),
(40585, 'Alpu', 3694),
(40586, 'Beylikova', 3694),
(40587, 'Cifteler', 3694),
(40588, 'Eskisehir', 3694),
(40589, 'Gunyuzu', 3694),
(40590, 'Han', 3694),
(40591, 'Inonu', 3694),
(40592, 'Mahmudiye', 3694),
(40593, 'Mihalgazi', 3694),
(40594, 'Mihaliccik', 3694),
(40595, 'Saricakaya', 3694),
(40596, 'Seyitgazi', 3694),
(40597, 'Sivrihisar', 3694),
(40598, 'Araban', 3695),
(40599, 'Gaziantep', 3695),
(40600, 'Islahiye', 3695),
(40601, 'Karkamis', 3695),
(40602, 'Nizip', 3695),
(40603, 'Nurdagi', 3695),
(40604, 'Oguzeli', 3695),
(40605, 'Sehitkamil', 3695),
(40606, 'Yavuzeli', 3695),
(40607, 'Aluca', 3696),
(40608, 'Bulancak', 3696),
(40609, 'Dereli', 3696),
(40610, 'Dogankent', 3696),
(40611, 'Espiye', 3696),
(40612, 'Eynesil', 3696),
(40613, 'Giresun', 3696),
(40614, 'Gorele', 3696),
(40615, 'Guce', 3696),
(40616, 'Kesap', 3696),
(40617, 'Piraziz', 3696),
(40618, 'Sebinkarahisar', 3696),
(40619, 'Tirebolu', 3696),
(40620, 'Yaglidere', 3696),
(40621, 'Gumushane', 3697),
(40622, 'Kelkit', 3697),
(40623, 'Kose', 3697),
(40624, 'Kurtun', 3697),
(40625, 'Siran', 3697),
(40626, 'Torul', 3697),
(40627, 'Cukurca', 3698),
(40628, 'Hakkari', 3698),
(40629, 'Semdinli', 3698),
(40630, 'Yuksekova', 3698),
(40631, 'Altinozu', 3699),
(40632, 'Antakya', 3699),
(40633, 'Belen', 3699),
(40634, 'Dortyol', 3699),
(40635, 'Erzin', 3699),
(40636, 'Hassa', 3699),
(40637, 'Iskenderun', 3699),
(40638, 'Kirikhan', 3699),
(40639, 'Kumlu', 3699),
(40640, 'Reyhanli', 3699),
(40641, 'Samandag', 3699),
(40642, 'Yayladagi', 3699),
(40643, 'Anamur', 3700),
(40644, 'Aydincik', 3700),
(40645, 'Bozyazi', 3700),
(40646, 'Erdemli', 3700),
(40647, 'Gulnar', 3700),
(40648, 'Mersin', 3700),
(40649, 'Mut', 3700),
(40650, 'Silifke', 3700),
(40651, 'Tarsus', 3700),
(40652, 'Aralik', 3701),
(40653, 'Igdir', 3701),
(40654, 'Karakoyunlu', 3701),
(40655, 'Tuzluca', 3701),
(40656, 'Aksu', 3702),
(40657, 'Atabey', 3702),
(40658, 'Egirdir', 3702),
(40659, 'Gelendost', 3702),
(40660, 'Gonen', 3702),
(40661, 'Isparta', 3702),
(40662, 'Keciborlu', 3702),
(40663, 'Sarkikaraagac', 3702),
(40664, 'Senirkent', 3702),
(40665, 'Sutculer', 3702),
(40666, 'Uluborlu', 3702),
(40667, 'Yalvac', 3702),
(40668, 'Yenisarbademli', 3702),
(40681, 'Aliaga', 3704),
(40682, 'Alsancak', 3704),
(40683, 'Bayindir', 3704),
(40684, 'Bergama', 3704),
(40685, 'Beyagac', 3704),
(40686, 'Bornova', 3704),
(40687, 'Cesme', 3704),
(40688, 'Digor', 3704),
(40689, 'Dikili', 3704),
(40690, 'Foca', 3704),
(40691, 'Izmir', 3704),
(40692, 'Karaburun', 3704),
(40693, 'Kemalpasa', 3704),
(40694, 'Kinik', 3704),
(40695, 'Kiraz', 3704),
(40696, 'Menderes', 3704),
(40697, 'Menemen', 3704),
(40698, 'Merkezi', 3704),
(40699, 'Mersinli', 3704),
(40700, 'Odemis', 3704),
(40701, 'Seferihisar', 3704),
(40702, 'Selcuk', 3704),
(40703, 'Tire', 3704),
(40704, 'Torbali', 3704),
(40705, 'Urla', 3704),
(40706, 'Afsin', 3705),
(40707, 'Andirin', 3705),
(40708, 'Caglayancerit', 3705),
(40709, 'Ekinozu', 3705),
(40710, 'Elbistan', 3705),
(40711, 'Goksun', 3705),
(40712, 'Kahramanmaras', 3705),
(40713, 'Nurhak', 3705),
(40714, 'Pazarcik', 3705),
(40715, 'Turkoglu', 3705),
(40716, 'Eflani', 3706),
(40717, 'Eskipazar', 3706),
(40718, 'Karabuk', 3706),
(40719, 'Ovacik', 3706),
(40720, 'Safranbolu', 3706),
(40721, 'Yenice', 3706),
(40722, 'Ayranci', 3707),
(40723, 'Basyayla', 3707),
(40724, 'Ermenek', 3707),
(40725, 'Karaman', 3707),
(40726, 'Kazimkarabekir', 3707),
(40727, 'Sariveliler', 3707),
(40728, 'Akyaka', 3708),
(40729, 'Arpacay', 3708),
(40730, 'Kagizman', 3708),
(40731, 'Kars', 3708),
(40732, 'Sarikamis', 3708),
(40733, 'Selim', 3708),
(40734, 'Susuz', 3708),
(40735, 'Karsiyaka', 3709),
(40736, 'Abana', 3710),
(40737, 'Agli', 3710),
(40738, 'Arac', 3710),
(40739, 'Azdavay', 3710),
(40740, 'Bozkurt', 3710),
(40741, 'Daday', 3710),
(40742, 'Devrekani', 3710),
(40743, 'Doganyurt', 3710),
(40744, 'Hanonu', 3710),
(40745, 'Ihsangazi', 3710),
(40746, 'Inebolu', 3710),
(40747, 'Kastamonu', 3710),
(40748, 'Kure', 3710),
(40749, 'Pinarbasi', 3710),
(40750, 'Senpazar', 3710),
(40751, 'Seydiler', 3710),
(40752, 'Taskopru', 3710),
(40753, 'Tosya', 3710),
(40754, 'Akkisla', 3711),
(40755, 'Bunyan', 3711),
(40756, 'Develi', 3711),
(40757, 'Felahiye', 3711),
(40758, 'Hacilar', 3711),
(40759, 'Incesu', 3711),
(40760, 'Kayseri', 3711),
(40761, 'Ozvatan', 3711),
(40762, 'Pinarbasi', 3711),
(40763, 'Sarioglan', 3711),
(40764, 'Sariz', 3711),
(40765, 'Talas', 3711),
(40766, 'Tomarza', 3711),
(40767, 'Yahyali', 3711),
(40768, 'Yesilhisar', 3711),
(40769, 'Elbeyli', 3712),
(40770, 'Kilis', 3712),
(40771, 'Musabeyli', 3712),
(40772, 'Polateli', 3712),
(40773, 'Bahsili', 3713),
(40774, 'Baliseyh', 3713),
(40775, 'Delice', 3713),
(40776, 'Karakecili', 3713),
(40777, 'Keskin', 3713),
(40778, 'Kirikkale', 3713),
(40779, 'Sulakyurt', 3713),
(40780, 'Yahsihan', 3713),
(40781, 'Babaeski', 3714),
(40782, 'Demirkoy', 3714),
(40783, 'Kirklareli', 3714),
(40784, 'Kofcaz', 3714),
(40785, 'Kumkoy', 3714),
(40786, 'Luleburgaz', 3714),
(40787, 'Pehlivankoy', 3714),
(40788, 'Pinarhisar', 3714),
(40789, 'Vize', 3714),
(40790, 'Akcakent', 3715),
(40791, 'Akpinar', 3715),
(40792, 'Boztepe', 3715),
(40793, 'Kaman', 3715),
(40794, 'Kirsehir', 3715),
(40795, 'Mucur', 3715),
(40796, 'CayÄ±rova', 3716),
(40797, 'Derince', 3716),
(40798, 'DilovasÄ±', 3716),
(40799, 'Gebze', 3716),
(40800, 'Golcuk', 3716),
(40801, 'Izmit', 3716),
(40802, 'Kandira', 3716),
(40803, 'Karamursel', 3716),
(40804, 'Kocaeli', 3716),
(40805, 'Korfez', 3716),
(40806, 'Ahirli', 3717),
(40807, 'Akoren', 3717),
(40808, 'Aksehir', 3717),
(40809, 'Altinekin', 3717),
(40810, 'Beysehir', 3717),
(40811, 'Bozkir', 3717),
(40812, 'Cihanbeyli', 3717),
(40813, 'Cumra', 3717),
(40814, 'Derbent', 3717),
(40815, 'Derebucak', 3717),
(40816, 'Doganhisar', 3717),
(40817, 'Emirgazi', 3717),
(40818, 'Eregli', 3717),
(40819, 'Guneysinir', 3717),
(40820, 'Hadim', 3717),
(40821, 'Halkapinar', 3717),
(40822, 'Huyuk', 3717),
(40823, 'Ilgin', 3717),
(40824, 'Kadinhani', 3717),
(40825, 'Karapinar', 3717),
(40826, 'Konya', 3717),
(40827, 'Kulu', 3717),
(40828, 'Sarayonu', 3717),
(40829, 'Seydisehir', 3717),
(40830, 'Taskent', 3717),
(40831, 'Tuzlukcu', 3717),
(40832, 'Yalihuyuk', 3717),
(40833, 'Yunak', 3717),
(40834, 'Altinas', 3718),
(40835, 'Aslanapa', 3718),
(40836, 'Domanic', 3718),
(40837, 'Dumlupinar', 3718),
(40838, 'Emet', 3718),
(40839, 'Gediz', 3718),
(40840, 'Kutahya', 3718),
(40841, 'Pazarlar', 3718),
(40842, 'Saphane', 3718),
(40843, 'Simav', 3718),
(40844, 'Tavsanli', 3718),
(40845, 'Lefkosa', 3719),
(40846, 'Akcadag', 3720),
(40847, 'Arapkir', 3720),
(40848, 'Arguvan', 3720),
(40849, 'Battalgazi', 3720),
(40850, 'Darende', 3720),
(40851, 'Dogansehir', 3720),
(40852, 'Doganyol', 3720),
(40853, 'Hekimhan', 3720),
(40854, 'Kale', 3720),
(40855, 'Kuluncak', 3720),
(40856, 'Malatya', 3720),
(40857, 'Poturge', 3720),
(40858, 'Yazihan', 3720),
(40859, 'Yesilyurt', 3720),
(40860, 'Ahmetli', 3721),
(40861, 'Akhisar', 3721),
(40862, 'Alasehir', 3721),
(40863, 'Demirci', 3721),
(40864, 'Golmarmara', 3721),
(40865, 'Gordes', 3721),
(40866, 'Kirkagac', 3721),
(40867, 'Koprubasi', 3721),
(40868, 'Kula', 3721),
(40869, 'Manisa', 3721),
(40870, 'Salihli', 3721),
(40871, 'Sarigol', 3721),
(40872, 'Saruhanli', 3721),
(40873, 'Selendi', 3721),
(40874, 'Soma', 3721),
(40875, 'Turgutlu', 3721),
(40876, 'Dargecit', 3722),
(40877, 'Derik', 3722),
(40878, 'Kiziltepe', 3722),
(40879, 'Mardin', 3722),
(40880, 'Mazidagi', 3722),
(40881, 'Midyat', 3722),
(40882, 'Nusaybin', 3722),
(40883, 'Omerli', 3722),
(40884, 'Savur', 3722),
(40885, 'Yesilli', 3722),
(40886, 'Bodrum', 3723),
(40887, 'Dalaman', 3723),
(40888, 'Datca', 3723),
(40889, 'Fethiye', 3723),
(40890, 'Kavaklidere', 3723),
(40891, 'Koycegiz', 3723),
(40892, 'Marmaris', 3723),
(40893, 'Milas', 3723),
(40894, 'Mugla', 3723),
(40895, 'Ortaca', 3723),
(40896, 'Ula', 3723),
(40897, 'Yatagan', 3723),
(40898, 'Bulanik', 3724),
(40899, 'Haskoy', 3724),
(40900, 'Korkut', 3724),
(40901, 'Malazgirt', 3724),
(40902, 'Mus', 3724),
(40903, 'Varto', 3724),
(40904, 'Acigol', 3725),
(40905, 'Avanos', 3725),
(40906, 'Derinkuyu', 3725),
(40907, 'Gulsehir', 3725),
(40908, 'Hacibektas', 3725),
(40909, 'Kozakli', 3725),
(40910, 'Nevsehir', 3725),
(40911, 'Urgup', 3725),
(40912, 'Altunhisar', 3726),
(40913, 'Bor', 3726),
(40914, 'Nigde', 3726),
(40915, 'Ulukisla', 3726),
(40916, 'Akkus', 3727),
(40917, 'Aybasti', 3727),
(40918, 'Camas', 3727),
(40919, 'Fatsa', 3727),
(40920, 'Golkoy', 3727),
(40921, 'Gulyali', 3727),
(40922, 'Gurgentepe', 3727),
(40923, 'Ikizce', 3727),
(40924, 'Kabaduz', 3727),
(40925, 'Kabatas', 3727),
(40926, 'Korgan', 3727),
(40927, 'Kumru', 3727),
(40928, 'Mesudiye', 3727),
(40929, 'Ordu', 3727),
(40930, 'Persembe', 3727),
(40931, 'Ulubey', 3727),
(40932, 'Unye', 3727),
(40933, 'Bahce', 3728),
(40934, 'Duzici', 3728),
(40935, 'Hasanbeyli', 3728),
(40936, 'Kadirli', 3728),
(40937, 'Osmaniye', 3728),
(40938, 'Sumbas', 3728),
(40939, 'Toprakkale', 3728),
(40940, 'Ardesen', 3729),
(40941, 'Cayeli', 3729),
(40942, 'Derepazan', 3729),
(40943, 'Findikli', 3729),
(40944, 'Guneysu', 3729),
(40945, 'Hemsin', 3729),
(40946, 'Ikizdere', 3729),
(40947, 'Iyidere', 3729),
(40948, 'Kalkandere', 3729),
(40949, 'Pazar', 3729),
(40950, 'Rize', 3729),
(40951, 'Adapazari', 3730),
(40952, 'Akyazi', 3730),
(40953, 'Ferizli', 3730),
(40954, 'Geyve', 3730),
(40955, 'Hendek', 3730),
(40956, 'Karapurcek', 3730),
(40957, 'Karasu', 3730),
(40958, 'Kaynarca', 3730),
(40959, 'Kocaali', 3730),
(40960, 'Pamukova', 3730),
(40961, 'Sapanca', 3730),
(40962, 'Sogutlu', 3730),
(40963, 'Tarakli', 3730),
(40964, 'Akcakale', 3731),
(40965, 'Alacam', 3731),
(40966, 'Asarcik', 3731),
(40967, 'Ayvacik', 3731),
(40968, 'Bafra', 3731),
(40969, 'Carsamba', 3731),
(40970, 'Havza', 3731),
(40971, 'Kavak', 3731),
(40972, 'Ladik', 3731),
(40973, 'Mayis 19', 3731),
(40974, 'Salipazan', 3731),
(40975, 'Samsun', 3731),
(40976, 'Tekkekoy', 3731),
(40977, 'Terme', 3731),
(40978, 'Vezirkopru', 3731),
(40979, 'Yakakent', 3731),
(40980, 'Birecik', 3732),
(40981, 'Bozova', 3732),
(40982, 'Ceylanpinar', 3732),
(40983, 'Halfeti', 3732),
(40984, 'Harran', 3732),
(40985, 'Hilvan', 3732),
(40986, 'Sanliurfa', 3732),
(40987, 'Siverek', 3732),
(40988, 'Suruc', 3732),
(40989, 'Urfa', 3732),
(40990, 'Viransehir', 3732),
(40991, 'Aydinlar', 3733),
(40992, 'Baykan', 3733),
(40993, 'Eruh', 3733),
(40994, 'Kurtalan', 3733),
(40995, 'Pervari', 3733),
(40996, 'Siirt', 3733),
(40997, 'Sirvan', 3733),
(40998, 'Ayancik', 3734),
(40999, 'Boyabat', 3734),
(41000, 'Dikmen', 3734),
(41001, 'Duragan', 3734),
(41002, 'Erfelek', 3734),
(41003, 'Gerze', 3734),
(41004, 'Sarayduzu', 3734),
(41005, 'Sinop', 3734),
(41006, 'Turkeli', 3734),
(41007, 'Beytussebap', 3735),
(41008, 'Cizre', 3735),
(41009, 'Guclukonak', 3735),
(41010, 'Idil', 3735),
(41011, 'Silopi', 3735),
(41012, 'Sirnak', 3735),
(41013, 'Uludere', 3735),
(41014, 'Akincilar', 3736),
(41015, 'Altinyayla', 3736),
(41016, 'Divrigi', 3736),
(41017, 'Dogansar', 3736),
(41018, 'Gemerek', 3736),
(41019, 'Golova', 3736),
(41020, 'Gurun', 3736),
(41021, 'Hafik', 3736),
(41022, 'Imranli', 3736),
(41023, 'Kangal', 3736),
(41024, 'Koyulhisar', 3736),
(41025, 'Sarkisla', 3736),
(41026, 'Sivas', 3736),
(41027, 'Susehri', 3736),
(41028, 'Ulas', 3736),
(41029, 'Yildizeli', 3736),
(41030, 'Zara', 3736),
(41031, 'Cerkezkoy', 3737),
(41032, 'Corlu', 3737),
(41033, 'Hayrabolu', 3737),
(41034, 'Malkara', 3737),
(41035, 'Marmaraereglisi', 3737),
(41036, 'Muratli', 3737),
(41037, 'Saray', 3737),
(41038, 'Sarkoy', 3737),
(41039, 'Tekirdag', 3737),
(41040, 'Almus', 3738),
(41041, 'Artova', 3738),
(41042, 'Basciftlik', 3738),
(41043, 'Erbaa', 3738),
(41044, 'Niksar', 3738),
(41045, 'Pazar', 3738),
(41046, 'Resadiye', 3738),
(41047, 'Sulusaray', 3738),
(41048, 'Tokat', 3738),
(41049, 'Turhal', 3738),
(41050, 'Yesilyurt', 3738),
(41051, 'Zile', 3738),
(41052, 'Akcaabat', 3739),
(41053, 'Arakli', 3739),
(41054, 'Arsin', 3739),
(41055, 'Besikduzu', 3739),
(41056, 'Caykara', 3739),
(41057, 'Dernekpazari', 3739),
(41058, 'Duzkoy', 3739),
(41059, 'Hayrat', 3739),
(41060, 'Koprubasi', 3739),
(41061, 'Macka', 3739),
(41062, 'Of', 3739),
(41063, 'Salpazari', 3739),
(41064, 'Surmene', 3739),
(41065, 'Tonya', 3739),
(41066, 'Trabzon', 3739),
(41067, 'Vakfikebir', 3739),
(41068, 'Yomra', 3739),
(41069, 'Hozat', 3740),
(41070, 'Mazgirt', 3740),
(41071, 'Nazimiye', 3740),
(41072, 'Ovacik', 3740),
(41073, 'Pertek', 3740),
(41074, 'Pulumur', 3740),
(41075, 'Tunceli', 3740),
(41076, 'Banaz', 3741),
(41077, 'Esme', 3741),
(41078, 'Karahalli', 3741),
(41079, 'Sivasli', 3741),
(41080, 'Ulubey', 3741),
(41081, 'Usak', 3741),
(41082, 'Bahcesaray', 3742),
(41083, 'Baskale', 3742),
(41084, 'Caldiran', 3742),
(41085, 'Edremit', 3742),
(41086, 'Ercis', 3742),
(41087, 'Gevas', 3742),
(41088, 'Gurpinar', 3742),
(41089, 'Muradiye', 3742),
(41090, 'Ozalp', 3742),
(41091, 'Saray', 3742),
(41092, 'Van', 3742),
(41093, 'Altinova', 3743),
(41094, 'Armutlu', 3743),
(41095, 'Ciftlikkoy', 3743),
(41096, 'Cinarcik', 3743),
(41097, 'Termal', 3743),
(41098, 'Yalova', 3743),
(41099, 'Akdagmadeni', 3744),
(41100, 'Aydincik', 3744),
(41101, 'Bogaziliyan', 3744),
(41102, 'Candir', 3744),
(41103, 'Cayiralan', 3744),
(41104, 'Cekerek', 3744),
(41105, 'Kadisehri', 3744),
(41106, 'Saraykent', 3744),
(41107, 'Sarikaya', 3744),
(41108, 'Sefaatli', 3744),
(41109, 'Sorgun', 3744),
(41110, 'Yenifakili', 3744),
(41111, 'Yerkoy', 3744),
(41112, 'Yozgat', 3744),
(41113, 'Alapli', 3745),
(41114, 'Caycuma', 3745),
(41115, 'Devrek', 3745),
(41116, 'Eregli', 3745),
(41117, 'Gokcebey', 3745),
(41118, 'Zonguldak', 3745),
(48395, 'Adalar', 3703),
(48396, 'Arnavutköy', 3703),
(48397, 'Ataşehir', 3703),
(48398, 'Avcılar', 3703),
(48399, 'Bağcılar', 3703),
(48400, 'Bahçelievler', 3703),
(48401, 'Bakırköy', 3703),
(48402, 'Başakşehir', 3703),
(48403, 'Bayrampaşa', 3703),
(48404, 'Beşiktaş', 3703),
(48405, 'Beykoz', 3703),
(48406, 'Beylikdüzü', 3703),
(48407, 'Beyoğlu', 3703),
(48408, 'Büyükçekmece', 3703),
(48409, 'Çatalca', 3703),
(48410, 'Çekmeköy', 3703),
(48411, 'Esenler', 3703),
(48412, 'Esenyurt', 3703),
(48413, 'Eyüp', 3703),
(48414, 'Fatih', 3703),
(48415, 'Gaziosmanpaşa', 3703),
(48416, 'Güngören', 3703),
(48417, 'Kadıköy', 3703),
(48418, 'Kağıthane', 3703),
(48419, 'Kartal', 3703),
(48420, 'Küçükçekmece', 3703),
(48421, 'Maltepe', 3703),
(48422, 'Pendik', 3703),
(48423, 'Sancaktepe', 3703),
(48424, 'Sarıyer', 3703),
(48425, 'Silivri', 3703),
(48426, 'Sultanbeyli', 3703),
(48427, 'Sultangazi', 3703),
(48428, 'Şile', 3703),
(48429, 'Şişli', 3703),
(48430, 'Tuzla', 3703),
(48431, 'Ümraniye', 3703),
(48432, 'Üsküdar', 3703);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_code` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso_code_2` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `flag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso_code_2`, `name`, `phonecode`, `active`, `flag`) VALUES
(1, 'AF', 'Afghanistan', 93, 0, 'images/flags/afghanistan.svg'),
(2, 'AL', 'Albania', 355, 0, 'images/flags/albania.svg'),
(3, 'DZ', 'Algeria', 213, 1, 'images/flags/algeria.svg'),
(4, 'AS', 'American Samoa', 1684, 0, 'images/flags/american-samoa.svg'),
(5, 'AD', 'Andorra', 376, 0, 'images/flags/andorra.svg'),
(6, 'AO', 'Angola', 244, 0, 'images/flags/angola.svg'),
(7, 'AI', 'Anguilla', 1264, 0, 'images/flags/anguilla.svg'),
(8, 'AQ', 'Antarctica', 0, 0, 'images/flags/antarctica.svg'),
(9, 'AG', 'Antigua And Barbuda', 1268, 0, 'images/flags/antigua-and-barbuda.svg'),
(10, 'AR', 'Argentina', 54, 0, 'images/flags/argentina.svg'),
(11, 'AM', 'Armenia', 374, 0, 'images/flags/armenia.svg'),
(12, 'AW', 'Aruba', 297, 0, 'images/flags/aruba.svg'),
(13, 'AU', 'Australia', 61, 0, 'images/flags/australia.svg'),
(14, 'AT', 'Austria', 43, 0, 'images/flags/austria.svg'),
(15, 'AZ', 'Azerbaijan', 994, 0, 'images/flags/azerbaijan.svg'),
(16, 'BS', 'Bahamas The', 1242, 0, 'images/flags/bahamas-the.svg'),
(17, 'BH', 'Bahrain', 973, 0, 'images/flags/bahrain.svg'),
(18, 'BD', 'Bangladesh', 880, 0, 'images/flags/bangladesh.svg'),
(19, 'BB', 'Barbados', 1246, 0, 'images/flags/barbados.svg'),
(20, 'BY', 'Belarus', 375, 0, 'images/flags/belarus.svg'),
(21, 'BE', 'Belgium', 32, 0, 'images/flags/belgium.svg'),
(22, 'BZ', 'Belize', 501, 0, 'images/flags/belize.svg'),
(23, 'BJ', 'Benin', 229, 0, 'images/flags/benin.svg'),
(24, 'BM', 'Bermuda', 1441, 0, 'images/flags/bermuda.svg'),
(25, 'BT', 'Bhutan', 975, 0, 'images/flags/bhutan.svg'),
(26, 'BO', 'Bolivia', 591, 0, 'images/flags/bolivia.svg'),
(27, 'BA', 'Bosnia and Herzegovina', 387, 0, 'images/flags/bosnia-and-herzegovina.svg'),
(28, 'BW', 'Botswana', 267, 0, 'images/flags/botswana.svg'),
(29, 'BV', 'Bouvet Island', 0, 0, 'images/flags/bouvet-island.svg'),
(30, 'BR', 'Brazil', 55, 0, 'images/flags/brazil.svg'),
(31, 'IO', 'British Indian Ocean Territory', 246, 0, 'images/flags/british-indian-ocean-territory.svg'),
(32, 'BN', 'Brunei', 673, 0, 'images/flags/brunei.svg'),
(33, 'BG', 'Bulgaria', 359, 0, 'images/flags/bulgaria.svg'),
(34, 'BF', 'Burkina Faso', 226, 0, 'images/flags/burkina-faso.svg'),
(35, 'BI', 'Burundi', 257, 0, 'images/flags/burundi.svg'),
(36, 'KH', 'Cambodia', 855, 0, 'images/flags/cambodia.svg'),
(37, 'CM', 'Cameroon', 237, 0, 'images/flags/cameroon.svg'),
(38, 'CA', 'Canada', 1, 0, 'images/flags/canada.svg'),
(39, 'CV', 'Cape Verde', 238, 0, 'images/flags/cape-verde.svg'),
(40, 'KY', 'Cayman Islands', 1345, 0, 'images/flags/cayman-islands.svg'),
(41, 'CF', 'Central African Republic', 236, 0, 'images/flags/central-african-republic.svg'),
(42, 'TD', 'Chad', 235, 0, 'images/flags/chad.svg'),
(43, 'CL', 'Chile', 56, 0, 'images/flags/chile.svg'),
(44, 'CN', 'China', 86, 0, 'images/flags/china.svg'),
(45, 'CX', 'Christmas Island', 61, 0, 'images/flags/christmas-island.svg'),
(46, 'CC', 'Cocos (Keeling) Islands', 672, 0, 'images/flags/cocos-keeling-islands.svg'),
(47, 'CO', 'Colombia', 57, 0, 'images/flags/colombia.svg'),
(48, 'KM', 'Comoros', 269, 0, 'images/flags/comoros.svg'),
(49, 'CG', 'Republic Of The Congo', 242, 0, 'images/flags/republic-of-the-congo.svg'),
(50, 'CD', 'Democratic Republic Of The Congo', 242, 0, 'images/flags/democratic-republic-of-the-congo.svg'),
(51, 'CK', 'Cook Islands', 682, 0, 'images/flags/cook-islands.svg'),
(52, 'CR', 'Costa Rica', 506, 0, 'images/flags/costa-rica.svg'),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225, 0, 'images/flags/cote-divoire-ivory-coast.svg'),
(54, 'HR', 'Croatia (Hrvatska)', 385, 0, 'images/flags/croatia-hrvatska.svg'),
(55, 'CU', 'Cuba', 53, 0, 'images/flags/cuba.svg'),
(56, 'CY', 'Cyprus', 357, 0, 'images/flags/cyprus.svg'),
(57, 'CZ', 'Czech Republic', 420, 0, 'images/flags/czech-republic.svg'),
(58, 'DK', 'Denmark', 45, 0, 'images/flags/denmark.svg'),
(59, 'DJ', 'Djibouti', 253, 0, 'images/flags/djibouti.svg'),
(60, 'DM', 'Dominica', 1767, 0, 'images/flags/dominica.svg'),
(61, 'DO', 'Dominican Republic', 1809, 0, 'images/flags/dominican-republic.svg'),
(62, 'TP', 'East Timor', 670, 0, 'images/flags/east-timor.svg'),
(63, 'EC', 'Ecuador', 593, 0, 'images/flags/ecuador.svg'),
(64, 'EG', 'Egypt', 20, 0, 'images/flags/egypt.svg'),
(65, 'SV', 'El Salvador', 503, 0, 'images/flags/el-salvador.svg'),
(66, 'GQ', 'Equatorial Guinea', 240, 0, 'images/flags/equatorial-guinea.svg'),
(67, 'ER', 'Eritrea', 291, 0, 'images/flags/eritrea.svg'),
(68, 'EE', 'Estonia', 372, 0, 'images/flags/estonia.svg'),
(69, 'ET', 'Ethiopia', 251, 0, 'images/flags/ethiopia.svg'),
(70, 'XA', 'External Territories of Australia', 61, 0, 'images/flags/external-territories-of-australia.svg'),
(71, 'FK', 'Falkland Islands', 500, 0, 'images/flags/falkland-islands.svg'),
(72, 'FO', 'Faroe Islands', 298, 0, 'images/flags/faroe-islands.svg'),
(73, 'FJ', 'Fiji Islands', 679, 0, 'images/flags/fiji-islands.svg'),
(74, 'FI', 'Finland', 358, 0, 'images/flags/finland.svg'),
(75, 'FR', 'France', 33, 0, 'images/flags/france.svg'),
(76, 'GF', 'French Guiana', 594, 0, 'images/flags/french-guiana.svg'),
(77, 'PF', 'French Polynesia', 689, 0, 'images/flags/french-polynesia.svg'),
(78, 'TF', 'French Southern Territories', 0, 0, 'images/flags/french-southern-territories.svg'),
(79, 'GA', 'Gabon', 241, 0, 'images/flags/gabon.svg'),
(80, 'GM', 'Gambia The', 220, 0, 'images/flags/gambia-the.svg'),
(81, 'GE', 'Georgia', 995, 0, 'images/flags/georgia.svg'),
(82, 'DE', 'Germany', 49, 0, 'images/flags/germany.svg'),
(83, 'GH', 'Ghana', 233, 0, 'images/flags/ghana.svg'),
(84, 'GI', 'Gibraltar', 350, 0, 'images/flags/gibraltar.svg'),
(85, 'GR', 'Greece', 30, 0, 'images/flags/greece.svg'),
(86, 'GL', 'Greenland', 299, 0, 'images/flags/greenland.svg'),
(87, 'GD', 'Grenada', 1473, 0, 'images/flags/grenada.svg'),
(88, 'GP', 'Guadeloupe', 590, 0, 'images/flags/guadeloupe.svg'),
(89, 'GU', 'Guam', 1671, 0, 'images/flags/guam.svg'),
(90, 'GT', 'Guatemala', 502, 0, 'images/flags/guatemala.svg'),
(91, 'XU', 'Guernsey and Alderney', 44, 0, 'images/flags/guernsey-and-alderney.svg'),
(92, 'GN', 'Guinea', 224, 0, 'images/flags/guinea.svg'),
(93, 'GW', 'Guinea-Bissau', 245, 0, 'images/flags/guinea-bissau.svg'),
(94, 'GY', 'Guyana', 592, 0, 'images/flags/guyana.svg'),
(95, 'HT', 'Haiti', 509, 0, 'images/flags/haiti.svg'),
(96, 'HM', 'Heard and McDonald Islands', 0, 0, 'images/flags/heard-and-mcdonald-islands.svg'),
(97, 'HN', 'Honduras', 504, 0, 'images/flags/honduras.svg'),
(98, 'HK', 'Hong Kong S.A.R.', 852, 0, 'images/flags/hong-kong-sar.svg'),
(99, 'HU', 'Hungary', 36, 0, 'images/flags/hungary.svg'),
(100, 'IS', 'Iceland', 354, 0, 'images/flags/iceland.svg'),
(101, 'IN', 'India', 91, 0, 'images/flags/india.svg'),
(102, 'ID', 'Indonesia', 62, 0, 'images/flags/indonesia.svg'),
(103, 'IR', 'Iran', 98, 0, 'images/flags/iran.svg'),
(104, 'IQ', 'Iraq', 964, 0, 'images/flags/iraq.svg'),
(105, 'IE', 'Ireland', 353, 0, 'images/flags/ireland.svg'),
(106, 'IL', 'Israel', 972, 0, 'images/flags/israel.svg'),
(107, 'IT', 'Italy', 39, 0, 'images/flags/italy.svg'),
(108, 'JM', 'Jamaica', 1876, 0, 'images/flags/jamaica.svg'),
(109, 'JP', 'Japan', 81, 0, 'images/flags/japan.svg'),
(110, 'XJ', 'Jersey', 44, 0, 'images/flags/jersey.svg'),
(111, 'JO', 'Jordan', 962, 0, 'images/flags/jordan.svg'),
(112, 'KZ', 'Kazakhstan', 7, 0, 'images/flags/kazakhstan.svg'),
(113, 'KE', 'Kenya', 254, 0, 'images/flags/kenya.svg'),
(114, 'KI', 'Kiribati', 686, 0, 'images/flags/kiribati.svg'),
(115, 'KP', 'Korea North', 850, 0, 'images/flags/korea-north.svg'),
(116, 'KR', 'Korea South', 82, 0, 'images/flags/korea-south.svg'),
(117, 'KW', 'Kuwait', 965, 0, 'images/flags/kuwait.svg'),
(118, 'KG', 'Kyrgyzstan', 996, 0, 'images/flags/kyrgyzstan.svg'),
(119, 'LA', 'Laos', 856, 0, 'images/flags/laos.svg'),
(120, 'LV', 'Latvia', 371, 0, 'images/flags/latvia.svg'),
(121, 'LB', 'Lebanon', 961, 0, 'images/flags/lebanon.svg'),
(122, 'LS', 'Lesotho', 266, 0, 'images/flags/lesotho.svg'),
(123, 'LR', 'Liberia', 231, 0, 'images/flags/liberia.svg'),
(124, 'LY', 'Libya', 218, 0, 'images/flags/libya.svg'),
(125, 'LI', 'Liechtenstein', 423, 0, 'images/flags/liechtenstein.svg'),
(126, 'LT', 'Lithuania', 370, 0, 'images/flags/lithuania.svg'),
(127, 'LU', 'Luxembourg', 352, 0, 'images/flags/luxembourg.svg'),
(128, 'MO', 'Macau S.A.R.', 853, 0, 'images/flags/macau-sar.svg'),
(129, 'MK', 'Macedonia', 389, 0, 'images/flags/macedonia.svg'),
(130, 'MG', 'Madagascar', 261, 0, 'images/flags/madagascar.svg'),
(131, 'MW', 'Malawi', 265, 0, 'images/flags/malawi.svg'),
(132, 'MY', 'Malaysia', 60, 0, 'images/flags/malaysia.svg'),
(133, 'MV', 'Maldives', 960, 0, 'images/flags/maldives.svg'),
(134, 'ML', 'Mali', 223, 0, 'images/flags/mali.svg'),
(135, 'MT', 'Malta', 356, 0, 'images/flags/malta.svg'),
(136, 'XM', 'Man (Isle of)', 44, 0, 'images/flags/man-isle-of.svg'),
(137, 'MH', 'Marshall Islands', 692, 0, 'images/flags/marshall-islands.svg'),
(138, 'MQ', 'Martinique', 596, 0, 'images/flags/martinique.svg'),
(139, 'MR', 'Mauritania', 222, 0, 'images/flags/mauritania.svg'),
(140, 'MU', 'Mauritius', 230, 0, 'images/flags/mauritius.svg'),
(141, 'YT', 'Mayotte', 269, 0, 'images/flags/mayotte.svg'),
(142, 'MX', 'Mexico', 52, 0, 'images/flags/mexico.svg'),
(143, 'FM', 'Micronesia', 691, 0, 'images/flags/micronesia.svg'),
(144, 'MD', 'Moldova', 373, 0, 'images/flags/moldova.svg'),
(145, 'MC', 'Monaco', 377, 0, 'images/flags/monaco.svg'),
(146, 'MN', 'Mongolia', 976, 0, 'images/flags/mongolia.svg'),
(147, 'MS', 'Montserrat', 1664, 0, 'images/flags/montserrat.svg'),
(148, 'MA', 'Morocco', 212, 0, 'images/flags/morocco.svg'),
(149, 'MZ', 'Mozambique', 258, 0, 'images/flags/mozambique.svg'),
(150, 'MM', 'Myanmar', 95, 0, 'images/flags/myanmar.svg'),
(151, 'NA', 'Namibia', 264, 0, 'images/flags/namibia.svg'),
(152, 'NR', 'Nauru', 674, 0, 'images/flags/nauru.svg'),
(153, 'NP', 'Nepal', 977, 0, 'images/flags/nepal.svg'),
(154, 'AN', 'Netherlands Antilles', 599, 0, 'images/flags/netherlands-antilles.svg'),
(155, 'NL', 'Netherlands The', 31, 0, 'images/flags/netherlands-the.svg'),
(156, 'NC', 'New Caledonia', 687, 0, 'images/flags/new-caledonia.svg'),
(157, 'NZ', 'New Zealand', 64, 0, 'images/flags/new-zealand.svg'),
(158, 'NI', 'Nicaragua', 505, 0, 'images/flags/nicaragua.svg'),
(159, 'NE', 'Niger', 227, 0, 'images/flags/niger.svg'),
(160, 'NG', 'Nigeria', 234, 0, 'images/flags/nigeria.svg'),
(161, 'NU', 'Niue', 683, 0, 'images/flags/niue.svg'),
(162, 'NF', 'Norfolk Island', 672, 0, 'images/flags/norfolk-island.svg'),
(163, 'MP', 'Northern Mariana Islands', 1670, 0, 'images/flags/northern-mariana-islands.svg'),
(164, 'NO', 'Norway', 47, 0, 'images/flags/norway.svg'),
(165, 'OM', 'Oman', 968, 0, 'images/flags/oman.svg'),
(166, 'PK', 'Pakistan', 92, 0, 'images/flags/pakistan.svg'),
(167, 'PW', 'Palau', 680, 0, 'images/flags/palau.svg'),
(168, 'PS', 'Palestinian Territory Occupied', 970, 0, 'images/flags/palestinian-territory-occupied.svg'),
(169, 'PA', 'Panama', 507, 0, 'images/flags/panama.svg'),
(170, 'PG', 'Papua new Guinea', 675, 0, 'images/flags/papua-new-guinea.svg'),
(171, 'PY', 'Paraguay', 595, 0, 'images/flags/paraguay.svg'),
(172, 'PE', 'Peru', 51, 0, 'images/flags/peru.svg'),
(173, 'PH', 'Philippines', 63, 0, 'images/flags/philippines.svg'),
(174, 'PN', 'Pitcairn Island', 0, 0, 'images/flags/pitcairn-island.svg'),
(175, 'PL', 'Poland', 48, 0, 'images/flags/poland.svg'),
(176, 'PT', 'Portugal', 351, 0, 'images/flags/portugal.svg'),
(177, 'PR', 'Puerto Rico', 1787, 0, 'images/flags/puerto-rico.svg'),
(178, 'QA', 'Qatar', 974, 0, 'images/flags/qatar.svg'),
(179, 'RE', 'Reunion', 262, 0, 'images/flags/reunion.svg'),
(180, 'RO', 'Romania', 40, 0, 'images/flags/romania.svg'),
(181, 'RU', 'Russia', 70, 0, 'images/flags/russia.svg'),
(182, 'RW', 'Rwanda', 250, 0, 'images/flags/rwanda.svg'),
(183, 'SH', 'Saint Helena', 290, 0, 'images/flags/saint-helena.svg'),
(184, 'KN', 'Saint Kitts And Nevis', 1869, 0, 'images/flags/saint-kitts-and-nevis.svg'),
(185, 'LC', 'Saint Lucia', 1758, 0, 'images/flags/saint-lucia.svg'),
(186, 'PM', 'Saint Pierre and Miquelon', 508, 0, 'images/flags/saint-pierre-and-miquelon.svg'),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784, 0, 'images/flags/saint-vincent-and-the-grenadines.svg'),
(188, 'WS', 'Samoa', 684, 0, 'images/flags/samoa.svg'),
(189, 'SM', 'San Marino', 378, 0, 'images/flags/san-marino.svg'),
(190, 'ST', 'Sao Tome and Principe', 239, 0, 'images/flags/sao-tome-and-principe.svg'),
(191, 'SA', 'Saudi Arabia', 966, 0, 'images/flags/saudi-arabia.svg'),
(192, 'SN', 'Senegal', 221, 0, 'images/flags/senegal.svg'),
(193, 'RS', 'Serbia', 381, 0, 'images/flags/serbia.svg'),
(194, 'SC', 'Seychelles', 248, 0, 'images/flags/seychelles.svg'),
(195, 'SL', 'Sierra Leone', 232, 0, 'images/flags/sierra-leone.svg'),
(196, 'SG', 'Singapore', 65, 0, 'images/flags/singapore.svg'),
(197, 'SK', 'Slovakia', 421, 0, 'images/flags/slovakia.svg'),
(198, 'SI', 'Slovenia', 386, 0, 'images/flags/slovenia.svg'),
(199, 'XG', 'Smaller Territories of the UK', 44, 0, 'images/flags/smaller-territories-of-the-uk.svg'),
(200, 'SB', 'Solomon Islands', 677, 0, 'images/flags/solomon-islands.svg'),
(201, 'SO', 'Somalia', 252, 0, 'images/flags/somalia.svg'),
(202, 'ZA', 'South Africa', 27, 0, 'images/flags/south-africa.svg'),
(203, 'GS', 'South Georgia', 0, 0, 'images/flags/south-georgia.svg'),
(204, 'SS', 'South Sudan', 211, 0, 'images/flags/south-sudan.svg'),
(205, 'ES', 'Spain', 34, 0, 'images/flags/spain.svg'),
(206, 'LK', 'Sri Lanka', 94, 0, 'images/flags/sri-lanka.svg'),
(207, 'SD', 'Sudan', 249, 0, 'images/flags/sudan.svg'),
(208, 'SR', 'Suriname', 597, 0, 'images/flags/suriname.svg'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47, 0, 'images/flags/svalbard-and-jan-mayen-islands.svg'),
(210, 'SZ', 'Swaziland', 268, 0, 'images/flags/swaziland.svg'),
(211, 'SE', 'Sweden', 46, 0, 'images/flags/sweden.svg'),
(212, 'CH', 'Switzerland', 41, 0, 'images/flags/switzerland.svg'),
(213, 'SY', 'Syria', 963, 0, 'images/flags/syria.svg'),
(214, 'TW', 'Taiwan', 886, 0, 'images/flags/taiwan.svg'),
(215, 'TJ', 'Tajikistan', 992, 0, 'images/flags/tajikistan.svg'),
(216, 'TZ', 'Tanzania', 255, 0, 'images/flags/tanzania.svg'),
(217, 'TH', 'Thailand', 66, 0, 'images/flags/thailand.svg'),
(218, 'TG', 'Togo', 228, 0, 'images/flags/togo.svg'),
(219, 'TK', 'Tokelau', 690, 0, 'images/flags/tokelau.svg'),
(220, 'TO', 'Tonga', 676, 0, 'images/flags/tonga.svg'),
(221, 'TT', 'Trinidad And Tobago', 1868, 0, 'images/flags/trinidad-and-tobago.svg'),
(222, 'TN', 'Tunisia', 216, 0, 'images/flags/tunisia.svg'),
(223, 'TR', 'Turkey', 90, 1, 'images/flags/turkey.svg'),
(224, 'TM', 'Turkmenistan', 7370, 0, 'images/flags/turkmenistan.svg'),
(225, 'TC', 'Turks And Caicos Islands', 1649, 0, 'images/flags/turks-and-caicos-islands.svg'),
(226, 'TV', 'Tuvalu', 688, 0, 'images/flags/tuvalu.svg'),
(227, 'UG', 'Uganda', 256, 0, 'images/flags/uganda.svg'),
(228, 'UA', 'Ukraine', 380, 0, 'images/flags/ukraine.svg'),
(229, 'AE', 'United Arab Emirates', 971, 0, 'images/flags/united-arab-emirates.svg'),
(230, 'GB', 'United Kingdom', 44, 0, 'images/flags/united-kingdom.svg'),
(231, 'US', 'United States', 1, 0, 'images/flags/united-states.svg'),
(232, 'UM', 'United States Minor Outlying Islands', 1, 0, 'images/flags/united-states-minor-outlying-islands.svg'),
(233, 'UY', 'Uruguay', 598, 0, 'images/flags/uruguay.svg'),
(234, 'UZ', 'Uzbekistan', 998, 0, 'images/flags/uzbekistan.svg'),
(235, 'VU', 'Vanuatu', 678, 0, 'images/flags/vanuatu.svg'),
(236, 'VA', 'Vatican City State (Holy See)', 39, 0, 'images/flags/vatican-city-state-holy-see.svg'),
(237, 'VE', 'Venezuela', 58, 0, 'images/flags/venezuela.svg'),
(238, 'VN', 'Vietnam', 84, 0, 'images/flags/vietnam.svg'),
(239, 'VG', 'Virgin Islands (British)', 1284, 0, 'images/flags/virgin-islands-british.svg'),
(240, 'VI', 'Virgin Islands (US)', 1340, 0, 'images/flags/virgin-islands-us.svg'),
(241, 'WF', 'Wallis And Futuna Islands', 681, 0, 'images/flags/wallis-and-futuna-islands.svg'),
(242, 'EH', 'Western Sahara', 212, 0, 'images/flags/western-sahara.svg'),
(243, 'YE', 'Yemen', 967, 0, 'images/flags/yemen.svg'),
(244, 'YU', 'Yugoslavia', 38, 0, 'images/flags/yugoslavia.svg'),
(245, 'ZM', 'Zambia', 260, 0, 'images/flags/zambia.svg'),
(246, 'ZW', 'Zimbabwe', 263, 0, 'images/flags/zimbabwe.svg');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exchange_rate` double(10,5) DEFAULT 1.00000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `city_id`, `name`) VALUES
(1, 48396, 'Anadolu'),
(2, 48396, 'Arnavutköy İmrahor'),
(3, 48396, 'Arnavutköy İslambey'),
(4, 48396, 'Arnavutköy Merkez'),
(5, 48396, 'Arnavutköy Yavuzselim'),
(6, 48396, 'Atatürk'),
(7, 48396, 'Bahşayış'),
(8, 48396, 'Boğazköy Atatürk'),
(9, 48396, 'Boğazköy İstiklal'),
(10, 48396, 'Boğazköy Merkez'),
(11, 48396, 'Bolluca'),
(12, 48396, 'Deliklikaya'),
(13, 48396, 'Dursunköy'),
(14, 48396, 'Durusu Cami'),
(15, 48396, 'Durusu Zafer'),
(16, 48396, 'Hastane'),
(17, 48396, 'İstasyon'),
(18, 48396, 'Sazlıbosna'),
(19, 48396, 'Nakkaş'),
(20, 48396, 'Karlıbayır'),
(21, 48396, 'Haraççı'),
(22, 48396, 'Hicret'),
(23, 48396, 'Mavigöl'),
(24, 48396, 'Nenehatun'),
(25, 48396, 'Ömerli'),
(26, 48396, 'Taşoluk'),
(27, 48396, 'Taşoluk Adnan Menderes'),
(28, 48396, 'Taşoluk Çilingir'),
(29, 48396, 'Taşoluk Fatih'),
(30, 48396, 'Taşoluk M. Fevzi Çakmak'),
(31, 48396, 'Taşoluk Mehmet Akif Ersoy'),
(32, 48396, 'Yeşilbayır'),
(33, 48402, 'ŞAMLAR'),
(34, 48402, 'KAYAŞEHİR'),
(35, 48402, 'KAYABAŞI');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `publish` enum('published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'published',
  `citizenship` tinyint(1) NOT NULL DEFAULT 0,
  `country_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE `lands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `slug` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`keywords`)),
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `image` varchar(255) NOT NULL,
  `virtual_tour` text DEFAULT NULL,
  `tapu` varchar(255) NOT NULL,
  `slides` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`slides`)),
  `land_type_id` bigint(20) UNSIGNED NOT NULL,
  `regulation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`regulation`)),
  `ratio` int(11) NOT NULL,
  `space` double NOT NULL,
  `net_space` double NOT NULL,
  `deduction` double NOT NULL,
  `price` double NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `publish` enum('published','archived') NOT NULL DEFAULT 'published',
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `visites` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_features`
--

CREATE TABLE `land_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_feature_pivot`
--

CREATE TABLE `land_feature_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `land_id` bigint(20) UNSIGNED NOT NULL,
  `land_feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_types`
--

CREATE TABLE `land_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_03_174629_create_sessions_table', 1),
(9, '2023_11_03_205939_add_is_admin_columns_to_users_table', 2),
(10, '2023_12_11_095815_create_permission_tables', 3),
(11, '2023_12_15_192617_create_settings_table', 4),
(12, '2023_12_15_192935_create_seo_table', 4),
(13, '2023_12_18_193035_create_subscribers_table', 5),
(14, '2023_12_21_203036_create_testimonials_table', 6),
(15, '2024_01_24_223401_create_faqs_table', 7),
(16, '2024_01_25_220437_create_Currencies_table', 8),
(17, '2024_01_25_220437_create_currencies_table', 9),
(18, '2020_05_02_100001_create_filemanager_table', 10),
(19, '2024_01_28_165925_create_pages_table', 11),
(25, '2024_01_31_233438_create_blog_categories_table', 12),
(26, '2024_02_02_211936_create_blog_posts_table', 12),
(27, '2024_02_04_011353_create_jobs_table', 13),
(32, '2024_02_06_183040_create_property_features_table', 14),
(33, '2024_02_06_183040_create_property_types_table', 14),
(34, '2024_02_06_183040_create_properties_table', 15),
(35, '2024_02_11_194820_create_property_feature_pivot_table', 16),
(36, '2024_02_15_233338_create_land_types_table', 17),
(37, '2024_02_15_233401_create_land_features_table', 17),
(38, '2024_02_15_233454_create_lands_table', 18),
(39, '2024_02_15_233719_create_land_feature_pivot_table', 18),
(41, '2024_02_27_000016_create_contacts_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('custom','service') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'custom',
  `publish` enum('published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'published',
  `country_id` int(10) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `visites` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manage Settings', 'web', NULL, NULL),
(2, 'Manage Lands', 'web', NULL, NULL),
(3, 'Manage Properties', 'web', NULL, NULL),
(4, 'Manage Blogs', 'web', NULL, NULL),
(5, 'Manage Pages', 'web', NULL, NULL),
(6, 'Manage FileManger', 'web', NULL, NULL),
(7, 'Manage Faqs', 'web', NULL, NULL),
(8, 'Manage Testimonials', 'web', NULL, NULL),
(9, 'Manage Subscribers', 'web', NULL, NULL),
(10, 'Manage Currencies', 'web', NULL, NULL),
(11, 'Manage Roles', 'web', NULL, NULL),
(12, 'Manage Users & Admins', 'web', NULL, NULL),
(13, 'Manage Contacts', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `keywords` longtext NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `slides` longtext DEFAULT NULL,
  `virtual_tour` longtext DEFAULT NULL,
  `property_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `category` enum('project','resale') NOT NULL DEFAULT 'project',
  `publish` enum('published','archived') NOT NULL DEFAULT 'published',
  `citizenship` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 1,
  `visites` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_feature_pivot`
--

CREATE TABLE `property_feature_pivot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `property_feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-12-24 15:43:08', '2023-12-24 15:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Eb7tuH6JA5Q11g1eKV22YNoVJ1JK6mhVLS7Xt63e', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQWdKZFBqQWpITUExOFRESmZxaWFqSmp6aEExZ2ZUdkZoUUd0SUFZRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbi9hZG1pbi91c2VycyI7fXM6NjoibG9jYWxlIjtzOjI6ImVuIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1712280052);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(1, 'white_logo', 'settings/white_logo.png'),
(2, 'address', 'Denizli 80. Yıl Öğretmenevi'),
(3, 'map', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25244.56301954693!2d29.098718401281722!3d37.72976105915645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c73fb29c055cd7%3A0x4f22cac4d7ec788!2zRGVuaXpsaSA4MC4gWcSxbCDDlsSfcmV0bWVuZXZp!5e0!3m2!1sen!2str!4v1702742809713!5m2!1sen!2str\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(4, 'email', 'support@bagdainvests.com'),
(5, 'black_logo', 'settings/black_logo.png'),
(6, 'whatsapp', '905378599140'),
(7, 'home_img', 'settings/home_img.jpg'),
(8, 'phone', '095346282352'),
(12, 'lands_facebook', 'https://www.facebook.com/'),
(13, 'lands_instagram', 'https://www.facebook.com/'),
(14, 'props_facebook', 'https://www.facebook.com/'),
(15, 'props_instagram', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(110, '\'Ayn Daflah', 3),
(111, '\'Ayn Tamushanat', 3),
(112, 'Adrar', 3),
(113, 'Algiers', 3),
(114, 'Annabah', 3),
(115, 'Bashshar', 3),
(116, 'Batnah', 3),
(117, 'Bijayah', 3),
(118, 'Biskrah', 3),
(119, 'Blidah', 3),
(120, 'Buirah', 3),
(121, 'Bumardas', 3),
(122, 'Burj Bu Arririj', 3),
(123, 'Ghalizan', 3),
(124, 'Ghardayah', 3),
(125, 'Ilizi', 3),
(126, 'Jijili', 3),
(127, 'Jilfah', 3),
(128, 'Khanshalah', 3),
(129, 'Masilah', 3),
(130, 'Midyah', 3),
(131, 'Milah', 3),
(132, 'Muaskar', 3),
(133, 'Mustaghanam', 3),
(134, 'Naama', 3),
(135, 'Oran', 3),
(136, 'Ouargla', 3),
(137, 'Qalmah', 3),
(138, 'Qustantinah', 3),
(139, 'Sakikdah', 3),
(140, 'Satif', 3),
(141, 'Sayda\'', 3),
(142, 'Sidi ban-al-\'Abbas', 3),
(143, 'Suq Ahras', 3),
(144, 'Tamanghasat', 3),
(145, 'Tibazah', 3),
(146, 'Tibissah', 3),
(147, 'Tilimsan', 3),
(148, 'Tinduf', 3),
(149, 'Tisamsilt', 3),
(150, 'Tiyarat', 3),
(151, 'Tizi Wazu', 3),
(152, 'Umm-al-Bawaghi', 3),
(153, 'Wahran', 3),
(154, 'Warqla', 3),
(155, 'Wilaya d Alger', 3),
(156, 'Wilaya de Bejaia', 3),
(157, 'Wilaya de Constantine', 3),
(158, 'al-Aghwat', 3),
(159, 'al-Bayadh', 3),
(160, 'al-Jaza\'ir', 3),
(161, 'al-Wad', 3),
(162, 'ash-Shalif', 3),
(163, 'at-Tarif', 3),
(3663, 'Adana', 223),
(3664, 'Adiyaman', 223),
(3665, 'Afyon', 223),
(3666, 'Agri', 223),
(3667, 'Aksaray', 223),
(3668, 'Amasya', 223),
(3669, 'Ankara', 223),
(3670, 'Antalya', 223),
(3671, 'Ardahan', 223),
(3672, 'Artvin', 223),
(3673, 'Aydin', 223),
(3674, 'Balikesir', 223),
(3675, 'Bartin', 223),
(3676, 'Batman', 223),
(3677, 'Bayburt', 223),
(3678, 'Bilecik', 223),
(3679, 'Bingol', 223),
(3680, 'Bitlis', 223),
(3681, 'Bolu', 223),
(3682, 'Burdur', 223),
(3683, 'Bursa', 223),
(3684, 'Canakkale', 223),
(3685, 'Cankiri', 223),
(3686, 'Corum', 223),
(3687, 'Denizli', 223),
(3688, 'Diyarbakir', 223),
(3689, 'Duzce', 223),
(3690, 'Edirne', 223),
(3691, 'Elazig', 223),
(3692, 'Erzincan', 223),
(3693, 'Erzurum', 223),
(3694, 'Eskisehir', 223),
(3695, 'Gaziantep', 223),
(3696, 'Giresun', 223),
(3697, 'Gumushane', 223),
(3698, 'Hakkari', 223),
(3699, 'Hatay', 223),
(3700, 'Icel', 223),
(3701, 'Igdir', 223),
(3702, 'Isparta', 223),
(3703, 'Istanbul', 223),
(3704, 'Izmir', 223),
(3705, 'Kahramanmaras', 223),
(3706, 'Karabuk', 223),
(3707, 'Karaman', 223),
(3708, 'Kars', 223),
(3709, 'Karsiyaka', 223),
(3710, 'Kastamonu', 223),
(3711, 'Kayseri', 223),
(3712, 'Kilis', 223),
(3713, 'Kirikkale', 223),
(3714, 'Kirklareli', 223),
(3715, 'Kirsehir', 223),
(3716, 'Kocaeli', 223),
(3717, 'Konya', 223),
(3718, 'Kutahya', 223),
(3719, 'Lefkosa', 223),
(3720, 'Malatya', 223),
(3721, 'Manisa', 223),
(3722, 'Mardin', 223),
(3723, 'Mugla', 223),
(3724, 'Mus', 223),
(3725, 'Nevsehir', 223),
(3726, 'Nigde', 223),
(3727, 'Ordu', 223),
(3728, 'Osmaniye', 223),
(3729, 'Rize', 223),
(3730, 'Sakarya', 223),
(3731, 'Samsun', 223),
(3732, 'Sanliurfa', 223),
(3733, 'Siirt', 223),
(3734, 'Sinop', 223),
(3735, 'Sirnak', 223),
(3736, 'Sivas', 223),
(3737, 'Tekirdag', 223),
(3738, 'Tokat', 223),
(3739, 'Trabzon', 223),
(3740, 'Tunceli', 223),
(3741, 'Usak', 223),
(3742, 'Van', 223),
(3743, 'Yalova', 223),
(3744, 'Yozgat', 223),
(3745, 'Zonguldak', 223);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `position` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publish` enum('published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'published',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `citizenship` tinyint(1) NOT NULL DEFAULT 0,
  `country_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `type` enum('admin','customer','user') NOT NULL DEFAULT 'user',
  `super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `type`, `super_admin`, `last_login`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hadi Hilal', 'hadi-hilal@hotmail.com', NULL, 'admin', 1, '2024-04-05 01:20:10', '2024-02-01 20:51:03', '$2y$12$7Cdq3u2GY/AC3FG5t17LqeT266//K8akfT.tK42juwQP.vpr/1p.u', 'Akn5P82cDuv77lDSL6qwgiCShaEpg4005qJClncptn8647fLoIIBt9wvPHyI', '2023-11-03 14:49:02', '2024-04-05 01:20:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  ADD KEY `blog_posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_code_unique` (`code`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lands_slug_unique` (`slug`),
  ADD KEY `lands_land_type_id_foreign` (`land_type_id`),
  ADD KEY `lands_country_id_foreign` (`country_id`),
  ADD KEY `lands_state_id_foreign` (`state_id`),
  ADD KEY `lands_city_id_foreign` (`city_id`),
  ADD KEY `lands_district_id_foreign` (`district_id`),
  ADD KEY `lands_created_by_foreign` (`created_by`);

--
-- Indexes for table `land_features`
--
ALTER TABLE `land_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_feature_pivot`
--
ALTER TABLE `land_feature_pivot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_feature_pivot_land_id_foreign` (`land_id`),
  ADD KEY `land_feature_pivot_land_feature_id_foreign` (`land_feature_id`);

--
-- Indexes for table `land_types`
--
ALTER TABLE `land_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `properties_slug_unique` (`slug`),
  ADD KEY `properties_property_type_id_foreign` (`property_type_id`),
  ADD KEY `properties_country_id_foreign` (`country_id`),
  ADD KEY `properties_state_id_foreign` (`state_id`),
  ADD KEY `properties_city_id_foreign` (`city_id`),
  ADD KEY `properties_created_by_foreign` (`created_by`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_feature_pivot`
--
ALTER TABLE `property_feature_pivot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_feature_pivot_property_id_foreign` (`property_id`),
  ADD KEY `property_feature_pivot_property_feature_id_foreign` (`property_feature_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo_key_unique` (`key`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48433;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_features`
--
ALTER TABLE `land_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_feature_pivot`
--
ALTER TABLE `land_feature_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_types`
--
ALTER TABLE `land_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_feature_pivot`
--
ALTER TABLE `property_feature_pivot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4122;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lands`
--
ALTER TABLE `lands`
  ADD CONSTRAINT `lands_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `lands_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `lands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lands_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `lands_land_type_id_foreign` FOREIGN KEY (`land_type_id`) REFERENCES `land_types` (`id`),
  ADD CONSTRAINT `lands_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `land_feature_pivot`
--
ALTER TABLE `land_feature_pivot`
  ADD CONSTRAINT `land_feature_pivot_land_feature_id_foreign` FOREIGN KEY (`land_feature_id`) REFERENCES `land_features` (`id`),
  ADD CONSTRAINT `land_feature_pivot_land_id_foreign` FOREIGN KEY (`land_id`) REFERENCES `lands` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `properties_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `properties_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `properties_property_type_id_foreign` FOREIGN KEY (`property_type_id`) REFERENCES `property_types` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `properties_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `property_feature_pivot`
--
ALTER TABLE `property_feature_pivot`
  ADD CONSTRAINT `property_feature_pivot_property_feature_id_foreign` FOREIGN KEY (`property_feature_id`) REFERENCES `property_features` (`id`),
  ADD CONSTRAINT `property_feature_pivot_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
