<!DOCTYPE html>
<html>
<head>
    <title>Das Auto</title>
    <meta charset="UTF-8">
    <link rel="import"  href="../css/headers.html">
</head>
<body>

<?php
session_start();
if(isset($_POST['id']))
{
    $pid = $_POST['id'];
}elseif (isset($_SESSION['pid']))
{
    $pid = $_SESSION['pid'];
}


$mysql_host = '127.0.0.1';
$dbname = 'testowa';
$username = 'root';
$port = '3306';
$password = 'root';

try {
    $dbh = new PDO('mysql:host=' . $mysql_host . ';dbname=' . $dbname . ';port=' . $port, $username, $password);
} catch (PDOException $e) {
    echo 'Połączenie nie mogło zostać utworzone.<br />';
}

$sql = "SELECT c.text, c.date, c.user_id, u.showable_name, u.image FROM topics as t, comments AS c, users as u WHERE c.post_id = '$pid' AND t.id = '$pid' AND u.id = c.user_id ORDER BY c.date DESC";
$toFetch = $dbh->query($sql);
$data = $toFetch->fetchAll();

$per_page = 5;//define how many games for a page
$count = count($data);
$pages = ceil($count / $per_page);

if (!(isset($_GET['page']))){
    $page = "1";
} else {
    $page = $_GET['page'];
}

$start = ($page - 1) * $per_page;
$per_page++;
$sql = $sql . " LIMIT $start,$per_page";


$toFetch = $dbh->query($sql);
$data = $toFetch->fetchAll();

$sql = "SELECT t.id, t.title, t.text, t.timeStamp, t.userId, u.showable_name, u.image FROM topics AS t, users AS u WHERE u.id = t.userId AND t.id = '$pid'";
$toFetch = $dbh->query($sql);
$data1 = $toFetch->fetchAll();


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

    <div class="container">


    </div>
</div>
</div>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
<div class="container">
    <div class="well">
        <div class="media">
            <a class="pull-left" href="#">
                <img style="max-height: 150px; max-width: 150px" class="media-object" src="../css/images/Profile_image/<?php echo $data1[0]['image'];?>">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $data1[0]["title"]; ?></h4>
                <p class="text-right">Autor: <?php echo $data1[0]["showable_name"]; ?></p>
                <p><?php echo $data1[0]["text"]; ?></p>
                <p style="color: white">asd </p>
                <ul class="list-inline list-unstyled">
                    <li><p class="text-left" style="font-size: 10px"><?php echo $data1[0]["timeStamp"]; ?></p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <?php

        if(count($data) > 5) $ccount = 5;
        else $ccount = count($data);
        for ($i = 0; $i < $ccount; $i++) {
            echo '<div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img style="max-height: 150px; max-width: 150px" class="media-object" src="../css/images/Profile_image/'.$data[$i]['image'].'">
  		</a>
  		<div class="media-body">
    		<h4 class="media-heading">' . $data1[0]["title"] . '</h4>
          <p class="text-right">Autor: ' . $data[$i]["showable_name"] . '</p>
          <p>' . $data[$i]["text"] . '</p>
          <ul class="list-inline list-unstyled">
            <li><p class="text-left" style="font-size: 10px">' . $data[$i]["date"] . '</p> </li>                  
			</ul>
       </div>
    </div>
  </div>';

        }
        $_SESSION['pid'] = $pid;
        ?>
        <div>

            <ul class="pager">
                <?php
                if ($page == 1 and count($data) < 6)
                {

                }
                else if ($page == 1 and count($data) >= 6)
                {
                    echo '<li class="next"><a href="Comments.php?page=' . ($page + 1) . '">Starsze</a></li>';
                }
                else if(count($data) < 6)
                {
                    echo '<li class="previous"><a href="Comments.php?page=' . ($page - 1) . '">Wcześniejsze</a></li>';
                }
                else
                {
                    echo '<li class="previous"><a href="Comments.php?page=' . ($page - 1) . '">Wcześniejsze</a></li>';
                    echo '<li class="next"><a href="Comments.php?page=' . ($page + 1) . '">Starsze</a></li>';
                }
                    echo '<li><a href="new_comment.php">Dodaj nowy komentarz</a></li>';
                ?>
            </ul>
        </div>

</body>
</html>

<?php
echo "";
?>