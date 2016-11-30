<?php
if(!function_exists('xml2array')){
function xml2array($contents, $get_attributes=1, $priority = 'tag') { 
    if(!$contents) return array(); 

    if(!function_exists('xml_parser_create')) { 
        //print "'xml_parser_create()' function not found!"; 
        return array(); 
    } 

    //Get the XML parser of PHP - PHP must have this module for the parser to work 
    $parser = xml_parser_create(''); 
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss 
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0); 
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1); 
    xml_parse_into_struct($parser, trim($contents), $xml_values); 
    xml_parser_free($parser); 

    if(!$xml_values) return;//Hmm... 

    //Initializations 
    $xml_array = array(); 
    $parents = array(); 
    $opened_tags = array(); 
    $arr = array(); 

    $current = &$xml_array; //Refference 

    //Go through the tags. 
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array 
    foreach($xml_values as $data) { 
        unset($attributes,$value);//Remove existing values, or there will be trouble 

        //This command will extract these variables into the foreach scope 
        // tag(string), type(string), level(int), attributes(array). 
        extract($data);//We could use the array by itself, but this cooler. 

        $result = array(); 
        $attributes_data = array(); 
         
        if(isset($value)) { 
            if($priority == 'tag') $result = $value; 
            else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        } 

        //Set the attributes too. 
        if(isset($attributes) and $get_attributes) { 
            foreach($attributes as $attr => $val) { 
                if($priority == 'tag') $attributes_data[$attr] = $val; 
                else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr' 
            } 
        } 

        //See tag status and do the needed. 
        if($type == "open") {//The starting of the tag '<tag>' 
            $parent[$level-1] = &$current; 
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag 
                $current[$tag] = $result; 
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data; 
                $repeated_tag_index[$tag.'_'.$level] = 1; 

                $current = &$current[$tag]; 

            } else { //There was another element with the same tag name 

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array 
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result; 
                    $repeated_tag_index[$tag.'_'.$level]++; 
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag.'_'.$level] = 2; 
                     
                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag.'_attr']; 
                        unset($current[$tag.'_attr']); 
                    } 

                } 
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1; 
                $current = &$current[$tag][$last_item_index]; 
            } 

        } elseif($type == "complete") { //Tags that ends in 1 line '<tag />' 
            //See if the key is already taken. 
            if(!isset($current[$tag])) { //New Key 
                $current[$tag] = $result; 
                $repeated_tag_index[$tag.'_'.$level] = 1; 
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

            } else { //If taken, put all things inside a list(array) 
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array... 

                    // ...push the new element into that array. 
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result; 
                     
                    if($priority == 'tag' and $get_attributes and $attributes_data) { 
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data; 
                    } 
                    $repeated_tag_index[$tag.'_'.$level]++; 

                } else { //If it is not an array... 
                    $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag.'_'.$level] = 1; 
                    if($priority == 'tag' and $get_attributes) { 
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                             
                            $current[$tag]['0_attr'] = $current[$tag.'_attr']; 
                            unset($current[$tag.'_attr']); 
                        } 
                         
                        if($attributes_data) { 
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data; 
                        } 
                    } 
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken 
                } 
            } 

        } elseif($type == 'close') { //End of tag '</tag>' 
            $current = &$parent[$level-1]; 
        } 
    } 
     
    return($xml_array); 
}

}  


?>	

<style type="text/css">
.container {
	width: 18%;
	height:auto;
	float:left;
	background:#E0E0E0;
}
h1 {
	font: "Century Gothic", "Trebuchet MS", Helvetica;	
	text-align:center;
	padding: 20px 0;
	color: #aaa;
}
h1 span { color: #666; }
h1 small{
	font: "Century Gothic", "Trebuchet MS", Helvetica;	
	text-transform:uppercase;
	letter-spacing: 0.5em;
	display: block;
	color: #666;
}

h2.acc_trigger {
	
	height:30px;
	line-height:30px;
	/*background:url(/houseofkaris.net/images/bg_mnu_header.jpg) repeat-x;*/
	/*background:#B6B6B6;*/
	margin:3px;
	padding:0px 7px;
/*	color:#FFF;
*/	font-size:12px;
	font-weight:bold;
	background:url(/images/bg_hor_mnu_li.jpg) repeat-x;
	border:solid 1px  #004D71;
	color: #023;
}

h2.acc_trigger a{
	float:left;
	text-decoration:none;
	/*color:#546B78;*/
	color: #023;
	text-shadow:0px 1px 2px #fff ;
	display:block;
	height:30px;
	width:80%;
	line-height:30px;
	
}

h2.acc_trigger img{
	float:left;
	height:20px;
	width:20px;
	margin:4px 2px;
	/*border:solid 1px #fff;
	background-color: #B0C1CE;*/
	line-height:20px;
}

h2.acc_trigger li a{
	float:left;
	text-decoration:none;
	/*color:#546B78;*/
	color: #023;
	text-shadow:0px 1px 2px #fff ;
	display:block;
	height:20px;
	width:100%;
	line-height:20px;
	
}
h2.acc_trigger li a:hover{
	color:#333;
	background: url(/images/bg_mnuitem3.jpg) repeat-x;
}

h2.active {background-position: left bottom;}
.acc_container {
	margin: 0 0 5px; padding: 0;
	overflow: hidden;
	font-size: 12px;
	width: 18%px;
	clear: both;
	background: #f0f0f0;
	border: 1px solid #d6d6d6;
	-webkit-border-bottom-right-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px; 
}
.acc_container .block {
	padding: 20px;
}

.acc_container .major-menuitem-wpr h3 {
	
	font-size:13px;
	padding:0px 7px;
	border:bottom 1px #333;
}

.acc_container li{
	margin: 0 3px;
	height:24px;
	line-height:24px;
	list-style:none;
	border-bottom:dotted 1px #999;
	font-size:12px;
}
.acc_container li img{
	float:left;
	height:15px;
	width:15px;
	margin:2px 3px;
	border:solid 1px #666;
	background-color:#FFF;
}


</style>
<script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
//Set default open/close settings
$('.acc_container').hide(); //Hide/close all containers
/*$('.acc_trigger:first').addClass('active').next().show();*/ //Add "active" class to first trigger, then show/open the immediate next container

//On Click
$('.acc_trigger').click(function(){
	
	var id = $(this).attr('id');

	if( $(this).next().is(':hidden') ) { //If immediate next container is closed...
		$('.acc_trigger').removeClass('active').next().slideUp(); //Remove all .acc_trigger classes and slide up the immediate next container
		//$(this).addClass('active').next().slideDown();
		$(this).toggleClass('active').next().slideDown(); //Add .acc_trigger class to clicked trigger and slide down the immediate next container
	}
	return false; //Prevent the browser jump to the link anchor
});





});//end document ready
</script>


	<?php
		//$arrXml = xml2array(@file_get_contents('./res/menus/client_account_side_menus.xml'),0);
		$xml = @simplexml_load_string(@file_get_contents('./res/menus/client_account_side_menus.xml'));  
		//var_dump($xml);exit;
		
		$mnu_header_icon = "";
		$mnu_header_desc = "";
		
		$mnu_item_icon = "";
		$mnu_item_desc = "";
		$mnu_item_url = "";

		foreach($xml->menu as $menu){
			
			$mnu_header_desc = $menu->menu_headers->menu_header_desc;
			$mnu_header_icon = $menu->menu_headers->menu_header_icon;
			$mnu_header_id = $menu->menu_headers->menu_header_id;
			$menu_items = $menu->menu_items->menu_item;
			
	?>

    <h2 class="acc_trigger stdfontcolor" id="menu_header_<?php echo $mnu_header_id;    ?>"><img src="<?php echo $mnu_header_icon;   ?>"  />&nbsp;<a href="#"><?php echo $mnu_header_desc;  ?> </a></h2>
	<div class="acc_container">
    	<div class="major-menuitem-wpr">
        <?php
				$n=0;
				foreach($menu_items as $menu_item):
				
					$mnu_item_icon = $menu_item->menu_item_icon;
					$mnu_item_desc = $menu_item->menu_item_desc;
					$mnu_item_url = $menu_item->menu_item_url;
					++$n;
			
		?>
				 <li style="margin-left:25px;">
                 	<a  href="<?php  echo @$mnu_item_url;   ?>">
                    	<!--<img src="<?php //echo $mnu_item_icon;  ?>" width="12"  />-->
                        <div class="cls_no" style="height:30px; width:10%; float:left; background-color: #E14900; color:#FFF; text-align:center;">
                        	<?php echo $n;   ?>
                    	</div>
                        <div class="side_bar_mnu_header_content" style="height:30px; width:90%; float:right; color: #363D41;">
                        	<span style="padding:0px 5px;"><?php  echo @$mnu_item_desc;   ?></span>
                    	</div>
                    </a>
                 
                 </li>
         
         <?php
		 		endforeach;	
		 	
		 ?>
         
		</div>
	</div>
    
    <?php
			}
	
	?>
    

	
