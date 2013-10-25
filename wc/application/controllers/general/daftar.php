<?php
class Daftar extends CI_Controller
{
    public function index()
    {
        $this->load->model('pengguna_model');
        $data['akun']=$_POST["akun"];
        $data['email']=$_POST["email"];
        $data['password']=$_POST["password"];
        $data['nama']=$_POST["nama"];
        $data['ktp']=$_POST["ktp"];
        $data['hp']=$_POST["hp"];
        $data['ifSignUp']=  $this->pengguna_model->signup_model($data["akun"], $data["email"], $data["password"], $data["nama"], $data["ktp"], $data["hp"]);
        $header['title']='Daftar';
		$data['notif'] = 'Tunggu persetujuan fasilitator selama maksimal 3 hari';
		 
		$header['title']='Login';
		$this->load->helper('assets');
		$header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/profil/profil_style.css'));
		$header['js'] = load_js('');
		 
        $this->load->view('template/header',$header);
        $this->load->view('general/login_view');
        $this->load->view('template/footer');
    }
    
    public function daftar_view(){
        $header['title']='Daftar';
		$header['title']='Login';
		
		$this->load->helper('assets');
		$header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/profil/profil_style.css'));
		$header['js'] = load_js('');
		
        $this->load->view('template/header',$header);
        $this->load->view('general/daftar_view');
        $this->load->view('template/footer');
    }
}
?>
