<!-- TATIEZE EMMANUEL -->
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
    <link rel="stylesheet" href="style.css">

    <style>
body>a
{
  float:right;
  margin: 15px;
  padding:15px;
  border-radius:10px;  
}

   </style>
    
</head>
  <body>
  <a class="btn btn-light" href="../logout.php"><span class="glyphicon glyphicon-user "></span> Deconnexion </a>

    <div class="container site">
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery "></span> Burger Code<span class="glyphicon glyphicon-cutlery"></span></h1>
       <?php
         require 'Admin/database.php';
       echo '<nav>
               <ul class="nav nav-pills">';
        $db = Database::connect();
       $statement = $db->query('SELECT * FROM categories');
       $categories = $statement->fetchAll();
       foreach($categories as $category)
       {
           if ($category['id'] == '1')
               echo '<li role="presentation" class="active"><a href="#' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
            else
               echo '<li role="presentation"><a href="#' . $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';

        }
       echo '</ul>
            </nav>';



       echo '<div class="tab-content">';
       foreach ($categories as $category)
       {
        if($category['id']=='1')
        echo '<div class="tab-pane active" id="' . $category['id'] . '">';
        else
        echo '<div class="tab-pane" id="' . $category['id'] . '">';

           echo '<div class="row">';
         $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
         $statement->execute(array($category['id']));

           while($item = $statement->fetch())
           {
               echo '<div class="col-sm-6 col-md-4">
                     <div class="thumbnail">
                 
                         <img src="images/images/' . $item['image'] . '"  alt="...">
                         <div class="price">' . number_format($item['price'], 2, '.', '') . ' €</div>
                         <div class="caption">
                            <h4>' . $item['name'] . '</h4>
                            <p>' . $item['description'] . '</p>
                            <a href="#" class="btn btn-order" role="button" ><span class="glyphicon glyphicon-shopping-cart"></span>Commander</a>
                 </div>                                
    
             </div>

          </div>';
            
 
           }
           echo '</div>
                   </div>';

       }
       Database::disconnect();
       echo '</div>';

       ?>
       


    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>