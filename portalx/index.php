<?php
    ini_set('session.gc_maxlifetime', 3600);
    session_set_cookie_params(3600);    
    session_start();
    error_reporting('0');
    if (isset($_SESSION['username'])) {
       echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/portal/home.php" </script>';
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
           echo '<script type="text/javascript"> window.location = "http://localhost/dgsm1/login.php" </script>';
        }
    }
?>
