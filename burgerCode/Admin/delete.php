<!-- TATIEZE EMMANUEL -->
<?php
require 'database.php';

if (!empty($_GET['id']) )
{
    $id = checkInput($_GET['id']);
}

if (!empty($_POST) )
{
    $id = checkInput($_POST['id']);
    $db = Database::connect();
  $statement = $db->prepare("DELETE FROM items WHERE id = ?");
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BURGER CODE</title>
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
    <link rel="stylesheet" href="../style.css">
    
    <style>
        body>a
        {
        float:right;
        margin: 15px;
        padding:15px;
        border-radius:10px;  
        }
        .admin
       {
        background:#fff;
        padding:50px;
        border-radius:10px;  
       } 

       .site
       {
        font-family:'Holtwood One SC', sans-serif;
       }
    </style>
    
</head>

  <body>
  <a class="btn btn-light" href="../../logout.php"><span class="glyphicon glyphicon-user "></span> Deconnexion </a>

    
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery "></span> Burger Code<span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">

           <h1><strong>Suprimer un item</strong></h1>
           <br>

                <form class="form" action="delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">  
                  <p class="alert alert-warning">Etes-vous sur de vouloir supprimer ?</p>
                  <div class="form-actions">
                <button type="submit" class="btn btn-warning">oui</button>
                <a class="btn btn-default" href="index.php">Non</a>

                </div>
                </form>


        

      </div>


</body>

</html>