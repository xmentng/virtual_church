<ul>
                        	<li class="id_mnu_header" style="background-color:#70819C; color:#FFF;">
                            	<span style="padding:0px 10px;">Cell System Menu</span>
                            </li>
                            
                            <?php //echo $data['has_cell']; exit; ?>
                            
                             <?php if(@$data['has_cell']==0){ ?>
                            <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/join_cell" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Join a Cell</span></a>
                            </li>
                            
                            <?php } ?>
                            
                            <?php //if(@$data['has_cell']==1){ ?>
                            
                            <!--<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/view_cell_leader" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; View Cell Leaders</span></a>
                            </li>-->
                            
                            <?php // } ?>
                            
                            <?php
								if($data['has_cell']==1){ 
									$ncoutlines = count($celloutline['id']);
								
							?>
                            
                          <?php
						  
						  	if(count($celloutline['id']) > 0){
						  ?>
                          <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                            <a href="<?php echo CUSTOM_BASE_URL.$celloutline['cell_outline_url'][$ncoutlines-1];   ?>" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Download Cell Outline</span></a>
                            </li>
                            
                            <?php } else { ?>
                            
                            <!--<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                            <a href="<?php //echo CUSTOMBASEURL.$celloutline['cell_outline_url'][$ncoutlines-1];   ?>" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Download Cell Outline</span></a>
                            </li>-->
                            
                            <?php } }?>
                            
                             
                             <?php if($data['has_cell']==1){ ?>
                            <!--<li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/churchmember/attend_cell_service" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Attend Cell Meeting</span></a>
                          </li>-->
                          
                          <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                                <a href="/meetings/attend/<?php  echo 2;  ?>" style="color:#000;"><span style="padding:0px 10px; font-size:1.0625em;"> &rarr; Attend Cell Meeting</span></a>
                          </li>
                            <?php } ?>
                             
                             
                            
                        </ul>