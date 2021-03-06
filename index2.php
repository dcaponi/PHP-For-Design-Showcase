<?php

include 'php/connectToMySQL.php';
function writeFrontTickets ($sql) {
    $count = mysql_num_rows($sql);
    if (count > 0) {
        while ($row = mysql_fetch_array($sql)) {
            $ID = $row["id"];
            $TITLE = $row["tour"];
            $BADGE = $row["badge"];
            $DESCRIPTION = $row["tourDesc"];
            $PRICE = $row["price"];
            $PICTURE = $row["tourImg"];
            $FRONT = $row["front"];

            $USD = round(($PRICE * 0.15),2);

            if ($BADGE === "value") {
                $SYMBOL = "fa fa-star";
                $SYMTEXT = "Best Value";
            } 

            if ($BADGE === "popular") {
                $SYMBOL = "fa fa-fire";
                $SYMTEXT = "Popular";
            }

            //This is the part that prints out the article using the data above.
            echo "<div class=\"tab-content\"> 
                    <div class=\"article-container fluid-container\"> 
                        <div class=\"ticDesc row\">
                            <div class=\"col-sm-4\">
                                <div class=\"ticThumb\">
                                    <img src=\"Images/article/newMuseum.jpg\" class=\"articleImg\" style=\"width:100%; height:300px;\">
                                    <a href=\"construction.html\" class=\"btn btn-default purchase\">Reserve</a>
                                </div>
                            </div>
                        <div class=\"col-sm-8 ticText\">
                            <h2 class=\"article-title\"> ".$TITLE." </h2>
                            <article>
                                <h4 class=\"price\">
                                    <i class=\"fa fa-usd\" id=\"usdPrice\"></i> ".$USD."  USD &nbsp; 
                                    <i class=\"fa fa-jpy\" id=\"cnyPrice\"></i> ".$PRICE." CNY
                                </h4>";

                                echo "<h4 class=\"special\" style=\"margin-bottom:10px;\">
                                    <i class=\"".$SYMBOL."\"></i>&nbsp;".$SYMTEXT."
                                </h4>";

                                echo "<br>
                                <p>".$DESCRIPTION."</p>
                            </article>
                        </div>
                        </div>
                    </div>
                    <br>    
                </div>";
         } 
     } 
}

function writeFrontArticles ($sql, $cat) {
    $count = mysql_num_rows($sql);
    if ($count > 0) {
        while ($row = mysql_fetch_array($sql)) {
            $articleID = $row["storyID"];
            $Title = $row["title"];
            $HeadImg = $row["headImg"];
            $Caption = $row["caption"];
            $Date = $row["date"];
            $Article = $row["article"];
            $RightImg1 = $row["rightImg1"];
            $Article2 = $row["article2"];
            $LeftImg1 = $row["leftImg1"];
            $Article3 = $row["article3"];
            $RightImg2 = $row["rightImg2"];
            $Article4 = $row["article4"];
            $LeftImg2 = $row["leftImg2"];
            $Article5 = $row["article5"];

            //This is the part that prints out the article using the data above.
            echo "<div class=\"article-container collapsable\" data-toggle=\"collapse\" data-target=\"#".$articleID."\" href=\"\">
                        <div class=\"articlePic\">
                            <img src=\"".$HeadImg."\" class=\"panelThumb\" data-toggle=\"collapse\" href=\"#".$articleID."\">
                        </div>
                        <h2 class=\"article-title\"> ".$Title." </h2>
                        <p class=\"dates\"> ".$Date." </p>
                        <article>
                            <h4> ".$Caption." </h4>
                            <br>
                            <div id=\"".$articleID."\" class=\"collapse\">
                                <p>".$Article."</p><br>";

                                if ($RightImg1) {
            echo  "<figure><img src=\"".$RightImg1."\" class=\"articleImgRight articleImg\"></figure>";
        }
                                if ($Article2) {
            echo  "<p>".$Article2."</p><br>";
        }
                                if ($LeftImg1) {
            echo  "<figure><img src=\"".$LeftImg1."\" class=\"articleImgLeft articleImg\"></figure>";
        }
                                if ($Article3) {
            echo  "<p>".$Article3."</p><br>";
        }
                                if ($RightImg2) {
            echo  "<figure><img src=\"".$RightImg2."\" class=\"articleImgRight articleImg\"></figure>";
        }
                                if ($Article4) {
            echo  "<p>".$Article4."</p><br>";
        }
                                if ($LeftImg2) {
            echo  "<figure><img src=\"".$LeftImg2."\" class=\"articleImgLeft articleImg\"></figure>";
        }
                                if ($Article5) {
            echo  "<p>".$Article5."</p><br>";
        }

            echo           "</div> 
                        </article>
                    </div>";
        } 
    } else {
            echo "<h1>\"THERE ARE NO ARTICLES IN THIS TABLE! You must add a new article to this section.\"</h1>";
    }
}

?>

<!DOCTYPE HTML>
<!--[if lt IE 7]> <html lang="en" class="ie ie6 lte9 lte8 lte7 os-win"> <![endif]-->
<!--[if IE 7]> <html lang="en" class="ie ie7 lte9 lte8 lte7 os-win"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie ie8 lte9 lte8 os-win"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie ie9 lte9 os-win"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="os-win"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Explore One of China's Hidden Treasures at Zhijindong Global Geopark, Rated Most Beautiful Cave in China!"
    
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <!-- JQUERY LIBRARY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
    <!-- BOOTSTRAP LIBRARY -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- GOOGLE FONT OXYGEN -->
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- STYLESHEETS AND MEDIA QUERIES -->
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/queries.css">
    
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- IONICONS ICONS -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <title>Zhijin Cave - China's Number One Natural Adventure Park</title>
</head>
    
<body>
    <!-- HERO WELCOME PAGE (Each time page loads, picture and header are different!) -->
    <header id="slideshow"> <!-- Pictures changed by javaScript -->
        <div id="banner">
            <a href="#inf" class="ghostScroll btn btn-info btn-lg" role="button" id="disc">Discover</a>
            <!--Link to Science page--><a href="explore.php" class="ghostScroll btn btn-info btn-lg" role="button">Explore</a>
            <!--Link to Tickets page--><a href="tickets.php" class="ghostScroll btn btn-info btn-lg" role="button">Visit</a>
        </div>
        <div class="heroText"> 
            <h1 id="imgTxt">China's Hidden Treasure</h1> <!-- This is changed by javaScript -->
            <p class="subTxt">Zhijindong Cave Global Geopark</p> <!-- This is constant. Logo here? -->
        </div>
    </header>
    
    <section class="info" id="inf">
        <div class="fluid-container">
            <div class="row">
                <div class="col-md-8 caveFacts">
                    <h2 class="headline">Experience China beyond the Great Wall</h2>
                    <p class="pitch">Dive into a mysterious world unlike any you have ever experienced. Nestled in the jade green hills of Guizhou near the ancient Zhijin village lie natural wonders and authentic cultural experiences you will never forget. Zhijindong Global Geopark is the perfect stop on an exotic backpacking adventure or family vacation where you can truly discover your world. Escape the crowded cities and enjoy a unique experience where you can discover secret treasures hidden deep within China beyond the Great Wall.</p>
                </div>
                <div class="col-md-4 caveFacts">
                    <ul>
                        <li><a class="btn btn-lg tix" role="button" href="tickets.php">Reserve a Tour</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section class="mosaic" id="mosTop">
        <div class="fluid-container">
            <div class="appear">
            <div class = "row mosaic-showcase">
               <div class="col-sm-3">
                    <figure class = "mosaic-photo">
                        <img src = "Images/mosaic/mosdown.jpg" alt = "Miaoling Hall Chamber" data-toggle="modal" data-target="#infoModalA" id="imgA">
                    </figure>
                </div>
                <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/moshelmet3.jpg" alt = "Warrior Helmet Stone Formation" data-toggle="modal" data-target="#infoModalB" id="imgB">  
                    </figure>
                </div>
                <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/mospadogaforest.jpg" alt = "Padoga Forest Cave Environment" data-toggle="modal" data-target="#infoModalC" id="imgC">   
                    </figure>
                </div>
                <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/mosfalls.jpg" alt = "Waterfall in Courtyard" data-toggle="modal" data-target="#infoModalD" id="imgD">  
                    </figure>
                </div>
            </div>
            </div>
            
            <br>
            
            <div class="hideMe">
            <div class = "row mosaic-showcase">
                <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/mosguizhou-zhijin-cave.jpg" alt = "Colorful Zhijin Cave" data-toggle="modal" data-target="#infoModalE" id="imgE">
                    </figure>
                     </div>
                <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/mosentryin.jpg" alt = "Dive in to an amazing adventure" data-toggle="modal" data-target="#infoModalF" id="imgF">
                    </figure>
                     </div>
                <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/moscity.jpg" alt = "A mythical underground city" data-toggle="modal" data-target="#infoModalG" id="imgG">
                    </figure>
                     </div>
              <div class="col-sm-3">
                    <figure class = "mosaic-photo view-first">
                        <img src = "Images/mosaic/mosbluebg.jpg" alt = "Magical lighting effects" data-toggle="modal" data-target="#infoModalH" id="imgH">
                    </figure>
                 </div>
            </div>
            </div>
        </div>
        
        <div class="showMe">
        <a class="btn btn-lg tix" role="button" id="morepix" href="#mosTop">More Pictures</a>
        </div>
        
    </section>
    
        <div id="infoModalA" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Miaoling Hall</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/mosdown.jpg" alt = "Step in to a Chinese Adventure" data-toggle="modal" data-target="#infoModalA">
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>Miaoling Hall is one of the first chambers you will see. It is 1000 ft long and 175 ft high! Click the arrow to learn more about Karst caves and the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalB" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Emperor's Crown</h4>
            </div>
            <div class="modal-body">
                 <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/moshelmet3.jpg" alt = "Inspired by China's Rich History" data-toggle="modal" data-target="#infoModalB">  
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>This is the center feature, about half way through the tour where you may have your picture taken and utilize the restroom. Click the arrow to learn more about Karst caves and the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalC" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Padoga Forest</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/mospadogaforest.jpg" alt = "A cave with its own environment" data-toggle="modal" data-target="#infoModalC">   
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>Zhijin cave is so big it has its own (stone) forest! In fact, the cave is so large, the average chamber height is 160 feet. Click the arrow to learn more about Karst caves and the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalD" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Tourist Center Courtyard</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/mosfalls.jpg" alt = "Naturally Beautiful Waterfal" data-toggle="modal" data-target="#infoModalD">  
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>This is the first water feature you encounter as you step into the newly built tourism center and museum. Click the arrow to learn more about special events and exhibits at the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalE" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Moon Palace</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/mosguizhou-zhijin-cave.jpg" alt = "Massive Underground Color Show in China" data-toggle="modal" data-target="#infoModalE">
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>A cave built for a king! There are over 0.75 million square feet of space in Zhijin Cave. Click the arrow to learn more about Karst caves and the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalF" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Entrance to Zhijin Cave</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/mosentryin.jpg" alt = "Enter an Epic Chinese Tourism Attraction" data-toggle="modal" data-target="#infoModalF">
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>Before Zhijin Cave's discovery, this was a small hole where children would play... with chickens! Hence, the cave was called Da Ji (Chicken Play) cave until its formal discovery in 1980. Click the arrow to learn more about Zhijin culture.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalG" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Breathtaking Subterrainian World</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/moscity.jpg" alt = "Tour the mysterious underground cave city only in Zhijin" data-toggle="modal" data-target="#infoModalG">
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>About 4 miles from start to finish, it takes 2-3 hours to see everything, but don't worry, we will give you a lift back to the tourism center. Click the arrow to learn more about the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
        <div id="infoModalH" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Silver Rain Palace</h4>
            </div>
            <div class="modal-body">
                <figure class = "mosaic-photo-modal">
                        <img src = "Images/mosaic/mosbluebg.jpg" alt = "The Largest Stone Formation of Its Kind in the World" data-toggle="modal" data-target="#infoModalH">
                </figure>
                
            </div>
            <div class="modal-footer">
                <p>Zhijin is home to some of the most beautiful geo-formations in the world and we are ranked #1 in most beautiful places to visit in China. Click the arrow to learn more about Karst caves and the Geopark.<a href="explore.php"><i class="fa fa-angle-right mosLink"></i></a></p>
            </div>
        </div>
        </div>
    </div>
    
    <div style="font-size:75%; text-align:center; font-style: italic; padding: 10px 0px;">Click the images to unveil our Geopark's many secrets and see why we were voted the most beautiful cave site in China!</div> 
    
    
    
    <hr> 
    <footer class="location">
        <div class="fluid-container">
            <div class="row">
                <div class="col-sm-6" class="travelInfo">
                    <h2 class="headline tinfoHead">Traveler Information</h2>
                        <ul class="travelInfo">
                            <li><a data-toggle="modal" data-target="#mapModal" href="#" id="map"><i class="fa fa-map-marker"></i>: Zhijin Town, Bijie City</a></li>
                            <li><i class="fa fa-phone"></i>: +86 - (0857) 7812018</li>
                            <li><i class="fa fa-clock-o"></i>: <div id="hours">08:30 to 17:30</div></li>
                            <li><i class="fa fa-ticket"></i>: <i class="fa fa-usd"></i><div id="priceU">18.50 USD</div>&emsp;<i class="fa fa-jpy"></i><div id="priceC">120.00 CNY</div></li>
                            <li><i class="fa fa-language"></i>: English &amp; Chinese tours available.</li>
                            <li><a data-toggle="modal" data-target="#guideBox" href="#" id="guide"><i class="fa fa-info"></i>: Tour Day Guidelines</a></li>
                        </ul>
                    <br>
                </div>
               
                <div class="col-sm-6 links">
                <a class="btn btn-lg tix2" role="button" href="tickets.php">Tour Packages</a>
                <a class="btn btn-lg tix2" role="button" href="explore.php">About the Geopark</a>
                <br>
                <div class="social">
                    <h3 class="socialTitle">Connect with us</h3>
                    <a href="http://www.weibo.com" target="_blank"><i class="fa fa-weibo socialIcon"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http://www.wechat.com" target="_blank"><i class="fa fa-weixin socialIcon"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http://www.tripadvisor.com/Attraction_Review-g1642900-d1855842-Reviews-Zhijin_Cave_of_Guizhou-Zhijin_County_Guizhou.html" target="_blank"><i class="fa fa-tripadvisor socialIcon"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://www.youtube.com/watch?v=3CSeiDXcPWk" target="_blank"><i class="fa fa-youtube-play socialIcon"></i></a>
                </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <p class="adminInfo">Copyright: &copy; Guizhou Scenic Spot Administration 2016</p>
                    <p class="adminInfo">All rights reserved.</p>
                    <p class="adminInfo"><a href="http://www.gzzjd.com/en/">Original Source: gzzjd.com</a></p>
                    <p class="adminInfo"><a href="http://www.dominick-caponi.com/zhijin-global-geopark/adminLogin.php">Administrator Portal</a></p>
                </div>
             </div>
             </div>
        
    <div id="mapModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                <h4 class="modal-title">Your next adventure is here!</h4>
            </div>
            <div class="modal-body">
                <figure class="map-photo-modal">
                        <img src="Images/gmap.JPG" data-toggle="modal" data-target="#mapModal" class="mapPic">
                </figure>
            </div>
        </div>
        </div>
    </div>
        
    <div id="guideBox" class="modal fade" role="dialog">
            <div class="modal-dialog">
        <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="ion-ios-close-outline"></i></button>
                        <h4 class="modal-title">Please be advised of the following</h4>
                    </div>
                    
                    <div class="modal-body infoTabs">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active" id="genInfo"><a data-toggle="pill" href="#general" id="gen"><i class="fa fa-info"></i> &nbsp; General </a></li>
                            <li id="healthInfo"><a data-toggle="pill" href="#health" id="hlt"><i class="fa fa-heartbeat"></i> &nbsp; Safety</a></li>
                            <li id="etInfo"><a data-toggle="pill" href="#etiquette" id="etq"><i class="fa fa-leaf"></i> &nbsp; Etiquette</a></li>
                        </ul>
                    <div class="tab-content">
                        <div id="general" class="tab-pane fade in active">
                            <ul>
                                <li><i class="fa fa-info"></i> You will start at the tourist center with a brief overview of the cave and how it was formed</li>
                                <li><i class="fa fa-info"></i> The average tour will take anywhere between 2-4 hours</li>
                                <li><i class="fa fa-info"></i> When touring the geopark, please follow your guide's instructions.</li>
                                <li><i class="fa fa-info"></i> Temperatures range from the low 50s in the morning and evening to upper 60s in the afternoon. Please dress appropriately</li>
                                <li><i class="fa fa-info"></i> Upon exiting the cave, you will be given a ride back to the tourist center where you may purchase food, gifts, and sundries</li>
                            </ul>

                        </div>
                        
                        <div id="health" class="tab-pane fade">
                            <ul>
                                <li><i class="fa fa-heartbeat"></i> When touring the geopark, please follow your guide's instructions.</li>
                                <li><i class="fa fa-heartbeat"></i> You are encouraged to bring a small bottle of water for your tour
                                <li><i class="fa fa-heartbeat"></i> Avoid being lost; Please stay on the path with your guide</li>
                                <li><i class="fa fa-heartbeat"></i> Please inform your tour guide and the tourist reception office of any physical limitations before your journey</li>
                                <li><i class="fa fa-heartbeat"></i> Because of our amazing location, we have many steep and rugged paths. Please bring comfortable shoes and be concious of your physical condition.</li>
                                <li><i class="fa fa-heartbeat"></i> Beware of fake or bad goods from illegal peddlers.</li>
                                <li><i class="fa fa-heartbeat"></i> Remember the emergency number in China is 110</li>
                            </ul>
                        </div>
                        
                        <div id="etiquette" class="tab-pane fade">
                            <ul>
                                <li><i class="fa fa-leaf"></i> When touring the geopark, please follow your guide's instructions.</li>
                                <li><i class="fa fa-leaf"></i> To keep our park pristene and beautiful, please do not eat, smoke, or litter in the park.</li>
                                <li><i class="fa fa-leaf"></i> Please mind your children while on the tour.</li>
                                <li><i class="fa fa-leaf"></i> Take in the experience but take nothing with you. Please do not touch or chip rock formations.</li>
                                <li><i class="fa fa-leaf"></i> Many species of orchid are protected in China. Please do not pick any orchids.</li>
                                <li><i class="fa fa-leaf"></i> Be a great representitive of your home by respecting the local customs and by being respectful of our culture.</li>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                
                    </div>
                </div>
            </div>
        </div>    
    </footer>


<!-- JAVASCRIPT FOR INTERACTIONS -->
<script src="javaScript/effects.js"></script>
</body>
</html>