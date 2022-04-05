<?php

class Page{

    private static $title = "The one lab to rule them all";

    //header
    static function header(){?>

    <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <title><?php echo self::$title; ?></title>
        </head>
        <body>
            <div class="container">
            <h1><?php echo self::$title; ?></h1>

<?php }

//footer
    static function footer(){?>

     <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
            -->
            <div>
        </body>
        </html>
    
<?php }

// +----+-----------+-------+
// | id | product   | price |
// +----+-----------+-------+
// |  1 | Product 1 |   1.5 |
// |  2 | Product 2 |     5 |
// |  3 | Product 3 |   7.5 |
// |  4 | Product 4 |  4.43 |
// +----+-----------+-------+

static function showShoppingCart(Array $products){?>

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">product</th>
            <th scope="col">price</th>
        </tr>
    </thead>

    <tbody><?php
    
    foreach($products as $p){
        echo '<tr>';
        echo '<td scope="col">'.$p->getId().'</td>';    
        echo '<td scope="col">'.$p->getProduct().'</td>';    
        echo '<td scope="col">'.$p->getPrice().'</td>';    

        //delete button/ remove from cart
        echo '<td scope="col"><a href="?action=delete&idToDelete='.$p->getId().'"><button class="btn btn-danger">Remove from cart</button></a></td></tr>';

        }?>
        
    
    </tbody>


<?php }

}

?>