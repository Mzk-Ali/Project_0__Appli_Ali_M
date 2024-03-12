<?php
    session_start(); // Commence une nouvelle session

    $alert = "<script>alert('Le traitement est un echec!!!!');</script>";
    echo $alert;
    //$alert = "<script>alert('Le traitement est un echec!!!!');</script>";
    if(isset($_POST['submit'])){
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            $_SESSION['products'][] = $product;
            //$alert = "<script>alert('Le traitement est un succès!!!!');</script>";
        }
    }

    header("Location:index.php");