<?php
    // ทำหน้าเว็บให้เสร็จก่อน

    $host = '206.189.47.16';
    $username = 'pk_quota66';
    $password = 'qwer';
    $database = 'pk_quota66';
    $port = 3306;

    $mysql = mysqli_connect($host, $username, $password, $database, $port);
    $mysql->set_charset("utf8");
    if($mysql == false) {
        die('ไม่สามารถเชื่อมต่อกับฐานข้อมูล');
    }
    
    session_start();

    function query($sql) {
        $mysql = $GLOBALS['mysql'];
        $result = mysqli_query($mysql, $sql);
        if ($result === false) {
            die('Query failed: '. mysqli_error($mysql));
        }
        return $result;
    }
    
    $settings = array();

    $sql = "SELECT * FROM settings";
    $query = query($sql);
    while ($row = mysqli_fetch_array($query)) { 
        $settings[$row['key']] = $row['value'];
    }

    function is_enable() {
        if($GLOBALS['settings']['is_enable'] == 0) {
            return True;
        } else {
            return FALSE;
        }
    }