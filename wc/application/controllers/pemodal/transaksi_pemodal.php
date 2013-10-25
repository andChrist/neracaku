<?php

/**
 * @author lolkittens
 * @copyright 2013
 */
class transaksi_pemodal extends CI_Controller
{
    public function index()
    {
       
    }
    
    public function transaksi_pemodal_view(){
        $this->load->helper('assets');
        $header['css'] = load_css(array('general/reset.css', 'general/style.css', 'general/nav.css', 'general/general/smoothness/jquery-ui-1.10.3.custom.min.css', 'pemodal/transaksi/transaksi_pemodal.css', 'general/profil/profil_style.css'));
    		$header['js'] = load_js(array('general/jquery-1.10.2.min.js', 'general/jquery-ui-1.10.3.custom.min.js'));
        
        $this->load->view('template/header_pkl', $header);
        $this->load->view('pemodal/transaksi/transaksi_pemodal');
        $this->load->view('template/footer');
    }
}
?>
