<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout produit</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <header>
            <nav class="navbar" style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="recap.php">Recapitulatif</a>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <h1>Ajouter un produit</h1>
                <form class="row g-3" action="traitement.php" method="post">
                    <p class="col-sm-2 col-form-label">
                        <label class="form-label">
                            Nom du produit :
                            <input class="form-control" type="text" name="name">
                        </label>
                    </p>
                    <p class="col-sm-2 col-form-label">
                        Prix du produit :
                        <label class="input-group">
                            <span class="input-group-text">$</span>
                            <input class="form-control" type="number" step="any" name="price">
                        </label>
                    </p>
                    <p class="col-sm-2 col-form-label">
                        <label class="form-label">
                            Quantité désirée :
                            <input class="form-control" type="number" name="qtt" value="1">
                        </label>
                    </p>
                    <p>
                        <input class="btn btn-primary" type="submit" name="submit" value="Ajouter le produit">
                    </p>
                </form>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>