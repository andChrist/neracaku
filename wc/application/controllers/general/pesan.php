<?php
	class pesan extends CI_Controller{
		public function pesan_view()
		{
			$header['title']='Login';
			$header['user']='NotLogin';
            $this->load->helper('assets');
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'general/pesan/pesan.css', 'pkl/transaksi/transaksi_list_style.css', 'general/general/smoothness/jquery-ui-1.10.3.custom.min.css'));
			$header['js'] = load_js(array('general/jquery-1.10.2.min.js', 'general/jquery-ui-1.10.3.custom.min.js'));
			$this->load->view('template/header_pkl',$header);
			$this->load->view('general/pesan_view');
			$this->load->view('template/footer');
		}
	}
?>