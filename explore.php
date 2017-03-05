

<?php
include 'php/connectToMySQL.php';
function writeArticles($sql, $cat, $modCAT) {
            $articleCount = mysql_num_rows($sql);
    //Check for data in the table If there is data in the table, execute the following
            if ($articleCount > 0) {
                while($row = mysql_fetch_array($sql)) {
                    //PHP will advance mysql_fetch_array as long as there is a row after the current row (making this while loop syntax valid) 
                    //Assign the value of the row from the $sql query matrix to the $row variable. We split the matrix $sql into $row s and split the $row data into values
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
    
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    
    <!-- JQUERY LIBRARY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
    <!-- BOOTSTRAP LIBRARY -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <!-- ANGULARJS LIBRARY -->
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.3/angular.min.js"></script>
    
    <!-- GOOGLE FONT OXYGEN -->
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    
    <!-- STYLESHEETS AND MEDIA QUERIES -->
    <link rel="stylesheet" type="text/css" href="CSS/expstyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/expqueries.css">
    
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- IONICONS ICONS -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <title>Zhijin Caves/Explore Our Nature Park</title>
</head>

<body ng-app="picApp">

 <!-- HERO WELCOME PAGE (Each time page loads, picture and header are different!) -->
    <div ng-controller="picAppCtrl"> 
    <header id="slideshow" ng-style="bgPic"> 
        <a href="http://www.dominick-caponi.com/zhijin-global-geopark" data-toggle="tooltip" title="Back to Rectption Page"> <!-- Pictures changed by javaScript depending on tab selected -->
        <div class="heroText"> 
            <h1 id="expimgTxt" ng-bind="headText"></h1>
            <p class="subTxt">Zhijindong Cave Global Geopark</p> 
        </div> 
        </a>
    </header>
    
    <section class="menu">
    <ul class="nav nav-pills nav-justified menuTabs">
        <li id="histTab" class="active"><a data-toggle="pill" href="#history" ng-click="PicA()">Park History</a></li> 
        <li id="newsTab"><a data-toggle="pill" href="#news" ng-click="Pic1()">Park News</a></li> 
        <li id="geoTab"><a data-toggle="pill" href="#geology" ng-click="Pic2()">Zhijin Geology</a></li>
        <li id="villageTab"><a data-toggle="pill" href="#village" ng-click="Pic3()">Zhijin Village</a></li>
    </ul>
    </section>
    </div> 
    
    <section>
        <div class="tab-content">
            <div id="history" class="tab-pane fade in active">
                <h2 class="article-title" style="margin-top:20px;">Welcome to Zhijindong Global Geopark</h2>
                
                <article><h4>An Exotic World Of Adventure Awaits You</h4><br>
                    <img src="Images/mosaic/moscity.jpg" class="articleImg articleImgLeft">
                    <p>Zhijin Cave, formerly Da Ji (Chickens Playground) cave is a karst geoformation that contains over 750,000 square feet of space and has an average wall height of 160 feet. We are located in Zhijin county, famous for its hospitable people, luscious jade forests and the ancient art of gold weaving. Before its formal discovery in 1980,  not much was known about the cave other than it was where the local children would play. </p><br>
                    <figure><img src="Images/article/newMuseum.jpg" class="articleImgRight articleImg"></figure>
                    <p>During the expedition in 1980, the explorers found the cave to be approximately 4 miles long, 6 miles deep and possibly the largest unsupported karst structure in the world. In 1988, the Chinese State Council proclaimed Zhijin Cave to be a national park as well as Zhijin Village and Luojie River.</p><br>
                    
                    <p>As of September 19, 2015 Zhijindong Cave Global Geopark was granted UNESCO Global Geopark status and is included in the United Nations Educational, Scientific, and Cultural Organization's database as a global geopark.</p><br>
                    <p>Zhijindong Global Geopark, in preparation for this status, erected a brand new museum and cultural facility (right) where visitors can learn more about Zhijin County and the cave. There is also a theater offering virtual tours of the cave as well as many interactive exhibits in both English and Chinese. There is also a brand new gift shop and newly renovated customer amenities  on site to enhance your experience of the park.</p><br>
                    <figure><img src="Images/guiyang.jpg" class="articleImgLeft articleImg"></figure>
                    
                    <p>Zhijindong Global Geopark is open to the public with regularly scheduled guided tours. Our guides speak both Chinese and English and are extremely knowledgeable  about the cave and numerous stone features. Zhijin is a perfect addition to your China vacation or holiday if you seek true cultural and natural immersion and want a totally unique adventure. Zhijin is located in Guizhou one of the fastest growing areas in China. Nearby Guiyang offers a wide variety of excellent nightlife and cultural attractions to compliment your China vacation</p><br>
                    
                    <p>Today, visitors can experience the 2 hour cave tour, visit our state of the art museum or take a stroll in the charming Zhijin Village and experience an authentic Chinese cultural experience that one cannot find in the usual tourist spots such as Beijing, Hong Kong or Macau. Our local markets offer great organic food in a friendly atmosphere, which is perfect after a refreshing hike through our magnificent cave!</p><br>
                
                    
                    
                    <p></p>
                </article>
            </div>
            
            <div id="news" class="tab-pane fade">
                <?php
                // We are going to grab the news table from the database and use a while loop to generate each article
                include 'php/connectToMySQL.php';
                $articleList = "";
                $sql = mysql_query("SELECT * FROM news ORDER BY date DESC");
                $cat = "n";
                $modCAT = "news";
                writeArticles($sql, $cat, $modCAT);
                ?>
            </div>
        
        <!-- GEOLOGY TAB -->
            <div id="geology" class="tab-pane fade">
                <?php
                // We are going to grab the news table from the database and use a while loop to generate each article
                include 'php/connectToMySQL.php';
                $articleList = "";
                $sql = mysql_query("SELECT * FROM geology ORDER BY date DESC");
                $cat = "g";
                $modCAT = "geology";
                writeArticles($sql, $cat, $modCAT);
                ?>
            </div>
        <!-- VILLAGE TAB -->
            <div id="village" class="tab-pane fade">
                <?php
                // We are going to grab the news table from the database and use a while loop to generate each article
                include 'php/connectToMySQL.php';
                $articleList = "";
                $sql = mysql_query("SELECT * FROM village ORDER BY date DESC");
                $cat = "v";
                $modCAT = "village";
                writeArticles($sql, $cat, $modCAT);
                ?>
            </div>
            <br>
        </div>
        
    </section>
    <hr>
      <footer class="location">
        <div class="fluid-container">
            <div class="row">
                <div class="col-sm-6" class="travelInfo">
                <h2 class="headline">Traveler Information</h2>
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
                <a class="btn btn-lg tix2" role="button" href="http://www.dominick-caponi.com/zhijin-global-geopark">Reception Page</a>
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
            <div class="row">
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
                <figure class = "map-photo-modal">
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
                    <div class="tab-content modalTab">
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
<script src="javaScript/expeffects.js"></script>
</body>
</html>