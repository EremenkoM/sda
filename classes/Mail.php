<?php
/**
 * @desc Mail class
 */
 class Mail{
   //Отправка письма
   public static function new_mail($to, $subject, $message){
   	
   	 $headers = "MIME-Version: 1.0" . "\r\n";
	 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   	 $headers .= 'From: SDA.com' . "\r\n";

     if(mail($to, $subject, $message, $headers)) return true;
	
	 return false;
   }
   	
 }
