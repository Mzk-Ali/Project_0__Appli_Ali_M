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
                    $name   = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price  = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt    = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                    if($name && $price && $qtt)
                    {
                        // var_dump("ok");die;
                        $product = [
                            "name"  => $name,
                            "price" => $price,
                            "qtt"   => $qtt,
                            "total" => $price*$qtt
                        ];
            
                        $_SESSION["products"][] = $product;
                        header("Location:index.php?success=1");
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
                    if($_SESSION['products'][$_GET['id']]["qtt"] > 0)
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


