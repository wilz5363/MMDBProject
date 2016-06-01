<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 6/1/2016
 * Time: 1:53 AM
 */
include "head.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['usernameInput'];
    $password = $_POST['passwordInput'];
    $query = "select count(*) AS NO_USER from youtify_user where username = '{$username}' and password = '{$password}'";
    $stmt = oci_parse($conn,$query);
    oci_execute($stmt);
   while($row = oci_fetch_array($stmt)){
       if($row['NO_USER'] >0){
           $_SESSION['user'] = $username;
           header("location: index.php");
       }
   }
}

?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
			<form action="" method="post" role="form">
				<legend>Sign In</legend>

				<div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" name="usernameInput" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="passwordInput" id="password" placeholder="Password" required>
                </div>
				<button type="submit" class="btn btn-primary">Sign In</button>
			</form>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>
