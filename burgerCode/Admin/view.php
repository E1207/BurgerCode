<!-- TATIEZE EMMANUEL -->
<?php
require 'database.php';
if (!empty($_GET['id']))
{
    $id = checkInput($_GET['id']);
}

$db = Database::connect();
$statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name as category 
                           FROM items LEFT JOIN categories ON items.category = categories.id
                           WHERE items.id= ?
                          ');

$statement->execute(array($id));
$item = $statement->fetch();
Database::disconnect();

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
 

?>
<!doctype html>
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

      <div class="row">
        <div class="col-sm-6 ">
           <h1><strong>Voir un item</strong></h1>
           <br>

           <form>
              <div class="form-group">
                <label>Nom:</label><?php echo ' ' . $item['name']; ?>
              </div>
              <div class="form-group">
                <label>Description:</label><?php echo ' ' . $item['description']; ?>
              </div>
              <div class="form-group">
                <label>Prix:</label><?php echo ' ' . number_format((float)$item['price'],2, '.','') . ' €'; ?>
              </div>
              <div class="form-group">
                <label>Catégorie:</label><?php echo ' ' . $item['category']; ?>
              </div>
              <div class="form-group">
                <label>Image:</label><?php echo ' ' . $item['image']; ?>
              </div>
                   

           </form>
           <div class="form-actions">
             <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left "></span>Retour</a>

           </div>

        </div>
        <div class="col-sm-6 site ">
            <div class="thumbnail">                   
               <img src="<?php echo  '../images/images/' . $item['image'] ;?>"  alt="...">
               <div class="price"><?php echo number_format((float)$item['price'],2, '.','') . ' €'; ?></div>                   
                  <div class="caption">               
                     <h4><?php echo $item['name']; ?></h4>                
                     <p><?php echo $item['description']; ?></p>
                     <a href="#" class="btn btn-order" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span>Commander</a>
                  </div>                                
                 </div>            

        </div>
            
         
         

        </div>

      </div>


</body>

</html>