<?php //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileupload{
	
	
	public function upload($arrfile,$uploadPath,$allowedsize,$allowedformat)
	{
		
		$fileAttr = array('filename'=>'','filePath'=>''); //the array to be returned to the calling program
		
		if(!empty($arrfile['filename']))
		{	
		  $filename  = $arrfile['filename'];
		  $sourceLoc = $arrfile['sourceloc'];
		  $filesize = $arrfile['size'];
		  $filemime = $arrfile['type'];
	
		  //$uploadDir = vidupload_url();
		  $uploadDir = $uploadPath;
		 
		  $ext = explode(".",$filename);
		  $fileext = $ext[1]; //get the file ext
		  $nofile	= $ext[0]; //get the file name

		  $uploadOK = (in_array($fileext,$allowedformat,true)) ? TRUE : NULL;
		  
		  if($uploadOK){

			  $isuploaded = (@is_uploaded_file($sourceLoc) ) ? TRUE : NULL;
	
			  if($isuploaded){
				  
				  //lets rename the file name;	  
				  $newFileName = $ext[0];
				  
				  // $vidPicName = $newFileName.".jpg";
				  $newFileName = $newFileName.".".$fileext;
				  
				  $destDir = $uploadDir.'/'.$newFileName;

				  if (@move_uploaded_file($sourceLoc,$destDir)){
				
					$fileAttr['filename'] = $newFileName;
					$fileAttr['filepath'] = $destDir;
					//$flag = $destDir;
					
					return $fileAttr;
					
				  }else{
		
					$flag = "errfilemoved";	
					$flagdesc = 'Error! <br> The uploaded file cannot be moved to the destination.';
					return $flagdesc;
				  }
			  }else{
					$flag = "errfileuploaded";	
					$flagdesc = 'Error! <br> The file cannot be uploaded.';
					return $flagdesc;
			  }				
			  
		   }else{
		
				   $flag = "errfileformat";	
				   $flagdesc = 'Error! <br> The file format uploaded is invalid.';
				   return $flagdesc;
		   }	
		
		}else{

			$flag = "filenotfound";	
					$flagdesc = 'Error! <br> Kindly upload a file in the right format.';
				    return $flagdesc;

		}		
	}//end function
	
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */