<?php

?>
<div id="content">
    <div id="contentheader">
        Registrasi
    </div>
    <div id="registration">
        <table id="regtable">
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Tipe</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>No. KTP</th>
                    <th>No. HP</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7">
                        5 new registration. Click to view. 
                    </td>
                </tr>
                <?php foreach ($json as $user) : ?>
                    <tr>
                        <td><?php echo $user->waktuDaftar ?></td>
                        <td><?php echo $user->tipeUser ?></td>
                        <td><?php echo $user->nama ?></td>
                        <td><?php echo $user->email ?></td>
                        <td><?php echo $user->ktp ?></td>
                        <td><?php echo $user->noHp ?></td>
                        <td><a href="<?php echo base_url().'index.php/fasilitator/homefas/confirmRegister/'.$user->email?>">Approve</a> | <a>Decline</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>