<?php

?>
<script>
    $(document).ready(function() {
      $(".listbarang").customScrollbar({
        skin: "default-skin"
      });
      $( "#dialog" ).dialog({
          autoOpen: false,
          modal:true
        });
     
        $( "#opener" ).click(function() {
          $( "#dialog" ).dialog( "open" );
        });
        
    });
</script>
<script>
    var json = <?php echo $json ?>;
</script>

<div id="content">
    <div id="listbarangwrapper">
        <div id="listbarang_header">
            List Produk
        </div>
        <div class="listbarang default-skin">
            <?php //foreach($barang as $key => $values): ?>
                <div class="barang">
                    <img src="<?php echo load_img($link) ?>" />
                    <div class="namabarang"><?php echo $barang['nama'] ?></div>
                </div>
            <?php //endforeach; ?>
            <div>
                <div class="barang" id="opener">
                    <img src="<?php echo load_img("general/promo1.jpg") ?>" />
                    <div class="namabarang">Tambah Barang</div>
                </div>
            </div>
        </div>
    </div>
    <div id="detilbarangwrapper">
        <div id="detilbarang_header">
            <div id="detilbarang_title">
                Detail Produk
            </div>
            <div id="ubah">
                Ubah
            </div>
        </div>
        <div class="clear"></div>
        <div id="detil">
            <img src="<?php echo load_img('pkl/produk/img1.jpg') ?>" />
            <div id="deskripsi">
                <div id="idbarang">
                    asdf
                </div>
                <div id="detilnama">
                    adsf
                </div>
                <div id="harga">
                    asdf
                </div>
            </div>
        </div>
    </div>
    <div id="dialog">
        <form method="post" action="produk/addBarang">
            Nama Produk : <input type="text" name="nama" />
            Deskripsi : <input type="text" name="deskripsi" />
            Biaya : <input type="text" name="biaya" />
            Harga : <input type="text" name="harga" />
            Gambar : <input type="file" name="icon" />
            <input type="submit" />
        </form>
    </div>
</div>