
<div id='form'>
    <div id='login_box'>
        <form id='login_form' name='login_form' action='login' method='POST'>
            <span class='form_title'>Daftar</span>
            <label for='email'>Email</label>
            <input type='text' name='email' id='email'/>
            <label for='password'>Password</label>
            <input type='password' name='password' id="password"/>
            <label for='re_password'>Tulis ulang Password</label>
            <input type='password' name='re_password' id="re_password"/>
            <hr/>            
            <label for='nama'>Nama Lengkap</label>
            <input type='text' name='nama' id='nama'/>
            <label for='tanggal'>Tanggal Lahir</label>
            <select name="tanggal" id="tanggal">
                <?php for($i=1;$i<=31;$i++)
                {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }?>
            </select>
            <select name="bulan" id="bulan">
                <?php 
                $bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                foreach($bulan as $b)
                {
                    echo '<option value="'.$b.'">'.$b.'</option>';
                }?>
            </select>
            <select name="tahun" id="tahun">
                <?php for($i=2013;$i>=1900;$i--)
                {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }?>
            </select>
            <label for='ktp'>No. KTP</label>
            <input type='text' name='ktp' id='ktp'/>
            <label for='hp'>No. HP</label>
            <input type='text' name='hp' id='hp'/>
            <hr/>  
            
            <label for='akun'>Tipe Akun</label>
            <input type="radio" name="akun" value="pkl" class="mini"/>PKL
            <input type="radio" name="akun" value="pemodal" class="mini"/>Pemodal</br>
            <input type="checkbox" name="agree" value="yes" class="mini"/>I agree to <b>neracaku</b> Terms of Service and Privacy Policy
            <input type='submit' class='button red' value='Daftar'/> 
        </form>
    </div>
    
</div>
<div id='product_info'>
    <h2>Daftarkan diri anda</h2>
    <h3>dan nikmati layanan-layanan berikut</h3>
    <div class='promotion_item'>
        <div class='promo'>
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>
        <img src="resources/images/promo1.jpg" />        
    </div>
    <div class='promotion_item'>
        <div class='promo'>
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>
        <img src="resources/images/promo2.jpg" />        
    </div>
    <div class='promotion_item'>
        <div class='promo'>
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>
        <img src="resources/images/promo3.jpg" />        
    </div>
    <div class='promotion_item'>
        <div class='promo'>
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
        </div>
        <img src="resources/images/promo4.jpg" />        
    </div>

</div>