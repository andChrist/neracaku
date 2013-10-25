<?php
	class home extends CI_Controller{
		public function home_view()
		{
			$header['title']='Home';
			$header['user']='NotLogin';
			$this->load->helper('assets');
			$header['css'] = load_css(array('general/reset.css', 'general/style.css', 'pkl/home/home.css'));
			$header['js'] = load_js('');
            $this->load->view('template/header_pkl',$header);
			$this->load->view('pkl/home/home_view');
			$this->load->view('template/footer');
		}
	}
?>