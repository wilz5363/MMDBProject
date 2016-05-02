<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default" style="margin: 0;" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php">YouTify 1.0</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li <?php if($section == 'home') echo 'class = "active"'; ?>><a href="index.php">Home</a></li>
			<li <?php if($section == 'video') echo 'class = "active"'; ?>><a href="video.php">Videos</a></li>
            <li <?php if($section == 'song') echo 'class = "active"'; ?>><a href="song.php">Songs</a></li>
		</ul>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
<!--		<ul class="nav navbar-nav navbar-right">-->
<!--			<li><a href="#">Link</a></li>-->
<!--			<li class="dropdown">-->
<!--				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>-->
<!--				<ul class="dropdown-menu">-->
<!--					<li><a href="#">Action</a></li>-->
<!--					<li><a href="#">Another action</a></li>-->
<!--					<li><a href="#">Something else here</a></li>-->
<!--					<li><a href="#">Separated link</a></li>-->
<!--				</ul>-->
<!--			</li>-->
<!--		</ul>-->
	</div><!-- /.navbar-collapse -->
</nav>