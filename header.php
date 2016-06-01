<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="Wilson">
    <title>You</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!--		<link href="css/style.css" rel="stylesheet">-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Youtify 0.5</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="hits.php?category=song">Songs</a></li>
                <li><a href="hits.php?category=video">Video</a></li>
            </ul>
            <form id="labnol" class="navbar-form navbar-left" method="get" action="search.php">
                <div class="speech form-group">
                    <input type="text" name="q" class="form-control" id="transcript" placeholder="Speak"/>
                </div>
                <a class="btn btn-default" onclick="startDictation()">Search <span
                        class="glyphicon glyphicon-search"></span></a>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="signOut.php">Sign Out</a></li>';
                } else {
                    echo '<li><a href="signIn.php">Sign In</a></li>';
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>