<?php

#Method yang sudah dibuat
#login, register, confirmRegister, insertProduk, get(All)Produk, promote, insertTransaction, sendMail,

/**
 * Kelas untuk mengakses database Neracaku. Kembalian kelas ini selalu antara 1, false atau array of mysql_result. Untuk key array of mysql_result ada di dokumentasi tiap method.
 * 
 * @author kruger
 * @copyright 2013
 * @version 1
 * @access public
 */
class Database
{

    private $mysql;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "pkl";
    private $conn_err = false;

    function __construct()
    {
        $this->mysql = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        if ($this->mysql->connect_errno)
        {
            $this->conn_err = true;
        }
    }

    function __destruct()
    {
        $this->mysql->close();
    }

    /**
     * Untuk mengecek apakah ada error ketika membuat koneksi ke DB.
     * @return boolean
     */
    function connect_error()
    {
        return $this->conn_err;
    }

    /**
     * Untuk user login ke Neracaku. 
     * <br />Key[0] : id, tipe, username, mail, noKtp, hp. 
     * <br />Key[1] : flag_dimodali.
     * @param string email.
     * @param string password.
     * @return array mysql_result. 
     */
    public function login($email, $pass)
    {
        $query = "login(?,?)";
        $stmt = $this->prepareCall($query, 'ss', $email, $pass);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }

    /**
     * Untuk PKL dan pemodal register ke Neracaku. Gunakan juga untuk mendaftarkan fasilitator.
     * @param string tipe_user.
     * @param string email.
     * @param string password.
     * @param string nama.
     * @param string no_ktp.
     * @param string no_hp.
     * @return int 1 jika berhasil.
     */
    public function register($tipe, $email, $pass, $nama, $ktp, $hp = "")
    {
        $query = "register(?,?,?,?,?,?)";
        $stmt = $this->prepareCall($query, 'ssssss', $tipe, $nama, $email, $pass, $ktp,
            $hp);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }
    
    /**
     * Untuk user melihat profil mereka.
     * 
     * @param int idUser.
     * @return array mysql_result
     */
     public function getProfile($idUser)
     {
        $query = "getProfile(?)";
        $stmt = $this->prepareCall($query, 's', $idUser);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
     }

    /**
     * Untuk user memasukkan profile mereka. Tiga parameter untuk PKL, 4 parameter untuk pemodal, 5 parameter untuk fasilitator.
     * <br />PKL : ID_user, nama_PKL, deskripsi_PKL, alamat_PKL, kontak_PKL.
     * <br />Pemodal : ID_user, nama_pemodal, deskripsi_pemodal, saldo_dana.
     * <br />Fasilitator : ID_user, alamat, no_hp.
     * @return int 1 jika berhasil.
     */
    public function insertProfile()
    {
        $count = func_num_args();
        if ($count == 0)
            return false;

        $args = func_get_args();
        if ($count == 5) //insert profil PKL
        { 
            $query = "insertProfilePKL(?,?,?,?,?)";
            $stmt = $this->prepareCall($query, 'issss', $args[0], $args[1], $args[2], $args[3],
                $args[4]);
        } elseif ($count == 4) //insert profil pemodal
        { 
            $query = "insertProfilePemodal(?,?,?,?)";
            $stmt = $this->prepareCall($query, 'issi', $args[0], $args[1], $args[2], $args[3]);
        } elseif ($count == 3) //insert profil fasilitator
        { 
            $query = "insertProfileFas(?,?,?)";
            $stmt = $this->prepareCall($query, 'iss', $args[0], $args[1], $args[2]);
        } else
            return false;
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }
    
    /**
     * Untuk PKL melihat status pemodal mereka.
     * @param int idUser.
     * @return array mysql_result.
     */
     public function checkFunding($idPkl){
        $query = "pklGetPemodal(?)";
        $stmt = $this->prepareCall($query, 'i', $idPkl);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
     }

    /**
     * Untuk PKL memasukkan saldo ke profil mereka.
     * @param int idPkl.
     * @param int saldo.
     * @param int idPemodal.
     * @param string tipe modal. M : Memodali, P : Prospek, K : Kembalian.
     * @return int 1 jika berhasil.
     */
    public function addBalance($idPkl, $saldo, $idPemodal = false, $tipe = 'M')
    {
        if (!$idPemodal)
        { //PKL menambah saldo sendiri
            $query = "addBalance(?,?)";
            $stmt = $this->prepareCall($query, 'ii', $idPkl, $saldo);
        } else
        { // Pemodal memodali PKL atau PKL membayar Pemodal
            $query = "fundPkl(?,?,?,?)";
            $stmt = $this->prepareCall($query, 'iiis', $idPkl, $idPemodal, $saldo, $tipe);
        }
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }
    
    /**
     * Untuk PKL dan pemodal melihat list transaksi yang sudah dilakukan.
     * <br />Key[0] : waktuTransaksi, tipe, total, bayar, kembalian.
     * @param int idPKL.
     * @param int idPemodal.
     * @return array mysql_result.
     */
     public function listTransaction($idPkl, $idPem=0)
     {
        $query = "listPklTrans(?,?)";
        $stmt = $this->prepareCall($query, 'ii', $idPkl, $idPem);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
     }
     
     /**
     * Untuk PKL dan pemodal melihat list transaksi yang sudah dilakukan.
     * <br />Key[0] : waktuTransaksi, tipe, total, bayar, kembalian.
     * @param int idPKL.
     * @param int idPemodal.
     * @return array mysql_result.
     */
     public function getDetilTransaction($notransaksi, $idPkl)
     {
        $query = "getdetiltransaksi(?,?)";
        $stmt = $this->prepareCall($query, 'ii', $notransaksi, $idPkl);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
     }
     
    /**
     * Untuk PKL memasukkan data transaksi penjualan atau pembelian.
     * @param int idPkl.
     * @param string tipe_transaksi. I atau O.
     * @param int total_pembelian.
     * @param int uang_yang_dibayarkan.
     * @return int total_uang_kembalian.
     */
    public function insertTransaction($idPkl, $tipe, $total, $bayar)
    {
        $query = "insertTransaction(?,?,?,?)";
        $stmt = $this->prepareCall($query, 'isii', $idPkl, $tipe, $total, $bayar);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return $bayar - $total;
        }
    }
    
    /**
     * Untuk PKL promosi satu barang per hari.
     * @param string idPkl.
     * @param string idProduk.
     * @return int success indicator. >= 1000000 success, < 1000000 gagal.
     */
    public function promote($idPkl, $idProduk)
    {
        $query = "promote(?,?)";
        $stmt = $this->prepareCall($query, 'ss', $idPkl, $idProduk);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }

    /**
     * Untuk PKL memasukkan produk baru ke DB.
     * @param string idPkl.
     * @param string nama_produk.
     * @param string deskripsi_produk.
     * @param string link_gambar_produk.
     * @param int harga_beli_produk.
     * @param int harga_jual_produk.
     * @return int 1 jika berhasil.
     */
    public function insertProduk($idPkl, $namaProduk, $deskripsi, $biaya, $harga, $link)
    {
        $query = "insertProduk(?,?,?,?,?,?)";
        $stmt = $this->prepareCall($query, 'ssssii', $idPkl, $namaProduk, $deskripsi, $link,
            $biaya, $harga);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }

    /**
     * Untuk user melihat list atau detil produk yang dimiliki PKL.
     * <br />Key[0] : namaProduk, shortdes (deskripsi kalau satu barang), link, [biayaModal, hargaJual].
     * @param string id_PKL.
     * @param string id_Produk kalau ada barang yang dipilih spesifik.
     * @return array mysql_result. Satu atau semua barang milik PKL. 
     */
    public function getProduk($idPkl, $idProduk = false)
    {
        if ($idProduk)
        {
            $query = "getProduk(?,?)";
        } else
        {
            $query = "getAllProduk(?)";
        }
        if ($idProduk)
        {
            $stmt = $this->prepareCall($query, 'ii', $idPkl, $idProduk);
        } else
        {
            $stmt = $this->prepareCall($query, 'i', $idPkl);
        }
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }

    /**
     * Untuk fasilitator mengkonfirmasi pendaftaran user.
     * @param string idUser.
     * @param string idFasilitator.
     * @return int 1 jika berhasil.
     */
    public function confirmRegister($idUser, $idFas)
    {
        $query = "confirmRegister(?,?)";
        $stmt = $this->prepareCall($query, 'ss', $idUser, $idFas);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }

    /**
     * Untuk fasilitator mengkonfirm pemodalan.
     * @param int idModal.
     * @param int idFasilitator.
     * @return int 1 jika berhasil.
     */
    public function confirmFunding($idModal, $idFas)
    {
        $query = "confirmFunding(?,?)";
        $stmt = $this->prepareCall($query, 'ii', $idModal, $idFas);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }
    
    /**
     * Untuk fasilitator melihat semua pemodalan yang belum diapprove
     * @return int 1 jika berhasil.
     */
    public function listPemodalanNonApprove()
    {
        $query = "listpemodalan()";
        $stmt = $this->prepareCall($query);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }

    /**
     * Untuk pemodal dan fasilitator melihat semua PKL.
     * <br />Key[0] : nama, deskripsi, alamat, kontak.
     * @param string status_dimodali. % untuk semua PKL, 1 untuk PKL yang sudah dimodali, 0 untuk PKL yang belum dimodali.
     * @return array mysql_result. 
     */
    public function listPKL($status = '1')
    {
        $query = "listPkl(?)";
        $stmt = $this->prepareCall($query, 's', $status);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }
    
    /**
     * Untuk pemodal atau fasilitator melihat detil PKL. Panjang array 1 jika PKL yang dipilih tidak sedang dimodali, 2 jika sedang dimodali atau oleh fasilitator.
     * <br />Key[0] : nama, deskripsi, alamat, kontak, saldo.
     * <br />Key[1] : waktuTransaksi, tipe, total, bayar, kembalian.
     * @param int idPkl.
     * @param int idPemodal / idFasilitator.
     * @return array mysql_result.
     */
     public function listPklDetails($idPkl, $idPemodal)
     {
        $query = "listPklDetails(?,?)";
        $stmt = $this->prepareCall($query, 'ii', $idPkl, $idPemodal);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
     }
    
    /**
     * Untuk fasilitator melihat semua pemodal.
     * <br />Key[0] : nama, deskripsi, saldo.
     * @return array mysql_result. 
     */
    public function listPemodal()
    {
        $query = "listPemodal()";
        $stmt = $this->prepareCall($query);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }
    
    /**
     * Untuk melist semua pengguna baru yang belum diapprove
     * <br />Key[0] : waktuDaftar, tipeUser, nama, email, ktp, noHp
     * @return array mysql_result. 
     */
     public function listPenggunaNonApproved()
    {
        $query = "listusernonapproved()";
        $stmt = $this->prepareCall($query);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }

    /**
     * Untuk pemodal dan fasilitator mengirim pesan ke user lain.
     * @param string idPengirim.
     * @param string idTujuan, 0 untuk broadcast.
     * @param string pesan yang dikirim.
     * @return int 1 jika berhasil.
     */
    public function sendMail($pesan, $idPengirim, $idTujuan = 0)
    {
        $query = "sendMail(?,?,?)";
        $stmt = $this->prepareCall($query, 'sss', $idPengirim, $idTujuan, $pesan);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $stmt->close();
            return 1;
        }
    }

    /**
     * Untuk user melihat pesan atau feedback dari user lain.
     * <br />Key[0] : idPesan, nama, pesan, waktuPesan.
     * @param string idPkl.
     * @return array mysql_result. 
     */
    public function getMail($idPkl)
    {
        $query = "getAllMail(?)";
        $stmt = $this->prepareCall($query, 's', $idPkl);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }
    
    /**
     * Untuk mengambil banyak pesan yang baru.
     * <br />Key[0] : count.
     * @param int idUser.
     * @return array mysql_result. 
     */
     public function getNewMessageCount($idUser){
        $query = "getNewMessageCount(?)";
        $stmt = $this->prepareCall($query, 's', $idUser);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
     }
    
    /**
     * Untuk mengambil semua pengumuman dari fasilitator
     * <br />Key[0] : pesan, waktuPesan.
     * @param int batas_pesan_yang_akan_diambil
     * @return array mysql_result. 
     */
    public function getAllNews($limit = 3){
        $query = "getAllNews()";
        $stmt = $this->prepareCall($query, i, $limit);
        $exec = $stmt->execute();
        if (!$exec)
        {
            //echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            return false;
        } else
        {
            $result = array();
            do
            {
                $result[] = $stmt->get_result();
            } while ($stmt->more_results() && $stmt->next_result());
            $stmt->close();
            return $result;
        }
    }

    /**
     * Gunakan untuk menyiapkan pemanggilan procedure. 1 atau 3+ parameter.
     * Method ini ngga perlu dipikirin. Kalian ngga akan pake method ini.
     * @param string query yang akan dipanggil. Index 0
     * @param string type_defintion. Index 1
     * @param array yang akan dibind. Index 2, ...
     * @return objek mysqli_stmt 
     */
    private function prepareCall()
    {
        $count = func_num_args();
        if ($count != 0)
        {
            $arguments = func_get_args();
            if (!$stmt = $this->mysql->prepare("call " . $arguments[0]))
            {
                //echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
                return false;
            }
            if ($count > 1)
            {
                $binds = array();
                $binds[] = $arguments[1];
                for ($i = 2; $i < $count; $i++)
                {
                    $binds[] = &$arguments[$i];
                }
                call_user_func_array(array($stmt, "bind_param"), $binds);
            }
            return $stmt;
        }
        return false;
    }


}

?>