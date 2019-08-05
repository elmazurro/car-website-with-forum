<?php

	
  session_start();

	
$mysql_host = '127.0.0.1';
$dbname = 'testowa';
$username = 'root';
$port = '3306';
$passwords = 'root';

  try{
    $connect = new PDO("mysql:host=$mysql_host; dbname=$dbname",$username,$passwords);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"]))
    {

      if(empty($_POST["username"])  || empty($_POST["password"]))
      {
        $message = '<label>All fields are required</lable>';
      }
      else
      {
          $query = "SELECT * FROM users WHERE login = :username AND password = :password";
          $statement = $connect->prepare($query);
          $statement->execute(
                     array(
                     'username'   =>   $_POST["username"],
                     'password'   =>    $_POST["password"]
                     )
          );
          $count = $statement->rowCount();
          $data = $statement->fetch();
          if($count > 0)
          {
              $_SESSION["username"] = $data['showable_name'];
              $_SESSION["userid"] = $data['id'];
              header("location:../mainPage.php");
          }
          else
          {
            $message = '<label>Username OR Password is wrong</label>';
          }
      }
    }
  }

    catch(PDOException $error)
    {
      $message =$error->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Das Auto</title>
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
			<li><a href="../contact/contact.php">Kontakt</a></li>
		</ul>
		
	</div>
	</div>
	</nav>
<!--  -->

<div class="col-md-12" >
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Logowanie</h3>
                    </div> 
                         <div class="panel-body" >  

                                <?php 

                                    if(isset($message))
                                    {
                                    echo '<label class="text-danger">'.$message.'</label>';

                                    }
                                ?>
                                <form method="post">  
                                    <label>Username</label> 
                                    <input type="text" name="username" class="form-control" />  
                                    <br />  
                                    <label>Password</label>  
                                    <input type="password" name="password" class="form-control" />  
                                    <br />  
                                    <input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />  
                                </form>  
                         </div>  
                </div>
    </div>
</div>
</body>
</html>