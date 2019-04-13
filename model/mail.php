<?php 

function inscriptionMail($mail,$name,$pwd) {
    $header  = 'MIME-Version: 1.0' . "\r\n";
    $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $header .= 'From: ' . $mail . "\r\n";

    $message = '<h1>Jamowar</h1>
    <p> Merci d\'avoir créé un compte Jamowar, vous pouvez dés maintenant jouer et cumuler des points afin d\'être le meilleur</p>
    <p><b>pseudo : </b>' . $name . '<br>
    <b>pwd : </b>' . $pwd . '<br>' ;

    mail($mail, 'inscription Jamowar', $message,$header );
};