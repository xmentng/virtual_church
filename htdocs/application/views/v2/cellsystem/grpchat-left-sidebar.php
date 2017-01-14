							<li style="border-bottom:1px solid #eeeff0;"> 
								<a href="/soulwinning/viewinviteeinfo" title="View detail"> 
									<i class="fa fa-comments-o text-success"></i>  
									<p>	 <?php
									
								   if($this->session->userdata('total_scall_invites') > 0){
								   
										echo "Total Invites (".$this->session->userdata('total_scall_invites').")";
								   
								   }else{
								   
										echo "Total Invite (".$this->session->userdata('total_scall_invites').")";
								   
								   }
									
								   ?></p>
								</a>  
							</li>
                            <li style="border-bottom:1px solid #eeeff0;"> 
								<a href="/soulwinning/viewsoulswoninfo" title="View detail"> 	
									<i class="fa fa-comments-o text-danger"></i> 

									<p><?php
										
										if($this->session->userdata('total_soulswon') > 0){
											
											echo "Total Souls Won (".$this->session->userdata('total_soulswon').")";
											
										}else{
											
											echo "Total Soul Won (".$this->session->userdata('total_soulswon').")";
										}
									
								   ?></p>
								</a> 
							</li>