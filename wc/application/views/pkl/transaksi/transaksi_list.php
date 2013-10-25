<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script>
    $(function() {

            $( "#accordion" ).accordion({
                    collapsible: true,
                    active: false
            });

    });
</script>

<div id="transaksi_list_header">
    <div id="transaksi_list_header_title">
        <div>
            Transaksi   <font style="font-size: 60%">(<?php echo $tanggal='1 Oktober - 7 Oktober'?>)</font>        
        </div>
    </div>
    
    <div id="transaksi_list_header_total">
        Total   :   Rp<?php echo '99.999.999,00'?>
    </div>
</div>

<!--<div id="transaksi_list_filter">
    Filter
</div>-->

<div id="accordion" >
    <h3>Filter</h3>
    <div>
<!--        <p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>-->
            <form id='filter_form' name='login_form' action='login' method='POST'>
                <div style='float: left'>
                    <input type="radio" name="waktu" value="Harian" class="mini"/>Harian
                </div>
                <div style='margin-left: 100px; float: left;'>
                    Dari 
                </div>
                <div style='margin-left: 10px; float: left;'>
                    <input type="text" name="fname" value="1 oktober 2013" size=20>
                </div>
                <div style='margin-left: 30px; float: left;'>
                    Sampai
                </div>
                <div style='margin-left: 10px; float: left;'>
                    <input type="text" name="fname" value="7 oktober 2013" size=20>
                </div>
                
                </br></br>
                
                <div style='float:left;'>
                    <input type="radio" name="waktu" value="Bulanan" class="mini"/>Bulanan
                </div>
                <div style='margin-left: 90px; float:left;'>
                    <select>
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                </div>
                
                </br></br>
                
                <div style='float: left'>
                    <input type="radio" name="waktu" value="Tahunan" class="mini"/>Tahunan</br>
                </div>
                <div style='margin-left: 85px; float:left;'>
                    <select>
                        <option>2002</option>
                        <option>2003</option>
                        <option>2004</option>
                        <option>2005</option>
                        <option>2006</option>
                        <option>2007</option>
                        <option>2008</option>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                    </select>
                </div>
            </form>
    </div>
</div>

<div>
    <table width=100% id="transaksi_list_table">
		<tr>
			<td class='transaksi_list_table_judul'>No. Transaksi</td>
			<td class='transaksi_list_table_judul'>Tipe</td>
			<td class='transaksi_list_table_judul'>Tanggal</td>
			<td class='transaksi_list_table_judul'>Waktu</td>
                        <td class='transaksi_list_table_judul'>Banyak Barang</td>
                        <td class='transaksi_list_table_judul'>Total</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
                <tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
                <tr>
			<td class='transaksi_list_table_isi'>92814723</td>
			<td class='transaksi_list_table_isi'>Masuk</td>
			<td class='transaksi_list_table_isi'>14 Oktober 2013</td>
			<td class='transaksi_list_table_isi'>17.00</td>
                        <td class='transaksi_list_table_isi'>10</td>
                        <td class='transaksi_list_table_isi'>Rp10.000.000,00</td>
		</tr>
	</table>
</div>

<div>
	
</div>