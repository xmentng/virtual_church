<?php $this->load->view('layout/header2'); ?>
<!-- page info -->
<section id="page-info" class="container-fluid">
    <div class="row">
        <div class="img-area">
            <div class="holder"><img data-velocity="-.5" src="<?= base_url("asset"); ?>/images/img50.jpg" width="1600" height="196" alt="Latest Blogs" />
            </div>
        </div>
        <div class="textholder">
            <div class="container textblock">
                <div class="block">
                    <!-- page title -->
                    <div class="page-title">
                        <div class="holder">
                            <h1><?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name');?>'s Soul Diary</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main -->
<main id="main" role="main" class="container-fluid">
    <div class="container">
        <div class="container widgets" style="background-color:white; margin:15px;">
            <div class="row">
                <!-- blogs -->
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php elseif($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-lg-6 col-lg-push-3 col-sm-12">
                    <div class="blogs" style="border-left:none !important;">
                        <strong class="h3">My Soul Database</strong>
                        <div id="page-wrap" class="table">
                            <table class="table table-hover">
                                <thead >
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(count($souls)>0){ ?>
                                <?php $i=1; foreach($souls as $soul){ ?>
                                <tr>
                                    <td><?php echo $i; $i++; ?></td>
                                    <td><?=$soul->first_name." ".$soul->last_name;?></td>
                                    <td><?=$soul->email;?></td>
                                </tr>
                                <?php } ?>
                                <?php }else{ ?>
                                    <tr>
                                        <td colspan="3">No souls invited</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- videos -->
                <section class="col-lg-3 col-lg-pull-6 col-xs-12 col-sm-6 media" style="border-right:1px solid #ededed !important;">
                    <strong class="h3"><?=$this->session->userdata('first_name')." ".$this->session->userdata('last_name');?></strong>
                    <div class="box">
                        <div class="video">

                            <img src="<?=base_url($this->session->userdata("profile_pic"));?>" alt="image description">
                        </div>

                    </div><hr/>

                    <div class="clearfix" style="margin:20px 0;"></div>


                    <strong class="h3">Invite a friend</strong>
                    <form class="cmxform form-horizontal " id="commentForm" method="post" action="">
                        <div class="form-group" style="margin-bottom:5px; margin-left:0px;">
                            <label for="first_name" class="control-label col-lg-12" style="padding-top:0px; text-align:left;">First Name (required)</label>
                            <div class="col-lg-12">
                                <input class=" form-control" id="first_name" name="first_name" minlength="2" value="<?=set_value('first_name');?>" type="text" required />

                            </div>
                        </div><?=form_error("first_name");?>

                        <div class="form-group" style="margin-bottom:5px; margin-left:0px;">
                            <label for="last_name" class="control-label col-lg-12" style="padding-top:0px; text-align:left;">Last Name (required)</label>
                            <div class="col-lg-12">
                                <input class=" form-control" id="last_name" name="last_name" minlength="2" value="<?=set_value('last_name');?>" type="text" required />

                            </div>
                        </div><?=form_error("last_name");?>

                        <div class="form-group" style="margin-bottom:15px; margin-left:0px;">
                            <label for="email" class="control-label col-lg-12" style="padding-top:0px; text-align:left;">E-Mail (required)</label>
                            <div class="col-lg-12">
                                <input class="form-control " id="email" type="email" name="email" value="<?=set_value('email');?>" required />

                            </div>
                        </div><?=form_error("email");?>
                        <div class="form-group" style="margin-bottom:15px; margin-left:0px;">
                            <label class="control-label col-lg-12" style="padding-top:0px; text-align:left;">Phone</label>
                            <div class="col-lg-12">
                                <input type="text" placeholder="" name="phone" data-mask="(999) 999-9999" value="<?=set_value('phone');?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom:15px; margin-left:0px;">
                            <label class="control-label col-lg-12" style="padding-top:0px; text-align:left;">Country (required)</label>
                            <div class="col-lg-12">
                                <select name="country" class="form-control" id="source" required style="font-size:15px;" >
                                    <option value="">Select Country</option>
                                    <?php foreach(Misc::$countries as $country){ ?>
                                        <option value="<?=$country;?>" <?=set_select('country', $country);?>><?=$country;?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div><?=form_error("country");?>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-12" style="margin-left:4%;">
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- Cell Schedule-->
                <div class="col-lg-3 col-sm-6 col-xs-12 upcoming-events">
                    <!--<strong class="h3">Group Schedule</strong>
                    <article class="post">
                        <time datetime="2015-01-28" class="time"><a>28 <span>Jan</span></a>
                        </time>
                        <div class="text">
                            <h3><a>Prayer And Planning</a></h3>
                            <time datetime="2014-08-17"><span class="fa fa-clock-o"></span>Saturday 4:00 PM to 5:00 PM (GMT+1)</time>
                        </div>
                    </article>
                    <article class="post">
                        <time datetime="2015-01-29" class="time"><a>29 <span>Jan</span></a>
                        </time>
                        <div class="text">
                            <h3><a>Bible Study</a></h3>
                            <time datetime="2014-08-17"><span class="fa fa-clock-o"></span>Saturday 4:00 PM to 5:00 PM (GMT+1)</time>
                        </div>
                    </article>
                    <article class="post">
                        <time datetime="2015-08-17" class="time"><a>5 <span>Feb</span></a>
                        </time>
                        <div class="text">
                            <h3><a>Group Outreach</a></h3>
                            <time datetime="2015-02-05"><span class="fa fa-clock-o"></span>Saturday 4:00 PM to 6:00 PM (GMT+1)</time>
                        </div>
                    </article>
                    <article class="post">
                        <time datetime="2015-08-17" class="time"><a>10 <span>May</span></a>
                        </time>
                        <div class="text">
                            <h3><a>Fellowship Meeting</a></h3>
                            <time datetime="2015-05-10"><span class="fa fa-clock-o"></span>Saturday 4:00 PM to 6:00 PM (GMT+1)</time>
                        </div>
                    </article>-->
                </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php $this->load->view('layout/footer'); ?>