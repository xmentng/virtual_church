<?php $this->load->view('vw_header');  ?>
<body class="cls_std_font cls_std_font_size">
	
    <div class="container">
    
    
    
    </div>
    
    <div id="_id_footer">
  		<?php $this->load->view('vw_footer');  ?>
    </div>

<script type="text/javascript">

$(document).ready(function(){
	
	$('#rept').addClass('cls_pressed');
	$('#rept').css('color','#00283C');
	
	$('#_id_horizontal_menu li a').mouseout(function(){
		$('#rept').css('color','#00283C');
		return false;
	});
	
	return false;
});

</script>    
    
</div><!--end id_gen_wpr-->


	
</body>
</html>