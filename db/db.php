<?php
    require_once "Database.php";
    $db = new Database();
    $result = $db->listUser(false, false, false, 1);
        echo '<br />';
        echo '<br />';
    while($rs = $result->fetch_assoc()){
        print_r ($rs);
        echo '<br />';
    }
?>