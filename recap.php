<?php
    session_start();
    ob_start();
    $page_title = "Récapitulatif";

    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) 
    { //Verification si produit existe ou si il est vide
        echo "<p>Aucun produit en session...</p>";
    }
    else
    {
        echo "<table class='table table-striped'>",
                "<thead>",
                    "<tr>",
                        "<th scope='col'>#</th>",
                        "<th scope='col'>Nom</th>",
                        "<th scope='col'>Prix</th>",
                        "<th scope='col'>Quantité</th>",
                        "<th scope='col'>Total</th>",
                        "<th scope='col'>Supprimer</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product)
        { // Boucle pour afficher produits par produits

            $filename = $_SESSION["image"][$index];
            echo "<tr class='info_product'>",
                    "<td>".$index."</td>",
                    "<td class='survol'>".$product['name']."<div class='infos'><img src='img/".$filename."' alt='image'></div><div class='description'><span>Description du produit : ".$product['description']."</span></div></td>",
                    "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td><a style='text-decoration:none' href='traitement.php?action=down-qtt&id=$index'><i class='ri-indeterminate-circle-line'></i></a>".$product['qtt']."<a style='text-decoration:none' href='traitement.php?action=up-qtt&id=$index'><i class='ri-add-circle-line'></i></a></td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td><a style='text-decoration:none' href='traitement.php?action=delete&id=$index'><i class='ri-close-line'></i></a></td>",
                "</tr>";
            $totalGeneral += $product['total'];
        }
        echo    "<tr>",
                    "<td colspan=4> Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                    "<td><strong><a style='text-decoration:none' href='traitement.php?action=clear'>Videz le panier</a></strong></td>",
                "</tbody>",
            "</table>";
    }
    $content = ob_get_clean();
    require_once "template.php";

    
?>