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
        if($msg = "add")
        {
            $_SESSION["msg_form"] = "Le produit a bien été ajouté";
            //echo $_SESSION["msg_form"];die;
            //echo "testfunction"; die;
        }

        echo '<script>console.log("test")</script>';
        echo '<script>
            div_msg = document.getElementsByClassName("msg"),
            div_msg.innerHTML = "salut"</script>';
        
        
        


    }


?>