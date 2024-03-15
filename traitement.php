<?php
    session_start(); // Commence une nouvelle session
    require("function.php");
    if(isset($_GET['action']))
    {
        switch($_GET['action'])
        {
            // Case Add product
            case "add":
                // var_dump($_FILES['file']);die;
                if(isset($_POST['submit']))
                {
                    $name           = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price          = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt            = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    $description    = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    $name_img = $_FILES['file']['name'];
                    $tmpName = $_FILES['file']['tmp_name'];
                    $size = $_FILES['file']['size'];
                    $error = $_FILES['file']['error'];
                    $type = $_FILES['file']['type'];

                    if($name && $price && $qtt && $name_img)
                    {
                        
                        // Formulaire
                        $product = [
                            "name"          => $name,
                            "price"         => $price,
                            "qtt"           => $qtt,
                            "total"         => $price*$qtt,
                            "description"   => $description
                        ];
                        $_SESSION["products"][] = $product;


                        // IMAGE
                        $tabExtension = explode('.', $name_img); // Sépare la chaîne de caractère lors d'1 point
                        $extension = strtolower(end($tabExtension)); // Met en minuscule la dernière valeur du tableau
    
                        $extensionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];
    
                        if(in_array($extension, $extensionsAutorisees) && $error == 0){
                            $uniqueName = uniqid('', true);
                            $fileName = $uniqueName.'.'.$extension;
                            $_SESSION["image"][] = $fileName;
                            //var_dump($_SESSION["image"]);die; 
                            move_uploaded_file($tmpName, './img/'.$fileName); // Permet d'enregistrer un fichier
                        }
                        else{
                            echo "Mauvaise extension ou taille importante ou erreur";
                        }
                        // Le produit a bien été ajouté
                        manag_msg("add");
                        header("Location:index.php");
                        break;
                    }
                    // Le produit n'a pas été ajouté
                    manag_msg("Nadd");
                    header("Location:index.php");
                }
                break;

            // Case delete 1 product
            case "delete":
                if(isset($_GET['id']))
                {
                    unlink("img/".$_SESSION['image'][$_GET['id']]);
                    unset($_SESSION['products'][$_GET['id']]);
                    unset($_SESSION['image'][$_GET['id']]);
                    $_SESSION['products'] = array_values($_SESSION['products']);
                    $_SESSION['image'] = array_values($_SESSION['image']); 
                }
                manag_msg("delete_shop");
                header("Location:recap.php");
                break;

            // Case delete all products
            case "clear":
                foreach($_SESSION["image"] as $cle)
                {
                    unlink("img/".$cle);
                }
                unset($_SESSION['products']);
                unset($_SESSION['image']);
                manag_msg("clear_shop");
                header("Location:recap.php");
                break;

            // Case add quantity
            case "up-qtt":
                if(isset($_GET['id']))
                {
                    $_SESSION['products'][$_GET['id']]["qtt"] ++;
                }
                header("Location:recap.php");
                break;

            // Case decreases quantity
            case "down-qtt":
                if(isset($_GET['id']))
                {
                    if($_SESSION['products'][$_GET['id']]["qtt"] > 1)
                    {
                        $_SESSION['products'][$_GET['id']]["qtt"] --;
                    }
                    else
                    {
                        unset($_SESSION['products'][$_GET['id']]);
                        $_SESSION['products'] = array_values($_SESSION['products']);
                    }

                }
                header("Location:recap.php");
                break;
            default:
                break;
        }
    }


