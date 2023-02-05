<?php
    $host = '206.189.47.16';
    $username = 'pk_quota66';
    $password = 'qwer';
    $database = 'pk_quota66';
    $port = 3306;

    $dbh = mysqli_connect($host, $username, $password, $database, $port);
    $dbh->set_charset("utf8");

    if($dbh == false) {
        die('ไม่สามารถเชื่อมต่อกับฐานข้อมูล');
    }
    
    session_start();
    
    function query($sql) {
        $mysql = $GLOBALS['dbh'];
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
