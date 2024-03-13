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


?>