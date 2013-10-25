<!--
buat bikin custom scrollbar
-->
<script>
    $(document).ready(function() {
      $(".listbarang").customScrollbar({
        skin: "default-skin"
      });
      $(".listbelian").customScrollbar({
        skin: "default-skin"
      });
    });
    $(function() {
        $( "#dialog" ).dialog({
          autoOpen: false,
          modal:true
        });
     
        $( "#btn" ).click(function() {
          $( "#dialog" ).dialog( "open" );
        });
      });
</script>
<div id="content">
    <div id="produk">
        <div id="produkheader">
            Daftar Barang
        </div>
        <div id="produkfilter">
            Filter : <input type="text" name="filter" />
        </div>
        <div class="listbarang default-skin">
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
            <div class="barang">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
            </div>
        </div>
    </div>
    <div id="transaksi">
        <div id="transaksiheader">
            <span id="transaksiheadertitle">Transaksi</span>
            <span id="transaksiheadertgl">1 Oktober 2013</span>
        </div>
        <div class="listbelian">
            <div class="barangbelian">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
                <span class="close">x</span>
                <div class="slider">
                    <div class="add">^</div>
                    <div>90</div>
                    <div class="substract">v</div>
                </div>
            </div>
            <div class="barangbelian">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
                <span class="close">x</span>
                <div class="slider">
                    <div class="add">^</div>
                    <div>90</div>
                    <div class="substract">v</div>
                </div>
            </div>
            <div class="barangbelian">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
                <span class="close">x</span>
                <div class="slider">
                    <div class="add">^</div>
                    <div>90</div>
                    <div class="substract">v</div>
                </div>
            </div>
            <div class="barangbelian">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
                <span class="close">x</span>
                <div class="slider">
                    <div class="add">^</div>
                    <div>90</div>
                    <div class="substract">v</div>
                </div>
            </div>
            <div class="barangbelian">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
                <span class="close">x</span>
                <div class="slider">
                    <div class="add">^</div>
                    <div>90</div>
                    <div class="substract">v</div>
                </div>
            </div>
            <div class="barangbelian">
                <span class="barangimg"><img src="<?php echo load_img('pkl/transaksi/img1.jpg')?>"/></span>
                <span class="deskripsi">asdfasdf</span>
                <span class="close">x</span>
                <div class="slider">
                    <div class="add">^</div>
                    <div>90</div>
                    <div class="substract">v</div>
                </div>
            </div>
        </div>
        <div id="totalharga">
            <span>Total : Rp. 999.999</span>
            <span><input type="button" value="Bayar" id="btn" class="bayar"/></span>
            <div id="dialog" title="Pembayaran">
                <div>Total : Rp. 999.999<input type="hidden" /></div>
                <div>Bayar : <input type="text" id="bayar" required="" placeholder="Masukkan bayaran di sini" /></div>
                <div>Kembali : </div>
                <div style="margin: 3px;"></div>
                <input type="button" value="Batal" id="btn"/>
                <input type="button" value="Bayar" id="btn"/>
            </div>
        </div>
    </div>
</div>