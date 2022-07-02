<?php session_start();
    $conn = mysqli_connect('localhost','root','','webstar');

      echo "<script>window.open('index.php', '_self');</script>";

      session_destroy();
?>