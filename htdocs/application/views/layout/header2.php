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
                       <style type="text/css">
                         .test{
                          position: relative;
                          top: 40px;
                          left: -210px;

                         }
                       </style>
                <div class="test">
                  <img src="<?=base_url()."/asset";?>/images/ror.png" width="40" height="40" alt="image description" class="alignleft">
                </div>
                  <div id="flip2"><a id="btn_2" style="background-image:none; border:none !important; text-align:justify !important; font-weight:bold; color:#FF0;" href="#" class="strock small-btn">Today's Rhapsody...<i>click to read...</i></a>
                  <div id="panel2">
                  
                  <strong> Godliness Is About Your Conduct</strong>
                               <p>Friday, January 13th. Pastor Chris</p>

                               <p> But refuse profane and old wives’ fables, and exercise thyself rather unto godliness (1 Timothy 4:7).</p>
                              
                              <p> The word “godliness” above actually means piety towards God, piety to spiritual or godly activities. It means devotion. It doesn’t refer to inner righteousness or inherent holiness. It’s about the things you do, how you respond to God, and to the things of God. For instance, there’s a way you ought to behave when you come into the house of God, because church isn’t like everywhere else. It’s a place of worship. There’s an attitude of reverence you ought to have when you come to church.
                              </p>    
                              
                              <p>Godliness is about your demeanour. Your dressing matters; some piety is necessary in your dressing. There’s a decency that goes with the Spirit of God, and that decency must be in your life. There’re outward things that people should see in you, and say, “Yes, this is a Christian.” They can’t see it in your heart, but can see it in your character. That’s what godliness is about.
                              </p>
                              
                              <p> There’re movies you shouldn’t watch. There’re books or magazines you shouldn’t read. There’re places you just shouldn’t be found in, because you’re different. And if for any reason you find yourself in such places, you ought to go in there with godly piety. Yes, that’s the life you’ve been called to live. Your presence in a place should exude and transmit the righteousness of God, for you’re a tree of righteousness, producing fruits of righteousness.
                              </p>

                               <p> Never lose sight of who you are; you’re different.You’re the symbol and embodiment of God’s glory, perfection, beauty, and righteousness. See and carry yourself as such: “But you are a chosen race, a royal priesthood, a dedicated nation, [God’s] own purchased, special people, that you may set forth the wonderful deeds and display the virtues and perfections of Him Who called you out of darkness into His marvelous light” (1 Peter 2:9 AMP).
                               </p>

                               <p>PRAYER</p>
                               <p> Dear Father, I thank you for giving me your righteousness as a gift, and inspiring in me the consciousness to walk in a perfect state of piety. I live true to my nature and calling in Christ as I bear fruits of righteousness and inspire many by my piety to spiritual and godly activities, in Jesus’ Name. Amen. </p>

                               <p>FURTHER STUDY</p>
                               <p> ||2 Peter 3:10-11; || </p>
                               <p>|| Psalm 1:1-3; || </p>
                               <p> ||Matthew 5:48; || </p>
                               <p> || 2 Peter 1:5-7; || </p>

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
