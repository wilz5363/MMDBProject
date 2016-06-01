<?php
$title = 'Home';
$section = 'home';
include 'head.php';
?>
<?php if(isset($_SESSION['user'])){
    include "collection.php";
}else{
    echo '<div class="container overlay" id="container">
    <div class="jumbotron">
    	<div class="container text-center" >
            <h1>
                Welcome to Youtify 0.5 <span class="small">(BETA)</span>
            </h1>
    		<p>Youtify, the place where you get all the most popular video and song in one location.</p>
    		<p>
    			<a class="btn btn-primary btn-lg">Explore more</a>
    		</p>
    	</div>
    </div>
    <div class="row">
        <div class="col-md-4 text-center well">
            <h6>Looking for latest hits?</h6>
            <a href="hits.php?category=song" class="btn btn-danger">Let\'s Go <span class="glyphicon glyphicon-headphones"></span></a>
        </div>
        <div class="col-md-4 text-center well">
            <h6>Trying to find video with most views?</h6>
            <a href="hits.php?category=video" class="btn btn-primary">Party On <span class="glyphicon glyphicon-video"></span></a>
        </div>
        <div class="col-md-4 text-center well">
            <h6>Awsome songs and videos to share?</h6>
            <a href="signup.php" class="btn btn-success">Sign Up <span class="glyphicon glyphicon-user"></span></a>
        </div>
    </div>
</div>';
}?>
<?php include 'footer.php' ?>



<!-- Search Form -->


<!-- HTML5 Speech Recognition API -->
