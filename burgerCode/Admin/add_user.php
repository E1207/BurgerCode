<!-- TATIEZE EMMANUEL -->
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

<?php
require('../../config.php');

if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['type'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email 
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe 
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  // récupérer le type (user | admin)
  $type = stripslashes($_REQUEST['type']);
  $type = mysqli_real_escape_string($conn, $type);
  
    $query = "INSERT into `users` (username, email, type, password)
          VALUES ('$username', '$email', '$type', '".hash('sha256', $password)."')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title">
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery "></span> Burger Code<br><span class="glyphicon glyphicon-cutlery"></span></h1>
  </h1>
    <h1 class="box-title">Add user</h1>
  <input type="text" class="box-input" name="username" 
  placeholder="Nom d'utilisateur" required />
  
    <input type="text" class="box-input" name="email" 
  placeholder="Email" required />
  
  <div>
      <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  
    <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
<a class="btn btn-primary" href="home.php"><span class="glyphicon glyphicon-arrow-left "></span>Retour</a>

</body>
</html>