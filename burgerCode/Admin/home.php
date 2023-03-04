<!-- TATIEZE EMMANUEL -->
<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <title>BURGER CODE add_user</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
    
    
    <style>
        body>a
        {
        float:right;
        margin: 15px;
        padding:15px;
        border-radius:10px;  
        }
body
{
    background: url(../images/images/bg.png);
}
.admin
{
  background:#fff;
  padding:50px;
  border-radius:10px;  
}
.box-input {
  font-size: 14px;
  background: #fff;
  border: 1px solid #ddd;
  margin-bottom: 25px;
  padding-left:10px;
  border-radius: 5px;
  width: 300px;
  height: 50px;
}
.text-logo
{
    font-family: 'Holtwood One SC', sans-serif;
    color: #e7480f;
    text-shadow: 2px 2px #ffd301;
    font-size: 50px;
    padding: 40px 0px;
    text-align: center;
}
.text-logo .glyphicon
{
    color: #ffd301;
    text-shadow: 0px 0px #ffd301;
}
    </style>
  </head>
  <body>
  <a class="btn btn-light" href="../../logout.php"><span class="glyphicon glyphicon-user "></span> Deconnexion </a>

    <div class="sucess">
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery "></span> Burger Code<span class="glyphicon glyphicon-cutlery"></span></h1>

    <h2>Bienvenue <?php echo $_SESSION['username']; ?>!</h2>
    <p>C'est votre espace admin.</p>
    <a href="add_user.php">Add user</a> | 
    <a href="index.php">Gerer les Produits</a> | 
    <a href="#">Delete user</a> | 
    <a href="../../logout.php">Déconnexion</a>
    </ul>
    </div>
  </body>
</html>