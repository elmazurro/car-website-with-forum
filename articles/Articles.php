<!DOCTYPE html>
<html>
<head>
    <title>Das Auto</title>
    <meta charset="UTF-8">
    <link rel="import"  href="../css/headers.html">
</head>
<body>

<?php

$mysql_host = '127.0.0.1';
$dbname = 'testowa';
$username = 'root';
$port = '3306';
$password = 'root';

try {
    $dbh = new PDO('mysql:host=' . $mysql_host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
    $dbh->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone.<br />';
}
$sql = 'SELECT t.id, t.title, t.text, t.timeStamp, t.userId, u.showable_name, u.image FROM topics AS t, users AS u WHERE u.id = t.userId ORDER BY id DESC';
$toFetch = $dbh->query($sql);
$data = $toFetch->fetchAll();

$per_page = 5;//define how many games for a page
$count = count($data);
$pages = ceil($count / $per_page);

if (!(isset($_GET['page']))) {
    $page = "1";
} else {
    $page = $_GET['page'];
}

$start = ($page - 1) * $per_page;
$sql = $sql . " LIMIT $start,$per_page";


$toFetch = $dbh->query($sql);
$data = $toFetch->fetchAll();

$i = 0;
foreach ($data as $row) {
    $toFetch = $dbh->query("SELECT COUNT(post_id) FROM comments WHERE post_id ='$row[0]'");
    $data1[$i] = $toFetch->fetchAll();
    $i++;
}


?>

<!-- Default Navbars -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="../mainPage.php" class="navbar-brand"> <i class="fas fa-car"></i> Strona Główna</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-nav-demo">
            <ul class="nav navbar-nav">
                <li><a href="../history/history.php">Historia</a></li>
                <li><a href="Articles.php">Wpisy</a></li>
                <li><a href="../contact/contact.php">Kontakt</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();

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

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
<div class="container">
    <?php

    for ($i = 0; $i < count($data); $i++) {
        echo '<div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img style="max-height: 150px; max-width: 150px" class="media-object" src="../css/images/Profile_image/'.$data[$i]['image'].'">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">' . $data[$i]["title"] . '</h4>
          <p class="text-right">Autor: ' . $data[$i]["showable_name"] . '</p>
          <p>' . $data[$i]["text"] . '</p>
          <ul class="list-inline list-unstyled">
            
            <span>
                <li><p class="text-left" style="font-size: 10px">'.$data[$i]["timeStamp"].'</p> </li>  
                <form method="post" action="Comments.php">
                    <input type="hidden" name="id" value="'.$data[$i]["id"].'">
                    <input style="float: right" class = "btn btn-link" type="submit" value="Komentarze ('.$data1[$i][0][0].')">
                </form>
            </span>
                    
			</ul>
       </div>
    </div>
  </div>';
    }
    ?>
    <ul class="pager">
        <?php
        if ($page == 1) {
            echo '<li class="next"><a href="Articles.php?page=' . ($page + 1) . '">Starsze</a></li>';
        } else if (count($data) < 5) {
            echo '<li class="previous"><a href="Articles.php?page=' . ($page - 1) . '">Wcześniejsze</a></li>';
        } else {
            echo '<li class="previous"><a href="Articles.php?page=' . ($page - 1) . '">Wcześniejsze</a></li>';
            echo '<li class="next"><a href="Articles.php?page=' . ($page + 1) . '">Starsze</a></li>';
        }
        if(isset($_SESSION['username']))
        {
            echo '<li><a href="new_article.php">Dodaj nowy wpis</a></li>';
        }
        ?>
    </ul>
</div>

</body>
</html>

<?php
echo "";
?>