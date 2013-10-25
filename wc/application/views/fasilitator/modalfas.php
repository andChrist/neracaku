<?php

?>
<?php

?>
<div id="content">
    <div id="contentheader">
        Pemodalan
    </div>
    <div id="registration">
        <table id="regtable">
            <thead>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Waktu</th>
                    <th>Dari</th>
                    <th>Ke</th>
                    <th>Besar</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        5 new registration. Click to view. 
                    </td>
                </tr>
                <?php foreach($json as $modal) : ?>
                <tr>
                    <td><?php echo $modal->idModal ?></td>
                    <td>2013-10-10 17.30</td>
                    <td><?php echo $modal->namaPemodal ?></td>
                    <td><?php echo $modal->namaPkl ?></td>
                    <td><?php echo $modal->besarModal ?></td>
                    <td><a href="<?php echo base_url().'index.php/fasilitator/modalfas/confirmFunding/'.$modal->idModal ?>">approve</a> | decline</td>
                </tr>
                
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>