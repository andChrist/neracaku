<?php
    class userlist extends CI_Controller{
        public function index($filter = 'PKL_Pemodal'){
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'fasilitator/userlist/userlist.css'));
    		$header['js'] = load_js('');
            $header['title']='Daftar Pengguna';
            if($filter == 'pkl'){
                //$data['json'] = $this->laporan_model->listPkl_model(1);
            }else{
                //$data['json'] = $this->laporan_model->listPemodal_model();
            }
            $this->load->view('template/header_pkl',$header);
            //$this->load->view('menu');
            $this->load->view('fasilitator/userlist', $data);
            $this->load->view('template/footer');
        }
        
        public function listUser($filter){
            sadfasdfasd
        }
    }
?>