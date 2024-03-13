<?php
    session_start();
    ob_start();
    $page_title = "Ajout de produit";
?>
            <div class="container">
                <h1>Ajouter un produit</h1>
                <form class="row g-3" action="traitement.php?action=add" method="post">
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

<?php
    $content = ob_get_clean();



    require_once "template.php";

    if ( isset($_GET['success']) && $_GET['success'] == 1 )
    {
        echo "<script>alert('STOP')</script>";
    }
?>