<?php
    class produk extends CI_Controller{
		public function index()
		{
            session_start();
			$header['title']='Produk';
			$header['user']='NotLogin';
            $header['activetab']='produk';
            $this->load->helper('assets');
            $this->load->model("produk_model");
            //$data['barang'] = $this->produk_model->getProduct_model($_SESSION['user']['id'], false);
            $data['barang'] = $this->produk_model->getProduct_model(2, false);
            $data['json'] = json_encode($data['barang']);
            $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'pkl/produk/produk.css', 'general/smoothness/jquery-ui-1.10.3.custom.min.css', 'general/jquery.custom-scrollbar.css'));
			$header['js'] = load_js(array('general/jquery-1.10.2.min.js', 'general/jquery.custom-scrollbar.js', 'general/jquery-ui-1.10.3.custom.min.js'));
            $this->load->view('template/header_pkl',$header);
			$this->load->view('pkl/produk/produk', $data);
			$this->load->view('template/footer');
		}
        
        public function addBarang(){
            session_start();
            $data = $this->input->post();
            $this->load->model("produk");
            $this->produk_model->insertProduct_model($_SESSION['user']['id'], $data['namabarang'], $data['deskripsi'], $data['biaya'], $data['harga'], $data['link']);
            $this->index();
        }
	}

?>