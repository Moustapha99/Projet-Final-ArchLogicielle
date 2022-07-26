<?php
       
       $conn = mysqli_connect('localhost', 'root','','mglsi_news');
       $sql = "select * from article ORDER BY dateCreation DESC";
       $result = mysqli_query($conn, $sql);
       
?>