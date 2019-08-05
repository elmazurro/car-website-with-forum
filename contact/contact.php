<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="import"  href="../css/headers.html">
</head>
<body>

<!-- Default Navbars -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
		<div class="navbar-header">
			 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<a href="../mainPage.php" class="navbar-brand"> <i class="fas fa-car"></i></i> Strona Główna</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
		<ul class="nav navbar-nav">
			<li><a href="../history/history.php">Historia</a></li>
			<li><a href="../articles/Articles.php">Wpisy</a></li>
			<li><a href="contact.php">Kontakt</a></li>
		</ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION["username"]))
                {
                    echo '
 	                <li><a>Witaj, ' .$_SESSION["username"].'</a></li>
                    <li><a href="../log/logout.php">Logout</a></li>
                    ';
                }else{
                    echo '<li><a href="../log/log.php"> Zaloguj</a></li>';
                }
                ?>
            </ul>
	</div>
	</div>
	</nav>
<!--  -->

<div class="container">
	<div class="jumbotron">
		<h1>Kontakt</h1>
		<p> Sekcja 6 <br>
			Politechnika Śląska, Wydział Elektryczny, Informatyka<br>
			<i class="far fa-envelope"></i> <a href="mailto:informatyka2016@gmail.com">E-mail: informatyka2016@gmail.com</a><br><br>
			<img src="../css/images/nav.jpg" class="img-responsive" alt="Responsive image">
		</p>

	</div>
</div>
</body>
</html>