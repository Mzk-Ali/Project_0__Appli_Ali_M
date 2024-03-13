<?php
    session_start(); // Commence une nouvelle session
    if(isset($_GET['action']))
    {
        switch($_GET['action'])
        {
            // Case Add product
            case "add":
                if(isset($_POST['submit']))
                {
                    $name           = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price          = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt            = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    $description    = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            
                    if($name && $price && $qtt)
                    {
                        // var_dump("ok");die;
                        $product = [
                            "name"          => $name,
                            "price"         => $price,
                            "qtt"           => $qtt,
                            "total"         => $price*$qtt,
                            "description"   => $description
                        ];
                        $_SESSION["products"][] = $product;
                    }
                }
                if(isset($_FILES['file'])){
                    $name = $_FILES['file']['name'];
                    $tmpName = $_FILES['file']['tmp_name'];
                    $size = $_FILES['file']['size'];
                    $error = $_FILES['file']['error'];
                    $type = $_FILES['file']['type'];

                    $tabExtension = explode('.', $name); // Sépare la chaîne de caractère lors d'1 point
                    $extension = strtolower(end($tabExtension)); // Met en minuscule la dernière valeur du tableau

                    $extensionsAutorisees = ['jpg', 'jpeg', 'gif', 'png'];

                    if(in_array($extension, $extensionsAutorisees) && $error == 0){
                        $uniqueName = uniqid('', true);
                        $fileName = $uniqueName.'.'.$extension;
                        $_SESSION["image"][] = $fileName;
                        move_uploaded_file($tmpName, './img/'.$fileName); // Permet d'enregistrer un fichier
                    }
                    else{
                        echo "Mauvaise extension ou taille importante ou erreur";
                    }

                }


                header("Location:index.php");
                break;

            // Case delete 1 product
            case "delete":
                if(isset($_GET['id']))
                {
                    unset($_SESSION['products'][$_GET['id']]);
                    $_SESSION['products'] = array_values($_SESSION['products']);
                }
                header("Location:recap.php");
                break;
            
            // Case delete all products
            case "clear":
                unset($_SESSION['products']);
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


