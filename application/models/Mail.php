<?php
require_once (WEBAPPROOT.'libs/PHPMailer/PHPMailerAutoload.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author oussou
 */
class Mail {
    //put your code here
    function sendMailActivation($mail_from,$mail_to,$name,$uniqId){
        $link = "http://www.rp2m.com/authentification/activer/".$uniqId;
        $html = '<img src="http://www.rp2m.com/ressources/images/logo.png" width="100" />'
                .'<table width="80%" style="border-left:2px;border-style: solid;
    border-color:#6D8765;
                        background-color:white;"><thead><tr><th align="center"><h3>Activation de votre compte</h3></th></tr></thead><tbody>'
                .'<tr><td><p>Bienvenu '.$name.' dans le Réseau Professionnel des Mourides,<br/>

                        Merci pour votre inscripion.<br/>
                        Clique sur le lien ci-dessous afin de rendre actif votre compte :<br/>
                        <a href="'.$link.'">'.$link.'</a></p>'
                    .'</td></tr>'
                .'<tr><td>Réseau Professionnel des Mourides  <a href="http://www.rp2m.com">www.rp2m.com</a></td></tr></table>';
        $non_html = 'Salut '.$name.',

                        Merci pour votre inscripion.
                        Clique sur le lien ci-dessous afin de rendre actif votre compte :'
                .$link;
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.rp2m.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'support@rp2m.com';                 // SMTP username
        $mail->Password = 'support123#';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $name = 'Réseau Professionnel des Mourides';
        $mail->setFrom($mail_from,$name );
        $mail->addAddress($mail_to);               // Name is optional
        $mail->addReplyTo('support@rp2m.com', 'Information');
        

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Confirmer votre courriel';
        $mail->Body    = $html;
        $mail->AltBody = $non_html;
         
        if(!$mail->send()) {
            return array('send'=>false,'erreur'=>$mail->ErrorInfo);
        } else {
           return array('send'=>true,'erreur'=>'');
        }
    }
    function  sendMailContact($mail_from,$mail_to,$name,$tel,$message){
        $html = '<img src="http://www.rp2m.com/ressources/images/logo.png" width="100" />'
                .'<table width="80%" style="border-left:2px;border-style: solid;
    border-color:#6D8765;
                        background-color:white;"><thead><tr><th align="center"><h3>Contact information</h3></th></tr></thead><tbody>'
                .'<tr><td><p>Information de '.$name.' dans le Réseau Professionnel des Mourides<br/>

                       Numero Telephone : '.$tel.' <br/>
                       Email : '.$mail_from.' <br/>'
                . '    Message :<br/> '.$message
                    .'</td></tr>'
                .'<tr><td>Réseau Professionnel des Mourides  <a href="http://www.rp2m.com">www.rp2m.com</a></td></tr></table>';
        $non_html = 'Information de '.$name.' dans le Réseau Professionnel des Mourides
                     Numero Telephone : '.$tel.'
                     Email : '.$mail_from
                . '  Message :<br/> '.$message;
        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.rp2m.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'contact@rp2m.com';                 // SMTP username
        $mail->Password = 'touba123#';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $name = 'Réseau Professionnel des Mourides';
        $mail->setFrom($mail_from,$name );
        $mail->addAddress($mail_to);               // Name is optional
        $mail->addReplyTo($mail_from, 'Information');
        

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Demande d'informations";
        $mail->Body    = $html;
        $mail->AltBody = $non_html;
         
        if(!$mail->send()) {
            return array('send'=>false,'erreur'=>$mail->ErrorInfo);
        } else {
           return array('send'=>true,'erreur'=>'');
        }
    }
}
