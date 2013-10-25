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
        <link rel="stylesheet" type="text/css" href='<?php echo base_url();?>resources/styles/general/style.css'/>
    </head>
    <body>   
        <div id='header'>
            <div id="header_wrapper">
                <span id='header_logo'>
                    <a><img alt="neracaku" src="<?php echo base_url();?>resources/images/icon.png"/></a>
                </span>                
            </div>
        </div>
        
        <div id="wrapper">           
            <!-- Isi disini-->
            <div id="mainbody">    