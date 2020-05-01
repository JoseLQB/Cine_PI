<?php
	session_start();
	if (!isset($_SESSION['user']) || $_SESSION['user'] == '')
		$_SESSION["user"] = "false";
?>
<!DOCTYPE HTML>
<html  lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME TO SPCINEMA</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="text/javascript">
        $(document).ready(function () {
            $('#logout-but').click(function(){
                $.ajax({
                    type: "POST",
                    url: "php/logout.php"
                }).done(function( ) {
                    alert("LOGGED OUT CURRENT USER");
                    location.reload();
                });
            });
        });
	</script>
</head>
<body id="movies-body">
<div class="container-fluid custom-nav bg-light">
	<nav class="navbar navbar-default navbar-expand-lg navbar-light">
		<span class="navbar-brand mb-0 h1">SPCinema</span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto mr-4">
				<li class="nav-item">
					<a class="nav-link" href="/">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="/Movies.php">Movies</a>
				</li>
				<?php
					if($_SESSION["user"] === "false"){
						?>
						<li class="nav-item">
							<a class="nav-link" href="/Login.php">Login</a>
						</li>
						<?php
					}
				?>
				<li class="nav-item">
					<a class="nav-link" href="/AboutUs.php">About Us</a>
				</li>
				<li class="nav-item dropdown">
					<?php
						if($_SESSION["user"] === "true"){
							?>
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $_SESSION["username"] ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<button class="dropdown-item" id="logout-but">Logout</button>
							</div>
							<?php
						}
					?>
				</li>
			</ul>
		</div>
	</nav>
</div>
<div class="container my-4">
        <form class="">
            <div class="form-group">
                <div class="panel-group shadow-sm p-3">
                    <div class="panel panel-default bg-light p-3">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <a data-toggle="collapse" href="#lang-coll">Language</a>
                            </h6>
                        </div>
                        <div id="lang-coll" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="language"> Hindi</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="language"> English</label>
                                </div>
                                <div class="radio disabled">
                                    <label><input type="radio" name="language" disabled> Marathi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="panel panel-default bg-light p-3">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <a data-toggle="collapse" href="#genre-coll">Genre</a>
                            </h6>
                        </div>
                        <div id="genre-coll" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="genre"> Action</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="genre"> Adventure</label>
                                </div>
                                <div class="radio disabled">
                                    <label><input type="radio" name="genre" disabled> Sci-Fi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="panel panel-default bg-light p-3">
                        <div class="panel-heading">
                            <h6 class="panel-title">
                                <a data-toggle="collapse" href="#format-coll">Format</a>
                            </h6>
                        </div>
                        <div id="format-coll" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="radio">
                                    <label><input type="radio" name="genre"> 3D</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="genre"> 2D</label>
                                </div>
                                <div class="radio disabled">
                                    <label><input type="radio" name="genre" disabled> IMAX</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-deck mt-5">
            <div class="card custom-card">
                <img class="card-img-top" src="assets/spider-man.jpg" alt="404" >
                <div class="card-body">COOL MOVIE</div>
            </div>
            <div class="card custom-card">
                <img class="card-img-top" src="assets/spider-man.jpg" alt="404">
                <div class="card-body">COOL MOVIE</div>
            </div>
            <div class="card custom-card">
                <img class="card-img-top" src="assets/spider-man.jpg" alt="404">
                <div class="card-body">
                    <p class="card-text">COOL MOVIE</p>
                </div>
            </div>
            <div class="card custom-card">
                <img class="card-img-top" src="assets/spider-man.jpg" alt="404">
                <div class="card-body">
                    <p class="card-text">COOL MOVIE</p>
                </div>
            </div>
        </div>
</div>
<div class="footer">
    <p>THIS IS A FOOTER</p>
</div>
</body>
</html>