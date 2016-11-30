<?php $this->load->view('vw_header');  ?>
<body class="cls_std_font cls_std_font_size">
<div id="_gen_wpr">
	<?php $this->load->view('vw_welcome_user');  ?>

    <div id="_id_content">
        <div id="_id_left_sidebar">    
        	<?php $this->load->view('central_admin/vw_ca_left_sidebar');  ?>
        </div><!--END LEFT SIDE BAR-->
        
        <div id="_id_landing_page">
        	<div id="_id_horizontal_menu">
            	<?php $this->load->view('central_admin/vw_ca_hmenu');  ?>
            </div>
            
            <div id="_id_actual_page">
                <code class="_id_page_title" style="font-size:16px;">
                	<strong><?php echo @$data['page_desc'];   ?></strong>
                </code>
               	Blah! blah!! blah!!! 
            </div>
        </div><!--end _id_landing_page-->
        <div style="clear:both"></div>
    </div><!--end _id_content-->
    
    <div id="_id_footer">
  		<?php $this->load->view('vw_footer');  ?>
    </div>
    
</div><!--end id_gen_wpr-->


	
</body>
</html>