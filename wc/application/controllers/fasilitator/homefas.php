<?php
    session_start();
    class homefas extends CI_Controller{
        public function index(){
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'fasilitator/regitrasimodal.css'));
    		$header['js'] = load_js('');
            $this->load->model('laporan_model');
            $data['json'] = json_decode($this->laporan_model->listPenggunaNonApprove_model());
            $header['title']='Registrasi';
            $this->load->view('template/header_pkl',$header);
            //$this->load->view('menu');
            $this->load->view('fasilitator/homefas', $data);
            $this->load->view('template/footer');
        }
        
        public function confirmRegister($idUser){
            $this->load->model('fasilitator_model');
            $this->fasilitator_model->confirmRegister_model($idUser, 5);
            $this->index();
            
        }
    }
?>