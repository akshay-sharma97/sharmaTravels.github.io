<?php 
    session_start();
    session_destroy();
    echo "<script> alert('Successfully Logged out!!') </script>";
    echo "<script> window.open('index.php','_self') </script>";
?>