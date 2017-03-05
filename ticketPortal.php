<!--<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: adminLogin.php"); 
    exit();
} 

//Go to Content Page function
if(isset($_POST["content"])){
    header("location: ticketPortal.php"); 
    exit();
}

include 'php/connectToMySQL.php';
?>-->


<?php
include 'php/connectToMySQL.php';

//DELETE PROCESS
$deleteID = $_GET['deleteID'];
$sql = mysql_query("DELETE FROM tickets WHERE id = '$deleteID' LIMIT 1") or die("no dice amigo");
//END DELETE PROCESS

//ADD NEW ARTICLE FORM

    
if(isset($_POST['tour'])) {
    $Title = mysql_real_escape_string($_POST['tour']);
    $Badge = mysql_real_escape_string($_POST['badge']);
    $Description = mysql_real_escape_string($_POST['tourDesc']);
    $Price = mysql_real_escape_string($_POST['price']);
    $Picture = mysql_real_escape_string($_POST['tourImg']);
    $Front = mysql_real_escape_string($_POST['frontpage']);
    
    //Insert the New Data into the table
    mysql_query("INSERT INTO tickets (tour, badge, tourDesc, price, tourImg, frontpage) 
    VALUES ('$Title', '$Badge', '$Description', '$Price', '$Picture', '$Front')" ) or die(mysql_error());
}

//END ADD NEW ARTICLE FORM

//EDIT ARTICLE FORM

    //Assign PHP variables to whatever the values were in the MODIFY ARTICLE FORM
if(isset($_POST['modtour'])) {
    $modID = mysql_real_escape_string($_POST['modID']);
    $modTitle = mysql_real_escape_string($_POST['modtour']);
    $modBadge = mysql_real_escape_string($_POST['modbadge']);
    $modDescription = mysql_real_escape_string($_POST['modtourDesc']);
    $modPrice = mysql_real_escape_string($_POST['modprice']);
    $modPicture = mysql_real_escape_string($_POST['modtourImg']);
    $modFront = mysql_real_escape_string($_POST['modfrontpage']);

    
    //ModID is checked in the edit form and is hidden. Updates the table where the modId is the row you want to edit with the info you put in the modify form
    mysql_query("UPDATE tickets SET tour = '$modTitle', badge = '$modBadge', tourDesc = '$modDescription', price = '$modPrice', tourImg = '$modPicture', frontpage = '$modFront' WHERE id = '$modID'") or die(mysql_error());

}
// END EDIT ARTICLE FORM


// This function gets called in each tab and writes each article on a loop using the appropriate table and values for the tab and article
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
                                            <img src=\"".$PICTURE."\" class=\"articleImg\" style=\"width:100%; height:300px;\">
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
                                        
                    if ($FRONT === "yes"){echo "<span style=\"background-color:green; color:#fff;\">Shown on Front</span>";}

                                        echo "<br>
                                        <p>".$DESCRIPTION."</p>
                                    </article>
                                </div>
                                </div>
                            </div>
                        <button class=\"btn btn-default editbtn\" data-toggle=\"modal\" data-target=\"#".$ID."modMod\">Modify</button>
                        <button class=\"btn btn-default deletebtn\" data-toggle=\"modal\" data-target=\"#".$ID."delMod\">Delete</button>
                            <br>    
                        </div>";
                    
                    //These are your edit and delete modals where you can update or delete sql data respectively
                    echo "<div id=\"".$ID."modMod\" class=\"modal fade\" role=\"dialog\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">EDIT ARTICLE</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <form action=\"ticketPortal.php\" method=\"post\">
                                        <button type=\"submit\" class=\"btn btn-default\" style=\"float:right; display:inline;\"><i class=\"fa fa-plus\" style=\"font-size:300%\" data-toggle=\"tooltip\" title=\"Add Article to Website\"></i></button>
                    <br>
                    <br>
                                            <div class=\"form-group\" style=\"display: none;\">
                                                <input name=\"modID\" id=\"modID\" type=\"text\" value=\"".$ID."\" readonly>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Special Badges</label><br>
                                                <input name=\"modbadge\" id=\"modbadge\" type=\"radio\" value=\"value\">&nbsp;&nbsp;&nbsp;&nbsp;Best Value<br><br>
                                                <input name=\"modbadge\" id=\"modbadge\" type=\"radio\" value=\"popular\">&nbsp;&nbsp;&nbsp;&nbsp;Most Popular<br><br>
                                                <input name=\"modbadge\" id=\"modbadge\" type=\"radio\" value=\"normal\" checked>&nbsp;&nbsp;&nbsp;&nbsp;No Badge<br><br>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Front Page</label><br>
                                                <input name=\"modfrontpage\" id=\"modfrontpage\" type=\"radio\" value=\"yes\" checked>&nbsp;&nbsp;&nbsp;&nbsp;Show on Front Page<br><br>
                                                <input name=\"modfrontpage\" id=\"modfrontpage\" type=\"radio\" value=\"no\">&nbsp;&nbsp;&nbsp;&nbsp;Don't Show on Front Page<br><br>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Tour Package Title:</label>
                                                <textarea name=\"modtour\" type=\"text\" class=\"form-control\" id=\"modtour\" placeholder=\"Enter the Title or Headline of your article\">".$TITLE."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Ticket Price <i class=\"fa fa-jpy\" id=\"cnyPrice\"></i> (Yuan):</label>
                                                <textarea name=\"modprice\" type=\"text\" class=\"form-control\" id=\"modprice\">".$PRICE."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Headline Image:</label>
                                                <textarea name=\"modtourImg\" type=\"url\" class=\"form-control\" id=\"modtourImg\" placeholder=\"URL for Tour Image\">".$PICTURE."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Tour Description:</label>
                                                <textarea class=\"form-control\" rows=\"10\" id=\"modtourDesc\" name=\"modtourDesc\" placeholder=\"Please describe your tour\">".$DESCRIPTION."</textarea>
                                            </div>
                                        </form>
                                    </div>         
                                </div>
                            </div>
                        </div>"; 
                    
                    echo "<div id=\"".$ID."delMod\" class=\"modal fade\" role=\"dialog\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">DELETE ARTICLE</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p id=\"askdelete\">Are you sure you want to delete article ".$TOUR."?</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default editbtn\" data-dismiss=\"modal\">CANCEL</button>
                                        <a class=\"deletebtn btn btn-default\" href=\"ticketPortal.php?deleteID=".$ID."\">YES</a>
                                    </div>
                                </div>
                            </div>
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
    
    <title>Zhijin Caves/adminPortal</title>
</head>

<body ng-app="picApp">

 <!-- HERO WELCOME PAGE (Each time page loads, picture and header are different!) -->
    <div ng-controller="picAppCtrl"> 

        <header id="slideshow" ng-style="bgPic"> 
            <a href="http://www.dominick-caponi.com/zhijin-global-geopark" data-toggle="tooltip" title="Back to Rectption Page"> <!-- Pictures changed by javaScript depending on tab selected -->
                <div class="heroText"> 
                    <h1 id="expimgTxt">Edit Tour Packages</h1>
                    <p class="subTxt">Zhijindong Cave Global Geopark</p> 
                </div> 
                </a>
                    <form action="adminPortal.php" method="post" id="logoutform">
        <button class="btn btn-default" id="logoutBtn" type="submit" name="logout" value="logout">Logout</button>
        <button class="btn btn-default" id="ticBtn" type="submit" name="content" value="content">Content</button>
        </form>
        </header>
    </div>
    
    <section class="menu">
            <ul class="nav nav-pills nav-justified menuTabs">
                <li id="histTab" class="active"><a data-toggle="pill" href="#addtic" ng-click="PicA()">Add Tour Package</a></li> 
                <li id="newsTab"><a data-toggle="pill" href="#edittic" ng-click="Pic1()">Edit Tour Packages</a></li> 
            </ul>
    </section>
    
    <div class="tab-content">
        <div id="addtic" class="tab-pane fade in active">
            
            <div class="article-container" style="box-shadow:none;">
                <h1 class="article-title ticFormTitle" style="text-align:center;">Add New Tour Package</h1>
                <form action="ticketPortal.php" method="post">
                    <div class="form-group">
                        <label class="fieldTitle">Special Badges</label><br>
                        <input name="badge" id="badge" type="radio" value="value" style="margin-bottom:10px;">&nbsp;&nbsp;&nbsp;&nbsp;Best Value&nbsp;<i class="fa fa-star"></i><br>
                        <input name="badge" id="badge" type="radio" value="popular" style="margin-bottom:10px;">&nbsp;&nbsp;&nbsp;&nbsp;Most Popular&nbsp;<i class="fa fa-fire"></i><br>
                        <input name="badge" id="badge" type="radio" value="normal" style="margin-bottom:10px;" checked>&nbsp;&nbsp;&nbsp;&nbsp;No Badge<br>
                    </div>
                    <div class="form-group">
                        <label class="fieldTitle">Front Page</label><br>
                        <input name="frontpage" id="frontpage" type="radio" value="yes" checked>&nbsp;&nbsp;&nbsp;&nbsp;Show on Front Page<br><br>
                        <input name="frontpage" id="frontpage" type="radio" value="no">&nbsp;&nbsp;&nbsp;&nbsp;Don't Show on Front Page<br><br>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Tour Package Title:</label>
                        <input name="tour" type="text" class="form-control" id="tour" placeholder="Enter the Title or Headline of your article">
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Ticket Price <i class="fa fa-jpy"></i> (Yuan):</label>
                        <input name="price" type="text" class="form-control" id="price">
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Headline Image:</label>
                        <input name="tourImg" type="url" class="form-control" id="tourImg" placeholder="URL for Tour Image">
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Tour Description:</label>
                        <textarea class="form-control" rows="10" id="tourDesc" name="tourDesc" placeholder="Please describe your tour"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default" style="float:right; display:inline;"><i class="fa fa-plus" style="font-size:300%" data-toggle="tooltip" title="Add Ticket to Website"></i></button>
                </form>
            </div>
        </div>
    
        <div id="edittic" class="tab-pane fade">

            <?php
            // We are going to grab the news table from the database and use a while loop to generate each article
            include 'php/connectToMySQL.php';
            $sql = mysql_query("SELECT * FROM tickets ORDER BY price DESC");
            writeTicketdeals($sql);
            ?>
            
        </div>
        
        
        
    </div>
    
    <!-- JAVASCRIPT FOR INTERACTIONS -->
<script src="javaScript/expeffects.js"></script>
</body>
</html>