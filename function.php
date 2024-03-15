<?php

    function affiche_nbr_product(){
        if(!isset($_SESSION['products']) || empty($_SESSION['products']))
        {
            echo "0";
        }
        else
        {
            echo count($_SESSION['products']);
        }
    }


    function manag_msg($msg){
        if($msg == "add")
        {
            $_SESSION["msg_form"] = "Le produit a bien été ajouté";
        }
        else if($msg == "Nadd")
        {
            $_SESSION["msg_form"] = "Veuillez compléter complétement le formulaire avec l'image correspondant";
        }
        else if($msg == "delete_shop")
        {
            $_SESSION["msg_form"] = "Le produit a bien été supprimé ";
        }
        else if($msg == "clear_shop")
        {
            $_SESSION["msg_form"] = "Tous les produits du panier ont été supprimé ";
        }
        


    }


?>