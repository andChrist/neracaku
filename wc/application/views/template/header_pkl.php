<?php
    $this->load->helper('url');
    if(!isset($title))$title='';
    if(!isset($username))
    {
        
    }
    if(!isset($activetab))
    {
        $activetab='';
    }
?>            
<html>
    <head>
        <title>Neracaku | <?php echo $title?></title>
        <?php echo $css ?>
        <?php echo $js ?>
    </head>
    <body>   
        <div id='header'>
            <div id="header_wrapper">
                <span id='header_logo'>
                    <a><img alt="neracaku" src="<?php echo load_img('general/icon.png')?>"/></a>
                </span>
                
                     <?php echo isset($_SESSION['user']['username'])?"<span id='header_user'>
                        <a href='http://localhost/Neracaku/wc/index.php/pkl/profil_pkl/profil_pkl_view'>" . $_SESSION['user']['username'] . "</a> | <a>logout</a>
                        </span>":''?>
            </div>
        </div>
        
        <div id="navi">
            <div id="navi_wrapper">
                <ul id="menu">
                    <li class="navi_item <?php echo $activetab=='transaksi'?'':'in';?>active">
                        <a href="http://localhost/Neracaku/wc/index.php/pkl/transaksi">Transaksi</a>
                        <ul>
                            <li><a>Transaksi Baru</a></li>
                            <li><a>Lihat Transaksi</a></li>
                        </ul>
                    </li>
                    <li class="navi_item <?php echo $activetab=='produk'?'':'in';?>active">
                        <a href="http://localhost/Neracaku/wc/index.php/pkl/produk">Produk</a>
                    </li>
                    <li class="navi_item <?php echo $activetab=='pemodal'?'':'in';?>active">
                        <a href="http://localhost/Neracaku/wc/index.php/pkl/transaksi">Pemodal</a>
                    </li>
                    <li class="navi_item <?php echo $activetab=='pesan'?'':'in';?>active">
                        <a href="http://localhost/Neracaku/wc/index.php/pkl/transaksi">Pesan</a>
                    </li>
                    <li class="navi_item <?php echo $activetab=='setting'?'':'in';?>active">
                        <a href="http://localhost/Neracaku/wc/index.php/pkl/transaksi">Setting</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div id="wrapper">           
            <!-- Isi disini-->
            <div id="mainbody">    