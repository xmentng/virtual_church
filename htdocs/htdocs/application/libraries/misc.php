<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
class Misc{
// @param class to do misceleeaneous stuff.. should be able to support class::method syntax

function genRand($length=8){
		//This function generates a random number
		global $_SERVER;
		$time = time();
		$salt = Misc::genPassword(mt_rand(5,10));
		$ip = $_SERVER['REMOTE_ADDR'];
		$useragent = $_SERVER['HTTP_USER_AGENT'];
		$port = $_SERVER['REMOTE_PORT'];
		$id = md5($salt.mt_rand(5, 15).$time.$port.$ip.$useragent);
		//return $id;
		return substr($id,0,$length);
	}
function genPassword($length=8){
		# first character is capitalize
		$pass =  chr(mt_rand(65,90)); // A-Z

		# rest are either 0-9 or a-z
		for($k=0; $k < $length - 1; $k++){
			$probab = mt_rand(1,10); 

			if($probab <= 8)   // a-z probability is 80%
				$pass .= chr(mt_rand(97,122));
			else // 0-9 probability is 20%
				$pass .= chr(mt_rand(48, 57));
		}
		return $pass;
	}

function genKey()
{
    $alpha = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'z', 'u', 'z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
    $t = time();
	$k = '';
    for ($i=0; $i<10; $i++)
	{
        $num = mt_rand(0,36);
        $k .= $alpha[$num];
    }

    return $t.$k;
}

public function isLoggedIn(){
		//@session_start();
        $CI = & get_instance();
         $login =  $CI->session->userdata('userName');
         $hash =  $CI->session->userdata('hashUserAgent');
         $ip =  $CI->session->userdata('ipBlocks');
         //var_dump($login,$hash,$ip);
		if(!empty($login) && !empty($hash) && !empty($ip)){
			return true;
		}
		return false;
}

function trashFolder($folder, $debug = false){
   			
			//check whether $folder is actually a folder
			if(!is_dir($folder)){
				return false;
			}
   			 if ($debug) {
       				 echo "Cleaning folder $folder ... <br>";
   			 }
   
   			 $d = dir($folder);
   
    		while (false !== ($entry = $d->read())) {
   
       						 $isdir = is_dir($folder."/".$entry);
       
       		 if (!$isdir and $entry!="." and $entry!="..") {
       
           				 unlink($folder."/".$entry);
           
        		} elseif ($isdir  and $entry!="." and $entry!="..") {
       
           				 Misc::trashFolder($folder."/".$entry,$debug);
           
           					 rmdir($folder."/".$entry);
           
        		}
    }
    $d->close();
		//finally remove the folder
		rmdir($folder);
	}
	
	function formatDuration($secs){
		// return given time as minute::secs
		$intPart = (int)($secs/60);
		$secPart = ($secs%60<9)?"0".($secs%60):($secs%60);
		return $intPart.":".$secPart;
	}
	
	function checkEmail($email) {
		//is it empty??
		if(strlen($email) < 4){
			return false;
		}
		// First, we check that there's one @ symbol, and that the lengths are right
		if (@!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
			return false;
		}
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (@!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
				return false;
			}
		}
		if (@!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
				$domain_array = explode(".", $email_array[1]);
				if (sizeof($domain_array) < 2) {
					return false; // Not enough parts to domain
				}
				for ($i = 0; $i < sizeof($domain_array); $i++) {
					if (@!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
						return false;
					}
				}
		}
		return true;
	}
	
function genDirPrefix($user=''){
        /* 
            Generate subfolder prefix based on the supplied string
        */
            //return '/';
            $user = (empty($user))?self::genPassword(4):$user;
            $user = strtolower($user);
            if(strlen($user) < 1){
                return false;
            }
            if(strlen($user) == 1){
                return "$user/other/";

            }
            $arrValid = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
            if(!in_array($user{0},$arrValid)){
                $first = "other";
            }
            else{
                $first = $user{0};
            }
            if(!in_array($user{1},$arrValid)){
                $second = "other";
            }
            else{
                $second = $user{1};
            }

            return "$first/$second/";
}
function makeSeoTitle($str){
    // html decode, in case it is coming encoded (AJAX request)
    $seo_title = rawurldecode(@$str);
    // some characters that might create trouble
    $switch_chars = '(,),\,/';
    $sc = explode(',', $switch_chars);
    foreach ($sc as $c) @$seo_title = str_replace($c, '-', @$seo_title);
    // leave only alphanumeric characters and replace spaces with hyphens
    $seo_title = strtolower(str_replace('--', '-', preg_replace('/[\s]/', '-', preg_replace('/[^[:alnum:]\s-]+/', '', @$str))));
    $len = strlen($seo_title);
    if (@$seo_title[$len - 1] == '-') $seo_title = substr(@$seo_title, 0, -1);
    if (@$seo_title[0] == '-') $seo_title = substr(@$seo_title, 1, $len);
    //replace god with God.. we dont want to be insolent now do we??
    $seo_title = str_replace('god','God',@$seo_title);
    return $seo_title;
}

	
function isValidPictureUpload($fileData){
    // check whether is a valid image
    // $fileData receives the $_FILE['uploaded file variable']
    $validMime = array('image/jpeg','image/pjpeg','image/gif','image/png');
    if($fileData['error'] != 0){
        return false;
    }
    else{
        /// check mime type
        if(!in_array($fileData['type'],$validMime)){
            return false;
        }
        //$image_data = getimagesize($fileData['tmp_name']);
		//$image_data = $fileData['size'];
		$image_data = filesize($fileData['tmp_name']);
        if(!$image_data){
            return false;
        }
        return true;
    }
}  //end function

 function saveDirPrefix(){
     $arr = array('a','b','c','d','e','f','g','h','i','j');
     return $arr[mt_rand(0,9)];
 }


function isValidVideoMime($fileData){
    // check whether is a valid image
    // $fileData receives the $_FILE['uploaded file variable']
	
    $validMime = array("video/mp4", "video/3gpp", "video/x-msvideo");
	//echo json_encode(array('status'=>false,'error'=>$fileData['type'])); exit;
    if($fileData['error'] != 0){
        return false;
    }
    else{
        /// check mime type
        if(in_array($fileData['type'], $validMime)){
            $image_data = ($fileData['size']);
		
			if(!$image_data){
				return false;
			}
			return true;
		}else{
			return false;	
		}
        
    }
}  //end function

function isValidMime($fileData){
    // check whether is a valid image
    // $fileData receives the $_FILE['uploaded file variable']
    $validMime = array("application/pdf");
	//echo json_encode(array('status'=>false,'error'=>$fileData['type'])); exit;
    if($fileData['error'] != 0){
        return false;
    }
    else{
        /// check mime type
        if(in_array($fileData['type'], $validMime)){
            $image_data = ($fileData['size']);
			if(!$image_data){
				return false;
			}
			return true;
		}else{
			return false;	
		}
        
    }
}  //end function

function cropSentence ($strText, $intLength, $strTrail){ 

    $wsCount = 0;
    $intTempSize = 0;
    $intTotalLen = 0;
    $intLength = $intLength - strlen($strTrail);
    $strTemp = "";

    if (strlen($strText) > $intLength) {
        $arrTemp = explode(" ", $strText);
        foreach ($arrTemp as $x) {
            if (strlen($strTemp) <= $intLength) $strTemp .= " " . $x;
        }
        $CropSentence = $strTemp . $strTrail;
    } else {
        $CropSentence = $strText;
    }

    return $CropSentence;
}

function stripReplaceSlash($str){
    //replace double slashes with single slash
    return str_replace("//","/",$str); 
}
function humanTime($date)
{
    if(empty($date)) {
        return false;
    }
   
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
   
    $now             = time();
    $unix_date         = $date;
   
       // check validity of date
    if(empty($unix_date)) {   
        return false;
    }

    // is it future date or past date
    if($now > $unix_date) {   
        $difference     = $now - $unix_date;
        $tense         = "ago";
       
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
   
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
   
    $difference = round($difference);
   
    if($difference != 1) {
        $periods[$j].= "s";
    }
   
    return "$difference $periods[$j] {$tense}";
}
function loadFileContents($filename){
    if(!file_exists($filename)){
        return false;
    }
    $handle = fopen($filename, "r");
    //var_dump($filename);
    if ($handle) {
        $arr = array(); 
        while (!feof($handle)) {
        $buffer = trim(fgets($handle, 4096));
       // var_dump($buffer);
        if($buffer != ""){
            $arr[] = $buffer; 
        }
                    
        }
        fclose($handle);
        return $arr;
    }
}
function curl_get_file_contents($URL){
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
            else return FALSE;
}
function json_encode1($a=false)
  {
    if (is_null($a)) return 'null';
    if ($a === false) return 'false';
    if ($a === true) return 'true';
    if (is_scalar($a))
    {
      if (is_float($a))
      {
        // Always use "." for floats.
        return floatval(str_replace(",", ".", strval($a)));
      }

      if (is_string($a))
      {
        static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
        return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
      }
      else
        return $a;
    }
    $isList = true;
    for ($i = 0, reset($a); $i < count($a); $i++, next($a))
    {
      if (key($a) !== $i)
      {
        $isList = false;
        break;
      }
    }
    $result = array();
    if ($isList)
    {
      foreach ($a as $v) $result[] = self::json_encode1($v);
      return '[' . join(',', $result) . ']';
    }
    else
    {
      foreach ($a as $k => $v) $result[] = self::json_encode1($k).':'.self::json_encode1($v);
      return '{' . join(',', $result) . '}';
    }
  }
  public function filterEmptyValues($arr){
      //// strip out empty values from and array
      foreach ($arr as $key => $value) {
        if(!empty($value)){
            $arrFiltered[$key] = $value;
        }
      }
      return $arrFiltered;

  }
  function isValidVideoFile($videoPath){
          if(!file_exists($videoPath)){
            //echo " cant find it....found it";
            return false;
          }
          $mov    = new ffmpeg_movie($videoPath);
          $totalFrame = $mov->getFrameCount();
          if(!is_int($totalFrame) || $totalFrame < 1){
            return false;
          }
          return true;
          
    }
    public function formatTextBlock($text){
        ////formats a chunk/block of text into paragraphs
       // return $text;
        $arrComponents = explode('.',$text);
        $totalNum = count($arrComponents);
        $buffer=$outPut='';
        $i = 0;
        for($a=0;$a<$totalNum;$a++){
            if($i<4){
                /// we dont hv up to four packets to form a paragraph..
                $buffer .= $arrComponents[$a].'. ';
                $i++;
            }
            if($i==4){
                ///buffer has enough packets (4) to form a paragraph
                $outPut .= "<p>".$buffer.'</p>';
                ///reset he bufer
                $buffer = "";
                //reset the counter
                $i = 0;
            }
        }
        return $outPut;
        
    }
	static function loadMonthsAsArray(){
      /// returns an associative array of months with their integr representations
     #--------------------------------------------------------------------
#initializing array for Months
#--------------------------------------------------------------------

$monthOfYear = array(		"January"				=> "01",
							"February"				=> "02",
							"March"					=> "03",
							"April"					=> "04",
							"May"					=> "05",
							"June"					=> "06",
							"July"					=> "07",
							"August"				=> "08",
							"September"				=> "09",
							"October"				=> "10",
							"November"				=> "11",
							"December"				=> "12"
						);
return $monthOfYear;					
						
#--------------------------------------------------------------------
  }
  

	function element($item, $array, $default)
	{
		if ( ! isset($array[$item]) OR $array[$item] == "")
		{
			return $default;
		}

		return $array[$item];
	}	

#--------------------------------------------------------------------
#--------------------------------------------------------------------


	function random_element($array)
	{
		if ( ! is_array($array))
		{
			return $array;
		}
		return $array[array_rand($array)];
	}	
	
	
  static function serverTime(){
      /// retrieve the server time ..allows us make time zone adjustments
      $offset = -3600; //should be in seconds
      return time()+$offset;
  }
  static function parse($str,$arrValues){
      //replace $str which contains place holders which are keys in the associative array
      //$arrValues
      foreach ($arrValues as $key => &$value) {
            
            $str = str_ireplace("[$key]",$value,$str);
      }
      return $str;
  }
  public function do_post_request($url, $data, $optional_headers = null){
     $params = array('http' => array(
                  'method' => 'POST',
                  'content' => $data
               ));
     if ($optional_headers !== null) {
        $params['http']['header'] = $optional_headers;
     }
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'r', false, $ctx);
     if (!$fp) {
        throw new Exception("Problem with $url, $php_errormsg");
     }
     $response = stream_get_contents($fp);
     if ($response === false) {
        throw new Exception("Problem reading data from $url, $php_errormsg");
        //var_dump($response);
     }
     return $response;
  }
  function humanReadableFilesize($size) {
 
    // Adapted from: http://www.php.net/manual/en/function.filesize.php
 
    $mod = 1024;
 
    $units = explode(' ','B KB MB GB TB PB');
    for ($i = 0; $size > $mod; $i++) {
        $size /= $mod;
    }
 
    return round($size, 2) . ' ' . $units[$i];
 }
 function hash($str){
     //hash a string with a given salt
     //$salt = 'vIrTuAlChUrCh';
     return md5($str);
 }
 
 function required($str)
	{
		if ( ! is_array($str))
		{
			return (trim($str) == '') ? FALSE : TRUE;
		}
		else
		{
			return ( ! empty($str));
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Match one field to another
	 *
	 * @access	public
	 * @param	string
	 * @param	field
	 * @return	bool
	 */
	function matches($str, $field)
	{
		if ( ! isset($_POST[$field]))
		{
			return FALSE;
		}
		
		return ($str !== $_POST[$field]) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Minimum Length
	 *
	 * @access	public
	 * @param	string
	 * @param	value
	 * @return	bool
	 */	
	function min_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}

		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) < $val) ? FALSE : TRUE;		
		}

		return (strlen($str) < $val) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Max Length
	 *
	 * @access	public
	 * @param	string
	 * @param	value
	 * @return	bool
	 */	
	function max_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}
		
		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) > $val) ? FALSE : TRUE;		
		}

		return (strlen($str) > $val) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Exact Length
	 *
	 * @access	public
	 * @param	string
	 * @param	value
	 * @return	bool
	 */	
	function exact_length($str, $val)
	{
		if (preg_match("/[^0-9]/", $val))
		{
			return FALSE;
		}
	
		if (function_exists('mb_strlen'))
		{
			return (mb_strlen($str) != $val) ? FALSE : TRUE;		
		}

		return (strlen($str) != $val) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Valid Email
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------
	
	function cleanName($str){
				return ( ! preg_match('/^[A-Za-z \'.-]{2,25}$/i', $str) ) ? FALSE : $str;

	}//end function
	
	function cleanUserName($str){
				return ( ! preg_match('/^[A-Za-z0-9 \'.-_]{2,30}$/i', $str) ) ? FALSE : $str;

	}//end function
	
	function cleanPassword($str){
				return (!preg_match ('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,20}$/', $str) ) ? FALSE : $str;

	}//end function
	
	function cleanEmail($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : $str;
	}
	
	
	function cleanUrlSegment($str){
		return ( ! preg_match('/^[A-Za-z0-9 \'.-_]{2,30}$/i', $str) ) ? FALSE : $str;
	}//end function
	
	
	/**
	 * Valid Emails
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function valid_emails($str)
	{
		if (strpos($str, ',') === FALSE)
		{
			return $this->valid_email(trim($str));
		}
		
		foreach(explode(',', $str) as $email)
		{
			if (trim($email) != '' && $this->valid_email(trim($email)) === FALSE)
			{
				return FALSE;
			}
		}
		
		return TRUE;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Validate IP Address
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function valid_ip($ip)
	{
		return $this->CI->valid_ip($ip);
	}

	// --------------------------------------------------------------------
	
	/**
	 * Alpha
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */		
	function alpha($str)
	{
		return ( ! preg_match("/^([a-z])+$/i", $str)) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Alpha-numeric
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function alpha_numeric($str)
	{
		return ( ! preg_match("/^([a-z0-9])+$/i", $str)) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Alpha-numeric with underscores and dashes
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function alpha_dash($str)
	{
		return ( ! preg_match("/^([-a-z0-9_-])+$/i", $str)) ? FALSE : TRUE;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Numeric
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function numeric($str)
	{
		return (bool)preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $str);

	}

	// --------------------------------------------------------------------

	/**
	 * Is Numeric
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
  	function is_numeric($str)
	{
		return ( ! is_numeric($str)) ? FALSE : TRUE;
	} 

	// --------------------------------------------------------------------
	
	/**
	 * Integer
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */	
	function integer($str)
	{
		return (bool)preg_match( '/^[\-+]?[0-9]+$/', $str);
	}

	// --------------------------------------------------------------------

	/**
	 * Is a Natural number  (0,1,2,3, etc.)
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function is_natural($str)
	{   
   		return (bool)preg_match( '/^[0-9]+$/', $str);
	}

	// --------------------------------------------------------------------

	/**
	 * Is a Natural number, but not a zero  (1,2,3, etc.)
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function is_natural_no_zero($str)
	{   
		if ( ! preg_match( '/^[0-9]+$/', $str))
		{
			return FALSE;
		}
	
		if ($str == 0)
		{
			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Valid Base64
	 *
	 * Tests a string for characters outside of the Base64 alphabet
	 * as defined by RFC 2045 http://www.faqs.org/rfcs/rfc2045
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function valid_base64($str)
	{
		return (bool) ! preg_match('/[^a-zA-Z0-9\/\+=]/', $str);
	}

	// --------------------------------------------------------------------

function random_string($type, $len)
	{					
		switch($type)
		{
			case 'alnum'	:
			case 'numeric'	:
			case 'nozero'	:
		
					switch ($type)
					{

						case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
							break;
						case 'numeric'	:	$pool = '0123456789';
							break;
						case 'nozero'	:	$pool = '123456789';
							break;
					}

					$str = '';
					for ($i=0; $i < $len; $i++)
					{
						$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
					}
					return $str;
			  break;
			case 'unique' : return md5(uniqid(mt_rand()));
			  break;
		}
	}#----------------------------------------------------------------------------------------------	
	
	
		function limitWordTo($str, $limit, $end_char)
	{
		if (trim($str) == '')
		{
			return $str."...";
		}
	
		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);
			
		if (strlen($str) == strlen($matches[0]))
		{
			$end_char = '...';
		}
		
		return rtrim($matches[0]).$end_char;
	}#----------------------------------------------------------------------------------------------
	
	
	
}//end class
