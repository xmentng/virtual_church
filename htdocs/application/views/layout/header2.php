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
                .ror{
                  position: relative;
                  top: -30px;
                  right: 120px;
                  }
              </style>
                       <div id="flip2"><a id="btn_2" style="background-image:none; border:none !important; text-align:justify !important; font-weight:bold; color:#FF0;" href="#" class="strock small-btn">Today's Rhapsody</a>
                       <div class="ror">
                       <p>To download ROR please click this link <a href="http://bit.ly/2kOUSNT"></a></p>
                          <img src="http://d1z5hscmkopczy.cloudfront.net/asset/images/ror.png" alt="Church Online">
                       </div>
                           <div id="panel2">
                              <strong> Your True Value</strong>
                               <p>Wednesday, February 1st . Pastor Chris
                               </p>
                               
                               <p> And he said unto them, Take heed, and beware of covetousness: for a man’s life consisteth not in the abundance of the things which he possesseth (Luke 12:15). 
                               </p>
                              
                               <p> Some people rate or value themselves according to the amount of money they have. So, always, they’re punching the calculator to know their financial worth. If your value is according to some money, then you’re putting your life at some great risk. How can you subject your life to the uncertain and ever unstable monetary system of the world?
                               </p>    
                               
                               <p> Your true value is the Word of God that’s in your spirit. You’ve got to know and have the Word in you. With the Word in you, your success is assured no matter what happens around you. You’ll stay afloat like the ark of Noah that rose higher and higher as it rained and the waters increased, so that the same water that drowned others, buoyed him up. This shows that the circumstances responsible for sinking people’s businesses and careers today will be for your promotion!
                               </p>
                               
                               <p> What you need to live victoriously at every count in these latter days is the deposit of God’s Word in your spirit. If you deposit the Word in your spirit long enough, others will take notice of you and ask, “What manner of man is this?” because you’ll literally be “walking on water.” No matter the situation, you stay above only.
                               </p>
                               
                               <p> Colossians 3:16 says, “Let the word of Christ dwell in you richly in all wisdom; teaching and admonishing one another in psalms and hymns and spiritual songs, singing with grace in your hearts to the Lord.” Your confidence should only rest in how much of the Word of Christ you have in you, not how much money you have in your bank account. Remember, you become the Word of God that you receive into your spirit, and that’s your real value. As you allow the Word to dominate you, it’ll give you the mentality of a victor such that no matter what happens, you’ll remain strong and unfazed. 
                               </p>
                               
                               <p> PRAYER</p> 
                               <p> Dear Father, I thank you for showing me my true value in your Word. The entrance of your Word floods my heart with light and brings brilliance and beauty into my life. Your Word is deeply rooted in my heart and it grows, prevails and produces results in every area of my life, in Jesus’ Name. Amen. 
                               </p>

                              <p>FURTHER STUDY</p>
                              <p> || 1 Timothy 6:17; || </p>
                              <p>|| Joshua 1:8; || </p> 
                </div>                       </div>
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
