<?php
define('admin_email','your@mail.com'); // Change admin email here for example admin@yoursite.com
define('website_name','Electrical'); // Change website name here for example yoursite.com
define('website_url', 'http://'.$_SERVER['HTTP_HOST']);

function strict_secure($str){
	$str = strip_tags(trim($str));
	return $str;
}
function sendEmail($to,$from,$subject,$message,$headname){
	$headers="MIME-Version: 1.0" . "\r\n";
	$headers.="Content-type: text/html; charset=utf-8" . "\r\n";
	$headers.="From: ".$headname.'<'.$from.'>';
	return mail ($to,$subject,$message,$headers);
}


if(isset($_POST['action']) && $_POST['action']=='submitform')
{
	$N = $_POST['formInput'];	
	$path =  $_SERVER['HTTP_REFERER'];
	$admin_message ='
	Hello,
	<br /><br /><br /><br />
	Contact Us Form Received From '.strict_secure($N['name']).'
	<br /><br />
	Email: '.strict_secure($N['email']).'<br /><br />
	Message:<br /><br />
	'.strict_secure($N['message']).'<br /><br />
	Phone Number:'.strict_secure($N['phone']).'<br /><br />
	Sender Url:'.$path.'<br /><br /><br /><br />
	
	
	Regards,<br />
	'.website_name.'<br />
	'.website_url.'
	';
	$user_message ='
	Hello '.strict_secure($N['name']).',
	<br /><br /><br /><br />
	Thank you for contacting us. Your following message has been received by Administrator:
	<br /><br />
	Email: '.strict_secure($N['email']).'<br /><br />
	Message:<br /><br />
	'.strict_secure($N['message']).'<br /><br />
	Phone Number:'.strict_secure($N['phone']).'<br /><br />
	
	Regards,<br />
	'.website_name.'<br />
	'.website_url.'
	';

	$sendToAdmin = sendEmail(admin_email,strict_secure($N['email']),'Contact Us Form Received From '.website_name,$admin_message,website_name);
	$sendToUsers = sendEmail(strict_secure($N['email']),admin_email,'Contact Us Form Sent To '.website_name,$user_message,website_name);
	
	
	if($sendToAdmin && $sendToUsers)
	{
		$message ='<div class="alert alert-success"><strong>Message Sent Successfully.</strong></div>';		
	}else{
		$message ='<div class="alert alert-danger"><strong>Something Went Wrong While Sending Message.</strong></div>';
	}
	echo $message;
}
?>