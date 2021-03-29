<?php
$to = "oumaimabouzekraoui@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: oumaimabouzekraoui@gmail.com" . "\r\n" .
"CC: oumaimabouzekraoui@gmail.com";



          if( mail($to,$subject,$txt,$headers))
          echo '<p>Votre message a été envoyé.</p>';
          else
          echo '<p>Erreur.</p>';
?>