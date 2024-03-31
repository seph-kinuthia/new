<?php

session_start();
@include 'config.php';

?>

<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>p1</title>

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="grid-wrapper">
            <h2>Bidhaa zote</h2>
            <div class="card-wrapper">

        <?php
            $query_all_products = $conn->prepare("SELECT * FROM `products`");
            $query_all_products->execute();

            
            if($query_all_products->rowCount() > 0)
            {
                foreach($query_all_products as $product)
                {
        ?>
                    <div class="card">
                        <div class="card__media-area">
                            <img class="card-img" src="uploaded_img/<?= $product['image'] ?>" width="80" height="80"/>
                        </div>
                        <div class="card__content-area">
                            <p class="card-header"><?= $product['name'] ?></p>
                            <p class="card-price">KSH <?= $product['price'] ?></p>
                            <p class="card-quant"> available in stock: <?= $product['quantity'] ?></p>
                        </div>
                        <div class="card__action-area">
                            <a class="card-btn">add to cart</a>
                        </div>
                    </div>
        <?php
                }
            } else {
                print("no products");
            }
        ?>
        </div>
        </div>
    </body>
</html>
