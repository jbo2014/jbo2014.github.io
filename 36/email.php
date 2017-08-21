<?php

		// return "success"; die();
		
		if($_REQUEST['first_name'] == '' || $_REQUEST['last_name'] == '' || $_REQUEST['email'] == '' || $_REQUEST['message'] == ''):
			return "error";
		endif;
		
		if (filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)):
			// receiver email address
			$to = 'receiver_email@domain.com';
			
			// prepare header
			$header = 'From: '. $_REQUEST['first_name'] .' '. $_REQUEST['last_name']. ' <'. $_REQUEST['email'] .'>'. "\r\n";
			$header .= 'Reply-To:  '. $_REQUEST['first_name'] .' '. $_REQUEST['last_name']. ' <'. $_REQUEST['email'] .'>'. "\r\n";
			// $header .= 'Cc:  ' . 'example@domain.com' . "\r\n";
			// $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
			$header .= 'X-Mailer: PHP/' . phpversion();
			
			// Contact Subject
			$subject = $_REQUEST['subject'];
			
			// Contact Message
			$message = $_REQUEST['message'];
			
			// Send contact information
			$mail = mail( $to, $subject , $message, $header );
			
			return $mail ? "success" : "error";
		else:
			return "error";
		endif;