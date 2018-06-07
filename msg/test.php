<?php
session_start();
             $connection =  mysqli_connect("localhost","root","","demo")
                             or die('Database Connection Failed');
             mysqli_set_charset($connection,'utf-8');

          $id = 3;
          $uid=$_SESSION["uid"];
          $fid=$_SESSION["fid"];
         $fname=$_GET['id'];
          $query = "SELECT * FROM msgs WHERE sender ='$uid' AND reciever='$fid' AND filename='$fname' ";
          $result = mysqli_query($connection,$query) 
                     or die('Error, query failed');
         list($sen,$rec,$a,$b,$c,$d,$file,$content) =   mysqli_fetch_array($result);
           //echo $id . $file . $type . $size;
        // header("Content-length: $size");
        //header("Content-type: $file");
         header("Content-Disposition: attachment; filename=$file");
         ob_clean();
         flush();
         echo $content;
         mysqli_close($connection);
         exit;

?>