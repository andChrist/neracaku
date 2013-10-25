<?php
class Login extends CI_Controller
{
    public function index()
    {
        $this->load->model('pengguna_model');
        $data['email']=$_POST['email'];
        $data['password']=$_POST['password'];
		session_start();
        $_SESSION['user']= $this->pengguna_model->login_model($data['email'], $data['password']);
		$data['username'] = $_SESSION['user']['username'];
		
        
		$header['title']='Login';
		$this->load->helper('assets');
		$data['css'] = load_css(array('general/reset.css', 'general/style.css', 'pkl/home/home.css'));
		$data['js'] = load_js('');
        
		$this->load->view('template/header_pkl',$data);
		
		if($_SESSION['user']['tipe'] == 'PKL'){
            $this->load->view('pkl/home/home_view',$data);
			$this->load->view('template/footer');
        }else if($_SESSION['user']['tipe'] == 'Pemodal'){
			$this->load->view('pemodal/profil/profil_pemodal',$data);
			$this->load->view('template/footer');
        }else{
			$this->login_view();
		}
    }
	
    public function login_view()
    {
        $header['title']='Login';
        $header['user']='NotLogin';
		
		$this->load->helper('assets');
		$header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/profil/profil_style.css'));
		$header['js'] = load_js('');
		
        $this->load->view('template/header',$header);
        $this->load->view('general/login_view');
        $this->load->view('template/footer');
    }
    
    public function dummy_produk_list_view(){
        $this->load->helper('assets');
        $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/profil/profil_style.css', 'pkl/produk/produk_list_style.css'));
		$header['js'] = load_js('');
        $this->load->view('template/header_pkl', $header);
        $this->load->view('pkl/produk/produk_list');
        $this->load->view('template/footer');
    }
    
    public function dummy_transaksi_pemodal(){
        $this->load->helper('assets');
        $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/profil/profil_style.css', 'pkl/transaksi/transaksi_list_style.css'));
		$header['js'] = load_js('');
        $this->load->view('template/header_pkl', $header);
        $this->load->view('pemodal/transaksi/transaksi_pemodal');
        $this->load->view('template/footer');
    }
    
    public function dummy_pesan_view(){
        $this->load->view('header_pkl');
        $this->load->view('pesan_view');
        
    }
}
?>
