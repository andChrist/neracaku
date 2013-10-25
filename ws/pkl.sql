-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2013 at 10:43 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkl`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addBalance`(in idPkl int(8), in saldo int(8))
BEGIN
	update pkl set pkl.saldo= pkl.saldo+saldo where pkl.idPkl=idPkl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `banUser`(in idUser int(8))
BEGIN
	update user set isActive=0 where user.idUser=idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmFunding`(in idModal int(8), in idFas int(8))
BEGIN
	declare b,i,p int default -1;
	declare t varchar(15) default null;
	select isActive from fasilitator where idFasilitator=idFas into b;
	if(b = 1) then 
		update modal set statusModal = 'O', waktuDikonfirm=now(), dikonfirmOleh=idFas 
		where modal.idModal = idModal;

		select modal.tipe,idPkl,besarModal,idPemodal 
		from modal 
		where idModal=modal.idModal into t,i,b,p;

		if(t = 'M') then 
			update pkl set pkl.saldo= pkl.saldo+b where pkl.idPkl=i;
		else if (t = 'P') then
			update pkl set dimodali = p where idPkl=i;
		end if;
		end if;
	else
		signal sqlstate '45000' set message_text='Salah ID Fasilitator';
	end if;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `confirmRegister`(in idUser int(8), in idFas int(8))
BEGIN
	declare b int default -1;
	select isActive from fasilitator where idFasilitator=idFas into b;
	if(b = 1) then 
		update user set isActive = 1, dikonfirmOleh=idFas, kapanDikonfirm=now() where user.idUser = idUser;
	else 
		signal sqlstate '45000' set message_text='Salah ID Fasilitator';
	end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `fundPkl`(
in idPkl int(8), in idPem int(8), in saldo int(8), in tipe varchar(1))
BEGIN
	insert into modal values (NULL, idPem, idPkl, tipe, saldo, 'P', NULL, NULL, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllMail`(in idUser int(8))
BEGIN
	update pesan set baca=1
	where pesan.idPenerima=idUser and baca=0;
	
	select idPesan, nama, subjek, pesan, waktuPesan 
	from pesan join user
	where pesan.idPenerima=idUser and pesan.idPengirim=user.idUser and pesan.isActive=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllNews`(in limiter int(3))
BEGIN
	select pesan, waktuPesan
	from pesan 
	where isActive=1 and idPenerima=0 limit limiter;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllProduk`(IN `idPkl` INT(8))
BEGIN
	select namaProduk, (left(deskripsi, 50)) as deskripsi, link, biayaModal, hargaJual
	from produk 
	where produk.idPkl=idPkl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getdetiltransaksi`(in notransaksi int(8), in idPKl int(8))
BEGIN
	select waktuTransaksi, total, bayar, kembalian from transaksi where idTransaksi=notransaksi and idPkl=idPKl;
	select namaProduk, harga, banyak, total 
	from itemtransaksi join produk 
	where itemtransaksi.idProduk=produk.idProduk and idTransaksi = notransaksi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNewMessageCount`(in idUser int(8))
BEGIN
	select count(idPenerima) as count
	from pesan 
	where isActive=1 and baca=0 and pesan.idPenerima=idUser;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProduk`(in idPkl int(8), in idProduk int(8))
BEGIN
	select namaProduk, deskripsi as desk, link, biayaModal, hargaJual
	from produk
	where produk.idPkl=idPkl and produk.idProduk=idProduk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProfile`(in idUser int(8))
BEGIN
	declare tipe varchar(11) default null;
	select tipeUser from user where user.idUser = idUser and isActive=1 into tipe;
	if (tipe = 'PKL') then 
		select nama, deskripsi, alamat, kontak, saldo from pkl where idPkl=idUser and isActive=1;
	else if(tipe = 'Pemodal') then 
		select nama, deskripsi, saldo from pemodal where idPemodal=idUser and isActive=1;
	else if(tipe = 'Fasilitator') then
		select alamat, noHp from fasilitator where idFas=idUser and isActive=1;
	else signal sqlstate '45000';
	end if;
	end if;
	end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProduk`(
in idPkl int(8), in nama varchar(50), in deskripsi varchar(150), in link varchar(50), in biaya int(6), in jual int(6))
BEGIN
	insert into produk values(NULL, idPkl, nama, deskripsi, link, biaya, jual, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProfileFas`(
in idFas int(8), in alamat varchar(50), in hp varchar(25))
BEGIN
	insert into fasilitator values (idFas, alamat, hp, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProfilePemodal`(
in idUser int(8), in nama varchar(50), in deskripsi varchar(250), in saldo int(13))
BEGIN
	insert into pemodal values (idUser, nama, deskripsi, saldo, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertProfilePKL`(
in idPkl int(8), in nama varchar(50), in deskripsi varchar(250), in alamat varchar(50), in kontak varchar(25))
BEGIN
	insert into pkl values (idPkl, nama, deskripsi, alamat, kontak, 0, 0, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertTransaction`(IN `idPkl` INT(8), IN `tipe` VARCHAR(1), IN `total` INT(7), IN `bayar` INT(7))
BEGIN
	insert into transaksi values (NULL, idPkl, tipe, now(), total, bayar, bayar-total, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listPemodal`()
BEGIN
	select nama, deskripsi, saldo 
	from pemodal
	where isActive=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listPkl`(in dimodali int(1))
BEGIN
	select nama, deskripsi, alamat, kontak 
	from pkl
	where pkl.dimodali like dimodali and isActive=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listPklDetails`(in idPkl int(8), in idPem int(8))
BEGIN
	declare i, b int(1) default -1;
	select nama, deskripsi, alamat, kontak, saldo
	from pkl
	where pkl.idPkl=idPkl and isActive=1;
	
	call listPklTrans(idPkl);
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listPklTrans`(in idPkl int(8), in idPem int(8))
BEGIN
	declare b int(1) default -1;
	if(idPem != 0) then 
		set b = (select isFundedBy(idPkl, idPem)) || (select isFasilitator(idPem));
		if (b!=1) then 
			signal sqlstate '45000';
		end if;
	end if;
	select waktuTransaksi, tipe, total, bayar, kembalian
	from transaksi
	where idPkl=transaksi.idPkl and isActive=1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login`(in email varchar(50), in passwd varchar(50))
BEGIN
	
	select idUser as id, tipeUser as tipe, nama as username, email as mail, ktp as noKtp, noHp as hp 
	from (select idUser, tipeUser, nama, email, ktp, noHp, pass from user where user.email=email) as user_t
	where user_t.pass = pass;

	select count(idPkl)  as flag
	from pkl join user
	where pkl.idPkl = user.idUser and user.email=email;
	
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pklGetPemodal`(in idPkl int(8))
BEGIN
	declare i int(8) default -1;
	select dimodali from pkl where pkl.idPkl=idPkl and isActive = 1 into i;
	call getProfile(i);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `promote`(in idPkl int(8), in idProduk int(8))
BEGIN
	declare t int(8) default -1;
	select now()-waktu from promosi where promosi.idPkl = idPkl order by waktu desc limit 1 into t;
	if(t > 1000000) then
		insert into promosi values(NULL, idPkl, idProduk, now(), 1);
	end if;
	select t;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `register`(
in tipe varchar(15), in nama varchar(50), in email varchar(50), in passwd varchar(50), in ktp varchar(25), in hp varchar(25))
BEGIN
	insert into user values (NULL, tipe, nama, email, passwd, now(), NULL, NULL, ktp, hp, 1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sendMail`(in idKirim int(8), in idTujuan int(8), in subjek varchar(50), in pesan varchar(400))
BEGIN
	insert into pesan values (NULL, idKirim, idTujuan, subjek, pesan, 0, now(), 1);
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `isFasilitator`(idUser int(8)) RETURNS int(11)
BEGIN
	declare b int(1) default 0;
	select isActive from fasilitator where idFasilitator = idUser into b;
RETURN b;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `isFundedBy`(idPkl int(8), idPem int(8)) RETURNS int(11)
BEGIN
	declare b int(8) default 0;
	select isActive from pkl where pkl.idPkl=idPkl and idPem=dimodali into b;
RETURN b;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `isPKL`(idPkl int(8)) RETURNS int(11)
BEGIN
	declare b int(1) default 0;
	select isActive from pkl where pkl.idPkl=idPkl into b;
RETURN b;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitator`
--

CREATE TABLE IF NOT EXISTS `fasilitator` (
  `idFasilitator` int(8) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noHp` varchar(15) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idFasilitator`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitator`
--

INSERT INTO `fasilitator` (`idFasilitator`, `alamat`, `noHp`, `isActive`) VALUES
(5, 'asdf', 'saf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemtransaksi`
--

CREATE TABLE IF NOT EXISTS `itemtransaksi` (
  `idItem` int(11) NOT NULL AUTO_INCREMENT,
  `idTransaksi` int(8) NOT NULL,
  `idProduk` int(8) NOT NULL,
  `banyak` int(8) NOT NULL,
  `harga` int(8) NOT NULL,
  `total` int(8) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE IF NOT EXISTS `modal` (
  `idModal` int(8) NOT NULL AUTO_INCREMENT,
  `idPemodal` int(8) NOT NULL,
  `idPkl` int(8) NOT NULL,
  `tipe` enum('M','K','P') NOT NULL COMMENT 'Memodali, Kembalikan atau Prospek',
  `besarModal` int(8) NOT NULL,
  `statusModal` enum('P','O') NOT NULL DEFAULT 'P' COMMENT 'Pending atau OK',
  `waktuDikonfirm` datetime DEFAULT NULL,
  `dikonfirmOleh` int(8) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idModal`),
  KEY `idPemodal` (`idPemodal`,`idPkl`),
  KEY `idPkl` (`idPkl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `modal`
--

INSERT INTO `modal` (`idModal`, `idPemodal`, `idPkl`, `tipe`, `besarModal`, `statusModal`, `waktuDikonfirm`, `dikonfirmOleh`, `isActive`) VALUES
(1, 6, 2, 'M', 1000000, 'O', '2013-09-30 19:59:44', 5, 1),
(2, 6, 2, 'M', 15000, 'O', '2013-09-30 20:00:03', 5, 1),
(3, 6, 2, 'P', 0, 'O', '2013-09-30 20:29:15', 5, 1),
(4, 6, 3, 'P', 0, 'O', '2013-09-30 20:29:35', 5, 1),
(5, 6, 3, 'M', 1000000, 'O', '2013-09-30 20:33:49', 5, 1),
(6, 6, 4, 'P', 0, 'O', '2013-09-30 20:35:27', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemodal`
--

CREATE TABLE IF NOT EXISTS `pemodal` (
  `idPemodal` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `saldo` int(13) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPemodal`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemodal`
--

INSERT INTO `pemodal` (`idPemodal`, `nama`, `deskripsi`, `saldo`, `isActive`) VALUES
(6, 'a', 'a', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `idPesan` int(8) NOT NULL AUTO_INCREMENT,
  `idPengirim` int(8) NOT NULL,
  `idPenerima` int(8) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` varchar(400) NOT NULL,
  `baca` tinyint(1) NOT NULL,
  `waktuPesan` datetime NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPesan`),
  KEY `idPengirim` (`idPengirim`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idPesan`, `idPengirim`, `idPenerima`, `subjek`, `pesan`, `baca`, `waktuPesan`, `isActive`) VALUES
(2, 5, 2, '', 'asdf', 1, '2013-10-10 19:10:59', 1),
(4, 5, 0, '', 'qwer', 0, '2013-10-10 19:12:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pkl`
--

CREATE TABLE IF NOT EXISTS `pkl` (
  `idPkl` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `saldo` int(8) NOT NULL,
  `dimodali` int(8) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPkl`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkl`
--

INSERT INTO `pkl` (`idPkl`, `nama`, `deskripsi`, `alamat`, `kontak`, `saldo`, `dimodali`, `isActive`) VALUES
(2, 'qwer', 'qwer', 'qwer', 'qwer', 1015124, 6, 1),
(3, 'pkl3', 'aasdfasdf', 'asdfasdf', 'asdfasdf', 1015000, 6, 1),
(4, 'dfhsg', 'sfghwrt', 'sdfhs', 'gfhsfg', 1200, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idProduk` int(8) NOT NULL AUTO_INCREMENT,
  `idPkl` int(8) NOT NULL,
  `namaProduk` varchar(50) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `link` varchar(50) NOT NULL,
  `biayaModal` int(6) NOT NULL,
  `hargaJual` int(6) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idProduk`),
  KEY `idPkl` (`idPkl`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `idPkl`, `namaProduk`, `deskripsi`, `link`, `biayaModal`, `hargaJual`, `isActive`) VALUES
(1, 2, 'asdf', 'asdf', 'asdf', 12, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE IF NOT EXISTS `promosi` (
  `idPromosi` int(11) NOT NULL AUTO_INCREMENT,
  `idPkl` int(8) NOT NULL,
  `idProduk` int(8) NOT NULL,
  `waktu` datetime NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPromosi`),
  KEY `idPkl` (`idPkl`),
  KEY `idProduk` (`idProduk`),
  KEY `idPkl_2` (`idPkl`),
  KEY `idProduk_2` (`idProduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`idPromosi`, `idPkl`, `idProduk`, `waktu`, `isActive`) VALUES
(1, 2, 1, '2013-09-23 00:00:00', 1),
(2, 2, 1, '2013-09-25 22:00:10', 1),
(5, 2, 1, '2013-09-27 21:59:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idPkl` int(8) NOT NULL,
  `tipe` enum('O','I') NOT NULL,
  `waktuTransaksi` datetime NOT NULL,
  `total` int(7) NOT NULL,
  `bayar` int(7) NOT NULL,
  `kembalian` int(7) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTransaksi`),
  KEY `idPkl` (`idPkl`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idPkl`, `tipe`, `waktuTransaksi`, `total`, `bayar`, `kembalian`, `isActive`) VALUES
(1, 2, 'O', '2013-09-28 16:55:50', 2300, 3000, -700, 1),
(2, 2, 'O', '2013-09-28 16:56:17', 2300, 3000, -700, 1),
(3, 2, 'O', '2013-09-28 16:57:26', 2300, 3000, -700, 1),
(4, 2, 'O', '2013-09-28 16:57:56', 2300, 3000, -700, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(8) NOT NULL AUTO_INCREMENT,
  `tipeUser` enum('PKL','Pemodal','Fasilitator') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `waktuDaftar` datetime NOT NULL,
  `dikonfirmOleh` int(8) DEFAULT NULL,
  `kapanDikonfirm` datetime DEFAULT NULL,
  `ktp` varchar(25) NOT NULL,
  `noHp` varchar(25) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`,`ktp`),
  KEY `isActive` (`isActive`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `tipeUser`, `nama`, `email`, `pass`, `waktuDaftar`, `dikonfirmOleh`, `kapanDikonfirm`, `ktp`, `noHp`, `isActive`) VALUES
(2, 'PKL', 'haiii', 'sadf', 'asdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 'asdf', NULL, 1),
(3, 'PKL', 'qwerty', 'qwerty', 'qwerty', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '123', NULL, 1),
(4, 'PKL', 'a', 'a', 'a', '2013-09-26 19:57:24', 5, '2013-09-29 21:50:08', 'a', '', 1),
(5, 'Fasilitator', 'as', 'as', 'as', '2013-09-26 19:57:55', NULL, NULL, 'as', '', 1),
(6, 'Pemodal', 'aas', 'aas', 'aas', '2013-09-26 19:58:23', 5, '2013-09-27 21:47:21', 'aas', '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitator`
--
ALTER TABLE `fasilitator`
  ADD CONSTRAINT `fasilitator_ibfk_5` FOREIGN KEY (`idFasilitator`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitator_ibfk_6` FOREIGN KEY (`isActive`) REFERENCES `user` (`isActive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modal`
--
ALTER TABLE `modal`
  ADD CONSTRAINT `modal_ibfk_1` FOREIGN KEY (`idPemodal`) REFERENCES `pemodal` (`idPemodal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modal_ibfk_2` FOREIGN KEY (`idPkl`) REFERENCES `pkl` (`idPkl`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemodal`
--
ALTER TABLE `pemodal`
  ADD CONSTRAINT `pemodal_ibfk_5` FOREIGN KEY (`idPemodal`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemodal_ibfk_6` FOREIGN KEY (`isActive`) REFERENCES `user` (`isActive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`idPengirim`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pkl`
--
ALTER TABLE `pkl`
  ADD CONSTRAINT `pkl_ibfk_6` FOREIGN KEY (`idPkl`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pkl_ibfk_7` FOREIGN KEY (`isActive`) REFERENCES `user` (`isActive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_4` FOREIGN KEY (`idPkl`) REFERENCES `pkl` (`idPkl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_5` FOREIGN KEY (`isActive`) REFERENCES `user` (`isActive`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promosi`
--
ALTER TABLE `promosi`
  ADD CONSTRAINT `promosi_ibfk_4` FOREIGN KEY (`idPkl`) REFERENCES `pkl` (`idPkl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promosi_ibfk_5` FOREIGN KEY (`idProduk`) REFERENCES `produk` (`idProduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`idPkl`) REFERENCES `pkl` (`idPkl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`isActive`) REFERENCES `user` (`isActive`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
