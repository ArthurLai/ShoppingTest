<?php
	require_once("PHPMailer/class.phpmailer.php"); //�פJPHPMailer���O 
	//require_once("phpmailer/smtp.inc.php");      

	
	
   $mail= new phpmailer();          //�إ߷s����
   $mail->IsSMTP();                 //�]�w�ϥ�SMTP�覡�H�H
   $mail->SMTPAuth = true;          //�]�wSMTP�ݭn����
   $mail->SMTPSecure = "ssl";       // Gmail��SMTP�D���ݭn�ϥ�SSL�s�u
   
   $mail->Host = "smtp.gmail.com";  //Gamil��SMTP�D��
   $mail->Port = 465;               //Gamil��SMTP�D����SMTP��쬰465��C
   //$mail->Helo = "mail.ghtinc.com";
   
   $mail->CharSet = "utf-8";         //�]�w�l��s�X       
   $mail->Encoding = "base64";  

   $mail->Username = "arthur.csie@gmail.com";  //Gmail�b��
   $mail->Password = "18122242";  //Gmail�K�X        

   $mail->From = "arthur.csie@gmail.com"; //�]�w�H��̫H�c
   $mail->FromName = "ArthurGMail";           //�]�w�H��̩m�W
   $mail->Subject = "arthur test";    //�]�w�l����D
   $mail->Body = " send from arthur ";  //�]�w�l�󤺮e
   $mail->IsHTML(true);                     //�]�w�l�󤺮e��HTML
  
   $mail->AddAddress("arthur@ghtinc.com", "ArthurGHT"); //�]�w����̶l��ΦW��  
   //$mail->      
   
   //$mail->MailerDebug = true;
   //$mail->SMTPDebug = true;

   if(!$mail->Send()) {
      // echo "Mailer Error: "; // . $mail->ErrorInfo;
   }
   else {
       echo "Message sent!";
   }
   
   echo "end";
?>