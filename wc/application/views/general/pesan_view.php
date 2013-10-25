<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>resources/styles/pesan.css'/>

<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>resources/styles/Transaksi/transaksi_list_style.css'/>
<link href="<?php echo base_url();?>resources/jquery-ui-1.10.3.custom/css/sunny/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="<?php echo base_url();?>resources/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
<script src="<?php echo base_url();?>resources/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
<!--	<link rel="stylesheet" href="../demos.css">-->
<script>
    $(function() {
            $( "#dialog" ).dialog({
                    autoOpen: false,
                    width: 400,
                    buttons: [
                            {
                                    text: "Ok",
                                    click: function() {
                                            $( this ).dialog( "close" );
                                    }
                            },
                            {
                                    text: "Cancel",
                                    click: function() {
                                            $( this ).dialog( "close" );
                                    }
                            }
                    ]
            });

            // Link to open the dialog
            $( "#dialog-link" ).click(function( event ) {
                    $( "#dialog" ).dialog( "open" );
                    event.preventDefault();
            });
    });
</script>

<style>
    .demoHeaders {
            margin-top: 2em;
    }
    #dialog-link {
            padding: .4em 1em .4em 20px;
            text-decoration: none;
            position: relative;
    }
    #dialog-link span.ui-icon {
            margin: 0 5px 0 0;
            position: absolute;
            left: .2em;
            top: 50%;
            margin-top: -8px;
    }
    #icons {
            margin: 0;
            padding: 0;
    }
    #icons li {
            margin: 2px;
            position: relative;
            padding: 4px 0;
            cursor: pointer;
            float: left;
            list-style: none;
    }
    #icons span.ui-icon {
            float: left;
            margin: 0 4px;
    }
    .fakewindowcontain .ui-widget-overlay {
            position: absolute;
    }
</style>

<div>
    <font style='font-size: 200%;'>Inbox</font>
</div>

<div>
	<table width=100% id='header_pesan'>
		<tr>
			<td id='header_judul'>Dari</td>
			<td id='header_judul'>Subjek</td>
			<td id='header_judul'>Pesan</td>
			<td id='header_judul'>Waktu</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi belum_baca'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi belum baca'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
		<tr>
			<td class='transaksi_list_table_isi'>Kepin_Peel</td>
			<td class='transaksi_list_table_isi'>Hai ~ <3</td>
			<td class='transaksi_list_table_isi'>Hai Beb <3</td>
			<td class='transaksi_list_table_isi'>7 Oktober 2013, 10.00</td>
		</tr>
	</table>
</div>

<!--<p><a href="#" id="dialog-link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-newwin"></span>Open Dialog</a></p>

<div id="dialog" title="Dialog Title">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>	-->

<!--<div id="dialog" title="Basic dialog">
	<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>

<button id="opener">Open Dialog</button>

<div class="demo-description">
<p>Dialogs may be animated by specifying an effect for the show and/or hide properties.  You must include the individual effects file for any effects you would like to use.</p>
</div>-->

