<?php
	require_once("PHPMailer/class.phpmailer.php"); //匯入PHPMailer類別 
	//require_once("phpmailer/smtp.inc.php");      

	
	
   $mail= new phpmailer();          //建立新物件
   $mail->IsSMTP();                 //設定使用SMTP方式寄信
   $mail->SMTPAuth = true;          //設定SMTP需要驗證
   $mail->SMTPSecure = "ssl";       // Gmail的SMTP主機需要使用SSL連線
   
   $mail->Host = "smtp.gmail.com";  //Gamil的SMTP主機
   $mail->Port = 465;               //Gamil的SMTP主機的SMTP埠位為465埠。
   //$mail->Helo = "mail.ghtinc.com";
   
   $mail->CharSet = "utf-8";         //設定郵件編碼       
   $mail->Encoding = "base64";  

   $mail->Username = "arthur.csie@gmail.com";  //Gmail帳號
   $mail->Password = "18122242";  //Gmail密碼        

   $mail->From = "arthur.csie@gmail.com"; //設定寄件者信箱
   $mail->FromName = "ArthurGMail";           //設定寄件者姓名
   $mail->Subject = "arthur test";    //設定郵件標題
   $mail->Body = " send from arthur ";  //設定郵件內容
   $mail->IsHTML(true);                     //設定郵件內容為HTML
  
   $mail->AddAddress("arthur@ghtinc.com", "ArthurGHT"); //設定收件者郵件及名稱  
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