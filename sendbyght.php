<?php

	require_once("phpmailer/phpmailer.inc.php"); //�פJPHPMailer���O 
	//require_once("phpmailer/smtp.inc.php");      

	
	
   $mail= new phpmailer();          //�إ߷s����
   $mail->Host = "mail.ghtinc.com";
   
   $mail->Username = "arthur";  //Gmail�b��
   $mail->Password = "18122242";  //Gmail�K�X

   $mail->From = "arthur@ghtinc.com"; //�]�w�H��̫H�c
   $mail->FromName = "ArthurGMail";           //�]�w�H��̩m�W
   $mail->Subject = "arthur test";    //�]�w�l����D
   $mail->Body = "test from arthur ";  //�]�w�l�󤺮e
   $mail->IsHTML(true);                     //�]�w�l�󤺮e��HTML
  
   $mail->AddAddress("arthur.csie@gmail.com", "ArthurGHT"); //�]�w����̶l��ΦW��  
   //$mail->      
   
   $mail->MailerDebug = true;
   $mail->SMTPDebug = true;

   if(!$mail->Send()) {
      // echo "Mailer Error: "; // . $mail->ErrorInfo;
   }
   else {
       echo "Message sent!";
   }
   
?>