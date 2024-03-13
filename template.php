<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $page_title ?></title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">

    </head>
    <body>
        <header>
            <nav class="nav justify-content-center" style="background-color: #e3f2fd;">
                <div class="nav-item">
                    <a class="nav-link active" href="index.php">Index</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link active" href="recap.php">Recapitulatif</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="recap.php"><i class="ri-shopping-cart-2-line"></i></a>
                </div>
                <div class="nav-link">
                    <?php
                        require("function.php");
                        affiche_nbr_product();
                    ?>
                </div>
            </nav>
        </header>
        <main>

            <?= $content ?>

        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>