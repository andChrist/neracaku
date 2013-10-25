<?php
    class createfas extends CI_Controller{
        public function index(){
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'fasilitator/createfas/createfas.css'));
    		$header['js'] = load_js('');
            $header['title']='Registrasi';
            $this->load->view('template/header_pkl',$header);
            //$this->load->view('menu');
            $this->load->view('fasilitator/createfas');
            $this->load->view('template/footer');
        }
        
        public function create($username, $email, $pass){
            $this->load->model('fasilitator_model');
            $this->fasilitator_model->confirmRegister_model($username, $email, $pass);
            $this->index();
        }
    }
?>