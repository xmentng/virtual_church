<?php $this->load->view('vw_header');  ?>
<link type="text/css" rel="stylesheet" media="all" href="/css/chat.css" />
<style type="text/css">

.background {
    border-style: none;
    width: 62px;
	margin-top:10px;
	overflow:hidden;
	position:relative;
	top:-10px;
    height: 38px;
}
.numbers {
    border-style: none;
    background-color: #292929;
    padding: 0px;
    margin: 0px;
    width: 62px;
    height: 42px;
	
    text-align: center; 
    font-family: Arial; 
    font-size: 34px;
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    color: #C00;     /* change color using the hexadecimal color codes for HTML */
}
.title {    /* the styles below will affect the title under the numbers, i.e., "Days", "Hours", etc. */
    border: none;    
    padding: 0px;
    margin: -5px 3px;
    width: 62px;
    text-align: center; 
    font-family: Arial; 
    font-size: 10px; 
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    color: #f5f5f5;    /* change color using the hexadecimal color codes for HTML */
    background-color:none;  
}
#form {    /* the styles below will affect the outer border of the countdown timer */
    width: 450px;
    height: 80px;
	text-shadow:none;
    border-style: ridge;  /* options are none, dotted, dashed, solid, double, groove, ridge, inset, outset */
    border-width:0;
    border-color: #666666;  /* change color using the hexadecimal color codes for HTML */ 
    background-image:transparent;
    padding: 5px;
	margin-top:15%;
    /*margin: 100px auto;*/
    position: absolute;   /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */
	left:16%;
	z-index:9000px;
   /* change to position the timer */
 /* change to position the timer; delete this property and it's value to keep timer centered on page */
}
.line {
    border-style: none;
    width: 62px; 
    height: 2px;
    z-index: 15;
	color: # 999
}
</style>

<link rel="stylesheet" href="/css/chat.css" type="text/css" />
<!--<script src="/js/chat.js" type="text/javascript"></script>
-->
<script type="text/javascript">

/*
Count down until any date script-
By JavaScript Kit (www.javascriptkit.com)
Over 200+ free scripts here!
Modified by Robert M. Kuhnhenn, D.O. 
on 5/30/2006 to count down to a specific date AND time,
and on 1/10/2010 to include time zone offset.
*/
/*  Change the items below to create your countdown target date and announcement once the target date and time are reached.  */
/*var card="http://www.google.com";  
*/

var current="<span style=''>NOW LIVE</span>!<br> <em  style='font-size:14px;'>Refresh page to watch now</em><br><br>";        //—>enter what you want the script to display when the target date and time are reached, limit to 20 characters
var year=<?php echo $church_service['year'][$data['nthval']];?>;        //—>Enter the count down target date YEAR
var month=<?php echo $church_service['month'][$data['nthval']];?>;          //—>Enter the count down target date MONTH
var day=<?php echo $church_service['day'][$data['nthval']];?>;           //—>Enter the count down target date DAY
var hour=<?php echo $church_service['hour'][$data['nthval']];?>;          //—>Enter the count down target date HOUR (24 hour clock)
var minute=<?php echo $church_service['minute'][$data['nthval']];?>;        //—>Enter the count down target date MINUTE
var tz=<?php echo $church_service['time_zone'][$data['nthval']];?>;             //—>Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)

//—>    DO NOT CHANGE THE CODE BELOW!    <—
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

function countdown(yr,m,d,hr,min){
    theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;
    var today=new Date();
	
    var todayy=today.getYear();
	
    if (todayy < 1000) {
    	todayy+=1900; 
	}
    var todaym=today.getMonth();
    var todayd=today.getDate();
    var todayh=today.getHours();
    var todaymin=today.getMinutes();
    var todaysec=today.getSeconds();
	
    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;
    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);
	
    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);
    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));
	
    var dd=futurestring-todaystring;
	
    var dday=Math.floor(dd/(60*60*1000*24)*1);
    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);
    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
    
	if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){
		
		document.getElementById('video').style.display   = "none";
		//$('#videoWr').load('/player.php').fadeIn("slow");
		
		document.getElementById('video').style.visibility   = "hidden";
		document.getElementById('screen').style.background   = "#0000";
		
		document.getElementById('count2').innerHTML=current;

		document.getElementById('count2').style.display="inline";
		
        document.getElementById('count2').style.width="390px";
        document.getElementById('dday').style.display="none";
        document.getElementById('dhour').style.display="none";
        document.getElementById('dmin').style.display="none";
        document.getElementById('dsec').style.display="none";
        document.getElementById('days').style.display="none";
        document.getElementById('hours').style.display="none";
        document.getElementById('minutes').style.display="none";
        document.getElementById('seconds').style.display="none";

        return;
    }
    else {		
		document.getElementById('video').style.display   = "inline";
		//document.getElementById('screen').style.visibility   = "hidden";
        document.getElementById('count2').style.display="none";
        document.getElementById('dday').innerHTML=dday;
        document.getElementById('dhour').innerHTML=dhour;
        document.getElementById('dmin').innerHTML=dmin;
        document.getElementById('dsec').innerHTML=dsec;


        setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);
    }
}
</script>
<body class="whitebg" onLoad="countdown(year,month,day,hour,minute)">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
             <?php $this->load->view("church_member/page_name_welcome_user");   ?> 

          </div><!--end class greybar-->
      
      
   	  </div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8; margin-bottom:5%;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            
           
            
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content">
            
            		<!--<div class="cls_page_desc" style="width:100%; height:25px; line-height:25px;">
                    	<span style="font-weight:bolder; font-size:1.1875em;">Church Service</span>
                    </div>
                -->

				<div class="cls_lpage_left_col" style="width:52%; float:left;" >
                    
                    <div id="video" style="background:#000;"  >
                   
                      <div id="form" style="background:#000;">
                        <div class="numbers" id="count2" style="position: absolute; top: 10px; height: 60px; padding: 15px 0 0 10px; background-color: #000000; z-index: 20;"></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 69px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 69px; top: 40px;"/>
                        <div class="numbers" id="dday" style="position: absolute; left: 69px; top: 21px;" ></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 141px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 141px; top: 40px;"/>
                        <div class="numbers" id="dhour" style="position: absolute; left: 141px; top: 21px;" ></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 213px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 213px; top: 40px;"/>
                        <div class="numbers" id="dmin" style="position: absolute; left: 213px; top: 21px;" ></div>
                        <img src="/images/bkgdimage.gif" class="background" style="position: absolute; left: 285px; top: 12px;"/> <img src="/images/line.jpg" class="line" style="position: absolute; left: 285px; top: 40px;"/>
                        <div class="numbers" id="dsec" style="position: absolute; left: 285px; top: 21px;" ></div>
                        <div class="title" id="days" style="position: absolute; left: 66px; top: 73px;" >Days</div>
                        <div class="title" id="hours" style="position: absolute; left: 138px; top: 73px;" >Hours</div>
                        <div class="title" id="minutes" style="position: absolute; left: 210px; top: 73px;" >Minutes</div>
                        <div class="title" id="seconds" style="position: absolute; left: 282px; top: 73px;" >Seconds</div>
                      </div>
                    
                    </div><!--end video-->
                    
<script src="/js/swfobject.js"></script>  

<script src="/js/html5media.min.js"></script>


 <div id="screen" class="video_screen">
        
    <embed id="ply" width="640" height="450" flashvars="autostart=true&showimage=false&repeat=list&autoscroll=false&shuffle=false&bufferlength=5&enablejs=true&javascriptid=plyr&streamer=<?php echo @$church_detail['stream_url'][0];    ?>&file=<?php echo @$church_detail['file_stream'][0];    ?>&backcolor=0x000000&frontcolor=0xCCCCCC&lightcolor=0x557722&logo=/res/images/logo5.png&type=video&skin=/res/flash/overlay.swf&stretching=exactfit" allowscriptaccess="always" wmode="opaque" allowfullscreen="true" quality="high" bgcolor="#ffffff" name="ply" style="undefined" src="/js/player.swf" type="application/x-shockwave-flash">
    </embed>
</div>

<div> <a href='<?php echo @$church_detail['android'][0];    ?>'>Android Devices</a>  |   <a href='<?php echo @$church_detail['ipad'][0];    ?>'>iPads/iPhones</a>    |        <a href='<?php echo @$church_detail['blackberry'][0];    ?>'>BlackBerry Devices</a>   </div>




<script type="text/javascript">
function loadVideoPlayer() {
	var ua = navigator.userAgent;
	if (ua.indexOf("BlackBerry") >= 0)
	{
		if (ua.indexOf("WebKit") >= 0)
		{
		//alert('here');
			$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="640" height="450" controls ></video>';
		}
	}//end if blackberry
	if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i))) {
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="640" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	} else if ((navigator.userAgent.match(/Android/g)){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="640" height="450" controls="controls"  autoplay="autoplay" preload></video>');								  
	}else {
		var s2 = new SWFObject('/js/player.swf','ply','640','450','9','#ffffff');
		s2.addParam("allowfullscreen","true");
		s2.addParam("wmode","transparent");
		s2.addVariable("autostart","true");
		s2.addVariable("showimage","false");
		s2.addVariable("repeat","list");
		s2.addVariable('autoscroll','false');
		s2.addVariable('shuffle','false');
		s2.addParam('allowscriptaccess','always');
		s2.addVariable('bufferlength','5');
		s2.addVariable("enablejs","true");
		s2.addVariable('javascriptid','plyr');
		s2.addVariable('streamer','<?php echo @$church_detail['stream_url'][0];    ?>');
		s2.addVariable('file','<?php echo @$church_detail['file_stream'][0];    ?>');
		s2.addVariable("backcolor","0x000000");
		s2.addVariable("frontcolor","0xCCCCCC");
		s2.addVariable("lightcolor","0x557722");
		s2.addVariable('logo','/res/images/logo5.png');
		//s2.addVariable("width","430");
		//s2.addVariable("height","344");
		s2.addVariable("type","video");
		s2.addVariable('skin','/images/overlay.swf');
		s2.addVariable("stretching","exactfit");
		s2.write('#screen');
	}//end if-else
}//end function




</script>

<script>loadVideoPlayer();</script>
                    
                   
                    
                    
                    <div style="float:left; width:100%; margin-top:5px;background:#000; padding-top:5px"> 
                        <a href="/churchmember/prayer_request" style="margin-right:2px; margin-left:2px;">
                            <img src="/images/prequest.jpg" style="width:32%; height:auto"  />
                        </a>
    
                        <a href="/cgurchmember/testimony/" style="margin-right:2px;">
                            <img src="/images/testimony2.jpg" style="width:32%; height:auto" />
                        </a>
    
                        <a href="/churchmember/giving" style="margin-right:2px;">
                            <img src="/images/giveonline.jpg" style="width:32%; height:auto" />
                        </a>
					</div>
                    
                    <div class="cls_chat_with_cell_leader">
        
                      <a  href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $page_res['church_account_name'];?>','<?php echo $page_res['church_account_name'];?>'); return false;">
                          <span style="font-weight:bolder; font-size:1.0625em; color:green;"> Click to chat </span>
                      </a>
                      
                    
                      
                      
                    </div><!--end class cls_chat_with_cell_leader-->
                </div><!--end cls_lpage_left_col-->
                
                <div class="cls_lpage_right_col" style="width:48%; float:right;">
                  	 
                    <div id="tabs">
                    <ul>
                      <li><a href="#tabs-1">Live Blog</a></li>
                      <li><a href="#tabs-2">Bible</a></li>
                      <li><a href="#tabs-3">Note</a></li>
                      <li><a href="#tabs-4">Salvation Call</a></li>
                    </ul>
                    <div id="tabs-1">
                       <div id="login_for_chat">
                         <div class="blog">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#FFFFFF">
                <a href=""> </a>
                	<form  id="frmcomments" name="frmcomments" method="post">
                    <code class="<?php echo @$data['blog_css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php echo @$data['blog_msg']; ?></code>
                      <table width="100%" border="0" cellspacing="0" cellpadding="3" style="color:#666666; font-size:12px;">
                        <tr>
                          <td width="12%" align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Name:</strong></td>
                          <td width="88%" bgcolor="#FFFFFF"><input type="text" name="name" id="name" class="cls_txtflds" readonly value="<?php echo @$user_detail['first_name'][0].'  '. $user_detail['last_name'][0]; ?>" /></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Email:</strong></td>
                          <td bgcolor="#FFFFFF"><input type="text" name="email" id="email" class="cls_txtflds" readonly value="<?php echo @$user_detail['email'][0]; ?>" /></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Phone:</strong></td>
                          <td bgcolor="#FFFFFF"><input type="text" name="phone" id="phone" class="cls_txtflds" required /></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Country:</strong></td>
                          <td bgcolor="#FFFFFF"><select name="country" id="country" class="cls_txtflds" required>
                            <option selected="selected" value="">Please Select</option>
                            <option value="Afghanistan|Middle East">Afghanistan </option>
                            <option value="Albania|Europe">Albania </option>
                            <option value="Algeria|Africa">Algeria </option>
                            <option value="Andorra|Europe">Andorra </option>
                            <option value="Angola|Africa">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Antarctica">Antarctica </option>
                            <option value="Argentina|SouthAmerica">Argentina </option>
                            <option value="Armenia|Europe">Armenia </option>
                            <option value="Aruba">Aruba </option>
                            <option value="Australia|Oceania">Australia </option>
                            <option value="Austria|Europe">Austria </option>
                            <option value="Azerbaijan|Europe">Azerbaijan </option>
                            <option value="Bahamas|Carribbeans">Bahamas</option>
                            <option value="Bahrain|Middle East">Bahrain </option>
                            <option value="Bangladesh|MiddleEast">Bangladesh </option>
                            <option value="Barbados|Carribbeans">Barbados </option>
                            <option value="Belarus|Europe">Belarus </option>
                            <option value="Belgium|Europe">Belgium </option>
                            <option value="Belize|Europe">Belize </option>
                            <option value="Benin|Africa">Benin </option>
                            <option value="Bermuda|Carribbeans">Bermuda </option>
                            <option value="Bhutan|MiddleEast">Bhutan </option>
                            <option value="Bolivia|SouthAmerica">Bolivia </option>
                            <option value="Botswana|Africa">Botswana </option>
                            <option value="Bouvet|Other">Bouvet Island </option>
                            <option value="Brazil|SouthAmerica">Brazil </option>
                            <option value="Brunei|MiddleEast">Brunei </option>
                            <option value="Bulgaria|Europe">Bulgaria </option>
                            <option value="Burkina Faso|Africa ">Burkina Faso </option>
                            <option value="Burundi|Africa">Burundi </option>
                            <option value="Cambodia|Asia">Cambodia </option>
                            <option value="Cameroon|Africa">Cameroon </option>
                            <option value="Canada|NorthAmerica">Canada </option>
                            <option value="Cape Verde|Africa">Cape Verde </option>
                            <option value="Cayman|Other">Cayman Islands </option>
                            <option value="Chad|Africa">Chad </option>
                            <option value="Chile|SouthAmerica">Chile </option>
                            <option value="China|Asia">China </option>
                            <option value="Colombia|SouthAmerica">Colombia </option>
                            <option value="Comoros|Other">Comoros </option>
                            <option value="Congo|Africa">Congo </option>
                            <option value="Congo, DR|Africa">Congo, DR</option>
                            <option value="Cook Islands|Other">Cook Islands </option>
                            <option value="Costa Rica|Africa">Costa Rica </option>
                            <option value="Cote Ivoire|Africa">Cote D\'Ivoire </option>
                            <option value="Croatia|Africa">Croatia </option>
                            <option value="Cuba|NorthAmerica">Cuba </option>
                            <option value="Cyprus|Europe">Cyprus </option>
                            <option value="Czech Republic|Europe">Czech Republic </option>
                            <option value="Denmark|Europe">Denmark </option>
                            <option value="Djibouti|Africa">Djibouti </option>
                            <option value="Dominica|Other">Dominica </option>
                            <option value="East Timor|Other">East Timor </option>
                            <option value="Ecuador|SouthAmerica">Ecuador </option>
                            <option value="Egypt|Africa">Egypt </option>
                            <option value="El Salvador|Other">El Salvador </option>
                            <option value="Equatorial Guinea|Africa">Equatorial Guinea </option>
                            <option value="Eritrea|Africa">Eritrea </option>
                            <option value="Estonia|Europe">Estonia </option>
                            <option value="Ethiopia|Africa">Ethiopia </option>
                            <option value="Finland|Europe">Finland </option>
                            <option value="France|Europe">France </option>
                            <option value="Gabon|Africa">Gabon </option>
                            <option value="Gambia|Africa">Gambia</option>
                            <option value="Georgia|Europe">Georgia </option>
                            <option value="Germany|Europe">Germany </option>
                            <option value="Ghana|Africa">Ghana </option>
                            <option value="Gibraltar|Other">Gibraltar </option>
                            <option value="Greece|Europe">Greece </option>
                            <option value="Grenada|Other">Grenada </option>
                            <option value="Guatemala|SouthAmerica">Guatemala </option>
                            <option value="Guinea|Africa">Guinea </option>
                            <option value="Guinea-Bissau|Africa">Guinea-Bissau </option>
                            <option value="Guyana|Europe">Guyana </option>
                            <option value="Haiti|Carribbeans">Haiti </option>
                            <option value="Honduras|Carribbeans">Honduras </option>
                            <option value="Hungary|Europe">Hungary </option>
                            <option value="Iceland|Europe">Iceland </option>
                            <option value="India|Asia">India </option>
                            <option value="Indonesia|Asia">Indonesia </option>
                            <option value="Iran|MiddleEast">Iran </option>
                            <option value="Iraq|MiddleEast">Iraq </option>
                            <option value="Ireland|Europe">Ireland </option>
                            <option value="Israel|Europe">Israel </option>
                            <option value="Italy|Europe">Italy </option>
                            <option value="Jamaica|Carribbeans">Jamaica </option>
                            <option value="Japan|Asia">Japan </option>
                            <option value="Jordan|MiddleEast">Jordan </option>
                            <option value="Kazakhstan|MiddleEast">Kazakhstan </option>
                            <option value="Kenya|Africa">Kenya </option>
                            <option value="Kiribati|Other">Kiribati </option>
                            <option value="Korea South|Asia">Korea, South</option>
                            <option value="Korea North|Asia">Korea, North </option>
                            <option value="Kuwait|MiddleEast">Kuwait </option>
                            <option value="Kyrgyzstan|Europe">Kyrgyzstan </option>
                            <option value="Laos|Other">Laos </option>
                            <option value="Latvia|Europe">Latvia </option>
                            <option value="Lebanon|MiddleEast">Lebanon </option>
                            <option value="Lesotho|Africa">Lesotho </option>
                            <option value="Liberia|Africa">Liberia </option>
                            <option value="Libya|Africa">Libya </option>
                            <option value="Lithuania|Europe">Lithuania </option>
                            <option value="Luxembourg|Europe">Luxembourg </option>
                            <option value="Macedonia|Europe">Macedonia </option>
                            <option value="Madagascar|Africa">Madagascar </option>
                            <option value="Malawi|Africa">Malawi </option>
                            <option value="Malaysia|Asia">Malaysia </option>
                            <option value="Maldives|Oceania">Maldives </option>
                            <option value="Mali|Africa">Mali </option>
                            <option value="Malta|Europe">Malta </option>
                            <option value="Mauritania|Africa">Mauritania </option>
                            <option value="Mauritius|Africa">Mauritius </option>
                            <option value="Mayotte|Other">Mayotte </option>
                            <option value="Mexico|NorthAmerica">Mexico </option>
                            <option value="Micronesia|Other">Micronesia </option>
                            <option value="Moldova|Europe">Moldova </option>
                            <option value="Mongolia|Asia">Mongolia </option>
                            <option value="Montserrat|Other">Montserrat </option>
                            <option value="Morocco|Africa">Morocco </option>
                            <option value="Mozambique|Africa">Mozambique </option>
                            <option value="Myanmar|Other">Myanmar </option>
                            <option value="Namibia|Africa">Namibia </option>
                            <option value="Nauru|Other">Nauru </option>
                            <option value="Nepal|Africa">Nepal </option>
                            <option value="Netherlands|Europe">Netherlands </option>
                            <option value="New Caledoria|Other">New Caledonia </option>
                            <option value="New Zealand|Oceania">New Zealand </option>
                            <option value="Nicaragua|Other">Nicaragua </option>
                            <option value="Niger|Africa">Niger </option>
                            <option value="Nigeria|Africa">Nigeria </option>
                            <option value="Niue|Other">Niue </option>
                            <option value="Norway|Europe">Norway </option>
                            <option value="Oman|MiddleEast">Oman </option>
                            <option value="Pakistan|MiddleEast">Pakistan </option>
                            <option value="Palau|Other">Palau </option>
                            <option value="Panama|Carribbeans">Panama </option>
                            <option value="Paraguay|SouthAmerica">Paraguay </option>
                            <option value="Peru|SouthAmerica">Peru </option>
                            <option value="Philippines|MiddleEast">Philippines </option>
                            <option value="Poland|Europe">Poland </option>
                            <option value="Portugal|Europe">Portugal </option>
                            <option value="Puerto Rico|Carribbeans">Puerto Rico </option>
                            <option value="Qatar|Asia">Qatar </option>
                            <option value="Reunion|Africa">Reunion </option>
                            <option value="Romania|Europe">Romania </option>
                            <option value="Russia|Europe">Russia </option>
                            <option value="Rwanda|Africa">Rwanda </option>
                            <option value="Saudi Arabia|MiddleEast">Saudi Arabia </option>
                            <option value="Senegal|Africa">Senegal </option>
                            <option value="Sierra Leone|Africa">Sierra Leone </option>
                            <option value="Singapore|Asia">Singapore </option>
                            <option value="Slovakia|Europe">Slovakia </option>
                            
                            <option value="Slovenia|Europe">Slovenia </option>
                            <option value="Somalia|Africa">Somalia </option>
                            <option value="South Africa|Africa">South Africa </option>
                            <option value="South Georgia|Europe">South Georgia </option>
                            <option value="Spain|Europe">Spain </option>
                            <option value="Sri Lanka|Asia">Sri Lanka </option>
                            <option value="Sudan|Africa">Sudan </option>
                            <option value="Swaziland|Africa">Swaziland </option>
                            <option value="Sweden|Africa">Sweden </option>
                            <option value="Switzerland|Europe">Switzerland </option>
                            <option value="Syria|MiddleEast">Syria </option>
                            <option value="Taiwan|Asia">Taiwan </option>
                            <option value="Tajikistan|Other">Tajikistan </option>
                            <option value="Tanzania|Africa">Tanzania </option>
                            <option value="Thailand|Asia">Thailand </option>
                            <option value="Togo|Africa">Togo </option>
                            <option value="Tokelau|Other">Tokelau </option>
                            <option value="Tonga|Oceania">Tonga </option>
                            <option value="Trinidad and Tobago|Carribbeans">Trinidad and Tobago </option>
                            <option value="Tunisia|Africa">Tunisia </option>
                            <option value="Turkey|Europe">Turkey </option>
                            <option value="Uganda|Africa">Uganda </option>
                            <option value="Ukraine|Europe">Ukraine </option>
                            <option value="UAE|MiddleEast">UAE</option>
                            <option value="UK|Europe">UK </option>
                            <option value="USA|NorthAmerica">USA</option>
                            <option value="Uruguay|SouthAmerica">Uruguay </option>
                            <option value="Uzbekistan|Asia">Uzbekistan </option>
                            <option value="Vanuatu|Other">Vanuatu </option>
                            <option value="Venezuela|SouthAmerica">Venezuela </option>
                            <option value="Vietnam|Asia">Vietnam </option>
                            <option value="Yemen|MIddleEast">Yemen </option>
                            <option value="Yugoslavia|Europe">Yugoslavia </option>
                            <option value="Zambia|Africa">Zambia </option>
                            <option value="Zimbabwe|Africa">Zimbabwe </option>
                            </select></td>
                          </tr>
                        <tr>
                          <td align="right" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Comment:</strong></td>
                          <td valign="top" bgcolor="#FFFFFF"><textarea name="comment" id="comment" style="min-height:30px; min-width:80%" required></textarea></td>
                          </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                          	<input type="hidden" name="church_id" id="church_id" value="<?php echo @$user_detail['church_id'][0];   ?>" />
                            <input type="hidden" name="stream_url" id="stream_url" value="<?php echo @$church_detail['stream_url'][0];    ?>" />
                            <input type="hidden" name="account_name" id="account_name" value="<?php echo @$user_detail['user_name'][0];    ?>" />
                          	<input type="submit" name="cmdclick" id="cmdclick" value="Submit" />
                            
                            </td>
                          </tr>
                      </table>
                      </form>
                </td>
              </tr>
            </table>

                
            
            </div>
        	<?php 
				if($page_res['ncomments'] > 0 ){
					
					
			?>
       		<div id="blogged" style="border:transparent; background-color:#FFFFFF; margin-top:10px;  color:#00293E; font-size:0.75em;">
            	
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  
                   <tr>
                    <td colspan="3"><span style="font-weight:bolder; padding:0px 7px;">Comment(s): <?php echo  $page_res['ncomments'];  ?> </span></td>
                  </tr>
                  
                  <tr  style="border:dotted 1px #007BB7;">
                    <td bgcolor="#FFECEC"><span style="font-weight:bolder; padding:0px 7px;">Name</span></td>
                    <td bgcolor="#FFECEC"><span style="font-weight:bolder; padding:0px 7px;">Comment</span></td>
                    <td bgcolor="#FFECEC"><span style="font-weight:bolder; padding:0px 7px;">Time </span></td>
                  </tr>
                  <?php for($k = 0; $k < $page_res['ncomments']; $k++): ?>
                  <tr  style="border:dotted 1px #007BB7;">
                    <td><span style="padding:0px 7px;"><?php  echo  $comment['name'][$k];   ?></span></td>
                    <td><p style="padding:0px 7px; text-align:left;"><?php  echo  $comment['comment'][$k];   ?></p></td>
                    <td><span style="padding:0px 7px;"><?php  echo date('l, j F, Y', $comment['time_posted'][$k]); ?></span></td>
                  </tr>
                  <?php  endfor;  ?>
                </table>

                
                
            </div>
            
            <?php
					
				}
			?>

                      </div>  
                        
                        
                        <!--<div id="chat_session">
                          
                          <div id="menu">
                              <p class="welcome">Welcome, <b><?php //echo @$_SESSION['name']; ?></b></p>
                              <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                              <div style="clear:both"></div>
                          </div>
                  
                          <form action="" method="post" name="frmpostchat" id="frmpostchat">
                              <textarea name="usermsg" id="usermsg" style="max-width:100%; min-height:160px; min-width:100%;"></textarea>
                  
                              
                              <input name="church_id" id="church_id" type="hidden" value="<?php  //echo @$page_res['church_id'];  ?>" >
                              <input name="user_id" id="user_id" type="hidden" value="<?php  //echo @$page_res['user_id'];  ?>" >
                              <input name="stream_url" id="stream_url" type="hidden" value="<?php  //echo @$church_detail['stream_url'][0];  ?>" >
                              
                              <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                  
                          </form>
                       </div> --> 
                    </div><!--end tab-1-->
                    
                    
                    <div id="tabs-2">
                      <h3>The Bible</h3>
                      <iframe height="360px" frameborder="0"  src="http://m.youversion.com/bible/kjv/gen/1/1" style="width:100%"></iframe>
                    </div><!--end tab-2-->
                    
                    
                    <div id="tabs-3">
                      <h3>Take Note</h3>
                        <form action="" method="post" name="frmnote" id="frmnote">
                  
                            <textarea name="txtnote" id="txtnote" cols="" rows="" style="max-width:100%; min-height:160px; min-width:100%;"> </textarea>
                            <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$page_res['church_id'];  ?>" >
                            <input name="user_id" id="user_id" type="hidden" value="<?php  echo @$page_res['user_id'];  ?>" >
                            <input name="stream_url" id="stream_url" type="hidden" value="<?php  echo @$church_detail['stream_url'][0];  ?>" >
                            
                            <input name="submit_note" id="submit_note" type="submit" value="Submit">
                        </form>
                    </div><!--end tab-3-->
                    
                    
                    <div id="tabs-4">
                      
                      <form action="" method="post" name="frmscall" id="frmscall">
                  			
                    <code class="<?php echo @$data['scall_css_cls'];   ?> stdfont stdfontcolor" id="scall_post_result_msg"><?php echo @$data['scall_msg']; ?></code>
                      <table width="100%" border="0" cellspacing="0" cellpadding="3" style="color:#666666; font-size:12px;">
                        <tr>
                          <td width="19%" align="left" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Friend Name:</strong></td>
                          <td width="81%" bgcolor="#FFFFFF"><input type="text" name="sc_name" id="sc_name" class="cls_txtflds"  required value="" style="border:solid 1px #292929; width:90%;" /></td>
                          </tr>
                        <tr>
                          <td align="left" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Friend Email:</strong></td>
                          <td bgcolor="#FFFFFF"><input type="text" name="sc_email" id="sc_email" class="cls_txtflds"  required value="" style="border:solid 1px #292929; width:90%;" /></td>
                          </tr>
                        <tr>
                          <td align="left" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Friend Phone:</strong></td>
                          <td bgcolor="#FFFFFF"><input type="text" name="sc_phone" id="sc_phone" class="cls_txtflds"  style="border:solid 1px #292929; width:90%;" /></td>
                          </tr>
                        <tr>
                          <td align="left" valign="top"><strong><span style="color:#FF0000; font-size:10px;color:red;">*</span>Friend Country:</strong></td>
                          <td bgcolor="#FFFFFF"><select name="sc_country" id="sc_country" class="cls_txtflds" required style="border:solid 1px #292929; width:90%;">
                            <option selected="selected" value="">Please Select</option>
                            <option value="Afghanistan|Middle East">Afghanistan </option>
                            <option value="Albania|Europe">Albania </option>
                            <option value="Algeria|Africa">Algeria </option>
                            <option value="Andorra|Europe">Andorra </option>
                            <option value="Angola|Africa">Angola </option>
                            <option value="Anguilla">Anguilla </option>
                            <option value="Antarctica">Antarctica </option>
                            <option value="Argentina|SouthAmerica">Argentina </option>
                            <option value="Armenia|Europe">Armenia </option>
                            <option value="Aruba">Aruba </option>
                            <option value="Australia|Oceania">Australia </option>
                            <option value="Austria|Europe">Austria </option>
                            <option value="Azerbaijan|Europe">Azerbaijan </option>
                            <option value="Bahamas|Carribbeans">Bahamas</option>
                            <option value="Bahrain|Middle East">Bahrain </option>
                            <option value="Bangladesh|MiddleEast">Bangladesh </option>
                            <option value="Barbados|Carribbeans">Barbados </option>
                            <option value="Belarus|Europe">Belarus </option>
                            <option value="Belgium|Europe">Belgium </option>
                            <option value="Belize|Europe">Belize </option>
                            <option value="Benin|Africa">Benin </option>
                            <option value="Bermuda|Carribbeans">Bermuda </option>
                            <option value="Bhutan|MiddleEast">Bhutan </option>
                            <option value="Bolivia|SouthAmerica">Bolivia </option>
                            <option value="Botswana|Africa">Botswana </option>
                            <option value="Bouvet|Other">Bouvet Island </option>
                            <option value="Brazil|SouthAmerica">Brazil </option>
                            <option value="Brunei|MiddleEast">Brunei </option>
                            <option value="Bulgaria|Europe">Bulgaria </option>
                            <option value="Burkina Faso|Africa ">Burkina Faso </option>
                            <option value="Burundi|Africa">Burundi </option>
                            <option value="Cambodia|Asia">Cambodia </option>
                            <option value="Cameroon|Africa">Cameroon </option>
                            <option value="Canada|NorthAmerica">Canada </option>
                            <option value="Cape Verde|Africa">Cape Verde </option>
                            <option value="Cayman|Other">Cayman Islands </option>
                            <option value="Chad|Africa">Chad </option>
                            <option value="Chile|SouthAmerica">Chile </option>
                            <option value="China|Asia">China </option>
                            <option value="Colombia|SouthAmerica">Colombia </option>
                            <option value="Comoros|Other">Comoros </option>
                            <option value="Congo|Africa">Congo </option>
                            <option value="Congo, DR|Africa">Congo, DR</option>
                            <option value="Cook Islands|Other">Cook Islands </option>
                            <option value="Costa Rica|Africa">Costa Rica </option>
                            <option value="Cote Ivoire|Africa">Cote D\'Ivoire </option>
                            <option value="Croatia|Africa">Croatia </option>
                            <option value="Cuba|NorthAmerica">Cuba </option>
                            <option value="Cyprus|Europe">Cyprus </option>
                            <option value="Czech Republic|Europe">Czech Republic </option>
                            <option value="Denmark|Europe">Denmark </option>
                            <option value="Djibouti|Africa">Djibouti </option>
                            <option value="Dominica|Other">Dominica </option>
                            <option value="East Timor|Other">East Timor </option>
                            <option value="Ecuador|SouthAmerica">Ecuador </option>
                            <option value="Egypt|Africa">Egypt </option>
                            <option value="El Salvador|Other">El Salvador </option>
                            <option value="Equatorial Guinea|Africa">Equatorial Guinea </option>
                            <option value="Eritrea|Africa">Eritrea </option>
                            <option value="Estonia|Europe">Estonia </option>
                            <option value="Ethiopia|Africa">Ethiopia </option>
                            <option value="Finland|Europe">Finland </option>
                            <option value="France|Europe">France </option>
                            <option value="Gabon|Africa">Gabon </option>
                            <option value="Gambia|Africa">Gambia</option>
                            <option value="Georgia|Europe">Georgia </option>
                            <option value="Germany|Europe">Germany </option>
                            <option value="Ghana|Africa">Ghana </option>
                            <option value="Gibraltar|Other">Gibraltar </option>
                            <option value="Greece|Europe">Greece </option>
                            <option value="Grenada|Other">Grenada </option>
                            <option value="Guatemala|SouthAmerica">Guatemala </option>
                            <option value="Guinea|Africa">Guinea </option>
                            <option value="Guinea-Bissau|Africa">Guinea-Bissau </option>
                            <option value="Guyana|Europe">Guyana </option>
                            <option value="Haiti|Carribbeans">Haiti </option>
                            <option value="Honduras|Carribbeans">Honduras </option>
                            <option value="Hungary|Europe">Hungary </option>
                            <option value="Iceland|Europe">Iceland </option>
                            <option value="India|Asia">India </option>
                            <option value="Indonesia|Asia">Indonesia </option>
                            <option value="Iran|MiddleEast">Iran </option>
                            <option value="Iraq|MiddleEast">Iraq </option>
                            <option value="Ireland|Europe">Ireland </option>
                            <option value="Israel|Europe">Israel </option>
                            <option value="Italy|Europe">Italy </option>
                            <option value="Jamaica|Carribbeans">Jamaica </option>
                            <option value="Japan|Asia">Japan </option>
                            <option value="Jordan|MiddleEast">Jordan </option>
                            <option value="Kazakhstan|MiddleEast">Kazakhstan </option>
                            <option value="Kenya|Africa">Kenya </option>
                            <option value="Kiribati|Other">Kiribati </option>
                            <option value="Korea South|Asia">Korea, South</option>
                            <option value="Korea North|Asia">Korea, North </option>
                            <option value="Kuwait|MiddleEast">Kuwait </option>
                            <option value="Kyrgyzstan|Europe">Kyrgyzstan </option>
                            <option value="Laos|Other">Laos </option>
                            <option value="Latvia|Europe">Latvia </option>
                            <option value="Lebanon|MiddleEast">Lebanon </option>
                            <option value="Lesotho|Africa">Lesotho </option>
                            <option value="Liberia|Africa">Liberia </option>
                            <option value="Libya|Africa">Libya </option>
                            <option value="Lithuania|Europe">Lithuania </option>
                            <option value="Luxembourg|Europe">Luxembourg </option>
                            <option value="Macedonia|Europe">Macedonia </option>
                            <option value="Madagascar|Africa">Madagascar </option>
                            <option value="Malawi|Africa">Malawi </option>
                            <option value="Malaysia|Asia">Malaysia </option>
                            <option value="Maldives|Oceania">Maldives </option>
                            <option value="Mali|Africa">Mali </option>
                            <option value="Malta|Europe">Malta </option>
                            <option value="Mauritania|Africa">Mauritania </option>
                            <option value="Mauritius|Africa">Mauritius </option>
                            <option value="Mayotte|Other">Mayotte </option>
                            <option value="Mexico|NorthAmerica">Mexico </option>
                            <option value="Micronesia|Other">Micronesia </option>
                            <option value="Moldova|Europe">Moldova </option>
                            <option value="Mongolia|Asia">Mongolia </option>
                            <option value="Montserrat|Other">Montserrat </option>
                            <option value="Morocco|Africa">Morocco </option>
                            <option value="Mozambique|Africa">Mozambique </option>
                            <option value="Myanmar|Other">Myanmar </option>
                            <option value="Namibia|Africa">Namibia </option>
                            <option value="Nauru|Other">Nauru </option>
                            <option value="Nepal|Africa">Nepal </option>
                            <option value="Netherlands|Europe">Netherlands </option>
                            <option value="New Caledoria|Other">New Caledonia </option>
                            <option value="New Zealand|Oceania">New Zealand </option>
                            <option value="Nicaragua|Other">Nicaragua </option>
                            <option value="Niger|Africa">Niger </option>
                            <option value="Nigeria|Africa">Nigeria </option>
                            <option value="Niue|Other">Niue </option>
                            <option value="Norway|Europe">Norway </option>
                            <option value="Oman|MiddleEast">Oman </option>
                            <option value="Pakistan|MiddleEast">Pakistan </option>
                            <option value="Palau|Other">Palau </option>
                            <option value="Panama|Carribbeans">Panama </option>
                            <option value="Paraguay|SouthAmerica">Paraguay </option>
                            <option value="Peru|SouthAmerica">Peru </option>
                            <option value="Philippines|MiddleEast">Philippines </option>
                            <option value="Poland|Europe">Poland </option>
                            <option value="Portugal|Europe">Portugal </option>
                            <option value="Puerto Rico|Carribbeans">Puerto Rico </option>
                            <option value="Qatar|Asia">Qatar </option>
                            <option value="Reunion|Africa">Reunion </option>
                            <option value="Romania|Europe">Romania </option>
                            <option value="Russia|Europe">Russia </option>
                            <option value="Rwanda|Africa">Rwanda </option>
                            <option value="Saudi Arabia|MiddleEast">Saudi Arabia </option>
                            <option value="Senegal|Africa">Senegal </option>
                            <option value="Sierra Leone|Africa">Sierra Leone </option>
                            <option value="Singapore|Asia">Singapore </option>
                            <option value="Slovakia|Europe">Slovakia </option>
                            
                            <option value="Slovenia|Europe">Slovenia </option>
                            <option value="Somalia|Africa">Somalia </option>
                            <option value="South Africa|Africa">South Africa </option>
                            <option value="South Georgia|Europe">South Georgia </option>
                            <option value="Spain|Europe">Spain </option>
                            <option value="Sri Lanka|Asia">Sri Lanka </option>
                            <option value="Sudan|Africa">Sudan </option>
                            <option value="Swaziland|Africa">Swaziland </option>
                            <option value="Sweden|Africa">Sweden </option>
                            <option value="Switzerland|Europe">Switzerland </option>
                            <option value="Syria|MiddleEast">Syria </option>
                            <option value="Taiwan|Asia">Taiwan </option>
                            <option value="Tajikistan|Other">Tajikistan </option>
                            <option value="Tanzania|Africa">Tanzania </option>
                            <option value="Thailand|Asia">Thailand </option>
                            <option value="Togo|Africa">Togo </option>
                            <option value="Tokelau|Other">Tokelau </option>
                            <option value="Tonga|Oceania">Tonga </option>
                            <option value="Trinidad and Tobago|Carribbeans">Trinidad and Tobago </option>
                            <option value="Tunisia|Africa">Tunisia </option>
                            <option value="Turkey|Europe">Turkey </option>
                            <option value="Uganda|Africa">Uganda </option>
                            <option value="Ukraine|Europe">Ukraine </option>
                            <option value="UAE|MiddleEast">UAE</option>
                            <option value="UK|Europe">UK </option>
                            <option value="USA|NorthAmerica">USA</option>
                            <option value="Uruguay|SouthAmerica">Uruguay </option>
                            <option value="Uzbekistan|Asia">Uzbekistan </option>
                            <option value="Vanuatu|Other">Vanuatu </option>
                            <option value="Venezuela|SouthAmerica">Venezuela </option>
                            <option value="Vietnam|Asia">Vietnam </option>
                            <option value="Yemen|MIddleEast">Yemen </option>
                            <option value="Yugoslavia|Europe">Yugoslavia </option>
                            <option value="Zambia|Africa">Zambia </option>
                            <option value="Zimbabwe|Africa">Zimbabwe </option>
                            </select></td>
                          </tr>
                          <tr>
                              <td align="left">&nbsp;</td>
                              <td>
                                <input type="hidden" name="church_id" id="church_id" value="<?php echo @$user_detail['church_id'][0];   ?>" />
                                <input type="hidden" name="stream_url" id="stream_url" value="<?php echo @$church_detail['stream_url'][0];    ?>" />
                                <input type="hidden" name="account_name" id="account_name" value="<?php echo @$user_detail['user_name'][0];    ?>" />
                                <input type="submit" name="cmdscall" id="cmdscall" value="Submit" />
                              </td>
                         </tr>
                      </table>
                 
                      </form>
                      
                    </div><!--end tab-4-->
                  </div><!--end tabs-->

                </div><!--end cls_lpage_left_col-->
              <div style="clear:both"></div>
                  
           </div><!--end cls_landing_page_content-->
        
      </div><!--end class landing page-->
  </div><!--end class row-->


    <div class="main_footer2">
        <?php  $this->load->view('vw_footer');  ?>
    </div>
</div>

<!--FOOTER-->

<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  
 
    

<script type="text/javascript">

function chatWith(chatuser,chatname) {

	window.open("/chatsystem/startchat/","_blank", "toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, directories=0, status=0, width=450, height=400");
	//return false;	
}//end function



//////////////CHAT SYSTEM//////////////////////////////////

/*function chatWith(chatuser,chatname) {
	
	//alert(chatuser);
	createChatBox(chatuser,chatname);
	$("#chatbox_"+chatuser+" .chatboxtextarea").focus();
}

function createChatBox(chatboxtitle,chatname,minimizeChatBox) {
//alert(chatname);
	if ($("#chatbox_"+chatboxtitle).length > 0) {
	
		if ($("#chatbox_"+chatboxtitle).css('display') == 'none') {
			$("#chatbox_"+chatboxtitle).css('display','block');
			restructureChatBoxes();
		}
		$("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
		return;
	}

	$(" <div />" ).attr("id","chatbox_"+chatboxtitle)
	.addClass("chatbox")
	.html('<div style="cursor:pointer" onclick="javascript:toggleChatBoxGrowth(\''+chatboxtitle+'\')"><div class="chatboxhead"><div class="chatboxtitle">'+chatname+'</div><div class="chatboxoptions">- <a href="javascript:void(0)" onclick="javascript:closeChatBox(\''+chatboxtitle+'\')"> X </a></div><br clear="all"/></div></div><div class="chatboxcontent"></div><div class="chatboxinput"><textarea class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+chatboxtitle+'\',\''+chatname+'\');"></textarea></div>')
	.appendTo($( "body" ));
	//		   alert('sw');
	$("#chatbox_"+chatboxtitle).css('bottom', '0px');
	
	chatBoxeslength = 0;

	for (x in chatBoxes) {
		if ($("#chatbox_"+chatBoxes[x]).css('display') != 'none') {
			chatBoxeslength++;
		}
	}

	if (chatBoxeslength == 0) {
		$("#chatbox_"+chatboxtitle).css('right', '20px');
	} else {
		width = (chatBoxeslength)*(225+7)+20;
		$("#chatbox_"+chatboxtitle).css('right', width+'px');
	}
	
	chatBoxes.push(chatboxtitle);

	if (minimizeChatBox == 1) {
		minimizedChatBoxes = new Array();

		if ($.cookie('chatbox_minimized')) {
			minimizedChatBoxes = $.cookie('chatbox_minimized').split(/\|/);
		}
		minimize = 0;
		for (j=0;j<minimizedChatBoxes.length;j++) {
			if (minimizedChatBoxes[j] == chatboxtitle) {
				minimize = 1;
			}
		}

		if (minimize == 1) {
			$('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','none');
			$('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','none');
		}
	}

	chatboxFocus[chatboxtitle] = false;

	$("#chatbox_"+chatboxtitle+" .chatboxtextarea").blur(function(){
		chatboxFocus[chatboxtitle] = false;
		$("#chatbox_"+chatboxtitle+" .chatboxtextarea").removeClass('chatboxtextareaselected');
	}).focus(function(){
		chatboxFocus[chatboxtitle] = true;
		newMessages[chatboxtitle] = false;
		$('#chatbox_'+chatboxtitle+' .chatboxhead').removeClass('chatboxblink');
		$("#chatbox_"+chatboxtitle+" .chatboxtextarea").addClass('chatboxtextareaselected');
	});

	$("#chatbox_"+chatboxtitle).click(function() {
		if ($('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') != 'none') {
			$("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
		}
	});

	$("#chatbox_"+chatboxtitle).show();
}


function chatHeartbeat(){

	var itemsfound = 0;
	
	if (windowFocus == false) {
 
		var blinkNumber = 0;
		var titleChanged = 0;
		for (x in newMessagesWin) {
			if (newMessagesWin[x] == true) {
				++blinkNumber;
				if (blinkNumber >= blinkOrder) {
					document.title = x+' says...';
					titleChanged = 1;
					break;	
				}
			}
		}
		
		if (titleChanged == 0) {
			document.title = originalTitle;
			blinkOrder = 0;
		} else {
			++blinkOrder;
		}

	} else {
		for (x in newMessagesWin) {
			newMessagesWin[x] = false;
		}
	}

	for (x in newMessages) {
		if (newMessages[x] == true) {
			if (chatboxFocus[x] == false) {s
				//FIXME: add toggle all or none policy, otherwise it looks funny
				$('#chatbox_'+x+' .chatboxhead').toggleClass('chatboxblink');
			}
		}
	}
	
	$.ajax({
	  url: "/chatsystem/?action=chatheartbeat",
	  cache: false,
	  dataType: "json",
	  success: function(data) {
//alert('sw');
		$.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug

				chatboxtitle = item.f;
				cuser=item.u;

				if ($("#chatbox_"+chatboxtitle).length <= 0) {
				//alert(item.u);
					createChatBox(chatboxtitle,cuser);
				}
				if ($("#chatbox_"+chatboxtitle).css('display') == 'none') {
				//alert('er');
					$("#chatbox_"+chatboxtitle).css('display','block');
					restructureChatBoxes();
				}
				
				if (item.s == 1) {
				//alert('ser');
					item.f = username;
				}

				if (item.s == 2) {
				//alert('user');
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {//alert('cuser');
					newMessages[chatboxtitle] = true;
					newMessagesWin[item.u] = true;
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+item.u+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}

				$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
				itemsfound += 1;
			}
		});

		chatHeartbeatCount++;

		if (itemsfound > 0) {
			chatHeartbeatTime = minChatHeartbeat;
			chatHeartbeatCount = 1;
		} else if (chatHeartbeatCount >= 10) {
			chatHeartbeatTime *= 2;
			chatHeartbeatCount = 1;
			if (chatHeartbeatTime > maxChatHeartbeat) {
				chatHeartbeatTime = maxChatHeartbeat;
			}
		}
		
		setTimeout('chatHeartbeat();',chatHeartbeatTime);
	}});
}

function closeChatBox(chatboxtitle) {
	$('#chatbox_'+chatboxtitle).css('display','none');
	restructureChatBoxes();

	$.post("/chatsystem/?action=closechat", { chatbox: chatboxtitle} , function(data){	
	});

}

function toggleChatBoxGrowth(chatboxtitle) {
	if ($('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') == 'none') {  
		
		var minimizedChatBoxes = new Array();
		
		if ($.cookie('chatbox_minimized')) {
			minimizedChatBoxes = $.cookie('chatbox_minimized').split(/\|/);
		}

		var newCookie = '';

		for (i=0;i<minimizedChatBoxes.length;i++) {
			if (minimizedChatBoxes[i] != chatboxtitle) {
				newCookie += chatboxtitle+'|';
			}
		}

		newCookie = newCookie.slice(0, -1)


		$.cookie('chatbox_minimized', newCookie);
		$('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','block');
		$('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','block');
		$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
	} else {
		
		var newCookie = chatboxtitle;

		if ($.cookie('chatbox_minimized')) {
			newCookie += '|'+$.cookie('chatbox_minimized');
		}


		$.cookie('chatbox_minimized',newCookie);
		$('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','none');
		$('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','none');
	}
	
}

function checkChatBoxInputKey(event,chatboxtextarea,chatboxtitle,chatname) {
	 
	 //alert(event.keyCode); return false;
	if(event.keyCode == 13 && event.shiftKey == 0)  {
	
		message = $(chatboxtextarea).val();
		//alert(message);
		message = message.replace(/^\s+|\s+$/g,"");
		$(chatboxtextarea).val('');
		$(chatboxtextarea).focus();
		$(chatboxtextarea).css('height','44px');
		if (message != '') {
		$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+'<?php echo $page_res['name_of_user'];    ?>'+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
			$.post("/chatsystem/?action=sendchat", {to: chatboxtitle, message: message} , function(data){
				//alert(data); return false;																				   
				message = message.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\"/g,"&quot;");
				//alert(data); return false;
				//$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+username+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
				//alert(message);
				$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
			});
		}
		chatHeartbeatTime = minChatHeartbeat;
		chatHeartbeatCount = 1;

		return false;
	}

	var adjustedHeight = chatboxtextarea.clientHeight;
	var maxHeight = 94;

	if (maxHeight > adjustedHeight) {
		adjustedHeight = Math.max(chatboxtextarea.scrollHeight, adjustedHeight);
		if (maxHeight)
			adjustedHeight = Math.min(maxHeight, adjustedHeight);
		if (adjustedHeight > chatboxtextarea.clientHeight)
			$(chatboxtextarea).css('height',adjustedHeight+8 +'px');
	} else {
		$(chatboxtextarea).css('overflow','auto');
	}
	 
}

function startChatSession(){ 

	$.ajax({
	  url: "/chatsystem/?action=startchatsession",
	  cache: false,
	  dataType: "json",
	  async: false,
	  success: function(data) {

		username = data.username;
//alert(username);
		$.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug
	chatusername='';
	
	$.ajax({
	  url: "/chatsystem/?action=chatname&usw="+item.f,
	  cache: false,
	  dataType: "json",
	  async: false,
	  success: function(data) {//alert(data.unm);
					chatusername=data.unm;
					//alert(chatusername);
					}
				});
				
				//alert(chatusername);
				chatboxtitle = item.f;
  chatname=item.u;
				if ($("#chatbox_"+chatboxtitle).length <= 0) {//alert(chatboxtitle+"__");
				
				createChatBox(chatboxtitle,chatusername,1);
				}
				if (item.s == 1) {//alert('w');
					chatname = item.u;
				}

				if (item.s == 2) {//alert('a');
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {//alert('s');
					$("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+chatname+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}
			}
		});
		
		for (i=0;i<chatBoxes.length;i++) {
			chatboxtitle = chatBoxes[i];
			$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
			setTimeout('$("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop($("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);', 100); // yet another strange ie bug
		}
	
	setTimeout('chatHeartbeat();',chatHeartbeatTime);
		
	}});
}


jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};
*/

/////////////END CHAT SYSTEM//////////////////////////////


	function hide_account_detail(){
		$('#recipient_acct_no').hide();
		$('#recipient_bank').hide();
		$('#teller_no').hide();
		return false;
	}//end function
	
	
	function show_account_detail(){
		$('#recipient_acct_no').show();
		$('#recipient_bank').show();
		$('#teller_no').show();
		return false;
	}//end function
	
	
	function show_local_wired_transfer_detail(){
		$('#issued_bank').show();
		$('#receiving_bank').show();
		$('#issued_bank_account').show();
		$('#receiving_bank_account').show();
		return false;
	
	}
	
	function hide_local_wired_transfer_detail(){
		$('#issued_bank').hide();
		$('#receiving_bank').hide();
		$('#issued_bank_account').hide();
		$('#receiving_bank_account').hide();
		return false;
	
	}
	
	
	function pay_pay_api(){
		hide_account_detail();
		hide_local_wired_transfer_detail();
		alert('Comming soon...');	
	}
	
	
	function play_on_android_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="640" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="640" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="640" height="450" controls ></video>';
	}//end function
	
	

$(document).ready(function(){
						   
//////////////////////////////////////////////////////////

$('#cmdnfriend').click(function(){
	
	//alert(1); return false;
	var nf = ('#txtnfriends').val();
	
	alert(nf); return false;								
});

//////////////////////////////////////////////////////////

var refreshId = setInterval(function() 
   {
	 $('#ben2').load('/online.php?randval='+ Math.random());
   }, 9000);
   //stop the clock when this button is clicked
//////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////


	$('#android_device').click(function(){
		play_on_android_device();
		return false;
	});
	
	
	$('#ipad_device').click(function(){
		play_on_ipad_device();
		return false;
	});
	
	
	$('#bb_device').click(function(){
		play_on_bb_device();
		return false;
	});

///////////////////////////////////////////////////////////
	$('#cmdscall').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/churchmember/send_salvation_call",
				   data: $('#frmscall').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#scall_post_result_msg').addClass("success");
								$('#scall_post_result_msg').removeClass("error");							
								$('#scall_post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmscall')[0].reset();
	
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#scall_post_result_msg').removeClass('success');
								$('#scall_post_result_msg').addClass('error');
								$('#scall_post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
	
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event


///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/post_comment/",
				   data: $('#frmcomments').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmcomments')[0].reset();
								
								
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								
								
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event

/////////////////////////////////////////////////////////
	
	$('#submit_note').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/proc_service_note/",
				   data: $('#frmnote').serialize(),
				   success:	function(e){
					   alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
	
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
	
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event
	


//////////////////////SECTION IS FOR CHAT WINDOW/////////////////////////////////

///////////////////////////////////////////////////////	
	return false;	
						   
});



//////////////////THIS SECTION IS FOR THE CHAT SESSIONS ///////////////////////////


////////////////////////////////////////////////////////////////////////////////////

</script>








<!--END OF CONTENT-->



  </body>
</html>

