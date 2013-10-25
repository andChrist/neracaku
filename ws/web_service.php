<?php
	require_once "lib/nusoap.php";
	
	require_once "login_engine.php";
	require_once "signup_engine.php";
	require_once "getProfile_engine.php";
	require_once "insertProfilePkl_engine.php";
	require_once "insertProfilePemodal_engine.php";
	require_once "insertProfileFasilitator_engine.php";
	require_once "confirmRegister_engine.php";
	require_once "confirmFunding_engine.php";
	require_once "sendMail_engine.php";
	require_once "addBalance_engine.php";
	require_once "checkFunding_engine.php";
	require_once "listTransaction_engine.php";
	require_once "insertTransaction_engine.php";
	require_once "promote_engine.php";
	require_once "insertProduct_engine.php";
	require_once "getProduct_engine.php";
	require_once "listPkl_engine.php";
	require_once "listPemodal_engine.php";
	require_once "getMail_engine.php";
	require_once "getNewMessageCount_engine.php";
	require_once "getAllNews_engine.php";
	require_once "getDetilTransaction_engine.php";
	require_once "listPklDetail_engine.php";
	require_once "listPklDetailDimodali_engine.php";
	require_once "listPemodalanNonApprove_engine.php";
	require_once "listPenggunaNonApprove_engine.php";
	
	$server = new soap_server();
	$myNamespace = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
	$server->configureWSDL("web_service", 'urn:' . $myNamespace);
	
	/**
	* Digunakan untuk login
	* Parameter input adalah email dan pass
	* Return type adalah array 1D
	* array key = id, tipe, username, mail, noKtp, hp, flag 
	*/
	initLogin($server);
	registerLogin($myNamespace);
	function loginWS($email, $pass){
		$result = login($email, $pass);
		return $result;
	}
	
	/**
	* Digunakan untuk register
	* Parameter input adalah tipe, email, pass, nama, ktp, hp
	* Return 1 jika berhasil 0 jika gagal
	*/
	initSignUp($server);
	registerSignUp($myNamespace);
	function signUpWS($tipe, $email, $pass, $nama, $ktp, $hp){
		$result = signUp($tipe, $email, $pass, $nama, $ktp, $hp);
		return $result;
	}
	
	/**
	* Digunakan untuk mengembalikan profile
	* Parameter input adalah idUser
	* Return array informasi
	* Jika PKL, array key = nama, deskripsi, alamat, kontak, saldo
	* Jika Pemodal, array key = nama, deskripsi, saldo
	* Jika Fasilitator, array key = alamat, noHp
	*/
	initGetProfile($server);
	registerGetProfile($myNamespace);
	function getProfileWS($idUser){
		$result = getProfile($idUser);
		return $result;
	}
	
	/**
	* Digunakan untuk memasukkan profile PKL
	* Parameter input id user, nama pkl, deskripsi pkl, alamat pkl, kontak pkl
	* Return 1 jika berhasil 0 jika gagal
	*/
	initInsertProfilePkl($server);
	registerInsertProfilePkl($myNamespace);
	function insertProfilePklWS($ID_user, $nama_pkl, $deskripsi_pkl, $alamat_pkl, $kontak_pkl){
		$result = insertProfilePkl($ID_user, $nama_pkl, $deskripsi_pkl, $alamat_pkl, $kontak_pkl);
		return $result;
	}
	
	/**
	* Digunakan untuk memasukkan profile Pemodal
	* Parameter input id user, nama pemodal, deskripsi pemodal, saldo dana 
	* Return 1 jika berhasil 0 jika gagal
	*/
	initInsertProfilePemodal($server);
	registerInsertProfilePemodal($myNamespace);
	function insertProfilePemodalWS($ID_user, $nama_pemodal, $deskripsi_pemodal, $saldo_dana){
		$result = insertProfilePemodal($ID_user, $nama_pemodal, $deskripsi_pemodal, $saldo_dana);
		return $result;
	}
	
	/**
	* Digunakan untuk memasukkan profile Fasilitator
	* Parameter input id user, alamat, no hp
	* Return 1 jika berhasil 0 jika gagal
	*/
	initInsertProfileFasilitator($server);
	registerInsertProfileFasilitator($myNamespace);
	function insertProfileFasilitatorWS($ID_user, $alamat, $no_hp){
		$result = insertProfileFasilitator($ID_user, $alamat, $no_hp);
		return $result;
	}
	
	/**
	* Digunakan untuk melakukan konfirmasi registrasi
	* Parameter input idUser dan idFasilitator
	* Return 1 jika berhasil 0 jika gagal
	*/
	initConfirmRegister($server);
	registerConfirmRegister($myNamespace);
	function confirmRegisterWS($idUser, $idFas){
		$result = confirmRegister($idUser, $idFas);
		return $result;
	}
	
	/**
	* Digunakan untuk melakukan konfirmasi funding
	* Parameter input adalah idModal dan idFasilitator
	* Return 1 jika berhasil dan 0 jika gagal
	*/
	initConfirmFunding($server);
	registerConfirmFunding($myNamespace);
	function confirmFundingWS($idModal, $idFas){
		$result = confirmFunding($idModal, $idFas);
		return $result;
	}
	
	/**
	* Digunakan untuk melakukan pengiriman pesan
	* Parameter input pesan, idPengirim, idTujuan
	* return 1 berhasil 0 gagal
	*/
	initSendMail($server);
	registerSendMail($myNamespace);
	function sendMailWS($pesan, $idPengirim, $idTujuan){
		$result = sendMail($pesan, $idPengirim, $idTujuan);
		return $result;
	}
	
	/**
	* Digunakan untuk menambahkan saldo
	* Parameter input idPkl, saldo, idPemodal, tipe
	* return 1 jika berhasil 0 jika gagal
	*/
	initAddBalance($server);
	registerAddBalance($myNamespace);
	function addBalanceWS($idPkl, $saldo, $idPemodal, $tipe){
		$result = addBalance($idPkl, $saldo, $idPemodal, $tipe);
		return $result;
	}
	
	/**
	* Digunakan untuk melakukan pengecekan pemodal
	* Parameter input idPkl
	* return array 1d
	* array key = nama, deskripsi, saldo
	*/
	initCheckFunding($server);
	registerCheckFunding($myNamespace);
	function checkFundingWS($idPkl){
		$result = checkFunding($idPkl);
		return $result;
	}
	
	/**
	* Digunakan untuk melist transaksi
	* Parameter input idPkl dan idPemodal
	* Return array 1D
	* array key = waktuTransaksi, tipe, total, bayar, kembalian
	*/
	initListTransaction($server);
	registerListTransaction($myNamespace);
	function listTransactionWS($idPkl, $idPem){
		$result = listTransaction($idPkl, $idPem);
		return $result;
	}
	
	/**
	* Digunakan untuk insert transaksi
	* Parameter input idPkl, tipe, total, bayar
	* return kembalian
	*/
	initInsertTransaction($server);
	registerInsertTransaction($myNamespace);
	function insertTransactionWS($idPkl, $tipe, $total, $bayar){
		$result = insertTransaction($idPkl, $tipe, $total, $bayar);
		return $result;
	}
	
	/**
	* Digunakan untuk promosi
	* Parameter input idPkl, idProduk
	* return 1 berhasil, 0 gagal
	*/
	initPromote($server);
	registerPromote($myNamespace);
	function promoteWS($idPkl, $idProduk){
		$result = promote($idPkl, $idProduk);
		return $result;
	}
	
	/**
	* Digunakan untuk menginsert barang
	* Parameter input idPkl, namaproduk, deskripsi, biaya, harga, link
	* return 1 berhasil 0 gagal
	*/
	initInsertProduct($server);
	registerInsertProduct($myNamespace);
	function insertProductWS($idPkl, $namaProduk, $deskripsi, $biaya, $harga, $link){
		$result = insertProduct($idPkl, $namaProduk, $deskripsi, $biaya, $harga, $link);
		return $result;
	}
	
	/**
	* Digunakan untuk get barang
	* Parameter input idPkl, idProduk (jika kosong diisi -1)
	* return Array1D
	* Jika semua barang, array key = namaProduk, deskripsi, link
	* Jika satu barang, array key = namaProduk, deskripsi, link, biayaModal, hargaJual
	*/
	initGetProduct($server);
	registerGetProduct($myNamespace);
	function getProductWS($idPkl, $idProduk){
		$result = getProduct($idPkl, $idProduk);
		return $result;
	}
	
	/**
	* Digunakan untuk list pkl
	* Parameter input status
	* return Array1D
	* array key = nama, deskripsi, alamat, kontak
	*/
	initListPkl($server);
	registerListPkl($myNamespace);
	function listPklWS($status){
		$result = listPkl($status);
		return $result;
	}
	
	/**
	* Digunakan untuk list pemodal
	* Parameter input -
	* return Array1D
	* array key = nama, deskripsi, saldo
	*/
	initListPemodal($server);
	registerListPemodal($myNamespace);
	function listPemodalWS(){
		$result = listPemodal();
		return $result;
	}
	
	/**
	* Digunakan untuk get Mail
	* Parameter input idPkl
	* return Array1D
	* array key = idPesan, nama, subjek, pesan, waktuPesan
	*/
	initGetMail($server);
	registerGetMail($myNamespace);
	function getMailWS($idPkl){
		$result = getMail($idPkl);
		return $result;
	}
	
	/**
	* Digunakan untuk jumlah pesan baru
	* Parameter input idUser
	* return int jumlah pesan baru
	*/
	initGetNewMessageCount($server);
	registerGetNewMessageCount($myNamespace);
	function getNewMessageCountWS($idUser){
		$result = getNewMessageCount($idUser);
		return $result;
	}
	
	/**
	* Digunakan untuk get semua pesan sesuai limit
	* Parameter input limit (int)
	* return Array1D
	* array key = pesan, waktuPesan
	*/
	initGetAllNews($server);
	registerGetAllNews($myNamespace);
	function getAllNewsWS($limit){
		$result = getAllNews($limit);
		return $result;
	}
	
	/**
	* Digunakan untuk get detil transaksi
	* Parameter input notransaksi dan idPkl
	* Return array 1D
	* array key = waktuTransaksi, tipe, total, bayar, kembalian
	*/
	initGetDetilTransaction($server);
	registerGetDetilTransaction($myNamespace);
	function getDetilTransactionWS($notransaksi, $idPkl){
		$result = getDetilTransaction($notransaksi, $idPkl);
		return $result;
	}
	
	/**
	* Digunakan untuk list Pkl Detail
	* Parameter input idPkl dan idPemodal
	* Return array 1D
	* array key = nama, deskripsi, alamat, kontak, saldo
	*/
	initListPklDetail($server);
	registerListPklDetail($myNamespace);
	function listPklDetailWS($idPkl, $idPemodal){
		$result = listPklDetail($idPkl, $idPemodal);
		return $result;
	}
	
	/**
	* Digunakan untuk get detil transaksi
	* Parameter input notransaksi dan idPkl
	* Return array 1D
	* array key = waktuTransaksi, tipe, total, bayar, kembalian
	*/
	initListPklDetailDimodali($server);
	registerListPklDetailDimodali($myNamespace);
	function listPklDetailDimodaliWS($idPkl, $idPemodal){
		$result = listPklDetailDimodali($idPkl, $idPemodal);
		return $result;
	}
	
	/**
	* Digunakan untuk list pemodalan non approve
	* Parameter input
	* Return Array 1D
	* Array Key : idModal, namaPemodal, namaPkl, besarModal
	*/
	initListPemodalanNonApprove($server);
	registerListPemodalanNonApprove($myNamespace);
	function listPemodalanNonApproveWS(){
		$result = listPemodalanNonApprove();
		return $result;
	}
	
	/**
	* Digunakan untuk list pengguna non approve
	* Parameter input
	* Return array 1D
	* array key : waktuDaftar, tipeUser, nama, email, ktp, noHp
	*/
	initListPenggunaNonApprove($server);
	registerListPenggunaNonApprove($myNamespace);
	function listPenggunaNonApproveWS(){
		$result = listPenggunaNonApprove();
		return $result;
	}
	
	$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
     
    // pass our posted data (or nothing) to the soap service
    $server->service($POST_DATA);
    exit(); 
?>