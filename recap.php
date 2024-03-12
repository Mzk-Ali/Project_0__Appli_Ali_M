<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="recap.php">Index</a>
            </div>
        </nav>
    </header>

    <?php var_dump($_SESSION); ?>
    <?php 
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){ //Verification si produit existe ou si il est vide
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table class='table table-striped'>",
                    "<thead>",
                        "<tr>",
                            "<th scope='col'>#</th>",
                            "<th scope='col'>Nom</th>",
                            "<th scope='col'>Prix</th>",
                            "<th scope='col'>Quantité</th>",
                            "<th scope='col'>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){ // Boucle pour afficher produits par produits
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "</tr>";
                $totalGeneral += $product['total'];
            }
            echo    "<tr>",
                        "<td colspan=4> Total général : </td>",
                        "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "</tbody>",
                "</table>";
        }
    ?>
</body>
</html>