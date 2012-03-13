<?php

	require_once("phpmailer/phpmailer.inc.php"); //匯入PHPMailer類別 
	//require_once("phpmailer/smtp.inc.php");      

	
	
   $mail= new phpmailer();          //建立新物件
   $mail->Host = "mail.ghtinc.com";
   
   $mail->Username = "arthur";  //Gmail帳號
   $mail->Password = "18122242";  //Gmail密碼

   $mail->From = "arthur@ghtinc.com"; //設定寄件者信箱
   $mail->FromName = "ArthurGMail";           //設定寄件者姓名
   $mail->Subject = "arthur test";    //設定郵件標題
   $mail->Body = "test from arthur ";  //設定郵件內容
   $mail->IsHTML(true);                     //設定郵件內容為HTML
  
   $mail->AddAddress("arthur.csie@gmail.com", "ArthurGHT"); //設定收件者郵件及名稱  
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