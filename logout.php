<?php
    session_start();
    session_destroy();
    session_write_close();
    echo '<script type="text/javascript"> window.location = "regis.php" </script>';
    die();