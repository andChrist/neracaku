<?php
    class transaksi extends CI_Controller{
		public function index()
		{
			$header['title']='Transaksi';
			$header['user']='NotLogin';
            $header['activetab']='transaksi';
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'pkl/transaksi/transaksi.css', 'general/jquery.custom-scrollbar.css', 'general/smoothness/jquery-ui-1.10.3.custom.min.css'));
			$header['js'] = load_js(array('general/jquery-1.10.2.min.js', 'general/jquery-ui-1.10.3.custom.min.js', 'general/jquery.custom-scrollbar.js'));
            $this->load->view('template/header_pkl',$header);
			$this->load->view('pkl/transaksi/transaksi');
			$this->load->view('template/footer');
		}
        
        public function listtransaksi(){
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'general/general/smoothness/jquery-ui-1.10.3.custom.min.css', 'pkl/transaksi/transaksi_list_style.css'));
    		$header['js'] = load_js(array('general/jquery-1.10.2.min.js', 'general/jquery-ui-1.10.3.custom.min.js'));
                
            $this->load->view('template/header_pkl', $header);
            $this->load->view('pkl/transaksi/transaksi_list');
            $this->load->view('template/footer');
        }
        
        public function detiltransaksi(){
            $header['title']='Detil Transaksi';
			$header['user']='NotLogin';
			$this->load->helper('assets');
			$header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'pkl/transaksi/transaksi_item.css'));
			$header['js'] = load_js('');
			$this->load->view('template/header_pkl',$header);
			$this->load->view('pkl/transaksi/transaksi_item_view');
			$this->load->view('template/footer');
        }
	}

?>