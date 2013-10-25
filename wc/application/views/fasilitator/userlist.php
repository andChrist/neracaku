<?php

?>
<div id="content">
    <div id="contentheader">
        User
    </div>
    <div id="userlist">
        <div id="leftpane">
            <div id="cari">
                Search : <input type="text" name="cari" id="cariinput" />
            </div>
            <div id="filter">
                    <div style="margin-top: 35px;margin-bottom: 15px;">
                        Filter
                    </div>
                    Nama : <input type="text" />
                    Email : <input type="text" />
                    Tipe : 
                    <select>
                        <option>PKL</option>
                        <option>Pemodal</option>
                    </select>
            </div>
        </div>
        <div id="crater">&nbsp;</div>
        <div id="rightpane">
            <table>
                <thead>
                    <tr>
                        <th>Tipe</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //foreach($json as $user) : ?>
                        <tr>
                            <td><?php //echo $filter ?></td>
                            <td><?php //echo $user->nama ?></td>
                            <td>asdf@asdf.com</td>
                            <td>Aktif</td>
                        </tr>
                    <?php //endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>