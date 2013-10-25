<?php
	class transaksi_item extends CI_Controller{
		public function transaksi_item_view()
		{
			$header['title']='Detil Transaksi';
			$header['user']='NotLogin';
			$this->load->helper('assets');
			$header['css'] = load_css(array('general/reset.css', 'general/style.css', 'pkl/transaksi/transaksi_item.css'));
			$header['js'] = load_js('');
			$this->load->view('template/header_pkl',$header);
			$this->load->view('pkl/transaksi/transaksi_item_view');
			$this->load->view('template/footer');
		}
	}
?>