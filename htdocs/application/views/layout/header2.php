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
                           <div id="panel2"><strong>Three Cardinal Virtues</strong>
                               <p>Friday, December 2nd. Pastor Chris</p>
                               <p>And now abide these three, faith, hope, love; but the greatest is love(1 Corinthians 13:13 WESNT).</p>
                                <p>When Jesus walked the earth, there was something unique and different about His message; it was characterised by these three cardinal virtues: faith, hope, and love.</p>

                               <p>When he spoke, faith came alive in the hearers. He introduced the Father to them and unveiled the Father’s will for their lives. He left them know what God had done for them and how to walk in their divine inheritance.</p>
                                <p>Jesus also gave the people hope through his message; He made the future real and gave them a reason  to believe in the future. His message also expressed and communicated the love of God.Not only did He speak words of blessings to the people, He also touched them and related to them with love. He helped them know that the Father loved them because of the way He (Jesus) loved them. He manifested “Liquid love” —ever-flowing love. You felt it when you were in His presence. Even those He reprimanded felt and experienced His love. He was love in motion. </p>

                               <p>That was what attracted even the little children to Him; they ran to Him whenever they saw Him. The crowd would’t stop thronging Him; the Bible says, “…And the common people heard Him gladly” (Mark 12:37). People from everywhere came to Jesus to hear Him, and be with Him, because in His words, they heard and saw love. In His presence, they were comforted, strengthened, filled with hope, and their faith came alive.</p>

                               <p>As a Christian or minister of the Gospel, if you desire the kind of results Jesus had, then these three  virtues should be an awesome attraction in your life: faith, hope and love. They must be evidently expressed in your actions, words, character, and behaviour. In ministering the Gospel, let faith flow from you to your listeners. Inspire hope in their hearts, and most of all, let them experience the love of Jesus, and know in their hearts that He loves them unconditionally. Hallelujah! </p>

                               <p>CONFESSION</p>
                      <p>I am an able, competent, and effective minister of the Gospel of Christ, manifesting the virtues of faith, hope, and love. I am spreading the Gospel with passion, fervour and dedication; The love of Christ is evident in my actions, headed in my words, seen in my character, and reflected in my conduct. I am bringing salvation to people everywhere, in Jesus’s Name. Amen</p>

<p>FURTHER STUDY</p>
<p> || Hebrews 11: 6; || </p>
<p> || Romans 5: 2-5; || </p>
<p>
DAILY SCRIPTURE READING</p>
<p>
1-Year Bible Reading Plan: John 3:11-24, Ezekiel 47-48</p>
<p>
2-Year Bible Reading Plan: Revelation 6:1-10, Joel 2</p>
                               </div                        </div>
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
