<?php
  class thumbnail extends CI_Controller{
      
      function __construct(){
           parent::__construct();  
      }
      
      function display(){
          //load thumbnail library
          
          $pt = base64_decode($this->uri->segment(3));
          $dm = base64_decode($this->uri->segment(4));
		  
		  //print_r($dm); exit;
		  
		 // $mm = base64_decode('L3VzZXJfcmVzL3ZpZGVvc3RodW1icy9lMWEyNTZhNzkyLnBuZw=='); echo $mm; exit;
		  
		 // $dm = $this->uri->segment(4);
		  //$pt = $this->uri->segment(3);
		  
		  
          ///////////////////////
           $dimensions = explode('X',$dm);
          
		  $this->load->library('thumbnailmanager');  
           $this->thumbnailmanager->__initialise($pt);
         
          //exit;   
          //$thumb=$this->thumbnailmanager->__construct($pt);            // Contructor and set source image file
          
          //$thumb->memory_limit='32M';               //[OPTIONAL] set maximun memory usage, default 32 MB ('32M'). (use '16M' or '32M' for litter images)
          //$thumb->max_execution_time='30';             //[OPTIONAL] set maximun execution time, default 30 seconds ('30'). (use '60' for big images o slow server)
          $this->thumbnailmanager->quality=100;   
          $this->thumbnailmanager->output_format='JPG';     
          /*
                      // [OPTIONAL] default 75 , only for JPG format
           // [OPTIONAL] JPG | PNG
           $thumb->jpeg_progressive=0;               // [OPTIONAL] set progressive JPEG : 0 = no , 1 = yes
           $thumb->allow_enlarge=false;              // [OPTIONAL] allow to enlarge the thumbnail
           //$thumb->CalculateQFactor(10000);          // [OPTIONAL] Calculate JPEG quality factor for a specific size in bytes
           //$thumb->bicubic_resample=false;             // [OPTIONAL] set resample algorithm to bicubic
           */

           //$thumb->img_watermark='images/itest_small_icon.png';        // [OPTIONAL] set watermark source file, only PNG format [RECOMENDED ONLY WITH GD 2 ]
           $this->thumbnailmanager->img_watermark_Valing='TOP';           // [OPTIONAL] set watermark vertical position, TOP | CENTER | BOTTON
           $this->thumbnailmanager->img_watermark_Haling='RIGHT';           // [OPTIONAL] set watermark horizonatal position, LEFT | CENTER | RIGHT

           //$thumb->txt_watermark='360TV';        // [OPTIONAL] set watermark text [RECOMENDED ONLY WITH GD 2 ]
           $this->thumbnailmanager->txt_watermark_color='FFFFFF';        // [OPTIONAL] set watermark text color , RGB Hexadecimal[RECOMENDED ONLY WITH GD 2 ]
           $this->thumbnailmanager->txt_watermark_font=3;
           /*
                // [OPTIONAL] set watermark text font: 1,2,3,4,5
                $thumb->txt_watermark_Valing='BOTTOM';       // [OPTIONAL] set watermark text vertical position, TOP | CENTER | BOTTOM
                $thumb->txt_watermark_Haling='RIGHT';       // [OPTIONAL] set watermark text horizonatal position, LEFT | CENTER | RIGHT
                $thumb->txt_watermark_Hmargin=10;           // [OPTIONAL] set watermark text horizonatal margin in pixels
                $thumb->txt_watermark_Vmargin=10;           // [OPTIONAL] set watermark text vertical margin in pixels

                $thumb->size_width(150);                    // [OPTIONAL] set width for thumbnail, or
                $thumb->size_height(113);                    // [OPTIONAL] set height for thumbnail, or
                $thumb->size_auto(150);                        // [OPTIONAL] set the biggest width or height for thumbnail
                */
                $this->thumbnailmanager->size_width((int)$dimensions[0]);                    // set width for thumbnail, or
                //$thumb->size_height((int)$dimensions[1]);    
                //$thumb->size((int)$dimensions[0],(int)$dimensions[1]);                    // [OPTIONAL] set the biggest width and height for thumbnail

                $this->thumbnailmanager->process();   

                //enable cache                        // generate image
                $offset = 60 * 60 * 24 * 1;
                $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
                header($ExpStr); 
                $this->thumbnailmanager->show();                                // show your thumbnail, or

                //$thumb->save("thumbnail.".$thumb->output_format);            // save your thumbnail to file, or
                //$image = $thumb->dump();                  // get the image

                exit;
      }
  }
?>
