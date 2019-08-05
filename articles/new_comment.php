<!DOCTYPE html>
<html>
<head>
    <title>Das Auto</title>
    <meta charset="UTF-8">
    <link rel="import" href="../css/headers.html">
</head>
<body>

<?php
session_start();
if(isset($_POST['text']))
{
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
    $text = $_POST['text'];
    $pid = $_SESSION['pid'];
    if(isset($_SESSION['userid']))
    {
        $uid = $_SESSION['userid'];
    }
    else
    {
        $uid = 4;
    }
    $sql = 'INSERT INTO comments(text, user_id, post_id) VALUES ("'.$text.'","'.$uid.'","'.$pid.'")';
    $toSend = $dbh->query($sql);
    header("location:Comments.php");
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


                if (isset($_SESSION["username"])) {
                    echo '
 	                <li><a>Witaj, ' . $_SESSION["username"] . '</a></li>
                    <li><a href="../log/logout.php">Logout</a></li>
                    ';
                } else {
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
    <div class="jumbotron">
        <form method="post" action="new_comment.php">
            <div class="form-group">
                <label for="comment">Treść komentarza:</label>
                <textarea class="form-control" rows="5" id="text" name="text"></textarea>
            </div>
            <input style="float: right" class = "btn btn-primary" type="submit" value="Dodaj">
        </form>

    </div>
</div>

</body>
</html>
