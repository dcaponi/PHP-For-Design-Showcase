<?php

// checks to see if you logged in then changed tabs or navigated away from the site but did NOT close the browser
session_start();
if (isset($_SESSION["manager"])) {
    header("location: adminPortal.php");
    exit();
}


// Launch this script if we get both username and password
if (isset($_POST["username"]) && isset($_POST["password"])) {
    
    // Remove the ability to put < or > or scripting tags to prevent hackers
    $manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);
    include 'php/connectToMySQL.php';
    // Ask the sql database (in SQL Language) for the userID identifier and assign it to $sql. This will only work if the username and password match what is in the database. The comparison and verification happen here!
    $sql = mysql_query("SELECT userID FROM admin WHERE username = '$manager' AND password = '$password' LIMIT 1");
    
    // Count how many rows came out of that query and got assigned to $sql (should be 1)
    $sqlCount = mysql_num_rows($sql);

    // If that row count is in fact 1
    if ($sqlCount == 1) {
        
        // execute for each row in the array of rows we got. mysql_num_rows will assign the entire row to $row and advance the pointer to the next row in the database, thus returning a truthy value. Loop executes and receives said trutyh value and executes again with the new $row. Since there is only 1 row we should only see this happen 1 time. The loop will assign $userID with the row
            $row = mysql_num_rows($sql);
            $userID = $row["userID"];
    
        
        // Assign the form variables to these php variables to feed back into session_start() to keep user logged in until they close browser
        $_SESSION["userID"] = $userID; 
        $_SESSION["manager"] = $manager; 
        $_SESSION["password"] = $password; 
        
        //connect to the adminPortal php page
        //include 'adminPortal.php';
        header("location: adminPortal.php");
        exit();
    } else {
        
        // if login info is wrong then query will return zero, the squlCount if statement will drop here and an error message will displays 
        include("adminDenied.html");
        exit();
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
    
    <title>Zhijin Caves/adminLogin</title>
</head>

<body class="loginbody">

 <!-- HERO WELCOME PAGE (Each time page loads, picture and header are different!) -->
    <div ng-controller="picAppCtrl"> 
    <header id="adminslideshow"> 
        <a href="http://www.dominick-caponi.com/zhijin-global-geopark" data-toggle="tooltip" title="Back to Rectption Page"> <!-- Pictures changed by javaScript depending on tab selected -->
        <div class="heroText"> 
            <h1 id="expimgTxt">Admin Login</h1>
            <p class="subTxt">Zhijindong Cave Global Geopark</p> 
             <!-- This is constant. Logo here? -->
       </div> 
        </a>
    </header>
    </div>

            <div class="article-container loginbloc">
                <form action="adminLogin.php" method="post">
                    <div class="form-group">
                        <label for="text" class="fieldTitle">User Name:</label>
                        <input name="username" type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="fieldTitle">Password:</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
    </body>
    <script src="javaScript/expeffects.js"></script>
</html>
    