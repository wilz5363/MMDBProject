<?php
$title = 'Home';
$section = 'home';
include 'head.php';

$query = 'select BLOBID from BTAB ORDER BY BLOBID ASC';
$stmt = oci_parse($conn, $query);
oci_execute($stmt);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usernameInput'];
    $password = $_POST['passwordInput'];
    $query = 'select username from youtify_user where username=:p1 and password=:p2';
    $loginStmt = oci_parse($conn, $query);
    oci_bind_by_name($loginStmt, ':p1', $username);
    oci_bind_by_name($loginStmt, ':p2', $password);

    oci_define_by_name($loginStmt, 'USERNAME', $user);

    oci_execute($loginStmt);

    if (oci_fetch($loginStmt)) {
        $_SESSION['username'] = $user;
    }
}
include 'header.php'; ?>

<div class="jumbotron" style="margin-bottom: 0">
    <div class="container text-center">
        <h1>Welcome to YouTify 1.0</h1>
    </div>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--    <ol class="carousel-indicators">-->
    <!--        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>-->
    <!--        <li data-target="#carousel-examp    le-generic" data-slide-to="1"></li>-->
    <!--        <li data-target="#carousel-example-generic" data-slide-to="2"></li>-->
    <!--    </ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="margin-top: 0">
        <?php
        while ($row = oci_fetch_array($stmt, OCI_ASSOC)) {
            ?>
            <div class="item">
                <img class="img-resposive center-block"
                     src="imageController/indexImages.php?id=<?php echo $row['BLOBID']; ?>" height="730px"
                     width="350px">
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-12 text-center">
            <h2>Latest Hits</h2>
            <p>Get yourself with the latest hits on instantly by clicking the button below.</p>
            <a href="hits.php" class="btn btn-danger">Latest Hits <span class="glyphicon glyphicon-arrow-right"></span></a>
        </div>
        <div class="col-md-4 col-md-12 text-center">
            <h2>Songs</h2>
            <p>Tired of the old plain songs? Don/'t, we got you covered with the latest songs of the year.</p>
            <a href="song.php" class="btn btn-success">Latest Songs <span
                    class="glyphicon glyphicon-arrow-right"></span></a>
        </div>
        <div class="col-md-4 col-md-12 text-center">
            <h2>Videos</h2>
            <p>Entertain yourself with the most popular music videos of all time here.</p>
            <a href="video.php" class="btn btn-primary">Latest Videos <span
                    class="glyphicon glyphicon-arrow-right"></span></a>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="" method="post" role="form" autocomplete="off">
                    <legend>Form Title</legend>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="usernameInput" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="passwordInput" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include 'footer.php' ?>

