<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: adminLogin.php"); 
    exit();
} 

//Logout function
if(isset($_POST["logout"])){
    session_destroy();
    header("location: adminLogin.php"); 
    exit();
}

//Go to Ticket Page function
if(isset($_POST["ticket"])){
    header("location: ticketPortal.php"); 
    exit();
}

?>

<?php
include 'php/connectToMySQL.php';

//DELETE PROCESS
$deleteID = $_GET['deleteID'];
$delCat = substr($deleteID,0,1);
$delID = substr($deleteID,1);


if ($delCat === "n") {
    $sql = mysql_query("DELETE FROM news WHERE storyID = '$delID' LIMIT 1") or die("no dice amigo");
}
if ($delCat === "g") {
    $sql = mysql_query("DELETE FROM geology WHERE storyID = '$delID' LIMIT 1") or die("no dice amigo");
}
if ($delCat === "v") {
    $sql = mysql_query("DELETE FROM village WHERE storyID = '$delID' LIMIT 1") or die("no dice amigo");
}
//END DELETE PROCESS

//ADD NEW ARTICLE FORM

    
if(isset($_POST['title'])) {
    $articleTitle = mysql_real_escape_string($_POST['title']);
    $articleHeadlineImg = mysql_real_escape_string($_POST['headImg']);
    $articleCaption = mysql_real_escape_string($_POST['caption']);
    $articleDate = mysql_real_escape_string($_POST['date']);
    $articleArticle = mysql_real_escape_string($_POST['article']);
    $articleRightImg1 = mysql_real_escape_string($_POST['rightImg1']);
    $articleArticle2 = mysql_real_escape_string($_POST['article2']);
    $articleLeftImg1 = mysql_real_escape_string($_POST['leftImg1']);
    $articleArticle3 = mysql_real_escape_string($_POST['article3']);
    $articleRightImg2 = mysql_real_escape_string($_POST['rightImg2']);
    $articleArticle4 = mysql_real_escape_string($_POST['article4']);
    $articleLeftImg2 = mysql_real_escape_string($_POST['leftImg2']);
    $articleArticle5 = mysql_real_escape_string($_POST['article5']);
    $articleCat = mysql_real_escape_string($_POST['cat']);
    $articleFrontpage = mysql_real_escape_string($_POST['frontpage']);
    
    //Depending on which radio button was selected (news, geology, or village) assign the PHP variables above to values in the appropriate SQL table
    if($articleCat == 'news') {
        mysql_query("INSERT INTO news (title, headImg, caption, date, article, rightImg1, article2, leftImg1, article3, rightImg2, article4, leftImg2, article5, frontpage) 
         VALUES ('$articleTitle', '$articleHeadlineImg', '$articleCaption', '$articleDate', '$articleArticle', '$articleRightImg1', '$articleArticle2', '$articleLeftImg1', '$articleArticle3', '$articleRightImg2', '$articleArticle4', '$articleLeftImg2', '$articleArticle5', '$articleFrontpage')" ) or die(mysql_error());
    }
    
    if($articleCat == 'geology') {
        mysql_query("INSERT INTO geology (title, headImg, caption, date, article, rightImg1, article2, leftImg1, article3, rightImg2, article4, leftImg2, article5, frontpage) 
         VALUES ('$articleTitle', '$articleHeadlineImg', '$articleCaption', '$articleDate', '$articleArticle', '$articleRightImg1', '$articleArticle2', '$articleLeftImg1', '$articleArticle3', '$articleRightImg2', '$articleArticle4', '$articleLeftImg2', '$articleArticle5', '$articleFrontpage')" ) or die(mysql_error());
    }
    
    if($articleCat == 'village') {
        mysql_query("INSERT INTO village (title, headImg, caption, date, article, rightImg1, article2, leftImg1, article3, rightImg2, article4, leftImg2, article5, frontpage) 
         VALUES ('$articleTitle', '$articleHeadlineImg', '$articleCaption', '$articleDate', '$articleArticle', '$articleRightImg1', '$articleArticle2', '$articleLeftImg1', '$articleArticle3', '$articleRightImg2', '$articleArticle4', '$articleLeftImg2', '$articleArticle5', '$articleFrontpage')" ) or die(mysql_error());
    }
}

//END ADD NEW ARTICLE FORM

//EDIT ARTICLE FORM

    //Assign PHP variables to whatever the values were in the MODIFY ARTICLE FORM
if(isset($_POST['modtitle'])) {
    $modID = mysql_real_escape_string($_POST['modID']);
    $articleTitle = mysql_real_escape_string($_POST['modtitle']);
    $articleHeadlineImg = mysql_real_escape_string($_POST['modheadImg']);
    $articleCaption = mysql_real_escape_string($_POST['modcaption']);
    $articleDate = mysql_real_escape_string($_POST['moddate']);
    $articleArticle = mysql_real_escape_string($_POST['modarticle']);
    $articleRightImg1 = mysql_real_escape_string($_POST['modrightImg1']);
    $articleArticle2 = mysql_real_escape_string($_POST['modarticle2']);
    $articleLeftImg1 = mysql_real_escape_string($_POST['modleftImg1']);
    $articleArticle3 = mysql_real_escape_string($_POST['modarticle3']);
    $articleRightImg2 = mysql_real_escape_string($_POST['modrightImg2']);
    $articleArticle4 = mysql_real_escape_string($_POST['modarticle4']);
    $articleLeftImg2 = mysql_real_escape_string($_POST['modleftImg2']);
    $articleArticle5 = mysql_real_escape_string($_POST['modarticle5']);
    $articleCat = mysql_real_escape_string($_POST['modcat']);
    $articleFrontpage = mysql_real_escape_string($_POST['modfrontpage']);
    
    //Work with the correct table that contains the article you wish to modify. Update the article values in the SQL table with the values in the form.
    if($articleCat == 'news') {
        mysql_query("UPDATE news SET title = '$articleTitle', headImg = '$articleHeadlineImg', caption = '$articleCaption' , date = '$articleDate', article = '$articleArticle', rightImg1 = '$articleRightImg1', article2 = '$articleArticle2', leftImg1 = '$articleLeftImg1', article3 = '$articleArticle3', rightImg2 = '$articleRightImg2', article4 = '$articleArticle4', leftImg2 = '$articleLeftImg2', article5 = '$articleArticle5', frontpage = '$articleFrontpage'
         WHERE storyID = '$modID'") or die(mysql_error());
    }
    
    if($articleCat == 'geology') {
        mysql_query("UPDATE geology SET title = '$articleTitle', headImg = '$articleHeadlineImg', caption = '$articleCaption' , date = '$articleDate', article = '$articleArticle', rightImg1 = '$articleRightImg1', article2 = '$articleArticle2', leftImg1 = '$articleLeftImg1', article3 = '$articleArticle3', rightImg2 = '$articleRightImg2', article4 = '$articleArticle4', leftImg2 = '$articleLeftImg2', article5 = '$articleArticle5' frontpage = '$articleFrontpage'
         WHERE storyID = '$modID'") or die(mysql_error());
    }
    
    if($articleCat == 'village') {
        mysql_query("UPDATE village SET title = '$articleTitle', headImg = '$articleHeadlineImg', caption = '$articleCaption' , date = '$articleDate', article = '$articleArticle', rightImg1 = '$articleRightImg1', article2 = '$articleArticle2', leftImg1 = '$articleLeftImg1', article3 = '$articleArticle3', rightImg2 = '$articleRightImg2', article4 = '$articleArticle4', leftImg2 = '$articleLeftImg2', article5 = '$articleArticle5' frontpage = '$articleFrontpage'
         WHERE storyID = '$modID'") or die(mysql_error());
    }
}
// END EDIT ARTICLE FORM


// This function gets called in each tab and writes each article on a loop using the appropriate table and values for the tab and article
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
                    echo "<div class=\"editContainer\">
                            <div class=\"article-container collapsable\" data-toggle=\"collapse\" data-target=\"#".$articleID."\" href=\"\">
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
                            </div>
                            <button class=\"btn btn-default editbtn\" data-toggle=\"modal\" data-target=\"#".$modCAT."".$articleID."modMod\">Modify</button>
                            <button class=\"btn btn-default deletebtn\" data-toggle=\"modal\" data-target=\"#".$modCAT."".$articleID."delMod\">Delete</button>
                        </div>";
                    //These are your edit and delete modals where you can update or delete sql data respectively
                    echo "<div id=\"".$modCAT."".$articleID."modMod\" class=\"modal fade\" role=\"dialog\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">EDIT ARTICLE</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <form action=\"adminPortal.php\" method=\"post\">
                                        <div data-toggle=\"collapse\" data-target=\"#modformaddmore\" class=\"btn btn-default\" style=\"float:left; clear:both; display:inline;\"><i class=\"fa fa-pencil-square\" style=\"font-size:300%\" data-toggle=\"tooltip\" title=\"Add More Fields\"></i></div>
                    <button type=\"submit\" class=\"btn btn-default\" style=\"float:right; display:inline;\"><i class=\"fa fa-plus\" style=\"font-size:300%\" data-toggle=\"tooltip\" title=\"Add Article to Website\"></i></button>
                    <br>
                    <br>
                                            <div class=\"form-group\" style=\"display: none;\">
                                                <label class=\"fieldTitle\">Article Section</label><br>
                                                <input name=\"modcat\" id=\"modcat\" type=\"radio\" value=\"".$modCAT."\" checked>&nbsp;&nbsp;&nbsp;&nbsp;News<br><br>
                                                <label class=\"fieldTitle\">Article ID</label><br>
                                                <input name=\"modID\" id=\"modID\" type=\"text\" value=\"".$articleID."\" readonly>
                                            </div>
                                            <div class=\"form-group\">
                                                <label class=\"fieldTitle\">Front Page</label><br>
                                                <input name=\"modfrontpage\" id=\"modfrontpage\" type=\"radio\" value=\"yes\" checked>&nbsp;&nbsp;&nbsp;&nbsp;Show on Front Page<br><br>
                                                <input name=\"modfrontpage\" id=\"modfrontpage\" type=\"radio\" value=\"no\">&nbsp;&nbsp;&nbsp;&nbsp;Don't Show on Front Page<br><br>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Headline (Title):</label>
                                                <textarea name=\"modtitle\" type=\"text\" class=\"form-control\" id=\"modtitle\" required>".$Title."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Subtitle:</label>
                                                <textarea name=\"modcaption\" type=\"text\" class=\"form-control\" id=\"modcaption\" required>".$Caption."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Date:</label>
                                                <input name=\"moddate\" type=\"date\" class=\"form-control\" id=\"moddate\" required></input>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Headline Image:</label>
                                                <textarea name=\"modheadImg\" type=\"text\" class=\"form-control\" id=\"modheadImg\" required>".$HeadImg."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Paragraph 1:</label>
                                                <textarea class=\"form-control\" rows=\"10\" id=\"modarticle\" name=\"modarticle\" required>".$Article."</textarea>
                                            </div>
                                            <div id=\"modformaddmore\" class=\"collapse\">
                                            <br>
                                            <hr>
                                            <h1 style=\"text-align:center;\">Subsection 1: Recommended for Short-Medium Articles with 1 picture</h1>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Paragraph 2:</label>
                                                <textarea class=\"form-control\" rows=\"10\" id=\"modarticle2\" name=\"modarticle2\">".$Article2."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Right Image 1:</label>
                                                <textarea name=\"modrightImg1\" type=\"text\" class=\"form-control\" id=\"modrightImg1\">".$RightImg1."</textarea>
                                            </div>
                                            <br>
                                            <hr>
                                            <h1 style=\"text-align:center;\">Subsection 2: Recommended for Medium Articles with up to 2 pictures</h1>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Paragraph 3:</label>
                                                <textarea class=\"form-control\" rows=\"10\" id=\"modarticle3\" name=\"modarticle3\">".$Article3."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Left Image 1:</label>
                                                <textarea name=\"modleftImg1\" type=\"text\" class=\"form-control\" id=\"modleftImg1\">".$LeftImg1."</textarea>
                                            </div>
                                            <br>
                                            <hr>
                                            <h1 style=\"text-align:center;\">Subsection 3: Recommended for Medium-Long Articles with up to 3 pictures</h1>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Paragraph 4:</label>
                                                <textarea class=\"form-control\" rows=\"10\" id=\"modarticle4\" name=\"modarticle4\">".$Article4."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Right Image 2:</label>
                                                <textarea name=\"modrightImg2\" type=\"text\" class=\"form-control\" id=\"modrightImg2\">".$RightImg2."</textarea>
                                            </div>
                                            <br>
                                            <hr>
                                            <h1 style=\"text-align:center;\">Subsection 4: Recommended for Long Articles with up to 4 pictures</h1>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Paragraph 5:</label>
                                                <textarea class=\"form-control\" rows=\"10\" id=\"modarticle5\" name=\"modarticle5\">".$Article5."</textarea>
                                            </div>
                                            <div class=\"form-group\">
                                                <label for=\"text\" class=\"fieldTitle\">Left Image 2:</label>
                                                <textarea name=\"modleftImg2\" type=\"text\" class=\"form-control\" id=\"modleftImg2\">".$LeftImg2."</textarea>
                                            </div>
                                            </div>
                                            
                                        </form>
                                    </div>         
                                </div>
                            </div>
                        </div>"; 
                    
                    echo "<div id=\"".$modCAT."".$articleID."delMod\" class=\"modal fade\" role=\"dialog\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">DELETE ARTICLE</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p id=\"askdelete\">Are you sure you want to delete article ".$Title."?</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default editbtn\" data-dismiss=\"modal\">CANCEL</button>
                                        <a class=\"deletebtn btn btn-default\" href=\"adminPortal.php?deleteID=".$cat."".$articleID."\">YES</a>
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
                    
                    <h1 id="expimgTxt">Edit Content</h1>
                    <p class="subTxt">Zhijindong Cave Global Geopark</p> 
                </div> 
                </a>
                    <form action="adminPortal.php" method="post" id="logoutform">
        <button class="btn btn-default" id="logoutBtn" type="submit" name="logout" value="logout">Logout</button>
        <button class="btn btn-default" id="ticBtn" type="submit" name="ticket" value="ticket">Ticket Prices</button>
        </form>
        </header>
    
        <section class="menu">
            <ul class="nav nav-pills nav-justified menuTabs">
                <li id="histTab" class="active"><a data-toggle="pill" href="#history" ng-click="PicA()">Add Article</a></li> 
                <li id="newsTab"><a data-toggle="pill" href="#news" ng-click="Pic1()">Edit Park News</a></li> 
                <li id="geoTab"><a data-toggle="pill" href="#geology" ng-click="Pic2()">Edit Zhijin Geology</a></li>
                <li id="villageTab"><a data-toggle="pill" href="#village" ng-click="Pic3()">Edit Zhijin Village</a></li>
            </ul>
        </section>
    </div> 
        
    <div class="tab-content">
        <!-- ADD AN ARTICLE FORM -->
        <div id="history" class="tab-pane fade in active">
            <div class="article-container" style="box-shadow:none;">
                <div data-toggle="collapse" data-target="#addmore" class="btn btn-default" style="float:right; display:block;"><i class="fa fa-pencil-square" style="font-size:300%" data-toggle="tooltip" title="Add More Fields"></i></div>
                <h1 class="article-title" style="text-align:center;">Add New Article</h1>
                
                <form action="adminPortal.php" method="post">
                    <div class="form-group">
                        <label class="fieldTitle">Article Section</label><br>
                        <input name="cat" id="cat" type="radio" value="news" checked>&nbsp;&nbsp;&nbsp;&nbsp;News<br><br>
                        <input name="cat" id="cat" type="radio" value="geology">&nbsp;&nbsp;&nbsp;&nbsp;Intriguing Geology<br><br>
                        <input name="cat" id="cat" type="radio" value="village">&nbsp;&nbsp;&nbsp;&nbsp;Vibrant Customs<br><br>
                    </div>
                    <div class="form-group">
                        <label class="fieldTitle">Front Page</label><br>
                        <input name="frontpage" id="frontpage" type="radio" value="yes" checked>&nbsp;&nbsp;&nbsp;&nbsp;Show on Front Page<br><br>
                        <input name="frontpage" id="frontpage" type="radio" value="no">&nbsp;&nbsp;&nbsp;&nbsp;Don't Show on Front Page<br><br>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Headline (Title):</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Enter the Title or Headline of your article" required>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Subtitle:</label>
                        <input name="caption" type="text" class="form-control" id="caption" placeholder="Subtitle/cool caption to create interest (Optional)" required>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Date:</label>
                        <input name="date" type="date" class="form-control" id="date" required></input>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Headline Image:</label>
                        <input name="headImg" type="ur," class="form-control" id="headImg" placeholder="URL for Headline Image" required>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Paragraph 1:</label>
                        <textarea class="form-control" rows="10" id="article" name="article" placeholder="Your article goes here!" required></textarea>
                    </div>
               
                    <div id="addmore" class="collapse">
                <br>
                <hr>
                <h1 style="text-align:center;">Subsection 1: Recommended for Short-Medium Articles with 1 picture</h1>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Paragraph 2:</label>
                        <textarea class="form-control" rows="10" id="article2" name="article2" placeholder="Paragrpahs below Right Image"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Right Image 1:</label>
                        <input name="rightImg1" type="url" class="form-control" id="rightImg1" placeholder="URL for Right-Side Image (Optional)">
                    </div>
                        <br>
                        <hr>
                        <h1 style="text-align:center;">Subsection 2: Recommended for Medium Articles with up to 2 pictures</h1>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Paragraph 3:</label>
                        <textarea class="form-control" rows="10" id="article3" name="article3" placeholder="Paragrpahs below Right Image"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Left Image 1:</label>
                        <input name="leftImg1" type="url" class="form-control" id="leftImg1" placeholder="URL for Left-Side Image (Optional)">
                    </div>
                        <br>
                        <hr>
                        <h1 style="text-align:center;">Subsection 3: Recommended for Medium-Long Articles with up to 3 pictures</h1>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Paragraph 4:</label>
                        <textarea class="form-control" rows="10" id="article4" name="article4" placeholder="Paragrpahs below Right Image"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Right Image 2:</label>
                        <input name="rightImg2" type="url" class="form-control" id="rightImg2" placeholder="URL for Right-Side Image (Optional)">
                    </div>
                        <br>
                        <hr>
                        <h1 style="text-align:center;">Subsection 4: Recommended for Long Articles with up to 4 pictures</h1>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Paragraph 5:</label>
                        <textarea class="form-control" rows="10" id="article5" name="article5" placeholder="Paragrpahs below Right Image"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="text" class="fieldTitle">Left Image 2:</label>
                        <input name="leftImg2" type="url" class="form-control" id="leftImg2" placeholder="URL for Left-Side Image (Optional)">
                    </div>
                    
                    </div>
                 <button type="submit" class="btn btn-default" style="float:right; display:inline;"><i class="fa fa-plus" style="font-size:300%" data-toggle="tooltip" title="Add Article to Website"></i></button>
                
                    
                
                </form>
            
            </div>
        </div>
        
        <!-- NEWS TAB -->
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
    </div>

    
    

<!-- JAVASCRIPT FOR INTERACTIONS -->
<script src="javaScript/expeffects.js"></script>
</body>
</html>