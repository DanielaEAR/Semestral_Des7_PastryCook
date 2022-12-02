<?php
    session_start();
    session_unset();
    session_destroy();
    print("<script type='text/javascript'> window.location.href ='../index.php'; </script>"); 
?>