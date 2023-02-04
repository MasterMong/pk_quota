<?php
    // ทำหน้าเว็บให้เสร็จก่อน

    $host = '206.189.47.16';
    $username = 'pk_quota66';
    $password = 'qwer';
    $database = 'pk_quota66';
    $port = 3306;

    $mysql = mysqli_connect($host, $username, $password, $database, $port);
    if($mysql == false) {
        die('ไม่สามารถเชื่อมต่อกับฐานข้อมูล');
    }
    
    session_start();