<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller {
	
function __construct(){
	parent::__construct();
	$this->load->library(array('validator_lib','thumbnailmanager'));
}//end function

function decode(){
	
$DM = base64_decode('aHR0cDovL3N0cmVhbWluZ3BvcnRhbC5pbW1vbmxpbmUvdXNlcl9yZXMvdmlkZW9zdGh1bWJzL2UxYTI1NmE3OTIucG5n'); echo $DM; exit;	
	
}

function sizeimage(){

	$pt = base64_encode("./images/siloh.jpg");
	//echo $pt; exit;
	
	$dm = base64_encode("125X125");
	//echo $dim; exit;
	
	$pt2 =  base64_decode("Li91c2VyX3Jlcy92aWRlb3N0aHVtYnMvdm9kX2RlZmF1bHQucG5n");
	$dm2 = base64_decode("MTI1WDEyNQ==");
	
	$src = "/thumbnail/display/".$pt."/".$dm;
	
	 $dimensions = explode('X',$dm2);
          
	$this->load->library('thumbnailmanager');  
    $this->thumbnailmanager->__initialise($pt2);

	$this->thumbnailmanager->quality=100;   
          $this->thumbnailmanager->output_format='JPG';     
   
           
           $this->thumbnailmanager->img_watermark_Valing='TOP';           // [OPTIONAL] set watermark vertical position, TOP | CENTER | BOTTON
           $this->thumbnailmanager->img_watermark_Haling='RIGHT';           // [OPTIONAL] set watermark horizonatal position, LEFT | CENTER | RIGHT

           //$thumb->txt_watermark='360TV';        // [OPTIONAL] set watermark text [RECOMENDED ONLY WITH GD 2 ]
           $this->thumbnailmanager->txt_watermark_color='FFFFFF';        // [OPTIONAL] set watermark text color , RGB Hexadecimal[RECOMENDED ONLY WITH GD 2 ]
           $this->thumbnailmanager->txt_watermark_font=3;
          
                $this->thumbnailmanager->size_width((int)$dimensions[0]);                    // set width for thumbnail, or
               

                $this->thumbnailmanager->process();   

                //enable cache                        // generate image
                $offset = 60 * 60 * 24 * 1;
                $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
                header($ExpStr); 
                $this->thumbnailmanager->show(); 
				
				//$this->thumbnailmanager->save('/images/siloh125X125.jpg');				
		  
	//echo $src; exit;
	
	//echo "<img src='".$pt2."' />";
	
	
}

function resizeImage(){
	
/*	$thumb = new Thumbnailmanager('./user_res/videosthumbs/a/3c29bf5.png');
	
	$thumb->size(200,200);
	
	$thumb->quality=100;
	
	$thumb->max_execution_time=60;
	
	$thumb->process();*/
	
	//$thumb->show();
	
	//$thumb->save('/user_res/thumbs/');
	
	$thumb = new Thumbnailmanager();
	$thumb->__initialise('./images/siloh.jpg');
	
	$thumb->size_width(200);
	$thumb->size_height(200);
	$thumb->process(); 
	//$thumb->show();
	$thumb->save('./user_res/thumbs/3c29bf5.png');
	
	
}//end function

///////////////////////////////////////////////////
}//end class
