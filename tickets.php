<?php
include 'php/connectToMySQL.php';
function writeTicketdeals($sql) {
            $articleCount = mysql_num_rows($sql);
    //Check for data in the table If there is data in the table, execute the following
            if ($articleCount > 0) {
                while($row = mysql_fetch_array($sql)) {
                    //PHP will advance mysql_fetch_array as long as there is a row after the current row (making this while loop syntax valid) 
                    //Assign the value of the row from the $sql query matrix to the $row variable. We split the matrix $sql into $row s and split the $row data into values
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
?>



            </div>
        </div>
        <br>    
    </div>

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
    
    <title>Zhijin Caves/Browse Tour Packages</title>
</head>
    
    
<body ng-app="picApp">

 <!-- HERO WELCOME PAGE (Each time page loads, picture and header are different!) -->
    <div ng-controller="picAppCtrl"> 
        <header id="slideshow" ng-style="bgPicTic"> 
            <a href="http://www.dominick-caponi.com/zhijin-global-geopark" data-toggle="tooltip" title="Back to Rectption Page"> <!-- Pictures changed by javaScript depending on tab selected -->
            <div class="heroText"> 
                <h1 id="expimgTxt">Reserve Your Tour</h1>
                <p class="subTxt">Zhijindong Cave Global Geopark</p> 
            </div> 
            </a>
        </header>
    </div>
    <section>
    <?php
        // We are going to grab the news table from the database and use a while loop to generate each article
        include 'php/connectToMySQL.php';
        $sql = mysql_query("SELECT * FROM tickets ORDER BY price DESC");
        writeTicketdeals($sql);
    ?>
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
                
                <a class="btn btn-lg tix2" role="button" href="explore.php">About the Geopark</a>
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