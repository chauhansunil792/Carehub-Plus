<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common extends CI_Model
{
	public $responsedata = array();
	public $bulkdata     = array();
	
	public function send_email($from, $from_name, $to,$subject,$message)
        {
           	
		$this->load->library('email');
		
		$config['protocol']    = $this->config->item('protocol');
		$config['smtp_host']    = $this->config->item('smtp_host');
		$config['smtp_port']    = $this->config->item('smtp_port');
		$config['smtp_user']    = $this->config->item('smtp_user');
		$config['smtp_pass']    = $this->config->item('smtp_pass');
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = $this->config->item('mailtype');  // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		
		
		$this->email->initialize($config);
		$this->email->from($from, $from_name);
		$this->email->to($to);
		
		$this->email->subject($subject);

		
		$this->email->message($message);
		$this->email->send();
	}
	
	
	public function randomcode($length = 12)
	{
		$cstrong = TRUE;
		$bytes = openssl_random_pseudo_bytes($length, $cstrong);
		$hex   = bin2hex($bytes);
		
		if(!$cstrong || $bytes == FALSE)
		{
			return $this->randomPassword($length);
		}
		else
		{
			return $hex;
		}
	}
	
	/**
	 * encode string
	 *
	 * @access 	public
	 * @param string string to encode
	 * @return string
	 */

	public function encode($str)
	{
		$this->load->library('encrypt');
		$encodedstr=$this->encrypt->encode($str);
		$encodedstr=urlencode($encodedstr);
		return $encodedstr;
	}


	public function decode($str)
	{
		$this->load->library('encrypt');
		$str=$this->encrypt->decode($str);
		
		return $str;
	}

	public function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}
	public function sendWay2SMS($uid, $pwd, $phone, $msg)
	{
	  $curl = curl_init();
	  $timeout = 30;
	  $result = array();
	  $uid = urlencode($uid);
	  $pwd = urlencode($pwd);
	  // Go where the server takes you :P
	  curl_setopt($curl, CURLOPT_URL, "http://way2sms.com");
	  curl_setopt($curl, CURLOPT_HEADER, true);
	  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	  $a = curl_exec($curl);
	  if(preg_match('#Location: (.*)#', $a, $r))
	    $way2sms = trim($r[1]);
	  // Setup for login
	  curl_setopt($curl, CURLOPT_URL, $way2sms."Login1.action");
	  curl_setopt($curl, CURLOPT_POST, 1);
	  curl_setopt($curl, CURLOPT_POSTFIELDS, "username=".$uid."&password=".$pwd."&button=Login");
	  curl_setopt($curl, CURLOPT_COOKIESESSION, 1);
	  curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie_way2sms");
	  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	  curl_setopt($curl, CURLOPT_MAXREDIRS, 20);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv:1.9.0.5) Gecko/2008120122 Firefox/3.0.5");
	  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
	  curl_setopt($curl, CURLOPT_REFERER, $way2sms);
	  $text = curl_exec($curl);
	  // Check if any error occured
	  if (curl_errno($curl))
	    return "access error : ". curl_error($curl);
	  // Check for proper login
	  $pos = stripos(curl_getinfo($curl, CURLINFO_EFFECTIVE_URL), "ebrdg.action");
	  if ($pos === "FALSE" || $pos == 0 || $pos == "")
	    return "invalid login";
	  // Check the message
	  if (trim($msg) == "" || strlen($msg) == 0)
	    return "invalid message";
	  // Take only the first 140 characters of the message
	  $msg = urlencode(substr($msg, 0, 140));
	  // Store the numbers from the string to an array
	  $pharr = explode(",", $phone);
	  // Set the home page from where we can send message
	  $refurl = curl_getinfo($curl, CURLINFO_EFFECTIVE_URL);
	  $newurl = str_replace("ebrdg.action?id=", "main.action?section=s&Token=", $refurl);
	  curl_setopt($curl, CURLOPT_URL, $newurl);
	  // Extract the token from the URL
	  $jstoken = substr($newurl, 50, -41);
	  //Go to the homepage
	  $text = curl_exec($curl);
	  // Send SMS to each number
	  foreach ($pharr as $p)
	  {
	    // Check the mobile number
	    if (strlen($p) != 10 || !is_numeric($p) || strpos($p, ".") != false)
	    {
	      $result[] = array('phone' => $p, 'msg' => urldecode($msg), 'result' => "invalid number");
	      continue;
	    }
	    $p = urlencode($p);
	    // Setup to send SMS
	    curl_setopt($curl, CURLOPT_URL, $way2sms.'smstoss.action');
	    curl_setopt($curl, CURLOPT_REFERER, curl_getinfo($curl, CURLINFO_EFFECTIVE_URL));
	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, "ssaction=ss&Token=".$jstoken."&mobile=".$p."&message=".$msg."&button=Login");
	    $contents = curl_exec($curl);
	    //Check Message Status
	    $pos = strpos($contents, 'Message has been submitted successfully');
	    $res = ($pos !== false) ? true : false;
	    $result[] = array('phone' => $p, 'msg' => urldecode($msg), 'result' => $res);
	  }
	  // Logout
	  curl_setopt($curl, CURLOPT_URL, $way2sms."LogOut");
	  curl_setopt($curl, CURLOPT_REFERER, $refurl);
	  $text = curl_exec($curl);
	  curl_close($curl);
	  return $result;
	}

}
?>