<?php
 $headers = "From: " . $_REQUEST["from"];
 if (mail($_REQUEST["to"], $_REQUEST["subject"], $_REQUEST["body"], $headers)) 
 {
   echo("<p>Message successfully sent!</p>");
 } else 
 {
   echo("<p>Message delivery failed...</p>");
 }
?>
