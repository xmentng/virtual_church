<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <title>Christ Embassy Church Online<?= (isset($page_title)) ? " - " . $page_title : ""; ?></title>
    <link type="text/css" rel="stylesheet" href="http://d1z5hscmkopczy.cloudfront.net/asset/css/bootstrap.min.css" media="all">
    <link type="text/css" rel="stylesheet" href="http://d1z5hscmkopczy.cloudfront.net/asset/css/all.css" media="all">
    <link rel="stylesheet" href="http://d1z5hscmkopczy.cloudfront.net/asset/css/bootstrap-datepicker.min.css" type="text/css" media="screen" charset="utf-8"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <link media="all" rel="stylesheet" href="<?= base_url("asset"); ?>/css/ie.css" />
    <![endif]-->

    <link rel="shortcut icon" href="http://d1z5hscmkopczy.cloudfront.net/asset/images/favicon.png"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script>
   $(document).ready(function(){
       $("#btn_1").click(function(){
           $("#panel1").slideToggle("slow");
       });
       $("#btn_2").click(function(){
           $("#panel2").slideToggle("slow");
       });
   });
   </script>
    <script src="http://d1z5hscmkopczy.cloudfront.net/asset/js/jquery.min.1.10.1.js"></script>
</head>
<body>
<!-- wrapper -->
<div id="wrapper">
    <!-- header -->
    <header id="header">
        <!-- topbar
        <div class="topbar">


            <div class="container has-feedback">
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <div class="timing">
                            <strong class="h3">Sunday Service</strong>
                            <time datetime="2014-08-16">Sunday 09:45 am to 01:30pm</time>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">

                    </div>
                    <div class="col-lg-4 col-md-4 text-right">


                        <div class="shoping-cart">
                            <?php
                            /*$sessfn = $this->session->userdata('user_name');
                            if ($sessfn != "") {
                                $ufirstname = ucfirst($this->session->userdata('first_name'));
                                $ulastname = ucfirst($this->session->userdata('last_name'));
                                */?><!--
                                Welcome <?/*= $ufirstname . " " . $ulastname; */?>! | <a href="<?/*= base_url("auth/logout"); */?>">Log Out</a>
                            <?php /*} else { */?>
                                Welcome Guest! | <a href="<?/*= base_url("auth/login"); */?>">Log In</a>
                            <?php /*} */?>
                        </div>

                    </div>
                </div>
            </div>
        </div> -->
        <div class="container has-feedback">
            <!-- logo -->
            <div class="logo">
                <a href="<?= base_url('home'); ?>"><img src="http://d1z5hscmkopczy.cloudfront.net/asset/images/logo.png" alt="Church Online">
                </a>
            </div>
            <div class="header-holder">
                <div class="events">
                    <strong class="h3">Next Service</strong>
                    <div class="timer">
                        <div class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s" id="getting-started"></div>
                    </div>
                </div>
                <div id="right_side">
                   <div class="togglers">
                       <!--<div id="flip1"><a id="btn_1" style="background-image:none; border:none !important; text-align:justify !important; color:#FF0; font-weight:bold;" href="#" class="strock small-btn">Pray With Pastor Chris</a>
                           <div id="panel1">
                               <div style="text-align:justify">
                                   <?php
/*                                   $feed_url = "https://www.yookos.com/community/pastorchrislive/blog/feeds/posts";
                                   $xml = @simplexml_load_file($feed_url);
                                   if(!$xml){
                                       */?>
                                       <p>Yookos temporary unavailable</p>
                                       <?php
/*                                   }else{
                                       foreach($xml->channel->item as $item) {
                                           $title = $item->title;
                                           $newstring = $item->description;
                                           $pub_date = date("j F Y", strtotime($item->pubDate));

                                           */?>
                                           <strong><?/*=@$title;*/?></strong>
                                           <p><?/*=@$newstring;*/?></p>
                                           <?php
/*                                           break;
                                       }
                                   }
                                   */?>
                               </div>

                           </div>
                       </div>-->
                  <div id="flip2"><a id="btn_2" style="background-image:none; border:none !important; text-align:justify !important; font-weight:bold; color:#FF0;" href="#" class="strock small-btn">Today's Rhapsody</a>
                  <div id="panel2">
                  
                    <strong> Think The Word-way </strong>
                              <p>Tuesday, January 10th. Pastor Chris</p>
                              
                              <p> And be not conformed to this world: but be ye transformed by the renewing of your mind, that ye may prove what is that good, and acceptable, and perfect, will of God (Romans 12:2).
                              </p>
                              
                              <p> As a Christian, it’s important how you think and what you think about. You’re not of this world; therefore, you shouldn’t think like an ordinary person. Don’t say, “I’m American or I’m Australian, as a result, there’s a way I think.” No! When you’re born again, you cease to be of your earthly nativity, because your spirit is recreated. You should therefore only think the Word-way. God’s Word must form the basis for the kind of thoughts you process and allow.
                              </p>
                              
                              <p> Now that you’re in Christ, you have a new culture: the Christ-culture. Until this becomes a reality in your spirit, you’ll live like an ordinary person and not experience the sublime blessings of the life in Christ. The Bible says, “Therefore if any man be in Christ, he is a new creature: old things are passed away; behold, all things are become new” (2 Corinthians 5:17). You’re of a new lineage and heritage. Refuse to be described by any earthly culture or affiliation.
                              </p>
                              
                              <p> If you must be identified as a Zulu, Afrikaans, American, British, German, French, Nigerian, etc., let it be because you want to win those of such descent to Christ. That’s how the Apostle Paul puts it. He said, “And unto the Jews I became as a Jew, that I might gain the Jews; to them that are under the law, as under the law, that I might gain them that are under the law” (1 Corinthians 9:20). 
                              </p>
                              
                              <p> Our opening verse, in the New Living Translation says, “Don’t copy the behavior and customs of this world, but let God transform you into a new person by changing the way you think….” As you meditate on the Word, your mind is programmed to think accordingly. You’ll begin to talk differently, and act in line with your confessions of faith. The Word of God is the only material that can energize you for success, position you for greatness, and sustain you in the transcendent life. 
                              </p>

                              <p> PRAYER</p> 
                              <p> Dear Father, thank you for the education of my spirit, through your Word. As I study and meditate on the Word, my mind is renewed in knowledge and spiritual understanding. Therefore, through my knowledge of the Word, I allow only excellent things into my world, in Jesus’ Name. Amen.
                              </p>

                              <p>FURTHER STUDY</p>
                              <p> || Romans 12:2 AMP; || </p>
                              <p> || Philippians 4:8; || </p>



                               </div >                       </div>
                   </div>
               </div>
            </div>
        </div>
        <div class="container">
            <div class="shoping-cart" style="float:right !important;">
                <?php
                $sessfn = $this->session->userdata('user_name');
                if ($sessfn != "") {
                $ufirstname = ucfirst($this->session->userdata('first_name'));
                $ulastname = ucfirst($this->session->userdata('last_name'));
                ?>
                Welcome <?= $ufirstname . " " . $ulastname; ?>! | <a href="<?= base_url("auth/logout"); ?>" style="color:white;">Log Out</a>
                <?php } else { ?>
                Welcome Guest! | <a href="<?= base_url("auth/login"); ?>" style="color:white;">Log In</a>
                <?php } ?>
            </div>
            <!-- main navigation -->
            <nav id="nav" class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="title visible-xs">Menu</span>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php include_once('includes/menu.php'); ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>
