<!-- TATIEZE EMMANUEL -->
<!doctype html>
<html lang="en">
  <head>
    <title>BURGER CODE Admin</title>
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
    </style>
</head>

  <body>
  <a class="btn btn-light" href="../../logout.php"><span class="glyphicon glyphicon-user "></span> Deconnexion </a>


 
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery "></span> Burger Code<span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
    

        <div class="row">
         <h1><strong>Liste des items  </strong><a href="insert.php" class="btn btn-success btn.lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
         <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Actions</th>


                </tr>
                 
            </thead>

            <tbody>

                <?php
                require 'database.php';
                $db = Database::connect();

                $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name as category 
                                         FROM items LEFT JOIN categories ON items.category = categories.id
                                         ORDER BY items.id DESC
                                        ');
                while($item =$statement->fetch())
                {
                    echo '<tr>';
                    echo '<td>' . $item['name'] . '</td>';
                    echo '<td>' . $item['description'] . '</td>' ;
                    echo '<td>' . number_format((float)$item['price'],2, '.','') . '</td>'; 
                    echo '<td>' . $item['category'] . '</td>' ;
                    echo '<td width=300>';
                      echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-eye-open "></span> Voir</a>';
                      echo ' ';
                      echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-pencil "></span> Modifier</a>';
                    echo ' ';
                      echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-remove "></span> Suprimer</a>';
                    
                    echo '</td>';

                    echo '</tr>';



                }
                Database::disconnect();
                
                


                ?>


            </tbody>    
         </table>

        </div>

        </div>
        <a class="btn btn-primary" href="home.php"><span class="glyphicon glyphicon-arrow-left "></span>Retour</a>
</body>

</html>