<!DOCTYPE html>
<html>
<head>
    <title>Das Auto</title>
    <meta charset="UTF-8">
    <link rel="import"  href="css/headers.html">
</head>
<body>v

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
			<a href="mainPage.php" class="navbar-brand"> <i class="fas fa-car"></i> Strona Główna</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-nav-demo">
		<ul class="nav navbar-nav">
			<li><a href="history\history.php">Historia</a></li>
			<li><a href="articles\Articles.php">Wpisy</a></li>
			<li><a href="contact\contact.php">Kontakt</a></li>
		</ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                session_start();
            
                if(isset($_SESSION["username"]))
                {
                echo '
 	                <li><a>Witaj, ' .$_SESSION["username"].'</a></li>
                    <li><a href="log/logout.php">Logout</a></li>
                    ';
                 }else{
               echo '<li><a href="log/log.php"> Zaloguj</a></li>';
                }
            ?>
        </ul>
		
	</div>
	</div>
	</nav>
<!--  -->
<div class="container">
	<div class="jumbotron">
		<h1>Das Auto</h1>
		<p>Najlepszy serwis o Niemieckiej motoryzacji</p>
	</div>

	<div class="row">
        <?php
        for($i = 1; $i <= 9; $i++)
        {
            echo '<div class="col-lg-4 col-sm-6">
			        <div class="thumbnail">
				        <img src="css/images/'.$i.'.jpg">
			        </div>
		          </div>';
        }
        ?>
	</div>
</div>



<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>