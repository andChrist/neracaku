<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class='profile_header' style='background-color: #330099;'>
    <div class='profile_header_name'>
        <h3>Nama</h3>
        <p>Status</p>
    </div>
    <img src='<?php echo base_url();?>resources/images/promo1.jpg'>
</div>


<div id='profil_body'>
    
    <!--pembungkus deskripsi dan alamat dan kontak-->
    <div id='body_deskripsiDanAlamatDanKontak' style='float: left; width: 60%'>
        
        <!--deskripsi-->
        <div class='kotak_wrapper' style='width: 100%'>
            <div id='kotak_header' style='background-color: #1ab331'>
                <div id='kotak_text'>
                    <h2>Deskripsi</h2>
                </div>        
            </div>

            <div class='kotak_body' style='height: 210px'>
                <div id='kotak_text'>
                    <?php echo $description="asu"?>
                </div>
            </div>
        </div>

        <!--alamat dan kontak-->
        <div class='kotak_wrapper' style='width: 100%'>
            <div id='kotak_header' style='background-color: #ee226d'>
                <div id='kotak_text'>
                    <h2>Alamat dan Kontak</h2>
                </div>        
            </div>
            <div class='kotak_body' style='height: 336px'>
                <div id='kotak_text'>
                    <?php echo $description="asu"?>
                </div>
            </div>
        </div>
    </div>
    
    <!--transaksi-->
    <div class='kotak_wrapper' style='float: right; width: 40%'>
        
        <div class='kotak_body' style='height: 630px'>
            <div id="button_profil_wrapper">
                <input type='submit' class='button_profil' value='Transaksi'/> 
            </div>
			<div id='kotak_text' style='text-align:center'>
				Anda dimodali oleh pemodal <?php echo $pemodal="asu"?>.<br>
				Klik tombol di atas untuk melihat detail transaksi.
			</div>
        </div>
    </div>
    
</div>