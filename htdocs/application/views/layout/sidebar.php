						<aside id="aside">
							<section class="widget widget-comments" id="accordion3">
								<h3><a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Blog Posts</a></h3>
								<div id="collapse3" class="panel-collapse collapse in">
									<ul>
									<?php
									$rss = simplexml_load_file(base_url("blog/feed"));
									//var_dump($rss->channel->item);
                                    $i=1;
									foreach($rss->channel->item as $post){
									?>
									
										<li>
											<header class="head">
												<strong class="h3"><a href="<?=$post->link;?>"><?=$post->title;?></a></strong>
											</strong>
											</header>
											<p><?=$post->description;?></p>
                                            <div class="meta">
												<a href="<?=$post->comments;?>" style="color:#8a8893 !important; font-size:12px;"><span class="fa fa-comment"></span> <?=$post->comment_count;?> Comments</a>
												<!--<a href="#" style="color:gray !important; font-size:12px;"><span class="fa fa-heart"></span> 567 Likes</a>-->
											</div>
										</li>

									<?php
                                        if($i>=2){
                                            break;
                                        }
                                        $i++;
                                    }
                                    ?>
									</ul>
								</div>
							</section>
							<!--<section class="widget widget-posts" id="accordion2">
								<h3><a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">Upcoming Ministry Events</a></h3>
								<div id="collapse2" class="panel-collapse collapse">
									<ul>
										<li>
											<time class="date" datetime="2014-12-02"><span class="fa fa-calendar-o"></span>February 12, 2014</time>
											<strong class="title"><a href="">THE FIRST REACHOUT CAMPAIGN IN NICARAGUA</a></strong>
											<div class="meta">
												<a href="#"><span class="fa fa-map-marker"></span>Nicaragua, Nicaragua</a>
												</div>
										</li>
										<li>
											<time class="date" datetime="2014-12-02"><span class="fa fa-calendar-o"></span>February 12, 2014</time>
											<strong class="title"><a href="">THE FIRST REACHOUT CAMPAIGN IN NICARAGUA</a></strong>
											<div class="meta">
												<a href="#"><span class="fa fa-map-marker"></span>Nicaragua, Nicaragua</a>
												</div>
										</li>
										<li>
											<time class="date" datetime="2014-12-02"><span class="fa fa-calendar-o"></span>February 12, 2014</time>
											<strong class="title"><a href="">THE FIRST REACHOUT CAMPAIGN IN NICARAGUA</a></strong>
											<div class="meta">
												<a href="#"><span class="fa fa-map-marker"></span>Nicaragua, Nicaragua</a>
												</div>
										</li>
									</ul>
								</div>
							</section>-->
						</aside>