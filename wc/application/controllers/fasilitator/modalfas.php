<?php
    class modalfas extends CI_Controller{
        public function index(){
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'fasilitator/regitrasimodal.css'));
    		$header['js'] = load_js('');
            $header['title']='Pemodalan';
            $this->load->model('laporan_model');
            $data['json'] = json_decode($this->laporan_model->listPemodalanNonApprove_model());
            $this->load->view('template/header_pkl',$header);
            //$this->load->view('menu');
            $this->load->view('fasilitator/modalfas', $data);
            $this->load->view('template/footer');
        }
        
        public function confirmFunding($idModal){
            
            $this->load->model('fasilitator_model');
            $this->fasilitator_model->confirmFunding_model($idModal, 5);
            $this->index();
        }
    }
?>